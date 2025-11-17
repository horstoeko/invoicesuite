<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use DateTimeInterface;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatReader;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\documents\providers\zffxextended\InvoiceSuiteZfFxExtendedProvider;
use horstoeko\invoicesuite\documents\providers\zffxextended\InvoiceSuiteZfFxExtendedProviderReader;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

final class ZfFxExtendedProviderReaderTest extends TestCase
{
    /**
     * The reader
     *
     * @var InvoiceSuiteAbstractDocumentFormatReader
     */
    private static $document;

    public static function setUpBeforeClass(): void
    {
        self::$document = new InvoiceSuiteZfFxExtendedProviderReader(new InvoiceSuiteZfFxExtendedProvider());

        self::$document->deserializeFromContent(
            file_get_contents(
                InvoiceSuitePathUtils::combinePathWithFile(
                    InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
                    '02_technical_xml_zffx_extended.xml'
                )
            )
        );
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

        $this->assertSame('Some document description', $newDocumentDescription);
    }

    public function testGetDocumentLanguage(): void
    {
        self::$document->getDocumentLanguage($newDocumentLanguage);

        $this->assertSame('de-DE', $newDocumentLanguage);
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

        $this->assertInstanceOf(DateTimeInterface::class, $newCompleteDate);
        $this->assertSame('19700102', $newCompleteDate->format('Ymd'));
    }

    public function testGetDocumentCurrency(): void
    {
        self::$document->getDocumentCurrency($newDocumentCurrency);

        $this->assertSame('EUR', $newDocumentCurrency);
    }

    public function testGetDocumentTaxCurrency(): void
    {
        self::$document->getDocumentTaxCurrency($newDocumentTaxCurrency);

        $this->assertSame('GBP', $newDocumentTaxCurrency);
    }

    public function testGetDocumentIsCopy(): void
    {
        self::$document->getDocumentIsCopy($newDocumentIsCopy);

        $this->assertTrue($newDocumentIsCopy);
    }

    public function testGetDocumentIsTest(): void
    {
        self::$document->getDocumentIsTest($newDocumentIsTest);

        $this->assertTrue($newDocumentIsTest);
    }

