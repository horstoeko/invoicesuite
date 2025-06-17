<?php

use horstoeko\invoicesuite\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteNoteDTO;
use horstoeko\invoicesuite\dto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\dto\InvoiceSuitePeriodDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteAddressDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteContactDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteMeasureDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteProductDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteProjectDTO;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDocumentDTO;
use horstoeko\invoicesuite\dto\InvoiceSuitesummationDTO;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\dto\InvoiceSuitePaymentMeanDTO;
use horstoeko\invoicesuite\dto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteOrganisationDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDocumentExtDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteCommunicationDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteServiceChargeDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteAllowanceChargeDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteDateRangeDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteDocumentPositionDTO;
use horstoeko\invoicesuite\dto\InvoiceSuitePaymentTermPenaltyDTO;
use horstoeko\invoicesuite\dto\InvoiceSuitePaymentTermDiscountDTO;
use horstoeko\invoicesuite\dto\InvoiceSuitePriceGrossDTO;
use horstoeko\invoicesuite\dto\InvoiceSuitePriceNetDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteProductCharacteristicDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteProductClassificationDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDocumentLineDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDocumentLineExtDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteReferenceProductDTO;
use horstoeko\invoicesuite\dto\InvoiceSuitesummationLineDTO;

require __DIR__ . "/../vendor/autoload.php";

$builder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('ublinvoice');
$builder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('zffxextended');

