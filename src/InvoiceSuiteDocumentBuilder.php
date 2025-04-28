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
     * @param string $formatProviderUniqueId
     * @return InvoiceSuiteDocumentBuilder
     */
    public static function createByProviderUniqueId(string $formatProviderUniqueId): self
    {
        return new static($formatProviderUniqueId);
    }

    /**
     * Constructor (hidden)
     *
     * @param string $formatProviderUniqueId
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
     * @param  string $method
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
     * @param string $tofile
     * @return void
     */
    public function saveAsXmlFile(string $tofile): void
    {
        $this->getCurrentFormatProvider()->getBuilder()->saveAsXmlFile($tofile);
    }

    /**
     * Save the JSON content to a file
     *
     * @param string $tofile
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
    public function addDocumentNote(string $newContent, ?string $newContentCode = null, ?string $newSubjectCode = null): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addDocumentNote($newContent, $newContentCode, $newSubjectCode);

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
    public function setSellerTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setSellerTaxRegistration($newTaxRegistrationTyüe, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addSellerTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addSellerTaxRegistration($newTaxRegistrationTyüe, $newTaxRegistrationId);

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
    public function setBuyerTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setBuyerTaxRegistration($newTaxRegistrationTyüe, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addBuyerTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addBuyerTaxRegistration($newTaxRegistrationTyüe, $newTaxRegistrationId);

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

    #region Document tax representativ party

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
    public function setTaxRepresentativeTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setTaxRepresentativeTaxRegistration($newTaxRegistrationTyüe, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addTaxRepresentativeTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addTaxRepresentativeTaxRegistration($newTaxRegistrationTyüe, $newTaxRegistrationId);

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
    public function setProductEndUserTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->setProductEndUserTaxRegistration($newTaxRegistrationTyüe, $newTaxRegistrationId);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addProductEndUserTaxRegistration(string $newTaxRegistrationTyüe, string $newTaxRegistrationId): self
    {
        $this->getCurrentFormatProvider()->getBuilder()->addProductEndUserTaxRegistration($newTaxRegistrationTyüe, $newTaxRegistrationId);

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
}
