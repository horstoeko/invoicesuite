<?php

namespace horstoeko\invoicesuite;

use DateTimeInterface;
use JMS\Serializer\Exception\RuntimeException;
use JMS\Serializer\Exception\InvalidArgumentException;
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

    #region Document Generals

    /**
     * Create a new InvoiceDocumentBuilder instance for the given format provider
     *
     * @param  string $formatProviderUniqueId
     * @return InvoiceSuiteDocumentBuilder
     */
    public static function createByProviderUniqueId(string $formatProviderUniqueId): self
    {
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
    final protected function __construct(string $formatProviderUniqueId)
    {
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
    public function __call($method, $parameters)
    {
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
    public function saveAsXmlFile(string $tofile): void
    {
        $this->getCurrentFormatProvider()->getBuilder()->saveAsXmlFile($tofile);
    }

    /**
     * Save the JSON content to a file
     *
     * @param  string $tofile
     * @return void
     */
    public function saveAsJsonFile(string $tofile): void
    {
        $this->getCurrentFormatProvider()->getBuilder()->saveAsJsonFile($tofile);
    }

    /**
     * @inheritDoc
     */
    public function setDocumentNo(string $newDocumentNo): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentNo($newDocumentNo);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentType(string $newDocumentType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentType($newDocumentType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentDescription(string $newDocumentDescription): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentDescription($newDocumentDescription);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentLanguage(string $newDocumentLanguage): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentLanguage($newDocumentLanguage);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentDate(DateTimeInterface $newDocumentDate): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentDate($newDocumentDate);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentCompleteDate(DateTimeInterface $newCompleteDate): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentCompleteDate($newCompleteDate);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentCurrency(string $newDocumentCurrency): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentCurrency($newDocumentCurrency);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentTaxCurrency(string $newDocumentTaxCurrency): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentTaxCurrency($newDocumentTaxCurrency);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentIsCopy(bool $newDocumentIsCopy): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentIsCopy($newDocumentIsCopy);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentIsTest(bool $newDocumentIsTest): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentIsTest($newDocumentIsTest);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setDocumentNote(string $newContent, ?string $newContentCode = null, ?string $newSubjectCode = null): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentNote($newContent, $newContentCode, $newSubjectCode);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDocumentNote(string $newContent, ?string $newContentCode = null, ?string $newSubjectCode = null): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentNote($newContent, $newContentCode, $newSubjectCode);

        return $this;
    }

    #endregion

    #region Document References

    /**
     * @inheritDoc
     */
    public function setDocumentSellerOrderReference(string $newReferenceNumber, ?DateTimeInterface $newReferenceDate = null): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    #endregion

    #region Document Seller/Supplier

    /**
     * @inheritDoc
     */
    public function setSellerName(string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setSellerName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setSellerId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setSellerId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addSellerId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addSellerId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setSellerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setSellerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addSellerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addSellerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setSellerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addSellerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setSellerAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setSellerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setSellerLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setSellerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setSellerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setSellerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addSellerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addSellerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setSellerCommunication(string $newType, string $newUri): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setSellerCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Buyer/Customer

    /**
     * @inheritDoc
     */
    public function setBuyerName(string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setBuyerName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setBuyerId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setBuyerId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addBuyerId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addBuyerId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setBuyerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setBuyerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addBuyerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addBuyerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setBuyerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addBuyerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setBuyerAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setBuyerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setBuyerLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setBuyerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setBuyerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setBuyerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addBuyerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addBuyerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setBuyerCommunication(string $newType, string $newUri): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setBuyerCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Tax Representativ party

    /**
     * @inheritDoc
     */
    public function setTaxRepresentativeName(string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setTaxRepresentativeName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setTaxRepresentativeId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setTaxRepresentativeId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addTaxRepresentativeId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addTaxRepresentativeId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setTaxRepresentativeGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addTaxRepresentativeGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setTaxRepresentativeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addTaxRepresentativeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setTaxRepresentativeAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setTaxRepresentativeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setTaxRepresentativeLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setTaxRepresentativeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setTaxRepresentativeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setTaxRepresentativeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addTaxRepresentativeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addTaxRepresentativeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setTaxRepresentativeCommunication(string $newType, string $newUri): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setTaxRepresentativeCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Product Enduser

    /**
     * @inheritDoc
     */
    public function setProductEndUserName(string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setProductEndUserName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setProductEndUserId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setProductEndUserId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addProductEndUserId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addProductEndUserId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setProductEndUserGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addProductEndUserGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setProductEndUserTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setProductEndUserTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addProductEndUserTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addProductEndUserTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setProductEndUserAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setProductEndUserAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setProductEndUserLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setProductEndUserLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setProductEndUserContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setProductEndUserContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addProductEndUserContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addProductEndUserContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setProductEndUserCommunication(string $newType, string $newUri): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setProductEndUserCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Ship-To

    /**
     * @inheritDoc
     */
    public function setShipToName(string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setShipToName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setShipToId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setShipToId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addShipToId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addShipToId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setShipToTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addShipToTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setShipToAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setShipToAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setShipToLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setShipToLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setShipToCommunication(string $newType, string $newUri): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setShipToCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Ultimate Ship-To

    /**
     * @inheritDoc
     */
    public function setUltimateShipToName(string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setUltimateShipToName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setUltimateShipToId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setUltimateShipToId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addUltimateShipToId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addUltimateShipToId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setUltimateShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addUltimateShipToGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setUltimateShipToTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addUltimateShipToTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setUltimateShipToAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setUltimateShipToAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setUltimateShipToLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setUltimateShipToLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setUltimateShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setUltimateShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addUltimateShipToContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addUltimateShipToContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setUltimateShipToCommunication(string $newType, string $newUri): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setUltimateShipToCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Ship-From

    /**
     * @inheritDoc
     */
    public function setShipFromName(string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setShipFromName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setShipFromId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setShipFromId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addShipFromId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addShipFromId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setShipFromGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setShipFromGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addShipFromGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addShipFromGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setShipFromTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setShipFromTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addShipFromTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addShipFromTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setShipFromAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setShipFromAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setShipFromLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setShipFromLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setShipFromContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setShipFromContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addShipFromContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addShipFromContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setShipFromCommunication(string $newType, string $newUri): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setShipFromCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Invoicer

    /**
     * @inheritDoc
     */
    public function setInvoicerName(string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setInvoicerName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setInvoicerId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setInvoicerId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addInvoicerId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addInvoicerId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setInvoicerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addInvoicerGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setInvoicerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setInvoicerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addInvoicerTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addInvoicerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setInvoicerAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setInvoicerAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setInvoicerLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setInvoicerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setInvoicerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setInvoicerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addInvoicerContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addInvoicerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setInvoicerCommunication(string $newType, string $newUri): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setInvoicerCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Invoicee

    /**
     * @inheritDoc
     */
    public function setInvoiceeName(string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setInvoiceeName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setInvoiceeId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setInvoiceeId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addInvoiceeId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addInvoiceeId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setInvoiceeGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addInvoiceeGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setInvoiceeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setInvoiceeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addInvoiceeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addInvoiceeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setInvoiceeAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setInvoiceeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setInvoiceeLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setInvoiceeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setInvoiceeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setInvoiceeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addInvoiceeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addInvoiceeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setInvoiceeCommunication(string $newType, string $newUri): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setInvoiceeCommunication($newType, $newUri);

        return $this;
    }

    #endregion

    #region Document Payee

    /**
     * @inheritDoc
     */
    public function setPayeeName(string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setPayeeName($newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setPayeeId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setPayeeId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addPayeeId(string $newId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addPayeeId($newId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setPayeeGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setPayeeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addPayeeGlobalId(string $newGlobalId, string $newGlobalIdType): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addPayeeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setPayeeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addPayeeTaxRegistration(string $newTaxRegistrationType, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setPayeeAddress(string $newAddressLine1, string $newAddressLine2, string $newAddressLine3, string $newPostcode, string $newCity, string $newCountryId, string $newSubDivision): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setPayeeAddress($newAddressLine1, $newAddressLine2, $newAddressLine3, $newPostcode, $newCity, $newCountryId, $newSubDivision);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setPayeeLegalOrganisation(string $newType, string $newId, string $newName): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setPayeeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setPayeeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setPayeeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addPayeeContact(string $newPersonName, string $newDepartmentName, string $newPhoneNumber, string $newFaxNumber, string $newEmailAddress): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addPayeeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setPayeeCommunication(string $newType, string $newUri): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setPayeeCommunication($newType, $newUri);

        return $this;
    }

    #endregion
}
