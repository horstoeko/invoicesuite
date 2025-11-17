<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\abstracts;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesCurrentDocumentFormatProvider;
use horstoeko\invoicesuite\concerns\HandlesDocumentRootObject;
use horstoeko\invoicesuite\concerns\HandlesDocumentSerializer;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use JMS\Serializer\SerializationContext;

/**
 * Class representing methods for a builder
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
abstract class InvoiceSuiteAbstractDocumentFormatBuilder
{
    use HandlesCurrentDocumentFormatProvider;
    use HandlesDocumentSerializer;
    use HandlesDocumentRootObject;

    // region General

    /**
     * Constructor
     *
     * @param InvoiceSuiteAbstractDocumentFormatProvider $newProvider
     */
    public function __construct(InvoiceSuiteAbstractDocumentFormatProvider $newProvider)
    {
        $this->setCurrentDocumentFormatProvider($newProvider);
        $this->createAndInitDocumentSerializerByFormatProvider();
        $this->createAndInitDocumentRootObjectByFormatProvider();
    }

    /**
     * Get the content as XML string
     *
     * @return string
     */
    public function getContentAsXml(): string
    {
        return $this->getContentByType(InvoiceSuiteContentTypeResolver::XML);
    }

    /**
     * Get the content as JSON string
     *
     * @return string
     */
    public function getContentAsJson(): string
    {
        return $this->getContentByType(InvoiceSuiteContentTypeResolver::JSON);
    }

    /**
     * Save the XML content to a file
     *
     * @param  string $tofile
     * @return void
     */
    public function saveAsXmlFile(string $tofile): void
    {
        file_put_contents($tofile, $this->getContentAsXml());
    }

    /**
     * Save the JSON content to a file
     *
     * @param  string $tofile
     * @return void
     */
    public function saveAsJsonFile(string $tofile): void
    {
        file_put_contents($tofile, $this->getContentAsJson());
    }

    // endregion

    // region Document DTO

    /**
     * Create a document by a DTO
     *
     * @param  InvoiceSuiteDocumentHeaderDTO $newDocumentDTO Data-Transfer-Object
     * @return self
     */
    abstract public function createFromDTO(
        InvoiceSuiteDocumentHeaderDTO $newDocumentDTO
    ): self;

    // endregion

    // region Document Generals

    /**
     * Sets the new document number (e.g. invoice number)
     *
     * @param  null|string $newDocumentNo The document no issued by the seller
     * @return static
     */
    abstract public function setDocumentNo(
        ?string $newDocumentNo = null
    ): self;

    /**
     * Sets the new document type code
     *
     * @param  null|string $newDocumentType The type of the document
     * @return static
     */
    abstract public function setDocumentType(
        ?string $newDocumentType = null
    ): self;

    /**
     * Sets the new document description
     *
     * @param  null|string $newDocumentDescription The documenttype as free text
     * @return self
     */
    abstract public function setDocumentDescription(
        ?string $newDocumentDescription = null
    ): self;

    /**
     * Sets the new document language
     *
     * @param  null|string $newDocumentLanguage Language indicator. The language code in which the document was written
     * @return self
     */
    abstract public function setDocumentLanguage(
        ?string $newDocumentLanguage = null
    ): self;

    /**
     * Sets the new document date (e.g. invoice date)
     *
     * @param  null|DateTimeInterface $newDocumentDate Date of the document. The date when the document was issued by the seller
     * @return self
     */
    abstract public function setDocumentDate(
        ?DateTimeInterface $newDocumentDate = null
    ): self;

    /**
     * Sets the new document period
     *
     * @param  null|DateTimeInterface $newCompleteDate Contractual due date of the document
     * @return self
     */
    abstract public function setDocumentCompleteDate(
        ?DateTimeInterface $newCompleteDate = null
    ): self;

    /**
     * Sets the new document currency
     *
     * @param  null|string $newDocumentCurrency Code for the invoice currency
     * @return self
     */
    abstract public function setDocumentCurrency(
        ?string $newDocumentCurrency = null
    ): self;

    /**
     * Sets the new document tax currency
     *
     * @param  null|string $newDocumentTaxCurrency Code for the tax currency
     * @return self
     */
    abstract public function setDocumentTaxCurrency(
        ?string $newDocumentTaxCurrency = null
    ): self;

    /**
     * Sets the new status of the copy indicator
     *
     * @param  null|bool $newDocumentIsCopy Indicates that the document is a copy
     * @return self
     */
    abstract public function setDocumentIsCopy(
        ?bool $newDocumentIsCopy = null
    ): self;

    /**
     * Sets the new status of the test indicator
     *
     * @param  null|bool $newDocumentIsTest Indicates that the document is a test
     * @return self
     */
    abstract public function setDocumentIsTest(
        ?bool $newDocumentIsTest = null
    ): self;

    /**
     * Set a note to the document. This clears all added notes
     *
     * @param  null|string $newContent     Free text containing unstructured information that is relevant to the invoice as a whole
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Qualification of the free text for the invoice
     * @return self
     */
    abstract public function setDocumentNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null
    ): self;

    /**
     * Add a note to the document
     *
     * @param  null|string $newContent     Free text containing unstructured information that is relevant to the invoice as a whole
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Qualification of the free text for the invoice
     * @return self
     */
    abstract public function addDocumentNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null
    ): self;

    /**
     * Set the start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    abstract public function setDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null
    ): self;

    /**
     * Add a the start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    abstract public function addDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null
    ): self;

    /**
     * Set a posting reference
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return self
     */
    abstract public function setDocumentPostingReference(
        ?string $newType = null,
        ?string $newAccountId = null
    ): self;

    /**
     * Add a posting reference
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return self
     */
    abstract public function addDocumentPostingReference(
        ?string $newType = null,
        ?string $newAccountId = null
    ): self;

    // endregion

    // region Document References

    /**
     * Set the associated seller's order confirmation.
     *
     * @param  null|string            $newReferenceNumber Seller's order confirmation number
     * @param  null|DateTimeInterface $newReferenceDate   Seller's order confirmation date
     * @return self
     */
    abstract public function setDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an associated seller's order confirmation.
     *
     * @param  null|string            $newReferenceNumber Seller's order confirmation number
     * @param  null|DateTimeInterface $newReferenceDate   Seller's order confirmation date
     * @return self
     */
    abstract public function addDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set the associated buyer's order
     *
     * @param  null|string            $newReferenceNumber Buyers's order number
     * @param  null|DateTimeInterface $newReferenceDate   Buyer's order date
     * @return self
     */
    abstract public function setDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an associated buyer's order
     *
     * @param  null|string            $newReferenceNumber Buyers's order number
     * @param  null|DateTimeInterface $newReferenceDate   Buyer's order date
     * @return self
     */
    abstract public function addDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set the associated quotation
     *
     * @param  null|string            $newReferenceNumber Quotation number
     * @param  null|DateTimeInterface $newReferenceDate   quotation date
     * @return self
     */
    abstract public function setDocumentQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an associated quotation
     *
     * @param  null|string            $newReferenceNumber quotation number
     * @param  null|DateTimeInterface $newReferenceDate   quotation date
     * @return self
     */
    abstract public function addDocumentQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set the associated contract
     *
     * @param  string                 $newReferenceNumber Contract number
     * @param  null|DateTimeInterface $newReferenceDate   Contract date
     * @return self
     */
    abstract public function setDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add am associated contract
     *
     * @param  string                 $newReferenceNumber Contract number
     * @param  null|DateTimeInterface $newReferenceDate   Contract date
     * @return self
     */
    abstract public function addDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional associated document
     *
     * @param  null|string                 $newReferenceNumber        Additional document number
     * @param  null|DateTimeInterface      $newReferenceDate          Additional document date
     * @param  null|string                 $newTypeCode               Additional document type code
     * @param  null|string                 $newReferenceTypeCode      Additional document reference-type code
     * @param  null|string                 $newDescription            Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment Additional document attachment
     * @return self
     */
    abstract public function setDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null
    ): self;

    /**
     * Add an additional associated document
     *
     * @param  null|string                 $newReferenceNumber        Additional document number
     * @param  null|DateTimeInterface      $newReferenceDate          Additional document date
     * @param  null|string                 $newTypeCode               Additional document type code
     * @param  null|string                 $newReferenceTypeCode      Additional document reference-type code
     * @param  null|string                 $newDescription            Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment Additional document attachment
     * @return self
     */
    abstract public function addDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null
    ): self;

    /**
     * Set an additional invoice document (reference to preceding invoice)
     *
     * @param  null|string            $newReferenceNumber Identification of an invoice previously sent
     * @param  null|DateTimeInterface $newReferenceDate   Date of the previous invoice
     * @param  null|string            $newTypeCode        Type code of previous invoice
     * @return self
     */
    abstract public function setDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null
    ): self;

    /**
     * Add an additional invoice document (reference to preceding invoice)
     *
     * @param  null|string            $newReferenceNumber Identification of an invoice previously sent
     * @param  null|DateTimeInterface $newReferenceDate   Date of the previous invoice
     * @param  null|string            $newTypeCode        Type code of previous invoice
     * @return self
     */
    abstract public function addDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null
    ): self;

    /**
     * Set an additional project reference
     *
     * @param  null|string $newReferenceNumber Project number
     * @param  null|string $newName            Project name
     * @return self
     */
    abstract public function setDocumentProjectReference(
        ?string $newReferenceNumber = null,
        ?string $newName = null
    ): self;

    /**
     * Add an additional project reference
     *
     * @param  null|string $newReferenceNumber Project number
     * @param  null|string $newName            Project name
     * @return self
     */
    abstract public function addDocumentProjectReference(
        ?string $newReferenceNumber = null,
        ?string $newName = null
    ): self;

    /**
     * Set an additional ultimate customer order reference
     *
     * @param  null|string            $newReferenceNumber
     * @param  null|DateTimeInterface $newReferenceDate
     * @return self
     */
    abstract public function setDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an additional ultimate customer order reference
     *
     * @param  null|string            $newReferenceNumber
     * @param  null|DateTimeInterface $newReferenceDate
     * @return self
     */
    abstract public function addDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber Shipping notification number
     * @param  null|DateTimeInterface $newReferenceDate   Shipping notification date
     * @return self
     */
    abstract public function setDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber Shipping notification number
     * @param  null|DateTimeInterface $newReferenceDate   Shipping notification date
     * @return self
     */
    abstract public function addDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber Receipt notification number
     * @param  null|DateTimeInterface $newReferenceDate   Receipt notification date
     * @return self
     */
    abstract public function setDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber Receipt notification number
     * @param  null|DateTimeInterface $newReferenceDate   Receipt notification date
     * @return self
     */
    abstract public function addDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional delivery note
     *
     * @param  null|string            $newReferenceNumber Delivery slip number
     * @param  null|DateTimeInterface $newReferenceDate   Delivery slip date
     * @return self
     */
    abstract public function setDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an additional delivery note
     *
     * @param  null|string            $newReferenceNumber Delivery slip number
     * @param  null|DateTimeInterface $newReferenceDate   Delivery slip date
     * @return self
     */
    abstract public function addDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set the date of the delivery
     *
     * @param  null|DateTimeInterface $newDate Actual delivery date
     * @return self
     */
    abstract public function setDocumentSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): self;

    /**
     * Set the identifier assigned by the buyer and used for internal routing
     *
     * @param  null|string $newBuyerReference An identifier assigned by the buyer and used for internal routing
     * @return self
     */
    abstract public function setDocumentBuyerReference(
        ?string $newBuyerReference = null
    ): self;

    // endregion

    // region Document Seller/Supplier

    /**
     * Set the name of the seller/supplier party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function setDocumentSellerName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the seller/supplier party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function addDocumentSellerName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the seller/supplier party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function setDocumentSellerId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the seller/supplier party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function addDocumentSellerId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the seller/supplier party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function setDocumentSellerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the seller/supplier party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function addDocumentSellerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the seller/supplier party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function setDocumentSellerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the seller/supplier party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function addDocumentSellerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
     * @return self
     */
    abstract public function setDocumentSellerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

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
     * @return self
     */
    abstract public function addDocumentSellerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the seller/supplier party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function setDocumentSellerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the seller/supplier party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function addDocumentSellerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the seller/supplier party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function setDocumentSellerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the seller/supplier party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function addDocumentSellerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the seller/supplier party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function setDocumentSellerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add communication information of the seller/supplier party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function addDocumentSellerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    // endregion

    // region Document Buyer/Customer

    /**
     * Set the name of the buyer/customer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function setDocumentBuyerName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the buyer/customer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function addDocumentBuyerName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the buyer/customer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function setDocumentBuyerId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the buyer/customer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function addDocumentBuyerId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the buyer/customer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function setDocumentBuyerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the buyer/customer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function addDocumentBuyerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the buyer/customer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function setDocumentBuyerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the buyer/customer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function addDocumentBuyerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
     * @return self
     */
    abstract public function setDocumentBuyerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

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
     * @return self
     */
    abstract public function addDocumentBuyerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the buyer/customer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function setDocumentBuyerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the buyer/customer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function addDocumentBuyerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the buyer/customer party
     *
     * @param  null|string $newPersonName
     * @param  null|string $newDepartmentName
     * @param  null|string $newPhoneNumber
     * @param  null|string $newFaxNumber
     * @param  null|string $newEmailAddress
     * @return self
     */
    abstract public function setDocumentBuyerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the buyer/customer party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function addDocumentBuyerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the buyer/customer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function setDocumentBuyerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the buyer/customer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function addDocumentBuyerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    // endregion

    // region Document Tax Representativ party

    /**
     * Set the name of the tax representative party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function setDocumentTaxRepresentativeName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the tax representative party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function addDocumentTaxRepresentativeName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the tax representative party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function setDocumentTaxRepresentativeId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the tax representative party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function addDocumentTaxRepresentativeId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the tax representative party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function setDocumentTaxRepresentativeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the tax representative party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function addDocumentTaxRepresentativeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the tax representative party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function setDocumentTaxRepresentativeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the tax representative party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function addDocumentTaxRepresentativeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
     * @return self
     */
    abstract public function setDocumentTaxRepresentativeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

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
     * @return self
     */
    abstract public function addDocumentTaxRepresentativeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the tax representative party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function setDocumentTaxRepresentativeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the tax representative party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function addDocumentTaxRepresentativeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the tax representative party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function setDocumentTaxRepresentativeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the tax representative party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function addDocumentTaxRepresentativeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the tax representative party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function setDocumentTaxRepresentativeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the tax representative party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function addDocumentTaxRepresentativeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    // endregion

    // region Document Product Enduser

    /**
     * Set the name of the product end-user party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function setDocumentProductEndUserName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the product end-user party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function addDocumentProductEndUserName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the product end-user party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function setDocumentProductEndUserId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the product end-user party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function addDocumentProductEndUserId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the product end-user party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function setDocumentProductEndUserGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the product end-user party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function addDocumentProductEndUserGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the product end-user party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function setDocumentProductEndUserTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the product end-user party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function addDocumentProductEndUserTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
     * @return self
     */
    abstract public function setDocumentProductEndUserAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

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
     * @return self
     */
    abstract public function addDocumentProductEndUserAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the product end-user party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function setDocumentProductEndUserLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the product end-user party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function addDocumentProductEndUserLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the product end-user party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function setDocumentProductEndUserContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the product end-user party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function addDocumentProductEndUserContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the product end-user party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function setDocumentProductEndUserCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the product end-user party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function addDocumentProductEndUserCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    // endregion

    // region Document Ship-To

    /**
     * Set the name of the Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function setDocumentShipToName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function addDocumentShipToName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function setDocumentShipToId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function addDocumentShipToId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function setDocumentShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function addDocumentShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function setDocumentShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function addDocumentShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
     * @return self
     */
    abstract public function setDocumentShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

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
     * @return self
     */
    abstract public function addDocumentShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function setDocumentShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function addDocumentShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function setDocumentShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function addDocumentShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function setDocumentShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function addDocumentShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    // endregion

    // region Document Ultimate Ship-To

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function setDocumentUltimateShipToName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the ultimate Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function addDocumentUltimateShipToName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function setDocumentUltimateShipToId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function addDocumentUltimateShipToId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function setDocumentUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function addDocumentUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function setDocumentUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function addDocumentUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
     * @return self
     */
    abstract public function setDocumentUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

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
     * @return self
     */
    abstract public function addDocumentUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function setDocumentUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function addDocumentUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function setDocumentUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function addDocumentUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function setDocumentUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function addDocumentUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    // endregion

    // region Document Ship-From

    /**
     * Set the name of the Ship-From party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function setDocumentShipFromName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the Ship-From party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function addDocumentShipFromName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the Ship-From party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function setDocumentShipFromId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the Ship-From party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function addDocumentShipFromId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the Ship-From party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function setDocumentShipFromGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the Ship-From party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function addDocumentShipFromGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the Ship-From party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function setDocumentShipFromTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the Ship-From party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function addDocumentShipFromTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
     * @return self
     */
    abstract public function setDocumentShipFromAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

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
     * @return self
     */
    abstract public function addDocumentShipFromAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the Ship-From party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function setDocumentShipFromLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the Ship-From party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function addDocumentShipFromLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the Ship-From party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function setDocumentShipFromContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the Ship-From party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function addDocumentShipFromContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the Ship-From party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function setDocumentShipFromCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the Ship-From party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function addDocumentShipFromCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    // endregion

    // region Document Invoicer

    /**
     * Set the name of the Invoicer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function setDocumentInvoicerName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the Invoicer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function addDocumentInvoicerName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the Invoicer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function setDocumentInvoicerId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the Invoicer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function addDocumentInvoicerId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the Invoicer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function setDocumentInvoicerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the Invoicer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function addDocumentInvoicerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the Invoicer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function setDocumentInvoicerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the Invoicer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function addDocumentInvoicerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
     * @return self
     */
    abstract public function setDocumentInvoicerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

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
     * @return self
     */
    abstract public function addDocumentInvoicerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the Invoicer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function setDocumentInvoicerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the Invoicer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function addDocumentInvoicerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the Invoicer party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function setDocumentInvoicerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the Invoicer party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function addDocumentInvoicerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the Invoicer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function setDocumentInvoicerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the Invoicer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function addDocumentInvoicerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    // endregion

    // region Document Invoicee

    /**
     * Set the name of the Invoicee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function setDocumentInvoiceeName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the Invoicee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function addDocumentInvoiceeName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the Invoicee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function setDocumentInvoiceeId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the Invoicee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function addDocumentInvoiceeId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the Invoicee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function setDocumentInvoiceeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the Invoicee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function addDocumentInvoiceeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the Invoicee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function setDocumentInvoiceeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the Invoicee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function addDocumentInvoiceeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
     * @return self
     */
    abstract public function setDocumentInvoiceeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

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
     * @return self
     */
    abstract public function addDocumentInvoiceeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the Invoicee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function setDocumentInvoiceeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the Invoicee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function addDocumentInvoiceeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the Invoicee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function setDocumentInvoiceeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the Invoicee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function addDocumentInvoiceeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the Invoicee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function setDocumentInvoiceeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the Invoicee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function addDocumentInvoiceeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    // endregion

    // region Document Payee

    /**
     * Set the name of the Payee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function setDocumentPayeeName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the Payee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function addDocumentPayeeName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the Payee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function setDocumentPayeeId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the Payee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function addDocumentPayeeId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the Payee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function setDocumentPayeeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the Payee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function addDocumentPayeeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the Payee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function setDocumentPayeeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the Payee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function addDocumentPayeeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
     * @return self
     */
    abstract public function setDocumentPayeeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

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
     * @return self
     */
    abstract public function addDocumentPayeeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the Payee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function setDocumentPayeeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the Payee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function addDocumentPayeeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the Payee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function setDocumentPayeeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the Payee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function addDocumentPayeeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Set communication information of the Payee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function setDocumentPayeeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the Payee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function addDocumentPayeeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    // endregion

    // region Document Payment

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
     * @return self
     */
    abstract public function setDocumentPaymentMean(
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
    ): self;

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
     * @return self
     */
    abstract public function addDocumentPaymentMean(
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
    ): self;

    /**
     * Set Payment mean (as SEPA credit transfer, German: Überweisung)
     *
     * @param  null|string $newPayeeIban          Payment account identifier
     * @param  null|string $newPayeeAccountName   Name of the payment account
     * @param  null|string $newPayeeProprietaryId National account number (not for SEPA)
     * @param  null|string $newPayeeBic           Identifier of the payment service provider
     * @param  null|string $newPaymentReference   Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    abstract public function setDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null
    ): self;

    /**
     * Add Payment mean (as SEPA credit transfer, German: Überweisung)
     *
     * @param  null|string $newPayeeIban          Payment account identifier
     * @param  null|string $newPayeeAccountName   Name of the payment account
     * @param  null|string $newPayeeProprietaryId National account number (not for SEPA)
     * @param  null|string $newPayeeBic           Identifier of the payment service provider
     * @param  null|string $newPaymentReference   Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    abstract public function addDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null
    ): self;

    /**
     * Set Payment mean (as non-SEPA credit transfer, German: Überweisung)
     *
     * @param  null|string $newPayeeIban          Payment account identifier
     * @param  null|string $newPayeeAccountName   Name of the payment account
     * @param  null|string $newPayeeProprietaryId National account number (not for SEPA)
     * @param  null|string $newPayeeBic           Identifier of the payment service provider
     * @param  null|string $newPaymentReference   Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    abstract public function setDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null
    ): self;

    /**
     * Add Payment mean (as non-SEPA credit transfer, German: Überweisung)
     *
     * @param  null|string $newPayeeIban          Payment account identifier
     * @param  null|string $newPayeeAccountName   Name of the payment account
     * @param  null|string $newPayeeProprietaryId National account number (not for SEPA)
     * @param  null|string $newPayeeBic           Identifier of the payment service provider
     * @param  null|string $newPaymentReference   Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    abstract public function addDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null
    ): self;

    /**
     * Set Payment mean (as SEPA direct debit, German: Lastschrift)
     *
     * @param  null|string $newBuyerIban Identifier of the account to be debited
     * @param  null|string $newMandate   Identification of the mandate reference
     * @return self
     */
    abstract public function setDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null
    ): self;

    /**
     * Add Payment mean (as SEPA direct debit, German: Lastschrift)
     *
     * @param  null|string $newBuyerIban Identifier of the account to be debited
     * @param  null|string $newMandate   Identification of the mandate reference
     * @return self
     */
    abstract public function addDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null
    ): self;

    /**
     * Set Payment mean (as non-SEPA direct debit, German: Lastschrift)
     *
     * @param  null|string $newBuyerIban Identifier of the account to be debited
     * @param  null|string $newMandate   Identification of the mandate reference
     * @return self
     */
    abstract public function setDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null
    ): self;

    /**
     * Add Payment mean (as non SEPA direct debit, German: Lastschrift)
     *
     * @param  null|string $newBuyerIban Identifier of the account to be debited
     * @param  null|string $newMandate   Identification of the mandate reference
     * @return self
     */
    abstract public function addDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null
    ): self;

    /**
     * Set Payment mean (as payment card)
     *
     * @param  null|string $newFinancialCardId     Primary account number (PAN) of the payment card
     * @param  null|string $newFinancialCardHolder Name of the payment card holder
     * @return self
     */
    abstract public function setDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null
    ): self;

    /**
     * Add Payment mean (as payment card)
     *
     * @param  null|string $newFinancialCardId     Primary account number (PAN) of the payment card
     * @param  null|string $newFinancialCardHolder Name of the payment card holder
     * @return self
     */
    abstract public function addDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null
    ): self;

    /**
     * Set Unique bank details of the payee or the seller
     *
     * @param  null|string $newId Creditor identifier
     * @return self
     */
    abstract public function setDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): self;

    /**
     * Add Unique bank details of the payee or the seller
     *
     * @param  null|string $newId Creditor identifier
     * @return self
     */
    abstract public function addDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): self;

    /**
     * Set payment term
     *
     * @param  null|string            $newDescription Text description of the payment terms
     * @param  null|DateTimeInterface $newDueDate     Date by which payment is due
     * @param  null|string            $newMandate     Identification of the mandate reference
     * @return self
     */
    abstract public function setDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null,
        ?string $newMandate = null
    ): self;

    /**
     * Add payment term
     *
     * @param  null|string            $newDescription Text description of the payment terms
     * @param  null|DateTimeInterface $newDueDate     Date by which payment is due
     * @param  null|string            $newMandate     Identification of the mandate reference
     * @return self
     */
    abstract public function addDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null,
        ?string $newMandate = null
    ): self;

    /**
     * Set payment discount terms in last added payment terms
     *
     * @param  null|float             $newBaseAmount      Base amount of the payment discount
     * @param  null|float             $newDiscountAmount  Amount of the payment discount
     * @param  null|float             $newDiscountPercent Percentage of the payment discount
     * @param  null|DateTimeInterface $newBaseDate        Due date reference date
     * @param  null|float             $newBasePeriod      Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit  Maturity period (unit)
     * @return self
     */
    abstract public function setDocumentPaymentDiscountTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newDiscountAmount = null,
        ?float $newDiscountPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null
    ): self;

    /**
     * Add payment discount terms in last added payment terms
     *
     * @param  null|float             $newBaseAmount      Base amount of the payment discount
     * @param  null|float             $newDiscountAmount  Amount of the payment discount
     * @param  null|float             $newDiscountPercent Percentage of the payment discount
     * @param  null|DateTimeInterface $newBaseDate        Due date reference date
     * @param  null|float             $newBasePeriod      Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit  Maturity period (unit)
     * @return self
     */
    abstract public function addDocumentPaymentDiscountTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newDiscountAmount = null,
        ?float $newDiscountPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null
    ): self;

    /**
     * Set payment penalty terms in last added payment terms
     *
     * @param  null|float             $newBaseAmount     Base amount of the payment penalty
     * @param  null|float             $newPenaltyAmount  Amount of the payment penalty
     * @param  null|float             $newPenaltyPercent Percentage of the payment penalty
     * @param  null|DateTimeInterface $newBaseDate       Due date reference date
     * @param  null|float             $newBasePeriod     Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit Maturity period (unit)
     * @return self
     */
    abstract public function setDocumentPaymentPenaltyTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newPenaltyAmount = null,
        ?float $newPenaltyPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null
    ): self;

    /**
     * Add payment penalty terms in last added payment terms
     *
     * @param  null|float             $newBaseAmount     Base amount of the payment penalty
     * @param  null|float             $newPenaltyAmount  Amount of the payment penalty
     * @param  null|float             $newPenaltyPercent Percentage of the payment penalty
     * @param  null|DateTimeInterface $newBaseDate       Due date reference date
     * @param  null|float             $newBasePeriod     Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit Maturity period (unit)
     * @return self
     */
    abstract public function addDocumentPaymentPenaltyTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newPenaltyAmount = null,
        ?float $newPenaltyPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null
    ): self;

    // endregion

    // region Document Tax

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
     * @return self
     */
    abstract public function setDocumentTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newBasisAmount = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
        ?DateTimeInterface $newTaxDueDate = null,
        ?string $newTaxDueCode = null
    ): self;

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
     * @return self
     */
    abstract public function addDocumentTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newBasisAmount = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
        ?DateTimeInterface $newTaxDueDate = null,
        ?string $newTaxDueCode = null
    ): self;

    // endregion

    // region Document Allowances/Charges

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
     * @return self
     */
    abstract public function setDocumentAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null
    ): self;

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
     * @return self
     */
    abstract public function addDocumentAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null
    ): self;

    /**
     * Set Document Logistic Service Charge
     *
     * @param  null|float  $newChargeAmount Amount of the service fee
     * @param  null|string $newDescription  Identification of the service fee
     * @param  null|string $newTaxCategory  Coded description of the tax category
     * @param  null|string $newTaxType      Coded description of the tax type
     * @param  null|float  $newTaxPercent   Tax Rate (Percentage)
     * @return self
     */
    abstract public function setDocumentLogisticServiceCharge(
        ?float $newChargeAmount = null,
        ?string $newDescription = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null
    ): self;

    /**
     * Add Document Logistic Service Charge
     *
     * @param  null|float  $newChargeAmount Amount of the service fee
     * @param  null|string $newDescription  Identification of the service fee
     * @param  null|string $newTaxCategory  Coded description of the tax category
     * @param  null|string $newTaxType      Coded description of the tax type
     * @param  null|float  $newTaxPercent   Tax Rate (Percentage)
     * @return self
     */
    abstract public function addDocumentLogisticServiceCharge(
        ?float $newChargeAmount = null,
        ?string $newDescription = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null
    ): self;

    // endregion

    // region Document Amounts

    /**
     * Prepare the document-level summation (Sets all values to zero)
     *
     * @return self
     */
    abstract public function prepareDocumentSummation(): self;

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
     * @return self
     */
    abstract public function setDocumentSummation(
        ?float $newNetAmount = null,
        ?float $newChargeTotalAmount = null,
        ?float $newDiscountTotalAmount = null,
        ?float $newTaxBasisAmount = null,
        ?float $newTaxTotalAmount = null,
        ?float $newTaxTotalAmount2 = null,
        ?float $newGrossAmount = null,
        ?float $newDueAmount = null,
        ?float $newPrepaidAmount = null,
        ?float $newRoungingAmount = null
    ): self;

    // endregion

    // region Document Positions

    /**
     * Add a new position to document
     *
     * @param  null|string $newPositionId           Identification of the position
     * @param  null|string $newParentPositionId     Identification of the parent position
     * @param  null|string $newLineStatusCode       Indicates whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param  null|string $newLineStatusReasonCode Type to specify whether the invoice line is
     * @return self
     */
    abstract public function addDocumentPosition(
        ?string $newPositionId = null,
        ?string $newParentPositionId = null,
        ?string $newLineStatusCode = null,
        ?string $newLineStatusReasonCode = null
    ): self;

    /**
     * Set text information to latest added position
     *
     * @param  null|string $newContent     Text that contains unstructured information that is relevant to the invoice item
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Code for qualifying the free text for the invoice item
     * @return self
     */
    abstract public function setDocumentPositionNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null
    ): self;

    /**
     * Add text information to latest added position
     *
     * @param  null|string $newContent     Text that contains unstructured information that is relevant to the invoice item
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Code for qualifying the free text for the invoice item
     * @return self
     */
    abstract public function addDocumentPositionNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null
    ): self;

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
     * @return self
     */
    abstract public function setDocumentPositionProductDetails(
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
        ?string $newProductOriginTradeCountry = null
    ): self;

    /**
     * Set product characteristics in latest added position
     *
     * @param  null|string $newProductCharacteristicDescription  Name of the attribute or characteristic ("Colour")
     * @param  null|string $newProductCharacteristicValue        Value of the attribute or characteristic ("Red")
     * @param  null|string $newProductCharacteristicType         Type (Code) of product characteristic
     * @param  null|float  $newProductCharacteristicMeasureValue Value of the characteristic (numerical measured)
     * @param  null|string $newProductCharacteristicMeasureUnit  Unit of value of the characteristic
     * @return self
     */
    abstract public function setDocumentPositionProductCharacteristic(
        ?string $newProductCharacteristicDescription = null,
        ?string $newProductCharacteristicValue = null,
        ?string $newProductCharacteristicType = null,
        ?float $newProductCharacteristicMeasureValue = null,
        ?string $newProductCharacteristicMeasureUnit = null
    ): self;

    /**
     * Add product characteristics in latest added position
     *
     * @param  null|string $newProductCharacteristicDescription  Name of the attribute or characteristic ("Colour")
     * @param  null|string $newProductCharacteristicValue        Value of the attribute or characteristic ("Red")
     * @param  null|string $newProductCharacteristicType         Type (Code) of product characteristic
     * @param  null|float  $newProductCharacteristicMeasureValue Value of the characteristic (numerical measured)
     * @param  null|string $newProductCharacteristicMeasureUnit  Unit of value of the characteristic
     * @return self
     */
    abstract public function addDocumentPositionProductCharacteristic(
        ?string $newProductCharacteristicDescription = null,
        ?string $newProductCharacteristicValue = null,
        ?string $newProductCharacteristicType = null,
        ?float $newProductCharacteristicMeasureValue = null,
        ?string $newProductCharacteristicMeasureUnit = null
    ): self;

    /**
     * Set product classification in latest added position
     *
     * @param  null|string $newProductClassificationCode          Classification identifier
     * @param  null|string $newProductClassificationListId        Identifier for the identification scheme of the item classification
     * @param  null|string $newProductClassificationListVersionId Version of the identification scheme
     * @param  null|string $newProductClassificationCodeClassname Name with which an article can be classified according to type or quality
     * @return self
     */
    abstract public function setDocumentPositionProductClassification(
        ?string $newProductClassificationCode = null,
        ?string $newProductClassificationListId = null,
        ?string $newProductClassificationListVersionId = null,
        ?string $newProductClassificationCodeClassname = null
    ): self;

    /**
     * Add product classification in latest added position
     *
     * @param  null|string $newProductClassificationCode          Classification identifier
     * @param  null|string $newProductClassificationListId        Identifier for the identification scheme of the item classification
     * @param  null|string $newProductClassificationListVersionId Version of the identification scheme
     * @param  null|string $newProductClassificationCodeClassname Name with which an article can be classified according to type or quality
     * @return self
     */
    abstract public function addDocumentPositionProductClassification(
        ?string $newProductClassificationCode = null,
        ?string $newProductClassificationListId = null,
        ?string $newProductClassificationListVersionId = null,
        ?string $newProductClassificationCodeClassname = null
    ): self;

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
     * @return self
     */
    abstract public function setDocumentPositionReferencedProduct(
        ?string $newProductId = null,
        ?string $newProductName = null,
        ?string $newProductDescription = null,
        ?string $newProductSellerId = null,
        ?string $newProductBuyerId = null,
        ?string $newProductGlobalId = null,
        ?string $newProductGlobalIdType = null,
        ?string $newProductIndustryId = null,
        ?float $newProductUnitQuantity = null,
        ?string $newProductUnitQuantityUnit = null
    ): self;

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
     * @return self
     */
    abstract public function addDocumentPositionReferencedProduct(
        ?string $newProductId = null,
        ?string $newProductName = null,
        ?string $newProductDescription = null,
        ?string $newProductSellerId = null,
        ?string $newProductBuyerId = null,
        ?string $newProductGlobalId = null,
        ?string $newProductGlobalIdType = null,
        ?string $newProductIndustryId = null,
        ?float $newProductUnitQuantity = null,
        ?string $newProductUnitQuantityUnit = null
    ): self;

    /**
     * Set the associated seller's order confirmation (line reference).
     *
     * @param  null|string            $newReferenceNumber     Seller's order confirmation number
     * @param  null|string            $newReferenceLineNumber Seller's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Seller's order confirmation date
     * @return self
     */
    abstract public function setDocumentPositionSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an associated seller's order confirmation (line reference).
     *
     * @param  null|string            $newReferenceNumber     Seller's order confirmation number
     * @param  null|string            $newReferenceLineNumber Seller's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Seller's order confirmation date
     * @return self
     */
    abstract public function addDocumentPositionSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set the associated buyer's order confirmation (line reference).
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return self
     */
    abstract public function setDocumentPositionBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an associated buyer's order confirmation (line reference).
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return self
     */
    abstract public function addDocumentPositionBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set the associated quotation (line reference).
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return self
     */
    abstract public function setDocumentPositionQuotationReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an associated quotation (line reference).
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return self
     */
    abstract public function addDocumentPositionQuotationReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set the associated contract (line reference).
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return self
     */
    abstract public function setDocumentPositionContractReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an associated contract (line reference).
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return self
     */
    abstract public function addDocumentPositionContractReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

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
     * @return self
     */
    abstract public function setDocumentPositionAdditionalReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null
    ): self;

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
     * @return self
     */
    abstract public function addDocumentPositionAdditionalReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null
    ): self;

    /**
     * Set an additional ultimate customer order reference (line reference)
     *
     * @param  null|string            $newReferenceNumber     Ultimate customer order number
     * @param  null|string            $newReferenceLineNumber Ultimate customer order line number
     * @param  null|DateTimeInterface $newReferenceDate       Ultimate customer order date
     * @return self
     */
    abstract public function setDocumentPositionUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an additional ultimate customer order reference (line reference)
     *
     * @param  null|string            $newReferenceNumber     Ultimate customer order number
     * @param  null|string            $newReferenceLineNumber Ultimate customer order line number
     * @param  null|DateTimeInterface $newReferenceDate       Ultimate customer order date
     * @return self
     */
    abstract public function addDocumentPositionUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber     Shipping notification number
     * @param  null|string            $newReferenceLineNumber Shipping notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Shipping notification date
     * @return self
     */
    abstract public function setDocumentPositionDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber     Shipping notification number
     * @param  null|string            $newReferenceLineNumber Shipping notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Shipping notification date
     * @return self
     */
    abstract public function addDocumentPositionDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber     Receipt notification number
     * @param  null|string            $newReferenceLineNumber Receipt notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Receipt notification date
     * @return self
     */
    abstract public function setDocumentPositionReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber     Receipt notification number
     * @param  null|string            $newReferenceLineNumber Receipt notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Receipt notification date
     * @return self
     */
    abstract public function addDocumentPositionReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional delivery note
     *
     * @param  null|string            $newReferenceNumber     Delivery slip number
     * @param  null|string            $newReferenceLineNumber Delivery slip line number
     * @param  null|DateTimeInterface $newReferenceDate       Delivery slip date
     * @return self
     */
    abstract public function setDocumentPositionDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Add an additional delivery note
     *
     * @param  null|string            $newReferenceNumber     Delivery slip number
     * @param  null|string            $newReferenceLineNumber Delivery slip line number
     * @param  null|DateTimeInterface $newReferenceDate       Delivery slip date
     * @return self
     */
    abstract public function addDocumentPositionDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self;

    /**
     * Set an additional invoice document (reference to preceding invoice)
     *
     * @param  null|string            $newReferenceNumber     Identification of an invoice previously sent
     * @param  null|string            $newReferenceLineNumber Identification of an invoice line previously sent
     * @param  null|DateTimeInterface $newReferenceDate       Date of the previous invoice
     * @param  null|string            $newTypeCode            Type code of previous invoice
     * @return self
     */
    abstract public function setDocumentPositionInvoiceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null
    ): self;

    /**
     * Add an additional invoice document (reference to preceding invoice)
     *
     * @param  null|string            $newReferenceNumber     Identification of an invoice previously sent
     * @param  null|string            $newReferenceLineNumber Identification of an invoice line previously sent
     * @param  null|DateTimeInterface $newReferenceDate       Date of the previous invoice
     * @param  null|string            $newTypeCode            Type code of previous invoice
     * @return self
     */
    abstract public function addDocumentPositionInvoiceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null
    ): self;

    /**
     * Set the position's gross price
     *
     * @param  null|float  $newGrossPrice                  Unit price excluding sales tax before deduction of the discount on the item price
     * @param  null|float  $newGrossPriceBasisQuantity     Number of item units for which the price applies
     * @param  null|string $newGrossPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return self
     */
    abstract public function setDocumentPositionGrossPrice(
        ?float $newGrossPrice = null,
        ?float $newGrossPriceBasisQuantity = null,
        ?string $newGrossPriceBasisQuantityUnit = null
    ): self;

    /**
     * Set discount or charge to the gross price
     *
     * @param  null|float  $newGrossPriceAllowanceChargeAmount      Discount amount or charge amount on the item price
     * @param  null|bool   $newIsCharge                             Switch for charge/discount
     * @param  null|float  $newGrossPriceAllowanceChargePercent     Discount or charge on the item price in percent
     * @param  null|float  $newGrossPriceAllowanceChargeBasisAmount Base amount of the discount or charge
     * @param  null|string $newGrossPriceAllowanceChargeReason      Reason for discount or charge (free text)
     * @param  null|string $newGrossPriceAllowanceChargeReasonCode  Reason code for discount or charge (free text)
     * @return self
     */
    abstract public function setDocumentPositionGrossPriceAllowanceCharge(
        ?float $newGrossPriceAllowanceChargeAmount = null,
        ?bool $newIsCharge = null,
        ?float $newGrossPriceAllowanceChargePercent = null,
        ?float $newGrossPriceAllowanceChargeBasisAmount = null,
        ?string $newGrossPriceAllowanceChargeReason = null,
        ?string $newGrossPriceAllowanceChargeReasonCode = null
    ): self;

    /**
     * Add discount or charge to the gross price
     *
     * @param  null|float  $newGrossPriceAllowanceChargeAmount      Discount amount or charge amount on the item price
     * @param  null|bool   $newIsCharge                             Switch for charge/discount
     * @param  null|float  $newGrossPriceAllowanceChargePercent     Discount or charge on the item price in percent
     * @param  null|float  $newGrossPriceAllowanceChargeBasisAmount Base amount of the discount or charge
     * @param  null|string $newGrossPriceAllowanceChargeReason      Reason for discount or charge (free text)
     * @param  null|string $newGrossPriceAllowanceChargeReasonCode  Reason code for discount or charge (free text)
     * @return self
     */
    abstract public function addDocumentPositionGrossPriceAllowanceCharge(
        ?float $newGrossPriceAllowanceChargeAmount = null,
        ?bool $newIsCharge = null,
        ?float $newGrossPriceAllowanceChargePercent = null,
        ?float $newGrossPriceAllowanceChargeBasisAmount = null,
        ?string $newGrossPriceAllowanceChargeReason = null,
        ?string $newGrossPriceAllowanceChargeReasonCode = null
    ): self;

    /**
     * Set the position's net price
     *
     * @param  null|float  $newNetPrice                  Unit price excluding sales tax after deduction of the discount on the item price
     * @param  null|float  $newNetPriceBasisQuantity     Number of item units for which the price applies
     * @param  null|string $newNetPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return self
     */
    abstract public function setDocumentPositionNetPrice(
        ?float $newNetPrice = null,
        ?float $newNetPriceBasisQuantity = null,
        ?string $newNetPriceBasisQuantityUnit = null
    ): self;

    /**
     * Set the position's net price included tax
     *
     * @param  null|string $newTaxCategory         Coded description of the tax category
     * @param  null|string $newTaxType             Coded description of the tax type
     * @param  null|float  $newTaxAmount           Tax total amount
     * @param  null|float  $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode Reason for tax exemption (Code)
     * @return self
     */
    abstract public function setDocumentPositionNetPriceTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): self;

    /**
     * Set the position's quantities
     *
     * @param  null|float  $newQuantity               Invoiced quantity
     * @param  null|string $newQuantityUnit           Invoiced quantity unit
     * @param  null|float  $newChargeFreeQuantity     Charge Free quantity
     * @param  null|string $newChargeFreeQuantityUnit Charge Free quantity unit
     * @param  null|float  $newPackageQuantity        Package quantity
     * @param  null|string $newPackageQuantityUnit    Package quantity unit
     * @return self
     */
    abstract public function setDocumentPositionQuantities(
        ?float $newQuantity = null,
        ?string $newQuantityUnit = null,
        ?float $newChargeFreeQuantity = null,
        ?string $newChargeFreeQuantityUnit = null,
        ?float $newPackageQuantity = null,
        ?string $newPackageQuantityUnit = null
    ): self;

    /**
     * Set the name of the Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function setDocumentPositionShipToName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function addDocumentPositionShipToName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function setDocumentPositionShipToId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function addDocumentPositionShipToId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function setDocumentPositionShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function addDocumentPositionShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function setDocumentPositionShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function addDocumentPositionShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
     * @return self
     */
    abstract public function setDocumentPositionShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

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
     * @return self
     */
    abstract public function addDocumentPositionShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function setDocumentPositionShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function addDocumentPositionShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function setDocumentPositionShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function addDocumentPositionShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add communication information of the Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function setDocumentPositionShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add a communication information of the Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function addDocumentPositionShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function setDocumentPositionUltimateShipToName(
        ?string $newName = null
    ): self;

    /**
     * Add a name of the ultimate Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function addDocumentPositionUltimateShipToName(
        ?string $newName = null
    ): self;

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function setDocumentPositionUltimateShipToId(
        ?string $newId = null
    ): self;

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function addDocumentPositionUltimateShipToId(
        ?string $newId = null
    ): self;

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function setDocumentPositionUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function addDocumentPositionUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self;

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function setDocumentPositionUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function addDocumentPositionUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self;

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
     * @return self
     */
    abstract public function setDocumentPositionUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

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
     * @return self
     */
    abstract public function addDocumentPositionUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self;

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function setDocumentPositionUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Add a legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function addDocumentPositionUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self;

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function setDocumentPositionUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function addDocumentPositionUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self;

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function setDocumentPositionUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function addDocumentPositionUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self;

    /**
     * Set the date of the delivery
     *
     * @param  null|DateTimeInterface $newDate
     * @return self
     */
    abstract public function setDocumentPositionSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): self;

    /**
     * Set the position's start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    abstract public function setDocumentPositionBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null
    ): self;

    /**
     * Add a position's start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    abstract public function addDocumentPositionBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null
    ): self;

    /**
     * Set the position's tax information
     *
     * @param  null|string $newTaxCategory         Coded description of the tax category
     * @param  null|string $newTaxType             Coded description of the tax type
     * @param  null|float  $newTaxAmount           Tax total amount
     * @param  null|float  $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode Reason for tax exemption (Code)
     * @return self
     */
    abstract public function setDocumentPositionTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): self;

    /**
     * Add a position's tax information
     *
     * @param  null|string $newTaxCategory         Coded description of the tax category
     * @param  null|string $newTaxType             Coded description of the tax type
     * @param  null|float  $newTaxAmount           Tax total amount
     * @param  null|float  $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode Reason for tax exemption (Code)
     * @return self
     */
    abstract public function addDocumentPositionTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): self;

    /**
     * Set Document position Allowance/Charge
     *
     * @param  null|bool   $newChargeIndicator           Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newAllowanceChargeReason     Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return self
     */
    abstract public function setDocumentPositionAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null
    ): self;

    /**
     * Add Document position Allowance/Charge
     *
     * @param  null|bool   $newChargeIndicator           Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newAllowanceChargeReason     Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return self
     */
    abstract public function addDocumentPositionAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null
    ): self;

    /**
     * Set the document position summation
     *
     * @param  null|float $newNetAmount           Net amount
     * @param  null|float $newChargeTotalAmount   Sum of the charges
     * @param  null|float $newDiscountTotalAmount Sum of the discounts
     * @param  null|float $newTaxTotalAmount      Total amount of the line (in the invoice currency)
     * @param  null|float $newGrossAmount         Total invoice line amount including sales tax
     * @return self
     */
    abstract public function setDocumentPositionSummation(
        ?float $newNetAmount = null,
        ?float $newChargeTotalAmount = null,
        ?float $newDiscountTotalAmount = null,
        ?float $newTaxTotalAmount = null,
        ?float $newGrossAmount = null
    ): self;

    /**
     * Set a position's posting reference
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return self
     */
    abstract public function setDocumentPositionPostingReference(
        ?string $newType = null,
        ?string $newAccountId = null
    ): self;

    /**
     * Add a position's posting reference
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return self
     */
    abstract public function addDocumentPositionPostingReference(
        ?string $newType = null,
        ?string $newAccountId = null
    ): self;

    /**
     * Get the content by type
     *
     * @return string
     */
    protected function getContentByType(string $contentType): string
    {
        return $this->documentSerializer->serialize(
            $this->getDocumentRootObject(),
            $contentType,
            SerializationContext::create()->setGroups($this->getCurrentDocumentFormatProvider()->getSerializerGroups())
        );
    }

    // endregion
}
