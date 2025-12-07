<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\zugferd;

use DateTimeInterface;
use DOMDocument;
use DOMXpath;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistDocumentTypes;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistReferenceCodeQualifiers;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use Stringable;

/**
 * Legacy-class representing the ZUGFeRD document builder for outgoing documents
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class ZugferdDocumentBuilder implements Stringable
{
    /**
     * Internal document builder
     *
     * @var InvoiceSuiteDocumentBuilder
     */
    protected InvoiceSuiteDocumentBuilder $documentBuilder;

    /**
     * Constructor
     *
     * @param  int                                  $profile The ID of the profile of the document
     * @throws InvoiceSuiteInvalidArgumentException
     * @return void
     */
    final protected function __construct(
        int $profile
    ) {
        if (!array_key_exists($profile, ZugferdProfiles::PROFILEDEF)) {
            throw new InvoiceSuiteInvalidArgumentException(sprintf('Unknown profile id %s', $profile));
        }

        $profileDef = ZugferdProfiles::PROFILEDEF[$profile];

        $this->documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId($profileDef['invoicesuiteproviderid']);
    }

    /**
     * Receive the content as XML string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getContent();
    }

    /**
     * Returns the selected profile id
     *
     * @return int
     */
    public function getProfileId(): int
    {
        $providerId = $this->documentBuilder->getCurrentDocumentFormatProvider()->getUniqueId();

        foreach (ZugferdProfiles::PROFILEDEF as $profileId => $profileDef) {
            if ($profileDef['invoicesuiteproviderid'] == $providerId) {
                return $profileId;
            }
        }

        return -1;
    }

    /**
     * Creates a new builder instance with profile $profile
     *
     * @param  int    $profileId
     * @return static
     */
    public static function createNew(
        int $profileId
    ): static {
        return new static($profileId);
    }

    /**
     * Initialized a new document with profile settings
     *
     * @return static
     */
    public function initNewDocument(): static
    {
        // This does nothing here

        return $this;
    }

    /**
     * Write the content of a CrossIndustryInvoice object to a string
     *
     * @return string
     */
    public function getContent(): string
    {
        $this->onBeforeGetContent();

        return $this->documentBuilder->getContentAsXml();
    }

    /**
     * Write the content of a invoice object to a DOMDocument instance
     *
     * @return DOMDocument
     */
    public function getContentAsDomDocument(): DOMDocument
    {
        $domDocument = new DOMDocument();
        $domDocument->loadXML($this->getContent());

        return $domDocument;
    }

    /**
     * Write the content of a invoice object to a DOMXpath instance
     *
     * @return DOMXpath
     */
    public function getContentAsDomXPath(): DOMXpath
    {
        return new DOMXpath($this->getContentAsDomDocument());
    }

    /**
     * Write the content of a CrossIndustryInvoice object to a file
     *
     * @param  string $xmlfilename
     * @return static
     */
    public function writeFile(
        string $xmlfilename
    ): static {
        $this->documentBuilder->saveAsXmlFile($xmlfilename);

        return $this;
    }

    /**
     * Set main information about this document.
     *
     * @param  string                 $documentNo               __BT-1, From MINIMUM__ The document no issued by the seller
     * @param  string                 $documentTypeCode         __BT-3, From MINIMUM__ The type of the document, See \horstoeko\codelists\ZugferdInvoiceType for details
     * @param  DateTimeInterface      $documentDate             __BT-2, From MINIMUM__ Date of invoice. The date when the document was issued by the seller
     * @param  string                 $invoiceCurrency          __BT-5, From MINIMUM__ Code for the invoice currency
     * @param  null|string            $documentName             __BT-X-2, From EXTENDED__ Document Type. The documenttype (free text)
     * @param  null|string            $documentLanguage         __BT-X-4, From EXTENDED__ Language indicator. The language code in which the document was written
     * @param  null|DateTimeInterface $effectiveSpecifiedPeriod __BT-X-6-000, From EXTENDED__ The contractual due date of the invoice
     * @return static
     */
    public function setDocumentInformation(
        string $documentNo,
        string $documentTypeCode,
        DateTimeInterface $documentDate,
        string $invoiceCurrency,
        ?string $documentName = null,
        ?string $documentLanguage = null,
        ?DateTimeInterface $effectiveSpecifiedPeriod = null
    ): static {
        $this->documentBuilder->setDocumentNo($documentNo);
        $this->documentBuilder->setDocumentType($documentTypeCode);
        $this->documentBuilder->setDocumentDate($documentDate);
        $this->documentBuilder->setDocumentCurrency($invoiceCurrency);
        $this->documentBuilder->setDocumentDescription($documentName);
        $this->documentBuilder->setDocumentLanguage($documentLanguage);
        $this->documentBuilder->setDocumentCompleteDate($effectiveSpecifiedPeriod);

        return $this;
    }

    /**
     * Set Unique bank details of the payee or the seller
     *
     * @param  null|string $creditorReferenceID __BT-90, From BASIC WL__ Creditor identifier
     * @param  null|string $paymentReference    __BT-83, From BASIC WL__ Intended use for payment
     * @return static
     */
    public function setDocumentGeneralPaymentInformation(
        ?string $creditorReferenceID = null,
        ?string $paymentReference = null
    ): static {
        $this->documentBuilder->setDocumentPaymentCreditorReferenceID($creditorReferenceID);
        // TODO: Make this possible
        // $this->getObjectHelper()->tryCall($this->headerTradeSettlement, "setPaymentReference", $this->getObjectHelper()->getIdType($paymentReference));

        return $this;
    }

    /**
     * Set the identifier assigned by the buyer and used for internal routing
     *
     * @param  null|string $buyerReference __BT-10, From MINIMUM__ An identifier assigned by the buyer and used for internal routing
     * @return static
     */
    public function setDocumentBuyerReference(
        ?string $buyerReference = null
    ): static {
        $this->documentBuilder->setDocumentBuyerReference($buyerReference);

        return $this;
    }

    /**
     * Set the identifier assigned by the buyer and used for internal routing
     *
     * @param  null|string $routingId __BT-10, From MINIMUM__ An identifier assigned by the buyer and used for internal routing
     * @return static
     */
    public function setDocumentRoutingId(
        ?string $routingId = null
    ): static {
        $this->documentBuilder->setDocumentBuyerReference($routingId);

        return $this;
    }

    /**
     * Set grouping of business process information.
     *
     * @param  null|string $id __BT-23, From MINIMUM__ Identifies the context of a business process where the transaction is taking place, thus allowing the buyer to process the invoice in an appropriate manner
     * @return static
     */
    public function setDocumentBusinessProcess(
        ?string $id = null
    ): static {
        // TODO: Make this possible

        return $this;
    }

    /**
     * Mark document as a copy from the original one __(BT-X-3-00, BT-X-3, From EXTENDED)__
     *
     * @return static
     */
    public function setIsDocumentCopy(): static
    {
        $this->documentBuilder->setDocumentIsCopy(true);

        return $this;
    }

    /**
     * Mark document as a test document.
     *
     * @return static
     */
    public function setIsTestDocument(): static
    {
        $this->documentBuilder->setDocumentIsTest(true);

        return $this;
    }

    /**
     * Sets a foreign currency (code) with the tax amount. The exchange rate is calculated by tax amounts.
     *
     * @param  null|string $foreignCurrencyCode __BT-6, From BASIC WL__ Foreign currency code
     * @param  null|float  $foreignTaxAmount    __BT-X-260, From EXTENDED__ Tax total amount in the foreign currency
     * @param  null|float  $exchangeRate        __BT-X-260, From EXTENDED__ Exchange Rate
     * @return static
     */
    public function setForeignCurrency(
        ?string $foreignCurrencyCode = null,
        ?float $foreignTaxAmount = null,
        ?float $exchangeRate = null
    ): static {
        // TODO Make it complete
        $this->documentBuilder->setDocumentTaxCurrency($foreignCurrencyCode);

        return $this;
    }

    /**
     * Add a note to the docuzment
     *
     * @param  string      $content     __BT-22, From BASIC WL__ Free text containing unstructured information that is relevant to the invoice as a whole
     * @param  null|string $contentCode __BT-X-5, From EXTENDED__ Code to classify the content of the free text of the invoice
     * @param  null|string $subjectCode __BT-21, From BASIC WL__ Qualification of the free text for the invoice
     * @return static
     */
    public function addDocumentNote(
        string $content,
        ?string $contentCode = null,
        ?string $subjectCode = null
    ): static {
        $this->documentBuilder->addDocumentNote(
            $content,
            $contentCode,
            $subjectCode
        );

        return $this;
    }

    /**
     * Detailed information about the seller (=service provider)
     *
     * @param  string      $name        __BT-27, From MINIMUM__ The full formal name under which the party is registered
     * @param  null|string $id          __BT-29, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @param  null|string $description __BT-33, From EN 16931__ Further legal information that is relevant for the seller
     * @return static
     */
    public function setDocumentSeller(
        string $name,
        ?string $id = null,
        ?string $description = null
    ): static {
        $this->tryCallByPath(
            $this->getRootObjectFromDocumentBuilder(),
            'getSupplyChainTradeTransaction.getApplicableHeaderTradeAgreement.setSellerTradeParty',
            null
        );

        $this->documentBuilder->setDocumentSellerName($name);
        $this->documentBuilder->setDocumentSellerId($id);

        return $this;
    }

    /**
     * Add an id to the document seller
     *
     * @param  string $id __BT-29, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentSellerId(
        string $id
    ): static {
        $this->documentBuilder->addDocumentSellerId(
            $id
        );

        return $this;
    }

    /**
     * Add a global ID for the seller
     *
     * @param  null|string $globalID     __BT-29-0, From BASIC WL__ A global identifier of the party
     * @param  null|string $globalIDType __BT-29-1, From BASIC WL__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentSellerGlobalId(
        ?string $globalID = null,
        ?string $globalIDType = null
    ): static {
        $this->documentBuilder->addDocumentSellerGlobalId(
            $globalID,
            $globalIDType
        );

        return $this;
    }

    /**
     * Add detailed information on the seller's tax information
     *
     * @param  null|string $taxRegType __BT-31-0, From MINIMUM/EN 16931__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $taxRegId   __BT-31, From MINIMUM/EN 16931__ Tax identification number
     * @return static
     */
    public function addDocumentSellerTaxRegistration(
        ?string $taxRegType = null,
        ?string $taxRegId = null
    ): static {
        $this->documentBuilder->addDocumentSellerTaxRegistration(
            $taxRegType,
            $taxRegId
        );

        return $this;
    }

    /**
     * Add information about the seller's VAT Registration Number (Umsatzsteueridentnummer)
     *
     * @param  null|string $vatRegNo __BT-31, From MINIMUM__ Tax identification number
     * @return static
     */
    public function addDocumentSellerVATRegistrationNumber(
        ?string $vatRegNo = null
    ): static {
        return $this->addDocumentSellerTaxRegistration(
            InvoiceSuiteCodelistReferenceCodeQualifiers::VAT_REGI_NUMB->value,
            $vatRegNo
        );
    }

    /**
     * Add information about the seller's Tax Number (Steuernummer)
     *
     * @param  null|string $taxNo __BT-31, From MINIMUM__ Tax Number (Steuernummer)
     * @return static
     */
    public function addDocumentSellerTaxNumber(
        ?string $taxNo = null
    ): static {
        return $this->addDocumentSellerTaxRegistration(
            InvoiceSuiteCodelistReferenceCodeQualifiers::FISC_NUMB->value,
            $taxNo
        );
    }

    /**
     * Sets detailed information on the business address of the seller
     *
     * @param  null|string $lineOne     __BT-35, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $lineTwo     __BT-36, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $lineThree   __BT-162, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $postCode    __BT-38, From BASIC WL__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $city        __BT-37, From BASIC WL__ Name of the city or municipality in which the party's address is located
     * @param  null|string $country     __BT-40, From MINIMUM__ Country in which the party's address is located
     * @param  null|string $subDivision __BT-39, From BASIC WL__ Region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentSellerAddress(
        ?string $lineOne = null,
        ?string $lineTwo = null,
        ?string $lineThree = null,
        ?string $postCode = null,
        ?string $city = null,
        ?string $country = null,
        ?string $subDivision = null
    ): static {
        $this->documentBuilder->setDocumentSellerAddress(
            $lineOne,
            $lineTwo,
            $lineThree,
            $postCode,
            $city,
            $country,
            $subDivision
        );

        return $this;
    }

    /**
     * Set Organization details of the selller
     *
     * @param  null|string $legalOrgId   __BT-30, From MINIMUM__ Identification number of the legal registration of the party
     * @param  null|string $legalOrgType __BT-30-1, From MINIMUM__ Type of the identification number of the legal registration of the party
     * @param  null|string $legalOrgName __BT-28, From BASIC WL__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentSellerLegalOrganisation(
        ?string $legalOrgId = null,
        ?string $legalOrgType = null,
        ?string $legalOrgName = null
    ): static {
        $this->documentBuilder->setDocumentSellerLegalOrganisation(
            $legalOrgType,
            $legalOrgId,
            $legalOrgName
        );

        return $this;
    }

    /**
     * Set the contact information of the seller/supplier party
     *
     * @param  null|string $contactPersonName     __BT-41, From EN 16931__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-41-0, From EN 16931__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-42, From EN 16931__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-107, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-43, From EN 16931__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentSellerContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->setDocumentSellerContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Add contact information of the seller/supplier party
     *
     * @param  null|string $contactPersonName     __BT-41, From EN 16931__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-41-0, From EN 16931__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-42, From EN 16931__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-107, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-43, From EN 16931__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentSellerContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->addDocumentSellerContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Set the seller's electronic communication information
     *
     * @param  null|string $uriScheme __BT-34-1, From BASIC WL__ The type for the party's electronic address
     * @param  null|string $uri       __BT-34, From BASIC WL__ The party's electronic address
     * @return static
     */
    public function setDocumentSellerCommunication(
        ?string $uriScheme = null,
        ?string $uri = null
    ): static {
        $this->documentBuilder->setDocumentSellerCommunication(
            $uriScheme,
            $uri
        );

        return $this;
    }

    /**
     * Set the name of the buyer/customer party
     *
     * @param  string      $name        __BT-44, From MINIMUM__ The full formal name under which the party is registered
     * @param  null|string $id          __BT-46, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @param  null|string $description __BT-X-334, From EXTENDED__ Further legal information about the buyer
     * @return static
     */
    public function setDocumentBuyer(
        string $name,
        ?string $id = null,
        ?string $description = null
    ): static {
        $this->tryCallByPath(
            $this->getRootObjectFromDocumentBuilder(),
            'getSupplyChainTradeTransaction.getApplicableHeaderTradeAgreement.setBuyerTradeParty',
            null
        );

        $this->documentBuilder->setDocumentBuyerName($name);
        $this->documentBuilder->setDocumentBuyerId($id);

        return $this;
    }

    /**
     * Set the ID of the buyer/customer party
     *
     * @param  string $id __BT-46, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentBuyerId(
        string $id
    ): static {
        $this->documentBuilder->addDocumentBuyerId(
            $id
        );

        return $this;
    }

    /**
     * Add a global ID of the buyer/customer party
     *
     * @param  null|string $globalID     __BT-46-0, From BASIC WL__ A global identifier of the party
     * @param  null|string $globalIDType __BT-46-1, From BASIC WL__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentBuyerGlobalId(
        ?string $globalID = null,
        ?string $globalIDType = null
    ): static {
        $this->documentBuilder->addDocumentBuyerGlobalId(
            $globalID,
            $globalIDType
        );

        return $this;
    }

    /**
     * Add a Tax Registration to the buyer/customer party
     *
     * @param  null|string $taxRegType __BT-48-0, From MINIMUM__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $taxRegId   __BT-48, From MINIMUM__ Tax identification number
     * @return static
     */
    public function addDocumentBuyerTaxRegistration(
        ?string $taxRegType = null,
        ?string $taxRegId = null
    ): static {
        $this->documentBuilder->addDocumentBuyerTaxRegistration(
            $taxRegType,
            $taxRegId
        );

        return $this;
    }

    /**
     * Add information about the buyers's VAT Registration Number (Umsatzsteueridentnummer)
     *
     * @param  null|string $vatRegNo __BT-48, From MINIMUM__ VAT Registration Number (Umsatzsteueridentnummer)
     * @return static
     */
    public function addDocumentBuyerVATRegistrationNumber(
        ?string $vatRegNo = null
    ): static {
        return $this->addDocumentBuyerTaxRegistration(
            InvoiceSuiteCodelistReferenceCodeQualifiers::VAT_REGI_NUMB->value,
            $vatRegNo
        );
    }

    /**
     * Add information about the buyer's Tax Number (Steuernummer)
     *
     * @param  null|string $taxNo __BT-48, From MINIMUM__ Tax Number (Steuernummer)
     * @return static
     */
    public function addDocumentBuyerTaxNumber(
        ?string $taxNo = null
    ): static {
        return $this->addDocumentBuyerTaxRegistration(
            InvoiceSuiteCodelistReferenceCodeQualifiers::FISC_NUMB->value,
            $taxNo
        );
    }

    /**
     * Set the address of the buyer/customer party
     *
     * @param  null|string $lineOne     __BT-50, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $lineTwo     __BT-51, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $lineThree   __BT-163, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $postCode    __BT-53, From BASIC WL__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $city        __BT-52, From BASIC WL__ Name of the city or municipality in which the party's address is located
     * @param  null|string $country     __BT-55, From BASIC WL__ Country in which the party's address is located
     * @param  null|string $subDivision __BT-54, From BASIC WL__ Region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentBuyerAddress(
        ?string $lineOne = null,
        ?string $lineTwo = null,
        ?string $lineThree = null,
        ?string $postCode = null,
        ?string $city = null,
        ?string $country = null,
        ?string $subDivision = null
    ): static {
        $this->documentBuilder->setDocumentBuyerAddress(
            $lineOne,
            $lineTwo,
            $lineThree,
            $postCode,
            $city,
            $country,
            $subDivision
        );

        return $this;
    }

    /**
     * Set the legal information of the buyer/customer party
     *
     * @param  null|string $legalOrgId   __BT-47, From MINIMUM__ Identification number of the legal registration of the party
     * @param  null|string $legalOrgType __BT-47-1, From MINIMUM__ Type of the identification number of the legal registration of the party
     * @param  null|string $legalOrgName __BT-45, From BASIC WL__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentBuyerLegalOrganisation(
        ?string $legalOrgId = null,
        ?string $legalOrgType = null,
        ?string $legalOrgName = null
    ): static {
        $this->documentBuilder->setDocumentBuyerLegalOrganisation(
            $legalOrgType,
            $legalOrgId,
            $legalOrgName
        );

        return $this;
    }

    /**
     * Set the contact information of the buyer/customer party
     *
     * @param  null|string $contactPersonName     __BT-56, From EN 16931__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-56-0, From EN 16931__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-57, From EN 16931__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-115, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-58, From EN 16931__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentBuyerContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->setDocumentBuyerContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Add contact information of the buyer/customer party
     *
     * @param  null|string $contactPersonName     __BT-56, From EN 16931__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-56-0, From EN 16931__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-57, From EN 16931__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-115, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-58, From EN 16931__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentBuyerContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->addDocumentBuyerContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Set communication information of the buyer/customer party
     *
     * @param  null|string $uriScheme __BT-49-1, From BASIC WL__ The type for the party's electronic address
     * @param  null|string $uri       __BT-49, From BASIC WL__ The party's electronic address
     * @return static
     */
    public function setDocumentBuyerCommunication(
        ?string $uriScheme = null,
        ?string $uri = null
    ): static {
        $this->documentBuilder->setDocumentBuyerCommunication(
            $uriScheme,
            $uri
        );

        return $this;
    }

    /**
     * Sets the Information about the seller's tax representative
     *
     * @param  string      $name        __BT-62, From BASIC WL__ The full formal name under which the party is registered
     * @param  null|string $id          __BT-X-116, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @param  null|string $description __BT-, From __ Further legal information that is relevant for the sellers tax agent
     * @return static
     */
    public function setDocumentSellerTaxRepresentativeTradeParty(
        string $name,
        ?string $id = null,
        ?string $description = null
    ): static {
        $this->tryCallByPath(
            $this->getRootObjectFromDocumentBuilder(),
            'getSupplyChainTradeTransaction.getApplicableHeaderTradeAgreement.setSellerTaxRepresentativeTradeParty',
            null
        );

        $this->documentBuilder->setDocumentTaxRepresentativeName($name);
        $this->documentBuilder->setDocumentTaxRepresentativeId($id);

        return $this;
    }

    /**
     * Add a global ID of the tax representative party
     *
     * @param  null|string $globalID     __BT-X-117, From EXTENDED__ A global identifier of the party
     * @param  null|string $globalIDType __BT-X-117-1, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentSellerTaxRepresentativeGlobalId(
        ?string $globalID = null,
        ?string $globalIDType = null
    ): static {
        $this->documentBuilder->addDocumentTaxRepresentativeGlobalId(
            $globalID,
            $globalIDType
        );

        return $this;
    }

    /**
     * Set the Tax Registration of the tax representative party
     *
     * @param  null|string $taxRegType __BT-63-0, From BASIC WL__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $taxRegId   __BT-63, From BASIC WL__ Tax identification number
     * @return static
     */
    public function addDocumentSellerTaxRepresentativeTaxRegistration(
        ?string $taxRegType = null,
        ?string $taxRegId = null
    ): static {
        $this->documentBuilder->addDocumentTaxRepresentativeTaxRegistration(
            $taxRegType,
            $taxRegId
        );

        return $this;
    }

    /**
     * Set the address of the tax representative party
     *
     * @param  null|string $lineOne     __BT-64, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $lineTwo     __BT-65, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $lineThree   __BT-164, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $postCode    __BT-67, From BASIC WL__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $city        __BT-66, From BASIC WL__ Name of the city or municipality in which the party's address is located
     * @param  null|string $country     __BT-69, From BASIC WL__ Country in which the party's address is located
     * @param  null|string $subDivision __BT-68, From BASIC WL__ Region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentSellerTaxRepresentativeAddress(
        ?string $lineOne = null,
        ?string $lineTwo = null,
        ?string $lineThree = null,
        ?string $postCode = null,
        ?string $city = null,
        ?string $country = null,
        ?string $subDivision = null
    ): static {
        $this->documentBuilder->setDocumentTaxRepresentativeAddress(
            $lineOne,
            $lineTwo,
            $lineThree,
            $postCode,
            $city,
            $country,
            $subDivision
        );

        return $this;
    }

    /**
     * Set legal organisation of the seller's tax representative party
     *
     * @param  null|string $legalOrgId   __BT-, From __ Identification number of the legal registration of the party
     * @param  null|string $legalOrgType __BT-, From __ Type of the identification number of the legal registration of the party
     * @param  null|string $legalOrgName __BT-, From __ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentSellerTaxRepresentativeLegalOrganisation(
        ?string $legalOrgId = null,
        ?string $legalOrgType = null,
        ?string $legalOrgName = null
    ): static {
        $this->documentBuilder->setDocumentTaxRepresentativeLegalOrganisation(
            $legalOrgType,
            $legalOrgId,
            $legalOrgName
        );

        return $this;
    }

    /**
     * Set the contact information of the tax representative party
     *
     * @param  null|string $contactPersonName     __BT-X-120, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-X-121, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-X-122, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-123, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-124, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentSellerTaxRepresentativeContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->setDocumentTaxRepresentativeContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Add contact information of the tax representative party
     *
     * @param  null|string $contactPersonName     __BT-X-120, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-X-121, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-X-122, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-123, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-124, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentSellerTaxRepresentativeContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->addDocumentTaxRepresentativeContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Detailed information on the deviating end user (general informaton)
     *
     * @param  string      $name        __BT-X-128, From EXTENDED__ The full formal name under which the party is registered
     * @param  null|string $id          __BT-X-126, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @param  null|string $description __BT-, From __ Further legal information that is relevant for the product end user
     * @return static
     */
    public function setDocumentProductEndUser(
        string $name,
        ?string $id = null,
        ?string $description = null
    ): static {
        $this->tryCallByPath(
            $this->getRootObjectFromDocumentBuilder(),
            'getSupplyChainTradeTransaction.getApplicableHeaderTradeAgreement.setProductEndUserTradeParty',
            null
        );

        $this->documentBuilder->setDocumentProductEndUserName($name);
        $this->documentBuilder->setDocumentProductEndUserId($id);

        return $this;
    }

    /**
     * Add a global ID of the product end-user party
     *
     * @param  null|string $globalID     __BT-X-127, From EXTENDED__ A global identifier of the party
     * @param  null|string $globalIDType __BT-X-127-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentProductEndUserGlobalId(
        ?string $globalID = null,
        ?string $globalIDType = null
    ): static {
        $this->documentBuilder->setDocumentProductEndUserGlobalId(
            $globalID,
            $globalIDType
        );

        return $this;
    }

    /**
     * Add Tax registration to the deviating end user
     *
     * @param  null|string $taxRegType __BT-, From __ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $taxRegId   __BT-, From __ Tax identification number
     * @return static
     */
    public function addDocumentProductEndUserTaxRegistration(
        ?string $taxRegType = null,
        ?string $taxRegId = null
    ): static {
        $this->documentBuilder->addDocumentProductEndUserTaxRegistration(
            $taxRegType,
            $taxRegId
        );

        return $this;
    }

    /**
     * Set the address of the product end-user party
     *
     * @param  null|string $lineOne     __BT-X-397, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $lineTwo     __BT-X-398, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $lineThree   __BT-X-399, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $postCode    __BT-X-396, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $city        __BT-X-400, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $country     __BT-X-401, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $subDivision __BT-X-402, From EXTENDED__ Region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentProductEndUserAddress(
        ?string $lineOne = null,
        ?string $lineTwo = null,
        ?string $lineThree = null,
        ?string $postCode = null,
        ?string $city = null,
        ?string $country = null,
        ?string $subDivision = null
    ): static {
        $this->documentBuilder->setDocumentProductEndUserAddress(
            $lineOne,
            $lineTwo,
            $lineThree,
            $postCode,
            $city,
            $country,
            $subDivision
        );

        return $this;
    }

    /**
     * Set legal organisation of the Product Enduser party
     *
     * @param  null|string $legalOrgId   __BT-X-129, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $legalOrgType __BT-X-129-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $legalOrgName __BT-X-130, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentProductEndUserLegalOrganisation(
        ?string $legalOrgId = null,
        ?string $legalOrgType = null,
        ?string $legalOrgName = null
    ): static {
        $this->documentBuilder->setDocumentProductEndUserLegalOrganisation(
            $legalOrgType,
            $legalOrgId,
            $legalOrgName
        );

        return $this;
    }

    /**
     * Set the contact information of the product end-user party
     *
     * @param  null|string $contactPersonName     __BT-X-131, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-X-132, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-X-133, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-134, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-135, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentProductEndUserContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->setDocumentProductEndUserContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Add contact information of the product end-user party
     *
     * @param  null|string $contactPersonName     __BT-X-131, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-X-132, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-X-133, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-134, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-135, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentProductEndUserContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->addDocumentProductEndUserContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Ship-To
     *
     * @param  null|string $name        __BT-70, From BASIC WL__ The full formal name under which the party is registered
     * @param  null|string $id          __BT-71, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @param  null|string $description __BT-, From __ Further legal information that is relevant for the party
     * @return static
     */
    public function setDocumentShipTo(
        ?string $name = null,
        ?string $id = null,
        ?string $description = null
    ): static {
        $this->tryCallByPath(
            $this->getRootObjectFromDocumentBuilder(),
            'getSupplyChainTradeTransaction.getApplicableHeaderTradeDelivery.setShipToTradeParty',
            null
        );

        $this->documentBuilder->setDocumentShipToName($name);
        $this->documentBuilder->setDocumentShipToId($id);

        return $this;
    }

    /**
     * Set the ID of the Ship-To party
     *
     * @param  string $id __BT-71, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentShipTolId(
        string $id
    ): static {
        $this->documentBuilder->addDocumentShipToId(
            $id
        );

        return $this;
    }

    /**
     * Add a global ID of the Ship-To party
     *
     * @param  null|string $globalID     __BT-71-0, From BASIC WL__ A global identifier of the party
     * @param  null|string $globalIDType __BT-71-1, From BASIC WL__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentShipToGlobalId(
        ?string $globalID = null,
        ?string $globalIDType = null
    ): static {
        $this->documentBuilder->addDocumentShipToGlobalId(
            $globalID,
            $globalIDType
        );

        return $this;
    }

    /**
     * Add Tax registration to Ship-To Trade party
     *
     * @param  null|string $taxRegType __BT-X-161-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $taxRegId   __BT-X-161, From EXTENDED__ Tax identification number
     * @return static
     */
    public function addDocumentShipToTaxRegistration(
        ?string $taxRegType = null,
        ?string $taxRegId = null
    ): static {
        $this->documentBuilder->addDocumentShipToTaxRegistration(
            $taxRegType,
            $taxRegId
        );

        return $this;
    }

    /**
     * Set the address of the Ship-To party
     *
     * @param  null|string $lineOne     __BT-75, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $lineTwo     __BT-76, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $lineThree   __BT-165, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $postCode    __BT-78, From BASIC WL__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $city        __BT-77, From BASIC WL__ Name of the city or municipality in which the party's address is located
     * @param  null|string $country     __BT-80, From BASIC WL__ Country in which the party's address is located
     * @param  null|string $subDivision __BT-79, From BASIC WL__ Region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentShipToAddress(
        ?string $lineOne = null,
        ?string $lineTwo = null,
        ?string $lineThree = null,
        ?string $postCode = null,
        ?string $city = null,
        ?string $country = null,
        ?string $subDivision = null
    ): static {
        $this->documentBuilder->setDocumentShipToAddress(
            $lineOne,
            $lineTwo,
            $lineThree,
            $postCode,
            $city,
            $country,
            $subDivision
        );

        return $this;
    }

    /**
     * Set the legal information of the Ship-To party
     *
     * @param  null|string $legalOrgId   __BT-X-153, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $legalOrgType __BT-X-153-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $legalOrgName __BT-X-154, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentShipToLegalOrganisation(
        ?string $legalOrgId = null,
        ?string $legalOrgType = null,
        ?string $legalOrgName = null
    ): static {
        $this->documentBuilder->setDocumentShipToLegalOrganisation(
            $legalOrgType,
            $legalOrgId,
            $legalOrgName
        );

        return $this;
    }

    /**
     * Set the contact information of the Ship-To party
     *
     * @param  null|string $contactPersonName     __BT-X-155, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-X-156, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-X-157, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-158, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-159, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentShipToContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->setDocumentShipToContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Add contact information of the Ship-To party
     *
     * @param  null|string $contactPersonName     __BT-X-155, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-X-156, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-X-157, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-158, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-159, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentShipToContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->addDocumentShipToContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Detailed information on the different end recipient
     *
     * @param  null|string $name        __BT-X-164, From EXTENDED__ The full formal name under which the party is registered
     * @param  null|string $id          __BT-X-162, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @param  null|string $description __BT-, From __ Further legal information that is relevant for the different end recipient
     * @return static
     */
    public function setDocumentUltimateShipTo(
        ?string $name = null,
        ?string $id = null,
        ?string $description = null
    ): static {
        $this->tryCallByPath(
            $this->getRootObjectFromDocumentBuilder(),
            'getSupplyChainTradeTransaction.getApplicableHeaderTradeDelivery.setUltimateShipToTradeParty',
            null
        );

        $this->documentBuilder->setDocumentUltimateShipToName($name);
        $this->documentBuilder->setDocumentUltimateShipToId($id);

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param  string $id __BT-X-162, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentUltimateShipToId(
        string $id
    ): static {
        $this->documentBuilder->addDocumentUltimateShipToId(
            $id
        );

        return $this;
    }

    /**
     * Add a global ID of the ultimate Ship-To party
     *
     * @param  null|string $globalID     __BT-X-163, From EXTENDED__ A global identifier of the party
     * @param  null|string $globalIDType __BT-X-163-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentUltimateShipToGlobalId(
        ?string $globalID = null,
        ?string $globalIDType = null
    ): static {
        $this->documentBuilder->addDocumentUltimateShipToGlobalId(
            $globalID,
            $globalIDType
        );

        return $this;
    }

    /**
     * Add a Tax Registration to the ultimate Ship-To party
     *
     * @param  null|string $taxRegType __BT-X-180-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $taxRegId   __BT-X-180, From EXTENDED__ Tax identification number
     * @return static
     */
    public function addDocumentUltimateShipToTaxRegistration(
        ?string $taxRegType = null,
        ?string $taxRegId = null
    ): static {
        $this->documentBuilder->addDocumentUltimateShipToTaxRegistration(
            $taxRegType,
            $taxRegId
        );

        return $this;
    }

    /**
     * Set the address of the ultimate Ship-To party
     *
     * @param  null|string $lineOne     __BT-X-173, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $lineTwo     __BT-X-174, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $lineThree   __BT-X-175, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $postCode    __BT-X-172, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $city        __BT-X-176, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $country     __BT-X-177, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $subDivision __BT-X-178, From EXTENDED__ Region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentUltimateShipToAddress(
        ?string $lineOne = null,
        ?string $lineTwo = null,
        ?string $lineThree = null,
        ?string $postCode = null,
        ?string $city = null,
        ?string $country = null,
        ?string $subDivision = null
    ): static {
        $this->documentBuilder->setDocumentUltimateShipToAddress(
            $lineOne,
            $lineTwo,
            $lineThree,
            $postCode,
            $city,
            $country,
            $subDivision
        );

        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param  null|string $legalOrgId   __BT-X-165, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $legalOrgType __BT-X-165-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $legalOrgName __BT-X-166, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentUltimateShipToLegalOrganisation(
        ?string $legalOrgId = null,
        ?string $legalOrgType = null,
        ?string $legalOrgName = null
    ): static {
        $this->documentBuilder->setDocumentUltimateShipToLegalOrganisation(
            $legalOrgType,
            $legalOrgId,
            $legalOrgName
        );

        return $this;
    }

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param  null|string $contactPersonName     __BT-X-167, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-X-168, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-X-169, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-170, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-171, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentUltimateShipToContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->setDocumentUltimateShipToContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param  null|string $contactPersonName     __BT-X-167, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-X-168, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-X-169, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-170, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-171, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentUltimateShipToContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->addDocumentUltimateShipToContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Set detailed information of the ship-from party
     *
     * @param  null|string $name        __BT-X-183, From EXTENDED__ The full formal name under which the party is registered
     * @param  null|string $id          __BT-X-181, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @param  null|string $description __BT-, From __ Further legal information that is relevant for the party
     * @return static
     */
    public function setDocumentShipFrom(
        ?string $name = null,
        ?string $id = null,
        ?string $description = null
    ): static {
        $this->tryCallByPath(
            $this->getRootObjectFromDocumentBuilder(),
            'getSupplyChainTradeTransaction.getApplicableHeaderTradeDelivery.setShipFromTradeParty',
            null
        );

        $this->documentBuilder->setDocumentShipFromName($name);
        $this->documentBuilder->setDocumentShipFromId($id);

        return $this;
    }

    /**
     * Add an ID to the Ship-From party
     *
     * @param  string $id __BT-X-181, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentShipFromId(
        string $id
    ): static {
        $this->documentBuilder->addDocumentShipFromId(
            $id
        );

        return $this;
    }

    /**
     * Add a global ID to the Ship-From party
     *
     * @param  null|string $globalID     __BT-X-182, From EXTENDED__ A global identifier of the party
     * @param  null|string $globalIDType __BT-X-182-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentShipFromGlobalId(
        ?string $globalID = null,
        ?string $globalIDType = null
    ): static {
        $this->documentBuilder->addDocumentShipFromGlobalId(
            $globalID,
            $globalIDType
        );

        return $this;
    }

    /**
     * Add a Tax Registration to the Ship-From party
     *
     * @param  null|string $taxRegType __BT-X-199-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $taxRegId   __BT-X-199, From EXTENDED__ Tax identification number
     * @return static
     */
    public function addDocumentShipFromTaxRegistration(
        ?string $taxRegType = null,
        ?string $taxRegId = null
    ): static {
        $this->documentBuilder->addDocumentShipFromTaxRegistration(
            $taxRegType,
            $taxRegId
        );

        return $this;
    }

    /**
     * Set the address of the Ship-From party
     *
     * @param  null|string $lineOne     __BT-X-192, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $lineTwo     __BT-X-193, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $lineThree   __BT-X-194, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $postCode    __BT-X-191, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $city        __BT-X-195, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $country     __BT-X-196, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $subDivision __BT-X-197, From EXTENDED__ Region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentShipFromAddress(
        ?string $lineOne = null,
        ?string $lineTwo = null,
        ?string $lineThree = null,
        ?string $postCode = null,
        ?string $city = null,
        ?string $country = null,
        ?string $subDivision = null
    ): static {
        $this->documentBuilder->setDocumentShipFromAddress(
            $lineOne,
            $lineTwo,
            $lineThree,
            $postCode,
            $city,
            $country,
            $subDivision
        );

        return $this;
    }

    /**
     * Set legal organisation of the deviating consignor party
     *
     * @param  null|string $legalOrgId   __BT-X-184, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $legalOrgType __BT-X-184-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $legalOrgName __BT-X-185, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentShipFromLegalOrganisation(
        ?string $legalOrgId = null,
        ?string $legalOrgType = null,
        ?string $legalOrgName = null
    ): static {
        $this->documentBuilder->setDocumentShipFromLegalOrganisation(
            $legalOrgType,
            $legalOrgId,
            $legalOrgName
        );

        return $this;
    }

    /**
     * Set the contact information of the Ship-From party
     *
     * @param  null|string $contactPersonName     __BT-X-186, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-X-187, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-X-188, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-189, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-190, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentShipFromContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->setDocumentShipFromContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Add contact information of the Ship-From party
     *
     * @param  null|string $contactPersonName     __BT-X-186, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-X-187, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-X-188, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-189, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-190, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentShipFromContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->addDocumentShipFromContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Detailed information about the Invoicer Party
     *
     * @param  string      $name        __BT-X-207, From EXTENDED__ The full formal name under which the party is registered
     * @param  null|string $id          __BT-X-205, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @param  null|string $description __BT-, From __ Further legal information that is relevant for the party
     * @return static
     */
    public function setDocumentInvoicer(
        string $name,
        ?string $id = null,
        ?string $description = null
    ): static {
        $this->tryCallByPath(
            $this->getRootObjectFromDocumentBuilder(),
            'getSupplyChainTradeTransaction.getApplicableHeaderTradeSettlement.setInvoicerTradeParty',
            null
        );

        $this->documentBuilder->setDocumentInvoicerName($name);
        $this->documentBuilder->setDocumentInvoicerId($id);

        return $this;
    }

    /**
     * Add an id to the Invoicer Party
     *
     * @param  string $id __BT-X-205, From EXTENDED__ An identifier for the party. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should  be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @return static
     */
    public function addDocumentInvoicerId(
        string $id
    ): static {
        $this->documentBuilder->addDocumentInvoicerId(
            $id
        );

        return $this;
    }

    /**
     * Add a global ID to the Invoicer party
     *
     * @param  null|string $globalID     __BT-X-206, From EXTENDED__ A global identifier of the party
     * @param  null|string $globalIDType __BT-X-206-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentInvoicerGlobalId(
        ?string $globalID = null,
        ?string $globalIDType = null
    ): static {
        $this->documentBuilder->addDocumentInvoicerGlobalId(
            $globalID,
            $globalIDType
        );

        return $this;
    }

    /**
     * Add a Tax Registration to the Invoicer party
     *
     * @param  null|string $taxRegType __BT-X-223-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $taxRegId   __BT-X-223, From EXTENDED__ Tax identification number
     * @return static
     */
    public function addDocumentInvoicerTaxRegistration(
        ?string $taxRegType = null,
        ?string $taxRegId = null
    ): static {
        $this->documentBuilder->addDocumentInvoicerTaxRegistration(
            $taxRegType,
            $taxRegId
        );

        return $this;
    }

    /**
     * Set the address of the Invoicer party
     *
     * @param  null|string $lineOne     __BT-X-216, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $lineTwo     __BT-X-217, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $lineThree   __BT-X-218, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $postCode    __BT-X-215, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $city        __BT-X-219, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $country     __BT-X-220, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $subDivision __BT-X-221, From EXTENDED__ Region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentInvoicerAddress(
        ?string $lineOne = null,
        ?string $lineTwo = null,
        ?string $lineThree = null,
        ?string $postCode = null,
        ?string $city = null,
        ?string $country = null,
        ?string $subDivision = null
    ): static {
        $this->documentBuilder->setDocumentInvoicerAddress(
            $lineOne,
            $lineTwo,
            $lineThree,
            $postCode,
            $city,
            $country,
            $subDivision
        );

        return $this;
    }

    /**
     * Set the legal information of the Invoicer party
     *
     * @param  null|string $legalOrgId   __BT-X-208, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $legalOrgType __BT-X-208-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $legalOrgName __BT-X-209, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentInvoicerLegalOrganisation(
        ?string $legalOrgId,
        ?string $legalOrgType,
        ?string $legalOrgName
    ): static {
        $this->documentBuilder->setDocumentInvoicerLegalOrganisation(
            $legalOrgType,
            $legalOrgId,
            $legalOrgName
        );

        return $this;
    }

    /**
     * Set the contact information of the Invoicer party
     *
     * @param  null|string $contactPersonName     __BT-X-210, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-X-211, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-X-212, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-213, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-214, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentInvoicerContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->setDocumentInvoicerContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Add contact information of the Invoicer party
     *
     * @param  null|string $contactPersonName     __BT-X-210, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-X-211, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-X-212, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-213, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-214, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentInvoicerContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->addDocumentInvoicerContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Set detailed information on the different invoice recipient
     *
     * @param  string      $name        __BT-X-226, From EXTENDED__ The full formal name under which the party is registered
     * @param  null|string $id          __BT-X-224, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @param  null|string $description __BT-, From __ Further legal information that is relevant for the party
     * @return static
     */
    public function setDocumentInvoicee(
        string $name,
        ?string $id = null,
        ?string $description = null
    ): static {
        $this->tryCallByPath(
            $this->getRootObjectFromDocumentBuilder(),
            'getSupplyChainTradeTransaction.getApplicableHeaderTradeSettlement.setInvoiceeTradeParty',
            null
        );

        $this->documentBuilder->setDocumentInvoiceeName($name);
        $this->documentBuilder->setDocumentInvoiceeId($id);

        return $this;
    }

    /**
     * Add an ID to the Invoicee party
     *
     * @param  string $id __BT-X-224, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentInvoiceeId(
        string $id
    ): static {
        $this->documentBuilder->addDocumentInvoiceeId(
            $id
        );

        return $this;
    }

    /**
     * Add a global ID to the Invoicee party
     *
     * @param  null|string $globalID     __BT-X-225, From EXTENDED__ A global identifier of the party
     * @param  null|string $globalIDType __BT-X-225-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentInvoiceeGlobalId(
        ?string $globalID = null,
        ?string $globalIDType = null
    ): static {
        $this->documentBuilder->addDocumentInvoiceeGlobalId(
            $globalID,
            $globalIDType
        );

        return $this;
    }

    /**
     * Add an Tax Registration to the Invoicee party
     *
     * @param  null|string $taxRegType __BT-X-242-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $taxRegId   __BT-X-242, From EXTENDED__ Tax identification number
     * @return static
     */
    public function addDocumentInvoiceeTaxRegistration(
        ?string $taxRegType = null,
        ?string $taxRegId = null
    ): static {
        $this->documentBuilder->addDocumentInvoiceeTaxRegistration(
            $taxRegType,
            $taxRegId
        );

        return $this;
    }

    /**
     * Set the address of the Invoicee party
     *
     * @param  null|string $lineOne     __BT-X-235, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $lineTwo     __BT-X-236, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $lineThree   __BT-X-237, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $postCode    __BT-X-234, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $city        __BT-X-238, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $country     __BT-X-239, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $subDivision __BT-X-240, From EXTENDED__ Region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentInvoiceeAddress(
        ?string $lineOne = null,
        ?string $lineTwo = null,
        ?string $lineThree = null,
        ?string $postCode = null,
        ?string $city = null,
        ?string $country = null,
        ?string $subDivision = null
    ): static {
        $this->documentBuilder->setDocumentInvoiceeAddress(
            $lineOne,
            $lineTwo,
            $lineThree,
            $postCode,
            $city,
            $country,
            $subDivision
        );

        return $this;
    }

    /**
     * Set the legal information of the Invoicee party
     *
     * @param  null|string $legalOrgId   __BT-X-227, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $legalOrgType __BT-X-227-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $legalOrgName __BT-X-228, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentInvoiceeLegalOrganisation(
        ?string $legalOrgId = null,
        ?string $legalOrgType = null,
        ?string $legalOrgName = null
    ): static {
        $this->documentBuilder->setDocumentInvoiceeLegalOrganisation(
            $legalOrgType,
            $legalOrgId,
            $legalOrgName
        );

        return $this;
    }

    /**
     * Set the contact information of the Invoicee party
     *
     * @param  null|string $contactPersonName     __BT-X-229, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-X-230, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-X-231, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-232, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-233, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentInvoiceeContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->setDocumentInvoiceeContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Add contact information of the Invoicee party
     *
     * @param  null|string $contactPersonName     __BT-X-229, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-X-230, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-X-231, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-232, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-233, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentInvoiceeContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->addDocumentInvoiceeContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Set detailed information about the payee, i.e. about the place that receives the payment.
     * The role of the payee may also be performed by a party other than the seller, e.g. by a factoring service.
     *
     * @param  string      $name        __BT-59, From BASIC WL__ The full formal name under which the party is registered
     * @param  null|string $id          __BT-60, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @param  null|string $description __BT-, From __ Further legal information that is relevant for the party
     * @return static
     */
    public function setDocumentPayee(
        string $name,
        ?string $id = null,
        ?string $description = null
    ): static {
        $this->tryCallByPath(
            $this->getRootObjectFromDocumentBuilder(),
            'getSupplyChainTradeTransaction.getApplicableHeaderTradeSettlement.setPayeeTradeParty',
            null
        );

        $this->documentBuilder->setDocumentPayeeName($name);
        $this->documentBuilder->setDocumentPayeeId($id);

        return $this;
    }

    /**
     * Add an ID to the Payee party
     *
     * @param  string $id __BT-60, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentPayeeId(
        string $id
    ): static {
        $this->documentBuilder->addDocumentPayeeId($id);

        return $this;
    }

    /**
     * Add a global ID to the Payee party
     *
     * @param  null|string $globalID     __BT-60-0, From BASIC WL__ A global identifier of the party
     * @param  null|string $globalIDType __BT-60-1, From BASIC WL__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentPayeeGlobalId(
        ?string $globalID = null,
        ?string $globalIDType = null
    ): static {
        $this->documentBuilder->addDocumentPayeeGlobalId(
            $globalID,
            $globalIDType
        );

        return $this;
    }

    /**
     * Add a Tax Registration to the Payee party
     *
     * @param  null|string $taxRegType __BT-X-257-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $taxRegId   __BT-X-257, From EXTENDED__ Tax identification number
     * @return static
     */
    public function addDocumentPayeeTaxRegistration(
        ?string $taxRegType = null,
        ?string $taxRegId = null
    ): static {
        $this->documentBuilder->addDocumentPayeeTaxRegistration(
            $taxRegType,
            $taxRegId
        );

        return $this;
    }

    /**
     * Set the address of the Payee party
     *
     * @param  null|string $lineOne     __BT-X-250, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $lineTwo     __BT-X-251, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $lineThree   __BT-X-252, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $postCode    __BT-X-249, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $city        __BT-X-253, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $country     __BT-X-254, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $subDivision __BT-X-255, From EXTENDED__ Region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentPayeeAddress(
        ?string $lineOne = null,
        ?string $lineTwo = null,
        ?string $lineThree = null,
        ?string $postCode = null,
        ?string $city = null,
        ?string $country = null,
        ?string $subDivision = null
    ): static {
        $this->documentBuilder->setDocumentPayeeAddress(
            $lineOne,
            $lineTwo,
            $lineThree,
            $postCode,
            $city,
            $country,
            $subDivision
        );

        return $this;
    }

    /**
     * Set the legal information of the Payee party
     *
     * @param  null|string $legalOrgId   __BT-61, From BASIC WL__ Identification number of the legal registration of the party
     * @param  null|string $legalOrgType __BT-61-1, From BASIC WL__ Type of the identification number of the legal registration of the party
     * @param  null|string $legalOrgName __BT-X-243, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentPayeeLegalOrganisation(
        ?string $legalOrgId = null,
        ?string $legalOrgType = null,
        ?string $legalOrgName = null
    ): static {
        $this->documentBuilder->setDocumentPayeeLegalOrganisation(
            $legalOrgType,
            $legalOrgId,
            $legalOrgName
        );

        return $this;
    }

    /**
     * Set the contact information of the Payee party
     *
     * @param  null|string $contactPersonName     __BT-X-244, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-X-245, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-X-246, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-247, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-248, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentPayeeContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->setDocumentPayeeContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Add contact information of the Payee party
     *
     * @param  null|string $contactPersonName     __BT-X-244, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $contactDepartmentName __BT-X-245, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $contactPhoneNo        __BT-X-246, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-247, From EXTENDED__ Fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-248, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentPayeeContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->addDocumentPayeeContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Set information on the delivery conditions
     *
     * @param  null|string $code __BT-X-145, From EXTENDED__ The code indicating the type of delivery for these commercial delivery terms. To be selected from the entries in the list UNTDID 4053 + INCOTERMS
     * @return static
     */
    public function setDocumentDeliveryTerms(?string $code): static
    {
        // Currently not supported
        // TODO: Add support for setDocumentDeliveryTerms

        return $this;
    }

    /**
     * Set the associated seller's order confirmation.
     *
     * @param  string                 $issuerAssignedId __BT-14, From EN 16931__ Seller's order confirmation number
     * @param  null|DateTimeInterface $issueDate        __BT-X-146, From EXTENDED__ Seller's order confirmation date
     * @return static
     */
    public function setDocumentSellerOrderReferencedDocument(
        string $issuerAssignedId,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->setDocumentSellerOrderReference(
            $issuerAssignedId,
            $issueDate
        );

        return $this;
    }

    /**
     * Set the associated buyer's order
     *
     * @param  string                 $issuerAssignedId __BT-13, From MINIMUM__ Buyers's order number
     * @param  null|DateTimeInterface $issueDate        __BT-X-147, From EXTENDED__ Buyer's order date
     * @return static
     */
    public function setDocumentBuyerOrderReferencedDocument(
        string $issuerAssignedId,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->setDocumentBuyerOrderReference(
            $issuerAssignedId,
            $issueDate
        );

        return $this;
    }

    /**
     * Set the associated quotation
     *
     * @param  string                 $issuerAssignedId __BT-X-403, From EXTENDED__ Quotation number
     * @param  null|DateTimeInterface $issueDate        __BT-X-404, From EXTENDED__ Quotation date
     * @return static
     */
    public function setDocumentQuotationReferencedDocument(
        string $issuerAssignedId,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->setDocumentQuotationReference(
            $issuerAssignedId,
            $issueDate
        );

        return $this;
    }

    /**
     * Set the associated contract
     *
     * @param  string                 $issuerAssignedId __BT-12, From BASIC WL__ Contract number
     * @param  null|DateTimeInterface $issueDate        __BT-X-26, From EXTENDED__ Contract date
     * @return static
     */
    public function setDocumentContractReferencedDocument(
        string $issuerAssignedId,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->setDocumentContractReference(
            $issuerAssignedId,
            $issueDate
        );

        return $this;
    }

    /**
     * Set information about billing documents that provide evidence of claims made in the bill
     *
     * @param  string                        $issuerAssignedId   __BT-122, From EN 16931__ The identifier of the tender or lot to which the invoice relates, or an identifier specified by the seller for an object on which the invoice is based, or an identifier of the document on which the invoice is based
     * @param  string                        $typeCode           __BT-122-0, From EN 16931__ Type of referenced document (See codelist UNTDID 1001)
     *                                                           - Code 916 "reference paper" is used to reference the identification of the
     *                                                           document on which the invoice is based - Code 50 "Price / sales catalog response"
     *                                                           is used to reference the tender or the lot - Code 130 "invoice data sheet" is used
     *                                                           to reference an identifier for an object specified by the seller
     * @param  null|string                   $uriId              __BT-124, From EN 16931__ A means of locating the resource, including the primary access method intended for it, e.g. http:// or ftp://. The storage location of the external document must be used if the buyer requires further information as
     *                                                           supporting documents for the invoiced amounts. External documents are not part of the invoice. Invoice processing should be possible without access to external documents. Access to external documents can entail certain risks.
     * @param  null|array<int,string>|string $name               __BT-123, From EN 16931__ A description of the document, e.g. Hourly billing, usage or consumption report, etc.
     * @param  null|string                   $refTypeCode        __BT-18-1, From ENN 16931__ The identifier for the identification scheme of the identifier of the item invoiced. If it is not clear to the recipient which scheme is used for the identifier, an identifier of the scheme should be used, which must be selected from UNTDID 1153 in accordance with the code list entries.
     * @param  null|DateTimeInterface        $issueDate          __BT-X-149, From EXTENDED__ Document date
     * @param  null|string                   $binaryDataFilename __BT-125, From EN 16931__ Contains a file name of an attachment document embedded as a binary object
     * @return static
     */
    public function addDocumentAdditionalReferencedDocument(
        string $issuerAssignedId,
        string $typeCode,
        ?string $uriId = null,
        $name = null,
        ?string $refTypeCode = null,
        ?DateTimeInterface $issueDate = null,
        ?string $binaryDataFilename = null
    ): static {
        $attachment = null;

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($uriId)) {
            $attachment = InvoiceSuiteAttachment::fromUrl($uriId);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($binaryDataFilename)) {
            $attachment = InvoiceSuiteAttachment::fromFile($binaryDataFilename);
        }

        $name = is_array($name)
            ? ($name[array_key_first($name)] ?? '')
            : $name;

        $this->documentBuilder->addDocumentAdditionalReference(
            $issuerAssignedId,
            $issueDate,
            $typeCode,
            $refTypeCode,
            $name,
            $attachment
        );

        return $this;
    }

    /**
     * Add an invoice supporting additional document reference with an URL which specifies the location where the information can be found
     * The invoice supporting documents can be used to reference a document number, which should be known to the recipient, as well as an external document (referenced by a URL).
     * The option of linking to an external document is required, for example, when large attachments and/or sensitive information, e.g. for personal services, are involved,
     * which must be separated from the invoice.
     *
     * @param  string                        $issuerAssignedId __BT-122, From EN 16931__ Identification of the document supporting the invoice
     * @param  string                        $uriId            __BT-124, From EN 16931__ A means of locating the resource, including the primary access method intended for it, e.g. http:// or ftp://. The storage location of the external document must be used if the buyer requires further information as
     * @param  null|array<int,string>|string $name             __BT-123, From EN 16931__ A description of the document, e.g. Hourly billing, usage or consumption report, etc.
     * @return static
     */
    public function addDocumentInvoiceSupportingDocumentWithUri(
        string $issuerAssignedId,
        string $uriId,
        $name = null
    ): static {
        return $this->addDocumentAdditionalReferencedDocument(
            issuerAssignedId: $issuerAssignedId,
            typeCode: InvoiceSuiteCodelistDocumentTypes::RELATED_DOCUMENT->value,
            uriId: $uriId,
            name: $name
        );
    }

    /**
     * Add an invoice supporting additional document reference with an URL which specifies the location where the information can be found
     * The invoice supporting documents can be used to reference both a document number, which should be known to the recipient, and an embedded file (such as a timesheet as a PDF file).
     *
     * @param  string                        $issuerAssignedId   __BT-122, From EN 16931__ Identification of the document supporting the invoice
     * @param  string                        $binaryDataFilename __BT-125, From EN 16931__ Contains a file name of an attachment document embedded as a binary object
     * @param  null|array<int,string>|string $name               __BT-123, From EN 16931__ A description of the document, e.g. Hourly billing, usage or consumption report, etc.
     * @return static
     */
    public function addDocumentInvoiceSupportingDocumentWithFile(
        string $issuerAssignedId,
        string $binaryDataFilename,
        $name = null
    ): static {
        return $this->addDocumentAdditionalReferencedDocument(
            issuerAssignedId: $issuerAssignedId,
            typeCode: InvoiceSuiteCodelistDocumentTypes::RELATED_DOCUMENT->value,
            name: $name,
            binaryDataFilename: $binaryDataFilename
        );
    }

    /**
     * Add a tender or lot document reference
     *
     * @param  string $issuerAssignedId __BT-122, From EN 16931__ Tender or lot reference
     * @return static
     */
    public function addDocumentTenderOrLotReferenceDocument(
        string $issuerAssignedId
    ): static {
        return $this->addDocumentAdditionalReferencedDocument(
            issuerAssignedId: $issuerAssignedId,
            typeCode: InvoiceSuiteCodelistDocumentTypes::VALIDATED_PRICED_TENDER->value
        );
    }

    /**
     * Add details of the calculated object
     *
     * @param  string $issuerAssignedId __BT-122, From EN 16931__ Depending on the application, this can be a subscription number, a telephone number, a meter reading, a vehicle, a person, etc
     * @param  string $refTypeCode      __BT-18-1, From ENN 16931__ The identifier for the identification scheme of the identifier of the item invoiced. If it is not clear to the recipient which scheme is used for the identifier, an identifier of the scheme should be used, which must be selected from UNTDID 1153 in accordance with the code list entries.
     * @return static
     */
    public function addDocumentInvoicedObjectReferenceDocument(
        string $issuerAssignedId,
        string $refTypeCode
    ): static {
        return $this->addDocumentAdditionalReferencedDocument(
            issuerAssignedId: $issuerAssignedId,
            typeCode: InvoiceSuiteCodelistDocumentTypes::INVOICING_DATA_SHEET->value,
            refTypeCode: $refTypeCode
        );
    }

    /**
     * Set an additional invoice document (reference to preceding invoice)
     *
     * @param  string                 $issuerAssignedId __BT-25, From BASIC WL__ Identification of an invoice previously sent
     * @param  null|string            $typeCode         __BT-X-555, From EXTENDED__ Type code of previous invoice
     * @param  null|DateTimeInterface $issueDate        __BT-26, From BASIC WL__Date of the previous invoice
     * @return static
     */
    public function setDocumentInvoiceReferencedDocument(
        string $issuerAssignedId,
        ?string $typeCode = null,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->setDocumentInvoiceReference(
            $issuerAssignedId,
            $issueDate,
            $typeCode
        );

        return $this;
    }

    /**
     * Add an additional invoice document (reference to preceding invoice)
     *
     * @param  string                 $issuerAssignedId __BT-25, From BASIC WL__ The identification of an invoice previously sent by the seller
     * @param  null|string            $typeCode         __BT-X-555, From EXTENDED__ Type of previous invoice (code)
     * @param  null|DateTimeInterface $issueDate        __BT-26, From BASIC WL__ Date of the previous invoice
     * @return static
     */
    public function addDocumentInvoiceReferencedDocument(
        string $issuerAssignedId,
        ?string $typeCode = null,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->addDocumentInvoiceReference(
            $issuerAssignedId,
            $issueDate,
            $typeCode
        );

        return $this;
    }

    /**
     * Set an additional project reference
     *
     * @param  string      $id   __BT-11, From EN 16931__ The identifier of the project to which the invoice relates
     * @param  null|string $name __BT-11-0, From EN 16931__  The name of the project to which the invoice relates
     * @return static
     */
    public function setDocumentProcuringProject(
        string $id,
        ?string $name = null
    ): static {
        $this->documentBuilder->setDocumentProjectReference(
            $id,
            $name
        );

        return $this;
    }

    /**
     * Add an additional ultimate customer order reference
     *
     * @param  string                 $issuerAssignedId __BT-X-150, From EXTENDED__ Order number of the end customer
     * @param  null|DateTimeInterface $issueDate        __BT-X-151, From EXTENDED__ Date of the order issued by the end customer
     * @return static
     */
    public function addDocumentUltimateCustomerOrderReferencedDocument(
        string $issuerAssignedId,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->addDocumentUltimateCustomerOrderReference(
            $issuerAssignedId,
            $issueDate
        );

        return $this;
    }

    /**
     * Set detailed information on the actual delivery
     *
     * @param  null|DateTimeInterface $date __BT-72, From BASIC WL__ Actual delivery time
     * @return static
     */
    public function setDocumentSupplyChainEvent(
        ?DateTimeInterface $date = null
    ): static {
        $this->documentBuilder->setDocumentSupplyChainEvent(
            $date
        );

        return $this;
    }

    /**
     * Set an additional despatch advice reference
     *
     * @param  string                 $issuerAssignedId __BT-16, From BASIC WL__ Shipping notification reference
     * @param  null|DateTimeInterface $issueDate        __BT-X-200, From EXTENDED__ Shipping notification date
     * @return static
     */
    public function setDocumentDespatchAdviceReferencedDocument(
        string $issuerAssignedId,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->setDocumentDespatchAdviceReference(
            $issuerAssignedId,
            $issueDate
        );

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param  string                 $issuerAssignedId __BT-15, From EN 16931__ An identifier for a referenced goods receipt notification (Goods receipt number)
     * @param  null|DateTimeInterface $issueDate        __BT-X-201, From EXTENDED__ Goods receipt date
     * @return static
     */
    public function setDocumentReceivingAdviceReferencedDocument(
        string $issuerAssignedId,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->setDocumentReceivingAdviceReference(
            $issuerAssignedId,
            $issueDate
        );

        return $this;
    }

    /**
     * Set an additional delivery note
     *
     * @param  string                 $issuerAssignedId __BT-X-202, From EXTENDED__ Delivery slip number
     * @param  null|DateTimeInterface $issueDate        __BT-X-203, From EXTENDED__ Delivery slip date
     * @return static
     */
    public function setDocumentDeliveryNoteReferencedDocument(
        string $issuerAssignedId,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->setDocumentDeliveryNoteReference(
            $issuerAssignedId,
            $issueDate
        );

        return $this;
    }

    /**
     * Add detailed information on the payment method
     *
     * __Notes__
     *
     * The SpecifiedTradeSettlementPaymentMeans element can only be repeated for each bank account if
     * several bank accounts are to be transferred for transfers. The code for the payment method in the Typecode
     * element must therefore not differ in the repetitions. The elements ApplicableTradeSettlementFinancialCard
     * and PayerPartyDebtorFinancialAccount must not be specified for bank transfers.
     *
     * @param  string      $typeCode         __BT-81, From BASIC WL__ The expected or used means of payment, expressed as a code. The entries from the UNTDID 4461 code list must be used. A distinction should be made between SEPA and non-SEPA payments as well as between credit payments, direct debits, card payments and other means of payment In particular, the following codes can be used:
     *                                       - 10: cash
     *                                       - 20: check
     *                                       - 30: transfer
     *                                       - 42: Payment to bank account
     *                                       - 48: Card payment
     *                                       - 49: direct debit
     *                                       - 57: Standing order
     *                                       - 58: SEPA Credit Transfer
     *                                       - 59: SEPA Direct Debit
     *                                       - 97: Report
     * @param  null|string $information      __BT-82, From EN 16931__ The expected or used means of payment expressed in text form, e.g. cash, bank transfer, direct debit, credit card, etc.
     * @param  null|string $cardType         __BT-, From __ The type of the card
     * @param  null|string $cardId           __BT-87, From EN 16931__ The primary account number (PAN) to which the card used for payment belongs. In accordance with card payment security standards, an invoice should never contain a full payment card master account number. The following specification of the PCI Security Standards Council currently applies: The first 6 and last 4 digits at most are to be displayed
     * @param  null|string $cardHolderName   __BT-88, From EN 16931__ Name of the payment card holder
     * @param  null|string $buyerIban        __BT-91, From BASIC WL__ The account to be debited by the direct debit
     * @param  null|string $payeeIban        __BT-84, From BASIC WL__ A unique identifier for the financial account held with a payment service provider to which the payment should be made
     * @param  null|string $payeeAccountName __BT-85, From BASIC WL__ The name of the payment account held with a payment service provider to which the payment should be made
     * @param  null|string $payeePropId      __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param  null|string $payeeBic         __BT-86, From EN 16931__ An identifier for the payment service provider with which the payment account is held
     * @return static
     */
    public function addDocumentPaymentMean(
        string $typeCode,
        ?string $information = null,
        ?string $cardType = null,
        ?string $cardId = null,
        ?string $cardHolderName = null,
        ?string $buyerIban = null,
        ?string $payeeIban = null,
        ?string $payeeAccountName = null,
        ?string $payeePropId = null,
        ?string $payeeBic = null
    ): static {
        $this->documentBuilder->addDocumentPaymentMean(
            $typeCode,
            $information,
            $cardId,
            $cardHolderName,
            $buyerIban,
            $payeeIban,
            $payeeAccountName,
            $payeePropId,
            $payeeBic
        );

        return $this;
    }

    /**
     * Sets the document payment means to _SEPA Credit Transfer_
     *
     * @param  string      $payeeIban        __BT-84, From BASIC WL__ A unique identifier for the financial account held with a payment service provider to which the payment should be made
     * @param  null|string $payeeAccountName __BT-85, From BASIC WL__ The name of the payment account held with a payment service provider to which the payment should be made
     * @param  null|string $payeePropId      __BT-BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param  null|string $payeeBic         __BT-86, From EN 16931__ An identifier for the payment service provider with which the payment account is held
     * @param  null|string $paymentReference __BT-83, From BASIC WL__ A text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function addDocumentPaymentMeanToCreditTransfer(
        string $payeeIban,
        ?string $payeeAccountName = null,
        ?string $payeePropId = null,
        ?string $payeeBic = null,
        ?string $paymentReference = null
    ): static {
        $this->documentBuilder->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value,
            newPayeeIban: $payeeIban,
            newPayeeAccountName: $payeeAccountName,
            newPayeeProprietaryId: $payeePropId,
            newPayeeBic: $payeeBic,
            newPaymentReference: $paymentReference
        );

        return $this;
    }

    /**
     * Sets the document payment means to _Non-SEPA Credit Transfer_
     *
     * @param  string      $payeeIban        __BT-84, From BASIC WL__ A unique identifier for the financial account held with a payment service provider to which the payment should be made
     * @param  null|string $payeeAccountName __BT-85, From BASIC WL__ The name of the payment account held with a payment service provider to which the payment should be made
     * @param  null|string $payeePropId      __BT-BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param  null|string $payeeBic         __BT-86, From EN 16931__ An identifier for the payment service provider with which the payment account is held
     * @param  null|string $paymentReference __BT-83, From BASIC WL__ A text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function addDocumentPaymentMeanToCreditTransferNonSepa(
        string $payeeIban,
        ?string $payeeAccountName = null,
        ?string $payeePropId = null,
        ?string $payeeBic = null,
        ?string $paymentReference = null
    ): static {
        $this->documentBuilder->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_30->value,
            newPayeeIban: $payeeIban,
            newPayeeAccountName: $payeeAccountName,
            newPayeeProprietaryId: $payeePropId,
            newPayeeBic: $payeeBic,
            newPaymentReference: $paymentReference
        );

        return $this;
    }

    /**
     * Sets the document payment means to _SEPA Direct Debit_
     *
     * @param  string      $buyerIban           __BT-91, From BASIC WL__ The account to be debited by the direct debit
     * @param  null|string $creditorReferenceID __BT-90, From BASIC WL__ Unique bank identifier of the payee or the seller assigned by the bank of the payee or the seller
     * @return static
     */
    public function addDocumentPaymentMeanToDirectDebit(
        string $buyerIban,
        ?string $creditorReferenceID = null
    ): static {
        $this->documentBuilder->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value,
            newBuyerIban: $buyerIban
        );

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($creditorReferenceID)) {
            $this->documentBuilder->setDocumentPaymentCreditorReferenceID(
                $creditorReferenceID
            );
        }

        return $this;
    }

    /**
     * Sets the document payment means to _Non-SEPA Direct Debit_
     *
     * @param  string      $buyerIban           __BT-91, From BASIC WL__ The account to be debited by the direct debit
     * @param  null|string $creditorReferenceID __BT-90, From BASIC WL__ Unique bank identifier of the payee or the seller assigned by the bank of the payee or the seller
     * @return static
     */
    public function addDocumentPaymentMeanToDirectDebitNonSepa(
        string $buyerIban,
        ?string $creditorReferenceID = null
    ): static {
        $this->documentBuilder->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_49->value,
            newBuyerIban: $buyerIban
        );

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($creditorReferenceID)) {
            $this->documentBuilder->setDocumentPaymentCreditorReferenceID(
                $creditorReferenceID
            );
        }

        return $this;
    }

    /**
     * Sets the document payment means to _Payment card_
     *
     * @param  string      $cardType       __BT-, From __ The type of the card
     * @param  string      $cardId         __BT-87, From EN 16931__ The primary account number (PAN) to which the card used for payment belongs. In accordance with card payment security standards, an invoice should never contain a full payment card master account number. The following specification of the PCI Security Standards Council currently applies: The first 6 and last 4 digits at most are to be displayed
     * @param  null|string $cardHolderName __BT-88, From EN 16931__ Name of the payment card holder
     * @return static
     */
    public function addDocumentPaymentMeanToPaymentCard(
        string $cardType,
        string $cardId,
        ?string $cardHolderName = null
    ): static {
        $this->documentBuilder->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value,
            newFinancialCardId: $cardId,
            newFinancialCardHolder: $cardHolderName
        );

        return $this;
    }

    /**
     * Add a VAT breakdown (at document level)
     *
     * @param  string                 $categoryCode               __BT-118, From BASIC WL__ Coded description of a sales tax category
     * @param  string                 $typeCode                   __BT-118-0, From BASIC WL__ Coded description of a sales tax category. Note: Fixed value = "VAT"
     * @param  float                  $basisAmount                __BT-116, From BASIC WL__ Tax base amount, Each sales tax breakdown must show a category-specific tax base amount
     * @param  float                  $calculatedAmount           __BT-117, From BASIC WL__ The total amount to be paid for the relevant VAT category. Note: Calculated by multiplying the amount to be taxed according to the sales tax category by the sales tax rate applicable for the sales tax category concerned
     * @param  null|float             $rateApplicablePercent      __BT-119, From BASIC WL__ The sales tax rate, expressed as the percentage applicable to the sales tax category in question. Note: The code of the sales tax category and the category-specific sales tax rate must correspond to one another. The value to be given is the percentage. For example, the value 20 is given for 20% (and not 0.2)
     * @param  null|string            $exemptionReason            __BT-120, From BASIC WL__ Reason for tax exemption (free text)
     * @param  null|string            $exemptionReasonCode        __BT-121, From BASIC WL__ Reason given in code form for the exemption of the amount from VAT. Note: Code list issued and maintained by the Connecting Europe Facility.
     * @param  null|float             $lineTotalBasisAmount       __BT-X-262, From EXTENDED__ An amount used as the basis for calculating sales tax, duty or customs duty
     * @param  null|float             $allowanceChargeBasisAmount __BT-X-263, From EXTENDED__ Total amount Additions and deductions to the tax rate at document level
     * @param  null|DateTimeInterface $taxPointDate               __BT-7-00, From EN 16931__ Date on which tax is due. This is not used in Germany. Instead, the delivery and service date must be specified.
     * @param  null|string            $dueDateTypeCode            __BT-8, From BASIC WL__ The code for the date on which the VAT becomes relevant for settlement for the seller and for the buyer
     * @return static
     */
    public function addDocumentTax(
        string $categoryCode,
        string $typeCode,
        float $basisAmount,
        float $calculatedAmount,
        ?float $rateApplicablePercent = null,
        ?string $exemptionReason = null,
        ?string $exemptionReasonCode = null,
        ?float $lineTotalBasisAmount = null,
        ?float $allowanceChargeBasisAmount = null,
        ?DateTimeInterface $taxPointDate = null,
        ?string $dueDateTypeCode = null
    ): static {
        $this->documentBuilder->addDocumentTax(
            $categoryCode,
            $typeCode,
            $basisAmount,
            $calculatedAmount,
            $rateApplicablePercent,
            $exemptionReason,
            $exemptionReasonCode,
            $taxPointDate,
            $dueDateTypeCode
        );

        return $this;
    }

    /**
     * Add a VAT breakdown (at document level) in a more simple way
     *
     * @param  string     $categoryCode          __BT-118, From BASIC WL__ Coded description of a sales tax category
     * @param  string     $typeCode              __BT-118-0, From BASIC WL__ Coded description of a sales tax category. Note: Fixed value = "VAT"
     * @param  float      $basisAmount           __BT-116, From BASIC WL__ Tax base amount, Each sales tax breakdown must show a category-specific tax base amount
     * @param  float      $calculatedAmount      __BT-117, From BASIC WL__ The total amount to be paid for the relevant VAT category. Note: Calculated by multiplying the amount to be taxed according to the sales tax category by the sales tax rate applicable for the sales tax category concerned
     * @param  null|float $rateApplicablePercent __BT-119, From BASIC WL__ The sales tax rate, expressed as the percentage applicable to the sales tax category in question. Note: The code of the sales tax category and the category-specific sales tax rate must correspond to one another. The value to be given is the percentage. For example, the value 20 is given for 20% (and not 0.2)
     * @return static
     */
    public function addDocumentTaxSimple(
        string $categoryCode,
        string $typeCode,
        float $basisAmount,
        float $calculatedAmount,
        ?float $rateApplicablePercent = null
    ): static {
        return $this->addDocumentTax(
            $categoryCode,
            $typeCode,
            $basisAmount,
            $calculatedAmount,
            $rateApplicablePercent
        );
    }

    /**
     * Get detailed information on the billing period
     *
     * @param  null|DateTimeInterface $startDate   __BT-73, From BASIC WL__ Start of the billing period
     * @param  null|DateTimeInterface $endDate     __BT-74, From BASIC WL__ End of the billing period
     * @param  null|string            $description __BT-X-264, From EXTENDED__ Further information of the billing period (Obsolete)
     * @return static
     */
    public function setDocumentBillingPeriod(
        ?DateTimeInterface $startDate,
        ?DateTimeInterface $endDate,
        ?string $description
    ): static {
        $this->documentBuilder->setDocumentBillingPeriod(
            $startDate,
            $endDate,
            $description
        );

        return $this;
    }

    /**
     * Add information about surcharges and charges applicable to the bill as a whole, Deductions,
     * such as for withheld taxes may also be specified in this group
     *
     * @param  float       $actualAmount          __BT-92/BT-99, From BASIC WL__ Amount of the surcharge or discount at document level
     * @param  bool        $isCharge              __BT-20-1/BT-21-1, From BASIC WL__ Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  string      $taxCategoryCode       __BT-95/BT-102, From BASIC WL__ A coded indication of which sales tax category applies to the surcharge or deduction at document level
     * @param  string      $taxTypeCode           __BT-95-0/BT-102-0, From BASIC WL__ Code for the VAT category of the surcharge or charge at document level. Note: Fixed value = "VAT"
     * @param  float       $rateApplicablePercent __BT-96/BT-103, From BASIC WL__ VAT rate for the surcharge or discount on document level. Note: The code of the sales tax category and the category-specific sales tax rate must correspond to one another. The value to be given is the percentage. For example, the value 20 is given for 20% (and not 0.2)
     * @param  null|float  $sequence              __BT-X-265, From EXTENDED__ Calculation order
     * @param  null|float  $calculationPercent    __BT-94/BT-101, From BASIC WL__ Percentage surcharge or discount at document level
     * @param  null|float  $basisAmount           __BT-93/BT-100, From BASIC WL__ The base amount that may be used in conjunction with the percentage of the surcharge or discount at document level to calculate the amount of the discount at document level
     * @param  null|float  $basisQuantity         __BT-X-266, From EXTENDED__ Base quantity of the discount
     * @param  null|string $basisQuantityUnitCode __BT-X-267, From EXTENDED__ Unit of the price base quantity
     * @param  null|string $reasonCode            __BT-98/BT-105, From BASIC WL__ The reason given as a code for the surcharge or discount at document level. Note: Use entries from the UNTDID 5189 code list. The code of the reason for the surcharge or discount at document level and the reason for the surcharge or discount at document level must correspond to each other
     * @param  null|string $reason                __BT-97/BT-104, From BASIC WL__ The reason given in text form for the surcharge or discount at document level
     * @return static
     */
    public function addDocumentAllowanceCharge(
        float $actualAmount,
        bool $isCharge,
        string $taxCategoryCode,
        string $taxTypeCode,
        ?float $rateApplicablePercent,
        ?float $sequence = null,
        ?float $calculationPercent = null,
        ?float $basisAmount = null,
        ?float $basisQuantity = null,
        ?string $basisQuantityUnitCode = null,
        ?string $reasonCode = null,
        ?string $reason = null
    ): static {
        $this->documentBuilder->addDocumentAllowanceCharge(
            $isCharge,
            $actualAmount,
            $basisAmount,
            $taxCategoryCode,
            $taxTypeCode,
            $rateApplicablePercent,
            $reason,
            $reasonCode,
            $calculationPercent
        );

        return $this;
    }

    /**
     * Add detailed information on logistics service fees
     *
     * @param  string                 $description            __BT-X-271, From EXTENDED__ Identification of the service fee
     * @param  float                  $appliedAmount          __BT-X-272, From EXTENDED__ Amount of the service fee
     * @param  null|array<int,string> $taxTypeCodes           __BT-X-273-0, From EXTENDED__ Code of the Tax type. Note: Fixed value = "VAT"
     * @param  null|array<int,string> $taxCategoryCodes       __BT-X-273, From EXTENDED__ Code of the VAT category
     * @param  null|array<int,float>  $rateApplicablePercents __BT-X-274, From EXTENDED__ The sales tax rate, expressed as the percentage applicable to the sales tax category in question. Note: The code of the sales tax category and the category-specific sales tax rate must correspond to one another. The value to be given is the percentage. For example, the value 20 is given for 20% (and not 0.2)
     * @return static
     */
    public function addDocumentLogisticsServiceCharge(
        string $description,
        float $appliedAmount,
        ?array $taxTypeCodes = null,
        ?array $taxCategoryCodes = null,
        ?array $rateApplicablePercents = null
    ): static {
        $taxTypeCodes = is_array($taxTypeCodes)
            ? ($taxTypeCodes[array_key_first($taxTypeCodes)] ?? '')
            : $taxTypeCodes;

        $taxCategoryCodes = is_array($taxCategoryCodes)
            ? ($taxCategoryCodes[array_key_first($taxCategoryCodes)] ?? '')
            : $taxCategoryCodes;

        $rateApplicablePercents = is_array($rateApplicablePercents)
            ? ($rateApplicablePercents[array_key_first($rateApplicablePercents)] ?? '')
            : $rateApplicablePercents;

        $this->documentBuilder->addDocumentLogisticServiceCharge(
            $appliedAmount,
            $description,
            $taxCategoryCodes,
            $taxTypeCodes,
            $rateApplicablePercents
        );

        return $this;
    }

    /**
     * Add a payment term
     *
     * @param  null|string            $description          __BT-20, From _BASIC WL__ A text description of the payment terms that apply to the payment amount due (including a description of possible penalties). Note: This element can contain multiple lines and multiple conditions.
     * @param  null|DateTimeInterface $dueDate              __BT-9, From BASIC WL__ The date by which payment is due Note: The payment due date reflects the net payment due date. In the case of partial payments, this indicates the first due date of a net payment. The corresponding description of more complex payment terms can be given in BT-20.
     * @param  null|string            $directDebitMandateID __BT-89, From BASIC WL__ Unique identifier assigned by the payee to reference the direct debit authorization
     * @param  null|float             $partialPaymentAmount __BT-X-275, From EXTENDED__ Amount of the partial payment
     * @return static
     */
    public function addDocumentPaymentTerm(
        ?string $description = null,
        ?DateTimeInterface $dueDate = null,
        ?string $directDebitMandateID = null,
        ?float $partialPaymentAmount = null
    ): static {
        $this->documentBuilder->addDocumentPaymentTerm(
            $description,
            $dueDate,
            $directDebitMandateID
        );

        return $this;
    }

    /**
     * Add discount Terms to last added payment term
     *
     * @param  null|float             $calculationPercent         __BT-X-286, From EXTENDED__ Percentage of the down payment
     * @param  null|DateTimeInterface $basisDateTime              __BT-X-282, From EXTENDED__ Due date reference date
     * @param  null|float             $basisPeriodMeasureValue    __BT-X-283, From EXTENDED__ Maturity period (basis)
     * @param  null|string            $basisPeriodMeasureUnitCode __BT-X-284, From EXTENDED__ Maturity period (unit)
     * @param  null|float             $basisAmount                __BT-X-285, From EXTENDED__ Base amount of the payment discount
     * @param  null|float             $actualDiscountAmount       __BT-X-287, From EXTENDED__ Amount of the payment discount
     * @return static
     */
    public function addDiscountTermsToPaymentTerms(
        ?float $calculationPercent = null,
        ?DateTimeInterface $basisDateTime = null,
        ?float $basisPeriodMeasureValue = null,
        ?string $basisPeriodMeasureUnitCode = null,
        ?float $basisAmount = null,
        ?float $actualDiscountAmount = null
    ): static {
        $this->documentBuilder->setDocumentPaymentDiscountTermsInLastPaymentTerm(
            $basisAmount,
            $actualDiscountAmount,
            $calculationPercent,
            $basisDateTime,
            $basisPeriodMeasureValue,
            $basisPeriodMeasureUnitCode
        );

        return $this;
    }

    /**
     * Add penalty Terms to last added payment term
     *
     * @param  null|float             $calculationPercent         __BT-X-280, From EXTENDED__ Percentage of the payment surcharge
     * @param  null|DateTimeInterface $basisDateTime              __BT-X-276, From EXTENDED__ Due date reference date
     * @param  null|float             $basisPeriodMeasureValue    __BT-X-277, From EXTENDED__ Maturity period (basis)
     * @param  null|string            $basisPeriodMeasureUnitCode __BT-X-278, From EXTENDED__ Maturity period (unit)
     * @param  null|float             $basisAmount                __BT-X-279, From EXTENDED__ Basic amount of the payment surcharge
     * @param  null|float             $actualPenaltyAmount        __BT-X-281, From EXTENDED__ Amount of the payment surcharge
     * @return static
     */
    public function addPenaltyTermsToPaymentTerms(
        ?float $calculationPercent = null,
        ?DateTimeInterface $basisDateTime = null,
        ?float $basisPeriodMeasureValue = null,
        ?string $basisPeriodMeasureUnitCode = null,
        ?float $basisAmount = null,
        ?float $actualPenaltyAmount = null
    ): static {
        $this->documentBuilder->setDocumentPaymentPenaltyTermsInLastPaymentTerm(
            $basisAmount,
            $actualPenaltyAmount,
            $calculationPercent,
            $basisDateTime,
            $basisPeriodMeasureValue,
            $basisPeriodMeasureUnitCode
        );

        return $this;
    }

    /**
     * Add a payment term in XRechnung-Style (in the Form #SKONTO#TAGE=14#PROZENT=1.00#BASISBETRAG=2.53#)
     *
     * @param  string                 $description                __BT-20, From _EN 16931 XRECHNUNG__ Text to add
     * @param  array<int,int>         $paymentDiscountDays        __BT-20, BR-DE-18, From _EN 16931 XRECHNUNG__ Array of Payment discount days (array of integer)
     * @param  array<int,float>       $paymentDiscountPercents    __BT-20, BR-DE-18, From _EN 16931 XRECHNUNG__ Array of Payment discount percents (array of decimal)
     * @param  array<int,float>       $paymentDiscountBaseAmounts __BT-20, BR-DE-18, From _EN 16931 XRECHNUNG__ Array of Payment discount base amounts (array of decimal)
     * @param  null|DateTimeInterface $dueDate                    __BT-9, From EN 16931 XRECHNUNG__ The date by which payment is due Note: The payment due date reflects the net payment due date. In the case of partial payments, this indicates the first due date of a net payment. The corresponding description of more complex payment terms can be given in BT-20.
     * @param  null|string            $directDebitMandateID       __BT-89, From EN 16931 XRECHNUNG__ Unique identifier assigned by the payee to reference the direct debit authorization
     * @return static
     */
    public function addDocumentPaymentTermXRechnung(
        string $description,
        array $paymentDiscountDays = [],
        array $paymentDiscountPercents = [],
        array $paymentDiscountBaseAmounts = [],
        ?DateTimeInterface $dueDate = null,
        ?string $directDebitMandateID = null
    ): static {
        $paymentTermsDescription = [];

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($description)) {
            return $this;
        }

        $paymentDiscountDays = array_filter(
            $paymentDiscountDays,
            static function ($k) use ($paymentDiscountPercents) {
                return isset($paymentDiscountPercents[$k]);
            },
            ARRAY_FILTER_USE_KEY
        );

        if ($paymentDiscountDays === []) {
            return $this->addDocumentPaymentTerm(trim($description), $dueDate, $directDebitMandateID);
        }

        foreach ($paymentDiscountDays as $paymentDiscountDayIndex => $paymentDiscountDay) {
            $paymentTermsDescription[]
                = sprintf(
                    isset($paymentDiscountBaseAmounts[$paymentDiscountDayIndex])
                        ? '#SKONTO#TAGE=%s#PROZENT=%s#BASISBETRAG=%s#'
                        : '#SKONTO#TAGE=%s#PROZENT=%s#',
                    number_format($paymentDiscountDay, 0, '.', ''),
                    number_format($paymentDiscountPercents[$paymentDiscountDayIndex] ?? 0.0, 2, '.', ''),
                    number_format($paymentDiscountBaseAmounts[$paymentDiscountDayIndex] ?? 0.0, 2, '.', '')
                );
        }

        return $this->addDocumentPaymentTerm(
            trim(sprintf("%s\n%s", implode("\n", $paymentTermsDescription), $description)),
            $dueDate,
            $directDebitMandateID
        );
    }

    /**
     * Add information on the booking reference
     *
     * @param  string      $id       __BT-19, From BASIC WL__ Posting reference of the byuer. If required, this reference shall be provided by the Buyer to the Seller prior to the issuing of the Invoice.
     * @param  null|string $typeCode __BT-X-290, From EXTENDED__ Type of the posting reference. Allowed values: 1 = Financial, 2 = Subsidiary, 3 = Budget, 4 = Cost Accounting, 5 = Payable, 6 = Job Cost Accounting
     * @return static
     */
    public function addDocumentReceivableSpecifiedTradeAccountingAccount(
        string $id,
        ?string $typeCode = null
    ): static {
        $this->documentBuilder->addDocumentPostingReference(
            $typeCode,
            $id
        );

        return $this;
    }

    /**
     * Initilize the main document summation
     *
     * @return static
     */
    public function initDocumentSummation(): static
    {
        $this->documentBuilder->setDocumentSummation(0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0);

        return $this;
    }

    /**
     * Document money summation
     *
     * @param  float      $grandTotalAmount     __BT-112, From MINIMUM__ Total invoice amount including sales tax
     * @param  float      $duePayableAmount     __BT-115, From MINIMUM__ Payment amount due
     * @param  null|float $lineTotalAmount      __BT-106, From BASIC WL__ Sum of the net amounts of all invoice items
     * @param  null|float $chargeTotalAmount    __BT-108, From BASIC WL__ Sum of the surcharges at document level
     * @param  null|float $allowanceTotalAmount __BT-107, From BASIC WL__ Sum of the discounts at document level
     * @param  null|float $taxBasisTotalAmount  __BT-109, From MINIMUM__ Total invoice amount excluding sales tax
     * @param  null|float $taxTotalAmount       __BT-110/111, From MINIMUM/BASIC WL__ if BT-6 is not null $taxTotalAmount = BT-111. Total amount of the invoice sales tax, Total tax amount in the booking currency
     * @param  null|float $roundingAmount       __BT-114, From EN 16931__ Rounding amount
     * @param  null|float $totalPrepaidAmount   __BT-113, From BASIC WL__ Prepayment amount
     * @return static
     */
    public function setDocumentSummation(
        float $grandTotalAmount,
        float $duePayableAmount,
        ?float $lineTotalAmount = null,
        ?float $chargeTotalAmount = null,
        ?float $allowanceTotalAmount = null,
        ?float $taxBasisTotalAmount = null,
        ?float $taxTotalAmount = null,
        ?float $roundingAmount = null,
        ?float $totalPrepaidAmount = null
    ): static {
        $this->documentBuilder->setDocumentSummation(
            $lineTotalAmount ?? 0.0,
            $chargeTotalAmount,
            $allowanceTotalAmount,
            $taxBasisTotalAmount ?? 0.0,
            $taxTotalAmount ?? 0.0,
            0.0, // TODO Foreign VAT amout
            $grandTotalAmount,
            $duePayableAmount,
            $totalPrepaidAmount,
            $roundingAmount
        );

        return $this;
    }

    /**
     * Adds a new position (line) to document
     *
     * @param  string      $lineid               __BT-126, From BASIC__ Identification of the invoice item
     * @param  null|string $lineStatusCode       __BT-X-7, From EXTENDED__ Indicates whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param  null|string $lineStatusReasonCode __BT-X-8, From EXTENDED__ Adds the type to specify whether the invoice line is: DETAIL: detail (normal position), GROUP: Subtotal, INFORMATION: Information only
     * @return static
     */
    public function addNewPosition(
        string $lineid,
        ?string $lineStatusCode = null,
        ?string $lineStatusReasonCode = null
    ): static {
        $this->documentBuilder->addDocumentPosition(
            newPositionId: $lineid,
            newLineStatusCode: $lineStatusCode,
            newLineStatusReasonCode: $lineStatusReasonCode
        );

        return $this;
    }

    /**
     * Adds a new text-only position (line) to document
     *
     * @param  string      $lineid               __BT-126, From BASIC__ Identification of the invoice item
     * @param  null|string $lineStatusCode       __BT-X-7, From EXTENDED__ Indicates whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param  null|string $lineStatusReasonCode __BT-X-8, From EXTENDED__ Adds the type to specify whether the invoice line is:
     * @return static
     * @deprecated 1.0.75
     */
    public function addNewTextPosition(
        string $lineid,
        ?string $lineStatusCode = null,
        ?string $lineStatusReasonCode = null
    ): static {
        // Deprecated

        return $this;
    }

    /**
     * Add detailed information on the free text on the position.
     *
     * @param  string      $content     __BT-127, From BASIC__ A free text that contains unstructured information that is relevant to the invoice item
     * @param  null|string $contentCode __BT-X-9, From EXTENDED__ A code to classify the content of the free text of the invoice. The code is agreed bilaterally and must have the same meaning as BT-127.
     * @param  null|string $subjectCode __BT-X-10, From EXTENDED__ Code for qualifying the free text for the invoice item (Codelist UNTDID 4451)
     * @return static
     */
    public function setDocumentPositionNote(
        string $content,
        ?string $contentCode = null,
        ?string $subjectCode = null
    ): static {
        $this->documentBuilder->addDocumentPositionNote(
            $content,
            $contentCode,
            $subjectCode
        );

        return $this;
    }

    /**
     * Adds product details to the last created position (line) in the document.
     *
     * @param  string      $name               __BT-153, From BASIC__ A name of the item (item name)
     * @param  null|string $description        __BT-154, From EN 16931__ A description of the item, the item description makes it possible to describe the item and its properties in more detail than is possible with the item name
     * @param  null|string $sellerAssignedID   __BT-155, From EN 16931__ An identifier assigned to the item by the seller
     * @param  null|string $buyerAssignedID    __BT-156, From EN 16931__ An identifier assigned to the item by the buyer. The article number of the buyer is a clear, bilaterally agreed identification of the product. It can, for example, be the customer article number or the article number assigned by the manufacturer.
     * @param  null|string $globalIDType       __BT-157-1, From BASIC__ The scheme for $globalID
     * @param  null|string $globalID           __BT-157, From BASIC__ Identification of an article according to the registered scheme (Global identifier of the product, GTIN, ...)
     * @param  null|string $industryAssignedID __BT-X-309, From EXTENDED__ ID assigned by the industry to the contained referenced product
     * @param  null|string $modelID            __BT-X-533, From EXTENDED__ A unique model identifier for this product
     * @param  null|string $batchID            __BT-X-534. From EXTENDED__ Identification of the batch (lot) of the product
     * @param  null|string $brandName          __BT-X-535. From EXTENDED__ The brand name, expressed as text, for this product
     * @param  null|string $modelName          __BT-X-536. From EXTENDED__ Model designation of the product
     * @return static
     */
    public function setDocumentPositionProductDetails(
        string $name,
        ?string $description = null,
        ?string $sellerAssignedID = null,
        ?string $buyerAssignedID = null,
        ?string $globalIDType = null,
        ?string $globalID = null,
        ?string $industryAssignedID = null,
        ?string $modelID = null,
        ?string $batchID = null,
        ?string $brandName = null,
        ?string $modelName = null,
        ?string $country = null
    ): static {
        $this->documentBuilder->setDocumentPositionProductDetails(
            newProductName: $name,
            newProductDescription: $description,
            newProductSellerId: $sellerAssignedID,
            newProductBuyerId: $buyerAssignedID,
            newProductGlobalIdType: $globalIDType,
            newProductGlobalId: $globalID,
            newProductIndustryId: $industryAssignedID,
            newProductModelId: $modelID,
            newProductBatchId: $batchID,
            newProductBrandName: $brandName,
            newProductModelName: $modelName,
            newProductOriginTradeCountry: $country
        );

        return $this;
    }

    /**
     * Add extra characteristics to the formerly added product.
     * Contains information about the characteristics of the goods and services invoiced.
     *
     * @param  string      $description          __BT-160, From EN 16931__ The name of the attribute or property of the product such as "Colour"
     * @param  string      $value                __BT-161, From EN 16931__ The value of the attribute or property of the product such as "Red"
     * @param  null|string $typeCode             __BT-X-11, From EXTENDED__ Type of product characteristic (code). The codes must be taken from the UNTDID 6313 codelist.
     * @param  null|float  $valueMeasure         __BT-X-12, From EXTENDED__ Value of the product property (numerical measured variable)
     * @param  null|string $valueMeasureUnitCode __BT-X-12-0, From EXTENDED__ Unit of measurement code
     * @return static
     */
    public function addDocumentPositionProductCharacteristic(
        string $description,
        string $value,
        ?string $typeCode = null,
        ?float $valueMeasure = null,
        ?string $valueMeasureUnitCode = null
    ): static {
        $this->documentBuilder->addDocumentPositionProductCharacteristic(
            $description,
            $value,
            $typeCode,
            $valueMeasure,
            $valueMeasureUnitCode
        );

        return $this;
    }

    /**
     * Add detailed information on product classification.
     *
     * @param  null|string $classCode     __BT-158, From EN 16931__ Item classification identifier. Classification codes are used for grouping similar items that can serve different purposes, such as public procurement (according to the Common Procurement Vocabulary ([CPV]), e-commerce (UNSPSC), etc.
     * @param  null|string $className     __BT-X-138, From EXTENDED__ Name with which an article can be classified according to type or quality
     * @param  null|string $listId        __BT-158-1, From EN 16931__ The identifier for the identification scheme of the item classification identifier. The identification scheme must be selected from the entries in UNTDID 7143 [6].
     * @param  null|string $listVersionId __BT-158-2, From EN 16931__ The version of the identification scheme
     * @return static
     */
    public function addDocumentPositionProductClassification(
        ?string $classCode = null,
        ?string $className = null,
        ?string $listId = null,
        ?string $listVersionId = null
    ): static {
        $this->documentBuilder->addDocumentPositionProductClassification(
            $classCode,
            $listId,
            $listVersionId,
            $className
        );

        return $this;
    }

    /**
     * Add detailed information on included products. This information relates to the product that has just been added.
     *
     * @param  string      $name               __BT-X-18, From EXTENDED__ Name of the referenced product contained
     * @param  null|string $description        __BT-X-19, From EXTENDED__ Description of the included referenced product
     * @param  null|string $sellerAssignedID   __BT-X-16, From EXTENDED__ ID assigned by the seller of the contained referenced product
     * @param  null|string $buyerAssignedID    __BT-X-17, From EXTENDED__ ID of the referenced product assigned by the buyer
     * @param  null|string $globalID           __BT-X-15, From EXTENDED__ Global ID of the referenced product contained
     * @param  null|string $globalIDType       __BT-X-15-1, From EXTENDED__ Identification of the scheme
     * @param  null|float  $unitQuantity       __BT-X-20, From EXTENDED__ Quantity of the referenced product contained
     * @param  null|string $unitCode           __BT-X-20-1, From EXTENDED__ Unit code of Quantity of the referenced product contained
     * @param  null|string $industryAssignedID __BT-X-309, From EXTENDED__ ID of the referenced product contained assigned by the industry
     * @return static
     */
    public function addDocumentPositionReferencedProduct(
        string $name,
        ?string $description = null,
        ?string $sellerAssignedID = null,
        ?string $buyerAssignedID = null,
        ?string $globalID = null,
        ?string $globalIDType = null,
        ?float $unitQuantity = null,
        ?string $unitCode = null,
        ?string $industryAssignedID = null
    ): static {
        $this->documentBuilder->addDocumentPositionReferencedProduct(
            newProductName: $name,
            newProductDescription: $description,
            newProductSellerId: $sellerAssignedID,
            newProductBuyerId: $buyerAssignedID,
            newProductGlobalId: $globalID,
            newProductGlobalIdType: $globalIDType,
            newProductUnitQuantity: $unitQuantity,
            newProductUnitQuantityUnit: $unitCode,
            newProductIndustryId: $industryAssignedID,
        );

        return $this;
    }

    /**
     * Sets the detailed information on the product origin.
     *
     * @param  string $country __BT-159, From EN 16931__ The code indicating the country the goods came from. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”.
     * @return static
     */
    public function setDocumentPositionProductOriginTradeCountry(
        string $country
    ): static {
        return $this;
    }

    /**
     * Set details of a sales order reference.
     *
     * @param  string                 $issuerAssignedId __BT-X-537, From EXTENDED__ Document number of a sales order reference
     * @param  string                 $lineId           __BT-X-538, From EXTENDED__ An identifier for a position within a sales order
     * @param  null|DateTimeInterface $issueDate        __BT-X-539, From EXTENDED__ Date of sales order
     * @return static
     */
    public function setDocumentPositionSellerOrderReferencedDocument(
        string $issuerAssignedId,
        string $lineId,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->setDocumentPositionSellerOrderReference(
            $issuerAssignedId,
            $lineId,
            $issueDate
        );

        return $this;
    }

    /**
     * Set details of the related buyer order position.
     *
     * @param  string                 $issuerAssignedId __BT-X-21, From EXTENDED__ An identifier issued by the buyer for a referenced order (order number)
     * @param  string                 $lineId           __BT-132, From EN 16931__ An identifier for a position within an order placed by the buyer. Note: Reference is made to the order reference at the document level.
     * @param  null|DateTimeInterface $issueDate        __BT-X-22, From EXTENDED__ Date of order
     * @return static
     */
    public function setDocumentPositionBuyerOrderReferencedDocument(
        string $issuerAssignedId,
        string $lineId,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->setDocumentPositionBuyerOrderReference(
            $issuerAssignedId,
            $lineId,
            $issueDate
        );

        return $this;
    }

    /**
     * Set details of the associated offer position.
     *
     * @param  string                 $issuerAssignedId __BT-X-310, From EXTENDED__ Offer number
     * @param  string                 $lineId           __BT-X-311, From EXTENDED__ Position identifier within the offer
     * @param  null|DateTimeInterface $issueDate        __BT-X-312, From EXTENDED__ Date of offder
     * @return static
     */
    public function setDocumentPositionQuotationReferencedDocument(
        string $issuerAssignedId,
        string $lineId,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->setDocumentPositionQuotationReference(
            $issuerAssignedId,
            $lineId,
            $issueDate
        );

        return $this;
    }

    /**
     * Set details of the related contract position.
     *
     * @param  string                 $issuerAssignedId __BT-X-24, From EXTENDED__ The contract reference should be assigned once in the context of the specific trade relationship and for a defined period of time (contract number)
     * @param  string                 $lineId           __BT-X-25, From EXTENDED__ Identifier of the according contract position
     * @param  null|DateTimeInterface $issueDate        __BT-X-26, From EXTENDED__ Contract date
     * @return static
     */
    public function setDocumentPositionContractReferencedDocument(
        string $issuerAssignedId,
        string $lineId,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->setDocumentPositionContractReference(
            $issuerAssignedId,
            $lineId,
            $issueDate
        );

        return $this;
    }

    /**
     * Add an additional Document reference on a position.
     *
     * @param  string                 $issuerAssignedId   __BT-X-27, From EXTENDED__ The identifier of the tender or lot to which the invoice relates, or an identifier specified by the seller for an object on which the invoice is based, or an identifier of the document on which the invoice is based
     * @param  string                 $typeCode           __BT-X-30, From EXTENDED__ Type of referenced document (See codelist UNTDID 1001)
     * @param  null|string            $uriId              __BT-X-28, From EXTENDED__ The Uniform Resource Locator (URL) at which the external document is available. A means of finding the resource including the primary access method intended for it, e.g. http: // or ftp: //. The location of the external document must be used if the buyer needs additional information to support the amounts billed. External documents are not part of the invoice. Access to external documents can involve certain risks.
     * @param  null|string            $lineId             __BT-X-29, From EXTENDED__ The referenced position identifier in the additional document
     * @param  null|string            $name               __BT-X-299, From EXTENDED__ A description of the document, e.g. Hourly billing, usage or consumption report, etc.
     * @param  null|string            $refTypeCode        __BT-X-32, From EXTENDED__ The identifier for the identification scheme of the identifier of the item invoiced. If it is not clear to the recipient which scheme is used for the identifier, an identifier of the scheme should be used, which must be selected from UNTDID 1153 in accordance with the code list entries.
     * @param  null|DateTimeInterface $issueDate          __BT-X-33, From EXTENDED__ Document date
     * @param  null|string            $binaryDataFilename __BT-X-31, From EXTENDED__ Contains a file name of an attachment document embedded as a binary object
     * @return static
     */
    public function addDocumentPositionAdditionalReferencedDocument(
        string $issuerAssignedId,
        string $typeCode,
        ?string $uriId = null,
        ?string $lineId = null,
        ?string $name = null,
        ?string $refTypeCode = null,
        ?DateTimeInterface $issueDate = null,
        ?string $binaryDataFilename = null
    ): static {
        $attachment = null;

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($uriId)) {
            $attachment = InvoiceSuiteAttachment::fromUrl($uriId);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($binaryDataFilename)) {
            $attachment = InvoiceSuiteAttachment::fromFile($binaryDataFilename);
        }

        $this->documentBuilder->addDocumentPositionAdditionalReference(
            $issuerAssignedId,
            $lineId,
            $issueDate,
            $typeCode,
            $refTypeCode,
            $name,
            $attachment
        );

        return $this;
    }

    /**
     * Add a referennce of a associated end customer order.
     *
     * @param  string                 $issuerAssignedId __BT-X-43, From EXTENDED__ Order number of the end customer
     * @param  string                 $lineId           __BT-X-44, From EXTENDED__ Order item (end customer)
     * @param  null|DateTimeInterface $issueDate        __BT-X-45, From EXTENDED__ Document date of end customer order
     * @return static
     */
    public function addDocumentPositionUltimateCustomerOrderReferencedDocument(
        string $issuerAssignedId,
        string $lineId,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->addDocumentPositionUltimateCustomerOrderReference(
            $issuerAssignedId,
            $lineId,
            $issueDate
        );

        return $this;
    }

    /**
     * Set the unit price excluding sales tax before deduction of the discount on the item price.
     *
     * @param  float       $amount                __BT-148, From BASIC__ The unit price excluding sales tax before deduction of the discount on the item price. If the price is shown according to the net calculation, the price must also be shown according to the gross calculation.
     * @param  null|float  $basisQuantity         __BT-149-1, From BASIC__ The number of item units for which the price applies (price base quantity)
     * @param  null|string $basisQuantityUnitCode __BT-150-1, From BASIC__ The unit code of the number of item units for which the price applies (price base quantity)
     * @return static
     */
    public function setDocumentPositionGrossPrice(
        float $amount,
        ?float $basisQuantity = null,
        ?string $basisQuantityUnitCode = null
    ): static {
        $this->documentBuilder->setDocumentPositionGrossPrice(
            $amount,
            $basisQuantity,
            $basisQuantityUnitCode
        );

        return $this;
    }

    /**
     * Detailed information on surcharges and discounts on item gross price.
     *
     * @param  float       $actualAmount          __BT-147, From BASIC__ Discount on the item price. The total discount subtracted from the gross price to calculate the net price. Note: Only applies if the discount is given per unit and is not included in the gross price.
     * @param  bool        $isCharge              __BT-147-02, From BASIC__ Switch for surcharge/discount, if true then its an charge
     * @param  null|float  $calculationPercent    __BT-X-34, From EXTENDED__Discount/surcharge in percent. Up to level EN16931, only the final result of the discount (ActualAmount) is transferred
     * @param  null|float  $basisAmount           __BT-X-35, From EXTENDED__ Base amount of the discount/surcharge
     * @param  null|string $reason                __BT-X-36, From EXTENDED__ Reason for surcharge/discount (free text)
     * @param  null|string $taxTypeCode           __BT-, From BASIC__
     * @param  null|string $taxCategoryCode       __BT-, From BASIC__
     * @param  null|float  $rateApplicablePercent __BT-, From BASIC__
     * @param  null|float  $sequence              __BT-, From BASIC__
     * @param  null|float  $basisQuantity         __BT-, From BASIC__
     * @param  null|string $basisQuantityUnitCode __BT-, From BASIC__
     * @param  null|string $reasonCode            __BT-X-313, From EXTENDED__ Reason code for surcharge/discount
     * @return static
     */
    public function addDocumentPositionGrossPriceAllowanceCharge(
        float $actualAmount,
        bool $isCharge,
        ?float $calculationPercent = null,
        ?float $basisAmount = null,
        ?string $reason = null,
        ?string $taxTypeCode = null,
        ?string $taxCategoryCode = null,
        ?float $rateApplicablePercent = null,
        ?float $sequence = null,
        ?float $basisQuantity = null,
        ?string $basisQuantityUnitCode = null,
        ?string $reasonCode = null
    ): static {
        $this->documentBuilder->addDocumentPositionGrossPriceAllowanceCharge(
            $actualAmount,
            $isCharge,
            $calculationPercent,
            $basisAmount,
            $reason,
            $reasonCode
        );

        return $this;
    }

    /**
     * Set detailed information on the net price of the item.
     *
     * @param  float       $amount                __BT-146, From BASIC__ Net price of the item
     * @param  null|float  $basisQuantity         __BT-149, From BASIC__ Base quantity at the item price
     * @param  null|string $basisQuantityUnitCode __BT-150, From BASIC__ Code of the unit of measurement of the base quantity at the item price
     * @return static
     */
    public function setDocumentPositionNetPrice(
        float $amount,
        ?float $basisQuantity = null,
        ?string $basisQuantityUnitCode = null
    ): static {
        $this->documentBuilder->setDocumentPositionNetPrice(
            $amount,
            $basisQuantity,
            $basisQuantityUnitCode
        );

        return $this;
    }

    /**
     * Set the position's net price included tax
     *
     * @param  string      $categoryCode          __BT-, From __ Coded description of a sales tax category
     * @param  string      $typeCode              __BT-, From __ Coded description of a sales tax category. Note: Fixed value = "VAT"
     * @param  float       $rateApplicablePercent __BT-, From __ The sales tax rate, expressed as the percentage applicable to the sales tax category in question. Note: The code of the sales tax category and the category-specific sales tax rate must correspond to one another. The value to be given is the percentage. For example, the value 20 is given for 20% (and not 0.2)
     * @param  float       $calculatedAmount      __BT-, From __ The total amount to be paid for the relevant VAT category. Note: Calculated by multiplying the amount to be taxed according to the sales tax category by the sales tax rate applicable for the sales tax category concerned
     * @param  null|string $exemptionReason       __BT-, From __ Reason for tax exemption (free text)
     * @param  null|string $exemptionReasonCode   __BT-, From __ Reason given in code form for the exemption of the amount from VAT. Note: Code list issued and maintained by the Connecting Europe Facility.
     * @return static
     */
    public function setDocumentPositionNetPriceTax(
        string $categoryCode,
        string $typeCode,
        float $rateApplicablePercent,
        float $calculatedAmount,
        ?string $exemptionReason = null,
        ?string $exemptionReasonCode = null
    ): static {
        $this->documentBuilder->setDocumentPositionNetPriceTax(
            $categoryCode,
            $typeCode,
            $calculatedAmount,
            $rateApplicablePercent,
            $exemptionReason,
            $exemptionReasonCode
        );

        return $this;
    }

    /**
     * Set the position's quantities
     *
     * @param  float       $billedQuantity             __BT-129, From BASIC__ The quantity of individual items (goods or services) billed in the relevant line
     * @param  string      $billedQuantityUnitCode     __BT-130, From BASIC__ The unit of measure applicable to the amount billed
     * @param  null|float  $chargeFreeQuantity         __BT-X-46, From EXTENDED__ Quantity, free of charge
     * @param  null|string $chargeFreeQuantityUnitCpde __BT-X-46-0, From EXTENDED__ Unit of measure code for the quantity free of charge
     * @param  null|float  $packageQuantity            __BT-X-47, From EXTENDED__ Number of packages
     * @param  null|string $packageQuantityUnitCode    __BT-X-47-0, From EXTENDED__ Unit of measure code for number of packages
     * @return static
     */
    public function setDocumentPositionQuantity(
        float $billedQuantity,
        string $billedQuantityUnitCode,
        ?float $chargeFreeQuantity = null,
        ?string $chargeFreeQuantityUnitCpde = null,
        ?float $packageQuantity = null,
        ?string $packageQuantityUnitCode = null
    ): static {
        $this->documentBuilder->setDocumentPositionQuantities(
            $billedQuantity,
            $billedQuantityUnitCode,
            $chargeFreeQuantity,
            $chargeFreeQuantityUnitCpde,
            $packageQuantity,
            $packageQuantityUnitCode
        );

        return $this;
    }

    /**
     * Set detailed information on the different ship-to party at position level.
     *
     * @param  null|string $name        __BT-X-50, From EXTENDED__ The name of the party to whom the goods are being delivered or for whom the services are being performed. Must be used if the recipient of the goods or services is not the same as the buyer.
     * @param  null|string $id          __BT-X-48, From EXTENDED__ An identifier for the place where the goods are delivered or where the services are provided. Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @param  null|string $description __BT-, From __ Further legal information that is relevant for the party (Obsolete)
     * @return static
     */
    public function setDocumentPositionShipTo(
        ?string $name = null,
        ?string $id = null,
        ?string $description = null
    ): static {
        $this->documentBuilder->setDocumentPositionShipToName($name);
        $this->documentBuilder->setDocumentPositionShipToId($id);

        return $this;
    }

    /**
     * Add a global id for the Ship-to Trade Party at position level.
     *
     * @param  null|string $globalID     __BT-X-49, From EXTENDED__ The identifier is uniquely assigned to a party by a global registration organization
     * @param  null|string $globalIDType __BT-X-49-0, From EXTENDED__ If the identifier is used for the identification scheme, it must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency
     * @return static
     */
    public function addDocumentPositionShipToGlobalId(
        ?string $globalID = null,
        ?string $globalIDType = null
    ): static {
        $this->documentBuilder->setDocumentPositionShipToGlobalId(
            $globalID,
            $globalIDType
        );

        return $this;
    }

    /**
     * Add Tax registration to Ship-To Trade party at position level.
     *
     * @param  null|string $taxRegType __BT-X-66-0, From EXTENDED__ Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param  null|string $taxRegId   __BT-X-66, From EXTENDED__ Tax number or sales tax identification number
     * @return static
     */
    public function addDocumentPositionShipToTaxRegistration(
        ?string $taxRegType = null,
        ?string $taxRegId = null
    ): static {
        $this->documentBuilder->addDocumentPositionShipToTaxRegistration(
            $taxRegType,
            $taxRegId
        );

        return $this;
    }

    /**
     * Sets the postal address of the Ship-To party at position level.
     *
     * @param  null|string $lineOne     __BG-X-59, From EXTENDED__ The main line in the product end users address. This is usually the street name and house number or the post office box
     * @param  null|string $lineTwo     __BG-X-60, From EXTENDED__ Line 2 of the product end users address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string $lineThree   __BG-X-61, From EXTENDED__ Line 3 of the product end users address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string $postCode    __BG-X-58, From EXTENDED__ Identifier for a group of properties, such as a zip code
     * @param  null|string $city        __BG-X-62, From EXTENDED__ Usual name of the city or municipality in which the product end users address is located
     * @param  null|string $country     __BG-X-63, From EXTENDED__ Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param  null|string $subDivision __BG-X-64, From EXTENDED__ The product end users state
     * @return static
     */
    public function setDocumentPositionShipToAddress(
        ?string $lineOne = null,
        ?string $lineTwo = null,
        ?string $lineThree = null,
        ?string $postCode = null,
        ?string $city = null,
        ?string $country = null,
        ?string $subDivision = null
    ): static {
        $this->documentBuilder->setDocumentPositionShipToAddress(
            $lineOne,
            $lineTwo,
            $lineThree,
            $postCode,
            $city,
            $country,
            $subDivision
        );

        return $this;
    }

    /**
     * Set legal organisation of the Ship-To party on position level.
     *
     * @param  null|string $legalOrgId   __BT-X-51, From EXTENDED__ An identifier issued by an official registrar that identifies the party as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer or seller party
     * @param  null|string $legalOrgType __BT-X-51-0, From EXTENDED__ Registration of the party. In particular, the following scheme codes are used: 0021 : SWIFT, 0088 : EAN, 0060 : DUNS, 0177 : ODETTE
     * @param  null|string $legalOrgName __BT-X-52, From EXTENDED__ A name by which the party is known, if different from the party's name (also known as the company name)
     * @return static
     */
    public function setDocumentPositionShipToLegalOrganisation(
        ?string $legalOrgId = null,
        ?string $legalOrgType = null,
        ?string $legalOrgName = null
    ): static {
        $this->documentBuilder->setDocumentPositionShipToLegalOrganisation(
            $legalOrgType,
            $legalOrgId,
            $legalOrgName
        );

        return $this;
    }

    /**
     * Set contact of the Ship-To party on position level.
     *
     * @param  null|string $contactPersonName     __BT-X-54, From EXTENDED__ Contact point for a legal entity, such as a personal name of the contact person
     * @param  null|string $contactDepartmentName __BT-X-54-1, From EXTENDED__ Contact point for a legal entity, such as a name of the department or office
     * @param  null|string $contactPhoneNo        __BT-X-55, From EXTENDED__ Detailed information on the party's phone number
     * @param  null|string $contactFaxNo          __BT-X-56, From EXTENDED__ Detailed information on the party's fax number
     * @param  null|string $contactEmailAddress   __BT-X-57, From EXTENDED__ Detailed information on the party's email address
     * @return static
     */
    public function setDocumentPositionShipToContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->setDocumentPositionShipToContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Add an additional contact to the Ship-To party on position level.
     *
     * @param  null|string $contactPersonName     __BT-X-54, From EXTENDED__ Contact point for a legal entity, such as a personal name of the contact person
     * @param  null|string $contactDepartmentName __BT-X-54-1, From EXTENDED__ Contact point for a legal entity, such as a name of the department or office
     * @param  null|string $contactPhoneNo        __BT-X-55, From EXTENDED__ Detailed information on the party's phone number
     * @param  null|string $contactFaxNo          __BT-X-56, From EXTENDED__ Detailed information on the party's fax number
     * @param  null|string $contactEmailAddress   __BT-X-57, From EXTENDED__ Detailed information on the party's email address
     * @return static
     */
    public function addDocumentPositionShipToContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->addDocumentPositionShipToContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Detailed information on the different end recipient on position level.
     *
     * @param  null|string $name        __BT-X-69, From EXTENDED__ The name of the party to whom the goods are being delivered or for whom the services are being performed. Must be used if the recipient of the goods or services is not the same as the buyer.
     * @param  null|string $id          __BT-X-67, From EXTENDED__ An identifier for the party Multiple IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged identifier assigned by the buyer or seller.
     * @param  null|string $description __BT-, From __ Further legal information that is relevant for the party (Obsolete)
     * @return static
     */
    public function setDocumentPositionUltimateShipTo(
        ?string $name = null,
        ?string $id = null,
        ?string $description = null
    ): static {
        $this->documentBuilder->setDocumentPositionUltimateShipToName($name);
        $this->documentBuilder->setDocumentPositionUltimateShipToId($id);

        return $this;
    }

    /**
     * Add a global id for the Ship-to Trade Party on position level.
     *
     * @param  null|string $globalID     __BT-X-68, From EXTENDED__ Global identifier of the parfty
     * @param  null|string $globalIDType __BT-X-68-0, From EXTENDED__ Type of global identification number, must be selected from the entries in the list published by the ISO / IEC 6523 Maintenance Agency
     * @return static
     */
    public function addDocumentPositionUltimateShipToGlobalId(
        ?string $globalID = null,
        ?string $globalIDType = null
    ): static {
        $this->documentBuilder->addDocumentPositionUltimateShipToGlobalId(
            $globalID,
            $globalIDType
        );

        return $this;
    }

    /**
     * Add Tax registration to Ship-To Trade party on position level.
     *
     * @param  null|string $taxRegType __BT-X-84-0, From EXTENDED__ Type of tax number (FC = Tax number, VA = Sales tax identification number)
     * @param  null|string $taxRegId   __BT-X-84, From EXTENDED__ Tax number or sales tax identification number
     * @return static
     */
    public function addDocumentPositionUltimateShipToTaxRegistration(
        ?string $taxRegType = null,
        ?string $taxRegId = null
    ): static {
        $this->documentBuilder->addDocumentPositionUltimateShipToTaxRegistration(
            $taxRegType,
            $taxRegId
        );

        return $this;
    }

    /**
     * Sets the postal address of the Ship-To party on position level.
     *
     * @param  null|string $lineOne     __BT_X-77, From EXTENDED__ The main line in the party's address. This is usually the street name and house number or the post office box
     * @param  null|string $lineTwo     __BT_X-78, From EXTENDED__ Line 2 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string $lineThree   __BT_X-79, From EXTENDED__ Line 3 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string $postCode    __BT_X-76, From EXTENDED__ Identifier for a group of properties, such as a zip code
     * @param  null|string $city        __BT_X-80, From EXTENDED__ Usual name of the city or municipality in which the party's address is located
     * @param  null|string $country     __BT_X-81, From EXTENDED__ Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param  null|string $subDivision __BT_X-82, From EXTENDED__ The party's state
     * @return static
     */
    public function setDocumentPositionUltimateShipToAddress(
        ?string $lineOne = null,
        ?string $lineTwo = null,
        ?string $lineThree = null,
        ?string $postCode = null,
        ?string $city = null,
        ?string $country = null,
        ?string $subDivision = null
    ): static {
        $this->documentBuilder->setDocumentPositionUltimateShipToAddress(
            $lineOne,
            $lineTwo,
            $lineThree,
            $postCode,
            $city,
            $country,
            $subDivision
        );

        return $this;
    }

    /**
     * Set legal organisation of the Ship-To party on position level.
     *
     * @param  null|string $legalOrgId   __BT_X-70, From EXTENDED__ An identifier issued by an official registrar that identifies the party as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer or seller party
     * @param  null|string $legalOrgType __BT_X-70-0, From EXTENDED__ The identifier for the identification scheme of the legal registration of the party. In particular, the following scheme codes are used: 0021 : SWIFT, 0088 : EAN, 0060 : DUNS, 0177 : ODETTE
     * @param  null|string $legalOrgName __BT_X-71, From EXTENDED__ A name by which the party is known, if different from the party's name (also known as the company name)
     * @return static
     */
    public function setDocumentPositionUltimateShipToLegalOrganisation(
        ?string $legalOrgId = null,
        ?string $legalOrgType = null,
        ?string $legalOrgName = null
    ): static {
        $this->documentBuilder->setDocumentPositionUltimateShipToLegalOrganisation(
            $legalOrgType,
            $legalOrgId,
            $legalOrgName
        );

        return $this;
    }

    /**
     * Set contact of the Ship-To party on position level.
     *
     * @param  null|string $contactPersonName     __BT_X-72, From EXTENDED__ Contact point for a legal entity, such as a personal name of the contact person
     * @param  null|string $contactDepartmentName __BT_X-72-1, From EXTENDED__ Contact point for a legal entity, such as a name of the department or office
     * @param  null|string $contactPhoneNo        __BT_X-73, From EXTENDED__ Detailed information on the party's phone number
     * @param  null|string $contactFaxNo          __BT_X-74, From EXTENDED__ Detailed information on the party's fax number
     * @param  null|string $contactEmailAddress   __BT_X-75, From EXTENDED__ Detailed information on the party's email address
     * @return static
     */
    public function setDocumentPositionUltimateShipToContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->setDocumentPositionUltimateShipToContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Add an additional contact of the Ship-To party on position level.
     *
     * @param  null|string $contactPersonName     __BT_X-72, From EXTENDED__ Contact point for a legal entity, such as a personal name of the contact person
     * @param  null|string $contactDepartmentName __BT_X-72-1, From EXTENDED__ Contact point for a legal entity, such as a name of the department or office
     * @param  null|string $contactPhoneNo        __BT_X-73, From EXTENDED__ Detailed information on the party's phone number
     * @param  null|string $contactFaxNo          __BT_X-74, From EXTENDED__ Detailed information on the party's fax number
     * @param  null|string $contactEmailAddress   __BT_X-75, From EXTENDED__ Detailed information on the party's email address
     * @return static
     */
    public function addDocumentPositionUltimateShipToContact(
        ?string $contactPersonName = null,
        ?string $contactDepartmentName = null,
        ?string $contactPhoneNo = null,
        ?string $contactFaxNo = null,
        ?string $contactEmailAddress = null
    ): static {
        $this->documentBuilder->addDocumentPositionUltimateShipToContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Detailed information on the actual delivery on position level.
     *
     * @param  null|DateTimeInterface $date __BT-X-85, From EXTENDED__ Actual delivery date
     * @return static
     */
    public function setDocumentPositionSupplyChainEvent(
        ?DateTimeInterface $date
    ): static {
        $this->documentBuilder->setDocumentPositionSupplyChainEvent(
            $date
        );

        return $this;
    }

    /**
     * Detailed information on the associated shipping notification on position level.
     *
     * @param  null|string            $issuerAssignedId __BT-X-86, From EXTENDED__ Shipping notification number
     * @param  null|string            $lineId           __BT-X-87, From EXTENDED__ Shipping notification position
     * @param  null|DateTimeInterface $issueDate        __BT-X-88, From EXTENDED__ Date of Shipping notification number
     * @return static
     */
    public function setDocumentPositionDespatchAdviceReferencedDocument(
        ?string $issuerAssignedId = null,
        ?string $lineId = null,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->setDocumentPositionDespatchAdviceReference(
            $issuerAssignedId,
            $lineId,
            $issueDate
        );

        return $this;
    }

    /**
     * Detailed information on the associated goods receipt notification.
     *
     * @param  null|string            $issuerAssignedId __BT-X-89, From EXTENDED__ Goods receipt number
     * @param  null|string            $lineId           __BT-X-90, From EXTENDED__ Goods receipt position
     * @param  null|DateTimeInterface $issueDate        __BT-X-91, From EXTENDED__ Date of Goods receipt
     * @return static
     */
    public function setDocumentPositionReceivingAdviceReferencedDocument(
        ?string $issuerAssignedId = null,
        ?string $lineId = null,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->setDocumentPositionReceivingAdviceReference(
            $issuerAssignedId,
            $lineId,
            $issueDate
        );

        return $this;
    }

    /**
     * Detailed information on the associated delivery bill on position level.
     *
     * @param  null|string            $issuerAssignedId __BT-X-92, From EXTENDED__ Delivery note number
     * @param  null|string            $lineId           __BT-X-93, From EXTENDED__ Delivery note position
     * @param  null|DateTimeInterface $issueDate        __BT-X-94, From EXTENDED__ Date of Delivery note
     * @return static
     */
    public function setDocumentPositionDeliveryNoteReferencedDocument(
        ?string $issuerAssignedId = null,
        ?string $lineId = null,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->setDocumentPositionDeliveryNoteReference(
            $issuerAssignedId,
            $lineId,
            $issueDate
        );

        return $this;
    }

    /**
     * Add information about the sales tax that applies to the goods and services invoiced in the relevant invoice line.
     *
     * @param  null|string $categoryCode          __BT-151, From BASIC__ Coded description of a sales tax category
     * @param  null|string $typeCode              __BT-151-0, From BASIC__ In EN 16931 only the tax type “sales tax” with the code “VAT” is supported. Should other types of tax be specified, such as an insurance tax or a mineral oil tax the EXTENDED profile must be used. The code for the tax type must then be taken from the code list UNTDID 5153.
     * @param  null|float  $rateApplicablePercent __BT-152, From BASIC__ The VAT rate applicable to the item invoiced and expressed as a percentage. Note: The code of the sales tax category and the category-specific sales tax rate  must correspond to one another. The value to be given is the percentage. For example, the value 20 is given for 20% (and not 0.2)
     * @param  null|float  $calculatedAmount      __BT-, From __ Tax amount. Information only for taxes that are not VAT (Obsolete)
     * @param  null|string $exemptionReason       __BT-, From __ Reason for tax exemption (free text) (Obsolete)
     * @param  null|string $exemptionReasonCode   __BT-, From __ Reason given in code form for the exemption of the amount from VAT. Note: Code list issued and maintained by the Connecting Europe Facility. (Obsolete)
     * @return static
     */
    public function addDocumentPositionTax(
        ?string $categoryCode = null,
        ?string $typeCode = null,
        ?float $rateApplicablePercent = null,
        ?float $calculatedAmount = null,
        ?string $exemptionReason = null,
        ?string $exemptionReasonCode = null
    ): static {
        $this->documentBuilder->setDocumentPositionTax(
            $categoryCode,
            $typeCode,
            $calculatedAmount,
            $rateApplicablePercent,
            $exemptionReason,
            $exemptionReasonCode
        );

        return $this;
    }

    /**
     * Set information about the period relevant for the invoice item. Also known as the invoice line delivery period.
     *
     * @param  null|DateTimeInterface $startDate __BT-134, From BASIC__ Start of the billing period
     * @param  null|DateTimeInterface $endDate   __BT-135, From BASIC__ End of the billing period
     * @return static
     */
    public function setDocumentPositionBillingPeriod(
        ?DateTimeInterface $startDate = null,
        ?DateTimeInterface $endDate = null
    ): static {
        $this->documentBuilder->setDocumentPositionBillingPeriod(
            $startDate,
            $endDate
        );

        return $this;
    }

    /**
     * Add surcharges and discounts on position level.
     *
     * @param  null|float  $actualAmount       __BT-136/BT-141, From BASIC__ The surcharge/discount amount excluding sales tax
     * @param  null|bool   $isCharge           __BT-27-1/BT-28-1, From BASIC__ (true for BT-/ and false for /BT-) Switch that indicates whether the following data refer to an allowance or a discount, true means that it is a surcharge
     * @param  null|float  $calculationPercent __BT-138, From BASIC__ The percentage that may be used in conjunction with the base invoice line discount amount to calculate the invoice line discount amount
     * @param  null|float  $basisAmount        __BT-137, From EN 16931__ The base amount that may be used in conjunction with the invoice line discount percentage to calculate the invoice line discount amount
     * @param  null|string $reasonCode         __BT-140/BT-145, From BASIC__ The reason given as a code for the invoice line discount
     * @param  null|string $reason             __BT-139/BT-144, From BASIC__ The reason given in text form for the invoice item discount/surcharge
     * @return static
     */
    public function addDocumentPositionAllowanceCharge(
        ?float $actualAmount = null,
        ?bool $isCharge = null,
        ?float $calculationPercent = null,
        ?float $basisAmount = null,
        ?string $reasonCode = null,
        ?string $reason = null
    ): static {
        $this->documentBuilder->addDocumentPositionAllowanceCharge(
            $isCharge,
            $actualAmount,
            $basisAmount,
            $reason,
            $reasonCode,
            $calculationPercent
        );

        return $this;
    }

    /**
     * Set information on item totals.
     *
     * @param  null|float $lineTotalAmount __BT-131, From BASIC__ The total amount of the invoice item
     * @return static
     */
    public function setDocumentPositionLineSummation(
        ?float $lineTotalAmount = null
    ): static {
        $this->documentBuilder->setDocumentPositionSummation(
            $lineTotalAmount
        );

        return $this;
    }

    /**
     * Set information on item totals (with support for EXTENDED profile).
     *
     * @param  null|float $lineTotalAmount            __BT-131, From BASIC__ The total amount of the invoice item
     * @param  null|float $chargeTotalAmount          __BT-X-327, From EXTENDED__ Total amount of item surcharges
     * @param  null|float $allowanceTotalAmount       __BT-X-328, From EXTENDED__ Total amount of item discounts
     * @param  null|float $taxTotalAmount             __BT-X-329, From EXTENDED__ Total amount of item taxes
     * @param  null|float $grandTotalAmount           __BT-X-330, From EXTENDED__ Total gross amount of the item
     * @param  null|float $totalAllowanceChargeAmount __BT-X-98, From EXTENDED__ Total amount of item surcharges and discounts
     * @return static
     */
    public function setDocumentPositionLineSummationExt(
        ?float $lineTotalAmount = null,
        ?float $chargeTotalAmount = null,
        ?float $allowanceTotalAmount = null,
        ?float $taxTotalAmount = null,
        ?float $grandTotalAmount = null,
        ?float $totalAllowanceChargeAmount = null
    ): static {
        $this->documentBuilder->setDocumentPositionSummation(
            $lineTotalAmount,
            $chargeTotalAmount,
            $allowanceTotalAmount,
            $taxTotalAmount,
            $grandTotalAmount
        );

        return $this;
    }

    /**
     * Add a Reference to the previous invoice (on position level).
     *
     * @param  null|string            $issuerAssignedId __BT-X-331, From EXTENDED__ The identification of an invoice previously sent by the seller
     * @param  null|string            $lineid           __BT-X-540, From EXTENDED__ Identification of the invoice item
     * @param  null|string            $typeCode         __BT-X-332, From EXTENDED__ Type of previous invoice (code)
     * @param  null|DateTimeInterface $issueDate        __BT-X-333, From EXTENDED__ Date of the previous invoice
     * @return static
     */
    public function addDocumentPositionInvoiceReferencedDocument(
        ?string $issuerAssignedId = null,
        ?string $lineid = null,
        ?string $typeCode = null,
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->documentBuilder->addDocumentPositionInvoiceReference(
            $issuerAssignedId,
            $lineid,
            $issueDate,
            $typeCode
        );

        return $this;
    }

    /**
     * Add an additional Document reference on a position (Object detection).
     *
     * @param  null|string $issuerAssignedId __BT-128, From EN 16931__ The identifier of the tender or lot to which the invoice relates, or an identifier specified by the seller for an object on which the invoice is based, or an identifier of the document on which the invoice is based
     * @param  null|string $typeCode         __BT-128-0, From EN 16931__ Type of referenced document (See codelist UNTDID 1001)
     * @param  null|string $refTypeCode      __BT-128-1, From EN 16931__ The identifier for the identification scheme of the identifier of the item invoiced. If it is not clear to the recipient which scheme is used for the identifier, an identifier of the scheme should be used, which must be selected from UNTDID 1153 in accordance with the code list entries.
     * @return static
     * @deprecated v1.0.110 Please use addDocumentPositionAdditionalReferencedObjDocument instead
     */
    public function addDocumentPositionAdditionalReferencedDocumentObj(
        ?string $issuerAssignedId = null,
        ?string $typeCode = null,
        ?string $refTypeCode = null
    ): static {
        return $this->addDocumentPositionAdditionalReferencedObjDocument($issuerAssignedId, $typeCode, $refTypeCode);
    }

    /**
     * Add an additional Document reference on a position (Object detection).
     *
     * @param  null|string $issuerAssignedId __BT-128, From EN 16931__ The identifier of the tender or lot to which the invoice relates, or an identifier specified by the seller for an object on which the invoice is based, or an identifier of the document on which the invoice is based
     * @param  null|string $typeCode         __BT-128-0, From EN 16931__ Type of referenced document (See codelist UNTDID 1001)
     * @param  null|string $refTypeCode      __BT-128-1, From EN 16931__ The identifier for the identification scheme of the identifier of the item invoiced. If it is not clear to the recipient which scheme is used for the identifier, an identifier of the scheme should be used, which must be selected from UNTDID 1153 in accordance with the code list entries.
     * @return static
     */
    public function addDocumentPositionAdditionalReferencedObjDocument(
        ?string $issuerAssignedId = null,
        ?string $typeCode = null,
        ?string $refTypeCode = null
    ): static {
        $this->documentBuilder->addDocumentPositionAdditionalReference(
            newReferenceNumber: $issuerAssignedId,
            newReferenceLineNumber: '0',
            newTypeCode: $typeCode,
            newReferenceTypeCode: $refTypeCode
        );

        return $this;
    }

    /**
     * Add an AccountingAccount on position level.
     *
     * @param  null|string $id       __BT-133, From EN 16931__ Posting reference of the byuer. If required, this reference shall be provided by the Buyer to the Seller prior to the issuing of the Invoice.
     * @param  null|string $typeCode __BT-X-99, From EXTENDED__ Type of the posting reference. Allowed values: 1 = Financial, 2 = Subsidiary, 3 = Budget, 4 = Cost Accounting, 5 = Payable, 6 = Job Cost Accounting
     * @return static
     */
    public function addDocumentPositionReceivableSpecifiedTradeAccountingAccount(
        ?string $id = null,
        ?string $typeCode = null
    ): static {
        $this->documentBuilder->addDocumentPositionPostingReference(
            $typeCode,
            $id
        );

        return $this;
    }

    /**
     * Tries to call a method
     *
     * @param  object $instance
     * @param  string $method
     * @param  mixed  $value
     * @return static
     */
    public function tryCall($instance, string $method, $value): static
    {
        if (!$instance) {
            return $this;
        }

        if ($method === '') {
            return $this;
        }

        /*
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($value)) {
            return $this;
        }
        */

        if ($this->methodExists($instance, $method)) {
            $instance->{$method}($value);
        }

        return $this;
    }

    /**
     * Tries to call a method and return the returnvalue from call to $method
     * in object $instance
     *
     * @param  object $instance
     * @param  string $method
     * @return mixed
     */
    public function tryCallAndReturn($instance, string $method)
    {
        if (!$instance) {
            return null;
        }

        if ($method === '') {
            return null;
        }

        if ($this->methodExists($instance, $method)) {
            return $instance->{$method}();
        }

        return null;
    }

    /**
     * Try call methods in a form .object.method1.method2.method3
     *
     * @param  object $instance
     * @param  string $methods
     * @param  mixed  $value
     * @return void
     */
    public function tryCallByPath($instance, string $methods, $value)
    {
        $methods = explode('.', $methods);

        foreach ($methods as $index => $method) {
            if ($index == count($methods) - 1) {
                $this->tryCall($instance, $method, $value);
            } else {
                $instance = $this->tryCallAndReturn($instance, $method);
            }
        }
    }

    /**
     * Wrapper for method_exists for use in PHP8
     *
     * @param  object|string $instance
     * @param  string        $method
     * @return bool
     */
    public function methodExists($instance, $method): bool
    {
        if ($instance == null) {
            return false;
        }

        if (!is_object($instance) && !is_string($instance)) {
            return false;
        }

        return method_exists($instance, $method);
    }

    /**
     * This method can be overridden in derived class
     * It is called before a XML is written
     *
     * @return void
     */
    protected function onBeforeGetContent(): void
    {
        // Do nothing
    }

    /**
     * Returns the internal root object from document builder
     *
     * @return object
     */
    private function getRootObjectFromDocumentBuilder()
    {
        return $this->documentBuilder->getCurrentDocumentFormatProvider()->getBuilder()->getDocumentRootObject();
    }
}