$documentDTO = new InvoiceSuiteDocumentHeaderDTO();
$documentDTO
    ->setNumber("2025-04-000001")
    ->setType("380")
    ->setDescription("Some document description")
    ->setLanguage("German")
    ->setDate(new DateTime())
    ->setCompleteDate(new DateTime())
    ->setCurrency("EUR")
    ->setTaxCurrency("GBP")
    ->setIsCopy(true)
    ->setIsTest(true)
    ->addNote(new InvoiceSuiteNoteDTO("Some content", "CC00", "SC00"))
    ->addNote(new InvoiceSuiteNoteDTO("Some other content", "CC99", "SC99"))
    ->setBillingPeriod(new InvoiceSuiteDateRangeDTO(new DateTime("first day of this month"), new DateTime("last day of this month"), "Some Description"))
    ->setSellerParty(
        (new InvoiceSuitePartyDTO())
            ->addName("Lieferant GmbH")
            ->addId(new InvoiceSuiteIdDTO("0815-4711"))
            ->addId(new InvoiceSuiteIdDTO("0815-4712"))
            ->addGlobalId(new InvoiceSuiteIdDTO("11111", "0088"))
            ->addGlobalId(new InvoiceSuiteIdDTO("22222", "0088"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("893489787987", "VA"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("893489787987-X", "FC"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("893489787987-AA", "VA"))
            ->addAddress(new InvoiceSuiteAddressDTO("line1", "line2", "line3", "06108", "City", "DE", "Bavaria"))
            ->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("3874837489237", "8884", "Lieferant AG"))
            ->addContact(new InvoiceSuiteContactDTO("Horst Meier", "Buchhaltung", "0815-4711", "0815-4712", "horst.meier@lieferant.de"))
            ->addCommunication(new InvoiceSuiteCommunicationDTO("info@lieferant.de", "EM"))
    )
    ->setBuyerParty(
        (new InvoiceSuitePartyDTO())
            ->addName("Kunde GmbH")
            ->addId(new InvoiceSuiteIdDTO("0815-4711"))
            ->addId(new InvoiceSuiteIdDTO("0815-4712"))
            ->addGlobalId(new InvoiceSuiteIdDTO("347364862366467", "0088"))
            ->addGlobalId(new InvoiceSuiteIdDTO("972984923467863", "0088"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("333355525", "VA"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("333355526", "VA"))
            ->addAddress(new InvoiceSuiteAddressDTO("line1", "line2", "line3", "06108", "City", "DE", "Bavaria"))
            ->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("3874837489237", "8884", "Kunde AG"))
            ->addContact(new InvoiceSuiteContactDTO("Lars Müller", "Buchhaltung", "0815-9991", "0815-9992", "la.mue@kunde.de"))
            ->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@kunde.de", "EM"))
    )
    ->setTaxRepresentativeParty(
        (new InvoiceSuitePartyDTO())
            ->addName("Tax GmbH")
            ->addId(new InvoiceSuiteIdDTO("0901-4711"))
            ->addId(new InvoiceSuiteIdDTO("0901-4712"))
            ->addGlobalId(new InvoiceSuiteIdDTO("T-1", "0088"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("9089767578", "VA"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("9089767578-1", "VA"))
            ->addAddress(new InvoiceSuiteAddressDTO("line1", "line2", "line3", "04001", "Somewhere", "DE", "Saxonia"))
            ->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("3874837489237", "8884", "Tax AG"))
    )
    ->setProductEndUserParty(
        (new InvoiceSuitePartyDTO())
            ->addName("End-User GmbH")
            ->addId(new InvoiceSuiteIdDTO("0201-4711"))
            ->addId(new InvoiceSuiteIdDTO("0201-4712"))
            ->addGlobalId(new InvoiceSuiteIdDTO("37877787", "0088"))
            ->addGlobalId(new InvoiceSuiteIdDTO("37877787-1", "0088"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("333355525", "VA"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("333355525-2", "VA"))
            ->addAddress(new InvoiceSuiteAddressDTO("line1", "line2", "line3", "06108", "OtherCity", "DE", "NRW"))
            ->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("3874837489237", "8884", "Kunde AG"))
            ->addContact(new InvoiceSuiteContactDTO("Lars Müller", "Buchhaltung", "0815-9991", "0815-9992", "la.mue@end-user.de"))
            ->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@end-user.de", "EM"))
            ->addCommunication(new InvoiceSuiteCommunicationDTO("invoice-2@end-user.de", "EM"))
    )
    ->setShipToParty(
        (new InvoiceSuitePartyDTO())
            ->addName("ShipTo GmbH")
            ->addId(new InvoiceSuiteIdDTO("1111111"))
            ->addId(new InvoiceSuiteIdDTO("1111111-A"))
            ->addGlobalId(new InvoiceSuiteIdDTO("9999999", "0088"))
            ->addGlobalId(new InvoiceSuiteIdDTO("9999999-A", "0088"))
            ->addGlobalId(new InvoiceSuiteIdDTO("9999999-B", "0088"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("50970870000", "VA"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("50970870000-A", "VA"))
            ->addAddress(new InvoiceSuiteAddressDTO("line1", "line2", "line3", "10175", "Berlin", "DE", "Berlin"))
            ->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("99ß0224444", "8884", "ShipTo AG"))
            ->addContact(new InvoiceSuiteContactDTO("Alfons Zitterbacke", "Buchhaltung", "030-9991", "030-9992", "alfzit@shipto-gmbh.de"))
            ->addContact(new InvoiceSuiteContactDTO("Rolf Zitterbacke", "Controlling", "030-9991", "030-9992", "rolzit@shipto-gmbh.de"))
            ->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@shipto-gmbh.de", "EM"))
            ->addCommunication(new InvoiceSuiteCommunicationDTO("invoice-2@shipto-gmbh.de", "EM"))
    )
    ->setUltimateShipToParty(
        (new InvoiceSuitePartyDTO())
            ->addName("Ultimate User GmbH")
            ->addId(new InvoiceSuiteIdDTO("U-1111111"))
            ->addId(new InvoiceSuiteIdDTO("U-1111111-A"))
            ->addGlobalId(new InvoiceSuiteIdDTO("9999999", "0088"))
            ->addGlobalId(new InvoiceSuiteIdDTO("9999999-A", "0088"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("444574987534", "VA"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("444574987534-A", "VA"))
            ->addAddress(new InvoiceSuiteAddressDTO("line1", "line2", "line3", "10176", "Berlin", "DE", "Berlin"))
            ->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("99ß0224444", "8884", "Ultimate User AG"))
            ->addContact(new InvoiceSuiteContactDTO("Alfons Baum", "Dispo", "030-10001", "030-10001", "alfzit@ultimate-user-gmbh.de"))
            ->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@ultimate-user-gmbh.de", "EM"))
    )
    ->setShipFromParty(
        (new InvoiceSuitePartyDTO())
            ->addName("Ship-From GmbH")
            ->addId(new InvoiceSuiteIdDTO("SF-999999-A"))
            ->addId(new InvoiceSuiteIdDTO("SF-999999-B"))
            ->addGlobalId(new InvoiceSuiteIdDTO("8888888", "0088"))
            ->addGlobalId(new InvoiceSuiteIdDTO("8888888-A", "0088"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("000008080663", "VA"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("000008080663-A", "VA"))
            ->addAddress(new InvoiceSuiteAddressDTO("line1", "line2", "line3", "10176", "Düsseldorf", "DE", "NRW"))
            ->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("99ß0224444", "8884", "Ship-From AG"))
            ->addContact(new InvoiceSuiteContactDTO("Alfons Baum", "Dispo", "0221-10001", "0221-10001", "alfzit@ship-from-gmbh.de"))
            ->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@ship-from-gmbh.de", "EM"))
    )
    ->setInvoicerParty(
        (new InvoiceSuitePartyDTO())
            ->addName("Invoicer GmbH")
            ->addId(new InvoiceSuiteIdDTO("INVOICER-001"))
            ->addId(new InvoiceSuiteIdDTO("INVOICER-002"))
            ->addGlobalId(new InvoiceSuiteIdDTO("INVOICER222", "0088"))
            ->addGlobalId(new InvoiceSuiteIdDTO("INVOICER222-A", "0088"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("9989773373", "VA"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("9989773373-A", "VA"))
            ->addAddress(new InvoiceSuiteAddressDTO("Invoicer Street", "Invoicer Street 2", "Invoicer Street 3", "99999", "Invoicer-City", "DE", "RLP"))
            ->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("Invoicer-Org-Id", "8884", "Invoicer AG"))
            ->addContact(new InvoiceSuiteContactDTO("Alfons Baum", "Dispo", "0999-10001", "0999-10001", "alfzit@Invoicer-gmbh.de"))
            ->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@invoicer-gmbh.de", "EM"))
    )
    ->setInvoiceeParty(
        (new InvoiceSuitePartyDTO())
            ->addName("Invoicee GmbH")
            ->addId(new InvoiceSuiteIdDTO("INVOICEE-001"))
            ->addId(new InvoiceSuiteIdDTO("INVOICEE-002"))
            ->addGlobalId(new InvoiceSuiteIdDTO("INVOICEE222", "0088"))
            ->addGlobalId(new InvoiceSuiteIdDTO("INVOICEE222-A", "0088"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("9989773373", "VA"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("9989773373-A", "VA"))
            ->addAddress(new InvoiceSuiteAddressDTO("Invoicee Street", "Invoicee Street 2", "Invoicee Street 3", "99999", "Invoicee-City", "DE", "RLP"))
            ->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("Invoicee-Org-Id", "8884", "Invoicee AG"))
            ->addContact(new InvoiceSuiteContactDTO("Alfons Baum", "Dispo", "0999-10001", "0999-10001", "alfzit@Invoicee-gmbh.de"))
            ->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@Invoicee-gmbh.de", "EM"))
    )
    ->setPayeeParty(
        (new InvoiceSuitePartyDTO())
            ->addName("Payee GmbH")
            ->addId(new InvoiceSuiteIdDTO("PAYEE-001"))
            ->addId(new InvoiceSuiteIdDTO("PAYEE-002"))
            ->addGlobalId(new InvoiceSuiteIdDTO("PAYEE222", "0088"))
            ->addGlobalId(new InvoiceSuiteIdDTO("PAYEE222-A", "0088"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("9989773373", "VA"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("9989773373-A", "VA"))
            ->addAddress(new InvoiceSuiteAddressDTO("Payee Street", "Payee Street 2", "Payee Street 3", "99999", "Payee-City", "DE", "RLP"))
            ->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("Payee-Org-Id", "8884", "Payee AG"))
            ->addContact(new InvoiceSuiteContactDTO("Alfons Baum", "Dispo", "0999-10001", "0999-10001", "alfzit@payee-gmbh.de"))
            ->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@payee-gmbh.de", "EM"))
    )
    ->addSellerOrderReference(
        (new InvoiceSuiteReferenceDocumentDTO("SO-2025/0000001", new DateTime()))
    )
    ->addBuyerOrderReference(
        (new InvoiceSuiteReferenceDocumentDTO("PO-0000011", new DateTime()))
    )
    ->addQuotationReference(
        (new InvoiceSuiteReferenceDocumentDTO("ANG-2025/0000055", new DateTime()))
    )
    ->addContractReference(
        (new InvoiceSuiteReferenceDocumentDTO("CON-2025/0000001", new DateTime()))
    )
    ->addAdditionalReference(
        (new InvoiceSuiteReferenceDocumentExtDTO(
            "ADDDOC-001",
            new DateTime(),
            "918",
            "0815",
            "Description for additional docuemnt",
            InvoiceSuiteAttachment::fromBase64String('SWNoIGJpbiBlaW4gVGVzdHRleHQ=', 'att.ext')
        ))
    )
    ->addAdditionalReference(
        (new InvoiceSuiteReferenceDocumentExtDTO(
            "ADDDOC-002",
            new DateTime(),
            "918",
            "0816",
            "Description for additional docuemnt",
            InvoiceSuiteAttachment::fromUrl('http://some.url')
        ))
    )
    ->addInvoiceReference(
        (new InvoiceSuiteReferenceDocumentExtDTO("INVREF-001", new DateTime(), "382"))
    )
    ->addInvoiceReference(
        (new InvoiceSuiteReferenceDocumentExtDTO("INVREF-002", new DateTime("+1 day"), "382"))
    )
    ->addProjectReference(
        (new InvoiceSuiteProjectDTO("PROJECT-0001", "Project 1"))
    )
    ->addUltimateCustomerOrderReference(
        (new InvoiceSuiteReferenceDocumentDTO('UCOR-0000001', new DateTime()))
    )
    ->addDespatchAdviceReference(
        (new InvoiceSuiteReferenceDocumentDTO('DESPATCHADV-0000001', new DateTime()))
    )
    ->addReceivingAdviceReference(
        (new InvoiceSuiteReferenceDocumentDTO('RECEIPTADV-0000001', new DateTime()))
    )
    ->addDeliveryNoteReference(
        (new InvoiceSuiteReferenceDocumentDTO('DELIVERYNOTE-0000001', new DateTime()))
    )
    ->addPostingReference(
        (new InvoiceSuiteIdDTO('FINACC', '1'))
    )
    ->setSupplyChainEvent(
        new DateTime()
    )
    ->addPaymentmean(
        InvoiceSuitePaymentMeanDTO::createAsDirectDebitSepa('0000000000000815', 'MANDATE-1')
    )
    ->addPaymentmean(
        InvoiceSuitePaymentMeanDTO::createAsCreditTransferSepa('payeeiban', 'payeeaccountname', 'payeepropid', 'payeebic', 'paymentref')
    )
    ->addPaymentmean(
        InvoiceSuitePaymentMeanDTO::createAsPaymentCardPayment('cardid', 'cardholder')
    )
    ->addPaymentterm(
        (new InvoiceSuitePaymentTermDTO(
            "30 Tage Netto",
            new DateTime("+30 days"),
            [
                (new InvoiceSuitePaymentTermDiscountDTO(100.0, 10.0, 10.0, new DateTime(), new InvoiceSuitePeriodDTO(10.0, 'DAY')))
            ],
            [
                (new InvoiceSuitePaymentTermPenaltyDTO(10.0, 1.0, 5.0, new DateTime(), new InvoiceSuitePeriodDTO(2, 'MON')))
            ]
        ))
    )
    ->addCreditorReference(
        (new InvoiceSuiteIdDTO("CREDREF"))
    )
    ->addCreditorReference(
        (new InvoiceSuiteIdDTO("CREDREF2"))
    )
    ->addTax(
        (new InvoiceSuiteTaxDTO('S', 'VAT', 100.00, 19.00, 19.0, 'Reason', 'ReasonCode', new DateTime(), 'DUECODE'))
    )
    ->addAllowanceCharge(
        (new InvoiceSuiteAllowanceChargeDTO(true, 10, 100, 2, 'S', 'VAT', 19, 'Reason', 'ReasonCode'))
    )
    ->addServiceCharge(
        (new InvoiceSuiteServiceChargeDTO(50, 'Logisitic Charge', 'S', 'VAT', 19))
    )
    ->setSummation(
        (new InvoiceSuitesummationDTO(100, 10, 20, 90, 90 * 0.19, 50, 107.1, 100.0, 7.10, 0.0))
    );

$position = new InvoiceSuiteDocumentPositionDTO('1', null, null, 'GROUP');

$documentDTO->addPosition($position);

$position = new InvoiceSuiteDocumentPositionDTO('1.1', '1', '0815', 'DETAIL');

$position->addNote(new InvoiceSuiteNoteDTO('Some content'))
    ->addNote(new InvoiceSuiteNoteDTO('Some second content'))
    ->addNote(new InvoiceSuiteNoteDTO("Some third Content", "ContentCode", "SubjectCode"))
    ->setProduct(
        (new InvoiceSuiteProductDTO(
            'ProductId',
            'ProductName',
            'ProductDescription',
            'SellerID',
            'BuyerID',
            new InvoiceSuiteIdDTO('3333432332', '0088'),
            'IndustryId',
            'ModelId',
            'BatchId',
            'Brandname',
            'Modelname',
            'CN'
        ))->addCharacteristic(new InvoiceSuiteProductCharacteristicDTO(
            'Füllmenge',
            '1000 Liter',
            'FM',
            new InvoiceSuiteMeasureDTO(1000.0, "LTR")
        ))->addClassification(new InvoiceSuiteProductClassificationDTO(
            'classcode',
            'classname',
            'listid',
            '1.0'
        ))->addReferenceProduct(new InvoiceSuiteReferenceProductDTO(
            'id',
            'name',
            'descr',
            'sellerid',
            'buyerid',
            new InvoiceSuiteIdDTO('324423432', '0088'),
            'industryidentifier',
            new InvoiceSuiteQuantityDTO('10', 'PCT')
        ))
    )
    ->addSellerOrderReference(new InvoiceSuiteReferenceDocumentLineDTO('SO-2025/0000001', '10', new DateTime()))
    ->addBuyerOrderReference(new InvoiceSuiteReferenceDocumentLineDTO('PO-0000011', '20', new DateTime()))
    ->addQuotationReference(new InvoiceSuiteReferenceDocumentLineDTO('ANG-2025/0000055', '30', new DateTime()))
    ->addContractReference(new InvoiceSuiteReferenceDocumentLineDTO('CON-2025/0000001', '40', new DateTime()))
    ->addAdditionalReference(new InvoiceSuiteReferenceDocumentLineExtDTO('ADDDOC-001', '100', new DateTime(), "918", "0815", "Description for additional docuemnt", InvoiceSuiteAttachment::fromBase64String('SWNoIGJpbiBlaW4gVGVzdHRleHQ=', 'att.ext')))
    ->addAdditionalReference(new InvoiceSuiteReferenceDocumentLineExtDTO('ADDDOC-002', '101', new DateTime(), "918", "0816", "Description for additional docuemnt", InvoiceSuiteAttachment::fromUrl('http://some.url')))
    ->addUltimateCustomerOrderReference(new InvoiceSuiteReferenceDocumentLineDTO('UCOR-0000001', '200', new DateTime()))
    ->addDespatchAdviceReference(new InvoiceSuiteReferenceDocumentLineDTO('DESPATCHADV-0000001', '300', new DateTime()))
    ->addReceivingAdviceReference(new InvoiceSuiteReferenceDocumentLineDTO('RECEIPTADV-0000001', '400', new DateTime()))
    ->addDeliveryNoteReference(new InvoiceSuiteReferenceDocumentLineDTO('DELIVERYNOTE-0000001', '500', new DateTime()))
    ->addInvoiceReference((new InvoiceSuiteReferenceDocumentLineExtDTO("INVREF-001", "4000", new DateTime(), "382")))
    ->setGrossPrice((new InvoiceSuitePriceGrossDTO(110.0, new InvoiceSuiteQuantityDTO(1, "C62")))->addAllowanceCharge(new InvoiceSuiteAllowanceChargeDTO(false, 10, 100, 10, null, null, null, 'Reason', 'ReasonCode')))
    ->setNetPrice((new InvoiceSuitePriceNetDTO(100, new InvoiceSuiteQuantityDTO(1.0, "C62")))->addTax(new InvoiceSuiteTaxDTO("S", "VAT", null, 9.0, 7.0, "Reason", "Reasoncode")))
    ->setQuantityBilled(new InvoiceSuiteQuantityDTO(10.0, "C62"))
    ->setQuantityChargeFree(new InvoiceSuiteQuantityDTO(2, "KTR"))
    ->setQuantityPackage(new InvoiceSuiteQuantityDTO(1, "MTR"))
    ->setShipToParty(
        (new InvoiceSuitePartyDTO())
            ->addName("ShipTo GmbH")
            ->addId(new InvoiceSuiteIdDTO("2222222"))
            ->addId(new InvoiceSuiteIdDTO("2222222-A"))
            ->addGlobalId(new InvoiceSuiteIdDTO("9999999", "0088"))
            ->addGlobalId(new InvoiceSuiteIdDTO("9999999-A", "0088"))
            ->addGlobalId(new InvoiceSuiteIdDTO("9999999-B", "0088"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("50970870000", "VA"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("50970870000-A", "VA"))
            ->addAddress(new InvoiceSuiteAddressDTO("line1", "line2", "line3", "10175", "Berlin", "DE", "Berlin"))
            ->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("99ß0224444", "8884", "ShipTo AG"))
            ->addContact(new InvoiceSuiteContactDTO("Alfons Zitterbacke", "Buchhaltung", "030-9991", "030-9992", "alfzit@shipto-gmbh.de"))
            ->addContact(new InvoiceSuiteContactDTO("Rolf Zitterbacke", "Controlling", "030-9991", "030-9992", "rolzit@shipto-gmbh.de"))
            ->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@shipto-gmbh.de", "EM"))
            ->addCommunication(new InvoiceSuiteCommunicationDTO("invoice-2@shipto-gmbh.de", "EM"))
    )
    ->setUltimateShipToParty(
        (new InvoiceSuitePartyDTO())
            ->addName("Ultimate User GmbH")
            ->addId(new InvoiceSuiteIdDTO("U-1111111"))
            ->addId(new InvoiceSuiteIdDTO("U-1111111-A"))
            ->addGlobalId(new InvoiceSuiteIdDTO("9999999", "0088"))
            ->addGlobalId(new InvoiceSuiteIdDTO("9999999-A", "0088"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("444574987534", "VA"))
            ->addTaxRegistration(new InvoiceSuiteIdDTO("444574987534-A", "VA"))
            ->addAddress(new InvoiceSuiteAddressDTO("line1", "line2", "line3", "10176", "Berlin", "DE", "Berlin"))
            ->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("99ß0224444", "8884", "Ultimate User AG"))
            ->addContact(new InvoiceSuiteContactDTO("Alfons Baum", "Dispo", "030-10001", "030-10001", "alfzit@ultimate-user-gmbh.de"))
            ->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@ultimate-user-gmbh.de", "EM"))
    )
    ->setSupplyChainEvent(new DateTime())
    ->setBillingPeriod(new InvoiceSuiteDateRangeDTO(new DateTime("first day of this month"), new DateTime("last day of this month"), "Some Description"))
    ->addPostingReference(new InvoiceSuiteIdDTO("FINACC", "1"))
    ->addTax((new InvoiceSuiteTaxDTO('S', 'VAT', 100.00, 19.00, 19.0, 'Reason', 'ReasonCode', new DateTime(), 'DUECODE')))
    ->addAllowanceCharge(new InvoiceSuiteAllowanceChargeDTO(true, 10, 100, 2, 'S', 'VAT', 19, 'PositionReason', 'PositionReasonCode'))
    ->setSummation(new InvoiceSuitesummationLineDTO(100.0, 0, 0, 19, 119))
;

$documentDTO->addPosition($position);

$builder->createFromDTO($documentDTO);
$builder->saveAsXmlFile(__DIR__ . "/01_SimpleInvoice.xml");
