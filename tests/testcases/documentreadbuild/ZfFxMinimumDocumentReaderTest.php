<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentreadbuild;

use DateTimeInterface;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

final class ZfFxMinimumDocumentReaderTest extends TestCase
{
    /**
     * The reader
     *
     * @var InvoiceSuiteDocumentReader
     */
    private static $document;

    public static function setUpBeforeClass(): void
    {
        self::$document = InvoiceSuiteDocumentReader::createFromFile(
            InvoiceSuitePathUtils::combinePathWithFile(
                InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
                '02_technical_xml_zffx_minimum.xml'
            )
        );
    }

    public function testDocumentCurrentFormatProvider(): void
    {
        $this->assertInstanceOf(InvoiceSuiteDocumentReader::class, self::$document);
        $this->assertSame('zffxminimum', self::$document->getCurrentDocumentFormatProvider()->getUniqueId());
    }

    public function testGetDocumentNo(): void
    {
        self::$document->getDocumentNo($newDocumentNo);

        $this->assertSame('2025-04-000001', $newDocumentNo);
    }

    public function testGetDocumentType(): void
    {
        self::$document->getDocumentType($newDocumentType);

        $this->assertSame('380', $newDocumentType);
    }

    public function testGetDocumentDescription(): void
    {
        self::$document->getDocumentDescription($newDocumentDescription);

        $this->assertSame('', $newDocumentDescription);
    }

    public function testGetDocumentLanguage(): void
    {
        self::$document->getDocumentLanguage($newDocumentLanguage);

        $this->assertSame('', $newDocumentLanguage);
    }

    public function testGetDocumentDate(): void
    {
        self::$document->getDocumentDate($newDocumentDate);

        $this->assertInstanceOf(DateTimeInterface::class, $newDocumentDate);
        $this->assertSame('19700101', $newDocumentDate->format('Ymd'));
    }

    public function testGetDocumentCompleteDate(): void
    {
        self::$document->getDocumentCompleteDate($newCompleteDate);

        $this->assertNotInstanceOf(DateTimeInterface::class, $newCompleteDate);
    }

    public function testGetDocumentCurrency(): void
    {
        self::$document->getDocumentCurrency($newDocumentCurrency);

        $this->assertSame('EUR', $newDocumentCurrency);
    }

    public function testGetDocumentTaxCurrency(): void
    {
        self::$document->getDocumentTaxCurrency($newDocumentTaxCurrency);

        $this->assertSame('', $newDocumentTaxCurrency);
    }

    public function testGetDocumentIsCopy(): void
    {
        self::$document->getDocumentIsCopy($newDocumentIsCopy);

        $this->assertFalse($newDocumentIsCopy);
    }

    public function testGetDocumentIsTest(): void
    {
        self::$document->getDocumentIsTest($newDocumentIsTest);

        $this->assertFalse($newDocumentIsTest);
    }

    public function testFirstNextGetDocumentNote(): void
    {
        $this->assertFalse(self::$document->firstDocumentNote());

        self::$document->getDocumentNote($newContent, $newContentCode, $newSubjectCode);

        $this->assertSame('', $newContent);
        $this->assertSame('', $newContentCode);
        $this->assertSame('', $newSubjectCode);

        $this->assertFalse(self::$document->nextDocumentNote());

        self::$document->getDocumentNote($newContent, $newContentCode, $newSubjectCode);

        $this->assertSame('', $newContent);
        $this->assertSame('', $newContentCode);
        $this->assertSame('', $newSubjectCode);

        $this->assertFalse(self::$document->nextDocumentNote());
    }

    public function testFirstNextGetDocumentBillingPeriod(): void
    {
        $this->assertFalse(self::$document->firstDocumentBillingPeriod());

        self::$document->getDocumentBillingPeriod($newStartDate, $newEndDate, $newDescription);

        $this->assertNotInstanceOf(DateTimeInterface::class, $newStartDate);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newEndDate);
        $this->assertSame('', $newDescription);

