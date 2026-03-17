<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\zugferd;

use BadMethodCallException;
use DateTimeInterface;
use Error;
use horstoeko\invoicesuite\concerns\HandlesCallForwarding;
use horstoeko\invoicesuite\concerns\HandlesSafeInvoking;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteBadMethodCallException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFileNotReadableException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteUnknownContentException;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageBagItem;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageSeverity;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Exception\RuntimeException;

/**
 * Legacy-class representing the ZUGFeRD document reader for incoming documents
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class ZugferdDocumentReader extends ZugferdDocument
{
    use HandlesCallForwarding;
    use HandlesSafeInvoking;

    /**
     * @var string
     */
    protected $binarydatadirectory = '';

    /**
     * Constructor (hidden)
     *
     * @param InvoiceSuiteDocumentReader $documentReader
     */
    final protected function __construct(
        /**
         * Internal document reader
         */
        protected InvoiceSuiteDocumentReader $documentReader
    ) {}

    /**
     * Dynamically pass missing methods to the internal reader
     *
     * @param  string       $method
     * @param  array<mixed> $parameters
     * @return mixed
     *
     * @throws BadMethodCallException
     * @throws Error
     * @throws InvoiceSuiteBadMethodCallException
     */
    public function __call(
        $method,
        $parameters
    ) {
        return $this->forwardCallWithCheckTo($this->documentReader, $method, $parameters);
    }

    /**
     * Guess the profile type of a xml file.
     *
     * @param  string $xmlFilename
     * @return static
     *
     * @throws InvoiceSuiteFileNotFoundException
     * @throws InvoiceSuiteFileNotReadableException
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteUnknownContentException
     * @throws RuntimeException
     */
    public static function readAndGuessFromFile(
        string $xmlFilename
    ): static {
        return new static(InvoiceSuiteDocumentReader::createFromFile($xmlFilename));
    }

    /**
     * Guess the profile type of the readden xml document.
     *
     * @param  string $xmlContent
     * @return static
     *
     * @throws InvoiceSuiteFormatProviderNotFoundException
     * @throws InvoiceSuiteUnknownContentException
     * @throws RuntimeException
     */
    public static function readAndGuessFromContent(
        string $xmlContent
    ): static {
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
     * Returns the profile definition
     *
     * @return array<string, null|list<string>|string>
     */
    public function getProfileDefinition(): array
    {
        $providerId = $this->documentReader->getCurrentDocumentFormatProvider()->getUniqueId();

        foreach (ZugferdProfiles::PROFILEDEF as $profileDef) {
            if ($profileDef['invoicesuiteproviderid'] == $providerId) {
                return $profileDef;
            }
        }

        return [];
    }

    /**
     * Get a parameter from profile definition
     *
     * @param  string $parameterName
     * @return mixed
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getProfileDefinitionParameter(
        string $parameterName
    ) {
        $profileDefinition = $this->getProfileDefinition();

        if (isset($profileDefinition[$parameterName])) {
            return $profileDefinition[$parameterName];
        }

        throw new InvoiceSuiteInvalidArgumentException(sprintf('Unknown parameter %s', $parameterName));
    }

    /**
     * Returns the internal InvoiceSuiteDocumentReader instance
     *
     * @return InvoiceSuiteDocumentReader
     */
    public function getDocumentReaderInstance(): InvoiceSuiteDocumentReader
    {
        return $this->documentReader;
    }

    /**
     * Check if any messages exist in the internal message bag.
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasMessagesInMessageBag(): bool
    {
        return $this->documentReader->hasMessagesInMessageBag();
    }

    /**
     * Check if any messages with the given severity exist in internal message bag.
     *
     * @param  InvoiceSuiteMessageSeverity $filterSeverity
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasMessagesInMessageBagBySeverity(
        InvoiceSuiteMessageSeverity $filterSeverity
    ): bool {
        return $this->documentReader->hasMessagesInMessageBagBySeverity($filterSeverity);
    }

    /**
     * Check if any INFO messages exist in internal message bag.
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasInfoMessagesInMessageBag(): bool
    {
        return $this->documentReader->hasInfoMessagesInMessageBag();
    }

    /**
     * Check if any WARNING messages exist in internal message bag.
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasWarningMessagesInMessageBag(): bool
    {
        return $this->documentReader->hasWarningMessagesInMessageBag();
    }

    /**
     * Check if any ERROR messages exist in internal message bag.
     *
     * @return bool
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function hasErrorMessagesInMessageBag(): bool
    {
        return $this->documentReader->hasErrorMessagesInMessageBag();
    }

    /**
     * Count messages by severity in internal message bag.
     *
     * @param  InvoiceSuiteMessageSeverity $filterSeverity
     * @return int
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function countMessagesInMessageBagBySeverity(
        InvoiceSuiteMessageSeverity $filterSeverity
    ): int {
        return $this->documentReader->countMessagesInMessageBagBySeverity($filterSeverity);
    }

    /**
     * Count INFO messages in internal message bag.
     *
     * @return int
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function countInfoMessagesInMessageBag(): int
    {
        return $this->documentReader->countInfoMessagesInMessageBag();
    }

    /**
     * Count WARNING messages in internal message bag.
     *
     * @return int
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function countWarningMessagesInMessageBag(): int
    {
        return $this->documentReader->countWarningMessagesInMessageBag();
    }

    /**
     * Count ERROR messages in internal message bag.
     *
     * @return int
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function countErrorMessagesInMessageBag(): int
    {
        return $this->documentReader->countErrorMessagesInMessageBag();
    }

    /**
     * Get messages by severity from internal message bag.
     *
     * @param  InvoiceSuiteMessageSeverity            $filterSeverity
     * @return array<int, InvoiceSuiteMessageBagItem>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getMessagesInMessageBagBySeverity(
        InvoiceSuiteMessageSeverity $filterSeverity
    ): array {
        return $this->documentReader->getMessagesInMessageBagBySeverity($filterSeverity);
    }

    /**
     * Get INFO messages from internal message bag.
     *
     * @return array<int, InvoiceSuiteMessageBagItem>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getInfoMessagesInMessageBag(): array
    {
        return $this->documentReader->getInfoMessagesInMessageBag();
    }

    /**
     * Get WARNING messages from internal message bag.
     *
     * @return array<int, InvoiceSuiteMessageBagItem>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getWarningMessagesInMessageBag(): array
    {
        return $this->documentReader->getWarningMessagesInMessageBag();
    }

    /**
     * Get ERROR messages from internal message bag.
     *
     * @return array<int, InvoiceSuiteMessageBagItem>
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function getErrorMessagesInMessageBag(): array
    {
        return $this->documentReader->getErrorMessagesInMessageBag();
    }

    /**
     * Set the directory where the attached binary data from additional referenced documents are temporary stored.
     *
     * @param  string $binaryDataDirectory
     * @return static
     */
    public function setBinaryDataDirectory(
        string $binaryDataDirectory
    ): static {
        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($binaryDataDirectory) && is_dir($binaryDataDirectory)) {
            $this->binarydatadirectory = $binaryDataDirectory;
        }

        return $this;
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
     *
     * @param-out null|DateTimeInterface $documentDate
     *
     * @phpstan-param-out null|DateTimeInterface $documentDate
     * @phpstan-param-out string $invoiceCurrency
     * @phpstan-param-out string $taxCurrency
     * @phpstan-param-out string $documentName
     * @phpstan-param-out string $documentLanguage
     *
     * @param-out null|DateTimeInterface $effectiveSpecifiedPeriod
     *
     * @phpstan-param-out null|DateTimeInterface $effectiveSpecifiedPeriod
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
     * @param  null|array<string,string> $taxReg __BT-31/BT-32, From MINIMUM__ Array of tax numbers indexed by the schemeid (VA, FC, etc.)
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
     * @param  null|array<string,string> $taxReg _BT-48, From BASIC WL/EN 16931__ Array of tax numbers indexed by the schemeid (VA, FC, etc.)
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

    /**
     * Get detailed information of the deviating consignor party.
     *
     * @param  null|string            $name        __BT-X-183, From EXTENDED__ The name of the party
     * @param  null|array<int,string> $id          __BT-X-181, From EXTENDED__ An array of identifiers
     * @param  null|string            $description __BT-, From __ Further legal information that is relevant for the party
     * @return static
     *
     * @phpstan-param-out string $name
     * @phpstan-param-out array<int,string> $id
     * @phpstan-param-out string $description
     */
    public function getDocumentShipFrom(
        ?string &$name,
        ?array &$id,
        ?string &$description
    ): static {
        $id = [];
        $name = '';
        $description = '';

        $this->documentReader->getDocumentShipFromName($name);

        if ($this->documentReader->firstDocumentShipFromId()) {
            do {
                $this->documentReader->getDocumentShipFromId($newId);
                InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($id, $newId);
            } while ($this->documentReader->nextDocumentShipFromId());
        }

        return $this;
    }

    /**
     * Get global identifier of the deviating consignor party.
     *
     * @param  null|array<string,string> $globalID __BT-X-182/BT-X-182-0, From EXTENDED__ Array of global ids indexed by the identification scheme
     * @return static
     *
     * @phpstan-param-out array<string,string> $globalID
     */
    public function getDocumentShipFromGlobalId(
        ?array &$globalID
    ): static {
        $globalID = [];

        if ($this->documentReader->firstDocumentShipFromGlobalId()) {
            do {
                $this->documentReader->getDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($globalID, $newGlobalIdType, $newGlobalId);
            } while ($this->documentReader->nextDocumentShipFromGlobalId());
        }

        return $this;
    }

    /**
     * Get detailed information on tax details of the deviating consignor party.
     *
     * @param  null|array<string,string> $taxReg __BT-, From __ Array of tax numbers indexed by the schemeid (VA, FC, etc.)
     * @return static
     *
     * @phpstan-param-out array<string,string> $taxReg
     */
    public function getDocumentShipFromTaxRegistration(
        ?array &$taxReg
    ): static {
        $taxReg = [];

        if ($this->documentReader->firstDocumentShipFromTaxRegistration()) {
            do {
                $this->documentReader->getDocumentShipFromTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($taxReg, $newTaxRegistrationType, $newTaxRegistrationId);
            } while ($this->documentReader->nextDocumentShipFromTaxRegistration());
        }

        return $this;
    }

    /**
     * Get Detailed information on the address of the deviating consignor party.
     *
     * @param  null|string            $lineOne     __BT-X-192, From EXTENDED__ The main line in the party's address. This is usually the street name and house number or the post office box
     * @param  null|string            $lineTwo     __BT-X-193, From EXTENDED__ Line 2 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $lineThree   __BT-X-194, From EXTENDED__ Line 3 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $postCode    __BT-X-191, From EXTENDED__ Identifier for a group of properties, such as a zip code
     * @param  null|string            $city        __BT-X-195, From EXTENDED__ Usual name of the city or municipality in which the party's address is located
     * @param  null|string            $country     __BT-X-196, From EXTENDED__ Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param  null|array<int,string> $subDivision __BT-X-197, From EXTENDED__ The party's state
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
    public function getDocumentShipFromAddress(
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

        if ($this->documentReader->firstDocumentShipFromAddress()) {
            $this->documentReader->getDocumentShipFromAddress(
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
     * Get information about the legal organisation of the deviating consignor party.
     *
     * @param  null|string $legalOrgId   __BT-X-184, From EXTENDED__ An identifier issued by an official registrar that identifies the party as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer or seller party
     * @param  null|string $legalOrgType __BT-X-184-0, From EXTENDED__ The identifier for the identification scheme of the legal registration of the party. In particular, the following scheme codes are used: 0021 : SWIFT, 0088 : EAN, 0060 : DUNS, 0177 : ODETTE
     * @param  null|string $legalOrgName __BT-X-185, From EXTENDED__ A name by which the party is known, if different from the party's name (also known as the company name)
     * @return static
     *
     * @phpstan-param-out string $legalOrgId
     * @phpstan-param-out string $legalOrgType
     * @phpstan-param-out string $legalOrgName
     */
    public function getDocumentShipFromLegalOrganisation(
        ?string &$legalOrgId,
        ?string &$legalOrgType,
        ?string &$legalOrgName
    ): static {
        $legalOrgId = '';
        $legalOrgType = '';
        $legalOrgName = '';

        if ($this->documentReader->firstDocumentShipFromLegalOrganisation()) {
            $this->documentReader->getDocumentShipFromLegalOrganisation(
                $legalOrgType,
                $legalOrgId,
                $legalOrgName
            );
        }

        return $this;
    }

    /**
     * Seek to the first contact information of the deviating consignor party of the document. Returns true if a first contact information of the deviating consignor party is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentShipFromContact.
     *
     * @return bool
     */
    public function firstDocumentShipFromContact(): bool
    {
        return $this->documentReader->firstDocumentShipFromContact();
    }

    /**
     * Seek to the next available contact information of the deviating consignor party of the document. Returns true if another contact information of the deviating consignor party is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentShipFromContact.
     *
     * @return bool
     */
    public function nextDocumentShipFromContact(): bool
    {
        return $this->documentReader->nextDocumentShipFromContact();
    }

    /**
     * Get contact information of the deviating consignor party.
     *
     * @param  null|string $contactPersonName     __BT-X-186, From EXTENDED__ Contact point for a legal entity, such as a personal name of the contact person
     * @param  null|string $contactDepartmentName __BT-X-187, From EXTENDED__ Contact point for a legal entity, such as a name of the department or office
     * @param  null|string $contactPhoneNo        __BT-X-188, From EXTENDED__ A telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-189, From EXTENDED__ A fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-190, From EXTENDED__ An e-mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $contactPersonName
     * @phpstan-param-out string $contactDepartmentName
     * @phpstan-param-out string $contactPhoneNo
     * @phpstan-param-out string $contactFaxNo
     * @phpstan-param-out string $contactEmailAddress
     */
    public function getDocumentShipFromContact(
        ?string &$contactPersonName,
        ?string &$contactDepartmentName,
        ?string &$contactPhoneNo,
        ?string &$contactFaxNo,
        ?string &$contactEmailAddress
    ): static {
        $this->documentReader->getDocumentShipFromContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Get detailed information of the invoicer party.
     *
     * @param  null|string            $name        __BT-X-207, From EXTENDED__ The name of the party
     * @param  null|array<int,string> $id          __BT-X-205, From EXTENDED__ An array of identifiers
     * @param  null|string            $description __BT-, From __ Further legal information that is relevant for the party
     * @return static
     *
     * @phpstan-param-out string $name
     * @phpstan-param-out array<int,string> $id
     * @phpstan-param-out string $description
     */
    public function getDocumentInvoicer(
        ?string &$name,
        ?array &$id,
        ?string &$description
    ): static {
        $id = [];
        $name = '';
        $description = '';

        $this->documentReader->getDocumentInvoicerName($name);

        if ($this->documentReader->firstDocumentInvoicerId()) {
            do {
                $this->documentReader->getDocumentInvoicerId($newId);
                InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($id, $newId);
            } while ($this->documentReader->nextDocumentInvoicerId());
        }

        return $this;
    }

    /**
     * Get global identifier of the invoicer party.
     *
     * @param  null|array<string,string> $globalID __BT-X-206/BT-X-206-0, From EXTENDED__ Array of global ids indexed by the identification scheme
     * @return static
     *
     * @phpstan-param-out array<string,string> $globalID
     */
    public function getDocumentInvoicerGlobalId(
        ?array &$globalID
    ): static {
        $globalID = [];

        if ($this->documentReader->firstDocumentInvoicerGlobalId()) {
            do {
                $this->documentReader->getDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($globalID, $newGlobalIdType, $newGlobalId);
            } while ($this->documentReader->nextDocumentInvoicerGlobalId());
        }

        return $this;
    }

    /**
     * Get detailed information on tax details of the invoicer party.
     *
     * @param  null|array<string,string> $taxReg __BT-, From __ Array of tax numbers indexed by the schemeid (VA, FC, etc.)
     * @return static
     *
     * @phpstan-param-out array<string,string> $taxReg
     */
    public function getDocumentInvoicerTaxRegistration(
        ?array &$taxReg
    ): static {
        $taxReg = [];

        if ($this->documentReader->firstDocumentInvoicerTaxRegistration()) {
            do {
                $this->documentReader->getDocumentInvoicerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($taxReg, $newTaxRegistrationType, $newTaxRegistrationId);
            } while ($this->documentReader->nextDocumentInvoicerTaxRegistration());
        }

        return $this;
    }

    /**
     * Get Detailed information on the address of the invoicer party.
     *
     * @param  null|string            $lineOne     __BT-X-216, From EXTENDED__ The main line in the party's address. This is usually the street name and house number or the post office box
     * @param  null|string            $lineTwo     __BT-X-217, From EXTENDED__ Line 2 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $lineThree   __BT-X-218, From EXTENDED__ Line 3 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $postCode    __BT-X-215, From EXTENDED__ Identifier for a group of properties, such as a zip code
     * @param  null|string            $city        __BT-X-219, From EXTENDED__ Usual name of the city or municipality in which the party's address is located
     * @param  null|string            $country     __BT-X-220, From EXTENDED__ Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param  null|array<int,string> $subDivision __BT-X-221, From EXTENDED__ The party's state
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
    public function getDocumentInvoicerAddress(
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

        if ($this->documentReader->firstDocumentInvoicerAddress()) {
            $this->documentReader->getDocumentInvoicerAddress(
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
     * Get information about the legal organisation of the invoicer party.
     *
     * @param  null|string $legalOrgId   __BT-X-208, From EXTENDED__ An identifier issued by an official registrar that identifies the party as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer or seller party
     * @param  null|string $legalOrgType __BT-X-208-0, From EXTENDED__ The identifier for the identification scheme of the legal registration of the party. In particular, the following scheme codes are used: 0021 : SWIFT, 0088 : EAN,* 0060 : DUNS, 0177 : ODETTE
     * @param  null|string $legalOrgName __BT-X-209, From EXTENDED__ A name by which the party is known, if different from the party's name (also known as the company name)
     * @return static
     *
     * @phpstan-param-out string $legalOrgId
     * @phpstan-param-out string $legalOrgType
     * @phpstan-param-out string $legalOrgName
     */
    public function getDocumentInvoicerLegalOrganisation(
        ?string &$legalOrgId,
        ?string &$legalOrgType,
        ?string &$legalOrgName
    ): static {
        $legalOrgId = '';
        $legalOrgType = '';
        $legalOrgName = '';

        if ($this->documentReader->firstDocumentInvoicerLegalOrganisation()) {
            $this->documentReader->getDocumentInvoicerLegalOrganisation(
                $legalOrgType,
                $legalOrgId,
                $legalOrgName
            );
        }

        return $this;
    }

    /**
     * Seek to the first contact information of the invoicer party of the document. Returns true if a first contact information of the invoicer party is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentInvoicerContact.
     *
     * @return bool
     */
    public function firstDocumentInvoicerContact(): bool
    {
        return $this->documentReader->firstDocumentInvoicerContact();
    }

    /**
     * Seek to the next available contact information of the invoicer party of the document. Returns true if another contact information of the invoicer party is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentInvoicerContact.
     *
     * @return bool
     */
    public function nextDocumentInvoicerContact(): bool
    {
        return $this->documentReader->nextDocumentInvoicerContact();
    }

    /**
     * Get contact information of the invoicer party.
     *
     * @param  null|string $contactPersonName     __BT-X-210, From EXTENDED__ Contact point for a legal entity, such as a personal name of the contact person
     * @param  null|string $contactDepartmentName __BT-X-211, From EXTENDED__ Contact point for a legal entity, such as a name of the department or office
     * @param  null|string $contactPhoneNo        __BT-X-212, From EXTENDED__ A telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-213, From EXTENDED__ A fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-214, From EXTENDED__ An e-mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $contactPersonName
     * @phpstan-param-out string $contactDepartmentName
     * @phpstan-param-out string $contactPhoneNo
     * @phpstan-param-out string $contactFaxNo
     * @phpstan-param-out string $contactEmailAddress
     */
    public function getDocumentInvoicerContact(
        ?string &$contactPersonName,
        ?string &$contactDepartmentName,
        ?string &$contactPhoneNo,
        ?string &$contactFaxNo,
        ?string &$contactEmailAddress
    ): static {
        $this->documentReader->getDocumentInvoicerContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Get detailed information on the different invoice recipient party.
     *
     * @param  null|string            $name        __BT-X-226, From EXTENDED__ The name of the party
     * @param  null|array<int,string> $id          __BT-X-224, From EXTENDED__ An array of identifiers
     * @param  null|string            $description __BT-, From __ Further legal information that is relevant for the party
     * @return static
     *
     * @phpstan-param-out string $name
     * @phpstan-param-out array<int,string> $id
     * @phpstan-param-out string $description
     */
    public function getDocumentInvoicee(
        ?string &$name,
        ?array &$id,
        ?string &$description
    ): static {
        $id = [];
        $name = '';
        $description = '';

        $this->documentReader->getDocumentInvoiceeName($name);

        if ($this->documentReader->firstDocumentInvoiceeId()) {
            do {
                $this->documentReader->getDocumentInvoiceeId($newId);
                InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($id, $newId);
            } while ($this->documentReader->nextDocumentInvoiceeId());
        }

        return $this;
    }

    /**
     * Get global identifier of the different invoice recipient party.
     *
     * @param  null|array<string,string> $globalID __BT-X-225/BT-X-225-0, From EXTENDED__ Array of global ids indexed by the identification scheme
     * @return static
     *
     * @phpstan-param-out array<string,string> $globalID
     */
    public function getDocumentInvoiceeGlobalId(
        ?array &$globalID
    ): static {
        $globalID = [];

        if ($this->documentReader->firstDocumentInvoiceeGlobalId()) {
            do {
                $this->documentReader->getDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($globalID, $newGlobalIdType, $newGlobalId);
            } while ($this->documentReader->nextDocumentInvoiceeGlobalId());
        }

        return $this;
    }

    /**
     * Get detailed information on tax details of the different invoice recipient party.
     *
     * @param  null|array<string,string> $taxReg __BT-X-242/BT-X-242-0, From EXTENDED__ Array of tax numbers indexed by the schemeid (VA, FC, etc.)
     * @return static
     *
     * @phpstan-param-out array<string,string> $taxReg
     */
    public function getDocumentInvoiceeTaxRegistration(
        ?array &$taxReg
    ): static {
        $taxReg = [];

        if ($this->documentReader->firstDocumentInvoiceeTaxRegistration()) {
            do {
                $this->documentReader->getDocumentInvoiceeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($taxReg, $newTaxRegistrationType, $newTaxRegistrationId);
            } while ($this->documentReader->nextDocumentInvoiceeTaxRegistration());
        }

        return $this;
    }

    /**
     * Get Detailed information on the address of the different invoice recipient party.
     *
     * @param  null|string            $lineOne     __BT-X-235, From EXTENDED__ The main line in the party's address. This is usually the street name and house number or the post office box
     * @param  null|string            $lineTwo     __BT-X-236, From EXTENDED__ Line 2 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $lineThree   __BT-X-237, From EXTENDED__ Line 3 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $postCode    __BT-X-234, From EXTENDED__ Identifier for a group of properties, such as a zip code
     * @param  null|string            $city        __BT-X-238, From EXTENDED__ Usual name of the city or municipality in which the party's address is located
     * @param  null|string            $country     __BT-X-239, From EXTENDED__ Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param  null|array<int,string> $subDivision __BT-X-240, From EXTENDED__ The party's state
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
    public function getDocumentInvoiceeAddress(
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

        if ($this->documentReader->firstDocumentInvoiceeAddress()) {
            $this->documentReader->getDocumentInvoiceeAddress(
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
     * Get information about the legal organisation of the different invoice recipient party.
     *
     * @param  null|string $legalOrgId   __BT-X-227, From EXTENDED__ An identifier issued by an official registrar that identifies the party as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer or seller party
     * @param  null|string $legalOrgType __BT-X-227-0, From EXTENDED__ The identifier for the identification scheme of the legal registration of the party. In particular, the following scheme codes are used: 0021 : SWIFT, 0088 : EAN, 0060 : DUNS, 0177 : ODETTE
     * @param  null|string $legalOrgName __BT-X-228, From EXTENDED__ A name by which the party is known, if different from the party's name (also known as the company name)
     * @return static
     *
     * @phpstan-param-out string $legalOrgId
     * @phpstan-param-out string $legalOrgType
     * @phpstan-param-out string $legalOrgName
     */
    public function getDocumentInvoiceeLegalOrganisation(
        ?string &$legalOrgId,
        ?string &$legalOrgType,
        ?string &$legalOrgName
    ): static {
        $legalOrgId = '';
        $legalOrgType = '';
        $legalOrgName = '';

        if ($this->documentReader->firstDocumentInvoiceeLegalOrganisation()) {
            $this->documentReader->getDocumentInvoiceeLegalOrganisation(
                $legalOrgType,
                $legalOrgId,
                $legalOrgName
            );
        }

        return $this;
    }

    /**
     * Seek to the first contact information of the different invoice recipient party of the document. Returns true if a first contact information of the different invoice recipient party is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentInvoiceeContact.
     *
     * @return bool
     */
    public function firstDocumentInvoiceeContact(): bool
    {
        return $this->documentReader->firstDocumentInvoiceeContact();
    }

    /**
     * Seek to the next available contact information of the different invoice recipient party of the document. Returns true if another contact information of the different invoice recipient party is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentInvoiceeContact.
     *
     * @return bool
     */
    public function nextDocumentInvoiceeContact(): bool
    {
        return $this->documentReader->nextDocumentInvoiceeContact();
    }

    /**
     * Get contact information of the different invoice recipient party.
     *
     * @param  null|string $contactPersonName     __BT-X-229, From EXTENDED__ Contact point for a legal entity, such as a personal name of the contact person
     * @param  null|string $contactDepartmentName __BT-X-230, From EXTENDED__ Contact point for a legal entity, such as a name of the department or office
     * @param  null|string $contactPhoneNo        __BT-X-231, From EXTENDED__ A telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-232, From EXTENDED__ A fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-233, From EXTENDED__ An e-mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $contactPersonName
     * @phpstan-param-out string $contactDepartmentName
     * @phpstan-param-out string $contactPhoneNo
     * @phpstan-param-out string $contactFaxNo
     * @phpstan-param-out string $contactEmailAddress
     */
    public function getDocumentInvoiceeContact(
        ?string &$contactPersonName,
        ?string &$contactDepartmentName,
        ?string &$contactPhoneNo,
        ?string &$contactFaxNo,
        ?string &$contactEmailAddress
    ): static {
        $this->documentReader->getDocumentInvoiceeContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Get detailed information about the payee, i.e. about the place that receives the payment.
     * The role of the payee may also be performed by a party other than the seller, e.g. by a factoring service.
     *
     * @param  null|string            $name        __BT-59, From BASIC WL__ The name of the party. Must be used if the payee is not the same as the seller. However, the name of the payee may match the name of the seller.
     * @param  null|array<int,string> $id          __BT-60, From BASIC WL__ An array of identifiers
     * @param  null|string            $description __BT-, From __ Further legal information that is relevant for the party
     * @return static
     *
     * @phpstan-param-out string $name
     * @phpstan-param-out array<int,string> $id
     * @phpstan-param-out string $description
     */
    public function getDocumentPayee(
        ?string &$name,
        ?array &$id,
        ?string &$description
    ): static {
        $id = [];
        $name = '';
        $description = '';

        $this->documentReader->getDocumentPayeeName($name);

        if ($this->documentReader->firstDocumentPayeeId()) {
            do {
                $this->documentReader->getDocumentPayeeId($newId);
                InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($id, $newId);
            } while ($this->documentReader->nextDocumentPayeeId());
        }

        return $this;
    }

    /**
     * Get global identifier of the payee party.
     *
     * @param  null|array<string,string> $globalID __BT-60-0/BT-60-1, From BASIC WL__ Array of global ids indexed by the identification scheme
     * @return static
     *
     * @phpstan-param-out array<string,string> $globalID
     */
    public function getDocumentPayeeGlobalId(
        ?array &$globalID
    ): static {
        $globalID = [];

        if ($this->documentReader->firstDocumentPayeeGlobalId()) {
            do {
                $this->documentReader->getDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($globalID, $newGlobalIdType, $newGlobalId);
            } while ($this->documentReader->nextDocumentPayeeGlobalId());
        }

        return $this;
    }

    /**
     * Get detailed information on tax details of the payee party.
     *
     * @param  null|array<string,string> $taxReg __BT-X-257/BT-X-257-0, From EXTENDED__ Array of tax numbers indexed by the schemeid (VA, FC, etc.)
     * @return static
     *
     * @phpstan-param-out array<string,string> $taxReg
     */
    public function getDocumentPayeeTaxRegistration(
        ?array &$taxReg
    ): static {
        $taxReg = [];

        if ($this->documentReader->firstDocumentPayeeTaxRegistration()) {
            do {
                $this->documentReader->getDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
                InvoiceSuiteArrayUtils::pushStringToStringIndexedArray($taxReg, $newTaxRegistrationType, $newTaxRegistrationId);
            } while ($this->documentReader->nextDocumentPayeeTaxRegistration());
        }

        return $this;
    }

    /**
     * Get Detailed information on the address of the payee party.
     *
     * @param  null|string            $lineOne     __BT-X-250, From EXTENDED__ The main line in the party's address. This is usually the street name and house number or the post office box
     * @param  null|string            $lineTwo     __BT-X-251, From EXTENDED__ Line 2 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $lineThree   __BT-X-252, From EXTENDED__ Line 3 of the party's address. This is an additional address line in an address that can be used to provide additional details in addition to the main line
     * @param  null|string            $postCode    __BT-X-249, From EXTENDED__ Identifier for a group of properties, such as a zip code
     * @param  null|string            $city        __BT-X-253, From EXTENDED__ Usual name of the city or municipality in which the party's address is located
     * @param  null|string            $country     __BT-X-254, From EXTENDED__ Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”
     * @param  null|array<int,string> $subDivision __BT-X-255, From EXTENDED__ The party's state
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
    public function getDocumentPayeeAddress(
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

        if ($this->documentReader->firstDocumentPayeeAddress()) {
            $this->documentReader->getDocumentPayeeAddress(
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
     * Get information about the legal organisation of the payee party.
     *
     * @param  null|string $legalOrgId   __BT-61, From BASIC WL__ An identifier issued by an official registrar that identifies the party as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided, it should be known to the buyer or seller party
     * @param  null|string $legalOrgType __BT-61-1, From BASIC WL__ The identifier for the identification scheme of the legal registration of the party. In particular, the following scheme codes are used: 0021 : SWIFT, 0088 : EAN, 0060 : DUNS, 0177 : ODETTE
     * @param  null|string $legalOrgName __BT-X-243, From EXTENDED__ A name by which the party is known, if different from the party's name (also known as the company name)
     * @return static
     *
     * @phpstan-param-out string $legalOrgId
     * @phpstan-param-out string $legalOrgType
     * @phpstan-param-out string $legalOrgName
     */
    public function getDocumentPayeeLegalOrganisation(
        ?string &$legalOrgId,
        ?string &$legalOrgType,
        ?string &$legalOrgName
    ): static {
        $legalOrgId = '';
        $legalOrgType = '';
        $legalOrgName = '';

        if ($this->documentReader->firstDocumentPayeeLegalOrganisation()) {
            $this->documentReader->getDocumentPayeeLegalOrganisation(
                $legalOrgType,
                $legalOrgId,
                $legalOrgName
            );
        }

        return $this;
    }

    /**
     * Seek to the first contact information of the payee party of the document. Returns true if a first contact information of the payee party is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentPayeeContact.
     *
     * @return bool
     */
    public function firstDocumentPayeeContact(): bool
    {
        return $this->documentReader->firstDocumentPayeeContact();
    }

    /**
     * Seek to the next available contact information of the payee party of the document. Returns true if another contact information of the payee party is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentPayeeContact.
     *
     * @return bool
     */
    public function nextDocumentPayeeContact(): bool
    {
        return $this->documentReader->nextDocumentPayeeContact();
    }

    /**
     * Get contact information of the payee party.
     *
     * @param  null|string $contactPersonName     __BT-X-244, From EXTENDED__ Contact point for a legal entity, such as a personal name of the contact person
     * @param  null|string $contactDepartmentName __BT-X-245, From EXTENDED__ Contact point for a legal entity, such as a name of the department or office
     * @param  null|string $contactPhoneNo        __BT-X-246, From EXTENDED__ A telephone number for the contact point
     * @param  null|string $contactFaxNo          __BT-X-247, From EXTENDED__ A fax number of the contact point
     * @param  null|string $contactEmailAddress   __BT-X-248, From EXTENDED__ An e-mail address of the contact point
     * @return static
     *
     * @phpstan-param-out string $contactPersonName
     * @phpstan-param-out string $contactDepartmentName
     * @phpstan-param-out string $contactPhoneNo
     * @phpstan-param-out string $contactFaxNo
     * @phpstan-param-out string $contactEmailAddress
     */
    public function getDocumentPayeeContact(
        ?string &$contactPersonName,
        ?string &$contactDepartmentName,
        ?string &$contactPhoneNo,
        ?string &$contactFaxNo,
        ?string &$contactEmailAddress
    ): static {
        $this->documentReader->getDocumentPayeeContact(
            $contactPersonName,
            $contactDepartmentName,
            $contactPhoneNo,
            $contactFaxNo,
            $contactEmailAddress
        );

        return $this;
    }

    /**
     * Get detailed information on the delivery conditions.
     *
     * @param  null|string $code __BT-X-145, From EXTENDED__ The code indicating the type of delivery for these commercial delivery terms. To be selected from the entries in the list UNTDID 4053 + INCOTERMS
     * @return static
     *
     * @phpstan-param-out string $code
     */
    public function getDocumentDeliveryTerms(
        ?string &$code
    ): static {
        $this->documentReader->getDocumentDeliveryTerms($code);

        return $this;
    }

    /**
     * Get details of the associated order confirmation.
     *
     * @param  null|string            $issuerAssignedId __BT-14, From EN 16931__ An identifier issued by the seller for a referenced sales order (Order confirmation number)
     * @param  null|DateTimeInterface $issueDate        __BT-X-146, From EXTENDED__ Order confirmation date
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out null|DateTimeInterface $issueDate
     */
    public function getDocumentSellerOrderReferencedDocument(
        ?string &$issuerAssignedId,
        ?DateTimeInterface &$issueDate
    ): static {
        $issuerAssignedId = '';
        $issueDate = null;

        if ($this->documentReader->firstDocumentSellerOrderReference()) {
            $this->documentReader->getDocumentSellerOrderReference(
                $issuerAssignedId,
                $issueDate
            );
        }

        return $this;
    }

    /**
     * Get details of the related buyer order.
     *
     * @param  null|string            $issuerAssignedId __BT-13, From MINIMUM__ An identifier issued by the buyer for a referenced order (order number)
     * @param  null|DateTimeInterface $issueDate        __BT-X-147, From EXTENDED__ Date of order
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out null|DateTimeInterface $issueDate
     */
    public function getDocumentBuyerOrderReferencedDocument(
        ?string &$issuerAssignedId,
        ?DateTimeInterface &$issueDate
    ): static {
        $issuerAssignedId = '';
        $issueDate = null;

        if ($this->documentReader->firstDocumentBuyerOrderReference()) {
            $this->documentReader->getDocumentBuyerOrderReference(
                $issuerAssignedId,
                $issueDate
            );
        }

        return $this;
    }

    /**
     * Get details of the associated offer.
     *
     * @param  null|string            $issuerAssignedId __BT-X-403, From EXTENDED__ Offer number
     * @param  null|DateTimeInterface $issueDate        __BT-X-404, From EXTENDED__ Date of offer
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out null|DateTimeInterface $issueDate
     */
    public function getDocumentQuotationReferencedDocument(
        ?string &$issuerAssignedId,
        ?DateTimeInterface &$issueDate
    ): static {
        $issuerAssignedId = '';
        $issueDate = null;

        if ($this->documentReader->firstDocumentQuotationReference()) {
            $this->documentReader->getDocumentQuotationReference(
                $issuerAssignedId,
                $issueDate
            );
        }

        return $this;
    }

    /**
     * Get details of the associated contract.
     *
     * @param  null|string            $issuerAssignedId __BT-12, From BASIC WL__ The contract reference should be assigned once in the context of the specific trade relationship and for a defined period of time (contract number)
     * @param  null|DateTimeInterface $issueDate        __BT-X-26, From EXTENDED__ Contract date
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out null|DateTimeInterface $issueDate
     */
    public function getDocumentContractReferencedDocument(
        ?string &$issuerAssignedId,
        ?DateTimeInterface &$issueDate
    ): static {
        $issuerAssignedId = '';
        $issueDate = null;

        if ($this->documentReader->firstDocumentContractReference()) {
            $this->documentReader->getDocumentContractReference(
                $issuerAssignedId,
                $issueDate
            );
        }

        return $this;
    }

    /**
     * Get first additional referenced document for the document. Returns true if an additional referenced document is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentAdditionalReferencedDocument.
     *
     * @return bool
     */
    public function firstDocumentAdditionalReferencedDocument(): bool
    {
        return $this->documentReader->firstDocumentAdditionalReference();
    }

    /**
     * Get next additional referenced document for the document. Returns true when another additional referenced document is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentAdditionalReferencedDocument.
     *
     * @return bool
     */
    public function nextDocumentAdditionalReferencedDocument(): bool
    {
        return $this->documentReader->nextDocumentAdditionalReference();
    }

    /**
     * Get information about billing documents that provide evidence of claims made in the bill.
     *
     * __Notes__
     *  - The documents justifying the invoice can be used to reference a document number, which should be
     *    known to the recipient, as well as an external document (referenced by a URL) or an embedded document (such
     *    as a timesheet as a PDF file). The option of linking to an external document is e.g. required when it comes
     *    to large attachments and / or sensitive information, e.g. for personal services, which must be separated
     *    from the bill
     *  - Use ZugferdDocumentReader::firstDocumentAdditionalReferencedDocument and
     *    ZugferdDocumentReader::nextDocumentAdditionalReferencedDocument to seek between multiple additional referenced
     *    documents
     *
     * @param  string                 $issuerAssignedId   __BT-122, From EN 16931__ The identifier of the tender or lot to which the invoice relates, or an identifier specified by the seller for an object on which the invoice is based, or an identifier of the document on which the invoice is based
     * @param  string                 $typeCode           __BT-122-0, From EN 16931__ Type of referenced document (See codelist UNTDID 1001)
     *                                                    - Code 916 "reference paper" is used to reference the identification of the
     *                                                    document on which the invoice is based - Code 50 "Price / sales catalog response"
     *                                                    is used to reference the tender or the lot - Code 130 "invoice data sheet" is used
     *                                                    to reference an identifier for an object specified by the seller
     * @param  null|string            $uriId              __BT-124, From EN 16931__ A means of locating the resource, including the primary access method intended for it, e.g. http:// or ftp://. The storage location of the external document must be used if the buyer requires further information as
     *                                                    supporting documents for the invoiced amounts. External documents are not part of the invoice. Invoice processing should be possible without access to external documents. Access to external documents can entail certain risks.
     * @param  null|array<int,string> $name               __BT-123, From EN 16931__ A description of the document, e.g. Hourly billing, usage or consumption report, etc.
     * @param  null|string            $refTypeCode        __BT-, From __ The identifier for the identification scheme of the identifier of the item invoiced. If it is not clear to the recipient which scheme is used for the identifier, an identifier of the scheme should be used, which must be selected from UNTDID 1153 in accordance with the code list entries.
     * @param  null|DateTimeInterface $issueDate          __BT-X-149, From EXTENDED__ Document date
     * @param  null|string            $binaryDataFilename __BT-125, From EN 16931__ Contains a file name of an attachment document embedded as a binary object
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out string $typeCode
     * @phpstan-param-out string $uriId
     * @phpstan-param-out array<int,string> $name
     * @phpstan-param-out string $refTypeCode
     * @phpstan-param-out null|DateTimeInterface $issueDate
     * @phpstan-param-out string $binaryDataFilename
     */
    public function getDocumentAdditionalReferencedDocument(
        ?string &$issuerAssignedId,
        ?string &$typeCode,
        ?string &$uriId,
        ?array &$name,
        ?string &$refTypeCode,
        ?DateTimeInterface &$issueDate,
        ?string &$binaryDataFilename
    ): static {
        $name = [];

        $this->documentReader->getDocumentAdditionalReference(
            $issuerAssignedId,
            $issueDate,
            $typeCode,
            $refTypeCode,
            $newDescription,
            $newInvoiceSuiteAttachment
        );

        InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($name, $newDescription);

        $this->internalHandleInvoiceSuiteAttachment(
            $newInvoiceSuiteAttachment,
            $uriId,
            $binaryDataFilename
        );

        return $this;
    }

    /**
     * Get all additional referenced documents.
     *
     * @param  null|array<int, array{IssuerAssignedID: string, URIID: string, LineID: string, TypeCode: string, ReferenceTypeCode: string, FormattedIssueDateTime: null|DateTimeInterface}> $refDocs Array contains all additional referenced documents, but without extracting attached binary objects. If you want to access attached binary objects you have to use ZugferdDocumentReader::getDocumentAdditionalReferencedDocument
     * @return static
     *
     * @phpstan-param-out array<int, array{IssuerAssignedID: string, URIID: string, LineID: string, TypeCode: string, ReferenceTypeCode: string, FormattedIssueDateTime: DateTimeInterface|null}> $refDocs
     */
    public function getDocumentAdditionalReferencedDocuments(
        ?array &$refDocs
    ): static {
        $refDocs = [];

        if ($this->documentReader->firstDocumentAdditionalReference()) {
            do {
                $name = [];

                $this->documentReader->getDocumentAdditionalReference(
                    $issuerAssignedId,
                    $issueDate,
                    $typeCode,
                    $refTypeCode,
                    $newDescription,
                    $attachment
                );

                InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($name, $newDescription);

                InvoiceSuiteArrayUtils::pushArrayToIntIndexedArray($refDocs, [
                    'IssuerAssignedID' => $issuerAssignedId,
                    'URIID' => '',
                    'LineID' => '',
                    'TypeCode' => $typeCode,
                    'ReferenceTypeCode' => $refTypeCode,
                    'FormattedIssueDateTime' => $issueDate,
                ]);
            } while ($this->documentReader->nextDocumentAdditionalReference());
        }

        return $this;
    }

    /**
     * Get first reference to the previous invoice. Returns true if an invoice reference document is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentInvoiceReferencedDocument.
     *
     * @return bool
     */
    public function firstDocumentInvoiceReferencedDocument(): bool
    {
        return $this->documentReader->firstDocumentInvoiceReference();
    }

    /**
     * Get next reference to the previous invoice Returns true when another invoice reference document is available, otherwise false
     * You may use this together with ZugferdDocumentReader::getDocumentInvoiceReferencedDocument.
     *
     * @return bool
     */
    public function nextDocumentInvoiceReferencedDocument(): bool
    {
        return $this->documentReader->nextDocumentInvoiceReference();
    }

    /**
     * Get reference to the previous invoice.
     *
     * @param  string                 $issuerAssignedId __BT-25, From BASIC WL__ The identification of an invoice previously sent by the seller
     * @param  null|string            $typeCode         __BT-X-555, From EXTENDED__ Type of previous invoice (code)
     * @param  null|DateTimeInterface $issueDate        __BT-26, From BASIC WL__ Date of the previous invoice
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out string $typeCode
     * @phpstan-param-out null|DateTimeInterface $issueDate
     */
    public function getDocumentInvoiceReferencedDocument(
        ?string &$issuerAssignedId,
        ?string &$typeCode,
        ?DateTimeInterface &$issueDate
    ): static {
        $this->documentReader->getDocumentInvoiceReference(
            $issuerAssignedId,
            $issueDate,
            $typeCode
        );

        return $this;
    }

    /**
     * Get all references to the previous invoice.
     *
     * @param  null|array<int, array{IssuerAssignedID: string, TypeCode: string, FormattedIssueDateTime: null|DateTimeInterface}> $invoiceRefDocs Array contains all invoice referenced documents
     * @return static
     *
     * @phpstan-param-out array<int, array{IssuerAssignedID: string, TypeCode: string, FormattedIssueDateTime: DateTimeInterface|null}> $invoiceRefDocs
     */
    public function getDocumentInvoiceReferencedDocuments(
        ?array &$invoiceRefDocs
    ): static {
        $invoiceRefDocs = [];

        if ($this->documentReader->firstDocumentInvoiceReference()) {
            do {
                $this->documentReader->getDocumentInvoiceReference(
                    $newReferenceNumber,
                    $newReferenceDate,
                    $newTypeCode
                );

                InvoiceSuiteArrayUtils::pushArrayToIntIndexedArray($invoiceRefDocs, [
                    'IssuerAssignedID' => $newReferenceNumber,
                    'TypeCode' => $newTypeCode,
                    'FormattedIssueDateTime' => $newReferenceDate,
                ]);
            } while ($this->documentReader->nextDocumentInvoiceReference());
        }

        return $this;
    }

    /**
     * Get first additional referenced document for the document. Returns true if the first position is available, otherwise false.
     * Use wuth getDocumentUltimateCustomerOrderReferencedDocument.
     *
     * @return bool
     */
    public function firstDocumentUltimateCustomerOrderReferencedDocument(): bool
    {
        return $this->documentReader->firstDocumentUltimateCustomerOrderReference();
    }

    /**
     * Get next additional referenced document for the document. Returns true if the first position is available, otherwise false
     * Use wuth getDocumentUltimateCustomerOrderReferencedDocument.
     *
     * @return bool
     */
    public function nextDocumentUltimateCustomerOrderReferencedDocument(): bool
    {
        return $this->documentReader->nextDocumentUltimateCustomerOrderReference();
    }

    /**
     * Get details of the ultimate customer order.
     *
     * @param  null|string            $issuerAssignedId __BT-X-150, From EXTENDED__ Order number of the end customer
     * @param  null|DateTimeInterface $issueDate        __BT-X-151, From EXTENDED__ Date of the order issued by the end customer
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out null|DateTimeInterface $issueDate
     */
    public function getDocumentUltimateCustomerOrderReferencedDocument(
        ?string &$issuerAssignedId,
        ?DateTimeInterface &$issueDate
    ): static {
        $this->documentReader->getDocumentUltimateCustomerOrderReference(
            $issuerAssignedId,
            $issueDate
        );

        return $this;
    }

    /**
     * Get Details of a project reference.
     *
     * @param  null|string $id   __BT-11, From EN 16931__ The identifier of the project to which the invoice relates
     * @param  null|string $name __BT-11-0, From EN 16931__  The name of the project to which the invoice relates
     * @return static
     *
     * @phpstan-param-out string $id
     * @phpstan-param-out string $name
     */
    public function getDocumentProcuringProject(
        ?string &$id,
        ?string &$name
    ): static {
        $id = '';
        $name = '';

        if ($this->documentReader->firstDocumentProjectReference()) {
            $this->documentReader->getDocumentProjectReference($id, $name);
        }

        return $this;
    }

    /**
     * Get detailed information on the actual delivery.
     *
     * @param  null|DateTimeInterface $date __BT-72, From BASIC WL__ Actual delivery time
     * @return static
     *
     * @phpstan-param-out DateTimeInterface|null $date
     */
    public function getDocumentSupplyChainEvent(
        ?DateTimeInterface &$date
    ): static {
        $this->documentReader->getDocumentSupplyChainEvent($date);

        return $this;
    }

    /**
     * Get detailed information on the associated shipping notification.
     *
     * @param  null|string            $issuerAssignedId __BT-16, From BASIC WL__ Shipping notification reference
     * @param  null|DateTimeInterface $issueDate        __BT-X-200, From EXTENDED__ Shipping notification date
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out null|DateTimeInterface $issueDate
     */
    public function getDocumentDespatchAdviceReferencedDocument(
        ?string &$issuerAssignedId,
        ?DateTimeInterface &$issueDate
    ): static {
        $issuerAssignedId = '';
        $issueDate = null;

        if ($this->documentReader->firstDocumentDespatchAdviceReference()) {
            $this->documentReader->getDocumentDespatchAdviceReference(
                $issuerAssignedId,
                $issueDate
            );
        }

        return $this;
    }

    /**
     * Get detailed information on the associated goods receipt notification.
     *
     * @param  null|string            $issuerAssignedId __BT-15, From EN 16931__ An identifier for a referenced goods receipt notification (Goods receipt number)
     * @param  null|DateTimeInterface $issueDate        __BT-X-201, From EXTENDED__ Goods receipt date
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out null|DateTimeInterface $issueDate
     */
    public function getDocumentReceivingAdviceReferencedDocument(
        ?string &$issuerAssignedId,
        ?DateTimeInterface &$issueDate
    ): static {
        $issuerAssignedId = '';
        $issueDate = null;

        if ($this->documentReader->firstDocumentReceivingAdviceReference()) {
            $this->documentReader->getDocumentReceivingAdviceReference(
                $issuerAssignedId,
                $issueDate
            );
        }

        return $this;
    }

    /**
     * Get detailed information on the associated delivery note.
     *
     * @param  string                 $issuerAssignedId __BT-X-202, From EXTENDED__ Delivery slip number
     * @param  null|DateTimeInterface $issueDate        __BT-X-203, From EXTENDED__ Delivery slip date
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out null|DateTimeInterface $issueDate
     */
    public function getDocumentDeliveryNoteReferencedDocument(
        ?string &$issuerAssignedId,
        ?DateTimeInterface &$issueDate
    ): static {
        $issuerAssignedId = '';
        $issueDate = null;

        if ($this->documentReader->firstDocumentDeliveryNoteReference()) {
            $this->documentReader->getDocumentDeliveryNoteReference(
                $issuerAssignedId,
                $issueDate
            );
        }

        return $this;
    }

    /**
     * Seek to the first payment means of the document. Returns true if a first payment mean is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentPaymentMeans.
     *
     * @return bool
     */
    public function firstGetDocumentPaymentMeans(): bool
    {
        return $this->documentReader->firstDocumentPaymentMean();
    }

    /**
     * Seek to the next payment means of the document. Returns true if another payment mean is available, otherwise false
     * You may use this together with ZugferdDocumentReader::getDocumentPaymentMeans
     *
     * @return bool
     */
    public function nextGetDocumentPaymentMeans(): bool
    {
        return $this->documentReader->nextDocumentPaymentMean();
    }

    /**
     * Get detailed information on the payment method.
     *
     * @param  null|string $typeCode         __BT-81, From BASIC WL__ The expected or used means of payment, expressed as a code. The entries from the UNTDID 4461 code list must be used. A distinction should be made between SEPA and non-SEPA payments as well as between credit payments, direct debits, card payments and other means of payment In particular, the following codes can be used:
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
     *
     * @phpstan-param-out string $typeCode
     * @phpstan-param-out string $information
     * @phpstan-param-out string $cardType
     * @phpstan-param-out string $cardId
     * @phpstan-param-out string $cardHolderName
     * @phpstan-param-out string $buyerIban
     * @phpstan-param-out string $payeeIban
     * @phpstan-param-out string $payeeAccountName
     * @phpstan-param-out string $payeePropId
     * @phpstan-param-out string $payeeBic
     */
    public function getDocumentPaymentMeans(
        ?string &$typeCode,
        ?string &$information,
        ?string &$cardType,
        ?string &$cardId,
        ?string &$cardHolderName,
        ?string &$buyerIban,
        ?string &$payeeIban,
        ?string &$payeeAccountName,
        ?string &$payeePropId,
        ?string &$payeeBic
    ): static {
        $cardType = '';

        $this->documentReader->getDocumentPaymentMean(
            $typeCode,
            $information,
            $cardId,
            $cardHolderName,
            $buyerIban,
            $payeeIban,
            $payeeAccountName,
            $payeePropId,
            $payeeBic,
            $newPaymentReference,
            $newMandate
        );

        return $this;
    }

    /**
     * Seek to the first document tax. Returns true if a first tax (at document level) is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentTax.
     *
     * @return bool
     */
    public function firstDocumentTax(): bool
    {
        return $this->documentReader->firstDocumentTax();
    }

    /**
     * Seek to the next document tax. Returns true if another tax (at document level) is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentTax.
     *
     * @return bool
     */
    public function nextDocumentTax(): bool
    {
        return $this->documentReader->nextDocumentTax();
    }

    /**
     * Get current VAT breakdown (at document level).
     *
     * @param  null|string            $categoryCode               __BT-118, From BASIC WL__ Coded description of a sales tax category
     * @param  null|string            $typeCode                   __BT-118-0, From BASIC WL__ Coded description of a sales tax category. Note: Fixed value = "VAT"
     * @param  null|float             $basisAmount                __BT-116, From BASIC WL__ Tax base amount, Each sales tax breakdown must show a category-specific tax base amount
     * @param  null|float             $calculatedAmount           __BT-117, From BASIC WL__ The total amount to be paid for the relevant VAT category. Note: Calculated by multiplying the amount to be taxed according to the sales tax category by the sales tax rate applicable for the sales tax category concerned
     * @param  null|float             $rateApplicablePercent      __BT-119, From BASIC WL__ The sales tax rate, expressed as the percentage applicable to the sales tax category in question. Note: The code of the sales tax category and the category-specific sales tax rate must correspond to one another. The value to be given is the percentage. For example, the value 20 is given for 20% (and not 0.2)
     * @param  null|string            $exemptionReason            __BT-120, From BASIC WL__ Reason for tax exemption (free text)
     * @param  null|string            $exemptionReasonCode        __BT-121, From BASIC WL__ Reason given in code form for the exemption of the amount from VAT. Note: Code list issued and maintained by the Connecting Europe Facility.
     * @param  null|float             $lineTotalBasisAmount       __BT-X-262, From EXTENDED__ An amount used as the basis for calculating sales tax, duty or customs duty
     * @param  null|float             $allowanceChargeBasisAmount __BT-X-263, From EXTENDED__ Total amount Additions and deductions to the tax rate at document level
     * @param  null|DateTimeInterface $taxPointDate               __BT-7-00, From EN 16931__ Date on which tax is due. This is not used in Germany. Instead, the delivery and service date must be specified.
     * @param  null|string            $dueDateTypeCode            __BT-8, From BASIC WL__ The code for the date on which the VAT becomes relevant for settlement for the seller and for the buyer
     * @return static
     *
     * @phpstan-param-out string $categoryCode
     * @phpstan-param-out string $typeCode
     * @phpstan-param-out float $basisAmount
     * @phpstan-param-out float $calculatedAmount
     * @phpstan-param-out float $rateApplicablePercent
     * @phpstan-param-out string $exemptionReason
     * @phpstan-param-out string $exemptionReasonCode
     * @phpstan-param-out float $lineTotalBasisAmount
     * @phpstan-param-out float $allowanceChargeBasisAmount
     * @phpstan-param-out DateTimeInterface|null $taxPointDate
     * @phpstan-param-out string $dueDateTypeCode
     */
    public function getDocumentTax(
        ?string &$categoryCode,
        ?string &$typeCode,
        ?float &$basisAmount,
        ?float &$calculatedAmount,
        ?float &$rateApplicablePercent,
        ?string &$exemptionReason,
        ?string &$exemptionReasonCode,
        ?float &$lineTotalBasisAmount,
        ?float &$allowanceChargeBasisAmount,
        ?DateTimeInterface &$taxPointDate,
        ?string &$dueDateTypeCode
    ): static {
        $lineTotalBasisAmount = 0.0;
        $allowanceChargeBasisAmount = 0.0;

        $this->documentReader->getDocumentTax(
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
     * Get detailed information on the billing period.
     *
     * @param  null|DateTimeInterface $startDate __BT-73, From BASIC WL__ Start of the billing period
     * @param  null|DateTimeInterface $endDate   __BT-74, From BASIC WL__ End of the billing period
     * @return static
     *
     * @phpstan-param-out DateTimeInterface|null $startDate
     * @phpstan-param-out DateTimeInterface|null $endDate
     */
    public function getDocumentBillingPeriod(
        ?DateTimeInterface &$startDate,
        ?DateTimeInterface &$endDate
    ): static {
        $startDate = null;
        $endDate = null;

        if ($this->documentReader->firstDocumentBillingPeriod()) {
            $this->documentReader->getDocumentBillingPeriod(
                $startDate,
                $endDate,
                $newDescription
            );
        }

        return $this;
    }

    /**
     * Get information about surcharges and charges applicable to the bill as a whole, Deductions,
     * such as for withheld taxes may also be specified in this group.
     *
     * @param  null|array<int,array<string,mixed>> $allowanceCharge
     * @return static
     *
     * @phpstan-param-out array<int,array<string,mixed>> $allowanceCharge
     */
    public function getDocumentAllowanceCharges(
        ?array &$allowanceCharge
    ): static {
        $allowanceCharge = [];

        if ($this->documentReader->firstDocumentAllowanceCharge()) {
            do {
                $this->documentReader->getDocumentAllowanceCharge(
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

                InvoiceSuiteArrayUtils::pushArrayToIntIndexedArray($allowanceCharge, [
                    'chargeindicator' => $newChargeIndicator,
                    'sequencenumeric' => 0,
                    'calculationpercent' => $newAllowanceChargePercent,
                    'basisamount' => $newAllowanceChargeBaseAmount,
                    'basisquantity' => 0.0,
                    'actualAmount' => $newAllowanceChargeAmount,
                    'reasoncode' => $newAllowanceChargeReasonCode,
                    'reason' => $newAllowanceChargeReason,
                    'taxcalculatedamount' => 0.0,
                    'taxtypecode' => $newTaxType,
                    'taxexemptionreason' => '',
                    'taxbasisamount' => 0.0,
                    'taxlinetotalbasisamount' => 0.0,
                    'taxallowancechargebasisamount' => 0.0,
                    'taxcategorycode' => $newTaxCategory,
                    'taxexemptionreasoncode' => '',
                    'taxpointdate' => null,
                    'taxduedatetypecode' => '',
                    'taxrateapplicablepercent' => $newTaxPercent,
                ]);
            } while ($this->documentReader->nextDocumentAllowanceCharge());
        }

        return $this;
    }

    /**
     * Seek to the first documents allowance charge. Returns true if the first position is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentAllowanceCharge.
     *
     * @return bool
     */
    public function firstDocumentAllowanceCharge(): bool
    {
        return $this->documentReader->firstDocumentAllowanceCharge();
    }

    /**
     * Seek to the next documents allowance charge. Returns true if a other position is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentAllowanceCharge.
     *
     * @return bool
     */
    public function nextDocumentAllowanceCharge(): bool
    {
        return $this->documentReader->nextDocumentAllowanceCharge();
    }

    /**
     * Get information about the currently seeked surcharges and charges applicable to the bill as a whole, Deductions,
     * such as for withheld taxes may also be specified in this group.
     *
     * @param  null|float  $actualAmount          __BT-92/BT-99, From BASIC WL__ Amount of the surcharge or discount at document level
     * @param  null|bool   $isCharge              __BT-20-1/BT-21-1, From BASIC WL__ Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|string $taxCategoryCode       __BT-95/BT-102, From BASIC WL__ A coded indication of which sales tax category applies to the surcharge or deduction at document level
     * @param  null|string $taxTypeCode           __BT-95-0/BT-102-0, From BASIC WL__ Code for the VAT category of the surcharge or charge at document level. Note: Fixed value = "VAT"
     * @param  null|float  $rateApplicablePercent __BT-96/BT-103, From BASIC WL__ VAT rate for the surcharge or discount on document level. Note: The code of the sales tax category and the category-specific sales tax rate must correspond to one another. The value to be given is the percentage. For example, the value 20 is given for 20% (and not 0.2)
     * @param  null|float  $sequence              __BT-X-265, From EXTENDED__ Calculation order
     * @param  null|float  $calculationPercent    __BT-94/BT-101, From BASIC WL__ Percentage surcharge or discount at document level
     * @param  null|float  $basisAmount           __BT-93/BT-100, From BASIC WL__ The base amount that may be used in conjunction with the percentage of the surcharge or discount at document level to calculate the amount of the discount at document level
     * @param  null|float  $basisQuantity         __BT-X-266, From EXTENDED__ Base quantity of the discount
     * @param  null|string $basisQuantityUnitCode __BT-X-267, From EXTENDED__ Unit of the price base quantity
     * @param  null|string $reasonCode            __BT-98/BT-105, From BASIC WL__ The reason given as a code for the surcharge or discount at document level. Note: Use entries from the UNTDID 5189 code list. The code of the reason for the surcharge or discount at document level and the reason for the surcharge or discount at document level must correspond to each other
     * @param  null|string $reason                __BT-97/BT-104, From BASIC WL__ The reason given in text form for the surcharge or discount at document level
     * @return static
     *
     * @phpstan-param-out float $actualAmount
     * @phpstan-param-out bool $isCharge
     * @phpstan-param-out string $taxCategoryCode
     * @phpstan-param-out string $taxTypeCode
     * @phpstan-param-out float $rateApplicablePercent
     * @phpstan-param-out float $sequence
     * @phpstan-param-out float $calculationPercent
     * @phpstan-param-out float $basisAmount
     * @phpstan-param-out float $basisQuantity
     * @phpstan-param-out string $basisQuantityUnitCode
     * @phpstan-param-out string $reasonCode
     * @phpstan-param-out string $reason
     */
    public function getDocumentAllowanceCharge(
        ?float &$actualAmount,
        ?bool &$isCharge,
        ?string &$taxCategoryCode,
        ?string &$taxTypeCode,
        ?float &$rateApplicablePercent,
        ?float &$sequence,
        ?float &$calculationPercent,
        ?float &$basisAmount,
        ?float &$basisQuantity,
        ?string &$basisQuantityUnitCode,
        ?string &$reasonCode,
        ?string &$reason
    ): static {
        $sequence = 0.0;
        $basisQuantity = 0.0;
        $basisQuantityUnitCode = '';

        $this->documentReader->getDocumentAllowanceCharge(
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
     * Seek to the first documents service charge position. Returns true if the first position is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentLogisticsServiceCharge.
     *
     * @return bool
     */
    public function firstDocumentLogisticsServiceCharge(): bool
    {
        return $this->documentReader->firstDocumentLogisticServiceCharge();
    }

    /**
     * Seek to the next documents service charge position. Returns true if a other position is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentLogisticsServiceCharge.
     *
     * @return bool
     */
    public function nextDocumentLogisticsServiceCharge(): bool
    {
        return $this->documentReader->nextDocumentLogisticServiceCharge();
    }

    /**
     * Get currently seeked logistical service fees (On document level).
     *
     * @param  null|string            $description            __BT-X-271, From EXTENDED__ Identification of the service fee
     * @param  null|float             $appliedAmount          __BT-X-272, From EXTENDED__ Amount of the service fee
     * @param  null|array<int,string> $taxTypeCodes           __BT-X-273-0, From EXTENDED__ Code of the Tax type. Note: Fixed value = "VAT"
     * @param  null|array<int,string> $taxCategoryCodes       __BT-X-273, From EXTENDED__ Code of the VAT category
     * @param  null|array<int,float>  $rateApplicablePercents __BT-X-274, From EXTENDED__ The sales tax rate, expressed as the percentage applicable to the sales tax category in question. Note: The code of the sales tax category and the category-specific sales tax rate must correspond to one another. The value to be given is the percentage. For example, the value 20 is given for 20% (and not 0.2)
     * @return static
     *
     * @phpstan-param-out string $description
     * @phpstan-param-out float $appliedAmount
     * @phpstan-param-out array<int,string> $taxTypeCodes
     * @phpstan-param-out array<int,string> $taxCategoryCodes
     * @phpstan-param-out array<int,float> $rateApplicablePercents
     */
    public function getDocumentLogisticsServiceCharge(
        ?string &$description,
        ?float &$appliedAmount,
        ?array &$taxTypeCodes,
        ?array &$taxCategoryCodes,
        ?array &$rateApplicablePercents
    ): static {
        $this->documentReader->getDocumentLogisticServiceCharge(
            $appliedAmount,
            $description,
            $newTaxCategory,
            $newTaxType,
            $newTaxPercent
        );

        $taxCategoryCodes = [];
        $taxTypeCodes = [];
        $rateApplicablePercents = [];

        InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($taxCategoryCodes, $newTaxCategory);
        InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($taxTypeCodes, $newTaxType);
        InvoiceSuiteArrayUtils::pushFloatToIntIndexedArray($rateApplicablePercents, $newTaxPercent);

        return $this;
    }

    /**
     * Get all documents payment terms.
     *
     * @param  null|array<int, array{description: string, duedate: null|DateTimeInterface, directdebitmandateid: string, partialpaymentamount: float}> $paymentTerms
     * @return static
     *
     * @phpstan-param-out array<int, array{description: string, duedate: DateTimeInterface|null, directdebitmandateid: string, partialpaymentamount: float}> $paymentTerms
     */
    public function getDocumentPaymentTerms(
        ?array &$paymentTerms
    ): static {
        $paymentTerms = [];

        if ($this->documentReader->firstDocumentPaymentTerm()) {
            do {
                $this->documentReader->getDocumentPaymentTerm(
                    $newDescription,
                    $newDueDate,
                    $newMandate
                );

                InvoiceSuiteArrayUtils::pushArrayToIntIndexedArray($paymentTerms, [
                    'description' => $newDescription,
                    'duedate' => $newDueDate,
                    'directdebitmandateid' => $newMandate,
                    'partialpaymentamount' => 0.0,
                ]);
            } while ($this->documentReader->nextDocumentPaymentTerm());
        }

        return $this;
    }

    /**
     * Seek to the first documents payment terms position. Returns true if the first position is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentPaymentTerm.
     *
     * @return bool
     */
    public function firstDocumentPaymentTerms(): bool
    {
        return $this->documentReader->firstDocumentPaymentTerm();
    }

    /**
     * Seek to the next documents payment terms position. Returns true if a other position is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentPaymentTerm.
     *
     * @return bool
     */
    public function nextDocumentPaymentTerms(): bool
    {
        return $this->documentReader->nextDocumentPaymentTerm();
    }

    /**
     * Get currently seeked payment term.
     *
     * @param  null|string            $description          __BT-20, From _BASIC WL__ A text description of the payment terms that apply to the payment amount due (including a description of possible penalties). Note: This element can contain multiple lines and multiple conditions.
     * @param  null|DateTimeInterface $dueDate              __BT-9, From BASIC WL__ The date by which payment is due Note: The payment due date reflects the net payment due date. In the case of partial payments, this indicates the first due date of a net payment. The corresponding description of more complex payment terms can be given in BT-20.
     * @param  null|string            $directDebitMandateID __BT-89, From BASIC WL__ Unique identifier assigned by the payee to reference the direct debit authorization
     * @return static
     *
     * @phpstan-param-out string $description
     * @phpstan-param-out DateTimeInterface|null $dueDate
     * @phpstan-param-out string $directDebitMandateID
     */
    public function getDocumentPaymentTerm(
        ?string &$description,
        ?DateTimeInterface &$dueDate,
        ?string &$directDebitMandateID
    ): static {
        $this->documentReader->getDocumentPaymentTerm(
            $description,
            $dueDate,
            $directDebitMandateID
        );

        return $this;
    }

    /**
     * Get detailed information on payment discounts.
     *
     * @param  null|float             $calculationPercent         __BT-X-286, From EXTENDED__ Percentage of the down payment
     * @param  null|DateTimeInterface $basisDateTime              __BT-X-282, From EXTENDED__ Due date reference date
     * @param  null|float             $basisPeriodMeasureValue    __BT-X-284, From EXTENDED__ Maturity period (basis)
     * @param  null|string            $basisPeriodMeasureUnitCode __BT-X-284, From EXTENDED__ Maturity period (unit)
     * @param  null|float             $basisAmount                __BT-X-284, From EXTENDED__ Base amount of the payment discount
     * @param  null|float             $actualDiscountAmount       __BT-X-287, From EXTENDED__ Amount of the payment discount
     * @return static
     *
     * @phpstan-param-out float $calculationPercent
     * @phpstan-param-out null|DateTimeInterface $basisDateTime
     * @phpstan-param-out float $basisPeriodMeasureValue
     * @phpstan-param-out string $basisPeriodMeasureUnitCode
     * @phpstan-param-out float $basisAmount
     * @phpstan-param-out float $actualDiscountAmount
     */
    public function getDiscountTermsFromPaymentTerm(
        ?float &$calculationPercent,
        ?DateTimeInterface &$basisDateTime,
        ?float &$basisPeriodMeasureValue,
        ?string &$basisPeriodMeasureUnitCode,
        ?float &$basisAmount,
        ?float &$actualDiscountAmount
    ): static {
        $calculationPercent = 0.0;
        $basisDateTime = null;
        $basisPeriodMeasureValue = 0.0;
        $basisPeriodMeasureUnitCode = '';
        $basisAmount = 0.0;
        $actualDiscountAmount = 0.0;

        if ($this->documentReader->firstDocumentPaymentDiscountTermsInLastPaymentTerm()) {
            $this->documentReader->getDocumentPaymentDiscountTermsInLastPaymentTerm(
                $basisAmount,
                $actualDiscountAmount,
                $calculationPercent,
                $basisDateTime,
                $basisPeriodMeasureValue,
                $basisPeriodMeasureUnitCode
            );
        }

        return $this;
    }

    /**
     * Get detailed information on payment penalties.
     *
     * @param  null|float             $calculationPercent         __BT-X-280, From EXTENDED__ Percentage of the payment surcharge
     * @param  null|DateTimeInterface $basisDateTime              __BT-X-276, From EXTENDED__ Due date reference date
     * @param  null|float             $basisPeriodMeasureValue    __BT-X-277, From EXTENDED__ Maturity period (basis)
     * @param  null|string            $basisPeriodMeasureUnitCode __BT-X-277, From EXTENDED__ Maturity period (unit)
     * @param  null|float             $basisAmount                __BT-X-279, From EXTENDED__ Basic amount of the payment surcharge
     * @param  null|float             $actualPenaltyAmount        __BT-X-281, From EXTENDED__ Amount of the payment surcharge
     * @return static
     *
     * @phpstan-param-out float $calculationPercent
     * @phpstan-param-out null|DateTimeInterface $basisDateTime
     * @phpstan-param-out float $basisPeriodMeasureValue
     * @phpstan-param-out string $basisPeriodMeasureUnitCode
     * @phpstan-param-out float $basisAmount
     * @phpstan-param-out float $actualPenaltyAmount
     */
    public function getPenaltyTermsFromPaymentTerm(
        ?float &$calculationPercent,
        ?DateTimeInterface &$basisDateTime,
        ?float &$basisPeriodMeasureValue,
        ?string &$basisPeriodMeasureUnitCode,
        ?float &$basisAmount,
        ?float &$actualPenaltyAmount
    ): static {
        $calculationPercent = 0.0;
        $basisDateTime = null;
        $basisPeriodMeasureValue = 0.0;
        $basisPeriodMeasureUnitCode = '';
        $basisAmount = 0.0;
        $actualPenaltyAmount = 0.0;

        if ($this->documentReader->firstDocumentPaymentPenaltyTermsInLastPaymentTerm()) {
            $this->documentReader->getDocumentPaymentPenaltyTermsInLastPaymentTerm(
                $basisAmount,
                $actualPenaltyAmount,
                $calculationPercent,
                $basisDateTime,
                $basisPeriodMeasureValue,
                $basisPeriodMeasureUnitCode
            );
        }

        return $this;
    }

    /**
     * Seek to the first trade accounting account of the document. Returns true if a first account is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentSellerContact.
     *
     * @return bool
     */
    public function firstDocumentReceivableSpecifiedTradeAccountingAccount(): bool
    {
        return $this->documentReader->firstDocumentPostingReference();
    }

    /**
     * Seek to the next trade accounting account of the document. Returns true if another account is available, otherwise false.
     * You may use this together with ZugferdDocumentReader::getDocumentSellerContact.
     *
     * @return bool
     */
    public function nextDocumentReceivableSpecifiedTradeAccountingAccount(): bool
    {
        return $this->documentReader->nextDocumentPostingReference();
    }

    /**
     * Get information on the booking reference (on document level).
     *
     * @param  null|string &$id       __BT-19, From BASIC WL__ Posting reference of the byuer. If required, this reference shall be provided by the Buyer to the Seller prior to the issuing of the Invoice.
     * @param  null|string &$typeCode __BT-X-290, From EXTENDED__ Type of the posting reference
     * @return static
     *
     * @phpstan-param-out string $id
     * @phpstan-param-out string $typeCode
     */
    public function getDocumentReceivableSpecifiedTradeAccountingAccount(
        ?string &$id,
        ?string &$typeCode
    ): static {
        $this->documentReader->getDocumentPostingReference(
            $typeCode,
            $id
        );

        return $this;
    }

    /**
     * Read Document money summation.
     *
     * @param  null|float $grandTotalAmount     __BT-112, From MINIMUM__ Total invoice amount including sales tax
     * @param  null|float $duePayableAmount     __BT-115, From MINIMUM__ Payment amount due
     * @param  null|float $lineTotalAmount      __BT-106, From BASIC WL__ Sum of the net amounts of all invoice items
     * @param  null|float $chargeTotalAmount    __BT-108, From BASIC WL__ Sum of the surcharges at document level
     * @param  null|float $allowanceTotalAmount __BT-107, From BASIC WL__ Sum of the discounts at document level
     * @param  null|float $taxBasisTotalAmount  __BT-109, From MINIMUM__ Total invoice amount excluding sales tax
     * @param  null|float $taxTotalAmount       __BT-110/111, From MINIMUM/BASIC WL__ if BT-6 is not null $taxTotalAmount = BT-111. Total amount of the invoice sales tax, Total tax amount in the booking currency
     * @param  null|float $roundingAmount       __BT-114, From EN 16931__ Rounding amount
     * @param  null|float $totalPrepaidAmount   __BT-113, From BASIC WL__ Prepayment amount
     * @return static
     *
     * @phpstan-param-out float $grandTotalAmount
     * @phpstan-param-out float $duePayableAmount
     * @phpstan-param-out float $lineTotalAmount
     * @phpstan-param-out float $chargeTotalAmount
     * @phpstan-param-out float $allowanceTotalAmount
     * @phpstan-param-out float $taxBasisTotalAmount
     * @phpstan-param-out float $taxTotalAmount
     * @phpstan-param-out float $roundingAmount
     * @phpstan-param-out float $totalPrepaidAmount
     */
    public function getDocumentSummation(
        ?float &$grandTotalAmount,
        ?float &$duePayableAmount,
        ?float &$lineTotalAmount,
        ?float &$chargeTotalAmount,
        ?float &$allowanceTotalAmount,
        ?float &$taxBasisTotalAmount,
        ?float &$taxTotalAmount,
        ?float &$roundingAmount,
        ?float &$totalPrepaidAmount
    ): static {
        $this->documentReader->getDocumentSummation(
            $lineTotalAmount,
            $chargeTotalAmount,
            $allowanceTotalAmount,
            $taxBasisTotalAmount,
            $taxTotalAmount,
            $taxTotalAmount2,
            $grandTotalAmount,
            $duePayableAmount,
            $totalPrepaidAmount,
            $roundingAmount
        );

        return $this;
    }

    /**
     * Seek to the first document position. Returns true if the first position is available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionGenerals.
     *
     * @return bool
     */
    public function firstDocumentPosition(): bool
    {
        return $this->documentReader->firstDocumentPosition();
    }

    /**
     * Seek to the next document position. Returns true if another position is available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionGenerals.
     *
     * @return bool
     */
    public function nextDocumentPosition(): bool
    {
        return $this->documentReader->nextDocumentPosition();
    }

    /**
     * Get general information of the current position.
     *
     * @param  null|string $lineId               __BT-126, From BASIC__ Identification of the invoice item
     * @param  null|string $lineStatusCode       __BT-X-7, From EXTENDED__ Indicates whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param  null|string $lineStatusReasonCode __BT-X-8, From EXTENDED__ Adds the type to specify whether the invoice line is:
     * @return static
     *
     * @phpstan-param-out string $lineId
     * @phpstan-param-out string $lineStatusCode
     * @phpstan-param-out string $lineStatusReasonCode
     */
    public function getDocumentPositionGenerals(
        ?string &$lineId,
        ?string &$lineStatusCode,
        ?string &$lineStatusReasonCode
    ): static {
        $this->documentReader->getDocumentPosition(
            $lineId,
            $newParentPositionId,
            $lineStatusCode,
            $lineStatusReasonCode
        );

        return $this;
    }

    /**
     * Seek to the first document position. Returns true if the first position is available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionNote.
     *
     * @return bool
     */
    public function firstDocumentPositionNote(): bool
    {
        return $this->documentReader->firstDocumentPositionNote();
    }

    /**
     * Seek to the next document position. Returns true if the first position is available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionNote.
     *
     * @return bool
     */
    public function nextDocumentPositionNote(): bool
    {
        return $this->documentReader->nextDocumentPositionNote();
    }

    /**
     * Get detailed information on the free text on the position.
     *
     * @param  string      $content     __BT-127, From BASIC__ A free text that contains unstructured information that is relevant to the invoice item
     * @param  null|string $contentCode __BT-X-9, From EXTENDED__ A code to classify the content of the free text of the invoice. The code is agreed bilaterally and must have the same meaning as BT-127.
     * @param  null|string $subjectCode __BT-X-10, From EXTENDED__ Code for qualifying the free text for the invoice item (Codelist UNTDID 4451)
     * @return static
     *
     * @phpstan-param-out string $content
     * @phpstan-param-out string $contentCode
     * @phpstan-param-out string $subjectCode
     */
    public function getDocumentPositionNote(
        ?string &$content,
        ?string &$contentCode,
        ?string &$subjectCode
    ): static {
        $this->documentReader->getDocumentPositionNote(
            $content,
            $contentCode,
            $subjectCode
        );

        return $this;
    }

    /**
     * Get information about the goods and services billed.
     *
     * @param  null|string $name             __BT-153, From BASIC__ A name of the item (item name)
     * @param  null|string $description      __BT-154, From EN 16931__ A description of the item, the item description makes it possible to describe the item and its properties in more detail than is possible with the item name
     * @param  null|string $sellerAssignedID __BT-155, From EN 16931__ An identifier assigned to the item by the seller
     * @param  null|string $buyerAssignedID  __BT-156, From EN 16931__ An identifier assigned to the item by the buyer. The article number of the buyer is a clear, bilaterally agreed identification of the product. It can, for example, be the customer article number or the article number assigned by the manufacturer.
     * @param  null|string $globalIDType     __BT-157-1, From BASIC__ The scheme for $globalID
     * @param  null|string $globalID         __BT-157, From BASIC__ Identification of an article according to the registered scheme (Global identifier of the product, GTIN, ...)
     * @return static
     *
     * @phpstan-param-out string $name
     * @phpstan-param-out string $description
     * @phpstan-param-out string $sellerAssignedID
     * @phpstan-param-out string $buyerAssignedID
     * @phpstan-param-out string $globalIDType
     * @phpstan-param-out string $globalID
     */
    public function getDocumentPositionProductDetails(
        ?string &$name,
        ?string &$description,
        ?string &$sellerAssignedID,
        ?string &$buyerAssignedID,
        ?string &$globalIDType,
        ?string &$globalID
    ): static {
        $this->documentReader->getDocumentPositionProductDetails(
            $newProductId,
            $name,
            $description,
            $sellerAssignedID,
            $buyerAssignedID,
            $globalID,
            $globalIDType,
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
     * Get information about the goods and services billed (Enhanced, with Model, Brand, etc.).
     *
     * @param  null|string $name               __BT-153, From BASIC__ A name of the item (item name)
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
     *
     * @phpstan-param-out string $name
     * @phpstan-param-out string $description
     * @phpstan-param-out string $sellerAssignedID
     * @phpstan-param-out string $buyerAssignedID
     * @phpstan-param-out string $globalIDType
     * @phpstan-param-out string $globalID
     * @phpstan-param-out string $industryAssignedID
     * @phpstan-param-out string $modelID
     * @phpstan-param-out string $batchID
     * @phpstan-param-out string $brandName
     * @phpstan-param-out string $modelName
     */
    public function getDocumentPositionProductDetailsExt(
        ?string &$name,
        ?string &$description,
        ?string &$sellerAssignedID,
        ?string &$buyerAssignedID,
        ?string &$globalIDType,
        ?string &$globalID,
        ?string &$industryAssignedID,
        ?string &$modelID,
        ?string &$batchID,
        ?string &$brandName,
        ?string &$modelName
    ): static {
        $this->documentReader->getDocumentPositionProductDetails(
            $newProductId,
            $name,
            $description,
            $sellerAssignedID,
            $buyerAssignedID,
            $globalID,
            $globalIDType,
            $industryAssignedID,
            $modelID,
            $batchID,
            $brandName,
            $modelName,
            $newProductOriginTradeCountry
        );

        return $this;
    }

    /**
     * Seek to the first document position's product characteristic. Returns true if the first position propduct characteristic is available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionProductCharacteristic.
     *
     * @return bool
     */
    public function firstDocumentPositionProductCharacteristic(): bool
    {
        return $this->documentReader->firstDocumentPositionProductCharacteristic();
    }

    /**
     * Seek to the next document position's product characteristic. Returns true if more position propduct characteristics are available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionProductCharacteristic.
     *
     * @return bool
     */
    public function nextDocumentPositionProductCharacteristic(): bool
    {
        return $this->documentReader->nextDocumentPositionProductCharacteristic();
    }

    /**
     * Get extra characteristics to the formerly added product. Contains information about the characteristics of the goods and services invoiced.
     *
     * @param  null|string $description          __BT-160, From EN 16931__ The name of the attribute or property of the product such as "Colour"
     * @param  null|string $value                __BT-161, From EN 16931__ The value of the attribute or property of the product such as "Red"
     * @param  null|string $typeCode             __BT-X-11, From EXTENDED__ Type of product characteristic (code). The codes must be taken from the UNTDID 6313 codelist.
     * @param  null|float  $valueMeasure         __BT-X-12, From EXTENDED__ Value of the product property (numerical measured variable)
     * @param  null|string $valueMeasureUnitCode __BT-X-12-0, From EXTENDED__ Unit of measurement code
     * @return static
     *
     * @phpstan-param-out string $description
     * @phpstan-param-out string $value
     * @phpstan-param-out string $typeCode
     * @phpstan-param-out float $valueMeasure
     * @phpstan-param-out string $valueMeasureUnitCode
     */
    public function getDocumentPositionProductCharacteristic(
        ?string &$description,
        ?string &$value,
        ?string &$typeCode,
        ?float &$valueMeasure,
        ?string &$valueMeasureUnitCode
    ): static {
        $this->documentReader->getDocumentPositionProductCharacteristic(
            $description,
            $value,
            $typeCode,
            $valueMeasure,
            $valueMeasureUnitCode
        );

        return $this;
    }

    /**
     * Seek to the first document position's product classification. Returns true if the first position propduct classification is available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionProductClassification.
     *
     * @return bool
     */
    public function firstDocumentPositionProductClassification(): bool
    {
        return $this->documentReader->firstDocumentPositionProductClassification();
    }

    /**
     * Seek to the next document position's product classification. Returns true if more position propduct classifications are available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionProductClassification.
     *
     * @return bool
     */
    public function nextDocumentPositionProductClassification(): bool
    {
        return $this->documentReader->nextDocumentPositionProductClassification();
    }

    /**
     * Get detailed information on product classification.
     *
     * @param  null|string $classCode     __BT-158, From EN 16931__ Item classification identifier. Classification codes are used for grouping similar items that can serve different purposes, such as public procurement (according to the Common Procurement Vocabulary ([CPV]), e-commerce (UNSPSC), etc.
     * @param  null|string $className     __BT-X-138, From EXTENDED__ Name with which an article can be classified according to type or quality
     * @param  null|string $listID        __BT-158-1, From EN 16931__ The identifier for the identification scheme of the item classification identifier. The identification scheme must be selected from the entries in UNTDID 7143 [6].
     * @param  null|string $listVersionID __BT-158-2, From EN 16931__ The version of the identification scheme
     * @return static
     *
     * @phpstan-param-out string $classCode
     * @phpstan-param-out string $className
     * @phpstan-param-out string $listID
     * @phpstan-param-out string $listVersionID
     */
    public function getDocumentPositionProductClassification(
        ?string &$classCode,
        ?string &$className,
        ?string &$listID,
        ?string &$listVersionID
    ): static {
        $this->documentReader->getDocumentPositionProductClassification(
            $classCode,
            $listID,
            $listVersionID,
            $className
        );

        return $this;
    }

    /**
     * Seek to the first document position's referenced product. Returns true if the first position referenced product is available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionReferencedProduct.
     *
     * @return bool
     */
    public function firstDocumentPositionReferencedProduct(): bool
    {
        return $this->documentReader->firstDocumentPositionReferencedProduct();
    }

    /**
     * Seek to the next document position's referenced product. Returns true if more position referenced products are available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionReferencedProduct.
     *
     * @return bool
     */
    public function nextDocumentPositionReferencedProduct(): bool
    {
        return $this->documentReader->nextDocumentPositionReferencedProduct();
    }

    /**
     * Get detailed information on included products. This information relates to the product that has just been added.
     *
     * @param  null|string               $name               __BT-X-18, From EXTENDED__ Name of the referenced product contained
     * @param  null|string               $description        __BT-X-19, From EXTENDED__ Description of the included referenced product
     * @param  null|string               $sellerAssignedID   __BT-X-16, From EXTENDED__ ID assigned by the seller of the contained referenced product
     * @param  null|string               $buyerAssignedID    __BT-X-17, From EXTENDED__ ID of the referenced product assigned by the buyer
     * @param  null|array<string,string> $globalID           __BT-X-15, From EXTENDED__ Array of global ids of the referenced product indexed by the identification scheme
     * @param  null|float                $unitQuantity       __BT-X-20, From EXTENDED__ Quantity of the referenced product contained
     * @param  null|string               $unitCode           __BT-X-20-1, From EXTENDED__ Unit code of Quantity of the referenced product contained
     * @param  null|string               $industryAssignedID __BT-X-309, From EXTENDED__ ID of the referenced product contained assigned by the industry
     * @return static
     *
     * @phpstan-param-out string $name
     * @phpstan-param-out string $description
     * @phpstan-param-out string $sellerAssignedID
     * @phpstan-param-out string $buyerAssignedID
     * @phpstan-param-out array<string,string> $globalID
     * @phpstan-param-out float $unitQuantity
     * @phpstan-param-out string $unitCode
     * @phpstan-param-out string $industryAssignedID
     */
    public function getDocumentPositionReferencedProduct(
        ?string &$name,
        ?string &$description,
        ?string &$sellerAssignedID,
        ?string &$buyerAssignedID,
        ?array &$globalID,
        ?float &$unitQuantity,
        ?string &$unitCode,
        ?string &$industryAssignedID
    ): static {
        $globalID = [];

        $this->documentReader->getDocumentPositionReferencedProduct(
            $newProductId,
            $name,
            $description,
            $sellerAssignedID,
            $buyerAssignedID,
            $newProductGlobalId,
            $newProductGlobalIdType,
            $industryAssignedID,
            $unitQuantity,
            $unitCode
        );

        InvoiceSuiteArrayUtils::pushStringToStringIndexedArray(
            $globalID,
            $newProductGlobalIdType,
            $newProductGlobalId
        );

        return $this;
    }

    /**
     * Sets the detailed information on the product origin.
     *
     * @param  null|string $country __BT-159, From EN 16931__ The code indicating the country the goods came from. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the representation of names of countries and their subdivisions”.
     * @return static
     *
     * @phpstan-param-out string $country
     */
    public function getDocumentPositionProductOriginTradeCountry(
        ?string &$country
    ): static {
        $this->documentReader->getDocumentPositionProductDetails(
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
            $country
        );

        return $this;
    }

    /**
     * Get details of a related sales order reference.
     *
     * @param  null|string            $issuerAssignedId __BT-X-537, From EXTENDED__ Document number of a sales order reference
     * @param  null|string            $lineId           __BT-X-538, From EXTENDED__ An identifier for a position within a sales order
     * @param  null|DateTimeInterface $issueDate        __BT-X-539, From EXTENDED__ Date of sales order
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out string $lineId
     * @phpstan-param-out DateTimeInterface|null $issueDate
     */
    public function getDocumentPositionSellerOrderReferencedDocument(
        ?string &$issuerAssignedId,
        ?string &$lineId,
        ?DateTimeInterface &$issueDate
    ): static {
        $issuerAssignedId = '';
        $lineId = '';
        $issueDate = null;

        if ($this->documentReader->firstDocumentPositionSellerOrderReference()) {
            $this->documentReader->getDocumentPositionSellerOrderReference(
                $issuerAssignedId,
                $lineId,
                $issueDate
            );
        }

        return $this;
    }

    /**
     * Get details of the related buyer order position.
     *
     * @param  null|string            $issuerAssignedId __BT-X-21, From EXTENDED__ An identifier issued by the buyer for a referenced order (order number)
     * @param  null|string            $lineId           __BT-132, From EN 16931__ An identifier for a position within an order placed by the buyer. Note: Reference is made to the order reference at the document level.
     * @param  null|DateTimeInterface $issueDate        __BT-X-22, From EXTENDED__ Date of order
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out string $lineId
     * @phpstan-param-out DateTimeInterface|null $issueDate
     */
    public function getDocumentPositionBuyerOrderReferencedDocument(
        ?string &$issuerAssignedId,
        ?string &$lineId,
        ?DateTimeInterface &$issueDate
    ): static {
        $issuerAssignedId = '';
        $lineId = '';
        $issueDate = null;

        if ($this->documentReader->firstDocumentPositionBuyerOrderReference()) {
            $this->documentReader->getDocumentPositionBuyerOrderReference(
                $issuerAssignedId,
                $lineId,
                $issueDate
            );
        }

        return $this;
    }

    /**
     * Get details of the associated offer position.
     *
     * @param  null|string            $issuerAssignedId __BT-X-310, From EXTENDED__ Offer number
     * @param  null|string            $lineId           __BT-X-311, From EXTENDED__ Position identifier within the offer
     * @param  null|DateTimeInterface $issueDate        __BT-X-312, From EXTENDED__ Date of offder
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out string $lineId
     * @phpstan-param-out DateTimeInterface|null $issueDate
     */
    public function getDocumentPositionQuotationReferencedDocument(
        ?string &$issuerAssignedId,
        ?string &$lineId,
        ?DateTimeInterface &$issueDate
    ): static {
        $issuerAssignedId = '';
        $lineId = '';
        $issueDate = null;

        if ($this->documentReader->firstDocumentPositionQuotationReference()) {
            $this->documentReader->getDocumentPositionQuotationReference(
                $issuerAssignedId,
                $lineId,
                $issueDate
            );
        }

        return $this;
    }

    /**
     * Get details of the related contract position.
     *
     * @param  null|string            $issuerAssignedId __BT-X-24, From EXTENDED__ The contract reference should be assigned once in the context of the specific trade relationship and for a defined period of time (contract number)
     * @param  null|string            $lineId           __BT-X-25, From EXTENDED__ Identifier of the according contract position
     * @param  null|DateTimeInterface $issueDate        __BT-X-26, From EXTENDED__ Contract date
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out string $lineId
     * @phpstan-param-out DateTimeInterface|null $issueDate
     */
    public function getDocumentPositionContractReferencedDocument(
        ?string &$issuerAssignedId,
        ?string &$lineId,
        ?DateTimeInterface &$issueDate
    ): static {
        $issuerAssignedId = '';
        $lineId = '';
        $issueDate = null;

        if ($this->documentReader->firstDocumentPositionContractReference()) {
            $this->documentReader->getDocumentPositionContractReference(
                $issuerAssignedId,
                $lineId,
                $issueDate
            );
        }

        return $this;
    }

    /**
     * Seek to the first documents position additional referenced document. Returns true if the first position is available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionAdditionalReferencedDocument.
     *
     * @return bool
     */
    public function firstDocumentPositionAdditionalReferencedDocument(): bool
    {
        return $this->documentReader->firstDocumentPositionAdditionalReference();
    }

    /**
     * Seek to the next documents position additional referenced document. Returns true if the first position is available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionAdditionalReferencedDocument.
     *
     * @return bool
     */
    public function nextDocumentPositionAdditionalReferencedDocument(): bool
    {
        return $this->documentReader->nextDocumentPositionAdditionalReference();
    }

    /**
     * Details of an additional Document reference (on position level).
     *
     * @param  null|string            $issuerAssignedId   __BT-X-27, From EXTENDED__ The identifier of the tender or lot to which the invoice relates, or an identifier specified by the seller for an object on which the invoice is based, or an identifier of the document on which the invoice is based
     * @param  null|string            $typeCode           __BT-X-30, From EXTENDED__ Type of referenced document (See codelist UNTDID 1001)
     * @param  null|string            $uriId              __BT-X-28, From EXTENDED__ The Uniform Resource Locator (URL) at which the external document is available. A means of finding the resource including the primary access method intended for it, e.g. http: // or ftp: //. The location of the external document must be used if the buyer needs additional information to support the amounts billed. External documents are not part of the invoice. Access to external documents can involve certain risks.
     * @param  null|string            $lineId             __BT-X-29, From EXTENDED__ The referenced position identifier in the additional document
     * @param  null|array<int,string> $name               __BT-X-299, From EXTENDED__ A description of the document, e.g. Hourly billing, usage or consumption report, etc.
     * @param  null|string            $refTypeCode        __BT-X-32, From EXTENDED__ The identifier for the identification scheme of the identifier of the item invoiced. If it is not clear to the recipient which scheme is used for the identifier, an identifier of the scheme should be used, which must be selected from UNTDID 1153 in accordance with the code list entries.
     * @param  null|DateTimeInterface $issueDate          __BT-X-33, From EXTENDED__ Document date
     * @param  null|string            $binaryDataFilename __BT-X-31, From EXTENDED__ Contains a file name of an attachment document embedded as a binary object
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out string $typeCode
     * @phpstan-param-out string $uriId
     * @phpstan-param-out string $lineId
     * @phpstan-param-out array<int,string> $name
     * @phpstan-param-out string $refTypeCode
     * @phpstan-param-out null|DateTimeInterface $issueDate
     * @phpstan-param-out string $binaryDataFilename
     */
    public function getDocumentPositionAdditionalReferencedDocument(
        ?string &$issuerAssignedId,
        ?string &$typeCode,
        ?string &$uriId,
        ?string &$lineId,
        ?array &$name,
        ?string &$refTypeCode,
        ?DateTimeInterface &$issueDate,
        ?string &$binaryDataFilename
    ): static {
        $name = [];

        $this->documentReader->getDocumentPositionAdditionalReference(
            $issuerAssignedId,
            $lineId,
            $issueDate,
            $typeCode,
            $refTypeCode,
            $newDescription,
            $newInvoiceSuiteAttachment
        );

        InvoiceSuiteArrayUtils::pushStringToIntIndexedArray($name, $newDescription);

        $this->internalHandleInvoiceSuiteAttachment(
            $newInvoiceSuiteAttachment,
            $uriId,
            $binaryDataFilename
        );

        return $this;
    }

    /**
     * Get the unit price excluding sales tax before deduction of the discount on the item price.
     *
     * @param  null|float  $amount                __BT-148, From BASIC__ The unit price excluding sales tax before deduction of the discount on the item price. If the price is shown according to the net calculation, the price must also be shown according to the gross calculation.
     * @param  null|float  $basisQuantity         __BT-149-1, From BASIC__ The number of item units for which the price applies (price base quantity)
     * @param  null|string $basisQuantityUnitCode __BT-150-1, From BASIC__ The unit code of the number of item units for which the price applies (price base quantity)
     * @return static
     *
     * @phpstan-param-out float $amount
     * @phpstan-param-out float $basisQuantity
     * @phpstan-param-out string $basisQuantityUnitCode
     */
    public function getDocumentPositionGrossPrice(
        ?float &$amount,
        ?float &$basisQuantity,
        ?string &$basisQuantityUnitCode
    ): static {
        $this->documentReader->getDocumentPositionGrossPrice(
            $amount,
            $basisQuantity,
            $basisQuantityUnitCode
        );

        return $this;
    }

    /**
     * Seek to the first documents position gross price allowance charge position. Returns true if the first position is available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionGrossPriceAllowanceCharge.
     *
     * @return bool
     */
    public function firstDocumentPositionGrossPriceAllowanceCharge(): bool
    {
        return $this->documentReader->firstDocumentPositionGrossPriceAllowanceCharge();
    }

    /**
     * Seek to the next documents position gross price allowance charge position. Returns true if a other position is available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionGrossPriceAllowanceCharge.
     *
     * @return bool
     */
    public function nextDocumentPositionGrossPriceAllowanceCharge(): bool
    {
        return $this->documentReader->nextDocumentPositionGrossPriceAllowanceCharge();
    }

    /**
     * Get Detailed information on surcharges and discounts on item gross price.
     *
     * @param  null|float  $actualAmount          __BT-147, From BASIC__ Discount on the item price. The total discount subtracted from the gross price to calculate the net price. Note: Only applies if the discount is given per unit and is not included in the gross price.
     * @param  null|bool   $isCharge              __BT-147-02, From BASIC__ Switch for surcharge/discount, if true then its an charge
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
     *
     * @phpstan-param-out float $actualAmount
     * @phpstan-param-out bool $isCharge
     * @phpstan-param-out float $calculationPercent
     * @phpstan-param-out float $basisAmount
     * @phpstan-param-out string $reason
     * @phpstan-param-out string $taxTypeCode
     * @phpstan-param-out string $taxCategoryCode
     * @phpstan-param-out float $rateApplicablePercent
     * @phpstan-param-out float $sequence
     * @phpstan-param-out float $basisQuantity
     * @phpstan-param-out string $basisQuantityUnitCode
     * @phpstan-param-out string $reasonCode
     */
    public function getDocumentPositionGrossPriceAllowanceCharge(
        ?float &$actualAmount,
        ?bool &$isCharge,
        ?float &$calculationPercent,
        ?float &$basisAmount,
        ?string &$reason,
        ?string &$taxTypeCode,
        ?string &$taxCategoryCode,
        ?float &$rateApplicablePercent,
        ?float &$sequence,
        ?float &$basisQuantity,
        ?string &$basisQuantityUnitCode,
        ?string &$reasonCode
    ): static {
        $taxTypeCode = '';
        $taxCategoryCode = '';
        $rateApplicablePercent = 0.0;
        $sequence = 0.0;
        $basisQuantity = 0.0;
        $basisQuantityUnitCode = '';

        $this->documentReader->getDocumentPositionGrossPriceAllowanceCharge(
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
     * Get detailed information on the net price of the item.
     *
     * @param  null|float  $amount                __BT-146, From BASIC__ Net price of the item
     * @param  null|float  $basisQuantity         __BT-149, From BASIC__ Base quantity at the item price
     * @param  null|string $basisQuantityUnitCode __BT-150, From BASIC__ Code of the unit of measurement of the base quantity at the item price
     * @return static
     *
     * @phpstan-param-out float $amount
     * @phpstan-param-out float $basisQuantity
     * @phpstan-param-out string $basisQuantityUnitCode
     */
    public function getDocumentPositionNetPrice(
        ?float &$amount,
        ?float &$basisQuantity,
        ?string &$basisQuantityUnitCode
    ): static {
        $this->documentReader->getDocumentPositionNetPrice(
            $amount,
            $basisQuantity,
            $basisQuantityUnitCode
        );

        return $this;
    }

    /**
     * Tax included for B2C on position level.
     *
     * @param  null|string $categoryCode          __BT-, From __ Coded description of a sales tax category
     * @param  null|string $typeCode              __BT-, From __ Coded description of a sales tax category. Note: Fixed value = "VAT"
     * @param  null|float  $rateApplicablePercent __BT-, From __ The sales tax rate, expressed as the percentage applicable to the sales tax category in question. Note: The code of the sales tax category and the category-specific sales tax rate must correspond to one another. The value to be given is the percentage. For example, the value 20 is given for 20% (and not 0.2)
     * @param  null|float  $calculatedAmount      __BT-, From __ The total amount to be paid for the relevant VAT category. Note: Calculated by multiplying the amount to be taxed according to the sales tax category by the sales tax rate applicable for the sales tax category concerned
     * @param  null|string $exemptionReason       __BT-, From __ Reason for tax exemption (free text)
     * @param  null|string $exemptionReasonCode   __BT-, From __ Reason given in code form for the exemption of the amount from VAT. Note: Code list issued and maintained by the Connecting Europe Facility.
     * @return static
     *
     * @phpstan-param-out string $categoryCode
     * @phpstan-param-out string $typeCode
     * @phpstan-param-out float $rateApplicablePercent
     * @phpstan-param-out float $calculatedAmount
     * @phpstan-param-out string $exemptionReason
     * @phpstan-param-out string $exemptionReasonCode
     */
    public function getDocumentPositionNetPriceTax(
        ?string &$categoryCode,
        ?string &$typeCode,
        ?float &$rateApplicablePercent,
        ?float &$calculatedAmount,
        ?string &$exemptionReason,
        ?string &$exemptionReasonCode
    ): static {
        $this->documentReader->getDocumentPositionNetPriceTax(
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
     * Get the position Quantity.
     *
     * @param  null|float  $billedQuantity             __BT-129, From BASIC__ The quantity of individual items (goods or services) billed in the relevant line
     * @param  null|string $billedQuantityUnitCode     __BT-130, From BASIC__ The unit of measure applicable to the amount billed
     * @param  null|float  $chargeFreeQuantity         __BT-X-46, From EXTENDED__ Quantity, free of charge
     * @param  null|string $chargeFreeQuantityUnitCpde __BT-X-46-0, From EXTENDED__ Unit of measure code for the quantity free of charge
     * @param  null|float  $packageQuantity            __BT-X-47, From EXTENDED__ Number of packages
     * @param  null|string $packageQuantityUnitCode    __BT-X-47-0, From EXTENDED__ Unit of measure code for number of packages
     * @return static
     *
     * @phpstan-param-out float $billedQuantity
     * @phpstan-param-out string $billedQuantityUnitCode
     * @phpstan-param-out float $chargeFreeQuantity
     * @phpstan-param-out string $chargeFreeQuantityUnitCpde
     * @phpstan-param-out float $packageQuantity
     * @phpstan-param-out string $packageQuantityUnitCode
     */
    public function getDocumentPositionQuantity(
        ?float &$billedQuantity,
        ?string &$billedQuantityUnitCode,
        ?float &$chargeFreeQuantity,
        ?string &$chargeFreeQuantityUnitCpde,
        ?float &$packageQuantity,
        ?string &$packageQuantityUnitCode
    ): static {
        $this->documentReader->getDocumentPositionQuantities(
            $billedQuantity,
            $billedQuantityUnitCode,
            $chargeFreeQuantity,
            $chargeFreeQuantityUnitCpde,
            $packageQuantity,
            $packageQuantityUnitCode,
            $newPerPackageUnitQuantity,
            $newPerPackageUnitQuantityUnit
        );

        return $this;
    }

    /**
     * Get detailed information on the actual delivery (on position level).
     *
     * @param  null|DateTimeInterface $date __BT-X-85, From EXTENDED__ Actual delivery date
     * @return static
     *
     * @phpstan-param-out null|DateTimeInterface $date
     */
    public function getDocumentPositionSupplyChainEvent(
        ?DateTimeInterface &$date
    ): static {
        $this->documentReader->getDocumentPositionSupplyChainEvent(
            $date
        );

        return $this;
    }

    /**
     * Get detailed information on the associated shipping notification (on position level).
     *
     * @param  null|string            $issuerAssignedId __BT-X-86, From EXTENDED__ Shipping notification number
     * @param  null|string            $lineId           __BT-X-87, From EXTENDED__ Shipping notification position
     * @param  null|DateTimeInterface $issueDate        __BT-X-88, From EXTENDED__ Date of Shipping notification number
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out string $lineId
     * @phpstan-param-out DateTimeInterface|null $issueDate
     */
    public function getDocumentPositionDespatchAdviceReferencedDocument(
        ?string &$issuerAssignedId,
        ?string &$lineId,
        ?DateTimeInterface &$issueDate
    ): static {
        $issuerAssignedId = '';
        $lineId = '';
        $issueDate = null;

        if ($this->documentReader->firstDocumentPositionDespatchAdviceReference()) {
            $this->documentReader->getDocumentPositionDespatchAdviceReference(
                $issuerAssignedId,
                $lineId,
                $issueDate
            );
        }

        return $this;
    }

    /**
     * Detailed information on the associated shipping notification (on position level).
     *
     * @param  null|string            $issuerAssignedId __BT-X-89, From EXTENDED__ Goods receipt number
     * @param  null|string            $lineId           __BT-X-90, From EXTENDED__ Goods receipt position
     * @param  null|DateTimeInterface $issueDate        __BT-X-91, From EXTENDED__ Date of Goods receipt
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out string $lineId
     * @phpstan-param-out DateTimeInterface|null $issueDate
     */
    public function getDocumentPositionReceivingAdviceReferencedDocument(
        ?string &$issuerAssignedId,
        ?string &$lineId,
        ?DateTimeInterface &$issueDate
    ): static {
        $issuerAssignedId = '';
        $lineId = '';
        $issueDate = null;

        if ($this->documentReader->firstDocumentPositionReceivingAdviceReference()) {
            $this->documentReader->getDocumentPositionReceivingAdviceReference(
                $issuerAssignedId,
                $lineId,
                $issueDate
            );
        }

        return $this;
    }

    /**
     * Detailed information on the associated delivery note on position level.
     *
     * @param  null|string            $issuerAssignedId __BT-X-92, From EXTENDED__ Delivery note number
     * @param  null|string            $lineId           __BT-X-93, From EXTENDED__ Delivery note position
     * @param  null|DateTimeInterface $issueDate        __BT-X-94, From EXTENDED__ Date of Delivery note
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out string $lineId
     * @phpstan-param-out DateTimeInterface|null $issueDate
     */
    public function getDocumentPositionDeliveryNoteReferencedDocument(
        ?string &$issuerAssignedId,
        ?string &$lineId,
        ?DateTimeInterface &$issueDate
    ): static {
        $issuerAssignedId = '';
        $lineId = '';
        $issueDate = null;

        if ($this->documentReader->firstDocumentPositionDeliveryNoteReference()) {
            $this->documentReader->getDocumentPositionDeliveryNoteReference(
                $issuerAssignedId,
                $lineId,
                $issueDate
            );
        }

        return $this;
    }

    /**
     * Seek to the first document position tax. Returns true if the first tax position is available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionTax.
     *
     * @return bool
     */
    public function firstDocumentPositionTax(): bool
    {
        return $this->documentReader->firstDocumentPositionTax();
    }

    /**
     * Seek to the next document position tax. Returns true if another tax position is available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionTax.
     *
     * @return bool
     */
    public function nextDocumentPositionTax(): bool
    {
        return $this->documentReader->nextDocumentPositionTax();
    }

    /**
     * Get information about the sales tax that applies to the goods and services invoiced in the relevant invoice line.
     *
     * @param  null|string $categoryCode          __BT-151, From BASIC__ Coded description of a sales tax category
     * @param  null|string $typeCode              __BT-151-0, From BASIC__ In EN 16931 only the tax type “sales tax” with the code “VAT” is supported. Should other types of tax be specified, such as an insurance tax or a mineral oil tax the EXTENDED profile must be used. The code for the tax type must then be taken from the code list UNTDID 5153.
     * @param  null|float  $rateApplicablePercent __BT-152, From BASIC__ The VAT rate applicable to the item invoiced and expressed as a percentage. Note: The code of the sales tax category and the category-specific sales tax rate  must correspond to one another. The value to be given is the percentage. For example, the value 20 is given for 20% (and not 0.2)
     * @param  null|float  $calculatedAmount      __BT-, From __ Tax amount. Information only for taxes that are not VAT (Obsolete)
     * @param  null|string $exemptionReason       __BT-, From __ Reason for tax exemption (free text) (Obsolete)
     * @param  null|string $exemptionReasonCode   __BT-, From __ Reason given in code form for the exemption of the amount from VAT. Note: Code list issued and maintained by the Connecting Europe Facility. (Obsolete)
     * @return static
     *
     * @phpstan-param-out string $categoryCode
     * @phpstan-param-out string $typeCode
     * @phpstan-param-out float $rateApplicablePercent
     * @phpstan-param-out float $calculatedAmount
     * @phpstan-param-out string $exemptionReason
     * @phpstan-param-out string $exemptionReasonCode
     */
    public function getDocumentPositionTax(
        ?string &$categoryCode,
        ?string &$typeCode,
        ?float &$rateApplicablePercent,
        ?float &$calculatedAmount,
        ?string &$exemptionReason,
        ?string &$exemptionReasonCode
    ): static {
        $this->documentReader->getDocumentPositionTax(
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
     * Get information about the period relevant for the invoice item. Also known as the invoice line delivery period.
     *
     * @param  null|DateTimeInterface $startDate __BT-134, From BASIC__ Start of the billing period
     * @param  null|DateTimeInterface $endDate   __BT-135, From BASIC__ End of the billing period
     * @return static
     *
     * @phpstan-param-out DateTimeInterface|null $startDate
     * @phpstan-param-out DateTimeInterface|null $endDate
     */
    public function getDocumentPositionBillingPeriod(
        ?DateTimeInterface &$startDate,
        ?DateTimeInterface &$endDate
    ): static {
        $startDate = null;
        $endDate = null;

        if ($this->documentReader->firstDocumentPositionBillingPeriod()) {
            $this->documentReader->getDocumentPositionBillingPeriod(
                $startDate,
                $endDate,
                $newDescription
            );
        }

        return $this;
    }

    /**
     * Seek to the first allowance charge (on position level). Returns true if the first position is available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionAllowanceCharge.
     *
     * @return bool
     */
    public function firstDocumentPositionAllowanceCharge(): bool
    {
        return $this->documentReader->firstDocumentPositionAllowanceCharge();
    }

    /**
     * Seek to the next allowance charge (on position level). Returns true if another position is available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionAllowanceCharge.
     *
     * @return bool
     */
    public function nextDocumentPositionAllowanceCharge(): bool
    {
        return $this->documentReader->nextDocumentPositionAllowanceCharge();
    }

    /**
     * Detailed information on currentley seeked surcharges and discounts on position level.
     *
     * @param  null|float  $actualAmount          __BT-136/BT-141, From BASIC__ The surcharge/discount amount excluding sales tax
     * @param  null|bool   $isCharge              __BT-27-1/BT-28-1, From BASIC__ (true for BT-/ and false for /BT-) Switch that indicates whether the following data refer to an allowance or a discount, true means that it is a surcharge
     * @param  null|float  $calculationPercent    __BT-138, From EN 16931__ The percentage that may be used in conjunction with the base invoice line discount amount to calculate the invoice line discount amount
     * @param  null|float  $basisAmount           __BT-137, From EN 16931__ The base amount that may be used in conjunction with the invoice line discount percentage to calculate the invoice line discount amount
     * @param  null|string $reason                __BT-139/BT-144, From BASIC__ The reason given in text form for the invoice item discount/surcharge
     * @param  null|string $taxTypeCode
     * @param  null|string $taxCategoryCode
     * @param  null|float  $rateApplicablePercent
     * @param  null|float  $sequence
     * @param  null|float  $basisQuantity
     * @param  null|string $basisQuantityUnitCode
     * @param  null|string $reasonCode            __BT-140/BT-145, From BASIC__ The reason given as a code for the invoice line discount
     * @return static
     *
     * @phpstan-param-out float $actualAmount
     * @phpstan-param-out bool $isCharge
     * @phpstan-param-out float $calculationPercent
     * @phpstan-param-out float $basisAmount
     * @phpstan-param-out string $reason
     * @phpstan-param-out string $taxTypeCode
     * @phpstan-param-out string $taxCategoryCode
     * @phpstan-param-out float $rateApplicablePercent
     * @phpstan-param-out float $sequence
     * @phpstan-param-out float $basisQuantity
     * @phpstan-param-out string $basisQuantityUnitCode
     * @phpstan-param-out string $reasonCode
     */
    public function getDocumentPositionAllowanceCharge(
        ?float &$actualAmount,
        ?bool &$isCharge,
        ?float &$calculationPercent,
        ?float &$basisAmount,
        ?string &$reason,
        ?string &$taxTypeCode,
        ?string &$taxCategoryCode,
        ?float &$rateApplicablePercent,
        ?float &$sequence,
        ?float &$basisQuantity,
        ?string &$basisQuantityUnitCode,
        ?string &$reasonCode
    ): static {
        $taxTypeCode = '';
        $taxCategoryCode = '';
        $rateApplicablePercent = 0.0;
        $sequence = 0.0;
        $basisQuantity = 0.0;
        $basisQuantityUnitCode = '';

        $this->documentReader->getDocumentPositionAllowanceCharge(
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
     * Detailed information on surcharges and discounts on position level (on a simple way).
     * This is the simplified version of ZugferdDocumentReader::getDocumentPositionAllowanceCharge.
     *
     * @param  null|float  $actualAmount       __BT-136/BT-141, From BASIC__ The surcharge/discount amount excluding sales tax
     * @param  null|bool   $isCharge           __BT-27-1/BT-28-1, From BASIC__ (true for BT-/ and false for /BT-) Switch that indicates whether the following data refer to an allowance or a discount, true means that it is a surcharge
     * @param  null|float  $calculationPercent __BT-138, From EN 16931__ The percentage that may be used in conjunction with the base invoice line discount amount to calculate the invoice line discount amount
     * @param  null|float  $basisAmount        __BT-137, From EN 16931__ The base amount that may be used in conjunction with the invoice line discount percentage to calculate the invoice line discount amount
     * @param  null|string $reasonCode         __BT-140/BT-145, From BASIC__ The reason given as a code for the invoice line discount
     * @param  null|string $reason             __BT-139/BT-144, From BASIC__ The reason given in text form for the invoice item discount/surcharge
     * @return static
     *
     * @phpstan-param-out float $actualAmount
     * @phpstan-param-out bool $isCharge
     * @phpstan-param-out float $calculationPercent
     * @phpstan-param-out float $basisAmount
     * @phpstan-param-out string $reasonCode
     * @phpstan-param-out string $reason
     */
    public function getDocumentPositionAllowanceCharge2(
        ?float &$actualAmount,
        ?bool &$isCharge,
        ?float &$calculationPercent,
        ?float &$basisAmount,
        ?string &$reasonCode,
        ?string &$reason
    ): static {
        $this->documentReader->getDocumentPositionAllowanceCharge(
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
     * Get detailed information on item totals.
     *
     * @param  null|float $lineTotalAmount            __BT-131, From BASIC__ The total amount of the invoice item
     * @param  null|float $totalAllowanceChargeAmount __BT-, From __ Total amount of item surcharges and discounts
     * @return static
     *
     * @phpstan-param-out float $lineTotalAmount
     * @phpstan-param-out float $totalAllowanceChargeAmount
     */
    public function getDocumentPositionLineSummation(
        ?float &$lineTotalAmount,
        ?float &$totalAllowanceChargeAmount
    ): static {
        $totalAllowanceChargeAmount = 0.0;

        $this->documentReader->getDocumentPositionSummation(
            $lineTotalAmount,
            $newChargeTotalAmount,
            $newDiscountTotalAmount,
            $newTaxTotalAmount,
            $newGrossAmount
        );

        return $this;
    }

    /**
     * Get detailed information on item totals.
     *
     * @param  null|float $lineTotalAmount __BT-131, From BASIC__ The total amount of the invoice item
     * @return static
     *
     * @phpstan-param-out float $lineTotalAmount
     */
    public function getDocumentPositionLineSummationSimple(
        ?float &$lineTotalAmount
    ): static {
        $this->documentReader->getDocumentPositionSummation(
            $lineTotalAmount,
            $newChargeTotalAmount,
            $newDiscountTotalAmount,
            $newTaxTotalAmount,
            $newGrossAmount
        );

        return $this;
    }

    /**
     * Get detailed information on item totals (with support for EXTENDED profile).
     *
     * @param  null|float $lineTotalAmount            __BT-131, From BASIC__ The total amount of the invoice item
     * @param  null|float $chargeTotalAmount          __BT-X-327, From EXTENDED__ Total amount of item surcharges
     * @param  null|float $allowanceTotalAmount       __BT-X-328, From EXTENDED__ Total amount of item discounts
     * @param  null|float $taxTotalAmount             __BT-X-329, From EXTENDED__ Total amount of item taxes
     * @param  null|float $grandTotalAmount           __BT-X-330, From EXTENDED__ Total gross amount of the item
     * @param  null|float $totalAllowanceChargeAmount __BT-X-98, From EXTENDED__ Total amount of item surcharges and discounts
     * @return static
     *
     * @phpstan-param-out float $lineTotalAmount
     * @phpstan-param-out float $chargeTotalAmount
     * @phpstan-param-out float $allowanceTotalAmount
     * @phpstan-param-out float $taxTotalAmount
     * @phpstan-param-out float $grandTotalAmount
     * @phpstan-param-out float $totalAllowanceChargeAmount
     */
    public function getDocumentPositionLineSummationExt(
        ?float &$lineTotalAmount,
        ?float &$chargeTotalAmount,
        ?float &$allowanceTotalAmount,
        ?float &$taxTotalAmount,
        ?float &$grandTotalAmount,
        ?float &$totalAllowanceChargeAmount
    ): static {
        $totalAllowanceChargeAmount = 0.0;

        $this->documentReader->getDocumentPositionSummation(
            $lineTotalAmount,
            $chargeTotalAmount,
            $allowanceTotalAmount,
            $taxTotalAmount,
            $grandTotalAmount
        );

        return $this;
    }

    /**
     * Get a Reference to the previous invoice (on position level).
     *
     * @param  null|string            $issuerAssignedId __BT-X-331, From EXTENDED__ The identification of an invoice previously sent by the seller
     * @param  null|string            $lineid           __BT-X-540, From EXTENDED__ Identification of the invoice item
     * @param  null|string            $typeCode         __BT-X-332, From EXTENDED__ Type of previous invoice (code)
     * @param  null|DateTimeInterface $issueDate        __BT-X-333, From EXTENDED__ Date of the previous invoice
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out string $lineid
     * @phpstan-param-out string $typeCode
     * @phpstan-param-out DateTimeInterface|null $issueDate
     */
    public function getDocumentPositionInvoiceReferencedDocument(
        ?string &$issuerAssignedId,
        ?string &$lineid,
        ?string &$typeCode,
        ?DateTimeInterface &$issueDate
    ): static {
        $issuerAssignedId = '';
        $lineid = '';
        $issueDate = null;
        $typeCode = '';

        if ($this->documentReader->firstDocumentPositionInvoiceReference()) {
            $this->documentReader->getDocumentPositionInvoiceReference(
                $issuerAssignedId,
                $lineid,
                $issueDate,
                $typeCode
            );
        }

        return $this;
    }

    /**
     * Seek to the first documents position additional referenced document (Object detection at the level of the accounting position). Returns true if the first position is available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionAdditionalReferencedObjDocument.
     *
     * @return bool
     */
    public function firstDocumentPositionAdditionalReferencedObjDocument(): bool
    {
        return $this->documentReader->firstDocumentPositionAdditionalObjectReference();
    }

    /**
     * Seek to the next documents position additional referenced document (Object detection at the level of the accounting position). Returns true if the first position is available, otherwise false.
     * You may use it together with ZugferdDocumentReader::getDocumentPositionAdditionalReferencedObjDocument.
     *
     * @return bool
     */
    public function nextDocumentPositionAdditionalReferencedObjDocument(): bool
    {
        return $this->documentReader->nextDocumentPositionAdditionalObjectReference();
    }

    /**
     * Get additional Document reference on a position (Object detection).
     *
     * @param  null|string $issuerAssignedId __BT-128, From EN 16931__ The identifier of the tender or lot to which the invoice relates, or an identifier specified by the seller for an object on which the invoice is based, or an identifier of the document on which the invoice is based
     * @param  null|string $typeCode         __BT-128-0, From EN 16931__ Type of referenced document (See codelist UNTDID 1001)
     * @param  null|string $refTypeCode      __BT-128-1, From EN 16931__ The identifier for the identification scheme of the identifier of the item invoiced. If it is not clear to the recipient which scheme is used for the identifier, an identifier of the scheme should be used, which must be selected from UNTDID 1153 in accordance with the code list entries.
     * @return static
     *
     * @phpstan-param-out string $issuerAssignedId
     * @phpstan-param-out string $typeCode
     * @phpstan-param-out string $refTypeCode
     */
    public function getDocumentPositionAdditionalReferencedObjDocument(
        ?string &$issuerAssignedId,
        ?string &$typeCode,
        ?string &$refTypeCode
    ): static {
        $this->documentReader->getDocumentPositionAdditionalObjectReference(
            $issuerAssignedId,
            $typeCode,
            $refTypeCode
        );

        return $this;
    }

    /**
     * Get information on the booking reference (on position level).
     *
     * @param  null|string &$id       __BT-133, From EN 16931__ Posting reference of the byuer. If required, this reference shall be provided by the Buyer to the Seller prior to the issuing of the Invoice.
     * @param  null|string &$typeCode __BT-X-99, From EXTENDED__ Type of the posting reference
     * @return static
     *
     * @phpstan-param-out string $id
     * @phpstan-param-out string $typeCode
     */
    public function getDocumentPositionReceivableSpecifiedTradeAccountingAccount(
        ?string &$id,
        ?string &$typeCode
    ): static {
        $this->documentReader->getDocumentPositionPostingReference(
            $typeCode,
            $id
        );

        return $this;
    }

    /**
     * Handle an attachment. Save binaries to binarydatadirectory or return an URI
     *
     * @param  null|string $uriId
     * @param  null|string $binaryDataFilename
     * @return static
     *
     * @phpstan-param-out string $uriId
     * @phpstan-param-out string $binaryDataFilename
     */
    private function internalHandleInvoiceSuiteAttachment(
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment,
        ?string &$uriId,
        ?string &$binaryDataFilename
    ): static {
        $binaryDataFilename = '';
        $uriId = '';

        if (is_null($newInvoiceSuiteAttachment)) {
            return $this;
        }

        if ($newInvoiceSuiteAttachment->isBinaryAttachment()) {
            // @phpstan-ignore paramOut.type
            $binaryDataFilename = $newInvoiceSuiteAttachment->getFilename();
            $binarydata = $newInvoiceSuiteAttachment->getRawContent();

            if (
                !InvoiceSuiteStringUtils::stringIsNullOrEmpty($binaryDataFilename)
                && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($binarydata)
                && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->binarydatadirectory)
            ) {
                $binaryDataFilename = InvoiceSuitePathUtils::combinePathWithFile($this->binarydatadirectory, $binaryDataFilename);
                file_put_contents($binaryDataFilename, $binarydata);
            }
        }

        if ($newInvoiceSuiteAttachment->isUrlAttachment()) {
            $uriId = $newInvoiceSuiteAttachment->getRawContent();
        }

        return $this;
    }
}
