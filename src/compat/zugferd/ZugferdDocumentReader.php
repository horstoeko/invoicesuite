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
use horstoeko\invoicesuite\concerns\HandlesCallForwarding;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;

/**
 * Legacy-class representing the ZUGFeRD document reader for incoming documents
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class ZugferdDocumentReader
{
    use HandlesCallForwarding;

    /**
     * Internal document reader
     *
     * @var InvoiceSuiteDocumentReader
     */
    protected InvoiceSuiteDocumentReader $documentReader;

    /**
     * Constructor (hidden)
     *
     * @param  InvoiceSuiteDocumentReader $documentReader
     * @return void
     */
    final protected function __construct(
        InvoiceSuiteDocumentReader $documentReader
    ) {
        $this->documentReader = $documentReader;
    }

    /**
     * Dynamically pass missing methods to the internal builder
     *
     * @param  string       $method
     * @param  array<mixed> $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->forwardCallWithCheckTo($this->documentReader, $method, $parameters);
    }

    /**
     * Guess the profile type of a xml file.
     *
     * @param  string $xmlFilename
     * @return static
     */
    public static function readAndGuessFromFile(string $xmlFilename): static
    {
        return new static(InvoiceSuiteDocumentReader::createFromFile($xmlFilename));
    }

    /**
     * Guess the profile type of the readden xml document.
     *
     * @param  string $xmlContent
     * @return static
     */
    public static function readAndGuessFromContent(string $xmlContent): static
    {
        return new static(InvoiceSuiteDocumentReader::createFromContent($xmlContent));
    }

    /**
     * Returns the selected profile id
     *
     * @return int
     */
    public function getProfileId(): int
    {
        $providerId = $this->documentReader->getCurrentDocumentFormatProvider()->getUniqueId();

        foreach (ZugferdProfiles::PROFILEDEF as $profileId => $profileDef) {
            if ($profileDef['invoicesuiteproviderid'] == $providerId) {
                return $profileId;
            }
        }

        return -1;
    }

    /**
     * Read general information about the document.
     *
     * @param  null|string            $documentNo               __BT-1, From MINIMUM__ The document no issued by the seller
     * @param  null|string            $documentTypeCode         __BT-3, From MINIMUM__ The type of the document, See \horstoeko\codelists\ZugferdInvoiceType for details
     * @param  null|DateTimeInterface $documentDate             __BT-2, From MINIMUM__ Date of invoice. The date when the document was issued by the seller
     * @param  null|string            $invoiceCurrency          __BT-5, From MINIMUM__ Code for the invoice currency
     * @param  null|string            $taxCurrency              __BT-6, From BASIC WL__ Code for the currency of the VAT entry
     * @param  null|string            $documentName             __BT-X-2, From EXTENDED__ Document Type. The documenttype (free text)
     * @param  null|string            $documentLanguage         __BT-X-4, From EXTENDED__ Language indicator. The language code in which the document was written
     * @param  null|DateTimeInterface $effectiveSpecifiedPeriod __BT-X-6-000, From EXTENDED__ The contractual due date of the invoice
     * @return static
     *
     * @phpstan-param-out string $documentNo
     * @phpstan-param-out string $documentTypeCode
     * @param-out null|DateTimeInterface $documentDate
     * @phpstan-param-out DateTimeInterface|null $documentDate
     * @phpstan-param-out string $invoiceCurrency
     * @phpstan-param-out string $taxCurrency
     * @phpstan-param-out string $documentName
     * @phpstan-param-out string $documentLanguage
     * @param-out null|DateTimeInterface $effectiveSpecifiedPeriod
     * @phpstan-param-out DateTimeInterface|null $effectiveSpecifiedPeriod
     */
    public function getDocumentInformation(
        ?string &$documentNo,
        ?string &$documentTypeCode,
        ?DateTimeInterface &$documentDate,
        ?string &$invoiceCurrency,
        ?string &$taxCurrency,
        ?string &$documentName,
        ?string &$documentLanguage,
        ?DateTimeInterface &$effectiveSpecifiedPeriod
    ): static {
        $this->documentReader->getDocumentNo($documentNo);
        $this->documentReader->getDocumentType($documentTypeCode);
        $this->documentReader->getDocumentDate($documentDate);
        $this->documentReader->getDocumentCurrency($invoiceCurrency);
        $this->documentReader->getDocumentTaxCurrency($taxCurrency);
        $this->documentReader->getDocumentDescription($documentName);
        $this->documentReader->getDocumentLanguage($documentLanguage);
        $this->documentReader->getDocumentCompleteDate($effectiveSpecifiedPeriod);

        return $this;
    }

    /**
     * Read general payment information.
     *
     * @param  null|string $creditorReferenceID __BT-90, From BASIC WL__ Identifier of the creditor
     * @param  null|string $paymentReference    __BT-83, From BASIC WL__ Intended use for payment
     * @return static
     *
     * @phpstan-param-out string $creditorReferenceID
     * @phpstan-param-out string $paymentReference
     */
    public function getDocumentGeneralPaymentInformation(
        ?string &$creditorReferenceID,
        ?string &$paymentReference
    ): static {
        $creditorReferenceID = '';
        $paymentReference = '';

        if ($this->documentReader->firstDocumentPaymentCreditorReferenceID()) {
            $this->documentReader->getDocumentPaymentCreditorReferenceID($creditorReferenceID);
        }

        if ($this->documentReader->firstDocumentPaymentReference()) {
            $this->documentReader->getDocumentPaymentReference($paymentReference);
        }

        return $this;
    }

    /**
     * Get the identifier assigned by the buyer and used for internal routing.
     *
     * @param  null|string $buyerReference __BT-10, From MINIMUM__ An identifier assigned by the buyer and used for internal routing
     * @return static
     *
     * @phpstan-param-out string $buyerReference
     */
    public function getDocumentBuyerReference(
        ?string &$buyerReference
    ): static {
        $this->documentReader->getDocumentBuyerReference($buyerReference);

        return $this;
    }

    /**
     * Get the routing-id (needed for German XRechnung).
     *
     * This is an alias-method for getDocumentBuyerReference.
     *
     * @param  null|string $routingId __BT-10, From MINIMUM__ An identifier assigned by the buyer and used for internal routing
     * @return static
     *
     * @phpstan-param-out string $routingId
     */
    public function getDocumentRoutingId(
        ?string &$routingId
    ): static {
        return $this->getDocumentBuyerReference($routingId);
    }

    /**
     * Get the copy-identifier.
     *
     * @param  null|bool $copyIndicator __BT-X-3-00, BT-X-3, From EXTENDED__ Returns true if this document is a copy from the original document
     * @return static
     *
     * @phpstan-param-out bool $copyIndicator
     */
    public function getIsDocumentCopy(
        ?bool &$copyIndicator
    ): static {
        $this->documentReader->getDocumentIsCopy($copyIndicator);

        return $this;
    }

    /**
     * Get the test-docukent-identifier.
     *
     * @param  null|bool $testDocumentIndicator Returns true if this document is only for test purposes
     * @return static
     *
     * @phpstan-param-out bool $testDocumentIndicator
     */
    public function getIsTestDocument(
        ?bool &$testDocumentIndicator
    ): static {
        $this->documentReader->getDocumentIsTest($testDocumentIndicator);

        return $this;
    }

    /**
     * Retrieve document notes.
     *
     * @param  null|array<int, array{contentcode: string, subjectcode: string, content: string}> $notes __BT-22, From BASIC WL__, __BT-X-5, From EXTENDED__, __BT-21, From BASIC WL__ Returns an array with all document notes. Each array element contains an assiociative array containing the following keys: _contentcode_, _subjectcode_ and _content_
     * @return static
     *
     * @phpstan-param-out array<int, array{contentcode: string, subjectcode: string, content: string}> $notes
     */
    public function getDocumentNotes(
        ?array &$notes
    ): static {
        $notes = [];

        if ($this->documentReader->firstDocumentNote()) {
            do {
                $this->documentReader->getDocumentNote($newContent, $newContentCode, $newSubjectCode);
                InvoiceSuiteArrayUtils::pushArrayToIntIndexedArray($notes, [
                    'contentcode' => $newContentCode,
                    'subjectcode' => $newSubjectCode,
                    'content' => $newContent,
                ]);
            } while ($this->documentReader->nextDocumentNote());
        }

        return $this;
    }

    /**
     * Get detailed information about the seller (=service provider).
     *
     * @param  null|string            $name        __BT-27, From MINIMUM__ The full formal name under which the seller is registered in the National Register of Legal Entities, Taxable Person or otherwise acting as person(s)
     * @param  null|array<int,string> $id          __BT-29, From BASIC WL__ An array of identifiers of the seller. In many systems, seller identification is key information. Multiple seller IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and seller, e.g. a previously exchanged, buyer-assigned identifier of the seller
     * @param  null|string            $description __BT-33, From EN 16931__ Further legal information that is relevant for the seller
     * @return static
     *
     * @phpstan-param-out string $name
     * @phpstan-param-out array<int,string> $id
     * @phpstan-param-out string $description
     */
    public function getDocumentSeller(
        ?string &$name,
        ?array &$id,
        ?string &$description
    ): static {
        $id = [];
        $name = '';
        $description = '';

        $this->documentReader->getDocumentSellerName($name);

        if ($this->documentReader->firstDocumentSellerId()) {
            do {
                $this->documentReader->getDocumentSellerId($newId);
                InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($id, $newId);
            } while ($this->documentReader->nextDocumentSellerId());
        }

        return $this;
    }

    /**
     * Get global identifiers of the seller.
     *
     * @param  null|array<string,string> $globalID __BT-29/BT-29-0/BT-29-1, From BASIC WL__ Array of the sellers global ids indexed by the identification scheme
     * @return static
     *
     * @phpstan-param-out array<string,string> $globalID
     */
    public function getDocumentSellerGlobalId(
        ?array &$globalID
    ): static {
        $globalID = [];

        if ($this->documentReader->firstDocumentSellerGlobalId()) {
            do {
                $this->documentReader->getDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($globalID, $newGlobalIdType, $newGlobalId);
            } while ($this->documentReader->nextDocumentSellerGlobalId());
        }

        return $this;
    }

    /**
     * Get detailed information on the seller's tax information.
     *
     * @param  null|array<string,string> $taxReg __BT-31/32, From MINIMUM/EN 16931__ Array of tax numbers indexed by the schemeid (VA, FC, etc.)
     * @return static
     *
     * @phpstan-param-out array<string,string> $taxReg
     */
    public function getDocumentSellerTaxRegistration(
        ?array &$taxReg
    ): static {
        $taxReg = [];

        if ($this->documentReader->firstDocumentSellerTaxRegistration()) {
            do {
                $this->documentReader->getDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($taxReg, $newTaxRegistrationType, $newTaxRegistrationId);
            } while ($this->documentReader->nextDocumentSellerTaxRegistration());
        }

        return $this;
    }

    /**
     * Get the address of seller trade party.
     *
     * @param  null|string            $lineOne     __BT-35, From BASIC WL__ The main line in the sellers address. This is usually the street name and house number or the post office box
     * @param  null|string            $lineTwo     __BT-36, From BASIC WL__ Line 2 of the seller's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line used to provide additional details in addition to the main line
     * @param  null|string            $lineThree   __BT-162, From BASIC WL__ Line 3 of the seller's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $postCode    __BT-38, From BASIC WL__ Identifier for a group of properties, such as a zip code
     * @param  null|string            $city        __BT-37, From BASIC WL__ Usual name of the city or municipality in which the seller's address is located
     * @param  null|string            $country     __BT-40, From MINIMUM__ Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param  null|array<int,string> $subDivision __BT-39, From BASIC WL__ The sellers state
     * @return static
     *
     * @phpstan-param-out string $lineOne
     * @phpstan-param-out string $lineTwo
     * @phpstan-param-out string $lineThree
     * @phpstan-param-out string $postCode
     * @phpstan-param-out string $city
     * @phpstan-param-out string $country
     * @phpstan-param-out array<int,string> $subDivision
     */
    public function getDocumentSellerAddress(
        ?string &$lineOne,
        ?string &$lineTwo,
        ?string &$lineThree,
        ?string &$postCode,
        ?string &$city,
        ?string &$country,
        ?array &$subDivision
    ): static {
        $lineOne = '';
        $lineTwo = '';
        $lineThree = '';
        $postCode = '';
        $city = '';
        $country = '';
        $subDivision = [];

        if ($this->documentReader->firstDocumentSellerAddress()) {
            $this->documentReader->getDocumentSellerAddress(
                $lineOne,
                $lineTwo,
                $lineThree,
                $postCode,
                $city,
                $country,
                $newSubDivision
            );

            InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($subDivision, $newSubDivision);
        }

        return $this;
    }

    /**
     * Get the legal organisation of seller trade party.
     *
     * @param  null|string $legalOrgId   __BT-30, From MINIMUM__ An identifier issued by an official registrar that identifies the seller as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer and seller
     * @param  null|string $legalOrgType __BT-30-1, From MINIMUM__ The identifier for the identification scheme of the legal registration of the seller. If the identification scheme is used, it must be selected from ISO/IEC 6523 list
     * @param  null|string $legalOrgName __BT-28, From BASIC WL__ A name by which the seller is known, if different from the seller's name (also known as the company name). Note: This may be used if different from the seller's name.
     * @return static
     *
     * @phpstan-param-out string $legalOrgId
     * @phpstan-param-out string $legalOrgType
     * @phpstan-param-out string $legalOrgName
     */
    public function getDocumentSellerLegalOrganisation(
        ?string &$legalOrgId,
        ?string &$legalOrgType,
        ?string &$legalOrgName
    ): static {
        $legalOrgId = '';
        $legalOrgType = '';
        $legalOrgName = '';

        if ($this->documentReader->firstDocumentSellerLegalOrganisation()) {
            $this->documentReader->getDocumentSellerLegalOrganisation(
                $legalOrgType,
                $legalOrgId,
                $legalOrgName
            );
        }

        return $this;
    }

    /**
     * Seek to the first seller contact of the document. Returns true if a first seller contact is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentSellerContact.
     *
     * @return bool
     */
    public function firstDocumentSellerContact(): bool
    {
        return $this->documentReader->firstDocumentSellerContact();
    }

    /**
     * Seek to the next available seller contact of the document. Returns true if another seller contact is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentSellerContact.
     *
     * @return bool
     */
    public function nextDocumentSellerContact(): bool
    {
        return $this->documentReader->nextDocumentSellerContact();
    }

    /**
     * Get detailed information on the seller's contact person.
     *
     * @param  null|string $contactPersonName     __BT-41, From EN 16931__ Such as personal name, name of contact person or department or office
     * @param  null|string $contactDepartmentName __BT-41-0, From EN 16931__ If a contact person is specified, either the name or the department must be transmitted
     * @param  null|string $contactPhoneNo        __BT-42, From EN 16931__ A telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-107, From EXTENDED__ A fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-43, From EN 16931__ An e-mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $contactPersonName
     * @phpstan-param-out string $contactDepartmentName
     * @phpstan-param-out string $contactPhoneNo
     * @phpstan-param-out string $contactFaxNo
     * @phpstan-param-out string $contactEmailAddress
     */
    public function getDocumentSellerContact(
        ?string &$contactPersonName,
        ?string &$contactDepartmentName,
        ?string &$contactPhoneNo,
        ?string &$contactFaxNo,
        ?string &$contactEmailAddress
    ): static {
        $this->documentReader->getDocumentSellerContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Get detailed information on the seller's electronic communication information.
     *
     * @param  null|string $uriScheme __BT-34-1, From BASIC WL__ The identifier for the identification scheme of the seller's electronic address
     * @param  null|string $uri       __BT-34, From BASIC WL__ Specifies the electronic address of the seller to which the response to the invoice can be sent at application level
     * @return static
     *
     * @phpstan-param-out string $uriScheme
     * @phpstan-param-out string $uri
     */
    public function getDocumentSellerCommunication(
        ?string &$uriScheme,
        ?string &$uri
    ): static {
        $uriScheme = '';
        $uri = '';

        if ($this->documentReader->firstDocumentSellerCommunication()) {
            $this->documentReader->getDocumentSellerCommunication(
                $uriScheme,
                $uri
            );
        }

        return $this;
    }

    /**
     * Get detailed information about the buyer (service recipient).
     *
     * @param  null|string            $name        __BT-44, From MINIMUM__ The full name of the buyer
     * @param  null|array<int,string> $id          __BT-46, From BASIC WL__ An identifier of the buyer. In many systems, buyer identification is key information. Multiple buyer IDs can be assigned or specified. They can be differentiated by using different identification schemes. If no scheme is given, it should be known to the buyer and buyer, e.g. a previously exchanged, seller-assigned identifier of the buyer
     * @param  null|string            $description __BT-X-334, From EXTENDED__ Further legal information about the buyer
     * @return static
     *
     * @phpstan-param-out string $name
     * @phpstan-param-out array<int,string> $id
     * @phpstan-param-out string $description
     */
    public function getDocumentBuyer(
        ?string &$name,
        ?array &$id,
        ?string &$description
    ): static {
        $id = [];
        $name = '';
        $description = '';

        $this->documentReader->getDocumentBuyerName($name);

        if ($this->documentReader->firstDocumentBuyerId()) {
            do {
                $this->documentReader->getDocumentBuyerId($newId);
                InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($id, $newId);
            } while ($this->documentReader->nextDocumentBuyerId());
        }

        return $this;
    }

    /**
     * Get global identifiers of the buyer.
     *
     * @param  null|array<string,string> $globalID __BT-46-0, BT-46-1, From BASIC WL__ Array of the buyers global ids indexed by the identification scheme
     * @return static
     *
     * @phpstan-param-out array<string,string> $globalID
     */
    public function getDocumentBuyerGlobalId(
        ?array &$globalID
    ): static {
        $globalID = [];

        if ($this->documentReader->firstDocumentBuyerGlobalId()) {
            do {
                $this->documentReader->getDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($globalID, $newGlobalIdType, $newGlobalId);
            } while ($this->documentReader->nextDocumentBuyerGlobalId());
        }

        return $this;
    }

    /**
     * Get detailed information on the buyer's tax information.
     *
     * @param  null|array<string,string> $taxReg _BT-48, From MINIMUM/EN 16931__ Array of tax numbers indexed by the schemeid (VA, FC, etc.)
     * @return static
     *
     * @phpstan-param-out array<string,string> $taxReg
     */
    public function getDocumentBuyerTaxRegistration(
        ?array &$taxReg
    ): static {
        $taxReg = [];

        if ($this->documentReader->firstDocumentBuyerTaxRegistration()) {
            do {
                $this->documentReader->getDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($taxReg, $newTaxRegistrationType, $newTaxRegistrationId);
            } while ($this->documentReader->nextDocumentBuyerTaxRegistration());
        }

        return $this;
    }

    /**
     * Get the address of buyer trade party.
     *
     * @param  null|string            $lineOne     __BT-50, From BASIC WL__ The main line in the buyers address. This is usually the street name and house number or the post office box
     * @param  null|string            $lineTwo     __BT-51, From BASIC WL__ Line 2 of the buyers address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $lineThree   __BT-163, From BASIC WL__ Line 3 of the buyers address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $postCode    __BT-53, From BASIC WL__ Identifier for a group of properties, such as a zip code
     * @param  null|string            $city        __BT-52, From BASIC WL__ Usual name of the city or municipality in which the buyers address is located
     * @param  null|string            $country     __BT-55, From BASIC WL__ Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param  null|array<int,string> $subDivision __BT-54, From BASIC WL__ The buyers state
     * @return static
     *
     * @phpstan-param-out string $lineOne
     * @phpstan-param-out string $lineTwo
     * @phpstan-param-out string $lineThree
     * @phpstan-param-out string $postCode
     * @phpstan-param-out string $city
     * @phpstan-param-out string $country
     * @phpstan-param-out array<int,string> $subDivision
     */
    public function getDocumentBuyerAddress(
        ?string &$lineOne,
        ?string &$lineTwo,
        ?string &$lineThree,
        ?string &$postCode,
        ?string &$city,
        ?string &$country,
        ?array &$subDivision
    ): static {
        $lineOne = '';
        $lineTwo = '';
        $lineThree = '';
        $postCode = '';
        $city = '';
        $country = '';
        $subDivision = [];

        if ($this->documentReader->firstDocumentBuyerAddress()) {
            $this->documentReader->getDocumentBuyerAddress(
                $lineOne,
                $lineTwo,
                $lineThree,
                $postCode,
                $city,
                $country,
                $newSubDivision
            );

            InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($subDivision, $newSubDivision);
        }

        return $this;
    }

    /**
     * Get the legal organisation of buyer trade party.
     *
     * @param  null|string $legalOrgId   __BT-47, From MINIMUM__ An identifier issued by an official registrar that identifies the buyer as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer and buyer
     * @param  null|string $legalOrgType __BT-47-1, From MINIMUM__ The identifier for the identification scheme of the legal registration of the buyer. If the identification scheme is used, it must be selected from ISO/IEC 6523 list
     * @param  null|string $legalOrgName __BT-45, From EN 16931__ A name by which the buyer is known, if different from the buyers name (also known as the company name)
     * @return static
     *
     * @phpstan-param-out string $legalOrgId
     * @phpstan-param-out string $legalOrgType
     * @phpstan-param-out string $legalOrgName
     */
    public function getDocumentBuyerLegalOrganisation(
        ?string &$legalOrgId,
        ?string &$legalOrgType,
        ?string &$legalOrgName
    ): static {
        $legalOrgId = '';
        $legalOrgType = '';
        $legalOrgName = '';

        if ($this->documentReader->firstDocumentBuyerLegalOrganisation()) {
            $this->documentReader->getDocumentBuyerLegalOrganisation(
                $legalOrgType,
                $legalOrgId,
                $legalOrgName
            );
        }

        return $this;
    }

    /**
     * Seek to the first buyer contact of the document. Returns true if a first buyer contact is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentBuyerContact
     *
     * @return bool
     */
    public function firstDocumentBuyerContact(): bool
    {
        return $this->documentReader->firstDocumentBuyerContact();
    }

    /**
     * Seek to the next available Buyer contact of the document. Returns true if another Buyer contact is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentBuyerContact.
     *
     * @return bool
     */
    public function nextDocumentBuyerContact(): bool
    {
        return $this->documentReader->nextDocumentBuyerContact();
    }

    /**
     * Get contact information of buyer trade party.
     *
     * @param  null|string $contactPersonName     __BT-56, From EN 16931__ Contact point for a legal entity, such as a personal name of the contact person
     * @param  null|string $contactDepartmentName __BT-56-0, From EN 16931__ Contact point for a legal entity, such as a name of the department or office
     * @param  null|string $contactPhoneNo        __BT-57, From EN 16931__ A telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-115, From EXTENDED__ A fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-58, From EN 16931__ An e-mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $contactPersonName
     * @phpstan-param-out string $contactDepartmentName
     * @phpstan-param-out string $contactPhoneNo
     * @phpstan-param-out string $contactFaxNo
     * @phpstan-param-out string $contactEmailAddress
     */
    public function getDocumentBuyerContact(
        ?string &$contactPersonName,
        ?string &$contactDepartmentName,
        ?string &$contactPhoneNo,
        ?string &$contactFaxNo,
        ?string &$contactEmailAddress
    ): static {
        $this->documentReader->getDocumentSellerContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Get detailed information on the seller's electronic communication information.
     *
     * @param  null|string $uriScheme __BT-49-1, From BASIC WL__ The identifier for the identification scheme of the buyer's electronic address
     * @param  null|string $uri       __BT-49, From BASIC WL__ Specifies the buyer's electronic address to which the invoice is sent
     * @return static
     *
     * @phpstan-param-out string $uriScheme
     * @phpstan-param-out string $uri
     */
    public function getDocumentBuyerCommunication(
        ?string &$uriScheme,
        ?string &$uri
    ): static {
        $uriScheme = '';
        $uri = '';

        if ($this->documentReader->firstDocumentBuyerCommunication()) {
            $this->documentReader->getDocumentBuyerCommunication(
                $uriScheme,
                $uri
            );
        }

        return $this;
    }

    /**
     * Get detailed information about the seller's tax agent.
     *
     * @param  null|string            $name        __BT-62, From BASIC WL__ The full name of the seller's tax agent
     * @param  null|array<int,string> $id          __BT-X-116, From EXTENDED__ An array of identifiers of the sellers tax agent
     * @param  null|string            $description __BT-, From __ Further legal information that is relevant for the sellers tax agent
     * @return static
     *
     * @phpstan-param-out string $name
     * @phpstan-param-out array<int,string> $id
     * @phpstan-param-out string $description
     */
    public function getDocumentSellerTaxRepresentative(
        ?string &$name,
        ?array &$id,
        ?string &$description
    ): static {
        $id = [];
        $name = '';
        $description = '';

        $this->documentReader->getDocumentTaxRepresentativeName($name);

        if ($this->documentReader->firstDocumentTaxRepresentativeId()) {
            do {
                $this->documentReader->getDocumentTaxRepresentativeId($newId);
                InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($id, $newId);
            } while ($this->documentReader->nextDocumentTaxRepresentativeId());
        }

        return $this;
    }

    /**
     * Get document seller tax agent global ids.
     *
     * @param  null|array<string,string> $globalID __BT-X-117/BT-X-117-1, From EXTENDED__ Returns an array of the seller's tax agent identifiers indexed by the identification scheme
     * @return static
     *
     * @phpstan-param-out array<string,string> $globalID
     */
    public function getDocumentSellerTaxRepresentativeGlobalId(
        ?array &$globalID
    ): static {
        $globalID = [];

        if ($this->documentReader->firstDocumentTaxRepresentativeGlobalId()) {
            do {
                $this->documentReader->getDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($globalID, $newGlobalIdType, $newGlobalId);
            } while ($this->documentReader->nextDocumentTaxRepresentativeGlobalId());
        }

        return $this;
    }

    /**
     * Get detailed information on the seller's tax agent tax information.
     *
     * @param  null|array<string,string> $taxReg __BT-63/BT-63-0, From BASIC WL__ Array of tax numbers indexed by the schemeid (VA, FC, etc.)
     * @return static
     *
     * @phpstan-param-out array<string,string> $taxReg
     */
    public function getDocumentSellerTaxRepresentativeTaxRegistration(
        ?array &$taxReg
    ): static {
        $taxReg = [];

        if ($this->documentReader->firstDocumentTaxRepresentativeTaxRegistration()) {
            do {
                $this->documentReader->getDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($taxReg, $newTaxRegistrationType, $newTaxRegistrationId);
            } while ($this->documentReader->nextDocumentTaxRepresentativeTaxRegistration());
        }

        return $this;
    }

    /**
     * Get the address of sellers tax agent.
     *
     * @param  null|string            $lineOne     __BT-64, From BASIC WL__ The main line in the sellers tax agent address. This is usually the street name and house number or the post office box
     * @param  null|string            $lineTwo     __BT-65, From BASIC WL__ Line 2 of the sellers tax agent address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $lineThree   __BT-164, From BASIC WL__ Line 3 of the sellers tax agent address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $postCode    __BT-67, From BASIC WL__ Identifier for a group of properties, such as a zip code
     * @param  null|string            $city        __BT-66, From BASIC WL__ Usual name of the city or municipality in which the sellers tax agent address is located
     * @param  null|string            $country     __BT-69, From BASIC WL__ Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param  null|array<int,string> $subDivision __BT-68, From BASIC WL__ The sellers tax agent state
     * @return static
     *
     * @phpstan-param-out string $lineOne
     * @phpstan-param-out string $lineTwo
     * @phpstan-param-out string $lineThree
     * @phpstan-param-out string $postCode
     * @phpstan-param-out string $city
     * @phpstan-param-out string $country
     * @phpstan-param-out array<int,string> $subDivision
     */
    public function getDocumentSellerTaxRepresentativeAddress(
        ?string &$lineOne,
        ?string &$lineTwo,
        ?string &$lineThree,
        ?string &$postCode,
        ?string &$city,
        ?string &$country,
        ?array &$subDivision
    ): static {
        $lineOne = '';
        $lineTwo = '';
        $lineThree = '';
        $postCode = '';
        $city = '';
        $country = '';
        $subDivision = [];

        if ($this->documentReader->firstDocumentTaxRepresentativeAddress()) {
            $this->documentReader->getDocumentTaxRepresentativeAddress(
                $lineOne,
                $lineTwo,
                $lineThree,
                $postCode,
                $city,
                $country,
                $newSubDivision
            );

            InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($subDivision, $newSubDivision);
        }

        return $this;
    }

    /**
     * Get the legal organisation of sellers tax agent.
     *
     * @param  null|string $legalOrgId   __BT-, From __ An identifier issued by an official registrar that identifies the seller tax agent as a legal entity or legal person
     * @param  null|string $legalOrgType __BT-, From __ The identifier for the identification scheme of the legal registration of the sellers tax agent. If the identification scheme is used, it must be selected from  ISO/IEC 6523 list
     * @param  null|string $legalOrgName __BT-, From __ A name by which the sellers tax agent is known, if different from the  sellers tax agent name (also known as the company name)
     * @return static
     *
     * @phpstan-param-out string $legalOrgId
     * @phpstan-param-out string $legalOrgType
     * @phpstan-param-out string $legalOrgName
     */
    public function getDocumentSellerTaxRepresentativeLegalOrganisation(
        ?string &$legalOrgId,
        ?string &$legalOrgType,
        ?string &$legalOrgName
    ): static {
        $legalOrgId = '';
        $legalOrgType = '';
        $legalOrgName = '';

        if ($this->documentReader->firstDocumentTaxRepresentativeLegalOrganisation()) {
            $this->documentReader->getDocumentTaxRepresentativeLegalOrganisation(
                $legalOrgType,
                $legalOrgId,
                $legalOrgName
            );
        }

        return $this;
    }

    /**
     * Seek to the first seller tax representative contact of the document. Returns true if a first Seller Tax Representative contact is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentSellerTaxRepresentativeContact.
     *
     * @return bool
     */
    public function firstDocumentSellerTaxRepresentativeContact(): bool
    {
        return $this->documentReader->firstDocumentTaxRepresentativeContact();
    }

    /**
     * Seek to the next available seller tax representative contact of the document. Returns true if another seller contact is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentSellerContact.
     *
     * @return bool
     */
    public function nextDocumentSellerTaxRepresentativeContact(): bool
    {
        return $this->documentReader->nextDocumentTaxRepresentativeContact();
    }

    /**
     * Get contact information of sellers tax agent.
     *
     * @param  null|string $contactPersonName     __BT-X-120, From EXTENDED__ Such as personal name, name of contact person or department or office
     * @param  null|string $contactDepartmentName __BT-X-121, From EXTENDED__ If a contact person is specified, either the name or the department must be transmitted
     * @param  null|string $contactPhoneNo        __BT-X-122, From EXTENDED__ A telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-123, From EXTENDED__ A fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-124, From EXTENDED__ An e-mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $contactPersonName
     * @phpstan-param-out string $contactDepartmentName
     * @phpstan-param-out string $contactPhoneNo
     * @phpstan-param-out string $contactFaxNo
     * @phpstan-param-out string $contactEmailAddress
     */
    public function getDocumentSellerTaxRepresentativeContact(
        ?string &$contactPersonName,
        ?string &$contactDepartmentName,
        ?string &$contactPhoneNo,
        ?string &$contactFaxNo,
        ?string &$contactEmailAddress
    ): static {
        $this->documentReader->getDocumentTaxRepresentativeContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Get detailed information on the product end user (general information).
     *
     * @param  null|string            $name        __BT-X-128, From EXTENDED__ Name/company name of the end user
     * @param  null|array<int,string> $id          __BT-X-126, From EXTENDED__ An array of identifiers of the product end user
     * @param  null|string            $description __BT-, From __ Further legal information that is relevant for the product end user
     * @return static
     *
     * @phpstan-param-out string $name
     * @phpstan-param-out array<int,string> $id
     * @phpstan-param-out string $description
     */
    public function getDocumentProductEndUser(
        ?string &$name,
        ?array &$id,
        ?string &$description
    ): static {
        $id = [];
        $name = '';
        $description = '';

        $this->documentReader->getDocumentProductEndUserName($name);

        if ($this->documentReader->firstDocumentProductEndUserId()) {
            do {
                $this->documentReader->getDocumentProductEndUserId($newId);
                InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($id, $newId);
            } while ($this->documentReader->nextDocumentProductEndUserId());
        }

        return $this;
    }

    /**
     * Get global identifier of the product end user.
     *
     * @param  null|array<string,string> $globalID __BT-X-127/BT-X-127-0, From EXTENDED__ Array of the product end users global ids indexed by the identification scheme
     * @return static
     *
     * @phpstan-param-out array<string,string> $globalID
     */
    public function getDocumentProductEndUserGlobalId(
        ?array &$globalID
    ): static {
        $globalID = [];

        if ($this->documentReader->firstDocumentProductEndUserGlobalId()) {
            do {
                $this->documentReader->getDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($globalID, $newGlobalIdType, $newGlobalId);
            } while ($this->documentReader->nextDocumentProductEndUserGlobalId());
        }

        return $this;
    }

    /**
     * Get detailed information on the tax number of the product end user.
     *
     * @param  null|array<string,string> $taxReg __BT-, From __ Array of tax numbers indexed by the schemeid (VA, FC, etc.)
     * @return static
     *
     * @phpstan-param-out array<string,string> $taxReg
     */
    public function getDocumentProductEndUserTaxRegistration(
        ?array &$taxReg
    ): static {
        $taxReg = [];

        if ($this->documentReader->firstDocumentProductEndUserTaxRegistration()) {
            do {
                $this->documentReader->getDocumentProductEndUserTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($taxReg, $newTaxRegistrationType, $newTaxRegistrationId);
            } while ($this->documentReader->nextDocumentProductEndUserTaxRegistration());
        }

        return $this;
    }

    /**
     * Get the address of product end user.
     *
     * @param  null|string            $lineOne     __BT-X-397, From EXTENDED__ The main line in the product end users address. This is usually the street name and house number or the post office box
     * @param  null|string            $lineTwo     __BT-X-398, From EXTENDED__ Line 2 of the product end users address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $lineThree   __BT-X-399, From EXTENDED__ Line 3 of the product end users address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $postCode    __BT-X-396, From EXTENDED__ Identifier for a group of properties, such as a zip code
     * @param  null|string            $city        __BT-X-400, From EXTENDED__ Usual name of the city or municipality in which the product end users address is located
     * @param  null|string            $country     __BT-X-401, From EXTENDED__ Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param  null|array<int,string> $subDivision __BT-X-402, From EXTENDED__ The product end users state
     * @return static
     *
     * @phpstan-param-out string $lineOne
     * @phpstan-param-out string $lineTwo
     * @phpstan-param-out string $lineThree
     * @phpstan-param-out string $postCode
     * @phpstan-param-out string $city
     * @phpstan-param-out string $country
     * @phpstan-param-out array<int,string> $subDivision
     */
    public function getDocumentProductEndUserAddress(
        ?string &$lineOne,
        ?string &$lineTwo,
        ?string &$lineThree,
        ?string &$postCode,
        ?string &$city,
        ?string &$country,
        ?array &$subDivision
    ): static {
        $lineOne = '';
        $lineTwo = '';
        $lineThree = '';
        $postCode = '';
        $city = '';
        $country = '';
        $subDivision = [];

        if ($this->documentReader->firstDocumentProductEndUserAddress()) {
            $this->documentReader->getDocumentProductEndUserAddress(
                $lineOne,
                $lineTwo,
                $lineThree,
                $postCode,
                $city,
                $country,
                $newSubDivision
            );

            InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($subDivision, $newSubDivision);
        }

        return $this;
    }

    /**
     * Get the legal organisation of product end user.
     *
     * @param  null|string $legalOrgId   __BT-X-129, From EXTENDED__ An identifier issued by an official registrar that identifies the product end user as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to all trade parties
     * @param  null|string $legalOrgType __BT-X-129-0, From EXTENDED__The identifier for the identification scheme of the legal registration of the product end user. If the identification scheme is used, it must be selected from ISO/IEC 6523 list
     * @param  null|string $legalOrgName __BT-X-130, From EXTENDED__ A name by which the product end user is known, if different from the product end users name (also known as the company name)
     * @return static
     *
     * @phpstan-param-out string $legalOrgId
     * @phpstan-param-out string $legalOrgType
     * @phpstan-param-out string $legalOrgName
     */
    public function getDocumentProductEndUserLegalOrganisation(
        ?string &$legalOrgId,
        ?string &$legalOrgType,
        ?string &$legalOrgName
    ): static {
        $legalOrgId = '';
        $legalOrgType = '';
        $legalOrgName = '';

        if ($this->documentReader->firstDocumentProductEndUserLegalOrganisation()) {
            $this->documentReader->getDocumentProductEndUserLegalOrganisation(
                $legalOrgType,
                $legalOrgId,
                $legalOrgName
            );
        }

        return $this;
    }

    /**
     * Seek to the first product end-user contact of the document. Returns true if a first product end-user contact is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentProductEndUserContact.
     *
     * @return bool
     */
    public function firstDocumentProductEndUserContactContact(): bool
    {
        return $this->documentReader->firstDocumentProductEndUserContact();
    }

    /**
     * Seek to the next available product end-user contact of the document. Returns true if another product end-user contact is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentProductEndUserContact.
     *
     * @return bool
     */
    public function nextDocumentProductEndUserContactContact(): bool
    {
        return $this->documentReader->nextDocumentProductEndUserContact();
    }

    /**
     * Get detailed information on the product end user's contact person.
     *
     * @param  null|string $contactPersonName     __BT-X-131, From EXTENDED__ Contact point for a legal entity, such as a personal name of the contact person
     * @param  null|string $contactDepartmentName __BT-X-132, From EXTENDED__ Contact point for a legal entity, such as a name of the department or office
     * @param  null|string $contactPhoneNo        __BT-X-133, From EXTENDED__ A telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-134, From EXTENDED__ A fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-135, From EXTENDED__ An e-mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $contactPersonName
     * @phpstan-param-out string $contactDepartmentName
     * @phpstan-param-out string $contactPhoneNo
     * @phpstan-param-out string $contactFaxNo
     * @phpstan-param-out string $contactEmailAddress
     */
    public function getDocumentProductEndUserContact(
        ?string &$contactPersonName,
        ?string &$contactDepartmentName,
        ?string &$contactPhoneNo,
        ?string &$contactFaxNo,
        ?string &$contactEmailAddress
    ): static {
        $this->documentReader->getDocumentProductEndUserContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Get detailed information on the Ship-To party.
     *
     * @param  null|string            $name        __BT-70, From BASIC WL__ The name of the party to whom the goods are being delivered or for whom the services are being performed. Must be used if the recipient of the goods or services is not the same as the buyer.
     * @param  null|array<int,string> $id          __BT-71, From BASIC WL__ An array of identifiers
     * @param  null|string            $description __BT-, From __ Further legal information that is relevant for the party
     * @return static
     *
     * @phpstan-param-out string $name
     * @phpstan-param-out array<int,string> $id
     * @phpstan-param-out string $description
     */
    public function getDocumentShipTo(
        ?string &$name,
        ?array &$id,
        ?string &$description
    ): static {
        $id = [];
        $name = '';
        $description = '';

        $this->documentReader->getDocumentShipToName($name);

        if ($this->documentReader->firstDocumentShipToId()) {
            do {
                $this->documentReader->getDocumentShipToId($newId);
                InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($id, $newId);
            } while ($this->documentReader->nextDocumentShipToId());
        }

        return $this;
    }

    /**
     * Get global identifier for the Ship-To party.
     *
     * @param  null|array<string,string> $globalID __BT-71-0/BT-71-1, From BASIC WL__ Array of global ids indexed by the identification scheme
     * @return static
     *
     * @phpstan-param-out array<string,string> $globalID
     */
    public function getDocumentShipToGlobalId(
        ?array &$globalID
    ): static {
        $globalID = [];

        if ($this->documentReader->firstDocumentShipToGlobalId()) {
            do {
                $this->documentReader->getDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($globalID, $newGlobalIdType, $newGlobalId);
            } while ($this->documentReader->nextDocumentShipToGlobalId());
        }

        return $this;
    }

    /**
     * Get detailed information on tax details of the Ship-To party.
     *
     * @param  null|array<string,string> $taxReg __BT-X-161/BT-X-161-0, From EXTENDED__ Array of tax numbers indexed by the schemeid (VA, FC, etc.)
     * @return static
     *
     * @phpstan-param-out array<string,string> $taxReg
     */
    public function getDocumentShipToTaxRegistration(
        ?array &$taxReg
    ): static {
        $taxReg = [];

        if ($this->documentReader->firstDocumentShipToTaxRegistration()) {
            do {
                $this->documentReader->getDocumentShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($taxReg, $newTaxRegistrationType, $newTaxRegistrationId);
            } while ($this->documentReader->nextDocumentShipToTaxRegistration());
        }

        return $this;
    }

    /**
     * Get the postal address of the Ship-To party.
     *
     * @param  null|string            $lineOne     __BT-75, From BASIC WL__ The main line in the party's address. This is usually the street name and house number or the post office box
     * @param  null|string            $lineTwo     __BT-76, From BASIC WL__ Line 2 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $lineThree   __BT-165, From BASIC WL__ Line 3 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $postCode    __BT-78, From BASIC WL__ Identifier for a group of properties, such as a zip code
     * @param  null|string            $city        __BT-77, From BASIC WL__ Usual name of the city or municipality in which the party's address is located
     * @param  null|string            $country     __BT-80, From BASIC WL__ Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param  null|array<int,string> $subDivision __BT-79, From BASIC WL__ The party's state
     * @return static
     *
     * @phpstan-param-out string $lineOne
     * @phpstan-param-out string $lineTwo
     * @phpstan-param-out string $lineThree
     * @phpstan-param-out string $postCode
     * @phpstan-param-out string $city
     * @phpstan-param-out string $country
     * @phpstan-param-out array<int,string> $subDivision
     */
    public function getDocumentShipToAddress(
        ?string &$lineOne,
        ?string &$lineTwo,
        ?string &$lineThree,
        ?string &$postCode,
        ?string &$city,
        ?string &$country,
        ?array &$subDivision
    ): static {
        $lineOne = '';
        $lineTwo = '';
        $lineThree = '';
        $postCode = '';
        $city = '';
        $country = '';
        $subDivision = [];

        if ($this->documentReader->firstDocumentShipToAddress()) {
            $this->documentReader->getDocumentShipToAddress(
                $lineOne,
                $lineTwo,
                $lineThree,
                $postCode,
                $city,
                $country,
                $newSubDivision
            );

            InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($subDivision, $newSubDivision);
        }

        return $this;
    }

    /**
     * Legal organisation of Ship-To trade party.
     *
     * @param  null|string $legalOrgId   __BT-X-153, From EXTENDED__ An identifier issued by an official registrar that identifies the party as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer or seller party
     * @param  null|string $legalOrgType __BT-X-153-0, From EXTENDED__ The identifier for the identification scheme of the legal registration of the party. In particular, the following scheme codes are used: 0021 : SWIFT, 0088 : EAN, 0060 : DUNS, 0177 : ODETTE
     * @param  null|string $legalOrgName __BT-X-154, From EXTENDED__ A name by which the party is known, if different from the party's name (also known as the company name)
     * @return static
     *
     * @phpstan-param-out string $legalOrgId
     * @phpstan-param-out string $legalOrgType
     * @phpstan-param-out string $legalOrgName
     */
    public function getDocumentShipToLegalOrganisation(
        ?string &$legalOrgId,
        ?string &$legalOrgType,
        ?string &$legalOrgName
    ): static {
        $legalOrgId = '';
        $legalOrgType = '';
        $legalOrgName = '';

        if ($this->documentReader->firstDocumentShipToLegalOrganisation()) {
            $this->documentReader->getDocumentShipToLegalOrganisation(
                $legalOrgType,
                $legalOrgId,
                $legalOrgName
            );
        }

        return $this;
    }

    /**
     * Seek to the first Ship-To contact of the document. Returns true if a first ship-to contact is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentShipToContact.
     *
     * @return bool
     */
    public function firstDocumentShipToContact(): bool
    {
        return $this->documentReader->firstDocumentShipToContact();
    }

    /**
     * Seek to the next available ship-to contact of the document. Returns true if another ship-to contact is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentShipToContact.
     *
     * @return bool
     */
    public function nextDocumentShipToContact(): bool
    {
        return $this->documentReader->nextDocumentShipToContact();
    }

    /**
     * Get detailed information on the contact person of the goods recipient.
     *
     * @param  null|string $contactPersonName     __BT-X-155, From EXTENDED__ Contact point for a legal entity, such as a personal name of the contact person
     * @param  null|string $contactDepartmentName __BT-X-156, From EXTENDED__ Contact point for a legal entity, such as a name of the department or office
     * @param  null|string $contactPhoneNo        __BT-X-157, From EXTENDED__ A telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-158, From EXTENDED__ A fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-159, From EXTENDED__ An e-mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $contactPersonName
     * @phpstan-param-out string $contactDepartmentName
     * @phpstan-param-out string $contactPhoneNo
     * @phpstan-param-out string $contactFaxNo
     * @phpstan-param-out string $contactEmailAddress
     */
    public function getDocumentShipToContact(
        ?string &$contactPersonName,
        ?string &$contactDepartmentName,
        ?string &$contactPhoneNo,
        ?string &$contactFaxNo,
        ?string &$contactEmailAddress
    ): static {
        $this->documentReader->getDocumentShipToContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Get detailed information on the different end recipient.
     *
     * @param  null|string            $name        __BT-X-164, From EXTENDED__ Name or company name of the different end recipient
     * @param  null|array<int,string> $id          __BT-X-162, From EXTENDED__ An array of identifiers
     * @param  null|string            $description __BT-, From __ Further legal information that is relevant for the different end recipient
     * @return static
     *
     * @phpstan-param-out string $name
     * @phpstan-param-out array<int,string> $id
     * @phpstan-param-out string $description
     */
    public function getDocumentUltimateShipTo(
        ?string &$name,
        ?array &$id,
        ?string &$description
    ): static {
        $id = [];
        $name = '';
        $description = '';

        $this->documentReader->getDocumentUltimateShipToName($name);

        if ($this->documentReader->firstDocumentUltimateShipToId()) {
            do {
                $this->documentReader->getDocumentUltimateShipToId($newId);
                InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($id, $newId);
            } while ($this->documentReader->nextDocumentUltimateShipToId());
        }

        return $this;
    }

    /**
     * Get global identifiers of the different end recipient party.
     *
     * @param  null|array<string,string> $globalID __BT-X-163/BT-X-163-0, From EXTENDED__ Array of global ids indexed by the identification scheme
     * @return static
     *
     * @phpstan-param-out array<string,string> $globalID
     */
    public function getDocumentUltimateShipToGlobalId(
        ?array &$globalID
    ): static {
        $globalID = [];

        if ($this->documentReader->firstDocumentUltimateShipToGlobalId()) {
            do {
                $this->documentReader->getDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($globalID, $newGlobalIdType, $newGlobalId);
            } while ($this->documentReader->nextDocumentUltimateShipToGlobalId());
        }

        return $this;
    }

    /**
     * Get detailed information on tax details of the different end recipient party.
     *
     * @param  null|array<string,string> $taxReg __BT-X-180/BT-X-180-0, From EXTENDED__ Array of tax numbers indexed by the schemeid (VA, FC, etc.)
     * @return static
     *
     * @phpstan-param-out array<string,string> $taxReg
     */
    public function getDocumentUltimateShipToTaxRegistration(
        ?array &$taxReg
    ): static {
        $taxReg = [];

        if ($this->documentReader->firstDocumentUltimateShipToTaxRegistration()) {
            do {
                $this->documentReader->getDocumentUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($taxReg, $newTaxRegistrationType, $newTaxRegistrationId);
            } while ($this->documentReader->nextDocumentUltimateShipToTaxRegistration());
        }

        return $this;
    }

    /**
     * Get detailed information on the address of the different end recipient party.
     *
     * @param  null|string            $lineOne     __BT-X-173, From EXTENDED__ The main line in the party's address. This is usually the street name and house number or the post office box. For major customer addresses, this field must be filled with "-".
     * @param  null|string            $lineTwo     __BT-X-174, From EXTENDED__ Line 2 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $lineThree   __BT-X-175, From EXTENDED__ Line 3 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $postCode    __BT-X-172, From EXTENDED__ Identifier for a group of properties, such as a zip code
     * @param  null|string            $city        __BT-X-176, From EXTENDED__ Usual name of the city or municipality in which the party's address is located
     * @param  null|string            $country     __BT-X-177, From EXTENDED__ Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param  null|array<int,string> $subDivision __BT-X-178, From EXTENDED__ The party's state
     * @return static
     *
     * @phpstan-param-out string $lineOne
     * @phpstan-param-out string $lineTwo
     * @phpstan-param-out string $lineThree
     * @phpstan-param-out string $postCode
     * @phpstan-param-out string $city
     * @phpstan-param-out string $country
     * @phpstan-param-out array<int,string> $subDivision
     */
    public function getDocumentUltimateShipToAddress(
        ?string &$lineOne,
        ?string &$lineTwo,
        ?string &$lineThree,
        ?string &$postCode,
        ?string &$city,
        ?string &$country,
        ?array &$subDivision
    ): static {
        $lineOne = '';
        $lineTwo = '';
        $lineThree = '';
        $postCode = '';
        $city = '';
        $country = '';
        $subDivision = [];

        if ($this->documentReader->firstDocumentUltimateShipToAddress()) {
            $this->documentReader->getDocumentUltimateShipToAddress(
                $lineOne,
                $lineTwo,
                $lineThree,
                $postCode,
                $city,
                $country,
                $newSubDivision
            );

            InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($subDivision, $newSubDivision);
        }

        return $this;
    }

    /**
     * Get detailed information about the Legal organisation of the different end recipient party.
     *
     * @param  null|string $legalOrgId   __BT-X-165, From EXTENDED__ An identifier issued by an official registrar that identifies the party as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer or seller party
     * @param  null|string $legalOrgType __BT-X-165-0, From EXTENDED__ The identifier for the identification scheme of the legal registration of the party. In particular, the following scheme codes are used: 0021 : SWIFT, 0088 : EAN, 0060 : DUNS, 0177 : ODETTE
     * @param  null|string $legalOrgName __BT-X-166, From EXTENDED__ A name by which the party is known, if different from the party's name (also known as the company name)
     * @return static
     *
     * @phpstan-param-out string $legalOrgId
     * @phpstan-param-out string $legalOrgType
     * @phpstan-param-out string $legalOrgName
     */
    public function getDocumentUltimateShipToLegalOrganisation(
        ?string &$legalOrgId,
        ?string &$legalOrgType,
        ?string &$legalOrgName
    ): static {
        $legalOrgId = '';
        $legalOrgType = '';
        $legalOrgName = '';

        if ($this->documentReader->firstDocumentUltimateShipToLegalOrganisation()) {
            $this->documentReader->getDocumentUltimateShipToLegalOrganisation(
                $legalOrgType,
                $legalOrgId,
                $legalOrgName
            );
        }

        return $this;
    }

    /**
     * Seek to the first contact person of the different end recipient party. Returns true if a first contact person of the different end recipient party is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentUltimateShipToContact.
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToContact(): bool
    {
        return $this->documentReader->firstDocumentUltimateShipToContact();
    }

    /**
     * Seek to the next available contact person of the different end recipient party. Returns true if another contact person of the different end recipient party is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentUltimateShipToContact.
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToContact(): bool
    {
        return $this->documentReader->nextDocumentUltimateShipToContact();
    }

    /**
     * Get detailed information on the contact person of the different end recipient party.
     *
     * @param  null|string $contactPersonName     __BT-X-167, From EXTENDED__ Contact point for a legal entity, such as a personal name of the contact person
     * @param  null|string $contactDepartmentName __BT-X-168, From EXTENDED__ Contact point for a legal entity, such as a name of the department or office
     * @param  null|string $contactPhoneNo        __BT-X-169, From EXTENDED__ A telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-170, From EXTENDED__ A fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-171, From EXTENDED__ An e-mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $contactPersonName
     * @phpstan-param-out string $contactDepartmentName
     * @phpstan-param-out string $contactPhoneNo
     * @phpstan-param-out string $contactFaxNo
     * @phpstan-param-out string $contactEmailAddress
     */
    public function getDocumentUltimateShipToContact(
        ?string &$contactPersonName,
        ?string &$contactDepartmentName,
        ?string &$contactPhoneNo,
        ?string &$contactFaxNo,
        ?string &$contactEmailAddress
    ): static {
        $this->documentReader->getDocumentUltimateShipToContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }
}
