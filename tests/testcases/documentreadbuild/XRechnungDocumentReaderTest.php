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

final class XRechnungDocumentReaderTest extends TestCase
{
    /**
     * The reader
     *
     * @var InvoiceSuiteDocumentReader
     */
    private static $document;

    public static function setUpBeforeClass(): void
    {
        static::$document = InvoiceSuiteDocumentReader::createFromFile(
            InvoiceSuitePathUtils::combinePathWithFile(
                InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
                '02_technical_xml_zffx_xrechnung.xml'
            )
        );
    }

    public function testDocumentCurrentFormatProvider(): void
    {
        $this->assertInstanceOf(InvoiceSuiteDocumentReader::class, static::$document);
        $this->assertSame('xrechnung', static::$document->getCurrentDocumentFormatProvider()->getUniqueId());
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

        $this->assertSame('GBP', $newDocumentTaxCurrency);
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
        $this->assertTrue(static::$document->firstDocumentNote());

        static::$document->getDocumentNote($newContent, $newContentCode, $newSubjectCode);

        $this->assertSame('Some content', $newContent);
        $this->assertSame('', $newContentCode);
        $this->assertSame('SC00', $newSubjectCode);

        $this->assertTrue(static::$document->nextDocumentNote());

        static::$document->getDocumentNote($newContent, $newContentCode, $newSubjectCode);

        $this->assertSame('Some other content', $newContent);
        $this->assertSame('', $newContentCode);
        $this->assertSame('SC99', $newSubjectCode);

        $this->assertFalse(static::$document->nextDocumentNote());

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentNote($newContent, $newContentCode, $newSubjectCode);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentBillingPeriod(): void
    {
        $this->assertTrue(static::$document->firstDocumentBillingPeriod());

        static::$document->getDocumentBillingPeriod($newStartDate, $newEndDate, $newDescription);

        $this->assertSame('19700101', $newStartDate->format('Ymd'));
        $this->assertSame('19700131', $newEndDate->format('Ymd'));
        $this->assertSame('', $newDescription);

        $this->assertFalse(static::$document->nextDocumentBillingPeriod());

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentBillingPeriod($newStartDate, $newEndDate, $newDescription);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentPostingReference(): void
    {
        $this->assertTrue(static::$document->firstDocumentPostingReference());

        static::$document->getDocumentPostingReference($newType, $newAccountId);

        $this->assertSame('', $newType);
        $this->assertSame('PREF-1', $newAccountId);

        $this->assertFalse(static::$document->nextDocumentPostingReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentPostingReference($newType, $newAccountId);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentSellerOrderReference(): void
    {
        $this->assertTrue(static::$document->firstDocumentSellerOrderReference());

        static::$document->getDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('SO-1', $newReferenceNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));

        $this->assertFalse(static::$document->nextDocumentSellerOrderReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentBuyerOrderReference(): void
    {
        $this->assertTrue(static::$document->firstDocumentBuyerOrderReference());

        static::$document->getDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('BO-1', $newReferenceNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));

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
        $this->assertTrue(static::$document->firstDocumentContractReference());

        static::$document->getDocumentContractReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('CON-1', $newReferenceNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));

        $this->assertFalse(static::$document->nextDocumentContractReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentContractReference($newReferenceNumber, $newReferenceDate);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentAdditionalReference(): void
    {
        $this->assertTrue(static::$document->firstDocumentAdditionalReference());

        static::$document->getDocumentAdditionalReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode,
            $newReferenceTypeCode,
            $newDescription,
            $newInvoiceSuiteAttachment
        );

        $this->assertSame('ADD-1', $newReferenceNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));
        $this->assertSame('typecode', $newTypeCode);
        $this->assertSame('reftypecode', $newReferenceTypeCode);
        $this->assertSame('description', $newDescription);
        $this->assertNotInstanceOf(InvoiceSuiteAttachment::class, $newInvoiceSuiteAttachment);

        $this->assertTrue(static::$document->nextDocumentAdditionalReference());

        static::$document->getDocumentAdditionalReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode,
            $newReferenceTypeCode,
            $newDescription,
            $newInvoiceSuiteAttachment
        );

        $this->assertSame('ADD-2', $newReferenceNumber);
        $this->assertSame('19700102', $newReferenceDate->format('Ymd'));
        $this->assertSame('typecode2', $newTypeCode);
        $this->assertSame('reftypecode2', $newReferenceTypeCode);
        $this->assertSame('description2', $newDescription);
        $this->assertNotInstanceOf(InvoiceSuiteAttachment::class, $newInvoiceSuiteAttachment);

        $this->assertFalse(static::$document->nextDocumentAdditionalReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentAdditionalReference(
                $newReferenceNumber,
                $newReferenceDate,
                $newTypeCode,
                $newReferenceTypeCode,
                $newDescription,
                $newInvoiceSuiteAttachment
            );
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentInvoiceReference(): void
    {
        $this->assertTrue(static::$document->firstDocumentInvoiceReference());

        static::$document->getDocumentInvoiceReference($newReferenceNumber, $newReferenceDate, $newTypeCode);

        $this->assertSame('INVREF-1', $newReferenceNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));
        $this->assertSame('typecode', $newTypeCode);

        $this->assertTrue(static::$document->nextDocumentInvoiceReference());

        static::$document->getDocumentInvoiceReference($newReferenceNumber, $newReferenceDate, $newTypeCode);

        $this->assertSame('INVREF-2', $newReferenceNumber);
        $this->assertSame('19700102', $newReferenceDate->format('Ymd'));
        $this->assertSame('typecode2', $newTypeCode);

        $this->assertFalse(static::$document->nextDocumentInvoiceReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentInvoiceReference($newReferenceNumber, $newReferenceDate, $newTypeCode);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentProjectReference(): void
    {
        $this->assertTrue(static::$document->firstDocumentProjectReference());

        static::$document->getDocumentProjectReference($newReferenceNumber, $newName);

        $this->assertSame('PROJECT-1', $newReferenceNumber);
        $this->assertSame('Project 1', $newName);

        $this->assertFalse(static::$document->nextDocumentProjectReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentProjectReference($newReferenceNumber, $newName);
        }, '/Undefined (array key|index)/');
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
        $this->assertTrue(static::$document->firstDocumentDespatchAdviceReference());

        static::$document->getDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('DESPADV-1', $newReferenceNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));

        $this->assertFalse(static::$document->nextDocumentDespatchAdviceReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentReceivingAdviceReference(): void
    {
        $this->assertTrue(static::$document->firstDocumentReceivingAdviceReference());

        static::$document->getDocumentReceivingAdviceReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('RECADV-1', $newReferenceNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));

        $this->assertFalse(static::$document->nextDocumentReceivingAdviceReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentReceivingAdviceReference($newReferenceNumber, $newReferenceDate);
        }, '/Undefined (array key|index)/');
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

        $this->assertSame('19700101', $newDate->format('Ymd'));
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

        $this->assertTrue(static::$document->firstDocumentSellerId());

        static::$document->getDocumentSellerId($newId);

        $this->assertSame('0815-4711', $newId);

        $this->assertTrue(static::$document->nextDocumentSellerId());

        static::$document->getDocumentSellerId($newId);

        $this->assertSame('0815-4712', $newId);

        $this->assertFalse(static::$document->nextDocumentSellerId());

        // Global ID

        $this->assertTrue(static::$document->firstDocumentSellerGlobalId());

        static::$document->getDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('11111', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertTrue(static::$document->nextDocumentSellerGlobalId());

        static::$document->getDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('22222', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

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

        $this->assertSame('Line 1', $newAddressLine1);
        $this->assertSame('Line 2', $newAddressLine2);
        $this->assertSame('Line 3', $newAddressLine3);
        $this->assertSame('06108', $newPostcode);
        $this->assertSame('City', $newCity);
        $this->assertSame('DE', $newCountryId);
        $this->assertSame('Bavaria', $newSubDivision);

        $this->assertFalse(static::$document->nextDocumentSellerAddress());

        // Legal Organisation

        $this->assertTrue(static::$document->firstDocumentSellerLegalOrganisation());

        static::$document->getDocumentSellerLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('Lieferant AG', $newName);

        $this->assertFalse(static::$document->nextDocumentSellerLegalOrganisation());

        // Contact

        $this->assertTrue(static::$document->firstDocumentSellerContact());

        static::$document->getDocumentSellerContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('Horst Meier', $newPersonName);
        $this->assertSame('Buchhaltung', $newDepartmentName);
        $this->assertSame('0815-4711', $newPhoneNumber);
        $this->assertSame('', $newFaxNumber);
        $this->assertSame('horst.meier@lieferant.de', $newEmailAddress);

        $this->assertFalse(static::$document->nextDocumentSellerContact());

        // Communication

        $this->assertTrue(static::$document->firstDocumentSellerCommunication());

        static::$document->getDocumentSellerCommunication($newType, $newUri);

        $this->assertSame('EM', $newType);
        $this->assertSame('info@lieferant.de', $newUri);

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

        $this->assertTrue(static::$document->firstDocumentBuyerId());

        static::$document->getDocumentBuyerId($newId);

        $this->assertSame('0815-4711', $newId);

        $this->assertFalse(static::$document->nextDocumentBuyerId());

        // Global ID

        $this->assertTrue(static::$document->firstDocumentBuyerGlobalId());

        static::$document->getDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('11111', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertTrue(static::$document->nextDocumentBuyerGlobalId());

        static::$document->getDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('22222', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

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

        $this->assertSame('Line 1', $newAddressLine1);
        $this->assertSame('Line 2', $newAddressLine2);
        $this->assertSame('Line 3', $newAddressLine3);
        $this->assertSame('06108', $newPostcode);
        $this->assertSame('City', $newCity);
        $this->assertSame('DE', $newCountryId);
        $this->assertSame('Bavaria', $newSubDivision);

        $this->assertFalse(static::$document->nextDocumentBuyerAddress());

        // Legal Organisation

        $this->assertTrue(static::$document->firstDocumentBuyerLegalOrganisation());

        static::$document->getDocumentBuyerLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('Kunde AG', $newName);

        $this->assertFalse(static::$document->nextDocumentBuyerLegalOrganisation());

        // Contact

        $this->assertTrue(static::$document->firstDocumentBuyerContact());

        static::$document->getDocumentBuyerContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('Horst Meier', $newPersonName);
        $this->assertSame('Buchhaltung', $newDepartmentName);
        $this->assertSame('0815-4711', $newPhoneNumber);
        $this->assertSame('', $newFaxNumber);
        $this->assertSame('horst.meier@kunde.de', $newEmailAddress);

        $this->assertFalse(static::$document->nextDocumentBuyerContact());

        // Communication

        $this->assertTrue(static::$document->firstDocumentBuyerCommunication());

        static::$document->getDocumentBuyerCommunication($newType, $newUri);

        $this->assertSame('EM', $newType);
        $this->assertSame('info@kunde.de', $newUri);

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

        $this->assertSame('Tax GmbH', $newName);

        // ID

        $this->assertTrue(static::$document->firstDocumentTaxRepresentativeId());

        static::$document->getDocumentTaxRepresentativeId($newId);

        $this->assertSame('0815-1147', $newId);

        $this->assertFalse(static::$document->nextDocumentTaxRepresentativeId());

        // Global ID

        $this->assertTrue(static::$document->firstDocumentTaxRepresentativeGlobalId());

        static::$document->getDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('11111-TR', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertTrue(static::$document->nextDocumentTaxRepresentativeGlobalId());

        static::$document->getDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('22222-TR', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentTaxRepresentativeGlobalId());

        // Tax Registration

        $this->assertTrue(static::$document->firstDocumentTaxRepresentativeTaxRegistration());

        static::$document->getDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('893489787987', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertFalse(static::$document->nextDocumentTaxRepresentativeTaxRegistration());

        // Address

        $this->assertTrue(static::$document->firstDocumentTaxRepresentativeAddress());

        static::$document->getDocumentTaxRepresentativeAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->assertSame('Line 1', $newAddressLine1);
        $this->assertSame('Line 2', $newAddressLine2);
        $this->assertSame('Line 3', $newAddressLine3);
        $this->assertSame('06108', $newPostcode);
        $this->assertSame('City', $newCity);
        $this->assertSame('DE', $newCountryId);
        $this->assertSame('Bavaria', $newSubDivision);

        $this->assertFalse(static::$document->nextDocumentTaxRepresentativeAddress());

        // Legal Organisation

        $this->assertTrue(static::$document->firstDocumentTaxRepresentativeLegalOrganisation());

        static::$document->getDocumentTaxRepresentativeLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('Tax AG', $newName);

        $this->assertFalse(static::$document->nextDocumentTaxRepresentativeLegalOrganisation());

        // Contact

        $this->assertTrue(static::$document->firstDocumentTaxRepresentativeContact());

        static::$document->getDocumentTaxRepresentativeContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('Horst Meier', $newPersonName);
        $this->assertSame('Finance', $newDepartmentName);
        $this->assertSame('0815-4711-0', $newPhoneNumber);
        $this->assertSame('', $newFaxNumber);
        $this->assertSame('horst.meier@tax.de', $newEmailAddress);

        $this->assertFalse(static::$document->nextDocumentTaxRepresentativeContact());

        // Communication

        $this->assertTrue(static::$document->firstDocumentTaxRepresentativeCommunication());

        static::$document->getDocumentTaxRepresentativeCommunication($newType, $newUri);

        $this->assertSame('EM', $newType);
        $this->assertSame('info@tax.de', $newUri);

        $this->assertFalse(static::$document->nextDocumentTaxRepresentativeCommunication());

        // Finals

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentTaxRepresentativeId($newId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentTaxRepresentativeAddress(
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
            static::$document->getDocumentTaxRepresentativeLegalOrganisation($newType, $newId, $newName);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentTaxRepresentativeContact(
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentTaxRepresentativeCommunication($newType, $newUri);
        }, '/Undefined (array key|index)/');
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

        $this->assertSame('Ship To GmbH', $newName);

        // ID

        $this->assertTrue(static::$document->firstDocumentShipToId());

        static::$document->getDocumentShipToId($newId);

        $this->assertSame('0815-4711-SH', $newId);

        $this->assertFalse(static::$document->nextDocumentShipToId());

        // Global ID

        $this->assertTrue(static::$document->firstDocumentShipToGlobalId());

        static::$document->getDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('11111-SH', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertTrue(static::$document->nextDocumentShipToGlobalId());

        static::$document->getDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('22222-SH', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentShipToGlobalId());

        // Tax Registration

        $this->assertTrue(static::$document->firstDocumentShipToTaxRegistration());

        static::$document->getDocumentShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('7368366239786-SH', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertFalse(static::$document->nextDocumentShipToTaxRegistration());

        // Address

        $this->assertTrue(static::$document->firstDocumentShipToAddress());

        static::$document->getDocumentShipToAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->assertSame('Address 1', $newAddressLine1);
        $this->assertSame('Address 2', $newAddressLine2);
        $this->assertSame('Address 3', $newAddressLine3);
        $this->assertSame('99999', $newPostcode);
        $this->assertSame('Town', $newCity);
        $this->assertSame('DE', $newCountryId);
        $this->assertSame('Saxony', $newSubDivision);

        $this->assertFalse(static::$document->nextDocumentShipToAddress());

        // Legal Organisation

        $this->assertTrue(static::$document->firstDocumentShipToLegalOrganisation());

        static::$document->getDocumentShipToLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('7368366239786-SH', $newId);
        $this->assertSame('Ship To AG', $newName);

        $this->assertFalse(static::$document->nextDocumentShipToLegalOrganisation());

        // Contact

        $this->assertTrue(static::$document->firstDocumentShipToContact());

        static::$document->getDocumentShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('Horst Meier', $newPersonName);
        $this->assertSame('Buchhaltung', $newDepartmentName);
        $this->assertSame('0815-4711', $newPhoneNumber);
        $this->assertSame('', $newFaxNumber);
        $this->assertSame('horst.meier@shipto.de', $newEmailAddress);

        $this->assertFalse(static::$document->nextDocumentShipToContact());

        // Communication

        $this->assertTrue(static::$document->firstDocumentShipToCommunication());

        static::$document->getDocumentShipToCommunication($newType, $newUri);

        $this->assertSame('EM', $newType);
        $this->assertSame('info@shipto.de', $newUri);

        $this->assertFalse(static::$document->nextDocumentShipToCommunication());

        // Finals

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentShipToId($newId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentShipToAddress(
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
            static::$document->getDocumentShipToLegalOrganisation($newType, $newId, $newName);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentShipToContact(
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentShipToCommunication($newType, $newUri);
        }, '/Undefined (array key|index)/');
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

        $this->assertSame('Payee GmbH', $newName);

        // ID

        $this->assertTrue(static::$document->firstDocumentPayeeId());

        static::$document->getDocumentPayeeId($newId);

        $this->assertSame('0815-4711-PEE', $newId);

        $this->assertFalse(static::$document->nextDocumentPayeeId());

        // Global ID

        $this->assertTrue(static::$document->firstDocumentPayeeGlobalId());

        static::$document->getDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('11111-PEE', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertTrue(static::$document->nextDocumentPayeeGlobalId());

        static::$document->getDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('22222-PEE', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertFalse(static::$document->nextDocumentPayeeGlobalId());

        // Tax Registration

        $this->assertTrue(static::$document->firstDocumentPayeeTaxRegistration());

        static::$document->getDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('893489787987', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertFalse(static::$document->nextDocumentPayeeTaxRegistration());

        // Address

        $this->assertTrue(static::$document->firstDocumentPayeeAddress());

        static::$document->getDocumentPayeeAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->assertSame('Line 1', $newAddressLine1);
        $this->assertSame('Line 2', $newAddressLine2);
        $this->assertSame('Line 3', $newAddressLine3);
        $this->assertSame('06108', $newPostcode);
        $this->assertSame('City', $newCity);
        $this->assertSame('DE', $newCountryId);
        $this->assertSame('Bavaria', $newSubDivision);

        $this->assertFalse(static::$document->nextDocumentPayeeAddress());

        // Legal Organisation

        $this->assertTrue(static::$document->firstDocumentPayeeLegalOrganisation());

        static::$document->getDocumentPayeeLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('Payee AG', $newName);

        $this->assertFalse(static::$document->nextDocumentPayeeLegalOrganisation());

        // Contact

        $this->assertTrue(static::$document->firstDocumentPayeeContact());

        static::$document->getDocumentPayeeContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('Horst Mayer', $newPersonName);
        $this->assertSame('Buchhaltung', $newDepartmentName);
        $this->assertSame('0711-4711', $newPhoneNumber);
        $this->assertSame('', $newFaxNumber);
        $this->assertSame('horst.mayer@payee.de', $newEmailAddress);

        $this->assertFalse(static::$document->nextDocumentPayeeContact());

        // Communication

        $this->assertTrue(static::$document->firstDocumentPayeeCommunication());

        static::$document->getDocumentPayeeCommunication($newType, $newUri);

        $this->assertSame('EM', $newType);
        $this->assertSame('info@payee.de', $newUri);

        $this->assertFalse(static::$document->nextDocumentPayeeCommunication());

        // Finals

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentPayeeId($newId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentPayeeAddress(
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
            static::$document->getDocumentPayeeLegalOrganisation($newType, $newId, $newName);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentPayeeContact(
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentPayeeCommunication($newType, $newUri);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentPaymentMean(): void
    {
        $this->assertTrue(static::$document->firstDocumentPaymentMean());

        static::$document->getDocumentPaymentMean(
            $newTypeCode,
            $newName,
            $newFinancialCardId,
            $newFinancialCardHolder,
            $newBuyerIban,
            $newPayeeIban,
            $newPayeeAccountName,
            $newPayeeProprietaryId,
            $newPayeeBic,
            $newPaymentReference,
            $newMandate
        );

        $this->assertSame('typecode', $newTypeCode);
        $this->assertSame('name', $newName);
        $this->assertSame('financialCardId', $newFinancialCardId);
        $this->assertSame('financialCardHolder', $newFinancialCardHolder);
        $this->assertSame('buyeriban', $newBuyerIban);
        $this->assertSame('payeeiban', $newPayeeIban);
        $this->assertSame('payeeaccountname', $newPayeeAccountName);
        $this->assertSame('payeeProprietaryId', $newPayeeProprietaryId);
        $this->assertSame('payeeBic', $newPayeeBic);

        $this->assertTrue(static::$document->nextDocumentPaymentMean());

        static::$document->getDocumentPaymentMean(
            $newTypeCode,
            $newName,
            $newFinancialCardId,
            $newFinancialCardHolder,
            $newBuyerIban,
            $newPayeeIban,
            $newPayeeAccountName,
            $newPayeeProprietaryId,
            $newPayeeBic,
            $newPaymentReference,
            $newMandate
        );

        $this->assertSame('typecode2', $newTypeCode);
        $this->assertSame('name2', $newName);
        $this->assertSame('financialCardId2', $newFinancialCardId);
        $this->assertSame('financialCardHolder2', $newFinancialCardHolder);
        $this->assertSame('buyeriban2', $newBuyerIban);
        $this->assertSame('payeeiban2', $newPayeeIban);
        $this->assertSame('payeeaccountname2', $newPayeeAccountName);
        $this->assertSame('payeeProprietaryId2', $newPayeeProprietaryId);
        $this->assertSame('payeeBic2', $newPayeeBic);

        $this->assertFalse(static::$document->nextDocumentPaymentMean());
    }

    public function testFirstNextGetDocumentPaymentCreditorReferenceID(): void
    {
        $this->assertTrue(static::$document->firstDocumentPaymentCreditorReferenceID());

        static::$document->getDocumentPaymentCreditorReferenceID($newId);

        $this->assertSame('CREDREF-1', $newId);

        $this->assertFalse(static::$document->nextDocumentPaymentCreditorReferenceID());

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentPaymentCreditorReferenceID($newId);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentPaymentTerm(): void
    {
        // First Payment Term

        $this->assertTrue(static::$document->firstDocumentPaymentTerm());

        static::$document->getDocumentPaymentTerm($newDescription, $newDueDate, $newMandate);

        $this->assertSame('Payment Term Description 1', $newDescription);
        $this->assertSame('19700131', $newDueDate->format('Ymd'));
        $this->assertSame('MANDATE-1', $newMandate);

        // Second Payment Term

        $this->assertFalse(static::$document->nextDocumentPaymentTerm());

        $this->assertFalse(static::$document->firstDocumentPaymentPenaltyTermsInLastPaymentTerm());

        static::$document->getDocumentPaymentPenaltyTermsInLastPaymentTerm(
            $newBaseAmount,
            $newDiscountAmount,
            $newDiscountPercent,
            $newBaseDate,
            $newBasePeriod,
            $newBasePeriodUnit
        );

        $this->assertEqualsWithDelta(0.0, $newBaseAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newDiscountAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newDiscountPercent, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newBasePeriod, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newBasePeriodUnit);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newBaseDate);

        $this->assertFalse(static::$document->nextDocumentPaymentPenaltyTermsInLastPaymentTerm());

        $this->assertFalse(static::$document->firstDocumentPaymentDiscountTermsInLastPaymentTerm());

        static::$document->getDocumentPaymentDiscountTermsInLastPaymentTerm(
            $newBaseAmount,
            $newDiscountAmount,
            $newDiscountPercent,
            $newBaseDate,
            $newBasePeriod,
            $newBasePeriodUnit
        );

        $this->assertEqualsWithDelta(0.0, $newBaseAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newDiscountAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newDiscountPercent, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(0.0, $newBasePeriod, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newBasePeriodUnit);
        $this->assertNotInstanceOf(DateTimeInterface::class, $newBaseDate);

        $this->assertFalse(static::$document->nextDocumentPaymentDiscountTermsInLastPaymentTerm());
    }

    public function testFirstNextGetDocumentTax(): void
    {
        $this->assertTrue(static::$document->firstDocumentTax());

        static::$document->getDocumentTax(
            $newTaxCategory,
            $newTaxType,
            $newBasisAmount,
            $newTaxAmount,
            $newTaxPercent,
            $newExemptionReason,
            $newExemptionReasonCode,
            $newTaxDueDate,
            $newTaxDueCode
        );

        $this->assertSame('S', $newTaxCategory);
        $this->assertSame('VAT', $newTaxType);
        $this->assertEqualsWithDelta(100.0, $newBasisAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(19.0, $newTaxAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(19.0, $newTaxPercent, PHP_FLOAT_EPSILON);
        $this->assertSame('Reason', $newExemptionReason);
        $this->assertSame('ReasonCode', $newExemptionReasonCode);
        $this->assertSame('19700101', $newTaxDueDate->format('Ymd'));
        $this->assertSame('DUECODE', $newTaxDueCode);

        $this->assertTrue(static::$document->nextDocumentTax());

        static::$document->getDocumentTax(
            $newTaxCategory,
            $newTaxType,
            $newBasisAmount,
            $newTaxAmount,
            $newTaxPercent,
            $newExemptionReason,
            $newExemptionReasonCode,
            $newTaxDueDate,
            $newTaxDueCode
        );

        $this->assertSame('S', $newTaxCategory);
        $this->assertSame('VAT', $newTaxType);
        $this->assertEqualsWithDelta(100.0, $newBasisAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(7.0, $newTaxAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(7.0, $newTaxPercent, PHP_FLOAT_EPSILON);
        $this->assertSame('Reason2', $newExemptionReason);
        $this->assertSame('ReasonCode2', $newExemptionReasonCode);
        $this->assertSame('19700102', $newTaxDueDate->format('Ymd'));
        $this->assertSame('DUECODE2', $newTaxDueCode);

        $this->assertFalse(static::$document->nextDocumentTax());

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentTax(
                $newTaxCategory,
                $newTaxType,
                $newBasisAmount,
                $newTaxAmount,
                $newTaxPercent,
                $newExemptionReason,
                $newExemptionReasonCode,
                $newTaxDueDate,
                $newTaxDueCode
            );
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentAllowanceCharge(): void
    {
        $this->assertTrue(static::$document->firstDocumentAllowanceCharge());

        static::$document->getDocumentAllowanceCharge(
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

        $this->assertTrue($newChargeIndicator);
        $this->assertEqualsWithDelta(10.0, $newAllowanceChargeAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(100.0, $newAllowanceChargeBaseAmount, PHP_FLOAT_EPSILON);
        $this->assertSame('S', $newTaxCategory);
        $this->assertSame('VAT', $newTaxType);
        $this->assertEqualsWithDelta(19.0, $newTaxPercent, PHP_FLOAT_EPSILON);
        $this->assertSame('Reason', $newAllowanceChargeReason);
        $this->assertSame('ReasonCode', $newAllowanceChargeReasonCode);
        $this->assertEqualsWithDelta(10.0, $newAllowanceChargePercent, PHP_FLOAT_EPSILON);

        $this->assertTrue(static::$document->nextDocumentAllowanceCharge());

        static::$document->getDocumentAllowanceCharge(
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

        $this->assertFalse($newChargeIndicator);
        $this->assertEqualsWithDelta(1.0, $newAllowanceChargeAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(10.0, $newAllowanceChargeBaseAmount, PHP_FLOAT_EPSILON);
        $this->assertSame('S', $newTaxCategory);
        $this->assertSame('VAT', $newTaxType);
        $this->assertEqualsWithDelta(19.0, $newTaxPercent, PHP_FLOAT_EPSILON);
        $this->assertSame('Reason2', $newAllowanceChargeReason);
        $this->assertSame('ReasonCode2', $newAllowanceChargeReasonCode);
        $this->assertEqualsWithDelta(1.00, $newAllowanceChargePercent, PHP_FLOAT_EPSILON);

        $this->assertFalse(static::$document->nextDocumentAllowanceCharge());

        $this->expectNoticeOrWarningExt(static function (): void {
            static::$document->getDocumentAllowanceCharge(
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
        }, '/Undefined (array key|index)/');
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

        $this->assertEqualsWithDelta(1.00, $newNetAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(2.00, $newChargeTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(3.00, $newDiscountTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(4.00, $newTaxBasisAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(5.00, $newTaxTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(6.00, $newTaxTotalAmount2, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(7.00, $newGrossAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(8.00, $newDueAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(9.00, $newPrepaidAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(10.00, $newRoungingAmount, PHP_FLOAT_EPSILON);
    }

    public function testFirstNextGetDocumentPosition(): void
    {
        // First position

        $this->assertTrue(static::$document->firstDocumentPosition());

        static::$document->getDocumentPosition(
            $newPositionId,
            $newParentPositionId,
            $newLineStatusCode,
            $newLineStatusReasonCode
        );

        $this->assertSame('1.1', $newPositionId);
        $this->assertSame('', $newParentPositionId);
        $this->assertSame('', $newLineStatusCode);
        $this->assertSame('', $newLineStatusReasonCode);

        $this->assertTrue(static::$document->firstDocumentPositionNote());

        static::$document->getDocumentPositionNote(
            $newContent,
            $newContentCode,
            $newSubjectCode
        );

        $this->assertSame('CONTENT-1', $newContent);
        $this->assertSame('', $newContentCode);
        $this->assertSame('SUBJECTCODE-1', $newSubjectCode);

        $this->assertFalse(static::$document->nextDocumentPositionNote());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testGetDocumentPositionProductDetails(): void
    {
        // First position

        $this->assertTrue(static::$document->firstDocumentPosition());

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
        $this->assertSame('PRODUCTNAME-1', $newProductName);
        $this->assertSame('PRODUCTDESC-1', $newProductDescription);
        $this->assertSame('PRODUCTSELLERID-1', $newProductSellerId);
        $this->assertSame('PRODUCTBUYER-1', $newProductBuyerId);
        $this->assertSame('PRODUCTGLOBALID-1', $newProductGlobalId);
        $this->assertSame('PRODUCTGLOBALIDTYPE-1', $newProductGlobalIdType);
        $this->assertSame('', $newProductIndustryId);
        $this->assertSame('', $newProductModelId);
        $this->assertSame('', $newProductBatchId);
        $this->assertSame('', $newProductBrandName);
        $this->assertSame('', $newProductModelName);
        $this->assertSame('PRODUCTCOUNTRY-1', $newProductOriginTradeCountry);

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionProductCharacteristic(): void
    {
        // First position

        $this->assertTrue(static::$document->firstDocumentPosition());

        $this->assertTrue(static::$document->firstDocumentPositionProductCharacteristic());

        static::$document->getDocumentPositionProductCharacteristic(
            $newProductCharacteristicDescription,
            $newProductCharacteristicValue,
            $newProductCharacteristicType,
            $newProductCharacteristicMeasureValue,
            $newProductCharacteristicMeasureUnit
        );

        $this->assertSame('PRODUCTCHARACTERISTICDESC-1', $newProductCharacteristicDescription);
        $this->assertSame('PRODUCTCHARACTERISTICVALUE-1', $newProductCharacteristicValue);
        $this->assertSame('', $newProductCharacteristicType);
        $this->assertEqualsWithDelta(0.0, $newProductCharacteristicMeasureValue, PHP_FLOAT_EPSILON);
        $this->assertSame('', $newProductCharacteristicMeasureUnit);

        $this->assertTrue(static::$document->nextDocumentPositionProductCharacteristic());

        static::$document->getDocumentPositionProductCharacteristic(
            $newProductCharacteristicDescription,
            $newProductCharacteristicValue,
            $newProductCharacteristicType,
            $newProductCharacteristicMeasureValue,
            $newProductCharacteristicMeasureUnit
        );

        $this->assertSame('PRODUCTCHARACTERISTICDESC-2', $newProductCharacteristicDescription);
        $this->assertSame('PRODUCTCHARACTERISTICVALUE-2', $newProductCharacteristicValue);
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

        $this->assertTrue(static::$document->firstDocumentPosition());

        $this->assertTrue(static::$document->firstDocumentPositionProductClassification());

        static::$document->getDocumentPositionProductClassification(
            $newProductClassificationCode,
            $newProductClassificationListId,
            $newProductClassificationListVersionId,
            $newProductClassificationCodeClassname
        );

        $this->assertSame('PRODUCTCLASSCODE-1', $newProductClassificationCode);
        $this->assertSame('PRODUCTLISTID-1', $newProductClassificationListId);
        $this->assertSame('PRODUCTLISTVERSIONID-1', $newProductClassificationListVersionId);
        $this->assertSame('', $newProductClassificationCodeClassname);

        $this->assertTrue(static::$document->nextDocumentPositionProductClassification());

        static::$document->getDocumentPositionProductClassification(
            $newProductClassificationCode,
            $newProductClassificationListId,
            $newProductClassificationListVersionId,
            $newProductClassificationCodeClassname
        );

        $this->assertSame('PRODUCTCLASSCODE-2', $newProductClassificationCode);
        $this->assertSame('PRODUCTLISTID-2', $newProductClassificationListId);
        $this->assertSame('', $newProductClassificationListVersionId);
        $this->assertSame('', $newProductClassificationCodeClassname);

        $this->assertFalse(static::$document->nextDocumentPositionProductClassification());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetPositionReferencedProduct(): void
    {
        // First position

        $this->assertTrue(static::$document->firstDocumentPosition());

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

        $this->assertTrue(static::$document->firstDocumentPosition());

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

        $this->assertTrue(static::$document->firstDocumentPosition());

        $this->assertTrue(static::$document->firstDocumentPositionBuyerOrderReference());

        static::$document->getDocumentPositionBuyerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('BO-1', $newReferenceNumber);
        $this->assertSame('10', $newReferenceLineNumber);
        $this->assertSame('19700102', $newReferenceDate->format('Ymd'));

        $this->assertFalse(static::$document->nextDocumentPositionBuyerOrderReference());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionQuotationReference(): void
    {
        // First position

        $this->assertTrue(static::$document->firstDocumentPosition());

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

        $this->assertTrue(static::$document->firstDocumentPosition());

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

        $this->assertTrue(static::$document->firstDocumentPosition());

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

        $this->assertTrue(static::$document->firstDocumentPosition());

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

        $this->assertTrue(static::$document->firstDocumentPosition());

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

        $this->assertTrue(static::$document->firstDocumentPosition());

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

        $this->assertTrue(static::$document->firstDocumentPosition());

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

        $this->assertTrue(static::$document->firstDocumentPosition());

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

        $this->assertTrue(static::$document->firstDocumentPosition());

        $this->assertTrue(static::$document->firstDcumentPositionGrossPrice());

        static::$document->getDocumentPositionGrossPrice(
            $newGrossPrice,
            $newGrossPriceBasisQuantity,
            $newGrossPriceBasisQuantityUnit
        );

        $this->assertEqualsWithDelta(100.0, $newGrossPrice, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(1.0, $newGrossPriceBasisQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('C62', $newGrossPriceBasisQuantityUnit);

        $this->assertTrue(static::$document->firstDocumentPositionGrossPriceAllowanceCharge());

        static::$document->getDocumentPositionGrossPriceAllowanceCharge(
            $newGrossPriceAllowanceChargeAmount,
            $newIsCharge,
            $newGrossPriceAllowanceChargePercent,
            $newGrossPriceAllowanceChargeBasisAmount,
            $newGrossPriceAllowanceChargeReason,
            $newGrossPriceAllowanceChargeReasonCode
        );

        $this->assertEqualsWithDelta(1.0, $newGrossPriceAllowanceChargeAmount, PHP_FLOAT_EPSILON);
        $this->assertFalse($newIsCharge);
        $this->assertEqualsWithDelta(3.0, $newGrossPriceAllowanceChargePercent, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(2.0, $newGrossPriceAllowanceChargeBasisAmount, PHP_FLOAT_EPSILON);
        $this->assertSame('REASON-1', $newGrossPriceAllowanceChargeReason);
        $this->assertSame('REASONCODE-1', $newGrossPriceAllowanceChargeReasonCode);

        $this->assertFalse(static::$document->nextDocumentPositionGrossPriceAllowanceCharge());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstGetDocumentPositionNetPrice(): void
    {
        // First position

        $this->assertTrue(static::$document->firstDocumentPosition());

        $this->assertTrue(static::$document->firstDocumentPositionNetPrice());

        static::$document->getDocumentPositionNetPrice(
            $newNetPrice,
            $newNetPriceBasisQuantity,
            $newNetPriceBasisQuantityUnit
        );

        $this->assertEqualsWithDelta(1.0, $newNetPrice, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(2.0, $newNetPriceBasisQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('C62', $newNetPriceBasisQuantityUnit);

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

        $this->assertTrue(static::$document->firstDocumentPosition());

        static::$document->getDocumentPositionQuantities(
            $newQuantity,
            $newQuantityUnit,
            $newChargeFreeQuantity,
            $newChargeFreeQuantityUnit,
            $newPackageQuantity,
            $newPackageQuantityUnit
        );

        $this->assertEqualsWithDelta(1.0, $newQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('C62', $newQuantityUnit);
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

        $this->assertTrue(static::$document->firstDocumentPosition());

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

        $this->assertTrue(static::$document->firstDocumentPosition());

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

        $this->assertTrue(static::$document->firstDocumentPosition());

        static::$document->getDocumentPositionSupplyChainEvent($newDate);

        $this->assertNotInstanceOf(DateTimeInterface::class, $newDate);

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionBillingPeriod(): void
    {
        // First position

        $this->assertTrue(static::$document->firstDocumentPosition());

        $this->assertTrue(static::$document->firstDocumentPositionBillingPeriod());

        static::$document->getDocumentPositionBillingPeriod(
            $newStartDate,
            $newEndDate,
            $newDescription
        );

        $this->assertSame('19700101', $newStartDate->format('Ymd'));
        $this->assertSame('19700131', $newEndDate->format('Ymd'));
        $this->assertSame('', $newDescription);

        $this->assertFalse(static::$document->nextDocumentPositionBillingPeriod());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionTax(): void
    {
        // First position

        $this->assertTrue(static::$document->firstDocumentPosition());

        $this->assertTrue(static::$document->firstDocumentPositionTax());

        static::$document->getDocumentPositionTax(
            $newTaxCategory,
            $newTaxType,
            $newTaxAmount,
            $newTaxPercent,
            $newExemptionReason,
            $newExemptionReasonCode,
        );

        $this->assertSame('S', $newTaxCategory);
        $this->assertSame('VAT', $newTaxType);
        $this->assertEqualsWithDelta(7.0, $newTaxAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(7.0, $newTaxPercent, PHP_FLOAT_EPSILON);
        $this->assertSame('Reason', $newExemptionReason);
        $this->assertSame('ReasonCode', $newExemptionReasonCode);

        $this->assertFalse(static::$document->nextDocumentPositionTax());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionAllowanceCharge(): void
    {
        // First position

        $this->assertTrue(static::$document->firstDocumentPosition());

        $this->assertTrue(static::$document->firstDocumentPositionAllowanceCharge());

        static::$document->getDocumentPositionAllowanceCharge(
            $newChargeIndicator,
            $newAllowanceChargeAmount,
            $newAllowanceChargeBaseAmount,
            $newAllowanceChargeReason,
            $newAllowanceChargeReasonCode,
            $newAllowanceChargePercent
        );

        $this->assertTrue($newChargeIndicator);
        $this->assertEqualsWithDelta(10.00, $newAllowanceChargeAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(100.00, $newAllowanceChargeBaseAmount, PHP_FLOAT_EPSILON);
        $this->assertSame('Reason', $newAllowanceChargeReason);
        $this->assertSame('ReasonCode', $newAllowanceChargeReasonCode);
        $this->assertEqualsWithDelta(10.00, $newAllowanceChargePercent, PHP_FLOAT_EPSILON);

        $this->assertTrue(static::$document->nextDocumentPositionAllowanceCharge());

        static::$document->getDocumentPositionAllowanceCharge(
            $newChargeIndicator,
            $newAllowanceChargeAmount,
            $newAllowanceChargeBaseAmount,
            $newAllowanceChargeReason,
            $newAllowanceChargeReasonCode,
            $newAllowanceChargePercent
        );

        $this->assertFalse($newChargeIndicator);
        $this->assertEqualsWithDelta(1.00, $newAllowanceChargeAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(10.00, $newAllowanceChargeBaseAmount, PHP_FLOAT_EPSILON);
        $this->assertSame('Reason2', $newAllowanceChargeReason);
        $this->assertSame('ReasonCode2', $newAllowanceChargeReasonCode);
        $this->assertEqualsWithDelta(1.00, $newAllowanceChargePercent, PHP_FLOAT_EPSILON);

        $this->assertFalse(static::$document->nextDocumentPositionAllowanceCharge());

        // Second position

        $this->assertFalse(static::$document->nextDocumentPosition());
    }

    public function testFirstGetDocumentPositionSummation(): void
    {
        // First position

        $this->assertTrue(static::$document->firstDocumentPosition());

        $this->assertTrue(static::$document->firstDocumentPositionSummation());

        static::$document->getDocumentPositionSummation(
            $newNetAmount,
            $newChargeTotalAmount,
            $newDiscountTotalAmount,
            $newTaxTotalAmount,
            $newGrossAmount
        );

        $this->assertEqualsWithDelta(100.00, $newNetAmount, PHP_FLOAT_EPSILON);
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

        $this->assertTrue(static::$document->firstDocumentPosition());

        $this->assertTrue(static::$document->firstDocumentPositionPostingReference());

        static::$document->getDocumentPositionPostingReference($newType, $newAccountId);

        $this->assertSame('', $newType);
        $this->assertSame('PREF-1', $newAccountId);

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

    public function testCopyToBuilder(): void
    {
        $builder = static::$document->copyToBuilder();

        $this->assertInstanceOf(InvoiceSuiteDocumentBuilder::class, $builder);
        $this->assertSame('xrechnung', $builder->getCurrentDocumentFormatProvider()->getUniqueId());
    }
}
