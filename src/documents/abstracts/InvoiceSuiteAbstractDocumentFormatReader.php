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
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Exception\RuntimeException;

/**
 * Class representing methods for a reader
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
abstract class InvoiceSuiteAbstractDocumentFormatReader
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
    }

    /**
     * Deserialize from content (will guess)
     *
     * @param  string                                   $fromContent
     * @throws InvoiceSuiteUnknownContentException
     * @return InvoiceSuiteAbstractDocumentFormatReader
     */
    public function deserializeFromContent(string $fromContent): self
    {
        if (InvoiceSuiteContentTypeResolver::resolveContentType($fromContent) === InvoiceSuiteContentTypeResolver::JSON) {
            return $this->deserializeFromJsonContent($fromContent);
        }

        if (InvoiceSuiteContentTypeResolver::resolveContentType($fromContent) === InvoiceSuiteContentTypeResolver::XML) {
            return $this->deserializeFromXmlContent($fromContent);
        }

        throw new InvoiceSuiteUnknownContentException();
    }

    // endregion

    // region Document DTO

    /**
     * Create a DTO from this document
     *
     * @param  null|InvoiceSuiteDocumentHeaderDTO $newDocumentDTO Data-Transfer-Object
     * @return self
     */
    abstract public function convertToDTO(
        ?InvoiceSuiteDocumentHeaderDTO &$newDocumentDTO
    ): self;

    // endregion

    // region Document Generals

    /**
     * Gets the document number (e.g. invoice number)
     *
     * @param  null|string $newDocumentNo The document no issued by the seller
     * @return static
     */
    abstract public function getDocumentNo(
        ?string &$newDocumentNo
    ): self;

    /**
     * Gets the document type code
     *
     * @param  null|string $newDocumentType The type of the document
     * @return static
     */
    abstract public function getDocumentType(
        ?string &$newDocumentType
    ): self;

    /**
     * Gets the document description
     *
     * @param  null|string $newDocumentDescription The documenttype as free text
     * @return self
     */
    abstract public function getDocumentDescription(
        ?string &$newDocumentDescription
    ): self;

    /**
     * Gets the document language
     *
     * @param  null|string $newDocumentLanguage Language indicator. The language code in which the document was written
     * @return self
     */
    abstract public function getDocumentLanguage(
        ?string &$newDocumentLanguage
    ): self;

    /**
     * Gets the document date (e.g. invoice date)
     *
     * @param  null|DateTimeInterface $newDocumentDate Date of the document. The date when the document was issued by the seller
     * @return self
     */
    abstract public function getDocumentDate(
        ?DateTimeInterface &$newDocumentDate
    ): self;

    /**
     * Gets the document period
     *
     * @param  null|DateTimeInterface $newCompleteDate Contractual due date of the document
     * @return self
     */
    abstract public function getDocumentCompleteDate(
        ?DateTimeInterface &$newCompleteDate
    ): self;

    /**
     * Gets the document currency
     *
     * @param  null|string $newDocumentCurrency Code for the invoice currency
     * @return self
     */
    abstract public function getDocumentCurrency(
        ?string &$newDocumentCurrency
    ): self;

    /**
     * Gets the document tax currency
     *
     * @param  null|string $newDocumentTaxCurrency Code for the tax currency
     * @return self
     */
    abstract public function getDocumentTaxCurrency(
        ?string &$newDocumentTaxCurrency
    ): self;

    /**
     * Gets the status of the copy indicator
     *
     * @param  null|bool $newDocumentIsCopy Indicates that the document is a copy
     * @return self
     */
    abstract public function getDocumentIsCopy(
        ?bool &$newDocumentIsCopy
    ): self;

    /**
     * Gets the status of the test indicator
     *
     * @param  null|bool $newDocumentIsTest Indicates that the document is a test
     * @return self
     */
    abstract public function getDocumentIsTest(
        ?bool &$newDocumentIsTest
    ): self;

    /**
     * Go to the first document of the document
     *
     * @return bool
     */
    abstract public function firstDocumentNote(): bool;

    /**
     * Go to the next document of the document
     *
     * @return bool
     */
    abstract public function nextDocumentNote(): bool;

    /**
     * Get a note to the document.
     *
     * @param  null|string $newContent     Free text containing unstructured information that is relevant to the invoice as a whole
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Qualification of the free text for the invoice
     * @return self
     */
    abstract public function getDocumentNote(
        ?string &$newContent,
        ?string &$newContentCode,
        ?string &$newSubjectCode
    ): self;

    /**
     * Go to the first billing period
     *
     * @return bool
     */
    abstract public function firstDocumentBillingPeriod(): bool;

    /**
     * Go to the next billing period
     *
     * @return bool
     */
    abstract public function nextDocumentBillingPeriod(): bool;

    /**
     * Get the start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    abstract public function getDocumentBillingPeriod(
        ?DateTimeInterface &$newStartDate,
        ?DateTimeInterface &$newEndDate,
        ?string &$newDescription,
    ): self;

    /**
     * Go to the first posting reference
     *
     * @return bool
     */
    abstract public function firstDocumentPostingReference(): bool;

    /**
     * Go to the next posting reference
     *
     * @return bool
     */
    abstract public function nextDocumentPostingReference(): bool;

    /**
     * Get a posting reference
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return self
     */
    abstract public function getDocumentPostingReference(
        ?string &$newType,
        ?string &$newAccountId
    ): self;

    // endregion

    // region Document References

    /**
     * Go to the first associated seller's order confirmation
     *
     * @return bool
     */
    abstract public function firstDocumentSellerOrderReference(): bool;

    /**
     * Go to the next associated seller's order confirmation
     *
     * @return bool
     */
    abstract public function nextDocumentSellerOrderReference(): bool;

    /**
     * Get the associated seller's order confirmation.
     *
     * @param  null|string            $newReferenceNumber Seller's order confirmation number
     * @param  null|DateTimeInterface $newReferenceDate   Seller's order confirmation date
     * @return self
     */
    abstract public function getDocumentSellerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self;

    /**
     * Go to the first associated buyer's order confirmation
     *
     * @return bool
     */
    abstract public function firstDocumentBuyerOrderReference(): bool;

    /**
     * Go to the next associated buyer's order confirmation
     *
     * @return bool
     */
    abstract public function nextDocumentBuyerOrderReference(): bool;

    /**
     * Get the associated buyer's order confirmation.
     *
     * @param  null|string            $newReferenceNumber Buyer's order number
     * @param  null|DateTimeInterface $newReferenceDate   Buyer's order date
     * @return self
     */
    abstract public function getDocumentBuyerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self;

    /**
     * Go to the first associated quotation
     *
     * @return bool
     */
    abstract public function firstDocumentQuotationReference(): bool;

    /**
     * Go to the next associated quotation
     *
     * @return bool
     */
    abstract public function nextDocumentQuotationReference(): bool;

    /**
     * Get the associated quotation
     *
     * @param  null|string            $newReferenceNumber Quotation number
     * @param  null|DateTimeInterface $newReferenceDate   Quotation date
     * @return self
     */
    abstract public function getDocumentQuotationReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self;

    /**
     * Go to the first associated contract
     *
     * @return bool
     */
    abstract public function firstDocumentContractReference(): bool;

    /**
     * Go to the next associated contract
     *
     * @return bool
     */
    abstract public function nextDocumentContractReference(): bool;

    /**
     * Get the associated contract
     *
     * @param  null|string            $newReferenceNumber Contract number
     * @param  null|DateTimeInterface $newReferenceDate   Contract date
     * @return self
     */
    abstract public function getDocumentContractReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self;

    /**
     * Go to the first additional associated document
     *
     * @return bool
     */
    abstract public function firstDocumentAdditionalReference(): bool;

    /**
     * Go to the next additional associated document
     *
     * @return bool
     */
    abstract public function nextDocumentAdditionalReference(): bool;

    /**
     * Get an additional associated document
     *
     * @param  null|string                 $newReferenceNumber        Additional document number
     * @param  null|DateTimeInterface      $newReferenceDate          Additional document date
     * @param  null|string                 $newTypeCode               Additional document type code
     * @param  null|string                 $newReferenceTypeCode      Additional document reference-type code
     * @param  null|string                 $newDescription            Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment Additional document attachment
     * @return self
     */
    abstract public function getDocumentAdditionalReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode,
        ?string &$newReferenceTypeCode,
        ?string &$newDescription,
        ?InvoiceSuiteAttachment &$newInvoiceSuiteAttachment
    ): self;

    /**
     * Go to the first additional invoice document (reference to preceding invoice)
     *
     * @return bool
     */
    abstract public function firstDocumentInvoiceReference(): bool;

    /**
     * Go to the next additional invoice document (reference to preceding invoice)
     *
     * @return bool
     */
    abstract public function nextDocumentInvoiceReference(): bool;

    /**
     * Get an additional invoice document (reference to preceding invoice)
     *
     * @param  null|string            $newReferenceNumber Identification of an invoice previously sent
     * @param  null|DateTimeInterface $newReferenceDate   Date of the previous invoice
     * @param  null|string            $newTypeCode        Type code of previous invoice
     * @return self
     */
    abstract public function getDocumentInvoiceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode
    ): self;

    /**
     * Go to the first additional project reference
     *
     * @return bool
     */
    abstract public function firstDocumentProjectReference(): bool;

    /**
     * Go to the next additional project reference
     *
     * @return bool
     */
    abstract public function nextDocumentProjectReference(): bool;

    /**
     * Get an additional project reference
     *
     * @param  null|string $newReferenceNumber Project number
     * @param  null|string $newName            Project name
     * @return self
     */
    abstract public function getDocumentProjectReference(
        ?string &$newReferenceNumber,
        ?string &$newName
    ): self;

    /**
     * Go to the first additional ultimate customer order reference
     *
     * @return bool
     */
    abstract public function firstDocumentUltimateCustomerOrderReference(): bool;

    /**
     * Go to the next additional ultimate customer order reference
     *
     * @return bool
     */
    abstract public function nextDocumentUltimateCustomerOrderReference(): bool;

    /**
     * Get an additional ultimate customer order reference
     *
     * @param  null|string            $newReferenceNumber Ultimate customer order number
     * @param  null|DateTimeInterface $newReferenceDate   Ultimate customer order date
     * @return self
     */
    abstract public function getDocumentUltimateCustomerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self;

    /**
     * Go to the first additional despatch advice reference
     *
     * @return bool
     */
    abstract public function firstDocumentDespatchAdviceReference(): bool;

    /**
     * Go to the next additional despatch advice reference
     *
     * @return bool
     */
    abstract public function nextDocumentDespatchAdviceReference(): bool;

    /**
     * Get an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber Shipping notification number
     * @param  null|DateTimeInterface $newReferenceDate   Shipping notification date
     * @return self
     */
    abstract public function getDocumentDespatchAdviceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self;

    /**
     * Go to the first additional receiving advice reference
     *
     * @return bool
     */
    abstract public function firstDocumentReceivingAdviceReference(): bool;

    /**
     * Go to the next additional Receiving advice reference
     *
     * @return bool
     */
    abstract public function nextDocumentReceivingAdviceReference(): bool;

    /**
     * Get an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber Receipt notification number
     * @param  null|DateTimeInterface $newReferenceDate   Receipt notification date
     * @return self
     */
    abstract public function getDocumentReceivingAdviceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self;

    /**
     * Go to the first additional delivery note reference
     *
     * @return bool
     */
    abstract public function firstDocumentDeliveryNoteReference(): bool;

    /**
     * Go to the next additional delivery note reference
     *
     * @return bool
     */
    abstract public function nextDocumentDeliveryNoteReference(): bool;

    /**
     * Get an additional delivery note reference
     *
     * @param  null|string            $newReferenceNumber Delivery slip number
     * @param  null|DateTimeInterface $newReferenceDate   Delivery slip date
     * @return self
     */
    abstract public function getDocumentDeliveryNoteReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self;

    /**
     * Get the date of the delivery
     *
     * @param  null|DateTimeInterface $newDate Actual delivery date
     * @return self
     */
    abstract public function getDocumentSupplyChainEvent(
        ?DateTimeInterface &$newDate
    ): self;

    /**
     * Get the identifier assigned by the buyer and used for internal routing
     *
     * @param  null|string $newBuyerReference An identifier assigned by the buyer and used for internal routing
     * @return self
     */
    abstract public function getDocumentBuyerReference(
        ?string &$newBuyerReference
    ): self;

    // endregion

    // region Document Seller/Supplier

    /**
     * Get the name of the seller/supplier party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function getDocumentSellerName(
        ?string &$newName
    ): self;

    /**
     * Go to the first ID of the seller/supplier party
     *
     * @return bool
     */
    abstract public function firstDocumentSellerId(): bool;

    /**
     * Go to the next ID of the seller/supplier party
     *
     * @return bool
     */
    abstract public function nextDocumentSellerId(): bool;

    /**
     * Get the ID of the seller/supplier party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function getDocumentSellerId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the seller/supplier party
     *
     * @return bool
     */
    abstract public function firstDocumentSellerGlobalId(): bool;

    /**
     * Go to the next global ID of the seller/supplier party
     *
     * @return bool
     */
    abstract public function nextDocumentSellerGlobalId(): bool;

    /**
     * Get the Global ID of the seller/supplier party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function getDocumentSellerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self;

    /**
     * Go to the first Tax Registration of the seller/supplier party
     *
     * @return bool
     */
    abstract public function firstDocumentSellerTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the seller/supplier party
     *
     * @return bool
     */
    abstract public function nextDocumentSellerTaxRegistration(): bool;

    /**
     * Get the Tax Registration of the seller/supplier party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function getDocumentSellerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self;

    /**
     * Go to the first address of the seller/supplier party
     *
     * @return bool
     */
    abstract public function firstDocumentSellerAddress(): bool;

    /**
     * Go to the next address of the seller/supplier party
     *
     * @return bool
     */
    abstract public function nextDocumentSellerAddress(): bool;

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
     * @return self
     */
    abstract public function getDocumentSellerAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self;

    /**
     * Go to the first the legal information of the seller/supplier party
     *
     * @return bool
     */
    abstract public function firstDocumentSellerLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the seller/supplier party
     *
     * @return bool
     */
    abstract public function nextDocumentSellerLegalOrganisation(): bool;

    /**
     * Get the legal information of the seller/supplier party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function getDocumentSellerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self;

    /**
     * Go to the first contact information of the seller/supplier party
     *
     * @return bool
     */
    abstract public function firstDocumentSellerContact(): bool;

    /**
     * Go to the next contact information of the seller/supplier party
     *
     * @return bool
     */
    abstract public function nextDocumentSellerContact(): bool;

    /**
     * Get the contact information of the seller/supplier party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function getDocumentSellerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self;

    /**
     * Go to the first communication information of the seller/supplier party
     *
     * @return bool
     */
    abstract public function firstDocumentSellerCommunication(): bool;

    /**
     * Go to the next communication information of the seller/supplier party
     *
     * @return bool
     */
    abstract public function nextDocumentSellerCommunication(): bool;

    /**
     * Get communication information of the seller/supplier party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function getDocumentSellerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self;

    // endregion

    // region Document Buyer/Customer

    /**
     * Get the name of the buyer/customer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function getDocumentBuyerName(
        ?string &$newName
    ): self;

    /**
     * Go to the first ID of the buyer/customer party
     *
     * @return bool
     */
    abstract public function firstDocumentBuyerId(): bool;

    /**
     * Go to the next ID of the buyer/customer party
     *
     * @return bool
     */
    abstract public function nextDocumentBuyerId(): bool;

    /**
     * Get the ID of the buyer/customer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function getDocumentBuyerId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the buyer/customer party
     *
     * @return bool
     */
    abstract public function firstDocumentBuyerGlobalId(): bool;

    /**
     * Go to the next global ID of the buyer/customer party
     *
     * @return bool
     */
    abstract public function nextDocumentBuyerGlobalId(): bool;

    /**
     * Get the Global ID of the buyer/customer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function getDocumentBuyerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self;

    /**
     * Go to the first Tax Registration of the buyer/customer party
     *
     * @return bool
     */
    abstract public function firstDocumentBuyerTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the buyer/customer party
     *
     * @return bool
     */
    abstract public function nextDocumentBuyerTaxRegistration(): bool;

    /**
     * Get the Tax Registration of the buyer/customer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function getDocumentBuyerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self;

    /**
     * Go to the first address of the buyer/customer party
     *
     * @return bool
     */
    abstract public function firstDocumentBuyerAddress(): bool;

    /**
     * Go to the next address of the buyer/customer party
     *
     * @return bool
     */
    abstract public function nextDocumentBuyerAddress(): bool;

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
     * @return self
     */
    abstract public function getDocumentBuyerAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self;

    /**
     * Go to the first the legal information of the buyer/customer party
     *
     * @return bool
     */
    abstract public function firstDocumentBuyerLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the buyer/customer party
     *
     * @return bool
     */
    abstract public function nextDocumentBuyerLegalOrganisation(): bool;

    /**
     * Get the legal information of the buyer/customer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function getDocumentBuyerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self;

    /**
     * Go to the first contact information of the buyer/customer party
     *
     * @return bool
     */
    abstract public function firstDocumentBuyerContact(): bool;

    /**
     * Go to the next contact information of the buyer/customer party
     *
     * @return bool
     */
    abstract public function nextDocumentBuyerContact(): bool;

    /**
     * Get the contact information of the buyer/customer party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function getDocumentBuyerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self;

    /**
     * Go to the first communication information of the buyer/customer party
     *
     * @return bool
     */
    abstract public function firstDocumentBuyerCommunication(): bool;

    /**
     * Go to the next communication information of the buyer/customer party
     *
     * @return bool
     */
    abstract public function nextDocumentBuyerCommunication(): bool;

    /**
     * Get communication information of the buyer/customer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function getDocumentBuyerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self;

    // endregion

    // region Document Tax Representativ party

    /**
     * Get the name of the tax representative party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function getDocumentTaxRepresentativeName(
        ?string &$newName
    ): self;

    /**
     * Go to the first ID of the tax representative party
     *
     * @return bool
     */
    abstract public function firstDocumentTaxRepresentativeId(): bool;

    /**
     * Go to the next ID of the tax representative party
     *
     * @return bool
     */
    abstract public function nextDocumentTaxRepresentativeId(): bool;

    /**
     * Get the ID of the tax representative party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function getDocumentTaxRepresentativeId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the tax representative party
     *
     * @return bool
     */
    abstract public function firstDocumentTaxRepresentativeGlobalId(): bool;

    /**
     * Go to the next global ID of the tax representative party
     *
     * @return bool
     */
    abstract public function nextDocumentTaxRepresentativeGlobalId(): bool;

    /**
     * Get the Global ID of the tax representative party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function getDocumentTaxRepresentativeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self;

    /**
     * Go to the first Tax Registration of the tax representative party
     *
     * @return bool
     */
    abstract public function firstDocumentTaxRepresentativeTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the tax representative party
     *
     * @return bool
     */
    abstract public function nextDocumentTaxRepresentativeTaxRegistration(): bool;

    /**
     * Get the Tax Registration of the tax representative party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function getDocumentTaxRepresentativeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self;

    /**
     * Go to the first address of the tax representative party
     *
     * @return bool
     */
    abstract public function firstDocumentTaxRepresentativeAddress(): bool;

    /**
     * Go to the next address of the tax representative party
     *
     * @return bool
     */
    abstract public function nextDocumentTaxRepresentativeAddress(): bool;

    /**
     * Get the address of the tax representative party
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
    abstract public function getDocumentTaxRepresentativeAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self;

    /**
     * Go to the first the legal information of the tax representative party
     *
     * @return bool
     */
    abstract public function firstDocumentTaxRepresentativeLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the tax representative party
     *
     * @return bool
     */
    abstract public function nextDocumentTaxRepresentativeLegalOrganisation(): bool;

    /**
     * Get the legal information of the tax representative party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function getDocumentTaxRepresentativeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self;

    /**
     * Go to the first contact information of the tax representative party
     *
     * @return bool
     */
    abstract public function firstDocumentTaxRepresentativeContact(): bool;

    /**
     * Go to the next contact information of the tax representative party
     *
     * @return bool
     */
    abstract public function nextDocumentTaxRepresentativeContact(): bool;

    /**
     * Get the contact information of the tax representative party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function getDocumentTaxRepresentativeContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self;

    /**
     * Go to the first communication information of the tax representative party
     *
     * @return bool
     */
    abstract public function firstDocumentTaxRepresentativeCommunication(): bool;

    /**
     * Go to the next communication information of the tax representative party
     *
     * @return bool
     */
    abstract public function nextDocumentTaxRepresentativeCommunication(): bool;

    /**
     * Get communication information of the tax representative party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function getDocumentTaxRepresentativeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self;

    // endregion

    // region Document Product Enduser

    /**
     * Get the name of the product end-user party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function getDocumentProductEndUserName(
        ?string &$newName
    ): self;

    /**
     * Go to the first ID of the product end-user party
     *
     * @return bool
     */
    abstract public function firstDocumentProductEndUserId(): bool;

    /**
     * Go to the next ID of the product end-user party
     *
     * @return bool
     */
    abstract public function nextDocumentProductEndUserId(): bool;

    /**
     * Get the ID of the product end-user party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function getDocumentProductEndUserId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the product end-user party
     *
     * @return bool
     */
    abstract public function firstDocumentProductEndUserGlobalId(): bool;

    /**
     * Go to the next global ID of the product end-user party
     *
     * @return bool
     */
    abstract public function nextDocumentProductEndUserGlobalId(): bool;

    /**
     * Get the Global ID of the product end-user party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function getDocumentProductEndUserGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self;

    /**
     * Go to the first Tax Registration of the product end-user party
     *
     * @return bool
     */
    abstract public function firstDocumentProductEndUserTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the product end-user party
     *
     * @return bool
     */
    abstract public function nextDocumentProductEndUserTaxRegistration(): bool;

    /**
     * Get the Tax Registration of the product end-user party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function getDocumentProductEndUserTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self;

    /**
     * Go to the first address of the product end-user party
     *
     * @return bool
     */
    abstract public function firstDocumentProductEndUserAddress(): bool;

    /**
     * Go to the next address of the product end-user party
     *
     * @return bool
     */
    abstract public function nextDocumentProductEndUserAddress(): bool;

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
     * @return self
     */
    abstract public function getDocumentProductEndUserAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self;

    /**
     * Go to the first the legal information of the product end-user party
     *
     * @return bool
     */
    abstract public function firstDocumentProductEndUserLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the product end-user party
     *
     * @return bool
     */
    abstract public function nextDocumentProductEndUserLegalOrganisation(): bool;

    /**
     * Get the legal information of the product end-user party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function getDocumentProductEndUserLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self;

    /**
     * Go to the first contact information of the product end-user party
     *
     * @return bool
     */
    abstract public function firstDocumentProductEndUserContact(): bool;

    /**
     * Go to the next contact information of the product end-user party
     *
     * @return bool
     */
    abstract public function nextDocumentProductEndUserContact(): bool;

    /**
     * Get the contact information of the product end-user party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function getDocumentProductEndUserContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self;

    /**
     * Go to the first communication information of the product end-user party
     *
     * @return bool
     */
    abstract public function firstDocumentProductEndUserCommunication(): bool;

    /**
     * Go to the next communication information of the product end-user party
     *
     * @return bool
     */
    abstract public function nextDocumentProductEndUserCommunication(): bool;

    /**
     * Get communication information of the product end-user party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function getDocumentProductEndUserCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self;

    // endregion

    // region Document Ship-To

    /**
     * Get the name of the Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function getDocumentShipToName(
        ?string &$newName
    ): self;

    /**
     * Go to the first ID of the Ship-To party
     *
     * @return bool
     */
    abstract public function firstDocumentShipToId(): bool;

    /**
     * Go to the next ID of the Ship-To party
     *
     * @return bool
     */
    abstract public function nextDocumentShipToId(): bool;

    /**
     * Get the ID of the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function getDocumentShipToId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the Ship-To party
     *
     * @return bool
     */
    abstract public function firstDocumentShipToGlobalId(): bool;

    /**
     * Go to the next global ID of the Ship-To party
     *
     * @return bool
     */
    abstract public function nextDocumentShipToGlobalId(): bool;

    /**
     * Get the Global ID of the Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function getDocumentShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self;

    /**
     * Go to the first Tax Registration of the Ship-To party
     *
     * @return bool
     */
    abstract public function firstDocumentShipToTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the Ship-To party
     *
     * @return bool
     */
    abstract public function nextDocumentShipToTaxRegistration(): bool;

    /**
     * Get the Tax Registration of the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function getDocumentShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self;

    /**
     * Go to the first address of the Ship-To party
     *
     * @return bool
     */
    abstract public function firstDocumentShipToAddress(): bool;

    /**
     * Go to the next address of the Ship-To party
     *
     * @return bool
     */
    abstract public function nextDocumentShipToAddress(): bool;

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
     * @return self
     */
    abstract public function getDocumentShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self;

    /**
     * Go to the first the legal information of the Ship-To party
     *
     * @return bool
     */
    abstract public function firstDocumentShipToLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the Ship-To party
     *
     * @return bool
     */
    abstract public function nextDocumentShipToLegalOrganisation(): bool;

    /**
     * Get the legal information of the Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function getDocumentShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self;

    /**
     * Go to the first contact information of the Ship-To party
     *
     * @return bool
     */
    abstract public function firstDocumentShipToContact(): bool;

    /**
     * Go to the next contact information of the Ship-To party
     *
     * @return bool
     */
    abstract public function nextDocumentShipToContact(): bool;

    /**
     * Get the contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function getDocumentShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self;

    /**
     * Go to the first communication information of the Ship-To party
     *
     * @return bool
     */
    abstract public function firstDocumentShipToCommunication(): bool;

    /**
     * Go to the next communication information of the Ship-To party
     *
     * @return bool
     */
    abstract public function nextDocumentShipToCommunication(): bool;

    /**
     * Get communication information of the Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function getDocumentShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self;

    // endregion

    // region Document Ultimate Ship-To

    /**
     * Get the name of the ultimate Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function getDocumentUltimateShipToName(
        ?string &$newName
    ): self;

    /**
     * Go to the first ID of the ultimate Ship-To party
     *
     * @return bool
     */
    abstract public function firstDocumentUltimateShipToId(): bool;

    /**
     * Go to the next ID of the ultimate Ship-To party
     *
     * @return bool
     */
    abstract public function nextDocumentUltimateShipToId(): bool;

    /**
     * Get the ID of the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function getDocumentUltimateShipToId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the ultimate Ship-To party
     *
     * @return bool
     */
    abstract public function firstDocumentUltimateShipToGlobalId(): bool;

    /**
     * Go to the next global ID of the ultimate Ship-To party
     *
     * @return bool
     */
    abstract public function nextDocumentUltimateShipToGlobalId(): bool;

    /**
     * Get the Global ID of the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function getDocumentUltimateShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self;

    /**
     * Go to the first Tax Registration of the ultimate Ship-To party
     *
     * @return bool
     */
    abstract public function firstDocumentUltimateShipToTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the ultimate Ship-To party
     *
     * @return bool
     */
    abstract public function nextDocumentUltimateShipToTaxRegistration(): bool;

    /**
     * Get the Tax Registration of the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function getDocumentUltimateShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self;

    /**
     * Go to the first address of the ultimate Ship-To party
     *
     * @return bool
     */
    abstract public function firstDocumentUltimateShipToAddress(): bool;

    /**
     * Go to the next address of the ultimate Ship-To party
     *
     * @return bool
     */
    abstract public function nextDocumentUltimateShipToAddress(): bool;

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
     * @return self
     */
    abstract public function getDocumentUltimateShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self;

    /**
     * Go to the first the legal information of the ultimate Ship-To party
     *
     * @return bool
     */
    abstract public function firstDocumentUltimateShipToLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the ultimate Ship-To party
     *
     * @return bool
     */
    abstract public function nextDocumentUltimateShipToLegalOrganisation(): bool;

    /**
     * Get the legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function getDocumentUltimateShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self;

    /**
     * Go to the first contact information of the ultimate Ship-To party
     *
     * @return bool
     */
    abstract public function firstDocumentUltimateShipToContact(): bool;

    /**
     * Go to the next contact information of the ultimate Ship-To party
     *
     * @return bool
     */
    abstract public function nextDocumentUltimateShipToContact(): bool;

    /**
     * Get the contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function getDocumentUltimateShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self;

    /**
     * Go to the first communication information of the ultimate Ship-To party
     *
     * @return bool
     */
    abstract public function firstDocumentUltimateShipToCommunication(): bool;

    /**
     * Go to the next communication information of the ultimate Ship-To party
     *
     * @return bool
     */
    abstract public function nextDocumentUltimateShipToCommunication(): bool;

    /**
     * Get communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function getDocumentUltimateShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self;

    // endregion

    // region Document Ship-From

    /**
     * Get the name of the Ship-From party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function getDocumentShipFromName(
        ?string &$newName
    ): self;

    /**
     * Go to the first ID of the Ship-From party
     *
     * @return bool
     */
    abstract public function firstDocumentShipFromId(): bool;

    /**
     * Go to the next ID of the Ship-From party
     *
     * @return bool
     */
    abstract public function nextDocumentShipFromId(): bool;

    /**
     * Get the ID of the Ship-From party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function getDocumentShipFromId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the Ship-From party
     *
     * @return bool
     */
    abstract public function firstDocumentShipFromGlobalId(): bool;

    /**
     * Go to the next global ID of the Ship-From party
     *
     * @return bool
     */
    abstract public function nextDocumentShipFromGlobalId(): bool;

    /**
     * Get the Global ID of the Ship-From party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function getDocumentShipFromGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self;

    /**
     * Go to the first Tax Registration of the Ship-From party
     *
     * @return bool
     */
    abstract public function firstDocumentShipFromTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the Ship-From party
     *
     * @return bool
     */
    abstract public function nextDocumentShipFromTaxRegistration(): bool;

    /**
     * Get the Tax Registration of the Ship-From party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function getDocumentShipFromTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self;

    /**
     * Go to the first address of the Ship-From party
     *
     * @return bool
     */
    abstract public function firstDocumentShipFromAddress(): bool;

    /**
     * Go to the next address of the Ship-From party
     *
     * @return bool
     */
    abstract public function nextDocumentShipFromAddress(): bool;

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
     * @return self
     */
    abstract public function getDocumentShipFromAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self;

    /**
     * Go to the first the legal information of the Ship-From party
     *
     * @return bool
     */
    abstract public function firstDocumentShipFromLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the Ship-From party
     *
     * @return bool
     */
    abstract public function nextDocumentShipFromLegalOrganisation(): bool;

    /**
     * Get the legal information of the Ship-From party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function getDocumentShipFromLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self;

    /**
     * Go to the first contact information of the Ship-From party
     *
     * @return bool
     */
    abstract public function firstDocumentShipFromContact(): bool;

    /**
     * Go to the next contact information of the Ship-From party
     *
     * @return bool
     */
    abstract public function nextDocumentShipFromContact(): bool;

    /**
     * Get the contact information of the Ship-From party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function getDocumentShipFromContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self;

    /**
     * Go to the first communication information of the Ship-From party
     *
     * @return bool
     */
    abstract public function firstDocumentShipFromCommunication(): bool;

    /**
     * Go to the next communication information of the Ship-From party
     *
     * @return bool
     */
    abstract public function nextDocumentShipFromCommunication(): bool;

    /**
     * Get communication information of the Ship-From party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function getDocumentShipFromCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self;

    // endregion

    // region Document Invoicer

    /**
     * Get the name of the Invoicer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function getDocumentInvoicerName(
        ?string &$newName
    ): self;

    /**
     * Go to the first ID of the Invoicer party
     *
     * @return bool
     */
    abstract public function firstDocumentInvoicerId(): bool;

    /**
     * Go to the next ID of the Invoicer party
     *
     * @return bool
     */
    abstract public function nextDocumentInvoicerId(): bool;

    /**
     * Get the ID of the Invoicer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function getDocumentInvoicerId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the Invoicer party
     *
     * @return bool
     */
    abstract public function firstDocumentInvoicerGlobalId(): bool;

    /**
     * Go to the next global ID of the Invoicer party
     *
     * @return bool
     */
    abstract public function nextDocumentInvoicerGlobalId(): bool;

    /**
     * Get the Global ID of the Invoicer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function getDocumentInvoicerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self;

    /**
     * Go to the first Tax Registration of the Invoicer party
     *
     * @return bool
     */
    abstract public function firstDocumentInvoicerTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the Invoicer party
     *
     * @return bool
     */
    abstract public function nextDocumentInvoicerTaxRegistration(): bool;

    /**
     * Get the Tax Registration of the Invoicer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function getDocumentInvoicerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self;

    /**
     * Go to the first address of the Invoicer party
     *
     * @return bool
     */
    abstract public function firstDocumentInvoicerAddress(): bool;

    /**
     * Go to the next address of the Invoicer party
     *
     * @return bool
     */
    abstract public function nextDocumentInvoicerAddress(): bool;

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
     * @return self
     */
    abstract public function getDocumentInvoicerAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self;

    /**
     * Go to the first the legal information of the Invoicer party
     *
     * @return bool
     */
    abstract public function firstDocumentInvoicerLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the Invoicer party
     *
     * @return bool
     */
    abstract public function nextDocumentInvoicerLegalOrganisation(): bool;

    /**
     * Get the legal information of the Invoicer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function getDocumentInvoicerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self;

    /**
     * Go to the first contact information of the Invoicer party
     *
     * @return bool
     */
    abstract public function firstDocumentInvoicerContact(): bool;

    /**
     * Go to the next contact information of the Invoicer party
     *
     * @return bool
     */
    abstract public function nextDocumentInvoicerContact(): bool;

    /**
     * Get the contact information of the Invoicer party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function getDocumentInvoicerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self;

    /**
     * Go to the first communication information of the Invoicer party
     *
     * @return bool
     */
    abstract public function firstDocumentInvoicerCommunication(): bool;

    /**
     * Go to the next communication information of the Invoicer party
     *
     * @return bool
     */
    abstract public function nextDocumentInvoicerCommunication(): bool;

    /**
     * Get communication information of the Invoicer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function getDocumentInvoicerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self;

    // endregion

    // region Document Invoicee

    /**
     * Get the name of the Invoicee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function getDocumentInvoiceeName(
        ?string &$newName
    ): self;

    /**
     * Go to the first ID of the Invoicee party
     *
     * @return bool
     */
    abstract public function firstDocumentInvoiceeId(): bool;

    /**
     * Go to the next ID of the Invoicee party
     *
     * @return bool
     */
    abstract public function nextDocumentInvoiceeId(): bool;

    /**
     * Get the ID of the Invoicee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function getDocumentInvoiceeId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the Invoicee party
     *
     * @return bool
     */
    abstract public function firstDocumentInvoiceeGlobalId(): bool;

    /**
     * Go to the next global ID of the Invoicee party
     *
     * @return bool
     */
    abstract public function nextDocumentInvoiceeGlobalId(): bool;

    /**
     * Get the Global ID of the Invoicee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function getDocumentInvoiceeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self;

    /**
     * Go to the first Tax Registration of the Invoicee party
     *
     * @return bool
     */
    abstract public function firstDocumentInvoiceeTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the Invoicee party
     *
     * @return bool
     */
    abstract public function nextDocumentInvoiceeTaxRegistration(): bool;

    /**
     * Get the Tax Registration of the Invoicee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function getDocumentInvoiceeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self;

    /**
     * Go to the first address of the Invoicee party
     *
     * @return bool
     */
    abstract public function firstDocumentInvoiceeAddress(): bool;

    /**
     * Go to the next address of the Invoicee party
     *
     * @return bool
     */
    abstract public function nextDocumentInvoiceeAddress(): bool;

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
     * @return self
     */
    abstract public function getDocumentInvoiceeAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self;

    /**
     * Go to the first the legal information of the Invoicee party
     *
     * @return bool
     */
    abstract public function firstDocumentInvoiceeLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the Invoicee party
     *
     * @return bool
     */
    abstract public function nextDocumentInvoiceeLegalOrganisation(): bool;

    /**
     * Get the legal information of the Invoicee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function getDocumentInvoiceeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self;

    /**
     * Go to the first contact information of the Invoicee party
     *
     * @return bool
     */
    abstract public function firstDocumentInvoiceeContact(): bool;

    /**
     * Go to the next contact information of the Invoicee party
     *
     * @return bool
     */
    abstract public function nextDocumentInvoiceeContact(): bool;

    /**
     * Get the contact information of the Invoicee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function getDocumentInvoiceeContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self;

    /**
     * Go to the first communication information of the Invoicee party
     *
     * @return bool
     */
    abstract public function firstDocumentInvoiceeCommunication(): bool;

    /**
     * Go to the next communication information of the Invoicee party
     *
     * @return bool
     */
    abstract public function nextDocumentInvoiceeCommunication(): bool;

    /**
     * Get communication information of the Invoicee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function getDocumentInvoiceeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self;

    // endregion

    // region Document Payee

    /**
     * Get the name of the Payee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function getDocumentPayeeName(
        ?string &$newName
    ): self;

    /**
     * Go to the first ID of the Payee party
     *
     * @return bool
     */
    abstract public function firstDocumentPayeeId(): bool;

    /**
     * Go to the next ID of the Payee party
     *
     * @return bool
     */
    abstract public function nextDocumentPayeeId(): bool;

    /**
     * Get the ID of the Payee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function getDocumentPayeeId(
        ?string &$newId
    ): self;

    /**
     * Go to the first global ID of the Payee party
     *
     * @return bool
     */
    abstract public function firstDocumentPayeeGlobalId(): bool;

    /**
     * Go to the next global ID of the Payee party
     *
     * @return bool
     */
    abstract public function nextDocumentPayeeGlobalId(): bool;

    /**
     * Get the Global ID of the Payee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function getDocumentPayeeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self;

    /**
     * Go to the first Tax Registration of the Payee party
     *
     * @return bool
     */
    abstract public function firstDocumentPayeeTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the Payee party
     *
     * @return bool
     */
    abstract public function nextDocumentPayeeTaxRegistration(): bool;

    /**
     * Get the Tax Registration of the Payee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function getDocumentPayeeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self;

    /**
     * Go to the first address of the Payee party
     *
     * @return bool
     */
    abstract public function firstDocumentPayeeAddress(): bool;

    /**
     * Go to the next address of the Payee party
     *
     * @return bool
     */
    abstract public function nextDocumentPayeeAddress(): bool;

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
     * @return self
     */
    abstract public function getDocumentPayeeAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self;

    /**
     * Go to the first the legal information of the Payee party
     *
     * @return bool
     */
    abstract public function firstDocumentPayeeLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the Payee party
     *
     * @return bool
     */
    abstract public function nextDocumentPayeeLegalOrganisation(): bool;

    /**
     * Get the legal information of the Payee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function getDocumentPayeeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self;

    /**
     * Go to the first contact information of the Payee party
     *
     * @return bool
     */
    abstract public function firstDocumentPayeeContact(): bool;

    /**
     * Go to the next contact information of the Payee party
     *
     * @return bool
     */
    abstract public function nextDocumentPayeeContact(): bool;

    /**
     * Get the contact information of the Payee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function getDocumentPayeeContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self;

    /**
     * Go to the first communication information of the Payee party
     *
     * @return bool
     */
    abstract public function firstDocumentPayeeCommunication(): bool;

    /**
     * Go to the next communication information of the Payee party
     *
     * @return bool
     */
    abstract public function nextDocumentPayeeCommunication(): bool;

    /**
     * Get communication information of the Payee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function getDocumentPayeeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self;

    // endregion

    // region Document Payment

    /**
     * Go to the first Payment mean
     *
     * @return bool
     */
    abstract public function firstDocumentPaymentMean(): bool;

    /**
     * Go to the next Payment mean
     *
     * @return bool
     */
    abstract public function nextDocumentPaymentMean(): bool;

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
     * @return self
     */
    abstract public function getDocumentPaymentMean(
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
        ?string &$newMandate
    ): self;

    /**
     * Go to the first Unique bank details of the payee or the seller
     *
     * @return bool
     */
    abstract public function firstDocumentPaymentCreditorReferenceID(): bool;

    /**
     * Go to the next Unique bank details of the payee or the seller
     *
     * @return bool
     */
    abstract public function nextDocumentPaymentCreditorReferenceID(): bool;

    /**
     * Get Unique bank details of the payee or the seller
     *
     * @param  null|string $newId Creditor identifier
     * @return self
     */
    abstract public function getDocumentPaymentCreditorReferenceID(
        ?string &$newId
    ): self;

    /**
     * Go to the first payment term
     *
     * @return bool
     */
    abstract public function firstDocumentPaymentTerm(): bool;

    /**
     * Go to the next payment term
     *
     * @return bool
     */
    abstract public function nextDocumentPaymentTerm(): bool;

    /**
     * Get payment term
     *
     * @param  null|string            $newDescription Text description of the payment terms
     * @param  null|DateTimeInterface $newDueDate     Date by which payment is due
     * @return self
     */
    abstract public function getDocumentPaymentTerm(
        ?string &$newDescription,
        ?DateTimeInterface &$newDueDate,
        ?string &$newMandate
    ): self;

    /**
     * Go to the first payment discount term in latest resolved payment term
     *
     * @return bool
     */
    abstract public function firstDocumentPaymentDiscountTermsInLastPaymentTerm(): bool;

    /**
     * Go to the last payment discount term in latest resolved payment term
     *
     * @return bool
     */
    abstract public function nextDocumentPaymentDiscountTermsInLastPaymentTerm(): bool;

    /**
     * Get payment discount terms in latest resolved payment terms
     *
     * @param  null|float             $newBaseAmount      Base amount of the payment discount
     * @param  null|float             $newDiscountAmount  Amount of the payment discount
     * @param  null|float             $newDiscountPercent Percentage of the payment discount
     * @param  null|DateTimeInterface $newBaseDate        Due date reference date
     * @param  null|float             $newBasePeriod      Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit  Maturity period (unit)
     * @return self
     */
    abstract public function getDocumentPaymentDiscountTermsInLastPaymentTerm(
        ?float &$newBaseAmount,
        ?float &$newDiscountAmount,
        ?float &$newDiscountPercent,
        ?DateTimeInterface &$newBaseDate,
        ?float &$newBasePeriod,
        ?string &$newBasePeriodUnit
    ): self;

    /**
     * Go to the first payment penalty term in latest resolved payment term
     *
     * @return bool
     */
    abstract public function firstDocumentPaymentPenaltyTermsInLastPaymentTerm(): bool;

    /**
     * Go to the last payment penalty term in latest resolved payment term
     *
     * @return bool
     */
    abstract public function nextDocumentPaymentPenaltyTermsInLastPaymentTerm(): bool;

    /**
     * Get payment penalty terms in latest resolved payment terms
     *
     * @param  null|float             $newBaseAmount     Base amount of the payment penalty
     * @param  null|float             $newPenaltyAmount  Amount of the payment penalty
     * @param  null|float             $newPenaltyPercent Percentage of the payment penalty
     * @param  null|DateTimeInterface $newBaseDate       Due date reference date
     * @param  null|float             $newBasePeriod     Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit Maturity period (unit)
     * @return self
     */
    abstract public function getDocumentPaymentPenaltyTermsInLastPaymentTerm(
        ?float &$newBaseAmount,
        ?float &$newPenaltyAmount,
        ?float &$newPenaltyPercent,
        ?DateTimeInterface &$newBaseDate,
        ?float &$newBasePeriod,
        ?string &$newBasePeriodUnit
    ): self;

    // endregion

    // region Document Tax

    /**
     * Go to the first Document Tax Breakdown
     *
     * @return bool
     */
    abstract public function firstDocumentTax(): bool;

    /**
     * Go to the next Document Tax Breakdown
     *
     * @return bool
     */
    abstract public function nextDocumentTax(): bool;

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
     * @return self
     */
    abstract public function getDocumentTax(
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newBasisAmount,
        ?float &$newTaxAmount,
        ?float &$newTaxPercent,
        ?string &$newExemptionReason,
        ?string &$newExemptionReasonCode,
        ?DateTimeInterface &$newTaxDueDate,
        ?string &$newTaxDueCode
    ): self;

    // endregion

    // region Document Allowances/Charges

    /**
     * Go to the first Document Allowance/Charge
     *
     * @return bool
     */
    abstract public function firstDocumentAllowanceCharge(): bool;

    /**
     * Go to the next Document Allowance/Charge
     *
     * @return bool
     */
    abstract public function nextDocumentAllowanceCharge(): bool;

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
     * @return self
     */
    abstract public function getDocumentAllowanceCharge(
        ?bool &$newChargeIndicator,
        ?float &$newAllowanceChargeAmount,
        ?float &$newAllowanceChargeBaseAmount,
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxPercent,
        ?string &$newAllowanceChargeReason,
        ?string &$newAllowanceChargeReasonCode,
        ?float &$newAllowanceChargePercent
    ): self;

    /**
     * Go to the first Document Logistic Service Charge
     *
     * @return bool
     */
    abstract public function firstDocumentLogisticServiceCharge(): bool;

    /**
     * Go to the next Document Logistic Service Charge
     *
     * @return bool
     */
    abstract public function nextDocumentLogisticServiceCharge(): bool;

    /**
     * Get Document Logistic Service Charge
     *
     * @param  null|float  $newChargeAmount Amount of the service fee
     * @param  null|string $newDescription  Identification of the service fee
     * @param  null|string $newTaxCategory  Coded description of the tax category
     * @param  null|string $newTaxType      Coded description of the tax type
     * @param  null|float  $newTaxPercent   Tax Rate (Percentage)
     * @return self
     */
    abstract public function getDocumentLogisticServiceCharge(
        ?float &$newChargeAmount,
        ?string &$newDescription,
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxPercent
    ): self;

    // endregion

    // region Document Amounts

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
     * @return self
     */
    abstract public function getDocumentSummation(
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
    ): self;

    // endregion

    // region Document Positions

    /**
     * Go to the first document position
     *
     * @return bool
     */
    abstract public function firstDocumentPosition(): bool;

    /**
     * Go to the next document position
     *
     * @return bool
     */
    abstract public function nextDocumentPosition(): bool;

    /**
     * Get position general information
     *
     * @param  null|string $newPositionId           Identification of the position
     * @param  null|string $newParentPositionId     Identification of the parent position
     * @param  null|string $newLineStatusCode       Indicates whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param  null|string $newLineStatusReasonCode Type to specify whether the invoice line is
     * @return self
     */
    abstract public function getDocumentPosition(
        ?string &$newPositionId,
        ?string &$newParentPositionId,
        ?string &$newLineStatusCode,
        ?string &$newLineStatusReasonCode
    ): self;

    /**
     * Go to the first text information of the latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionNote(): bool;

    /**
     * Go to the next text information of the latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionNote(): bool;

    /**
     * Get text information from latest position
     *
     * @param  null|string $newContent     Text that contains unstructured information that is relevant to the invoice item
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Code for qualifying the free text for the invoice item
     * @return self
     */
    abstract public function getDocumentPositionNote(
        ?string &$newContent,
        ?string &$newContentCode,
        ?string &$newSubjectCode
    ): self;

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
     * @return self
     */
    abstract public function getDocumentPositionProductDetails(
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
    ): self;

    /**
     * Go to the first product characteristics from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionProductCharacteristic(): bool;

    /**
     * Go to the next product characteristics from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionProductCharacteristic(): bool;

    /**
     * Get product characteristics from latest position
     *
     * @param  null|string $newProductCharacteristicDescription  Name of the attribute or characteristic ("Colour")
     * @param  null|string $newProductCharacteristicValue        Value of the attribute or characteristic ("Red")
     * @param  null|string $newProductCharacteristicType         Type (Code) of product characteristic
     * @param  null|float  $newProductCharacteristicMeasureValue Value of the characteristic (numerical measured)
     * @param  null|string $newProductCharacteristicMeasureUnit  Unit of value of the characteristic
     * @return self
     */
    abstract public function getDocumentPositionProductCharacteristic(
        ?string &$newProductCharacteristicDescription,
        ?string &$newProductCharacteristicValue,
        ?string &$newProductCharacteristicType,
        ?float &$newProductCharacteristicMeasureValue,
        ?string &$newProductCharacteristicMeasureUnit
    ): self;

    /**
     * Go to the first product classification from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionProductClassification(): bool;

    /**
     * Go to the next product classification from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionProductClassification(): bool;

    /**
     * Get product classification from latest position
     *
     * @param  null|string $newProductClassificationCode          Classification identifier
     * @param  null|string $newProductClassificationListId        Identifier for the identification scheme of the item classification
     * @param  null|string $newProductClassificationListVersionId Version of the identification scheme
     * @param  null|string $newProductClassificationCodeClassname Name with which an article can be classified according to type or quality
     * @return self
     */
    abstract public function getDocumentPositionProductClassification(
        ?string &$newProductClassificationCode,
        ?string &$newProductClassificationListId,
        ?string &$newProductClassificationListVersionId,
        ?string &$newProductClassificationCodeClassname
    ): self;

    /**
     * Go to the first referenced product in latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionReferencedProduct(): bool;

    /**
     * Go to the next referenced product in latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionReferencedProduct(): bool;

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
     * @return self
     */
    abstract public function getDocumentPositionReferencedProduct(
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
    ): self;

    /**
     * Go to the first associated seller's order confirmation (line reference) from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionSellerOrderReference(): bool;

    /**
     * Go to the next associated seller's order confirmation (line reference) from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionSellerOrderReference(): bool;

    /**
     * Get the associated seller's order confirmation (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Seller's order confirmation number
     * @param  null|string            $newReferenceLineNumber Seller's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Seller's order confirmation date
     * @return self
     */
    abstract public function getDocumentPositionSellerOrderReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self;

    /**
     * Go to the first associated buyer's order confirmation (line reference) from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionBuyerOrderReference(): bool;

    /**
     * Go to the next associated buyer's order confirmation (line reference) from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionBuyerOrderReference(): bool;

    /**
     * Get the associated buyer's order confirmation (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return self
     */
    abstract public function getDocumentPositionBuyerOrderReference(
        ?string &$newReferenceNumber = null,
        ?string &$newReferenceLineNumber = null,
        ?DateTimeInterface &$newReferenceDate = null
    ): self;

    /**
     * Go to the first associated quotation (line reference) from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionQuotationReference(): bool;

    /**
     * Go to the next associated quotation (line reference)
     *
     * @return bool
     */
    abstract public function nextDocumentPositionQuotationReference(): bool;

    /**
     * Get the associated quotation (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return self
     */
    abstract public function getDocumentPositionQuotationReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self;

    /**
     * Go to the first associated contract (line reference) from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionContractReference(): bool;

    /**
     * Go to the next associated contract (line reference) from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionContractReference(): bool;

    /**
     * Get the associated contract (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return self
     */
    abstract public function getDocumentPositionContractReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self;

    /**
     * Go to first additional associated document (line reference) from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionAdditionalReference(): bool;

    /**
     * Go to next additional associated document (line reference) from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionAdditionalReference(): bool;

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
     * @return self
     */
    abstract public function getDocumentPositionAdditionalReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode,
        ?string &$newReferenceTypeCode,
        ?string &$newDescription,
        ?InvoiceSuiteAttachment &$newInvoiceSuiteAttachment
    ): self;

    /**
     * Go to the first an additional ultimate customer order reference (line reference) from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionUltimateCustomerOrderReference(): bool;

    /**
     * Go to the next an additional ultimate customer order reference (line reference) from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionUltimateCustomerOrderReference(): bool;

    /**
     * Get an additional ultimate customer order reference (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Ultimate customer order number
     * @param  null|string            $newReferenceLineNumber Ultimate customer order line number
     * @param  null|DateTimeInterface $newReferenceDate       Ultimate customer order date
     * @return self
     */
    abstract public function getDocumentPositionUltimateCustomerOrderReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self;

    /**
     * Go to the first additional despatch advice reference (line reference) from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionDespatchAdviceReference(): bool;

    /**
     * Go to the next additional despatch advice reference (line reference) from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionDespatchAdviceReference(): bool;

    /**
     * Get an additional despatch advice reference (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Shipping notification number
     * @param  null|string            $newReferenceLineNumber Shipping notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Shipping notification date
     * @return self
     */
    abstract public function getDocumentPositionDespatchAdviceReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self;

    /**
     * Go to the first additional receiving advice reference (line reference) from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionReceivingAdviceReference(): bool;

    /**
     * Go to the next additional receiving advice reference (line reference) from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionReceivingAdviceReference(): bool;

    /**
     * Get an additional receiving advice reference (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Receipt notification number
     * @param  null|string            $newReferenceLineNumber Receipt notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Receipt notification date
     * @return self
     */
    abstract public function getDocumentPositionReceivingAdviceReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self;

    /**
     * Go to the first additional delivery note reference (line reference) from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionDeliveryNoteReference(): bool;

    /**
     * Go to the next additional delivery note reference (line reference) from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionDeliveryNoteReference(): bool;

    /**
     * Get an additional delivery note reference (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Delivery slip number
     * @param  null|string            $newReferenceLineNumber Delivery slip line number
     * @param  null|DateTimeInterface $newReferenceDate       Delivery slip date
     * @return self
     */
    abstract public function getDocumentPositionDeliveryNoteReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self;

    /**
     * Go to the first additional invoice document (reference to preceding invoice) (line reference) from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionInvoiceReference(): bool;

    /**
     * Go to the next additional invoice document (reference to preceding invoice) (line reference) from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionInvoiceReference(): bool;

    /**
     * Get an additional invoice document (reference to preceding invoice) (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Identification of an invoice previously sent
     * @param  null|string            $newReferenceLineNumber Identification of an invoice line previously sent
     * @param  null|DateTimeInterface $newReferenceDate       Date of the previous invoice
     * @param  null|string            $newTypeCode            Type code of previous invoice
     * @return self
     */
    abstract public function getDocumentPositionInvoiceReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode
    ): self;

    /**
     * Returns true if a gross price was specified
     *
     * @return bool
     */
    abstract public function firstDcumentPositionGrossPrice(): bool;

    /**
     * Get the position's gross price from latest position
     *
     * @param  null|float  $newGrossPrice                  Unit price excluding sales tax before deduction of the discount on the item price
     * @param  null|float  $newGrossPriceBasisQuantity     Number of item units for which the price applies
     * @param  null|string $newGrossPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return self
     */
    abstract public function getDocumentPositionGrossPrice(
        ?float &$newGrossPrice,
        ?float &$newGrossPriceBasisQuantity,
        ?string &$newGrossPriceBasisQuantityUnit
    ): self;

    /**
     * Go to the first discount or charge from the gross price from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionGrossPriceAllowanceCharge(): bool;

    /**
     * Go to the next discount or charge from the gross price from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionGrossPriceAllowanceCharge(): bool;

    /**
     * Get discount or charge from the gross price from latest position
     *
     * @param  null|float  $newGrossPriceAllowanceChargeAmount      Discount amount or charge amount on the item price
     * @param  null|bool   $newIsCharge                             Switch for charge/discount
     * @param  null|float  $newGrossPriceAllowanceChargePercent     Discount or charge on the item price in percent
     * @param  null|float  $newGrossPriceAllowanceChargeBasisAmount Base amount of the discount or charge
     * @param  null|string $newGrossPriceAllowanceChargeReason      Reason for discount or charge (free text)
     * @param  null|string $newGrossPriceAllowanceChargeReasonCode  Reason code for discount or charge (free text)
     * @return self
     */
    abstract public function getDocumentPositionGrossPriceAllowanceCharge(
        ?float &$newGrossPriceAllowanceChargeAmount,
        ?bool &$newIsCharge,
        ?float &$newGrossPriceAllowanceChargePercent,
        ?float &$newGrossPriceAllowanceChargeBasisAmount,
        ?string &$newGrossPriceAllowanceChargeReason,
        ?string &$newGrossPriceAllowanceChargeReasonCode
    ): self;

    /**
     * Returns true if a net price was specified
     *
     * @return bool
     */
    abstract public function firstDocumentPositionNetPrice(): bool;

    /**
     * Get the position's net price from latest position
     *
     * @param  null|float  $newNetPrice                  Unit price excluding sales tax after deduction of the discount on the item price
     * @param  null|float  $newNetPriceBasisQuantity     Number of item units for which the price applies
     * @param  null|string $newNetPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return self
     */
    abstract public function getDocumentPositionNetPrice(
        ?float &$newNetPrice,
        ?float &$newNetPriceBasisQuantity,
        ?string &$newNetPriceBasisQuantityUnit
    ): self;

    /**
     * Get the position's net price included tax from latest position
     *
     * @param  null|string $newTaxCategory         Coded description of the tax category
     * @param  null|string $newTaxType             Coded description of the tax type
     * @param  null|float  $newTaxAmount           Tax total amount
     * @param  null|float  $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode Reason for tax exemption (Code)
     * @return self
     */
    abstract public function getDocumentPositionNetPriceTax(
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxAmount,
        ?float &$newTaxPercent,
        ?string &$newExemptionReason,
        ?string &$newExemptionReasonCode
    ): self;

    /**
     * Get the position's quantities from latest position
     *
     * @param  null|float  $newQuantity               Invoiced quantity
     * @param  null|string $newQuantityUnit           Invoiced quantity unit
     * @param  null|float  $newChargeFreeQuantity     Charge Free quantity
     * @param  null|string $newChargeFreeQuantityUnit Charge Free quantity unit
     * @param  null|float  $newPackageQuantity        Package quantity
     * @param  null|string $newPackageQuantityUnit    Package quantity unit
     * @return self
     */
    abstract public function getDocumentPositionQuantities(
        ?float &$newQuantity,
        ?string &$newQuantityUnit,
        ?float &$newChargeFreeQuantity,
        ?string &$newChargeFreeQuantityUnit,
        ?float &$newPackageQuantity,
        ?string &$newPackageQuantityUnit
    ): self;

    /**
     * Get the name of the Ship-To party from latest position
     *
     * @param  string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function getDocumentPositionShipToName(
        ?string &$newName
    ): self;

    /**
     * Go to the first ID of the Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionShipToId(): bool;

    /**
     * Go to the next ID of the Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionShipToId(): bool;

    /**
     * Get the ID of the Ship-To party from latest position
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function getDocumentPositionShipToId(
        ?string &$newId
    ): self;

    /**
     * Go to the first ID of the Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionShipToGlobalId(): bool;

    /**
     * Go to the next ID of the Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionShipToGlobalId(): bool;

    /**
     * Get the Global ID of the Ship-To party from latest position
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function getDocumentPositionShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self;

    /**
     * Go to the first Tax Registration of the Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionShipToTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionShipToTaxRegistration(): bool;

    /**
     * Get the Tax Registration of the Ship-To party from latest position
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function getDocumentPositionShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self;

    /**
     * Go to the first address of the Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionShipToAddress(): bool;

    /**
     * Go to the first address of the Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionShipToAddress(): bool;

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
     * @return self
     */
    abstract public function getDocumentPositionShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self;

    /**
     * Go to the first the legal information of the Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionShipToLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionShipToLegalOrganisation(): bool;

    /**
     * Get the legal information of the Ship-To party from latest position
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function getDocumentPositionShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self;

    /**
     * Go to the first contact information of the Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionShipToContact(): bool;

    /**
     * Go to the next contact information of the Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionShipToContact(): bool;

    /**
     * Get the contact information of the Ship-To party from latest position
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function getDocumentPositionShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self;

    /**
     * Go to the first communication information of the Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionShipToCommunication(): bool;

    /**
     * Go to the next communication information of the Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionShipToCommunication(): bool;

    /**
     * Get the communication information of the Ship-To party from latest position
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function getDocumentPositionShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self;

    /**
     * Get the name of the ultimate Ship-To party from latest position
     *
     * @param  string $newName the full formal name under which the party is registered
     * @return self
     */
    abstract public function getDocumentPositionUltimateShipToName(
        ?string &$newName
    ): self;

    /**
     * Go to the first ID of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionUltimateShipToId(): bool;

    /**
     * Go to the next ID of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionUltimateShipToId(): bool;

    /**
     * Get the ID of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    abstract public function getDocumentPositionUltimateShipToId(
        ?string &$newId
    ): self;

    /**
     * Go to the first ID of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionUltimateShipToGlobalId(): bool;

    /**
     * Go to the next ID of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionUltimateShipToGlobalId(): bool;

    /**
     * Get the Global ID of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return self
     */
    abstract public function getDocumentPositionUltimateShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self;

    /**
     * Go to the first Tax Registration of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionUltimateShipToTaxRegistration(): bool;

    /**
     * Go to the next Tax Registration of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionUltimateShipToTaxRegistration(): bool;

    /**
     * Get the Tax Registration of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return self
     */
    abstract public function getDocumentPositionUltimateShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self;

    /**
     * Go to the first address of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionUltimateShipToAddress(): bool;

    /**
     * Go to the first address of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionUltimateShipToAddress(): bool;

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
     * @return self
     */
    abstract public function getDocumentPositionUltimateShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self;

    /**
     * Go to the first the legal information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionUltimateShipToLegalOrganisation(): bool;

    /**
     * Go to the next the legal information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionUltimateShipToLegalOrganisation(): bool;

    /**
     * Get the legal information of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return self
     */
    abstract public function getDocumentPositionUltimateShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self;

    /**
     * Go to the first contact information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionUltimateShipToContact(): bool;

    /**
     * Go to the next contact information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionUltimateShipToContact(): bool;

    /**
     * Get the contact information of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return self
     */
    abstract public function getDocumentPositionUltimateShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self;

    /**
     * Go to the first communication information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionUltimateShipToCommunication(): bool;

    /**
     * Go to the next communication information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionUltimateShipToCommunication(): bool;

    /**
     * Get the communication information of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return self
     */
    abstract public function getDocumentPositionUltimateShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self;

    /**
     * Get the date of the delivery from latest position
     *
     * @param  null|DateTimeInterface $newDate
     * @return self
     */
    abstract public function getDocumentPositionSupplyChainEvent(
        ?DateTimeInterface &$newDate
    ): self;

    /**
     * Go to the first billing period
     *
     * @return bool
     */
    abstract public function firstDocumentPositionBillingPeriod(): bool;

    /**
     * Go to the next billing period
     *
     * @return bool
     */
    abstract public function nextDocumentPositionBillingPeriod(): bool;

    /**
     * Get the start and/or end date of the billing period from latest position
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    abstract public function getDocumentPositionBillingPeriod(
        ?DateTimeInterface &$newStartDate,
        ?DateTimeInterface &$newEndDate,
        ?string &$newDescription,
    ): self;

    /**
     * Go to the first position's tax information from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionTax(): bool;

    /**
     * Go to the next position's tax information from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionTax(): bool;

    /**
     * Get the position's tax information from latest position
     *
     * @param  null|string $newTaxCategory         Coded description of the tax category
     * @param  null|string $newTaxType             Coded description of the tax type
     * @param  null|float  $newTaxAmount           Tax total amount
     * @param  null|float  $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode Reason for tax exemption (Code)
     * @return self
     */
    abstract public function getDocumentPositionTax(
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxAmount,
        ?float &$newTaxPercent,
        ?string &$newExemptionReason,
        ?string &$newExemptionReasonCode,
    ): self;

    /**
     * Go to the first Document position Allowance/Charge from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionAllowanceCharge(): bool;

    /**
     * Go to the next Document position Allowance/Charge from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionAllowanceCharge(): bool;

    /**
     * Get Document position Allowance/Charge from latest position
     *
     * @param  null|bool   $newChargeIndicator           Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newAllowanceChargeReason     Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return self
     */
    abstract public function getDocumentPositionAllowanceCharge(
        ?bool &$newChargeIndicator,
        ?float &$newAllowanceChargeAmount,
        ?float &$newAllowanceChargeBaseAmount,
        ?string &$newAllowanceChargeReason,
        ?string &$newAllowanceChargeReasonCode,
        ?float &$newAllowanceChargePercent
    ): self;

    /**
     * Returns true if a position summation exists
     *
     * @return bool
     */
    abstract public function firstDocumentPositionSummation(): bool;

    /**
     * Get the document position summation from latest position
     *
     * @param  null|float $newNetAmount           Net amount
     * @param  null|float $newChargeTotalAmount   Sum of the charges
     * @param  null|float $newDiscountTotalAmount Sum of the discounts
     * @param  null|float $newTaxTotalAmount      Total amount of the line (in the invoice currency)
     * @param  null|float $newGrossAmount         Total invoice line amount including sales tax
     * @return self
     */
    abstract public function getDocumentPositionSummation(
        ?float &$newNetAmount,
        ?float &$newChargeTotalAmount,
        ?float &$newDiscountTotalAmount,
        ?float &$newTaxTotalAmount,
        ?float &$newGrossAmount
    ): self;

    /**
     * Go to the first posting reference from latest position
     *
     * @return bool
     */
    abstract public function firstDocumentPositionPostingReference(): bool;

    /**
     * Go to the next posting reference from latest position
     *
     * @return bool
     */
    abstract public function nextDocumentPositionPostingReference(): bool;

    /**
     * Get a position's posting reference from latest position
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return self
     */
    abstract public function getDocumentPositionPostingReference(
        ?string &$newType,
        ?string &$newAccountId
    ): self;

    /**
     * Read from XML content
     *
     * @param  string                                   $fromContent
     * @throws RuntimeException
     * @return InvoiceSuiteAbstractDocumentFormatReader
     */
    protected function deserializeFromXmlContent(string $fromContent): self
    {
        $this->deserializeFromContentByContentType($fromContent, InvoiceSuiteContentTypeResolver::XML);

        return $this;
    }

    /**
     * Read from JSON content
     *
     * @param  string                                   $fromContent
     * @throws RuntimeException
     * @return InvoiceSuiteAbstractDocumentFormatReader
     */
    protected function deserializeFromJsonContent(string $fromContent): self
    {
        $this->deserializeFromContentByContentType($fromContent, InvoiceSuiteContentTypeResolver::JSON);

        return $this;
    }

    /**
     * Read from content by type
     *
     * @param  string                                   $fromContent
     * @param  string                                   $contentType
     * @throws RuntimeException
     * @return InvoiceSuiteAbstractDocumentFormatReader
     */
    protected function deserializeFromContentByContentType(string $fromContent, string $contentType): self
    {
        $this->setDocumentRootObject(
            $this->documentSerializer->deserialize(
                $fromContent,
                $this->getCurrentDocumentFormatProvider()->getRootClassName(),
                $contentType,
                DeserializationContext::create()
            )
        );

        return $this;
    }

    // endregion
}
