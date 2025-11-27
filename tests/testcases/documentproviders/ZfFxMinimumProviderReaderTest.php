<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use DateTimeInterface;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatReader;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\documents\providers\zffxminimum\InvoiceSuiteZfFxMinimumProvider;
use horstoeko\invoicesuite\documents\providers\zffxminimum\InvoiceSuiteZfFxMinimumProviderReader;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

final class ZfFxMinimumProviderReaderTest extends TestCase
{
    /**
     * The reader
     *
     * @var InvoiceSuiteAbstractDocumentFormatReader
     */
    private static $document;

    public static function setUpBeforeClass(): void
    {
        static::$document = new InvoiceSuiteZfFxMinimumProviderReader(new InvoiceSuiteZfFxMinimumProvider());

        static::$document->deserializeFromContent(
            file_get_contents(
                InvoiceSuitePathUtils::combinePathWithFile(
                    InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
                    '02_technical_xml_zffx_minimum.xml'
                )
            )
        );
    }

    public function testGetDocumentNo(): void
    {
        static::$document->getDocumentNo($newDocumentNo);

        $this->assertSame('2025-04-000001', $newDocumentNo);
    }

    public function testGetDocumentType(): void
    {
        static::$document->getDocumentType($newDocumentType);

        $this->assertSame('380', $newDocumentType);
    }

    public function testGetDocumentDescription(): void
    {
        static::$document->getDocumentDescription($newDocumentDescription);

        $this->assertSame('', $newDocumentDescription);
    }

    public function testGetDocumentLanguage(): void
    {
        static::$document->getDocumentLanguage($newDocumentLanguage);

        $this->assertSame('', $newDocumentLanguage);
    }

    public function testGetDocumentDate(): void
    {
        static::$document->getDocumentDate($newDocumentDate);

        $this->assertInstanceOf(DateTimeInterface::class, $newDocumentDate);
        $this->assertSame('19700101', $newDocumentDate->format('Ymd'));
    }

    public function testGetDocumentCompleteDate(): void
    {
        static::$document->getDocumentCompleteDate($newCompleteDate);

        $this->assertNotInstanceOf(DateTimeInterface::class, $newCompleteDate);
    }

    public function testGetDocumentCurrency(): void
    {
        static::$document->getDocumentCurrency($newDocumentCurrency);

        $this->assertSame('EUR', $newDocumentCurrency);
    }

    public function testGetDocumentTaxCurrency(): void
    {
        static::$document->getDocumentTaxCurrency($newDocumentTaxCurrency);

        $this->assertSame('', $newDocumentTaxCurrency);
    }

    public function testGetDocumentIsCopy(): void
    {
        static::$document->getDocumentIsCopy($newDocumentIsCopy);

        $this->assertFalse($newDocumentIsCopy);
    }

    public function testGetDocumentIsTest(): void
    {
        static::$document->getDocumentIsTest($newDocumentIsTest);

        $this->assertFalse($newDocumentIsTest);
    }

    public function testFirstNextGetDocumentNote(): void
    {
        $this->assertFalse(static::$document->firstDocumentNote());

        static::$document->getDocumentNote($newContent, $newContentCode, $newSubjectCode);

        $this->assertSame('', $newContent);
        $this->assertSame('', $newContentCode);
        $this->assertSame('', $newSubjectCode);

        $this->assertFalse(static::$document->nextDocumentNote());

        static::$document->getDocumentNote($newContent, $newContentCode, $newSubjectCode);

        $this->assertSame('', $newContent);
        $this->assertSame('', $newContentCode);
        $this->assertSame('', $newSubjectCode);

        $this->assertFalse(static::$document->nextDocumentNote());
    }

    public function testFirstNextGetDocumentBillingPeriod(): void
    {
        $this->assertFalse(static::$document->firstDocumentBillingPeriod());

        static::$document->getDocumentBillingPeriod($newStartDate, $newEndDate, $newDescription);

        $this->assertNotInstanceOf(DateTimeInterface::class, $newStartDate);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newEndDate);
        $this->assertSame('', $newDescription);