    public function testFirstNextGetDocumentNote(): void
    {
        $this->assertTrue(self::$document->firstDocumentNote());

        self::$document->getDocumentNote($newContent, $newContentCode, $newSubjectCode);

        $this->assertSame('Some content', $newContent);
        $this->assertSame('CC00', $newContentCode);
        $this->assertSame('SC00', $newSubjectCode);

        $this->assertTrue(self::$document->nextDocumentNote());

        self::$document->getDocumentNote($newContent, $newContentCode, $newSubjectCode);

        $this->assertSame('Some other content', $newContent);
        $this->assertSame('CC99', $newContentCode);
        $this->assertSame('SC99', $newSubjectCode);

        $this->assertFalse(self::$document->nextDocumentNote());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentNote($newContent, $newContentCode, $newSubjectCode);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentBillingPeriod(): void
    {
        $this->assertTrue(self::$document->firstDocumentBillingPeriod());

        self::$document->getDocumentBillingPeriod($newStartDate, $newEndDate, $newDescription);

        $this->assertSame('19700101', $newStartDate->format('Ymd'));
        $this->assertSame('19700131', $newEndDate->format('Ymd'));
        $this->assertSame('Some Description', $newDescription);

        $this->assertFalse(self::$document->nextDocumentBillingPeriod());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentBillingPeriod($newStartDate, $newEndDate, $newDescription);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentPostingReference(): void
    {
        $this->assertTrue(self::$document->firstDocumentPostingReference());

        self::$document->getDocumentPostingReference($newType, $newAccountId);

        $this->assertSame('PREF-1-TYPE', $newType);
        $this->assertSame('PREF-1', $newAccountId);

        $this->assertTrue(self::$document->nextDocumentPostingReference());

        self::$document->getDocumentPostingReference($newType, $newAccountId);

        $this->assertSame('PREF-2-TYPE', $newType);
        $this->assertSame('PREF-2', $newAccountId);

        $this->assertFalse(self::$document->nextDocumentPostingReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentPostingReference($newType, $newAccountId);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentSellerOrderReference(): void
    {
        $this->assertTrue(self::$document->firstDocumentSellerOrderReference());

        self::$document->getDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('SO-1', $newReferenceNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentSellerOrderReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentBuyerOrderReference(): void
    {
        $this->assertTrue(self::$document->firstDocumentBuyerOrderReference());

        self::$document->getDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('BO-1', $newReferenceNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentBuyerOrderReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentQuotationReference(): void
    {
        $this->assertTrue(self::$document->firstDocumentQuotationReference());

        self::$document->getDocumentQuotationReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('QU-1', $newReferenceNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentQuotationReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentQuotationReference($newReferenceNumber, $newReferenceDate);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentContractReference(): void
    {
        $this->assertTrue(self::$document->firstDocumentContractReference());

        self::$document->getDocumentContractReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('CON-1', $newReferenceNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentContractReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentContractReference($newReferenceNumber, $newReferenceDate);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentAdditionalReference(): void
    {
        $this->assertTrue(self::$document->firstDocumentAdditionalReference());

        self::$document->getDocumentAdditionalReference(
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

        $this->assertTrue(self::$document->nextDocumentAdditionalReference());

        self::$document->getDocumentAdditionalReference(
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

        $this->assertFalse(self::$document->nextDocumentAdditionalReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentAdditionalReference(
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
        $this->assertTrue(self::$document->firstDocumentInvoiceReference());

        self::$document->getDocumentInvoiceReference($newReferenceNumber, $newReferenceDate, $newTypeCode);

        $this->assertSame('INVREF-1', $newReferenceNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));
        $this->assertSame('typecode', $newTypeCode);

        $this->assertTrue(self::$document->nextDocumentInvoiceReference());

        self::$document->getDocumentInvoiceReference($newReferenceNumber, $newReferenceDate, $newTypeCode);

        $this->assertSame('INVREF-2', $newReferenceNumber);
        $this->assertSame('19700102', $newReferenceDate->format('Ymd'));
        $this->assertSame('typecode2', $newTypeCode);

        $this->assertFalse(self::$document->nextDocumentInvoiceReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentInvoiceReference($newReferenceNumber, $newReferenceDate, $newTypeCode);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentProjectReference(): void
    {
        $this->assertTrue(self::$document->firstDocumentProjectReference());

        self::$document->getDocumentProjectReference($newReferenceNumber, $newName);

        $this->assertSame('PROJECT-1', $newReferenceNumber);
        $this->assertSame('Project 1', $newName);

        $this->assertFalse(self::$document->nextDocumentProjectReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentProjectReference($newReferenceNumber, $newName);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentUltimateCustomerOrderReference(): void
    {
        $this->assertTrue(self::$document->firstDocumentUltimateCustomerOrderReference());

        self::$document->getDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('UCOR-1', $newReferenceNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));

        $this->assertTrue(self::$document->nextDocumentUltimateCustomerOrderReference());

        self::$document->getDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('UCOR-2', $newReferenceNumber);
        $this->assertSame('19700102', $newReferenceDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentUltimateCustomerOrderReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentDespatchAdviceReference(): void
    {
        $this->assertTrue(self::$document->firstDocumentDespatchAdviceReference());

        self::$document->getDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('DESPADV-1', $newReferenceNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentDespatchAdviceReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentReceivingAdviceReference(): void
    {
        $this->assertTrue(self::$document->firstDocumentReceivingAdviceReference());

        self::$document->getDocumentReceivingAdviceReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('RECADV-1', $newReferenceNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentReceivingAdviceReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentReceivingAdviceReference($newReferenceNumber, $newReferenceDate);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentDeliveryNoteReference(): void
    {
        $this->assertTrue(self::$document->firstDocumentDeliveryNoteReference());

        self::$document->getDocumentDeliveryNoteReference($newReferenceNumber, $newReferenceDate);

        $this->assertSame('DEVNOTE-1', $newReferenceNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentDeliveryNoteReference());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentDeliveryNoteReference($newReferenceNumber, $newReferenceDate);
        }, '/Undefined (array key|index)/');
    }

    public function testGetDocumentSupplyChainEvent(): void
    {
        self::$document->getDocumentSupplyChainEvent($newDate);

        $this->assertSame('19700101', $newDate->format('Ymd'));
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

        $this->assertTrue(self::$document->firstDocumentSellerId());

        self::$document->getDocumentSellerId($newId);

        $this->assertSame('0815-4711', $newId);

        $this->assertTrue(self::$document->nextDocumentSellerId());

        self::$document->getDocumentSellerId($newId);

        $this->assertSame('0815-4712', $newId);

        $this->assertFalse(self::$document->nextDocumentSellerId());

        // Global ID

        $this->assertTrue(self::$document->firstDocumentSellerGlobalId());

        self::$document->getDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('11111', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertTrue(self::$document->nextDocumentSellerGlobalId());

        self::$document->getDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('22222', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

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

        $this->assertSame('Line 1', $newAddressLine1);
        $this->assertSame('Line 2', $newAddressLine2);
        $this->assertSame('Line 3', $newAddressLine3);
        $this->assertSame('06108', $newPostcode);
        $this->assertSame('City', $newCity);
        $this->assertSame('DE', $newCountryId);
        $this->assertSame('Bavaria', $newSubDivision);

        $this->assertFalse(self::$document->nextDocumentSellerAddress());

        // Legal Organisation

        $this->assertTrue(self::$document->firstDocumentSellerLegalOrganisation());

        self::$document->getDocumentSellerLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('Lieferant AG', $newName);

        $this->assertFalse(self::$document->nextDocumentSellerLegalOrganisation());

        // Contact

        $this->assertTrue(self::$document->firstDocumentSellerContact());

        self::$document->getDocumentSellerContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('Horst Meier', $newPersonName);
        $this->assertSame('Buchhaltung', $newDepartmentName);
        $this->assertSame('0815-4711', $newPhoneNumber);
        $this->assertSame('0815-4712', $newFaxNumber);
        $this->assertSame('horst.meier@lieferant.de', $newEmailAddress);

        $this->assertFalse(self::$document->nextDocumentSellerContact());

        // Communication

        $this->assertTrue(self::$document->firstDocumentSellerCommunication());

        self::$document->getDocumentSellerCommunication($newType, $newUri);

        $this->assertSame('EM', $newType);
        $this->assertSame('info@lieferant.de', $newUri);

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

        $this->assertTrue(self::$document->firstDocumentBuyerId());

        self::$document->getDocumentBuyerId($newId);

        $this->assertSame('0815-4711', $newId);

        $this->assertFalse(self::$document->nextDocumentBuyerId());

        // Global ID

        $this->assertTrue(self::$document->firstDocumentBuyerGlobalId());

        self::$document->getDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('11111', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertTrue(self::$document->nextDocumentBuyerGlobalId());

        self::$document->getDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('22222', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

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

        $this->assertSame('Line 1', $newAddressLine1);
        $this->assertSame('Line 2', $newAddressLine2);
        $this->assertSame('Line 3', $newAddressLine3);
        $this->assertSame('06108', $newPostcode);
        $this->assertSame('City', $newCity);
        $this->assertSame('DE', $newCountryId);
        $this->assertSame('Bavaria', $newSubDivision);

        $this->assertFalse(self::$document->nextDocumentBuyerAddress());

        // Legal Organisation

        $this->assertTrue(self::$document->firstDocumentBuyerLegalOrganisation());

        self::$document->getDocumentBuyerLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('Kunde AG', $newName);

        $this->assertFalse(self::$document->nextDocumentBuyerLegalOrganisation());

        // Contact

        $this->assertTrue(self::$document->firstDocumentBuyerContact());

        self::$document->getDocumentBuyerContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('Horst Meier', $newPersonName);
        $this->assertSame('Buchhaltung', $newDepartmentName);
        $this->assertSame('0815-4711', $newPhoneNumber);
        $this->assertSame('0815-4712', $newFaxNumber);
        $this->assertSame('horst.meier@kunde.de', $newEmailAddress);

        $this->assertFalse(self::$document->nextDocumentBuyerContact());

        // Communication

        $this->assertTrue(self::$document->firstDocumentBuyerCommunication());

        self::$document->getDocumentBuyerCommunication($newType, $newUri);

        $this->assertSame('EM', $newType);
        $this->assertSame('info@kunde.de', $newUri);

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

        $this->assertSame('Tax GmbH', $newName);

        // ID

        $this->assertTrue(self::$document->firstDocumentTaxRepresentativeId());

        self::$document->getDocumentTaxRepresentativeId($newId);

        $this->assertSame('0815-1147', $newId);

        $this->assertFalse(self::$document->nextDocumentTaxRepresentativeId());

        // Global ID

        $this->assertTrue(self::$document->firstDocumentTaxRepresentativeGlobalId());

        self::$document->getDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('11111-TR', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertTrue(self::$document->nextDocumentTaxRepresentativeGlobalId());

        self::$document->getDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('22222-TR', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentTaxRepresentativeGlobalId());

        // Tax Registration

        $this->assertTrue(self::$document->firstDocumentTaxRepresentativeTaxRegistration());

        self::$document->getDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('893489787987', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentTaxRepresentativeTaxRegistration());

        // Address

        $this->assertTrue(self::$document->firstDocumentTaxRepresentativeAddress());

        self::$document->getDocumentTaxRepresentativeAddress(
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

        $this->assertFalse(self::$document->nextDocumentTaxRepresentativeAddress());

        // Legal Organisation

        $this->assertTrue(self::$document->firstDocumentTaxRepresentativeLegalOrganisation());

        self::$document->getDocumentTaxRepresentativeLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('19283746555', $newId);
        $this->assertSame('Tax AG', $newName);

        $this->assertFalse(self::$document->nextDocumentTaxRepresentativeLegalOrganisation());

        // Contact

        $this->assertTrue(self::$document->firstDocumentTaxRepresentativeContact());

        self::$document->getDocumentTaxRepresentativeContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('Horst Müller', $newPersonName);
        $this->assertSame('Finance', $newDepartmentName);
        $this->assertSame('0815-4711-0', $newPhoneNumber);
        $this->assertSame('0815-4711-99', $newFaxNumber);
        $this->assertSame('horst.meier@tax.de', $newEmailAddress);

        $this->assertFalse(self::$document->nextDocumentTaxRepresentativeContact());

        // Communication

        $this->assertTrue(self::$document->firstDocumentTaxRepresentativeCommunication());

        self::$document->getDocumentTaxRepresentativeCommunication($newType, $newUri);

        $this->assertSame('EM', $newType);
        $this->assertSame('info@tax.de', $newUri);

        $this->assertFalse(self::$document->nextDocumentTaxRepresentativeCommunication());

        // Finals

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentTaxRepresentativeId($newId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentTaxRepresentativeAddress(
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
            self::$document->getDocumentTaxRepresentativeLegalOrganisation($newType, $newId, $newName);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentTaxRepresentativeContact(
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentTaxRepresentativeCommunication($newType, $newUri);
        }, '/Undefined (array key|index)/');
    }

    public function testDocumentProductEndUser(): void
    {
        // Name

        self::$document->getDocumentProductEndUserName($newName);

        $this->assertSame('Product End User GmbH', $newName);

        // ID

        $this->assertTrue(self::$document->firstDocumentProductEndUserId());

        self::$document->getDocumentProductEndUserId($newId);

        $this->assertSame('0815-9999-PEU', $newId);

        $this->assertFalse(self::$document->nextDocumentProductEndUserId());

        // Global ID

        $this->assertTrue(self::$document->firstDocumentProductEndUserGlobalId());

        self::$document->getDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('11111-PEU', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertTrue(self::$document->nextDocumentProductEndUserGlobalId());

        self::$document->getDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('22222-PEU', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentProductEndUserGlobalId());

        // Tax Registration

        $this->assertTrue(self::$document->firstDocumentProductEndUserTaxRegistration());

        self::$document->getDocumentProductEndUserTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('893489787987', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentProductEndUserTaxRegistration());

        // Address

        $this->assertTrue(self::$document->firstDocumentProductEndUserAddress());

        self::$document->getDocumentProductEndUserAddress(
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

        $this->assertFalse(self::$document->nextDocumentProductEndUserAddress());

        // Legal Organisation

        $this->assertTrue(self::$document->firstDocumentProductEndUserLegalOrganisation());

        self::$document->getDocumentProductEndUserLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('Product End User AG', $newName);

        $this->assertFalse(self::$document->nextDocumentProductEndUserLegalOrganisation());

        // Contact

        $this->assertTrue(self::$document->firstDocumentProductEndUserContact());

        self::$document->getDocumentProductEndUserContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('Horst Schulze', $newPersonName);
        $this->assertSame('Sales', $newDepartmentName);
        $this->assertSame('0816-471111', $newPhoneNumber);
        $this->assertSame('0816-471222', $newFaxNumber);
        $this->assertSame('horst.schulze@productenduser.de', $newEmailAddress);

        $this->assertFalse(self::$document->nextDocumentProductEndUserContact());

        // Communication

        $this->assertTrue(self::$document->firstDocumentProductEndUserCommunication());

        self::$document->getDocumentProductEndUserCommunication($newType, $newUri);

        $this->assertSame('EM', $newType);
        $this->assertSame('info@productenduser.de', $newUri);

        $this->assertFalse(self::$document->nextDocumentProductEndUserCommunication());

        // Finals

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentProductEndUserId($newId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentProductEndUserTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentProductEndUserAddress(
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
            self::$document->getDocumentProductEndUserLegalOrganisation($newType, $newId, $newName);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentProductEndUserContact(
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentProductEndUserCommunication($newType, $newUri);
        }, '/Undefined (array key|index)/');
    }

    public function testDocumentShipTo(): void
    {
        // Name

        self::$document->getDocumentShipToName($newName);

        $this->assertSame('Ship To GmbH', $newName);

        // ID

        $this->assertTrue(self::$document->firstDocumentShipToId());

        self::$document->getDocumentShipToId($newId);

        $this->assertSame('0815-4711-SH', $newId);

        $this->assertFalse(self::$document->nextDocumentShipToId());

        // Global ID

        $this->assertTrue(self::$document->firstDocumentShipToGlobalId());

        self::$document->getDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('11111-SH', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertTrue(self::$document->nextDocumentShipToGlobalId());

        self::$document->getDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('22222-SH', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentShipToGlobalId());

        // Tax Registration

        $this->assertTrue(self::$document->firstDocumentShipToTaxRegistration());

        self::$document->getDocumentShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('7368366239786-SH', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentShipToTaxRegistration());

        // Address

        $this->assertTrue(self::$document->firstDocumentShipToAddress());

        self::$document->getDocumentShipToAddress(
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

        $this->assertFalse(self::$document->nextDocumentShipToAddress());

        // Legal Organisation

        $this->assertTrue(self::$document->firstDocumentShipToLegalOrganisation());

        self::$document->getDocumentShipToLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('Ship To AG', $newName);

        $this->assertFalse(self::$document->nextDocumentShipToLegalOrganisation());

        // Contact

        $this->assertTrue(self::$document->firstDocumentShipToContact());

        self::$document->getDocumentShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('Horst Meier', $newPersonName);
        $this->assertSame('Buchhaltung', $newDepartmentName);
        $this->assertSame('0815-4711', $newPhoneNumber);
        $this->assertSame('0815-4712', $newFaxNumber);
        $this->assertSame('horst.meier@shipto.de', $newEmailAddress);

        $this->assertFalse(self::$document->nextDocumentShipToContact());

        // Communication

        $this->assertTrue(self::$document->firstDocumentShipToCommunication());

        self::$document->getDocumentShipToCommunication($newType, $newUri);

        $this->assertSame('EM', $newType);
        $this->assertSame('info@shipto.de', $newUri);

        $this->assertFalse(self::$document->nextDocumentShipToCommunication());

        // Finals

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentShipToId($newId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentShipToAddress(
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
            self::$document->getDocumentShipToLegalOrganisation($newType, $newId, $newName);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentShipToContact(
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentShipToCommunication($newType, $newUri);
        }, '/Undefined (array key|index)/');
    }

    public function testDocumentUltimateShipTo(): void
    {
        // Name

        self::$document->getDocumentUltimateShipToName($newName);

        $this->assertSame('Ultimate Ship To GmbH', $newName);

        // ID

        $this->assertTrue(self::$document->firstDocumentUltimateShipToId());

        self::$document->getDocumentUltimateShipToId($newId);

        $this->assertSame('0815-4711', $newId);

        $this->assertFalse(self::$document->nextDocumentUltimateShipToId());

        // Global ID

        $this->assertTrue(self::$document->firstDocumentUltimateShipToGlobalId());

        self::$document->getDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('11111', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertTrue(self::$document->nextDocumentUltimateShipToGlobalId());

        self::$document->getDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('22222', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentUltimateShipToGlobalId());

        // Tax Registration

        $this->assertTrue(self::$document->firstDocumentUltimateShipToTaxRegistration());

        self::$document->getDocumentUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('893489787987', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentUltimateShipToTaxRegistration());

        // Address

        $this->assertTrue(self::$document->firstDocumentUltimateShipToAddress());

        self::$document->getDocumentUltimateShipToAddress(
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

        $this->assertFalse(self::$document->nextDocumentUltimateShipToAddress());

        // Legal Organisation

        $this->assertTrue(self::$document->firstDocumentUltimateShipToLegalOrganisation());

        self::$document->getDocumentUltimateShipToLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('Ultimate Ship To AG', $newName);

        $this->assertFalse(self::$document->nextDocumentUltimateShipToLegalOrganisation());

        // Contact

        $this->assertTrue(self::$document->firstDocumentUltimateShipToContact());

        self::$document->getDocumentUltimateShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('Karl-Heinz Meier', $newPersonName);
        $this->assertSame('Office', $newDepartmentName);
        $this->assertSame('0815-7777-0', $newPhoneNumber);
        $this->assertSame('0815-7777-1', $newFaxNumber);
        $this->assertSame('horst.meier@ultimateshipto.de', $newEmailAddress);

        $this->assertFalse(self::$document->nextDocumentUltimateShipToContact());

        // Communication

        $this->assertTrue(self::$document->firstDocumentUltimateShipToCommunication());

        self::$document->getDocumentUltimateShipToCommunication($newType, $newUri);

        $this->assertSame('EM', $newType);
        $this->assertSame('info@ultimateshipto.de', $newUri);

        $this->assertFalse(self::$document->nextDocumentUltimateShipToCommunication());

        // Finals

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentUltimateShipToId($newId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentUltimateShipToAddress(
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
            self::$document->getDocumentUltimateShipToLegalOrganisation($newType, $newId, $newName);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentUltimateShipToContact(
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentUltimateShipToCommunication($newType, $newUri);
        }, '/Undefined (array key|index)/');
    }

    public function testDocumentShipFrom(): void
    {
        // Name

        self::$document->getDocumentShipFromName($newName);

        $this->assertSame('Ship From GmbH', $newName);

        // ID

        $this->assertTrue(self::$document->firstDocumentShipFromId());

        self::$document->getDocumentShipFromId($newId);

        $this->assertSame('0815-4711-SF', $newId);

        $this->assertFalse(self::$document->nextDocumentShipFromId());

        // Global ID

        $this->assertTrue(self::$document->firstDocumentShipFromGlobalId());

        self::$document->getDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('11111-SF', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertTrue(self::$document->nextDocumentShipFromGlobalId());

        self::$document->getDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('22222-SF', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentShipFromGlobalId());

        // Tax Registration

        $this->assertTrue(self::$document->firstDocumentShipFromTaxRegistration());

        self::$document->getDocumentShipFromTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('1234567890-SF', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentShipFromTaxRegistration());

        // Address

        $this->assertTrue(self::$document->firstDocumentShipFromAddress());

        self::$document->getDocumentShipFromAddress(
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
        $this->assertSame('Thüringen', $newSubDivision);

        $this->assertFalse(self::$document->nextDocumentShipFromAddress());

        // Legal Organisation

        $this->assertTrue(self::$document->firstDocumentShipFromLegalOrganisation());

        self::$document->getDocumentShipFromLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('Ship From AG', $newName);

        $this->assertFalse(self::$document->nextDocumentShipFromLegalOrganisation());

        // Contact

        $this->assertTrue(self::$document->firstDocumentShipFromContact());

        self::$document->getDocumentShipFromContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('Horst Meier', $newPersonName);
        $this->assertSame('Buchhaltung', $newDepartmentName);
        $this->assertSame('0815-4711', $newPhoneNumber);
        $this->assertSame('0815-4712', $newFaxNumber);
        $this->assertSame('horst.meier@shipfrom.de', $newEmailAddress);

        $this->assertFalse(self::$document->nextDocumentShipFromContact());

        // Communication

        $this->assertTrue(self::$document->firstDocumentShipFromCommunication());

        self::$document->getDocumentShipFromCommunication($newType, $newUri);

        $this->assertSame('EM', $newType);
        $this->assertSame('info@shipfrom.de', $newUri);

        $this->assertFalse(self::$document->nextDocumentShipFromCommunication());

        // Finals

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentShipFromId($newId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentShipFromTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentShipFromAddress(
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
            self::$document->getDocumentShipFromLegalOrganisation($newType, $newId, $newName);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentShipFromContact(
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentShipFromCommunication($newType, $newUri);
        }, '/Undefined (array key|index)/');
    }

    public function testDocumentInvoicer(): void
    {
        // Name

        self::$document->getDocumentInvoicerName($newName);

        $this->assertSame('Invoicer GmbH', $newName);

        // ID

        $this->assertTrue(self::$document->firstDocumentInvoicerId());

        self::$document->getDocumentInvoicerId($newId);

        $this->assertSame('0815-4711-INVR', $newId);

        $this->assertFalse(self::$document->nextDocumentInvoicerId());

        // Global ID

        $this->assertTrue(self::$document->firstDocumentInvoicerGlobalId());

        self::$document->getDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('11111-INVR', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertTrue(self::$document->nextDocumentInvoicerGlobalId());

        self::$document->getDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('22222-INVR', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentInvoicerGlobalId());

        // Tax Registration

        $this->assertTrue(self::$document->firstDocumentInvoicerTaxRegistration());

        self::$document->getDocumentInvoicerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('9080706050403020-INVR', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentInvoicerTaxRegistration());

        // Address

        $this->assertTrue(self::$document->firstDocumentInvoicerAddress());

        self::$document->getDocumentInvoicerAddress(
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

        $this->assertFalse(self::$document->nextDocumentInvoicerAddress());

        // Legal Organisation

        $this->assertTrue(self::$document->firstDocumentInvoicerLegalOrganisation());

        self::$document->getDocumentInvoicerLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('Invoicer AG', $newName);

        $this->assertFalse(self::$document->nextDocumentInvoicerLegalOrganisation());

        // Contact

        $this->assertTrue(self::$document->firstDocumentInvoicerContact());

        self::$document->getDocumentInvoicerContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('Horst Meier', $newPersonName);
        $this->assertSame('Buchhaltung', $newDepartmentName);
        $this->assertSame('0815-4711', $newPhoneNumber);
        $this->assertSame('0815-4712', $newFaxNumber);
        $this->assertSame('horst.meier@invoicer.de', $newEmailAddress);

        $this->assertFalse(self::$document->nextDocumentInvoicerContact());

        // Communication

        $this->assertTrue(self::$document->firstDocumentInvoicerCommunication());

        self::$document->getDocumentInvoicerCommunication($newType, $newUri);

        $this->assertSame('EM', $newType);
        $this->assertSame('info@invoicer.de', $newUri);

        $this->assertFalse(self::$document->nextDocumentInvoicerCommunication());

        // Finals

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentInvoicerId($newId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentInvoicerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentInvoicerAddress(
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
            self::$document->getDocumentInvoicerLegalOrganisation($newType, $newId, $newName);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentInvoicerContact(
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentInvoicerCommunication($newType, $newUri);
        }, '/Undefined (array key|index)/');
    }

    public function testDocumentInvoicee(): void
    {
        // Name

        self::$document->getDocumentInvoiceeName($newName);

        $this->assertSame('Invoicee GmbH', $newName);

        // ID

        $this->assertTrue(self::$document->firstDocumentInvoiceeId());

        self::$document->getDocumentInvoiceeId($newId);

        $this->assertSame('0815-4711', $newId);

        $this->assertFalse(self::$document->nextDocumentInvoiceeId());

        // Global ID

        $this->assertTrue(self::$document->firstDocumentInvoiceeGlobalId());

        self::$document->getDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('11111', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertTrue(self::$document->nextDocumentInvoiceeGlobalId());

        self::$document->getDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('22222', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentInvoiceeGlobalId());

        // Tax Registration

        $this->assertTrue(self::$document->firstDocumentInvoiceeTaxRegistration());

        self::$document->getDocumentInvoiceeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('893489787987', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentInvoiceeTaxRegistration());

        // Address

        $this->assertTrue(self::$document->firstDocumentInvoiceeAddress());

        self::$document->getDocumentInvoiceeAddress(
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

        $this->assertFalse(self::$document->nextDocumentInvoiceeAddress());

        // Legal Organisation

        $this->assertTrue(self::$document->firstDocumentInvoiceeLegalOrganisation());

        self::$document->getDocumentInvoiceeLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('Invoicee AG', $newName);

        $this->assertFalse(self::$document->nextDocumentInvoiceeLegalOrganisation());

        // Contact

        $this->assertTrue(self::$document->firstDocumentInvoiceeContact());

        self::$document->getDocumentInvoiceeContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('Horst Meier', $newPersonName);
        $this->assertSame('Buchhaltung', $newDepartmentName);
        $this->assertSame('0815-4711', $newPhoneNumber);
        $this->assertSame('0815-4712', $newFaxNumber);
        $this->assertSame('horst.meier@invoicee.de', $newEmailAddress);

        $this->assertFalse(self::$document->nextDocumentInvoiceeContact());

        // Communication

        $this->assertTrue(self::$document->firstDocumentInvoiceeCommunication());

        self::$document->getDocumentInvoiceeCommunication($newType, $newUri);

        $this->assertSame('EM', $newType);
        $this->assertSame('info@invoicee.de', $newUri);

        $this->assertFalse(self::$document->nextDocumentInvoiceeCommunication());

        // Finals

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentInvoiceeId($newId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentInvoiceeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentInvoiceeAddress(
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
            self::$document->getDocumentInvoiceeLegalOrganisation($newType, $newId, $newName);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentInvoiceeContact(
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentInvoiceeCommunication($newType, $newUri);
        }, '/Undefined (array key|index)/');
    }

    public function testDocumentPayee(): void
    {
        // Name

        self::$document->getDocumentPayeeName($newName);

        $this->assertSame('Payee GmbH', $newName);

        // ID

        $this->assertTrue(self::$document->firstDocumentPayeeId());

        self::$document->getDocumentPayeeId($newId);

        $this->assertSame('0815-4711-PEE', $newId);

        $this->assertFalse(self::$document->nextDocumentPayeeId());

        // Global ID

        $this->assertTrue(self::$document->firstDocumentPayeeGlobalId());

        self::$document->getDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('11111-PEE', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertTrue(self::$document->nextDocumentPayeeGlobalId());

        self::$document->getDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('22222-PEE', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentPayeeGlobalId());

        // Tax Registration

        $this->assertTrue(self::$document->firstDocumentPayeeTaxRegistration());

        self::$document->getDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('893489787987', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentPayeeTaxRegistration());

        // Address

        $this->assertTrue(self::$document->firstDocumentPayeeAddress());

        self::$document->getDocumentPayeeAddress(
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

        $this->assertFalse(self::$document->nextDocumentPayeeAddress());

        // Legal Organisation

        $this->assertTrue(self::$document->firstDocumentPayeeLegalOrganisation());

        self::$document->getDocumentPayeeLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('Payee AG', $newName);

        $this->assertFalse(self::$document->nextDocumentPayeeLegalOrganisation());

        // Contact

        $this->assertTrue(self::$document->firstDocumentPayeeContact());

        self::$document->getDocumentPayeeContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('Horst Mayer', $newPersonName);
        $this->assertSame('Buchhaltung', $newDepartmentName);
        $this->assertSame('0711-4711', $newPhoneNumber);
        $this->assertSame('0711-4712', $newFaxNumber);
        $this->assertSame('horst.mayer@payee.de', $newEmailAddress);

        $this->assertFalse(self::$document->nextDocumentPayeeContact());

        // Communication

        $this->assertTrue(self::$document->firstDocumentPayeeCommunication());

        self::$document->getDocumentPayeeCommunication($newType, $newUri);

        $this->assertSame('EM', $newType);
        $this->assertSame('info@payee.de', $newUri);

        $this->assertFalse(self::$document->nextDocumentPayeeCommunication());

        // Finals

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentPayeeId($newId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentPayeeAddress(
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
            self::$document->getDocumentPayeeLegalOrganisation($newType, $newId, $newName);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentPayeeContact(
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentPayeeCommunication($newType, $newUri);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentPaymentMean(): void
    {
        $this->assertTrue(self::$document->firstDocumentPaymentMean());

        self::$document->getDocumentPaymentMean(
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

        $this->assertTrue(self::$document->nextDocumentPaymentMean());

        self::$document->getDocumentPaymentMean(
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

        $this->assertFalse(self::$document->nextDocumentPaymentMean());
    }

    public function testFirstNextGetDocumentPaymentCreditorReferenceID(): void
    {
        $this->assertTrue(self::$document->firstDocumentPaymentCreditorReferenceID());

        self::$document->getDocumentPaymentCreditorReferenceID($newId);

        $this->assertSame('CREDREF-1', $newId);

        $this->assertFalse(self::$document->nextDocumentPaymentCreditorReferenceID());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentPaymentCreditorReferenceID($newId);
        }, '/Undefined (array key|index)/');
    }

    public function testFirstNextGetDocumentPaymentTerm(): void
    {
        // First Payment Term

        $this->assertTrue(self::$document->firstDocumentPaymentTerm());

        self::$document->getDocumentPaymentTerm($newDescription, $newDueDate, $newMandate);

        $this->assertSame('Direct Debit', $newDescription);
        $this->assertSame('mandate2', $newMandate);

        // Second Payment Term

        $this->assertTrue(self::$document->nextDocumentPaymentTerm());

        self::$document->getDocumentPaymentTerm($newDescription, $newDueDate, $newMandate);

        $this->assertSame('Payment Term Description 1', $newDescription);
        $this->assertSame('19700131', $newDueDate->format('Ymd'));
        $this->assertSame('', $newMandate);

        $this->assertTrue(self::$document->firstDocumentPaymentPenaltyTermsInLastPaymentTerm());

        self::$document->getDocumentPaymentPenaltyTermsInLastPaymentTerm(
            $newBaseAmount,
            $newDiscountAmount,
            $newDiscountPercent,
            $newBaseDate,
            $newBasePeriod,
            $newBasePeriodUnit
        );

        $this->assertEqualsWithDelta(200.0, $newBaseAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(10.0, $newDiscountAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(2.0, $newDiscountPercent, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(1.0, $newBasePeriod, PHP_FLOAT_EPSILON);
        $this->assertSame('DAY', $newBasePeriodUnit);
        $this->assertSame('19700224', $newBaseDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentPaymentPenaltyTermsInLastPaymentTerm());

        $this->assertTrue(self::$document->firstDocumentPaymentDiscountTermsInLastPaymentTerm());

        self::$document->getDocumentPaymentDiscountTermsInLastPaymentTerm(
            $newBaseAmount,
            $newDiscountAmount,
            $newDiscountPercent,
            $newBaseDate,
            $newBasePeriod,
            $newBasePeriodUnit
        );

        $this->assertEqualsWithDelta(200.0, $newBaseAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(10.0, $newDiscountAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(2.0, $newDiscountPercent, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(1.0, $newBasePeriod, PHP_FLOAT_EPSILON);
        $this->assertSame('DAY', $newBasePeriodUnit);
        $this->assertSame('19700224', $newBaseDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentPaymentDiscountTermsInLastPaymentTerm());

        // Third Payment Term

        $this->assertTrue(self::$document->nextDocumentPaymentTerm());

        self::$document->getDocumentPaymentTerm($newDescription, $newDueDate, $newMandate);

        $this->assertSame('Payment Term Description 2', $newDescription);
        $this->assertSame('19700331', $newDueDate->format('Ymd'));
        $this->assertSame('', $newMandate);

        $this->assertFalse(self::$document->firstDocumentPaymentPenaltyTermsInLastPaymentTerm());
        $this->assertFalse(self::$document->nextDocumentPaymentPenaltyTermsInLastPaymentTerm());

        $this->assertFalse(self::$document->firstDocumentPaymentDiscountTermsInLastPaymentTerm());
        $this->assertFalse(self::$document->nextDocumentPaymentDiscountTermsInLastPaymentTerm());
    }

    public function testFirstNextGetDocumentTax(): void
    {
        $this->assertTrue(self::$document->firstDocumentTax());

        self::$document->getDocumentTax(
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

        $this->assertTrue(self::$document->nextDocumentTax());

        self::$document->getDocumentTax(
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

        $this->assertFalse(self::$document->nextDocumentTax());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentTax(
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
        $this->assertTrue(self::$document->firstDocumentAllowanceCharge());

        self::$document->getDocumentAllowanceCharge(
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

        $this->assertTrue(self::$document->nextDocumentAllowanceCharge());

        self::$document->getDocumentAllowanceCharge(
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

        $this->assertFalse(self::$document->nextDocumentAllowanceCharge());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentAllowanceCharge(
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
        $this->assertTrue(self::$document->firstDocumentLogisticServiceCharge());

        self::$document->getDocumentLogisticServiceCharge(
            $newChargeAmount,
            $newDescription,
            $newTaxCategory,
            $newTaxType,
            $newTaxPercent
        );

        $this->assertEqualsWithDelta(10.00, $newChargeAmount, PHP_FLOAT_EPSILON);
        $this->assertSame('description', $newDescription);
        $this->assertSame('S', $newTaxCategory);
        $this->assertSame('VAT', $newTaxType);
        $this->assertEqualsWithDelta(19.0, $newTaxPercent, PHP_FLOAT_EPSILON);

        $this->assertTrue(self::$document->nextDocumentLogisticServiceCharge());

        self::$document->getDocumentLogisticServiceCharge(
            $newChargeAmount,
            $newDescription,
            $newTaxCategory,
            $newTaxType,
            $newTaxPercent
        );

        $this->assertEqualsWithDelta(20.00, $newChargeAmount, PHP_FLOAT_EPSILON);
        $this->assertSame('description2', $newDescription);
        $this->assertSame('S', $newTaxCategory);
        $this->assertSame('VAT', $newTaxType);
        $this->assertEqualsWithDelta(19.0, $newTaxPercent, PHP_FLOAT_EPSILON);

        $this->assertFalse(self::$document->nextDocumentLogisticServiceCharge());

        $this->expectNoticeOrWarningExt(static function (): void {
            self::$document->getDocumentLogisticServiceCharge(
                $newChargeAmount,
                $newDescription,
                $newTaxCategory,
                $newTaxType,
                $newTaxPercent
            );
        }, '/Undefined (array key|index)/');
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

        $this->assertTrue(self::$document->firstDocumentPosition());

        self::$document->getDocumentPosition(
            $newPositionId,
            $newParentPositionId,
            $newLineStatusCode,
            $newLineStatusReasonCode
        );

        $this->assertSame('1.1', $newPositionId);
        $this->assertSame('1', $newParentPositionId);
        $this->assertSame('LINESTATUS', $newLineStatusCode);
        $this->assertSame('LINESTATUSREASON', $newLineStatusReasonCode);

        $this->assertTrue(self::$document->firstDocumentPositionNote());

        self::$document->getDocumentPositionNote(
            $newContent,
            $newContentCode,
            $newSubjectCode
        );

        $this->assertSame('CONTENT-1', $newContent);
        $this->assertSame('CONTENTCODE-1', $newContentCode);
        $this->assertSame('SUBJECTCODE-1', $newSubjectCode);

        $this->assertTrue(self::$document->nextDocumentPositionNote());

        self::$document->getDocumentPositionNote(
            $newContent,
            $newContentCode,
            $newSubjectCode
        );

        $this->assertSame('CONTENT-2', $newContent);
        $this->assertSame('CONTENTCODE-2', $newContentCode);
        $this->assertSame('SUBJECTCODE-2', $newSubjectCode);

        $this->assertFalse(self::$document->nextDocumentPositionNote());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testGetDocumentPositionProductDetails(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

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

        $this->assertSame('PRODUCTID-1', $newProductId);
        $this->assertSame('PRODUCTNAME-1', $newProductName);
        $this->assertSame('PRODUCTDESC-1', $newProductDescription);
        $this->assertSame('PRODUCTSELLERID-1', $newProductSellerId);
        $this->assertSame('PRODUCTBUYER-1', $newProductBuyerId);
        $this->assertSame('PRODUCTGLOBALID-1', $newProductGlobalId);
        $this->assertSame('PRODUCTGLOBALIDTYPE-1', $newProductGlobalIdType);
        $this->assertSame('PRODUCTIND-1', $newProductIndustryId);
        $this->assertSame('PRODUCTMODELID-1', $newProductModelId);
        $this->assertSame('PRODUCTBATCH-1', $newProductBatchId);
        $this->assertSame('PRODUCTBRAND-1', $newProductBrandName);
        $this->assertSame('PRODUCTMODEL-1', $newProductModelName);
        $this->assertSame('PRODUCTCOUNTRY-1', $newProductOriginTradeCountry);

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionProductCharacteristic(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionProductCharacteristic());

        self::$document->getDocumentPositionProductCharacteristic(
            $newProductCharacteristicDescription,
            $newProductCharacteristicValue,
            $newProductCharacteristicType,
            $newProductCharacteristicMeasureValue,
            $newProductCharacteristicMeasureUnit
        );

        $this->assertSame('PRODUCTCHARACTERISTICDESC-1', $newProductCharacteristicDescription);
        $this->assertSame('PRODUCTCHARACTERISTICVALUE-1', $newProductCharacteristicValue);
        $this->assertSame('PRODUCTCHARACTERISTICTYPE-1', $newProductCharacteristicType);
        $this->assertEqualsWithDelta(1.0, $newProductCharacteristicMeasureValue, PHP_FLOAT_EPSILON);
        $this->assertSame('C62', $newProductCharacteristicMeasureUnit);

        $this->assertTrue(self::$document->nextDocumentPositionProductCharacteristic());

        self::$document->getDocumentPositionProductCharacteristic(
            $newProductCharacteristicDescription,
            $newProductCharacteristicValue,
            $newProductCharacteristicType,
            $newProductCharacteristicMeasureValue,
            $newProductCharacteristicMeasureUnit
        );

        $this->assertSame('PRODUCTCHARACTERISTICDESC-2', $newProductCharacteristicDescription);
        $this->assertSame('PRODUCTCHARACTERISTICVALUE-2', $newProductCharacteristicValue);
        $this->assertSame('PRODUCTCHARACTERISTICTYPE-2', $newProductCharacteristicType);
        $this->assertEqualsWithDelta(2.0, $newProductCharacteristicMeasureValue, PHP_FLOAT_EPSILON);
        $this->assertSame('H87', $newProductCharacteristicMeasureUnit);

        $this->assertFalse(self::$document->nextDocumentPositionProductCharacteristic());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionProductClassification(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionProductClassification());

        self::$document->getDocumentPositionProductClassification(
            $newProductClassificationCode,
            $newProductClassificationListId,
            $newProductClassificationListVersionId,
            $newProductClassificationCodeClassname
        );

        $this->assertSame('PRODUCTCLASSCODE-1', $newProductClassificationCode);
        $this->assertSame('PRODUCTLISTID-1', $newProductClassificationListId);
        $this->assertSame('PRODUCTLISTVERSIONID-1', $newProductClassificationListVersionId);
        $this->assertSame('PRODUCTCLASSNAME-1', $newProductClassificationCodeClassname);

        $this->assertTrue(self::$document->nextDocumentPositionProductClassification());

        self::$document->getDocumentPositionProductClassification(
            $newProductClassificationCode,
            $newProductClassificationListId,
            $newProductClassificationListVersionId,
            $newProductClassificationCodeClassname
        );

        $this->assertSame('PRODUCTCLASSCODE-2', $newProductClassificationCode);
        $this->assertSame('PRODUCTLISTID-2', $newProductClassificationListId);
        $this->assertSame('', $newProductClassificationListVersionId);
        $this->assertSame('PRODUCTCLASSNAME-2', $newProductClassificationCodeClassname);

        $this->assertFalse(self::$document->nextDocumentPositionProductClassification());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetPositionReferencedProduct(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionReferencedProduct());

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

        $this->assertSame('PRODUCTREFID-1', $newProductId);
        $this->assertSame('PRODUCTREFNAME-1', $newProductName);
        $this->assertSame('PRODUCTREFDESC-1', $newProductDescription);
        $this->assertSame('PRODUCTREFSELLERID-1', $newProductSellerId);
        $this->assertSame('PRODUCTREFBUYERID-1', $newProductBuyerId);
        $this->assertSame('PRODUCTREFGLOBALID-1', $newProductGlobalId);
        $this->assertSame('PRODUCTREFGLOBALIDTYPE-1', $newProductGlobalIdType);
        $this->assertSame('PRODUCTREFINDID-1', $newProductIndustryId);
        $this->assertEqualsWithDelta(1.0, $newProductUnitQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('C62', $newProductUnitQuantityUnit);

        $this->assertTrue(self::$document->nextDocumentPositionReferencedProduct());

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

        $this->assertSame('PRODUCTREFID-2', $newProductId);
        $this->assertSame('PRODUCTREFNAME-2', $newProductName);
        $this->assertSame('PRODUCTREFDESC-2', $newProductDescription);
        $this->assertSame('PRODUCTREFSELLERID-2', $newProductSellerId);
        $this->assertSame('PRODUCTREFBUYERID-2', $newProductBuyerId);
        $this->assertSame('PRODUCTREFGLOBALID-2', $newProductGlobalId);
        $this->assertSame('PRODUCTREFGLOBALIDTYPE-2', $newProductGlobalIdType);
        $this->assertSame('PRODUCTREFINDID-2', $newProductIndustryId);
        $this->assertEqualsWithDelta(2.0, $newProductUnitQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('H87', $newProductUnitQuantityUnit);

        $this->assertFalse(self::$document->nextDocumentPositionReferencedProduct());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionSellerOrderReference(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionSellerOrderReference());

        self::$document->getDocumentPositionSellerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('SO-1', $newReferenceNumber);
        $this->assertSame('1', $newReferenceLineNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentPositionSellerOrderReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionBuyerOrderReference(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionBuyerOrderReference());

        self::$document->getDocumentPositionBuyerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('BO-1', $newReferenceNumber);
        $this->assertSame('10', $newReferenceLineNumber);
        $this->assertSame('19700102', $newReferenceDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentPositionBuyerOrderReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionQuotationReference(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionQuotationReference());

        self::$document->getDocumentPositionQuotationReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('QU-1', $newReferenceNumber);
        $this->assertSame('100', $newReferenceLineNumber);
        $this->assertSame('19700103', $newReferenceDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentPositionQuotationReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionContractReference(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionContractReference());

        self::$document->getDocumentPositionContractReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('CON-1', $newReferenceNumber);
        $this->assertSame('100', $newReferenceLineNumber);
        $this->assertSame('19700104', $newReferenceDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentPositionContractReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionAdditionalReference(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionAdditionalReference());

        self::$document->getDocumentPositionAdditionalReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate,
            $newTypeCode,
            $newReferenceTypeCode,
            $newDescription,
            $newInvoiceSuiteAttachment
        );

        $this->assertSame('ADD-1', $newReferenceNumber);
        $this->assertSame('100', $newReferenceLineNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));
        $this->assertSame('TYPECODE-1', $newTypeCode);
        $this->assertSame('REFTYPECODE-1', $newReferenceTypeCode);
        $this->assertSame('DESC-1', $newDescription);
        $this->assertNotInstanceOf(InvoiceSuiteAttachment::class, $newInvoiceSuiteAttachment);

        $this->assertTrue(self::$document->nextDocumentPositionAdditionalReference());

        self::$document->getDocumentPositionAdditionalReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate,
            $newTypeCode,
            $newReferenceTypeCode,
            $newDescription,
            $newInvoiceSuiteAttachment
        );

        $this->assertSame('ADD-1', $newReferenceNumber);
        $this->assertSame('200', $newReferenceLineNumber);
        $this->assertSame('19700102', $newReferenceDate->format('Ymd'));
        $this->assertSame('TYPECODE-2', $newTypeCode);
        $this->assertSame('REFTYPECODE-2', $newReferenceTypeCode);
        $this->assertSame('DESC-2', $newDescription);
        $this->assertNotInstanceOf(InvoiceSuiteAttachment::class, $newInvoiceSuiteAttachment);

        $this->assertFalse(self::$document->nextDocumentPositionAdditionalReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionUltimateCustomerOrderReference(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionUltimateCustomerOrderReference());

        self::$document->getDocumentPositionUltimateCustomerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('UCOR-1', $newReferenceNumber);
        $this->assertSame('10', $newReferenceLineNumber);
        $this->assertSame('19700110', $newReferenceDate->format('Ymd'));

        $this->assertTrue(self::$document->nextDocumentPositionUltimateCustomerOrderReference());

        self::$document->getDocumentPositionUltimateCustomerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('UCOR-1', $newReferenceNumber);
        $this->assertSame('20', $newReferenceLineNumber);
        $this->assertSame('19700111', $newReferenceDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentPositionUltimateCustomerOrderReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionDespatchAdviceReference(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionDespatchAdviceReference());

        self::$document->getDocumentPositionDespatchAdviceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('DESPADV-1', $newReferenceNumber);
        $this->assertSame('100', $newReferenceLineNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentPositionDespatchAdviceReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionReceivingAdviceReference(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionReceivingAdviceReference());

        self::$document->getDocumentPositionReceivingAdviceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('RECADV-1', $newReferenceNumber);
        $this->assertSame('10', $newReferenceLineNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentPositionReceivingAdviceReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionDeliveryNoteReference(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionDeliveryNoteReference());

        self::$document->getDocumentPositionDeliveryNoteReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->assertSame('DEVNOTE-1', $newReferenceNumber);
        $this->assertSame('10', $newReferenceLineNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));

        $this->assertFalse(self::$document->nextDocumentPositionDeliveryNoteReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionInvoiceReference(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionInvoiceReference());

        self::$document->getDocumentPositionInvoiceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate,
            $newTypeCode
        );

        $this->assertSame('INVREF-1', $newReferenceNumber);
        $this->assertSame('100', $newReferenceLineNumber);
        $this->assertSame('19700101', $newReferenceDate->format('Ymd'));
        $this->assertSame('TYPECODE-1', $newTypeCode);

        $this->assertFalse(self::$document->nextDocumentPositionInvoiceReference());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstGetDcumentPositionGrossPrice(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDcumentPositionGrossPrice());

        self::$document->getDocumentPositionGrossPrice(
            $newGrossPrice,
            $newGrossPriceBasisQuantity,
            $newGrossPriceBasisQuantityUnit
        );

        $this->assertEqualsWithDelta(100.0, $newGrossPrice, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(1.0, $newGrossPriceBasisQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('C62', $newGrossPriceBasisQuantityUnit);

        $this->assertTrue(self::$document->firstDocumentPositionGrossPriceAllowanceCharge());

        self::$document->getDocumentPositionGrossPriceAllowanceCharge(
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

        $this->assertTrue(self::$document->nextDocumentPositionGrossPriceAllowanceCharge());

        self::$document->getDocumentPositionGrossPriceAllowanceCharge(
            $newGrossPriceAllowanceChargeAmount,
            $newIsCharge,
            $newGrossPriceAllowanceChargePercent,
            $newGrossPriceAllowanceChargeBasisAmount,
            $newGrossPriceAllowanceChargeReason,
            $newGrossPriceAllowanceChargeReasonCode
        );

        $this->assertEqualsWithDelta(11.0, $newGrossPriceAllowanceChargeAmount, PHP_FLOAT_EPSILON);
        $this->assertTrue($newIsCharge);
        $this->assertEqualsWithDelta(33.0, $newGrossPriceAllowanceChargePercent, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(22.0, $newGrossPriceAllowanceChargeBasisAmount, PHP_FLOAT_EPSILON);
        $this->assertSame('REASON-2', $newGrossPriceAllowanceChargeReason);
        $this->assertSame('REASONCODE-2', $newGrossPriceAllowanceChargeReasonCode);

        $this->assertFalse(self::$document->nextDocumentPositionGrossPriceAllowanceCharge());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstGetDocumentPositionNetPrice(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionNetPrice());

        self::$document->getDocumentPositionNetPrice(
            $newNetPrice,
            $newNetPriceBasisQuantity,
            $newNetPriceBasisQuantityUnit
        );

        $this->assertEqualsWithDelta(1.0, $newNetPrice, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(2.0, $newNetPriceBasisQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('C62', $newNetPriceBasisQuantityUnit);

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

        $this->assertTrue(self::$document->firstDocumentPosition());

        self::$document->getDocumentPositionQuantities(
            $newQuantity,
            $newQuantityUnit,
            $newChargeFreeQuantity,
            $newChargeFreeQuantityUnit,
            $newPackageQuantity,
            $newPackageQuantityUnit
        );

        $this->assertEqualsWithDelta(1.0, $newQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('C62', $newQuantityUnit);
        $this->assertEqualsWithDelta(2.0, $newChargeFreeQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('H87', $newChargeFreeQuantityUnit);
        $this->assertEqualsWithDelta(3.0, $newPackageQuantity, PHP_FLOAT_EPSILON);
        $this->assertSame('XPP', $newPackageQuantityUnit);

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testGetDocumentPositionShipTo(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        // Name

        self::$document->getDocumentPositionShipToName($newName);

        $this->assertSame('Ship To GmbH', $newName);

        // ID

        $this->assertTrue(self::$document->firstDocumentPositionShipToId());

        self::$document->getDocumentPositionShipToId($newId);

        $this->assertSame('0815-4711', $newId);

        $this->assertFalse(self::$document->nextDocumentPositionShipToId());

        // Global ID

        $this->assertTrue(self::$document->firstDocumentPositionShipToGlobalId());

        self::$document->getDocumentPositionShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('11111', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertTrue(self::$document->nextDocumentPositionShipToGlobalId());

        self::$document->getDocumentPositionShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('22222', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentPositionShipToGlobalId());

        // Tax Registration

        $this->assertTrue(self::$document->firstDocumentPositionShipToTaxRegistration());

        self::$document->getDocumentPositionShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('893489787987', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentPositionShipToTaxRegistration());

        // Address

        $this->assertTrue(self::$document->firstDocumentPositionShipToAddress());

        self::$document->getDocumentPositionShipToAddress(
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

        $this->assertFalse(self::$document->nextDocumentPositionShipToAddress());

        // Legal Organisation

        $this->assertTrue(self::$document->firstDocumentPositionShipToLegalOrganisation());

        self::$document->getDocumentPositionShipToLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('Ship To AG', $newName);

        $this->assertFalse(self::$document->nextDocumentPositionShipToLegalOrganisation());

        // Contact

        $this->assertTrue(self::$document->firstDocumentPositionShipToContact());

        self::$document->getDocumentPositionShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('Horst Meier', $newPersonName);
        $this->assertSame('Buchhaltung', $newDepartmentName);
        $this->assertSame('0815-4711', $newPhoneNumber);
        $this->assertSame('0815-4712', $newFaxNumber);
        $this->assertSame('horst.meier@shipto.de', $newEmailAddress);

        $this->assertFalse(self::$document->nextDocumentPositionShipToContact());

        // Communication

        $this->assertTrue(self::$document->firstDocumentPositionShipToCommunication());

        self::$document->getDocumentPositionShipToCommunication($newType, $newUri);

        $this->assertSame('EM', $newType);
        $this->assertSame('info@shipto.de', $newUri);

        $this->assertFalse(self::$document->nextDocumentPositionShipToCommunication());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testGetDocumentPositionUltimateShipTo(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        // Name

        self::$document->getDocumentPositionUltimateShipToName($newName);

        $this->assertSame('Ultimate Ship To GmbH', $newName);

        // ID

        $this->assertTrue(self::$document->firstDocumentPositionUltimateShipToId());

        self::$document->getDocumentPositionUltimateShipToId($newId);

        $this->assertSame('0815-4711', $newId);

        $this->assertFalse(self::$document->nextDocumentPositionUltimateShipToId());

        // Global ID

        $this->assertTrue(self::$document->firstDocumentPositionUltimateShipToGlobalId());

        self::$document->getDocumentPositionUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('11111', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertTrue(self::$document->nextDocumentPositionUltimateShipToGlobalId());

        self::$document->getDocumentPositionUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->assertSame('22222', $newGlobalId);
        $this->assertSame('0088', $newGlobalIdType);

        $this->assertFalse(self::$document->nextDocumentPositionUltimateShipToGlobalId());

        // Tax Registration

        $this->assertTrue(self::$document->firstDocumentPositionUltimateShipToTaxRegistration());

        self::$document->getDocumentPositionUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->assertSame('893489787987', $newTaxRegistrationId);
        $this->assertSame('VA', $newTaxRegistrationType);

        $this->assertFalse(self::$document->nextDocumentPositionUltimateShipToTaxRegistration());

        // Address

        $this->assertTrue(self::$document->firstDocumentPositionUltimateShipToAddress());

        self::$document->getDocumentPositionUltimateShipToAddress(
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

        $this->assertFalse(self::$document->nextDocumentPositionUltimateShipToAddress());

        // Legal Organisation

        $this->assertTrue(self::$document->firstDocumentPositionUltimateShipToLegalOrganisation());

        self::$document->getDocumentPositionUltimateShipToLegalOrganisation($newType, $newId, $newName);

        $this->assertSame('8884', $newType);
        $this->assertSame('3874837489237', $newId);
        $this->assertSame('Ultimate Ship To AG', $newName);

        $this->assertFalse(self::$document->nextDocumentPositionUltimateShipToLegalOrganisation());

        // Contact

        $this->assertTrue(self::$document->firstDocumentPositionUltimateShipToContact());

        self::$document->getDocumentPositionUltimateShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->assertSame('Horst Meier', $newPersonName);
        $this->assertSame('Buchhaltung', $newDepartmentName);
        $this->assertSame('0815-4711', $newPhoneNumber);
        $this->assertSame('0815-4712', $newFaxNumber);
        $this->assertSame('horst.meier@ultimateshipto.de', $newEmailAddress);

        $this->assertFalse(self::$document->nextDocumentPositionUltimateShipToContact());

        // Communication

        $this->assertTrue(self::$document->firstDocumentPositionUltimateShipToCommunication());

        self::$document->getDocumentPositionUltimateShipToCommunication($newType, $newUri);

        $this->assertSame('EM', $newType);
        $this->assertSame('info@ultimateshipto.de', $newUri);

        $this->assertFalse(self::$document->nextDocumentPositionUltimateShipToCommunication());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testGetDocumentPositionSupplyChainEvent(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        self::$document->getDocumentPositionSupplyChainEvent($newDate);

        $this->assertSame('19700101', $newDate->format('Ymd'));

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionBillingPeriod(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionBillingPeriod());

        self::$document->getDocumentPositionBillingPeriod(
            $newStartDate,
            $newEndDate,
            $newDescription
        );

        $this->assertSame('19700101', $newStartDate->format('Ymd'));
        $this->assertSame('19700131', $newEndDate->format('Ymd'));
        $this->assertSame('Some Description', $newDescription);

        $this->assertFalse(self::$document->nextDocumentPositionBillingPeriod());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionTax(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionTax());

        self::$document->getDocumentPositionTax(
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

        $this->assertTrue(self::$document->nextDocumentPositionTax());

        self::$document->getDocumentPositionTax(
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
        $this->assertSame('Reason2', $newExemptionReason);
        $this->assertSame('ReasonCode2', $newExemptionReasonCode);

        $this->assertFalse(self::$document->nextDocumentPositionTax());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionAllowanceCharge(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionAllowanceCharge());

        self::$document->getDocumentPositionAllowanceCharge(
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

        $this->assertTrue(self::$document->nextDocumentPositionAllowanceCharge());

        self::$document->getDocumentPositionAllowanceCharge(
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

        $this->assertFalse(self::$document->nextDocumentPositionAllowanceCharge());

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstGetDocumentPositionSummation(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionSummation());

        self::$document->getDocumentPositionSummation(
            $newNetAmount,
            $newChargeTotalAmount,
            $newDiscountTotalAmount,
            $newTaxTotalAmount,
            $newGrossAmount
        );

        $this->assertEqualsWithDelta(100.00, $newNetAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(1.0, $newChargeTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(2.0, $newDiscountTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(3.0, $newTaxTotalAmount, PHP_FLOAT_EPSILON);
        $this->assertEqualsWithDelta(4.0, $newGrossAmount, PHP_FLOAT_EPSILON);

        // Second position

        $this->assertFalse(self::$document->nextDocumentPosition());
    }

    public function testFirstNextGetDocumentPositionPostingReference(): void
    {
        // First position

        $this->assertTrue(self::$document->firstDocumentPosition());

        $this->assertTrue(self::$document->firstDocumentPositionPostingReference());

        self::$document->getDocumentPositionPostingReference($newType, $newAccountId);

        $this->assertSame('PREF-1-TYPE', $newType);
        $this->assertSame('PREF-1', $newAccountId);

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
}
