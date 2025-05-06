<?php

namespace horstoeko\invoicesuite;

use DateTimeInterface;
use JMS\Serializer\Exception\RuntimeException;
use JMS\Serializer\Exception\InvalidArgumentException;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\concerns\HandlesCallForwarding;
use horstoeko\invoicesuite\concerns\HandlesFormatProviders;
use horstoeko\invoicesuite\concerns\HandlesCurrentFormatProvider;
use horstoeko\invoicesuite\contracts\InvoiceSuiteBuilderContract;
use horstoeko\invoicesuite\exceptions\InvoiceSuiteFormatProviderNotFoundException;

/**
 * Class representing the document builder
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteDocumentBuilder implements InvoiceSuiteBuilderContract
{
    use HandlesCallForwarding;
    use HandlesCurrentFormatProvider;
    use HandlesFormatProviders;

    #region Common

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
        $this->resolveAvailableFormatProviders();
        $this->setCurrentFormatProvider($this->findFormatProviderByUniqueIdOrFail($formatProviderUniqueId));
        $this->getCurrentFormatProvider()->initBuilder();
    }

    /**
     * Dynamically pass missing methods to the builder provided by format provider
     *
     * @param  string       $method
     * @param  array<mixed> $parameters
     * @return mixed
     */
    public function __call(
        $method,
        $parameters
    ) {
        return $this->forwardCallWithCheckTo($this->getCurrentFormatProvider()->getBuilder(), $method, $parameters);
    }

    /**
     * Get the content as XML string
     *
     * @return string
     */
    public function getContentAsXml(): string
    {
        return $this->getCurrentFormatProvider()->getBuilder()->getContentAsXml();
    }

    /**
     * Get the content as JSON string
     *
     * @return string
     */
    public function getContentAsJson(): string
    {
        return $this->getCurrentFormatProvider()->getBuilder()->getContentAsJson();
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
        $this->getCurrentFormatProvider()->getBuilder()->saveAsXmlFile($tofile);
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
        $this->getCurrentFormatProvider()->getBuilder()->saveAsJsonFile($tofile);
    }

    #endregion

    #region Document Generals

    /**
     * @inheritDoc
     */
    public function setDocumentNo(
        string $newDocumentNo
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentNo($newDocumentNo);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentType(
        string $newDocumentType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentType($newDocumentType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentDescription(
        string $newDocumentDescription
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentDescription($newDocumentDescription);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentLanguage(
        string $newDocumentLanguage
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentLanguage($newDocumentLanguage);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentDate(
        DateTimeInterface $newDocumentDate
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentDate($newDocumentDate);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentCompleteDate(
        DateTimeInterface $newCompleteDate
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentCompleteDate($newCompleteDate);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentCurrency(
        string $newDocumentCurrency
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentCurrency($newDocumentCurrency);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentTaxCurrency(
        string $newDocumentTaxCurrency
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentTaxCurrency($newDocumentTaxCurrency);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentIsCopy(
        bool $newDocumentIsCopy
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentIsCopy($newDocumentIsCopy);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentIsTest(
        bool $newDocumentIsTest
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentIsTest($newDocumentIsTest);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentNote(
        string $newContent,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentNote($newContent, $newContentCode, $newSubjectCode);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentNote(
        string $newContent,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentNote($newContent, $newContentCode, $newSubjectCode);

        return $this;
    }

    #endregion

    #region Document References

    /**
     * @inheritDoc
     */
    public function setDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentSellerQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentSellerQuotationReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentSellerQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentSellerQuotationReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentContractReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentContractReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentAdditionalReference(
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
     * @inheritDoc
     */
    public function addDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentAdditionalReference(
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
     * @inheritDoc
     */
    public function setDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentInvoiceReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode,
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentInvoiceReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode,
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentProjectReference(
        ?string $newReferenceNumber = null,
        ?string $newName = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentProjectReference($newReferenceNumber, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentProjectReference(
        ?string $newReferenceNumber = null,
        ?string $newName = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentProjectReference($newReferenceNumber, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setAocumentSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setAocumentSupplyChainEvent($newDate);

        return $this;
    }

    #endregion

    #region Document Seller/Supplier

    /**
     * @inheritDoc
     */
    public function setDocumentSellerName(
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentSellerName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentSellerId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentSellerId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentSellerId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentSellerId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentSellerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentSellerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentSellerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentSellerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentSellerAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentSellerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentSellerLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentSellerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentSellerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentSellerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentSellerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentSellerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentSellerCommunication(
        string $newType,
        string $newUri
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentSellerCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Buyer/Customer

    /**
     * @inheritDoc
     */
    public function setDocumentBuyerName(
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentBuyerName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentBuyerId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentBuyerId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentBuyerId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentBuyerId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentBuyerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentBuyerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentBuyerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentBuyerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentBuyerAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentBuyerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentBuyerLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentBuyerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentBuyerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentBuyerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentBuyerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentBuyerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentBuyerCommunication(
        string $newType,
        string $newUri
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentBuyerCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Tax Representativ party

    /**
     * @inheritDoc
     */
    public function setDocumentTaxRepresentativeName(
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentTaxRepresentativeId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentTaxRepresentativeId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentTaxRepresentativeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentTaxRepresentativeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentTaxRepresentativeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentTaxRepresentativeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentTaxRepresentativeAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentTaxRepresentativeLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentTaxRepresentativeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentTaxRepresentativeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentTaxRepresentativeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentTaxRepresentativeCommunication(
        string $newType,
        string $newUri
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentTaxRepresentativeCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Product Enduser

    /**
     * @inheritDoc
     */
    public function setDocumentProductEndUserName(
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentProductEndUserName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentProductEndUserId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentProductEndUserId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentProductEndUserId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentProductEndUserId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentProductEndUserGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentProductEndUserGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentProductEndUserTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentProductEndUserTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentProductEndUserTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentProductEndUserTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentProductEndUserAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentProductEndUserAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentProductEndUserLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentProductEndUserLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentProductEndUserContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentProductEndUserContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentProductEndUserContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentProductEndUserContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentProductEndUserCommunication(
        string $newType,
        string $newUri
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentProductEndUserCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Ship-To

    /**
     * @inheritDoc
     */
    public function setDocumentShipToName(
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentShipToName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentShipToId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentShipToId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentShipToId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentShipToId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentShipToGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentShipToGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentShipToTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentShipToTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentShipToAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentShipToAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentShipToLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentShipToLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentShipToContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentShipToContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentShipToCommunication(
        string $newType,
        string $newUri
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentShipToCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Ultimate Ship-To

    /**
     * @inheritDoc
     */
    public function setDocumentUltimateShipToName(
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentUltimateShipToName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentUltimateShipToId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentUltimateShipToId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentUltimateShipToId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentUltimateShipToId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentUltimateShipToGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentUltimateShipToGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentUltimateShipToTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentUltimateShipToTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentUltimateShipToAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentUltimateShipToAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentUltimateShipToLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentUltimateShipToLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentUltimateShipToContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentUltimateShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentUltimateShipToContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentUltimateShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentUltimateShipToCommunication(
        string $newType,
        string $newUri
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentUltimateShipToCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Ship-From

    /**
     * @inheritDoc
     */
    public function setDocumentShipFromName(
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentShipFromName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentShipFromId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentShipFromId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentShipFromId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentShipFromId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentShipFromGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentShipFromGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentShipFromTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentShipFromTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentShipFromTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentShipFromTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentShipFromAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentShipFromAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentShipFromLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentShipFromLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentShipFromContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentShipFromContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentShipFromContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentShipFromContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentShipFromCommunication(
        string $newType,
        string $newUri
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentShipFromCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Invoicer

    /**
     * @inheritDoc
     */
    public function setDocumentInvoicerName(
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentInvoicerName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentInvoicerId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentInvoicerId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentInvoicerId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentInvoicerId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentInvoicerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentInvoicerGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentInvoicerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentInvoicerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentInvoicerTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentInvoicerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentInvoicerAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentInvoicerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentInvoicerLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentInvoicerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentInvoicerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentInvoicerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentInvoicerContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentInvoicerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentInvoicerCommunication(
        string $newType,
        string $newUri
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentInvoicerCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Invoicee

    /**
     * @inheritDoc
     */
    public function setDocumentInvoiceeName(
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentInvoiceeName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentInvoiceeId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentInvoiceeId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentInvoiceeId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentInvoiceeId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentInvoiceeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentInvoiceeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentInvoiceeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentInvoiceeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentInvoiceeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentInvoiceeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentInvoiceeAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentInvoiceeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentInvoiceeLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentInvoiceeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentInvoiceeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentInvoiceeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentInvoiceeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentInvoiceeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentInvoiceeCommunication(
        string $newType,
        string $newUri
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentInvoiceeCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Payee

    /**
     * @inheritDoc
     */
    public function setDocumentPayeeName(
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentPayeeName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentPayeeId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentPayeeId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentPayeeId(
        string $newId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentPayeeId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentPayeeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentPayeeGlobalId(
        string $newGlobalId,
        string $newGlobalIdType
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentPayeeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentPayeeTaxRegistration(
        string $newTaxRegistrationType,
        string $newTaxRegistrationId
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentPayeeAddress(
        string $newAddressLine1,
        string $newAddressLine2,
        string $newAddressLine3,
        string $newPostcode,
        string $newCity,
        string $newCountryId,
        string $newSubDivision
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentPayeeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentPayeeLegalOrganisation(
        string $newType,
        string $newId,
        string $newName
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentPayeeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentPayeeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentPayeeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentPayeeContact(
        string $newPersonName,
        string $newDepartmentName,
        string $newPhoneNumber,
        string $newFaxNumber,
        string $newEmailAddress
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentPayeeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentPayeeCommunication(
        string $newType,
        string $newUri
    ): self {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentPayeeCommunication($newType, $newUri);

        return $this;
    }

    #endregion
}