        $this->assertFalse(static::$document->nextDocumentBillingPeriod());
    }

    public function testFirstNextGetDocumentPostingReference(): void
    {
        $this->assertFalse(static::$document->firstDocumentPostingReference());

        static::$document->getDocumentPostingReference($newType, $newAccountId);

        $this->assertSame('', $newType);
        $this->assertSame('', $newAccountId);

        $this->assertFalse(static::$document->nextDocumentPostingReference());
    }

    public function testFirstNextGetDocumentSellerOrderReference(): void
    {
        $this->assertFalse(static::$document->firstDocumentSellerOrderReference());

        static::$document->getDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(static::$document->nextDocumentSellerOrderReference());
    }

    public function testFirstNextGetDocumentBuyerOrderReference(): void
    {
        $this->assertTrue(static::$document->firstDocumentBuyerOrderReference());

        static::$document->getDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('BO-1', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(static::$document->nextDocumentBuyerOrderReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentQuotationReference(): void
    {
        $this->assertFalse(static::$document->firstDocumentQuotationReference());

        static::$document->getDocumentQuotationReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(static::$document->nextDocumentQuotationReference());
    }

    public function testFirstNextGetDocumentContractReference(): void
    {
        $this->assertFalse(static::$document->firstDocumentContractReference());

        static::$document->getDocumentContractReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(static::$document->nextDocumentContractReference());
    }

    public function testFirstNextGetDocumentAdditionalReference(): void
    {
        $this->assertFalse(static::$document->firstDocumentAdditionalReference());

        static::$document->getDocumentAdditionalReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode,
            $newReferenceTypeCode,
            $newDescription,
            $newInvoiceSuiteAttachment
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);
        $this->assertSame('', $newTypeCode);
        $this->assertSame('', $newReferenceTypeCode);
        $this->assertSame('', $newDescription);
        $this->assertNotInstanceOf(InvoiceSuiteAttachment::class, $newInvoiceSuiteAttachment);

        $this->assertFalse(static::$document->nextDocumentAdditionalReference());
    }

    public function testFirstNextGetDocumentInvoiceReference(): void
    {
        $this->assertFalse(static::$document->firstDocumentInvoiceReference());

        static::$document->getDocumentInvoiceReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);
        $this->assertSame('', $newTypeCode);

        $this->assertFalse(static::$document->nextDocumentInvoiceReference());
    }

    public function testFirstNextGetDocumentProjectReference(): void
    {
        $this->assertFalse(static::$document->firstDocumentProjectReference());

        static::$document->getDocumentProjectReference($newReferenceNumber, $newName);

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newName);

        $this->assertFalse(static::$document->nextDocumentProjectReference());
    }

    public function testFirstNextGetDocumentUltimateCustomerOrderReference(): void
    {
        $this->assertFalse(static::$document->firstDocumentUltimateCustomerOrderReference());

        static::$document->getDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(static::$document->nextDocumentUltimateCustomerOrderReference());

        static::$document->getDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(static::$document->nextDocumentUltimateCustomerOrderReference());
    }

    public function testFirstNextGetDocumentDespatchAdviceReference(): void
    {
        $this->assertFalse(static::$document->firstDocumentDespatchAdviceReference());

        static::$document->getDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(static::$document->nextDocumentDespatchAdviceReference());
    }

    public function testFirstNextGetDocumentReceivingAdviceReference(): void
    {
        $this->assertFalse(static::$document->firstDocumentReceivingAdviceReference());

        static::$document->getDocumentReceivingAdviceReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(static::$document->nextDocumentReceivingAdviceReference());
    }

    public function testFirstNextGetDocumentDeliveryNoteReference(): void
    {
        $this->assertFalse(static::$document->firstDocumentDeliveryNoteReference());

        static::$document->getDocumentDeliveryNoteReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(static::$document->nextDocumentDeliveryNoteReference());
    }

    public function testGetDocumentSupplyChainEvent(): void
    {
        static::$document->getDocumentSupplyChainEvent($newDate);

        $this->assertNotInstanceOf(DateTimeInterface::class, $newDate);
    }

    public function testGetDocumentBuyerReference(): void
    {
        static::$document->getDocumentBuyerReference($newBuyerReference);

        $this->assertSame('LEITWEGID', $newBuyerReference);
    }

    public function testDocumentSeller(): void
    {
        // Name

        static::$document->getDocumentSellerName($newName);

        $this->assertSame('Lieferant GmbH', $newName);

        // ID

        $this->assertFalse(static::$document->firstDocumentSellerId());

        static::$document->getDocumentSellerId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(static::$document->nextDocumentSellerId());

        static::$document->getDocumentSellerId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(static::$document->nextDocumentSellerId());

        // Global ID

        $this->assertFalse(static::$document->firstDocumentSellerGlobalId());

        static::$document->getDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentSellerGlobalId());

        static::$document->getDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentSellerGlobalId());

        // Tax Registration

        $this->assertTrue(static::$document->firstDocumentSellerTaxRegistration());

        static::$document->getDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('893489787987', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertTrue(static::$document->nextDocumentSellerTaxRegistration());

        static::$document->getDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('893489787987-X', $newTaxRegistrationId);
        $this->assertSame('FC', $newTaxRegistrationType);

        $this->assertTrue(static::$document->nextDocumentSellerTaxRegistration());

        static::$document->getDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('893489787987-AA', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertFalse(static::$document->nextDocumentSellerTaxRegistration());

        // Address

        $this->assertTrue(static::$document->firstDocumentSellerAddress());

        static::$document->getDocumentSellerAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->assertSame('', $newAddressLine1);
        $this->assertSame('', $newAddressLine2);
        $this->assertSame('', $newAddressLine3);
        $this->assertSame('', $newPostcode);
        $this->assertSame('', $newCity);
        $this->assertSame('DE', $newCountryId);
        $this->assertSame('', $newSubDivision);

        $this->assertFalse(static::$document->nextDocumentSellerAddress());

        // Legal Organisation

        $this->assertTrue(static::$document->firstDocumentSellerLegalOrganisation());

        static::$document->getDocumentSellerLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(static::$document->nextDocumentSellerLegalOrganisation());

        // Contact

        $this->assertFalse(static::$document->firstDocumentSellerContact());

        static::$document->getDocumentSellerContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('', $newPersonName);
        $this->assertSame('', $newDepartmentName);
        $this->assertSame('', $newPhoneNumber);
        $this->assertSame('', $newFaxNumber);
        $this->assertSame('', $newEmailAddress);

        $this->assertFalse(static::$document->nextDocumentSellerContact());

        // Communication

        $this->assertFalse(static::$document->firstDocumentSellerCommunication());

        static::$document->getDocumentSellerCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(static::$document->nextDocumentSellerCommunication());

        // Finals

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentSellerId($newId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentSellerAddress(
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentSellerLegalOrganisation($newType, $newId, $newName);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentSellerContact(
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentSellerCommunication($newType, $newUri);
        }, '/Undefined (array key|index)/');
    }

    public function testDocumentBuyer(): void
    {
        // Name

        static::$document->getDocumentBuyerName($newName);

        $this->assertSame('Kunde GmbH', $newName);

        // ID

        $this->assertFalse(static::$document->firstDocumentBuyerId());

        static::$document->getDocumentBuyerId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(static::$document->nextDocumentBuyerId());

        // Global ID

        $this->assertFalse(static::$document->firstDocumentBuyerGlobalId());

        static::$document->getDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentBuyerGlobalId());

        static::$document->getDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentBuyerGlobalId());

        // Tax Registration

        $this->assertTrue(static::$document->firstDocumentBuyerTaxRegistration());

        static::$document->getDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('893489787987', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertFalse(static::$document->nextDocumentBuyerTaxRegistration());

        // Address

        $this->assertTrue(static::$document->firstDocumentBuyerAddress());

        static::$document->getDocumentBuyerAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->assertSame('', $newAddressLine1);
        $this->assertSame('', $newAddressLine2);
        $this->assertSame('', $newAddressLine3);
        $this->assertSame('', $newPostcode);
        $this->assertSame('', $newCity);
        $this->assertSame('DE', $newCountryId);
        $this->assertSame('', $newSubDivision);

        $this->assertFalse(static::$document->nextDocumentBuyerAddress());

        // Legal Organisation

        $this->assertTrue(static::$document->firstDocumentBuyerLegalOrganisation());

        static::$document->getDocumentBuyerLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(static::$document->nextDocumentBuyerLegalOrganisation());

        // Contact

        $this->assertFalse(static::$document->firstDocumentBuyerContact());

        static::$document->getDocumentBuyerContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('', $newPersonName);
        $this->assertSame('', $newDepartmentName);
        $this->assertSame('', $newPhoneNumber);
        $this->assertSame('', $newFaxNumber);
        $this->assertSame('', $newEmailAddress);

        $this->assertFalse(static::$document->nextDocumentBuyerContact());

        // Communication

        $this->assertFalse(static::$document->firstDocumentBuyerCommunication());

        static::$document->getDocumentBuyerCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(static::$document->nextDocumentBuyerCommunication());

        // Finals

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentBuyerId($newId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentBuyerAddress(
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentBuyerLegalOrganisation($newType, $newId, $newName);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentBuyerContact(
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentBuyerCommunication($newType, $newUri);
        }, '/Undefined (array key|index)/');
    }

    public function testDocumentTaxRepresentative(): void
    {
        // Name

        static::$document->getDocumentTaxRepresentativeName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(static::$document->firstDocumentTaxRepresentativeId());

        static::$document->getDocumentTaxRepresentativeId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(static::$document->nextDocumentTaxRepresentativeId());

        // Global ID

        $this->assertFalse(static::$document->firstDocumentTaxRepresentativeGlobalId());

        static::$document->getDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentTaxRepresentativeGlobalId());

        static::$document->getDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentTaxRepresentativeGlobalId());

        // Tax Registration

        $this->assertFalse(static::$document->firstDocumentTaxRepresentativeTaxRegistration());

        static::$document->getDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(static::$document->nextDocumentTaxRepresentativeTaxRegistration());

        // Address

        $this->assertFalse(static::$document->firstDocumentTaxRepresentativeAddress());

        static::$document->getDocumentTaxRepresentativeAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->assertSame('', $newAddressLine1);
        $this->assertSame('', $newAddressLine2);
        $this->assertSame('', $newAddressLine3);
        $this->assertSame('', $newPostcode);
        $this->assertSame('', $newCity);
        $this->assertSame('', $newCountryId);
        $this->assertSame('', $newSubDivision);

        $this->assertFalse(static::$document->nextDocumentTaxRepresentativeAddress());

        // Legal Organisation

        $this->assertFalse(static::$document->firstDocumentTaxRepresentativeLegalOrganisation());

        static::$document->getDocumentTaxRepresentativeLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(static::$document->nextDocumentTaxRepresentativeLegalOrganisation());

        // Contact

        $this->assertFalse(static::$document->firstDocumentTaxRepresentativeContact());

        static::$document->getDocumentTaxRepresentativeContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('', $newPersonName);
        $this->assertSame('', $newDepartmentName);
        $this->assertSame('', $newPhoneNumber);
        $this->assertSame('', $newFaxNumber);
        $this->assertSame('', $newEmailAddress);

        $this->assertFalse(static::$document->nextDocumentTaxRepresentativeContact());

        // Communication

        $this->assertFalse(static::$document->firstDocumentTaxRepresentativeCommunication());

        static::$document->getDocumentTaxRepresentativeCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(static::$document->nextDocumentTaxRepresentativeCommunication());
    }

    public function testDocumentProductEndUser(): void
    {
        // Name

        static::$document->getDocumentProductEndUserName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(static::$document->firstDocumentProductEndUserId());

        static::$document->getDocumentProductEndUserId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(static::$document->nextDocumentProductEndUserId());

        // Global ID

        $this->assertFalse(static::$document->firstDocumentProductEndUserGlobalId());

        static::$document->getDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentProductEndUserGlobalId());

        static::$document->getDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentProductEndUserGlobalId());

        // Tax Registration

        $this->assertFalse(static::$document->firstDocumentProductEndUserTaxRegistration());

        static::$document->getDocumentProductEndUserTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(static::$document->nextDocumentProductEndUserTaxRegistration());

        // Address

        $this->assertFalse(static::$document->firstDocumentProductEndUserAddress());

        static::$document->getDocumentProductEndUserAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->assertSame('', $newAddressLine1);
        $this->assertSame('', $newAddressLine2);
        $this->assertSame('', $newAddressLine3);
        $this->assertSame('', $newPostcode);
        $this->assertSame('', $newCity);
        $this->assertSame('', $newCountryId);
        $this->assertSame('', $newSubDivision);

        $this->assertFalse(static::$document->nextDocumentProductEndUserAddress());

        // Legal Organisation

        $this->assertFalse(static::$document->firstDocumentProductEndUserLegalOrganisation());

        static::$document->getDocumentProductEndUserLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(static::$document->nextDocumentProductEndUserLegalOrganisation());

        // Contact

        $this->assertFalse(static::$document->firstDocumentProductEndUserContact());

        static::$document->getDocumentProductEndUserContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('', $newPersonName);
        $this->assertSame('', $newDepartmentName);
        $this->assertSame('', $newPhoneNumber);
        $this->assertSame('', $newFaxNumber);
        $this->assertSame('', $newEmailAddress);

        $this->assertFalse(static::$document->nextDocumentProductEndUserContact());

        // Communication

        $this->assertFalse(static::$document->firstDocumentProductEndUserCommunication());

        static::$document->getDocumentProductEndUserCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(static::$document->nextDocumentProductEndUserCommunication());
    }

    public function testDocumentShipTo(): void
    {
        // Name

        static::$document->getDocumentShipToName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(static::$document->firstDocumentShipToId());

        static::$document->getDocumentShipToId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(static::$document->nextDocumentShipToId());

        // Global ID

        $this->assertFalse(static::$document->firstDocumentShipToGlobalId());

        static::$document->getDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentShipToGlobalId());

        static::$document->getDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentShipToGlobalId());

        // Tax Registration

        $this->assertFalse(static::$document->firstDocumentShipToTaxRegistration());

        static::$document->getDocumentShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(static::$document->nextDocumentShipToTaxRegistration());

        // Address

        $this->assertFalse(static::$document->firstDocumentShipToAddress());

        static::$document->getDocumentShipToAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->assertSame('', $newAddressLine1);
        $this->assertSame('', $newAddressLine2);
        $this->assertSame('', $newAddressLine3);
        $this->assertSame('', $newPostcode);
        $this->assertSame('', $newCity);
        $this->assertSame('', $newCountryId);
        $this->assertSame('', $newSubDivision);

        $this->assertFalse(static::$document->nextDocumentShipToAddress());

        // Legal Organisation

        $this->assertFalse(static::$document->firstDocumentShipToLegalOrganisation());

        static::$document->getDocumentShipToLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(static::$document->nextDocumentShipToLegalOrganisation());

        // Contact

        $this->assertFalse(static::$document->firstDocumentShipToContact());

        static::$document->getDocumentShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('', $newPersonName);
        $this->assertSame('', $newDepartmentName);
        $this->assertSame('', $newPhoneNumber);
        $this->assertSame('', $newFaxNumber);
        $this->assertSame('', $newEmailAddress);

        $this->assertFalse(static::$document->nextDocumentShipToContact());

        // Communication

        $this->assertFalse(static::$document->firstDocumentShipToCommunication());

        static::$document->getDocumentShipToCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(static::$document->nextDocumentShipToCommunication());
    }

    public function testDocumentUltimateShipTo(): void
    {
        // Name

        static::$document->getDocumentUltimateShipToName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(static::$document->firstDocumentUltimateShipToId());

        static::$document->getDocumentUltimateShipToId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(static::$document->nextDocumentUltimateShipToId());

        // Global ID

        $this->assertFalse(static::$document->firstDocumentUltimateShipToGlobalId());

        static::$document->getDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentUltimateShipToGlobalId());

        static::$document->getDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentUltimateShipToGlobalId());

        // Tax Registration

        $this->assertFalse(static::$document->firstDocumentUltimateShipToTaxRegistration());

        static::$document->getDocumentUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(static::$document->nextDocumentUltimateShipToTaxRegistration());

        // Address

        $this->assertFalse(static::$document->firstDocumentUltimateShipToAddress());

        static::$document->getDocumentUltimateShipToAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->assertSame('', $newAddressLine1);
        $this->assertSame('', $newAddressLine2);
        $this->assertSame('', $newAddressLine3);
        $this->assertSame('', $newPostcode);
        $this->assertSame('', $newCity);
        $this->assertSame('', $newCountryId);
        $this->assertSame('', $newSubDivision);

        $this->assertFalse(static::$document->nextDocumentUltimateShipToAddress());

        // Legal Organisation

        $this->assertFalse(static::$document->firstDocumentUltimateShipToLegalOrganisation());

        static::$document->getDocumentUltimateShipToLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(static::$document->nextDocumentUltimateShipToLegalOrganisation());

        // Contact

        $this->assertFalse(static::$document->firstDocumentUltimateShipToContact());

        static::$document->getDocumentUltimateShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('', $newPersonName);
        $this->assertSame('', $newDepartmentName);
        $this->assertSame('', $newPhoneNumber);
        $this->assertSame('', $newFaxNumber);
        $this->assertSame('', $newEmailAddress);

        $this->assertFalse(static::$document->nextDocumentUltimateShipToContact());

        // Communication

        $this->assertFalse(static::$document->firstDocumentUltimateShipToCommunication());

        static::$document->getDocumentUltimateShipToCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(static::$document->nextDocumentUltimateShipToCommunication());
    }

    public function testDocumentShipFrom(): void
    {
        // Name

        static::$document->getDocumentShipFromName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(static::$document->firstDocumentShipFromId());

        static::$document->getDocumentShipFromId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(static::$document->nextDocumentShipFromId());

        // Global ID

        $this->assertFalse(static::$document->firstDocumentShipFromGlobalId());

        static::$document->getDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentShipFromGlobalId());

        static::$document->getDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentShipFromGlobalId());

        // Tax Registration

        $this->assertFalse(static::$document->firstDocumentShipFromTaxRegistration());

        static::$document->getDocumentShipFromTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(static::$document->nextDocumentShipFromTaxRegistration());

        // Address

        $this->assertFalse(static::$document->firstDocumentShipFromAddress());

        static::$document->getDocumentShipFromAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->assertSame('', $newAddressLine1);
        $this->assertSame('', $newAddressLine2);
        $this->assertSame('', $newAddressLine3);
        $this->assertSame('', $newPostcode);
        $this->assertSame('', $newCity);
        $this->assertSame('', $newCountryId);
        $this->assertSame('', $newSubDivision);

        $this->assertFalse(static::$document->nextDocumentShipFromAddress());

        // Legal Organisation

        $this->assertFalse(static::$document->firstDocumentShipFromLegalOrganisation());

        static::$document->getDocumentShipFromLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(static::$document->nextDocumentShipFromLegalOrganisation());

        // Contact

        $this->assertFalse(static::$document->firstDocumentShipFromContact());

        static::$document->getDocumentShipFromContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('', $newPersonName);
        $this->assertSame('', $newDepartmentName);
        $this->assertSame('', $newPhoneNumber);
        $this->assertSame('', $newFaxNumber);
        $this->assertSame('', $newEmailAddress);

        $this->assertFalse(static::$document->nextDocumentShipFromContact());

        // Communication

        $this->assertFalse(static::$document->firstDocumentShipFromCommunication());

        static::$document->getDocumentShipFromCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(static::$document->nextDocumentShipFromCommunication());
    }

    public function testDocumentInvoicer(): void
    {
        // Name

        static::$document->getDocumentInvoicerName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(static::$document->firstDocumentInvoicerId());

        static::$document->getDocumentInvoicerId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(static::$document->nextDocumentInvoicerId());

        // Global ID

        $this->assertFalse(static::$document->firstDocumentInvoicerGlobalId());

        static::$document->getDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentInvoicerGlobalId());

        static::$document->getDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentInvoicerGlobalId());

        // Tax Registration

        $this->assertFalse(static::$document->firstDocumentInvoicerTaxRegistration());

        static::$document->getDocumentInvoicerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(static::$document->nextDocumentInvoicerTaxRegistration());

        // Address

        $this->assertFalse(static::$document->firstDocumentInvoicerAddress());

        static::$document->getDocumentInvoicerAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->assertSame('', $newAddressLine1);
        $this->assertSame('', $newAddressLine2);
        $this->assertSame('', $newAddressLine3);
        $this->assertSame('', $newPostcode);
        $this->assertSame('', $newCity);
        $this->assertSame('', $newCountryId);
        $this->assertSame('', $newSubDivision);

        $this->assertFalse(static::$document->nextDocumentInvoicerAddress());

        // Legal Organisation

        $this->assertFalse(static::$document->firstDocumentInvoicerLegalOrganisation());

        static::$document->getDocumentInvoicerLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(static::$document->nextDocumentInvoicerLegalOrganisation());

        // Contact

        $this->assertFalse(static::$document->firstDocumentInvoicerContact());

        static::$document->getDocumentInvoicerContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('', $newPersonName);
        $this->assertSame('', $newDepartmentName);
        $this->assertSame('', $newPhoneNumber);
        $this->assertSame('', $newFaxNumber);
        $this->assertSame('', $newEmailAddress);

        $this->assertFalse(static::$document->nextDocumentInvoicerContact());

        // Communication

        $this->assertFalse(static::$document->firstDocumentInvoicerCommunication());

        static::$document->getDocumentInvoicerCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(static::$document->nextDocumentInvoicerCommunication());
    }

    public function testDocumentInvoicee(): void
    {
        // Name

        static::$document->getDocumentInvoiceeName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(static::$document->firstDocumentInvoiceeId());

        static::$document->getDocumentInvoiceeId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(static::$document->nextDocumentInvoiceeId());

        // Global ID

        $this->assertFalse(static::$document->firstDocumentInvoiceeGlobalId());

        static::$document->getDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentInvoiceeGlobalId());

        static::$document->getDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentInvoiceeGlobalId());

        // Tax Registration

        $this->assertFalse(static::$document->firstDocumentInvoiceeTaxRegistration());

        static::$document->getDocumentInvoiceeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(static::$document->nextDocumentInvoiceeTaxRegistration());

        // Address

        $this->assertFalse(static::$document->firstDocumentInvoiceeAddress());

        static::$document->getDocumentInvoiceeAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->assertSame('', $newAddressLine1);
        $this->assertSame('', $newAddressLine2);
        $this->assertSame('', $newAddressLine3);
        $this->assertSame('', $newPostcode);
        $this->assertSame('', $newCity);
        $this->assertSame('', $newCountryId);
        $this->assertSame('', $newSubDivision);

        $this->assertFalse(static::$document->nextDocumentInvoiceeAddress());

        // Legal Organisation

        $this->assertFalse(static::$document->firstDocumentInvoiceeLegalOrganisation());

        static::$document->getDocumentInvoiceeLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(static::$document->nextDocumentInvoiceeLegalOrganisation());

        // Contact

        $this->assertFalse(static::$document->firstDocumentInvoiceeContact());

        static::$document->getDocumentInvoiceeContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('', $newPersonName);
        $this->assertSame('', $newDepartmentName);
        $this->assertSame('', $newPhoneNumber);
        $this->assertSame('', $newFaxNumber);
        $this->assertSame('', $newEmailAddress);

        $this->assertFalse(static::$document->nextDocumentInvoiceeContact());

        // Communication

        $this->assertFalse(static::$document->firstDocumentInvoiceeCommunication());

        static::$document->getDocumentInvoiceeCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(static::$document->nextDocumentInvoiceeCommunication());
    }

    public function testDocumentPayee(): void
    {
        // Name

        static::$document->getDocumentPayeeName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(static::$document->firstDocumentPayeeId());

        static::$document->getDocumentPayeeId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(static::$document->nextDocumentPayeeId());

        // Global ID

        $this->assertFalse(static::$document->firstDocumentPayeeGlobalId());

        static::$document->getDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentPayeeGlobalId());

        static::$document->getDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentPayeeGlobalId());

        // Tax Registration

        $this->assertFalse(static::$document->firstDocumentPayeeTaxRegistration());

        static::$document->getDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(static::$document->nextDocumentPayeeTaxRegistration());

        // Address

        $this->assertFalse(static::$document->firstDocumentPayeeAddress());

        static::$document->getDocumentPayeeAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->assertSame('', $newAddressLine1);
        $this->assertSame('', $newAddressLine2);
        $this->assertSame('', $newAddressLine3);
        $this->assertSame('', $newPostcode);
        $this->assertSame('', $newCity);
        $this->assertSame('', $newCountryId);
        $this->assertSame('', $newSubDivision);

        $this->assertFalse(static::$document->nextDocumentPayeeAddress());

        // Legal Organisation

        $this->assertFalse(static::$document->firstDocumentPayeeLegalOrganisation());

        static::$document->getDocumentPayeeLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(static::$document->nextDocumentPayeeLegalOrganisation());

        // Contact

        $this->assertFalse(static::$document->firstDocumentPayeeContact());

        static::$document->getDocumentPayeeContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('', $newPersonName);
        $this->assertSame('', $newDepartmentName);
        $this->assertSame('', $newPhoneNumber);
        $this->assertSame('', $newFaxNumber);
        $this->assertSame('', $newEmailAddress);

        $this->assertFalse(static::$document->nextDocumentPayeeContact());

        // Communication

        $this->assertFalse(static::$document->firstDocumentPayeeCommunication());

        static::$document->getDocumentPayeeCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(static::$document->nextDocumentPayeeCommunication());
    }

    public function testFirstNextGetDocumentPaymentMean(): void
    {
        $this->assertFalse(static::$document->firstDocumentPaymentMean());
        $this->assertFalse(static::$document->nextDocumentPaymentMean());
    }

    public function testFirstNextGetDocumentPaymentCreditorReferenceID(): void
    {
        $this->assertFalse(static::$document->firstDocumentPaymentCreditorReferenceID());
        $this->assertFalse(static::$document->nextDocumentPaymentCreditorReferenceID());
    }

    public function testFirstNextGetDocumentPaymentTerm(): void
    {
        $this->assertFalse(static::$document->firstDocumentPaymentTerm());
        $this->assertFalse(static::$document->nextDocumentPaymentTerm());
    }

    public function testFirstNextGetDocumentTax(): void
    {
        $this->assertFalse(static::$document->firstDocumentTax());
        $this->assertFalse(static::$document->nextDocumentTax());
    }

    public function testFirstNextGetDocumentAllowanceCharge(): void
    {
        $this->assertFalse(static::$document->firstDocumentAllowanceCharge());
        $this->assertFalse(static::$document->nextDocumentAllowanceCharge());
    }

    public function testFirstNextGetDocumentLogisticServiceCharge(): void
    {
        $this->assertFalse(static::$document->firstDocumentLogisticServiceCharge());

        static::$document->getDocumentLogisticServiceCharge(
            $newChargeAmount,
            $newDescription,
            $newTaxCategory,
            $newTaxType,
            $newTaxPercent
        );

        $this->assertEqualsWithDelta(0.0, $newChargeAmount, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newDescription);
        $this->assertSame('', $newTaxCategory);
        $this->assertSame('', $newTaxType);
        $this->assertEqualsWithDelta(0.0, $newTaxPercent, PHP_FLOAT_EPSILON);

        $this->assertFalse(static::$document->nextDocumentLogisticServiceCharge());
    }

    public function testGetDocumentSummation(): void
    {
        static::$document->getDocumentSummation(
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

        $this->assertEqualsWithDelta(0.00, $newNetAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.00, $newChargeTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.00, $newDiscountTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(4.00, $newTaxBasisAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(5.00, $newTaxTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(6.00, $newTaxTotalAmount2, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(7.00, $newGrossAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(8.00, $newDueAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.00, $newPrepaidAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.00, $newRoungingAmount, PHP_FLOAT_EPSILON);
    }

    public function testFirstNextGetDocumentPosition(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        static::$document->getDocumentPosition(
            $newPositionId,
            $newParentPositionId,
            $newLineStatusCode,
            $newLineStatusReasonCode
        );

        $this->assertSame('', $newPositionId);
        $this->assertSame('', $newParentPositionId);
        $this->assertSame('', $newLineStatusCode);
        $this->assertSame('', $newLineStatusReasonCode);

        $this->assertFalse(static::$document->firstDocumentPositionNote());

        static::$document->getDocumentPositionNote(
            $newContent,
            $newContentCode,
            $newSubjectCode
        );

        $this->assertSame('', $newContent);
        $this->assertSame('', $newContentCode);
        $this->assertSame('', $newSubjectCode);

        $this->assertFalse(static::$document->nextDocumentPositionNote());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testGetDocumentPositionProductDetails(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        static::$document->getDocumentPositionProductDetails(
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

        $this->assertSame('', $newProductId);
        $this->assertSame('', $newProductName);
        $this->assertSame('', $newProductDescription);
        $this->assertSame('', $newProductSellerId);
        $this->assertSame('', $newProductBuyerId);
        $this->assertSame('', $newProductGlobalId);
        $this->assertSame('', $newProductGlobalIdType);
        $this->assertSame('', $newProductIndustryId);
        $this->assertSame('', $newProductModelId);
        $this->assertSame('', $newProductBatchId);
        $this->assertSame('', $newProductBrandName);
        $this->assertSame('', $newProductModelName);
        $this->assertSame('', $newProductOriginTradeCountry);

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionProductCharacteristic(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionProductCharacteristic());

        static::$document->getDocumentPositionProductCharacteristic(
            $newProductCharacteristicDescription,
            $newProductCharacteristicValue,
            $newProductCharacteristicType,
            $newProductCharacteristicMeasureValue,
            $newProductCharacteristicMeasureUnit
        );

        $this->assertSame('', $newProductCharacteristicDescription);
        $this->assertSame('', $newProductCharacteristicValue);
        $this->assertSame('', $newProductCharacteristicType);
        $this->assertEqualsWithDelta(0.0, $newProductCharacteristicMeasureValue, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newProductCharacteristicMeasureUnit);

        $this->assertFalse(static::$document->nextDocumentPositionProductCharacteristic());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionProductClassification(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionProductClassification());

        static::$document->getDocumentPositionProductClassification(
            $newProductClassificationCode,
            $newProductClassificationListId,
            $newProductClassificationListVersionId,
            $newProductClassificationCodeClassname
        );

        $this->assertSame('', $newProductClassificationCode);
        $this->assertSame('', $newProductClassificationListId);
        $this->assertSame('', $newProductClassificationListVersionId);
        $this->assertSame('', $newProductClassificationCodeClassname);

        $this->assertFalse(static::$document->nextDocumentPositionProductClassification());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetPositionReferencedProduct(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionReferencedProduct());

        static::$document->getDocumentPositionReferencedProduct(
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

        $this->assertSame('', $newProductId);
        $this->assertSame('', $newProductName);
        $this->assertSame('', $newProductDescription);
        $this->assertSame('', $newProductSellerId);
        $this->assertSame('', $newProductBuyerId);
        $this->assertSame('', $newProductGlobalId);
        $this->assertSame('', $newProductGlobalIdType);
        $this->assertSame('', $newProductIndustryId);
        $this->assertEqualsWithDelta(0.0, $newProductUnitQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newProductUnitQuantityUnit);

        $this->assertFalse(static::$document->nextDocumentPositionReferencedProduct());

        static::$document->getDocumentPositionReferencedProduct(
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

        $this->assertSame('', $newProductId);
        $this->assertSame('', $newProductName);
        $this->assertSame('', $newProductDescription);
        $this->assertSame('', $newProductSellerId);
        $this->assertSame('', $newProductBuyerId);
        $this->assertSame('', $newProductGlobalId);
        $this->assertSame('', $newProductGlobalIdType);
        $this->assertSame('', $newProductIndustryId);
        $this->assertEqualsWithDelta(0.0, $newProductUnitQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newProductUnitQuantityUnit);

        $this->assertFalse(static::$document->nextDocumentPositionReferencedProduct());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionSellerOrderReference(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionSellerOrderReference());

        static::$document->getDocumentPositionSellerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(static::$document->nextDocumentPositionSellerOrderReference());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionBuyerOrderReference(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionBuyerOrderReference());

        static::$document->getDocumentPositionBuyerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(static::$document->nextDocumentPositionBuyerOrderReference());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionQuotationReference(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionQuotationReference());

        static::$document->getDocumentPositionQuotationReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(static::$document->nextDocumentPositionQuotationReference());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionContractReference(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionContractReference());

        static::$document->getDocumentPositionContractReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(static::$document->nextDocumentPositionContractReference());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionAdditionalReference(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionAdditionalReference());

        static::$document->getDocumentPositionAdditionalReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate,
            $newTypeCode,
            $newReferenceTypeCode,
            $newDescription,
            $newInvoiceSuiteAttachment
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);
        $this->assertSame('', $newTypeCode);
        $this->assertSame('', $newReferenceTypeCode);
        $this->assertSame('', $newDescription);
        $this->assertNotInstanceOf(InvoiceSuiteAttachment::class, $newInvoiceSuiteAttachment);

        $this->assertFalse(static::$document->nextDocumentPositionAdditionalReference());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionUltimateCustomerOrderReference(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionUltimateCustomerOrderReference());

        static::$document->getDocumentPositionUltimateCustomerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(static::$document->nextDocumentPositionUltimateCustomerOrderReference());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionDespatchAdviceReference(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionDespatchAdviceReference());

        static::$document->getDocumentPositionDespatchAdviceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(static::$document->nextDocumentPositionDespatchAdviceReference());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionReceivingAdviceReference(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionReceivingAdviceReference());

        static::$document->getDocumentPositionReceivingAdviceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(static::$document->nextDocumentPositionReceivingAdviceReference());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionDeliveryNoteReference(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionDeliveryNoteReference());

        static::$document->getDocumentPositionDeliveryNoteReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(static::$document->nextDocumentPositionDeliveryNoteReference());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionInvoiceReference(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionInvoiceReference());

        static::$document->getDocumentPositionInvoiceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate,
            $newTypeCode
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);
        $this->assertSame('', $newTypeCode);

        $this->assertFalse(static::$document->nextDocumentPositionInvoiceReference());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstGetDcumentPositionGrossPrice(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDcumentPositionGrossPrice());

        static::$document->getDocumentPositionGrossPrice(
            $newGrossPrice,
            $newGrossPriceBasisQuantity,
            $newGrossPriceBasisQuantityUnit
        );

        $this->assertEqualsWithDelta(0.0, $newGrossPrice, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newGrossPriceBasisQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newGrossPriceBasisQuantityUnit);

        $this->assertFalse(static::$document->firstDocumentPositionGrossPriceAllowanceCharge());

        static::$document->getDocumentPositionGrossPriceAllowanceCharge(
            $newGrossPriceAllowanceChargeAmount,
            $newIsCharge,
            $newGrossPriceAllowanceChargePercent,
            $newGrossPriceAllowanceChargeBasisAmount,
            $newGrossPriceAllowanceChargeReason,
            $newGrossPriceAllowanceChargeReasonCode
        );

        $this->assertEqualsWithDelta(0.0, $newGrossPriceAllowanceChargeAmount, PHP_FLOAT_EPSILON);
        $this->assertFalse($newIsCharge);
        $this->assertEqualsWithDelta(0.0, $newGrossPriceAllowanceChargePercent, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newGrossPriceAllowanceChargeBasisAmount, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newGrossPriceAllowanceChargeReason);
        $this->assertSame('', $newGrossPriceAllowanceChargeReasonCode);

        $this->assertFalse(static::$document->nextDocumentPositionGrossPriceAllowanceCharge());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstGetDocumentPositionNetPrice(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionNetPrice());

        static::$document->getDocumentPositionNetPrice(
            $newNetPrice,
            $newNetPriceBasisQuantity,
            $newNetPriceBasisQuantityUnit
        );

        $this->assertEqualsWithDelta(0.0, $newNetPrice, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newNetPriceBasisQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newNetPriceBasisQuantityUnit);

        static::$document->getDocumentPositionNetPriceTax(
            $newTaxCategory,
            $newTaxType,
            $newTaxAmount,
            $newTaxPercent,
            $newExemptionReason,
            $newExemptionReasonCode
        );

        $this->assertSame('', $newTaxCategory);
        $this->assertSame('', $newTaxType);
        $this->assertEqualsWithDelta(0.0, $newTaxAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newTaxPercent, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newExemptionReason);
        $this->assertSame('', $newExemptionReasonCode);

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testGetDocumentPositionQuantities(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        static::$document->getDocumentPositionQuantities(
            $newQuantity,
            $newQuantityUnit,
            $newChargeFreeQuantity,
            $newChargeFreeQuantityUnit,
            $newPackageQuantity,
            $newPackageQuantityUnit
        );

        $this->assertEqualsWithDelta(0.0, $newQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newQuantityUnit);
        $this->assertEqualsWithDelta(0.0, $newChargeFreeQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newChargeFreeQuantityUnit);
        $this->assertEqualsWithDelta(0.0, $newPackageQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newPackageQuantityUnit);

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testGetDocumentPositionShipTo(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        // Name

        static::$document->getDocumentPositionShipToName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(static::$document->firstDocumentPositionShipToId());

        static::$document->getDocumentPositionShipToId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(static::$document->nextDocumentPositionShipToId());

        // Global ID

        $this->assertFalse(static::$document->firstDocumentPositionShipToGlobalId());

        static::$document->getDocumentPositionShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentPositionShipToGlobalId());

        static::$document->getDocumentPositionShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentPositionShipToGlobalId());

        // Tax Registration

        $this->assertFalse(static::$document->firstDocumentPositionShipToTaxRegistration());

        static::$document->getDocumentPositionShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(static::$document->nextDocumentPositionShipToTaxRegistration());

        // Address

        $this->assertFalse(static::$document->firstDocumentPositionShipToAddress());

        static::$document->getDocumentPositionShipToAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->assertSame('', $newAddressLine1);
        $this->assertSame('', $newAddressLine2);
        $this->assertSame('', $newAddressLine3);
        $this->assertSame('', $newPostcode);
        $this->assertSame('', $newCity);
        $this->assertSame('', $newCountryId);
        $this->assertSame('', $newSubDivision);

        $this->assertFalse(static::$document->nextDocumentPositionShipToAddress());

        // Legal Organisation

        $this->assertFalse(static::$document->firstDocumentPositionShipToLegalOrganisation());

        static::$document->getDocumentPositionShipToLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(static::$document->nextDocumentPositionShipToLegalOrganisation());

        // Contact

        $this->assertFalse(static::$document->firstDocumentPositionShipToContact());

        static::$document->getDocumentPositionShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('', $newPersonName);
        $this->assertSame('', $newDepartmentName);
        $this->assertSame('', $newPhoneNumber);
        $this->assertSame('', $newFaxNumber);
        $this->assertSame('', $newEmailAddress);

        $this->assertFalse(static::$document->nextDocumentPositionShipToContact());

        // Communication

        $this->assertFalse(static::$document->firstDocumentPositionShipToCommunication());

        static::$document->getDocumentPositionShipToCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(static::$document->nextDocumentPositionShipToCommunication());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testGetDocumentPositionUltimateShipTo(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        // Name

        static::$document->getDocumentPositionUltimateShipToName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(static::$document->firstDocumentPositionUltimateShipToId());

        static::$document->getDocumentPositionUltimateShipToId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(static::$document->nextDocumentPositionUltimateShipToId());

        // Global ID

        $this->assertFalse(static::$document->firstDocumentPositionUltimateShipToGlobalId());

        static::$document->getDocumentPositionUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentPositionUltimateShipToGlobalId());

        static::$document->getDocumentPositionUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentPositionUltimateShipToGlobalId());

        // Tax Registration

        $this->assertFalse(static::$document->firstDocumentPositionUltimateShipToTaxRegistration());

        static::$document->getDocumentPositionUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(static::$document->nextDocumentPositionUltimateShipToTaxRegistration());

        // Address

        $this->assertFalse(static::$document->firstDocumentPositionUltimateShipToAddress());

        static::$document->getDocumentPositionUltimateShipToAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->assertSame('', $newAddressLine1);
        $this->assertSame('', $newAddressLine2);
        $this->assertSame('', $newAddressLine3);
        $this->assertSame('', $newPostcode);
        $this->assertSame('', $newCity);
        $this->assertSame('', $newCountryId);
        $this->assertSame('', $newSubDivision);

        $this->assertFalse(static::$document->nextDocumentPositionUltimateShipToAddress());

        // Legal Organisation

        $this->assertFalse(static::$document->firstDocumentPositionUltimateShipToLegalOrganisation());

        static::$document->getDocumentPositionUltimateShipToLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(static::$document->nextDocumentPositionUltimateShipToLegalOrganisation());

        // Contact

        $this->assertFalse(static::$document->firstDocumentPositionUltimateShipToContact());

        static::$document->getDocumentPositionUltimateShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('', $newPersonName);
        $this->assertSame('', $newDepartmentName);
        $this->assertSame('', $newPhoneNumber);
        $this->assertSame('', $newFaxNumber);
        $this->assertSame('', $newEmailAddress);

        $this->assertFalse(static::$document->nextDocumentPositionUltimateShipToContact());

        // Communication

        $this->assertFalse(static::$document->firstDocumentPositionUltimateShipToCommunication());

        static::$document->getDocumentPositionUltimateShipToCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(static::$document->nextDocumentPositionUltimateShipToCommunication());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testGetDocumentPositionSupplyChainEvent(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        static::$document->getDocumentPositionSupplyChainEvent($newDate);

        $this->assertNotInstanceOf(DateTimeInterface::class, $newDate);

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionBillingPeriod(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionBillingPeriod());

        static::$document->getDocumentPositionBillingPeriod(
            $newStartDate,
            $newEndDate,
            $newDescription
        );

        $this->assertNotInstanceOf(DateTimeInterface::class, $newStartDate);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newEndDate);
        $this->assertSame('', $newDescription);

        $this->assertFalse(static::$document->nextDocumentPositionBillingPeriod());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionTax(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionTax());

        static::$document->getDocumentPositionTax(
            $newTaxCategory,
            $newTaxType,
            $newTaxAmount,
            $newTaxPercent,
            $newExemptionReason,
            $newExemptionReasonCode,
        );

        $this->assertSame('', $newTaxCategory);
        $this->assertSame('', $newTaxType);
        $this->assertEqualsWithDelta(0.0, $newTaxAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newTaxPercent, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newExemptionReason);
        $this->assertSame('', $newExemptionReasonCode);

        $this->assertFalse(static::$document->nextDocumentPositionTax());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionAllowanceCharge(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionAllowanceCharge());

        static::$document->getDocumentPositionAllowanceCharge(
            $newChargeIndicator,
            $newAllowanceChargeAmount,
            $newAllowanceChargeBaseAmount,
            $newAllowanceChargeReason,
            $newAllowanceChargeReasonCode,
            $newAllowanceChargePercent
        );

        $this->assertFalse($newChargeIndicator);
        $this->assertEqualsWithDelta(0.00, $newAllowanceChargeAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.00, $newAllowanceChargeBaseAmount, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newAllowanceChargeReason);
        $this->assertSame('', $newAllowanceChargeReasonCode);
        $this->assertEqualsWithDelta(0.00, $newAllowanceChargePercent, PHP_FLOAT_EPSILON);

        $this->assertFalse(static::$document->nextDocumentPositionAllowanceCharge());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstGetDocumentPositionSummation(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionSummation());

        static::$document->getDocumentPositionSummation(
            $newNetAmount,
            $newChargeTotalAmount,
            $newDiscountTotalAmount,
            $newTaxTotalAmount,
            $newGrossAmount
        );

        $this->assertEqualsWithDelta(0.0, $newNetAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newChargeTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newDiscountTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newTaxTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newGrossAmount, PHP_FLOAT_EPSILON);

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionPostingReference(): void
    {
        // First position

        $this->assertFalse(static::$document->firstDocumentPosition());

        $this->assertFalse(static::$document->firstDocumentPositionPostingReference());

        static::$document->getDocumentPositionPostingReference($newType, $newAccountId);

        $this->assertSame('', $newType);
        $this->assertSame('', $newAccountId);

        $this->assertFalse(static::$document->nextDocumentPositionPostingReference());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testConvertToDTO(): void
    {
        static::$document->convertToDTO($newDocmentDTO);

        $this->assertInstanceOf(InvoiceSuiteDocumentHeaderDTO::class, $newDocmentDTO);

        $this->assertSame('2025-04-000001', $newDocmentDTO->getNumber());
    }
}