        $this->assertFalse(self::$document->nextDocumentBillingPeriod());
    }

    public function testFirstNextGetDocumentPostingReference(): void
    {
        $this->assertFalse(self::$document->firstDocumentPostingReference());

        self::$document->getDocumentPostingReference($newType, $newAccountId);

        $this->assertSame('', $newType);
        $this->assertSame('', $newAccountId);

        $this->assertFalse(self::$document->nextDocumentPostingReference());
    }

    public function testFirstNextGetDocumentSellerOrderReference(): void
    {
        $this->assertFalse(self::$document->firstDocumentSellerOrderReference());

        self::$document->getDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(self::$document->nextDocumentSellerOrderReference());
    }

    public function testFirstNextGetDocumentBuyerOrderReference(): void
    {
        $this->assertTrue(self::$document->firstDocumentBuyerOrderReference());

        self::$document->getDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('BO-1', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(self::$document->nextDocumentBuyerOrderReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentQuotationReference(): void
    {
        $this->assertFalse(self::$document->firstDocumentQuotationReference());

        self::$document->getDocumentQuotationReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(self::$document->nextDocumentQuotationReference());
    }

    public function testFirstNextGetDocumentContractReference(): void
    {
        $this->assertFalse(self::$document->firstDocumentContractReference());

        self::$document->getDocumentContractReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(self::$document->nextDocumentContractReference());
    }

    public function testFirstNextGetDocumentAdditionalReference(): void
    {
        $this->assertFalse(self::$document->firstDocumentAdditionalReference());

        self::$document->getDocumentAdditionalReference(
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

        $this->assertFalse(self::$document->nextDocumentAdditionalReference());
    }

    public function testFirstNextGetDocumentInvoiceReference(): void
    {
        $this->assertFalse(self::$document->firstDocumentInvoiceReference());

        self::$document->getDocumentInvoiceReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);
        $this->assertSame('', $newTypeCode);

        $this->assertFalse(self::$document->nextDocumentInvoiceReference());
    }

    public function testFirstNextGetDocumentProjectReference(): void
    {
        $this->assertFalse(self::$document->firstDocumentProjectReference());

        self::$document->getDocumentProjectReference($newReferenceNumber, $newName);

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newName);

        $this->assertFalse(self::$document->nextDocumentProjectReference());
    }

    public function testFirstNextGetDocumentUltimateCustomerOrderReference(): void
    {
        $this->assertFalse(self::$document->firstDocumentUltimateCustomerOrderReference());

        self::$document->getDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(self::$document->nextDocumentUltimateCustomerOrderReference());

        self::$document->getDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(self::$document->nextDocumentUltimateCustomerOrderReference());
    }

    public function testFirstNextGetDocumentDespatchAdviceReference(): void
    {
        $this->assertFalse(self::$document->firstDocumentDespatchAdviceReference());

        self::$document->getDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(self::$document->nextDocumentDespatchAdviceReference());
    }

    public function testFirstNextGetDocumentReceivingAdviceReference(): void
    {
        $this->assertFalse(self::$document->firstDocumentReceivingAdviceReference());

        self::$document->getDocumentReceivingAdviceReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(self::$document->nextDocumentReceivingAdviceReference());
    }

    public function testFirstNextGetDocumentDeliveryNoteReference(): void
    {
        $this->assertFalse(self::$document->firstDocumentDeliveryNoteReference());

        self::$document->getDocumentDeliveryNoteReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('', $newReferenceNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(self::$document->nextDocumentDeliveryNoteReference());
    }

    public function testGetDocumentSupplyChainEvent(): void
    {
        self::$document->getDocumentSupplyChainEvent($newDate);

        $this->assertNotInstanceOf(DateTimeInterface::class, $newDate);
    }

    public function testGetDocumentBuyerReference(): void
    {
        self::$document->getDocumentBuyerReference($newBuyerReference);

        $this->assertSame('LEITWEGID', $newBuyerReference);
    }

    public function testDocumentSeller(): void
    {
        // Name

        self::$document->getDocumentSellerName($newName);

        $this->assertSame('Lieferant GmbH', $newName);

        // ID

        $this->assertFalse(self::$document->firstDocumentSellerId());

        self::$document->getDocumentSellerId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(self::$document->nextDocumentSellerId());

        self::$document->getDocumentSellerId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(self::$document->nextDocumentSellerId());

        // Global ID

        $this->assertFalse(self::$document->firstDocumentSellerGlobalId());

        self::$document->getDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentSellerGlobalId());

        self::$document->getDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentSellerGlobalId());

        // Tax Registration

        $this->assertTrue(self::$document->firstDocumentSellerTaxRegistration());

        self::$document->getDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('893489787987', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertTrue(self::$document->nextDocumentSellerTaxRegistration());

        self::$document->getDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('893489787987-X', $newTaxRegistrationId);
        $this->assertSame('FC', $newTaxRegistrationType);

        $this->assertTrue(self::$document->nextDocumentSellerTaxRegistration());

        self::$document->getDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('893489787987-AA', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentSellerTaxRegistration());

        // Address

        $this->assertTrue(self::$document->firstDocumentSellerAddress());

        self::$document->getDocumentSellerAddress(
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

        $this->assertFalse(self::$document->nextDocumentSellerAddress());

        // Legal Organisation

        $this->assertTrue(self::$document->firstDocumentSellerLegalOrganisation());

        self::$document->getDocumentSellerLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(self::$document->nextDocumentSellerLegalOrganisation());

        // Contact

        $this->assertFalse(self::$document->firstDocumentSellerContact());

        self::$document->getDocumentSellerContact(
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

        $this->assertFalse(self::$document->nextDocumentSellerContact());

        // Communication

        $this->assertFalse(self::$document->firstDocumentSellerCommunication());

        self::$document->getDocumentSellerCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(self::$document->nextDocumentSellerCommunication());

        // Finals

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentSellerId($newId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentSellerAddress(
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
            self::$document->getDocumentSellerLegalOrganisation($newType, $newId, $newName);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentSellerContact(
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentSellerCommunication($newType, $newUri);
        }, '/Undefined (array key|index)/');
    }

    public function testDocumentBuyer(): void
    {
        // Name

        self::$document->getDocumentBuyerName($newName);

        $this->assertSame('Kunde GmbH', $newName);

        // ID

        $this->assertFalse(self::$document->firstDocumentBuyerId());

        self::$document->getDocumentBuyerId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(self::$document->nextDocumentBuyerId());

        // Global ID

        $this->assertFalse(self::$document->firstDocumentBuyerGlobalId());

        self::$document->getDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentBuyerGlobalId());

        self::$document->getDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentBuyerGlobalId());

        // Tax Registration

        $this->assertTrue(self::$document->firstDocumentBuyerTaxRegistration());

        self::$document->getDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('893489787987', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentBuyerTaxRegistration());

        // Address

        $this->assertTrue(self::$document->firstDocumentBuyerAddress());

        self::$document->getDocumentBuyerAddress(
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

        $this->assertFalse(self::$document->nextDocumentBuyerAddress());

        // Legal Organisation

        $this->assertTrue(self::$document->firstDocumentBuyerLegalOrganisation());

        self::$document->getDocumentBuyerLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(self::$document->nextDocumentBuyerLegalOrganisation());

        // Contact

        $this->assertFalse(self::$document->firstDocumentBuyerContact());

        self::$document->getDocumentBuyerContact(
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

        $this->assertFalse(self::$document->nextDocumentBuyerContact());

        // Communication

        $this->assertFalse(self::$document->firstDocumentBuyerCommunication());

        self::$document->getDocumentBuyerCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(self::$document->nextDocumentBuyerCommunication());

        // Finals

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentBuyerId($newId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentBuyerAddress(
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
            self::$document->getDocumentBuyerLegalOrganisation($newType, $newId, $newName);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentBuyerContact(
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentBuyerCommunication($newType, $newUri);
        }, '/Undefined (array key|index)/');
    }

    public function testDocumentTaxRepresentative(): void
    {
        // Name

        self::$document->getDocumentTaxRepresentativeName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(self::$document->firstDocumentTaxRepresentativeId());

        self::$document->getDocumentTaxRepresentativeId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(self::$document->nextDocumentTaxRepresentativeId());

        // Global ID

        $this->assertFalse(self::$document->firstDocumentTaxRepresentativeGlobalId());

        self::$document->getDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentTaxRepresentativeGlobalId());

        self::$document->getDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentTaxRepresentativeGlobalId());

        // Tax Registration

        $this->assertFalse(self::$document->firstDocumentTaxRepresentativeTaxRegistration());

        self::$document->getDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentTaxRepresentativeTaxRegistration());

        // Address

        $this->assertFalse(self::$document->firstDocumentTaxRepresentativeAddress());

        self::$document->getDocumentTaxRepresentativeAddress(
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

        $this->assertFalse(self::$document->nextDocumentTaxRepresentativeAddress());

        // Legal Organisation

        $this->assertFalse(self::$document->firstDocumentTaxRepresentativeLegalOrganisation());

        self::$document->getDocumentTaxRepresentativeLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(self::$document->nextDocumentTaxRepresentativeLegalOrganisation());

        // Contact

        $this->assertFalse(self::$document->firstDocumentTaxRepresentativeContact());

        self::$document->getDocumentTaxRepresentativeContact(
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

        $this->assertFalse(self::$document->nextDocumentTaxRepresentativeContact());

        // Communication

        $this->assertFalse(self::$document->firstDocumentTaxRepresentativeCommunication());

        self::$document->getDocumentTaxRepresentativeCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(self::$document->nextDocumentTaxRepresentativeCommunication());
    }

    public function testDocumentProductEndUser(): void
    {
        // Name

        self::$document->getDocumentProductEndUserName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(self::$document->firstDocumentProductEndUserId());

        self::$document->getDocumentProductEndUserId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(self::$document->nextDocumentProductEndUserId());

        // Global ID

        $this->assertFalse(self::$document->firstDocumentProductEndUserGlobalId());

        self::$document->getDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentProductEndUserGlobalId());

        self::$document->getDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentProductEndUserGlobalId());

        // Tax Registration

        $this->assertFalse(self::$document->firstDocumentProductEndUserTaxRegistration());

        self::$document->getDocumentProductEndUserTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentProductEndUserTaxRegistration());

        // Address

        $this->assertFalse(self::$document->firstDocumentProductEndUserAddress());

        self::$document->getDocumentProductEndUserAddress(
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

        $this->assertFalse(self::$document->nextDocumentProductEndUserAddress());

        // Legal Organisation

        $this->assertFalse(self::$document->firstDocumentProductEndUserLegalOrganisation());

        self::$document->getDocumentProductEndUserLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(self::$document->nextDocumentProductEndUserLegalOrganisation());

        // Contact

        $this->assertFalse(self::$document->firstDocumentProductEndUserContact());

        self::$document->getDocumentProductEndUserContact(
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

        $this->assertFalse(self::$document->nextDocumentProductEndUserContact());

        // Communication

        $this->assertFalse(self::$document->firstDocumentProductEndUserCommunication());

        self::$document->getDocumentProductEndUserCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(self::$document->nextDocumentProductEndUserCommunication());
    }

    public function testDocumentShipTo(): void
    {
        // Name

        self::$document->getDocumentShipToName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(self::$document->firstDocumentShipToId());

        self::$document->getDocumentShipToId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(self::$document->nextDocumentShipToId());

        // Global ID

        $this->assertFalse(self::$document->firstDocumentShipToGlobalId());

        self::$document->getDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentShipToGlobalId());

        self::$document->getDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentShipToGlobalId());

        // Tax Registration

        $this->assertFalse(self::$document->firstDocumentShipToTaxRegistration());

        self::$document->getDocumentShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentShipToTaxRegistration());

        // Address

        $this->assertFalse(self::$document->firstDocumentShipToAddress());

        self::$document->getDocumentShipToAddress(
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

        $this->assertFalse(self::$document->nextDocumentShipToAddress());

        // Legal Organisation

        $this->assertFalse(self::$document->firstDocumentShipToLegalOrganisation());

        self::$document->getDocumentShipToLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(self::$document->nextDocumentShipToLegalOrganisation());

        // Contact

        $this->assertFalse(self::$document->firstDocumentShipToContact());

        self::$document->getDocumentShipToContact(
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

        $this->assertFalse(self::$document->nextDocumentShipToContact());

        // Communication

        $this->assertFalse(self::$document->firstDocumentShipToCommunication());

        self::$document->getDocumentShipToCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(self::$document->nextDocumentShipToCommunication());
    }

    public function testDocumentUltimateShipTo(): void
    {
        // Name

        self::$document->getDocumentUltimateShipToName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(self::$document->firstDocumentUltimateShipToId());

        self::$document->getDocumentUltimateShipToId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(self::$document->nextDocumentUltimateShipToId());

        // Global ID

        $this->assertFalse(self::$document->firstDocumentUltimateShipToGlobalId());

        self::$document->getDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentUltimateShipToGlobalId());

        self::$document->getDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentUltimateShipToGlobalId());

        // Tax Registration

        $this->assertFalse(self::$document->firstDocumentUltimateShipToTaxRegistration());

        self::$document->getDocumentUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentUltimateShipToTaxRegistration());

        // Address

        $this->assertFalse(self::$document->firstDocumentUltimateShipToAddress());

        self::$document->getDocumentUltimateShipToAddress(
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

        $this->assertFalse(self::$document->nextDocumentUltimateShipToAddress());

        // Legal Organisation

        $this->assertFalse(self::$document->firstDocumentUltimateShipToLegalOrganisation());

        self::$document->getDocumentUltimateShipToLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(self::$document->nextDocumentUltimateShipToLegalOrganisation());

        // Contact

        $this->assertFalse(self::$document->firstDocumentUltimateShipToContact());

        self::$document->getDocumentUltimateShipToContact(
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

        $this->assertFalse(self::$document->nextDocumentUltimateShipToContact());

        // Communication

        $this->assertFalse(self::$document->firstDocumentUltimateShipToCommunication());

        self::$document->getDocumentUltimateShipToCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(self::$document->nextDocumentUltimateShipToCommunication());
    }

    public function testDocumentShipFrom(): void
    {
        // Name

        self::$document->getDocumentShipFromName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(self::$document->firstDocumentShipFromId());

        self::$document->getDocumentShipFromId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(self::$document->nextDocumentShipFromId());

        // Global ID

        $this->assertFalse(self::$document->firstDocumentShipFromGlobalId());

        self::$document->getDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentShipFromGlobalId());

        self::$document->getDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentShipFromGlobalId());

        // Tax Registration

        $this->assertFalse(self::$document->firstDocumentShipFromTaxRegistration());

        self::$document->getDocumentShipFromTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentShipFromTaxRegistration());

        // Address

        $this->assertFalse(self::$document->firstDocumentShipFromAddress());

        self::$document->getDocumentShipFromAddress(
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

        $this->assertFalse(self::$document->nextDocumentShipFromAddress());

        // Legal Organisation

        $this->assertFalse(self::$document->firstDocumentShipFromLegalOrganisation());

        self::$document->getDocumentShipFromLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(self::$document->nextDocumentShipFromLegalOrganisation());

        // Contact

        $this->assertFalse(self::$document->firstDocumentShipFromContact());

        self::$document->getDocumentShipFromContact(
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

        $this->assertFalse(self::$document->nextDocumentShipFromContact());

        // Communication

        $this->assertFalse(self::$document->firstDocumentShipFromCommunication());

        self::$document->getDocumentShipFromCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(self::$document->nextDocumentShipFromCommunication());
    }

    public function testDocumentInvoicer(): void
    {
        // Name

        self::$document->getDocumentInvoicerName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(self::$document->firstDocumentInvoicerId());

        self::$document->getDocumentInvoicerId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(self::$document->nextDocumentInvoicerId());

        // Global ID

        $this->assertFalse(self::$document->firstDocumentInvoicerGlobalId());

        self::$document->getDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentInvoicerGlobalId());

        self::$document->getDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentInvoicerGlobalId());

        // Tax Registration

        $this->assertFalse(self::$document->firstDocumentInvoicerTaxRegistration());

        self::$document->getDocumentInvoicerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentInvoicerTaxRegistration());

        // Address

        $this->assertFalse(self::$document->firstDocumentInvoicerAddress());

        self::$document->getDocumentInvoicerAddress(
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

        $this->assertFalse(self::$document->nextDocumentInvoicerAddress());

        // Legal Organisation

        $this->assertFalse(self::$document->firstDocumentInvoicerLegalOrganisation());

        self::$document->getDocumentInvoicerLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(self::$document->nextDocumentInvoicerLegalOrganisation());

        // Contact

        $this->assertFalse(self::$document->firstDocumentInvoicerContact());

        self::$document->getDocumentInvoicerContact(
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

        $this->assertFalse(self::$document->nextDocumentInvoicerContact());

        // Communication

        $this->assertFalse(self::$document->firstDocumentInvoicerCommunication());

        self::$document->getDocumentInvoicerCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(self::$document->nextDocumentInvoicerCommunication());
    }

    public function testDocumentInvoicee(): void
    {
        // Name

        self::$document->getDocumentInvoiceeName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(self::$document->firstDocumentInvoiceeId());

        self::$document->getDocumentInvoiceeId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(self::$document->nextDocumentInvoiceeId());

        // Global ID

        $this->assertFalse(self::$document->firstDocumentInvoiceeGlobalId());

        self::$document->getDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentInvoiceeGlobalId());

        self::$document->getDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentInvoiceeGlobalId());

        // Tax Registration

        $this->assertFalse(self::$document->firstDocumentInvoiceeTaxRegistration());

        self::$document->getDocumentInvoiceeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentInvoiceeTaxRegistration());

        // Address

        $this->assertFalse(self::$document->firstDocumentInvoiceeAddress());

        self::$document->getDocumentInvoiceeAddress(
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

        $this->assertFalse(self::$document->nextDocumentInvoiceeAddress());

        // Legal Organisation

        $this->assertFalse(self::$document->firstDocumentInvoiceeLegalOrganisation());

        self::$document->getDocumentInvoiceeLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(self::$document->nextDocumentInvoiceeLegalOrganisation());

        // Contact

        $this->assertFalse(self::$document->firstDocumentInvoiceeContact());

        self::$document->getDocumentInvoiceeContact(
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

        $this->assertFalse(self::$document->nextDocumentInvoiceeContact());

        // Communication

        $this->assertFalse(self::$document->firstDocumentInvoiceeCommunication());

        self::$document->getDocumentInvoiceeCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(self::$document->nextDocumentInvoiceeCommunication());
    }

    public function testDocumentPayee(): void
    {
        // Name

        self::$document->getDocumentPayeeName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(self::$document->firstDocumentPayeeId());

        self::$document->getDocumentPayeeId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(self::$document->nextDocumentPayeeId());

        // Global ID

        $this->assertFalse(self::$document->firstDocumentPayeeGlobalId());

        self::$document->getDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentPayeeGlobalId());

        self::$document->getDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentPayeeGlobalId());

        // Tax Registration

        $this->assertFalse(self::$document->firstDocumentPayeeTaxRegistration());

        self::$document->getDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentPayeeTaxRegistration());

        // Address

        $this->assertFalse(self::$document->firstDocumentPayeeAddress());

        self::$document->getDocumentPayeeAddress(
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

        $this->assertFalse(self::$document->nextDocumentPayeeAddress());

        // Legal Organisation

        $this->assertFalse(self::$document->firstDocumentPayeeLegalOrganisation());

        self::$document->getDocumentPayeeLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(self::$document->nextDocumentPayeeLegalOrganisation());

        // Contact

        $this->assertFalse(self::$document->firstDocumentPayeeContact());

        self::$document->getDocumentPayeeContact(
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

        $this->assertFalse(self::$document->nextDocumentPayeeContact());

        // Communication

        $this->assertFalse(self::$document->firstDocumentPayeeCommunication());

        self::$document->getDocumentPayeeCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(self::$document->nextDocumentPayeeCommunication());
    }

    public function testFirstNextGetDocumentPaymentMean(): void
    {
        $this->assertFalse(self::$document->firstDocumentPaymentMean());
        $this->assertFalse(self::$document->nextDocumentPaymentMean());
    }

    public function testFirstNextGetDocumentPaymentCreditorReferenceID(): void
    {
        $this->assertFalse(self::$document->firstDocumentPaymentCreditorReferenceID());
        $this->assertFalse(self::$document->nextDocumentPaymentCreditorReferenceID());
    }

    public function testFirstNextGetDocumentPaymentTerm(): void
    {
        $this->assertFalse(self::$document->firstDocumentPaymentTerm());
        $this->assertFalse(self::$document->nextDocumentPaymentTerm());
    }

    public function testFirstNextGetDocumentTax(): void
    {
        $this->assertFalse(self::$document->firstDocumentTax());
        $this->assertFalse(self::$document->nextDocumentTax());
    }

    public function testFirstNextGetDocumentAllowanceCharge(): void
    {
        $this->assertFalse(self::$document->firstDocumentAllowanceCharge());
        $this->assertFalse(self::$document->nextDocumentAllowanceCharge());
    }

    public function testFirstNextGetDocumentLogisticServiceCharge(): void
    {
        $this->assertFalse(self::$document->firstDocumentLogisticServiceCharge());

        self::$document->getDocumentLogisticServiceCharge(
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

        $this->assertFalse(self::$document->nextDocumentLogisticServiceCharge());
    }

    public function testGetDocumentSummation(): void
    {
        self::$document->getDocumentSummation(
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

        $this->assertFalse(self::$document->firstDocumentPosition());

        self::$document->getDocumentPosition(
            $newPositionId,
            $newParentPositionId,
            $newLineStatusCode,
            $newLineStatusReasonCode
        );

        $this->assertSame('', $newPositionId);
        $this->assertSame('', $newParentPositionId);
        $this->assertSame('', $newLineStatusCode);
        $this->assertSame('', $newLineStatusReasonCode);

        $this->assertFalse(self::$document->firstDocumentPositionNote());

        self::$document->getDocumentPositionNote(
            $newContent,
            $newContentCode,
            $newSubjectCode
        );

        $this->assertSame('', $newContent);
        $this->assertSame('', $newContentCode);
        $this->assertSame('', $newSubjectCode);

        $this->assertFalse(self::$document->nextDocumentPositionNote());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testGetDocumentPositionProductDetails(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        self::$document->getDocumentPositionProductDetails(
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

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionProductCharacteristic(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionProductCharacteristic());

        self::$document->getDocumentPositionProductCharacteristic(
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

        $this->assertFalse(self::$document->nextDocumentPositionProductCharacteristic());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionProductClassification(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionProductClassification());

        self::$document->getDocumentPositionProductClassification(
            $newProductClassificationCode,
            $newProductClassificationListId,
            $newProductClassificationListVersionId,
            $newProductClassificationCodeClassname
        );

        $this->assertSame('', $newProductClassificationCode);
        $this->assertSame('', $newProductClassificationListId);
        $this->assertSame('', $newProductClassificationListVersionId);
        $this->assertSame('', $newProductClassificationCodeClassname);

        $this->assertFalse(self::$document->nextDocumentPositionProductClassification());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetPositionReferencedProduct(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionReferencedProduct());

        self::$document->getDocumentPositionReferencedProduct(
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

        $this->assertFalse(self::$document->nextDocumentPositionReferencedProduct());

        self::$document->getDocumentPositionReferencedProduct(
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

        $this->assertFalse(self::$document->nextDocumentPositionReferencedProduct());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionSellerOrderReference(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionSellerOrderReference());

        self::$document->getDocumentPositionSellerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(self::$document->nextDocumentPositionSellerOrderReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionBuyerOrderReference(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionBuyerOrderReference());

        self::$document->getDocumentPositionBuyerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(self::$document->nextDocumentPositionBuyerOrderReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionQuotationReference(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionQuotationReference());

        self::$document->getDocumentPositionQuotationReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(self::$document->nextDocumentPositionQuotationReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionContractReference(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionContractReference());

        self::$document->getDocumentPositionContractReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(self::$document->nextDocumentPositionContractReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionAdditionalReference(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionAdditionalReference());

        self::$document->getDocumentPositionAdditionalReference(
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

        $this->assertFalse(self::$document->nextDocumentPositionAdditionalReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionUltimateCustomerOrderReference(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionUltimateCustomerOrderReference());

        self::$document->getDocumentPositionUltimateCustomerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(self::$document->nextDocumentPositionUltimateCustomerOrderReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionDespatchAdviceReference(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionDespatchAdviceReference());

        self::$document->getDocumentPositionDespatchAdviceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(self::$document->nextDocumentPositionDespatchAdviceReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionReceivingAdviceReference(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionReceivingAdviceReference());

        self::$document->getDocumentPositionReceivingAdviceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(self::$document->nextDocumentPositionReceivingAdviceReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionDeliveryNoteReference(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionDeliveryNoteReference());

        self::$document->getDocumentPositionDeliveryNoteReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);

        $this->assertFalse(self::$document->nextDocumentPositionDeliveryNoteReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionInvoiceReference(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionInvoiceReference());

        self::$document->getDocumentPositionInvoiceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate,
            $newTypeCode
        );

        $this->assertSame('', $newReferenceNumber);
        $this->assertSame('', $newReferenceLineNumber);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newReferenceDate);
        $this->assertSame('', $newTypeCode);

        $this->assertFalse(self::$document->nextDocumentPositionInvoiceReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstGetDcumentPositionGrossPrice(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDcumentPositionGrossPrice());

        self::$document->getDocumentPositionGrossPrice(
            $newGrossPrice,
            $newGrossPriceBasisQuantity,
            $newGrossPriceBasisQuantityUnit
        );

        $this->assertEqualsWithDelta(0.0, $newGrossPrice, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newGrossPriceBasisQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newGrossPriceBasisQuantityUnit);

        $this->assertFalse(self::$document->firstDocumentPositionGrossPriceAllowanceCharge());

        self::$document->getDocumentPositionGrossPriceAllowanceCharge(
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

        $this->assertFalse(self::$document->nextDocumentPositionGrossPriceAllowanceCharge());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstGetDocumentPositionNetPrice(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionNetPrice());

        self::$document->getDocumentPositionNetPrice(
            $newNetPrice,
            $newNetPriceBasisQuantity,
            $newNetPriceBasisQuantityUnit
        );

        $this->assertEqualsWithDelta(0.0, $newNetPrice, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newNetPriceBasisQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newNetPriceBasisQuantityUnit);

        self::$document->getDocumentPositionNetPriceTax(
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

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testGetDocumentPositionQuantities(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        self::$document->getDocumentPositionQuantities(
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

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testGetDocumentPositionShipTo(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        // Name

        self::$document->getDocumentPositionShipToName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(self::$document->firstDocumentPositionShipToId());

        self::$document->getDocumentPositionShipToId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(self::$document->nextDocumentPositionShipToId());

        // Global ID

        $this->assertFalse(self::$document->firstDocumentPositionShipToGlobalId());

        self::$document->getDocumentPositionShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentPositionShipToGlobalId());

        self::$document->getDocumentPositionShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentPositionShipToGlobalId());

        // Tax Registration

        $this->assertFalse(self::$document->firstDocumentPositionShipToTaxRegistration());

        self::$document->getDocumentPositionShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentPositionShipToTaxRegistration());

        // Address

        $this->assertFalse(self::$document->firstDocumentPositionShipToAddress());

        self::$document->getDocumentPositionShipToAddress(
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

        $this->assertFalse(self::$document->nextDocumentPositionShipToAddress());

        // Legal Organisation

        $this->assertFalse(self::$document->firstDocumentPositionShipToLegalOrganisation());

        self::$document->getDocumentPositionShipToLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(self::$document->nextDocumentPositionShipToLegalOrganisation());

        // Contact

        $this->assertFalse(self::$document->firstDocumentPositionShipToContact());

        self::$document->getDocumentPositionShipToContact(
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

        $this->assertFalse(self::$document->nextDocumentPositionShipToContact());

        // Communication

        $this->assertFalse(self::$document->firstDocumentPositionShipToCommunication());

        self::$document->getDocumentPositionShipToCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(self::$document->nextDocumentPositionShipToCommunication());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testGetDocumentPositionUltimateShipTo(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        // Name

        self::$document->getDocumentPositionUltimateShipToName($newName);

        $this->assertSame('', $newName);

        // ID

        $this->assertFalse(self::$document->firstDocumentPositionUltimateShipToId());

        self::$document->getDocumentPositionUltimateShipToId($newId);

        $this->assertSame('', $newId);

        $this->assertFalse(self::$document->nextDocumentPositionUltimateShipToId());

        // Global ID

        $this->assertFalse(self::$document->firstDocumentPositionUltimateShipToGlobalId());

        self::$document->getDocumentPositionUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentPositionUltimateShipToGlobalId());

        self::$document->getDocumentPositionUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('', $newGlobalId);
        $this->assertSame('', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentPositionUltimateShipToGlobalId());

        // Tax Registration

        $this->assertFalse(self::$document->firstDocumentPositionUltimateShipToTaxRegistration());

        self::$document->getDocumentPositionUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('', $newTaxRegistrationId);
        $this->assertSame('', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentPositionUltimateShipToTaxRegistration());

        // Address

        $this->assertFalse(self::$document->firstDocumentPositionUltimateShipToAddress());

        self::$document->getDocumentPositionUltimateShipToAddress(
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

        $this->assertFalse(self::$document->nextDocumentPositionUltimateShipToAddress());

        // Legal Organisation

        $this->assertFalse(self::$document->firstDocumentPositionUltimateShipToLegalOrganisation());

        self::$document->getDocumentPositionUltimateShipToLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('', $newType);
        $this->assertSame('', $newId);
        $this->assertSame('', $newName);

        $this->assertFalse(self::$document->nextDocumentPositionUltimateShipToLegalOrganisation());

        // Contact

        $this->assertFalse(self::$document->firstDocumentPositionUltimateShipToContact());

        self::$document->getDocumentPositionUltimateShipToContact(
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

        $this->assertFalse(self::$document->nextDocumentPositionUltimateShipToContact());

        // Communication

        $this->assertFalse(self::$document->firstDocumentPositionUltimateShipToCommunication());

        self::$document->getDocumentPositionUltimateShipToCommunication($newType, $newUri);

        $this->assertSame('', $newType);
        $this->assertSame('', $newUri);

        $this->assertFalse(self::$document->nextDocumentPositionUltimateShipToCommunication());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testGetDocumentPositionSupplyChainEvent(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        self::$document->getDocumentPositionSupplyChainEvent($newDate);

        $this->assertNotInstanceOf(DateTimeInterface::class, $newDate);

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionBillingPeriod(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionBillingPeriod());

        self::$document->getDocumentPositionBillingPeriod(
            $newStartDate,
            $newEndDate,
            $newDescription
        );

        $this->assertNotInstanceOf(DateTimeInterface::class, $newStartDate);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newEndDate);
        $this->assertSame('', $newDescription);

        $this->assertFalse(self::$document->nextDocumentPositionBillingPeriod());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionTax(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionTax());

        self::$document->getDocumentPositionTax(
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

        $this->assertFalse(self::$document->nextDocumentPositionTax());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionAllowanceCharge(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionAllowanceCharge());

        self::$document->getDocumentPositionAllowanceCharge(
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

        $this->assertFalse(self::$document->nextDocumentPositionAllowanceCharge());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstGetDocumentPositionSummation(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionSummation());

        self::$document->getDocumentPositionSummation(
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

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionPostingReference(): void
    {
        // First position

        $this->assertFalse(self::$document->firstDocumentPosition());

        $this->assertFalse(self::$document->firstDocumentPositionPostingReference());

        self::$document->getDocumentPositionPostingReference($newType, $newAccountId);

        $this->assertSame('', $newType);
        $this->assertSame('', $newAccountId);

        $this->assertFalse(self::$document->nextDocumentPositionPostingReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testConvertToDTO(): void
    {
        self::$document->convertToDTO($newDocmentDTO);

        $this->assertInstanceOf(InvoiceSuiteDocumentHeaderDTO::class, $newDocmentDTO);

        $this->assertSame('2025-04-000001', $newDocmentDTO->getNumber());
    }

    public function testCopyToBuilder(): void
    {
        $builder = self::$document->copyToBuilder();

        $this->assertInstanceOf(InvoiceSuiteDocumentBuilder::class, $builder);
        $this->assertSame('zffxminimum', $builder->getCurrentDocumentFormatProvider()->getUniqueId());
    }
}
