<?php

namespace horstoeko\invoicesuite\tests\testcases\documentproviders;

use DateTimeInterface;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatReader;
use horstoeko\invoicesuite\documents\providers\zffxextended\InvoiceSuiteZfFxExtendedProvider;
use horstoeko\invoicesuite\documents\providers\zffxextended\InvoiceSuiteZfFxExtendedProviderReader;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

class ZfFxExtendedProviderReaderTest extends TestCase
{
    /**
     * The reader
     *
     * @var InvoiceSuiteAbstractDocumentFormatReader
     */
    protected static $document;

    public static function setUpBeforeClass(): void
    {
        self::$document = new InvoiceSuiteZfFxExtendedProviderReader(new InvoiceSuiteZfFxExtendedProvider());

        self::$document->deserializeFromContent(
            file_get_contents(
                InvoiceSuitePathUtils::combinePathWithFile(
                    InvoiceSuitePathUtils::combineAllPaths(__DIR__, "..", "..", "assets"),
                    "02_technical_xml_zffx_extended.xml"
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

        $this->assertSame("EUR", $newDocumentCurrency);
    }

    public function testGetDocumentTaxCurrency(): void
    {
        self::$document->getDocumentTaxCurrency($newDocumentTaxCurrency);

        $this->assertSame("GBP", $newDocumentTaxCurrency);
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

        $this->assertSame("Some content", $newContent);
        $this->assertSame("CC00", $newContentCode);
        $this->assertSame("SC00", $newSubjectCode);

        $this->assertTrue(self::$document->nextDocumentNote());

        self::$document->getDocumentNote($newContent, $newContentCode, $newSubjectCode);

        $this->assertSame("Some other content", $newContent);
        $this->assertSame("CC99", $newContentCode);
        $this->assertSame("SC99", $newSubjectCode);

        $this->assertFalse(self::$document->nextDocumentNote());

        $this->expectNoticeOrWarningExt(function () {
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

        $this->expectNoticeOrWarningExt(function () {
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

        $this->expectNoticeOrWarningExt(function () {
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

        $this->expectNoticeOrWarningExt(function () {
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

        $this->expectNoticeOrWarningExt(function () {
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

        $this->expectNoticeOrWarningExt(function () {
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

        $this->expectNoticeOrWarningExt(function () {
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
        $this->assertNull($newInvoiceSuiteAttachment);

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
        $this->assertNull($newInvoiceSuiteAttachment);

        $this->assertFalse(self::$document->nextDocumentAdditionalReference());

        $this->expectNoticeOrWarningExt(function () {
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

        $this->expectNoticeOrWarningExt(function () {
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

        $this->expectNoticeOrWarningExt(function () {
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

        $this->expectNoticeOrWarningExt(function () {
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

        $this->expectNoticeOrWarningExt(function () {
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

        $this->expectNoticeOrWarningExt(function () {
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

        $this->expectNoticeOrWarningExt(function () {
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

        $this->expectNoticeOrWarningExt(function () {
            self::$document->getDocumentSellerId($newId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(function () {
            self::$document->getDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(function () {
            self::$document->getDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(function () {
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

        $this->expectNoticeOrWarningExt(function () {
            self::$document->getDocumentSellerLegalOrganisation($newType, $newId, $newName);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(function () {
            self::$document->getDocumentSellerContact(
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(function () {
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

        $this->expectNoticeOrWarningExt(function () {
            self::$document->getDocumentBuyerId($newId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(function () {
            self::$document->getDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(function () {
            self::$document->getDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(function () {
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

        $this->expectNoticeOrWarningExt(function () {
            self::$document->getDocumentBuyerLegalOrganisation($newType, $newId, $newName);
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(function () {
            self::$document->getDocumentBuyerContact(
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            );
        }, '/Undefined (array key|index)/');

        $this->expectNoticeOrWarningExt(function () {
            self::$document->getDocumentBuyerCommunication($newType, $newUri);
        }, '/Undefined (array key|index)/');
    }
}
