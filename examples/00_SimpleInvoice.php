<?php

use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAddressDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteCommunicationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteContactDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteOrganisationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;

require __DIR__ . "/../vendor/autoload.php";

$builder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungubl');
$builder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('zffxextended');

$builder->setDocumentNo('2025-04-000001');
$builder->setDocumentType("380");
$builder->setDocumentDescription("Some document description");
$builder->setDocumentLanguage("German");
$builder->setDocumentDate(new DateTime());
$builder->setDocumentCompleteDate(new DateTime());
$builder->setDocumentCurrency("EUR");
$builder->setDocumentTaxCurrency("GBP");
$builder->setDocumentIsTest(true);
$builder->setDocumentIsCopy(true);
$builder->addDocumentNote("Some content", "CC00", "SC00");
$builder->addDocumentNote("Some other content", "CC99", "SC99");
$builder->setDocumentBillingPeriod(new DateTime("first day of this month"), new DateTime("last day of this month"), "Some Description");

$sellerDTO = new InvoiceSuitePartyDTO();
$sellerDTO->addName("Lieferant GmbH");
$sellerDTO->addId(new InvoiceSuiteIdDTO("0815-4711"));
$sellerDTO->addId(new InvoiceSuiteIdDTO("0815-4712"));
$sellerDTO->addGlobalId(new InvoiceSuiteIdDTO("11111", "0088"));
$sellerDTO->addGlobalId(new InvoiceSuiteIdDTO("22222", "0088"));
$sellerDTO->addTaxRegistration(new InvoiceSuiteIdDTO("893489787987", "VA"));
$sellerDTO->addTaxRegistration(new InvoiceSuiteIdDTO("893489787987-X", "FC"));
$sellerDTO->addTaxRegistration(new InvoiceSuiteIdDTO("893489787987-AA", "VA"));
$sellerDTO->addAddress(new InvoiceSuiteAddressDTO("line1", "line2", "line3", "06108", "City", "DE", "Bavaria"));
$sellerDTO->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("3874837489237", "8884", "Lieferant AG"));
$sellerDTO->addContact(new InvoiceSuiteContactDTO("Horst Meier", "Buchhaltung", "0815-4711", "0815-4712", "horst.meier@lieferant.de"));
$sellerDTO->addCommunication(new InvoiceSuiteCommunicationDTO("info@lieferant.de", "EM"));

/*
$builder->setDocumentSellerName("Lieferant GmbH");
$builder->setDocumentSellerId("0815-4711");
$builder->addDocumentSellerId("0815-4712");
$builder->setDocumentSellerGlobalId("11111", "0088");
$builder->addDocumentSellerGlobalId("22222", "0088");
$builder->setDocumentSellerTaxRegistration("VA", "893489787987");
$builder->addDocumentSellerTaxRegistration("FC", "893489787987_x");
$builder->setDocumentSellerAddress("line1", "line2", "line3", "06108", "City", "DE", "Bavaria");
$builder->setDocumentSellerLegalOrganisation("8884", "3874837489237", "Lieferant AG");
$builder->addDocumentSellerContact("Horst Meier", "Buchhaltung", "0815-4711", "0815-4712", "horst.meier@lieferant.de");
$builder->setDocumentSellerCommunication("EM", "info@lieferant.de");
*/

$builder->setDocumentSeller($sellerDTO);

$buyerDTO = new InvoiceSuitePartyDTO();
$buyerDTO->addName("Kunde GmbH");
$buyerDTO->addId(new InvoiceSuiteIdDTO("0815-4711"));
$buyerDTO->addId(new InvoiceSuiteIdDTO("0815-4712"));
$buyerDTO->addGlobalId(new InvoiceSuiteIdDTO("347364862366467", "0088"));
$buyerDTO->addGlobalId(new InvoiceSuiteIdDTO("972984923467863", "0088"));
$buyerDTO->addTaxRegistration(new InvoiceSuiteIdDTO("333355525", "VA"));
$buyerDTO->addTaxRegistration(new InvoiceSuiteIdDTO("333355526", "VA"));
$buyerDTO->addAddress(new InvoiceSuiteAddressDTO("line1", "line2", "line3", "06108", "City", "DE", "Bavaria"));
$buyerDTO->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("3874837489237", "8884", "Kunde AG"));
$buyerDTO->addContact(new InvoiceSuiteContactDTO("Lars Müller", "Buchhaltung", "0815-9991", "0815-9992", "la.mue@kunde.de"));
$buyerDTO->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@kunde.de", "EM"));

/*
$builder->setDocumentBuyerName("Kunde GmbH");
$builder->setDocumentBuyerId("0815-4711");
$builder->addDocumentBuyerId("0815-4712");
$builder->setDocumentBuyerGlobalId("347364862366467", "0088");
$builder->setDocumentBuyerTaxRegistration("VA", "333355525");
$builder->setDocumentBuyerAddress("line1", "line2", "line3", "06108", "City", "DE", "Bavaria");
$builder->setDocumentBuyerLegalOrganisation("8884", "3874837489237", "Kunde AG");
$builder->addDocumentBuyerContact("Lars Müller", "Buchhaltung", "0815-9991", "0815-9992", "la.mue@kunde.de");
$builder->setDocumentBuyerCommunication("EM", "invoice@kunde.de");
*/

$builder->setDocumentBuyer($buyerDTO);

$taxRepresentativeDTO = new InvoiceSuitePartyDTO();
$taxRepresentativeDTO->addName("Tax GmbH");
$taxRepresentativeDTO->addId(new InvoiceSuiteIdDTO("0901-4711"));
$taxRepresentativeDTO->addId(new InvoiceSuiteIdDTO("0901-4712"));
$taxRepresentativeDTO->addGlobalId(new InvoiceSuiteIdDTO("T-1", "0088"));
$taxRepresentativeDTO->addTaxRegistration(new InvoiceSuiteIdDTO("9089767578", "VA"));
$taxRepresentativeDTO->addTaxRegistration(new InvoiceSuiteIdDTO("9089767578-1", "VA"));
$taxRepresentativeDTO->addAddress(new InvoiceSuiteAddressDTO("line1", "line2", "line3", "04001", "Somewhere", "DE", "Saxonia"));
$taxRepresentativeDTO->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("3874837489237", "8884", "Tax AG"));

/*
$builder->setDocumentTaxRepresentativeName("Tax GmbH");
$builder->setDocumentTaxRepresentativeId("0901-4711");
$builder->addDocumentTaxRepresentativeId("0901-4712");
$builder->setDocumentTaxRepresentativeGlobalId("T-1", "0088");
$builder->setDocumentTaxRepresentativeTaxRegistration("VA", "9089767578");
$builder->setDocumentTaxRepresentativeAddress("line1", "line2", "line3", "04001", "Somewhere", "DE", "Saxonia");
$builder->setDocumentTaxRepresentativeLegalOrganisation("8884", "3874837489237", "Tax AG");
$builder->addDocumentTaxRepresentativeContact("Karl Schneider", "Buchhaltung", "0901-9991", "0901-9992", "ks@tax-gnbh.de");
$builder->setDocumentTaxRepresentativeCommunication("EM", "invoice@tax-gmbh.de");
*/

$builder->setDocumentTaxRepresentative($taxRepresentativeDTO);

$productEndUserDTO = new InvoiceSuitePartyDTO();
$productEndUserDTO->addName("End-User GmbH");
$productEndUserDTO->addId(new InvoiceSuiteIdDTO("0201-4711"));
$productEndUserDTO->addId(new InvoiceSuiteIdDTO("0201-4712"));
$productEndUserDTO->addGlobalId(new InvoiceSuiteIdDTO("37877787", "0088"));
$productEndUserDTO->addGlobalId(new InvoiceSuiteIdDTO("37877787-1", "0088"));
$productEndUserDTO->addTaxRegistration(new InvoiceSuiteIdDTO("333355525", "VA"));
$productEndUserDTO->addTaxRegistration(new InvoiceSuiteIdDTO("333355525-2", "VA"));
$productEndUserDTO->addAddress(new InvoiceSuiteAddressDTO("line1", "line2", "line3", "06108", "OtherCity", "DE", "NRW"));
$productEndUserDTO->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("3874837489237", "8884", "Kunde AG"));
$productEndUserDTO->addContact(new InvoiceSuiteContactDTO("Lars Müller", "Buchhaltung", "0815-9991", "0815-9992", "la.mue@end-user.de"));
$productEndUserDTO->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@end-user.de", "EM"));
$productEndUserDTO->addCommunication(new InvoiceSuiteCommunicationDTO("invoice-2@end-user.de", "EM"));

/*
$builder->setDocumentProductEndUserName("End-User GmbH");
$builder->setDocumentProductEndUserId("0201-4711");
$builder->addDocumentProductEndUserId("0201-4712");
$builder->setDocumentProductEndUserGlobalId("37877787", "0088");
$builder->setDocumentProductEndUserTaxRegistration("VA", "333355525");
$builder->setDocumentProductEndUserAddress("line1", "line2", "line3", "06108", "OtherCity", "DE", "NRW");
$builder->setDocumentProductEndUserLegalOrganisation("8884", "3874837489237", "Kunde AG");
$builder->addDocumentProductEndUserContact("Lars Müller", "Buchhaltung", "0815-9991", "0815-9992", "la.mue@end-user.de");
$builder->setDocumentProductEndUserCommunication("EM", "invoice@end-user.de");
*/

$builder->setDocumentProductEndUser($productEndUserDTO);

$shipTo = new InvoiceSuitePartyDTO();
$shipTo->addName("ShipTo GmbH");
$shipTo->addId(new InvoiceSuiteIdDTO("1111111"));
$shipTo->addId(new InvoiceSuiteIdDTO("1111111-A"));
$shipTo->addGlobalId(new InvoiceSuiteIdDTO("9999999", "0088"));
$shipTo->addGlobalId(new InvoiceSuiteIdDTO("9999999-A", "0088"));
$shipTo->addGlobalId(new InvoiceSuiteIdDTO("9999999-B", "0088"));
$shipTo->addTaxRegistration(new InvoiceSuiteIdDTO("50970870000", "VA"));
$shipTo->addTaxRegistration(new InvoiceSuiteIdDTO("50970870000-A", "VA"));
$shipTo->addAddress(new InvoiceSuiteAddressDTO("line1", "line2", "line3", "10175", "Berlin", "DE", "Berlin"));
$shipTo->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("99ß0224444", "8884", "ShipTo AG"));
$shipTo->addContact(new InvoiceSuiteContactDTO("Alfons Zitterbacke", "Buchhaltung", "030-9991", "030-9992", "alfzit@shipto-gmbh.de"));
$shipTo->addContact(new InvoiceSuiteContactDTO("Rolf Zitterbacke", "Controlling", "030-9991", "030-9992", "rolzit@shipto-gmbh.de"));
$shipTo->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@shipto-gmbh.de", "EM"));
$shipTo->addCommunication(new InvoiceSuiteCommunicationDTO("invoice-2@shipto-gmbh.de", "EM"));

/*
$builder->setDocumentShipToName("User GmbH");
$builder->setDocumentShipToId("1111111");
$builder->addDocumentShipToId("1111111-A");
$builder->setDocumentShipToGlobalId("9999999", "0088");
$builder->setDocumentShipToTaxRegistration("VA", "50970870000");
$builder->setDocumentShipToAddress("line1", "line2", "line3", "10175", "Berlin", "DE", "Berlin");
$builder->setDocumentShipToLegalOrganisation("8884", "99ß0224444", "User AG");
$builder->addDocumentShipToContact("Alfons Zitterbacke", "Buchhaltung", "030-9991", "030-9992", "alfzit@user-gmbh.de");
$builder->setDocumentShipToCommunication("EM", "invoice@user-gmbh.de");
*/

$builder->setDocumentShipTo($shipTo);

$ultimateShipTo = new InvoiceSuitePartyDTO();
$ultimateShipTo->addName("Ultimate User GmbH");
$ultimateShipTo->addId(new InvoiceSuiteIdDTO("U-1111111"));
$ultimateShipTo->addId(new InvoiceSuiteIdDTO("U-1111111-A"));
$ultimateShipTo->addGlobalId(new InvoiceSuiteIdDTO("9999999", "0088"));
$ultimateShipTo->addGlobalId(new InvoiceSuiteIdDTO("9999999-A", "0088"));
$ultimateShipTo->addTaxRegistration(new InvoiceSuiteIdDTO("444574987534", "VA"));
$ultimateShipTo->addTaxRegistration(new InvoiceSuiteIdDTO("444574987534-A", "VA"));
$ultimateShipTo->addAddress(new InvoiceSuiteAddressDTO("line1", "line2", "line3", "10176", "Berlin", "DE", "Berlin"));
$ultimateShipTo->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("99ß0224444", "8884", "Ultimate User AG"));
$ultimateShipTo->addContact(new InvoiceSuiteContactDTO("Alfons Baum", "Dispo", "030-10001", "030-10001", "alfzit@ultimate-user-gmbh.de"));
$ultimateShipTo->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@ultimate-user-gmbh.de", "EM"));

/*
$builder->setDocumentUltimateShipToName("Ultimate User GmbH");
$builder->setDocumentUltimateShipToId("U-1111111");
$builder->addDocumentUltimateShipToId("U-1111111-A");
$builder->setDocumentUltimateShipToGlobalId("9999999", "0088");
$builder->setDocumentUltimateShipToTaxRegistration("VA", "444574987534");
$builder->setDocumentUltimateShipToAddress("line1", "line2", "line3", "10176", "Berlin", "DE", "Berlin");
$builder->setDocumentUltimateShipToLegalOrganisation("8884", "99ß0224444", "User AG");
$builder->addDocumentUltimateShipToContact("Alfons Baum", "Dispo", "030-10001", "030-10001", "alfzit@ultimate-user-gmbh.de");
$builder->setDocumentUltimateShipToCommunication("EM", "invoice@ultimate-user-gmbh.de");
*/

$builder->setDocumentUltimateShipTo($ultimateShipTo);

$shipFrom = new InvoiceSuitePartyDTO();
$shipFrom->addName("Ship-From GmbH");
$shipFrom->addId(new InvoiceSuiteIdDTO("SF-999999-A"));
$shipFrom->addId(new InvoiceSuiteIdDTO("SF-999999-B"));
$shipFrom->addGlobalId(new InvoiceSuiteIdDTO("8888888", "0088"));
$shipFrom->addGlobalId(new InvoiceSuiteIdDTO("8888888-A", "0088"));
$shipFrom->addTaxRegistration(new InvoiceSuiteIdDTO("000008080663", "VA"));
$shipFrom->addTaxRegistration(new InvoiceSuiteIdDTO("000008080663-A", "VA"));
$shipFrom->addAddress(new InvoiceSuiteAddressDTO("line1", "line2", "line3", "10176", "Düsseldorf", "DE", "NRW"));
$shipFrom->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("99ß0224444", "8884", "Ship-From AG"));
$shipFrom->addContact(new InvoiceSuiteContactDTO("Alfons Baum", "Dispo", "0221-10001", "0221-10001", "alfzit@ship-from-gmbh.de"));
$shipFrom->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@ship-from-gmbh.de", "EM"));

/*
$builder->setDocumentShipFromName("Ship-From GmbH");
$builder->setDocumentShipFromId("SF-999999-A");
$builder->addDocumentShipFromId("SF-999999-B");
$builder->setDocumentShipFromGlobalId("8888888", "0088");
$builder->setDocumentShipFromTaxRegistration("VA", "000008080663");
$builder->setDocumentShipFromAddress("line1", "line2", "line3", "10176", "Düsseldorf", "DE", "NRW");
$builder->setDocumentShipFromLegalOrganisation("8884", "99ß0224444", "Ship-From AG");
$builder->addDocumentShipFromContact("Alfons Baum", "Dispo", "0221-10001", "0221-10001", "alfzit@ship-from-gmbh.de");
$builder->setDocumentShipFromCommunication("EM", "invoice@ship-from-gmbh.de");
*/

$builder->setDocumentShipFrom($shipFrom);

$invoicer = new InvoiceSuitePartyDTO();
$invoicer->addName("Invoicer GmbH");
$invoicer->addId(new InvoiceSuiteIdDTO("INVOICER-001"));
$invoicer->addId(new InvoiceSuiteIdDTO("INVOICER-002"));
$invoicer->addGlobalId(new InvoiceSuiteIdDTO("INVOICER222", "0088"));
$invoicer->addGlobalId(new InvoiceSuiteIdDTO("INVOICER222-A", "0088"));
$invoicer->addTaxRegistration(new InvoiceSuiteIdDTO("9989773373", "VA"));
$invoicer->addTaxRegistration(new InvoiceSuiteIdDTO("9989773373-A", "VA"));
$invoicer->addAddress(new InvoiceSuiteAddressDTO("Invoicer Street", "Invoicer Street 2", "Invoicer Street 3", "99999", "Invoicer-City", "DE", "RLP"));
$invoicer->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("Invoicer-Org-Id", "8884", "Invoicer AG"));
$invoicer->addContact(new InvoiceSuiteContactDTO("Alfons Baum", "Dispo", "0999-10001", "0999-10001", "alfzit@Invoicer-gmbh.de"));
$invoicer->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@invoicer-gmbh.de", "EM"));

/*
$builder->setDocumentInvoicerName("Invoicer GmbH");
$builder->setDocumentInvoicerId("INVOICER-001");
$builder->addDocumentInvoicerId("INVOICER-002");
$builder->setDocumentInvoicerGlobalId("INVOICER222", "0088");
$builder->setDocumentInvoicerTaxRegistration("VA", "9989773373");
$builder->setDocumentInvoicerAddress("Invoicer Street", "Invoicer Street 2", "Invoicer Street 3", "99999", "Invoicer-City", "DE", "RLP");
$builder->setDocumentInvoicerLegalOrganisation("8884", "Invoicer-Org-Id", "Invoicer AG");
$builder->addDocumentInvoicerContact("Alfons Baum", "Dispo", "0999-10001", "0999-10001", "alfzit@Invoicer-gmbh.de");
$builder->setDocumentInvoicerCommunication("EM", "invoice@invoicer-gmbh.de");
*/

$builder->setDocumentInvoicer($invoicer);

$invoicee = new InvoiceSuitePartyDTO();
$invoicee->addName("Invoicee GmbH");
$invoicee->addId(new InvoiceSuiteIdDTO("INVOICEE-001"));
$invoicee->addId(new InvoiceSuiteIdDTO("INVOICEE-002"));
$invoicee->addGlobalId(new InvoiceSuiteIdDTO("INVOICEE222", "0088"));
$invoicee->addGlobalId(new InvoiceSuiteIdDTO("INVOICEE222-A", "0088"));
$invoicee->addTaxRegistration(new InvoiceSuiteIdDTO("9989773373", "VA"));
$invoicee->addTaxRegistration(new InvoiceSuiteIdDTO("9989773373-A", "VA"));
$invoicee->addAddress(new InvoiceSuiteAddressDTO("Invoicee Street", "Invoicee Street 2", "Invoicee Street 3", "99999", "Invoicee-City", "DE", "RLP"));
$invoicee->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("Invoicee-Org-Id", "8884", "Invoicee AG"));
$invoicee->addContact(new InvoiceSuiteContactDTO("Alfons Baum", "Dispo", "0999-10001", "0999-10001", "alfzit@Invoicee-gmbh.de"));
$invoicee->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@Invoicee-gmbh.de", "EM"));

/*
$builder->setDocumentInvoiceeName("Invoicee GmbH");
$builder->setDocumentInvoiceeId("INVOICEE-001");
$builder->addDocumentInvoiceeId("INVOICEE-002");
$builder->setDocumentInvoiceeGlobalId("INVOICEE222", "0088");
$builder->setDocumentInvoiceeTaxRegistration("VA", "9989773373");
$builder->setDocumentInvoiceeAddress("Invoicee Street", "Invoicee Street 2", "Invoicee Street 3", "99999", "Invoicee-City", "DE", "RLP");
$builder->setDocumentInvoiceeLegalOrganisation("8884", "Invoicee-Org-Id", "Invoicee AG");
$builder->addDocumentInvoiceeContact("Alfons Baum", "Dispo", "0999-10001", "0999-10001", "alfzit@Invoicee-gmbh.de");
$builder->setDocumentInvoiceeCommunication("EM", "invoice@invoicee-gmbh.de");
*/

$builder->setDocumentInvoicee($invoicee);

$payee = new InvoiceSuitePartyDTO();
$payee->addName("Payee GmbH");
$payee->addId(new InvoiceSuiteIdDTO("PAYEE-001"));
$payee->addId(new InvoiceSuiteIdDTO("PAYEE-002"));
$payee->addGlobalId(new InvoiceSuiteIdDTO("PAYEE222", "0088"));
$payee->addGlobalId(new InvoiceSuiteIdDTO("PAYEE222-A", "0088"));
$payee->addTaxRegistration(new InvoiceSuiteIdDTO("9989773373", "VA"));
$payee->addTaxRegistration(new InvoiceSuiteIdDTO("9989773373-A", "VA"));
$payee->addAddress(new InvoiceSuiteAddressDTO("Payee Street", "Payee Street 2", "Payee Street 3", "99999", "Payee-City", "DE", "RLP"));
$payee->addLegalOrganisation(new InvoiceSuiteOrganisationDTO("Payee-Org-Id", "8884", "Payee AG"));
$payee->addContact(new InvoiceSuiteContactDTO("Alfons Baum", "Dispo", "0999-10001", "0999-10001", "alfzit@payee-gmbh.de"));
$payee->addCommunication(new InvoiceSuiteCommunicationDTO("invoice@payee-gmbh.de", "EM"));

/*
$builder->setDocumentPayeeName("Payee GmbH");
$builder->setDocumentPayeeId("PAYEE-001");
$builder->addDocumentPayeeId("PAYEE-002");
$builder->setDocumentPayeeGlobalId("PAYEE222", "0088");
$builder->setDocumentPayeeTaxRegistration("VA", "9989773373");
$builder->setDocumentPayeeAddress("Payee Street", "Payee Street 2", "Payee Street 3", "99999", "Payee-City", "DE", "RLP");
$builder->setDocumentPayeeLegalOrganisation("8884", "Payee-Org-Id", "Payee AG");
$builder->addDocumentPayeeContact("Alfons Baum", "Dispo", "0999-10001", "0999-10001", "alfzit@payee-gmbh.de");
$builder->setDocumentPayeeCommunication("EM", "invoice@payee-gmbh.de");
*/

$builder->setDocumentPayee($payee);

$builder->setDocumentSellerOrderReference('SO-2025/0000001', new DateTime());
$builder->setDocumentBuyerOrderReference('PO-0000011', new DateTime());
$builder->setDocumentQuotationReference('ANG-2025/0000055', new DateTime());
$builder->setDocumentContractReference('CON-2025/0000001', new DateTime());
$builder->addDocumentAdditionalReference('ADDDOC-001', new DateTime(), "918", "0815", "Description for additional docuemnt", InvoiceSuiteAttachment::fromBase64String('SWNoIGJpbiBlaW4gVGVzdHRleHQ=', 'att.ext'));
$builder->addDocumentAdditionalReference('ADDDOC-002', new DateTime(), "918", "0816", "Description for additional docuemnt", InvoiceSuiteAttachment::fromUrl('http://some.url'));
$builder->setDocumentInvoiceReference("INVREF-001", new DateTime(), "382");
$builder->setDocumentInvoiceReference("INVREF-002", new DateTime(), "382");
$builder->addDocumentInvoiceReference("INVREF-003", null, "382");
$builder->setDocumentProjectReference("PROJECT-0001", "Project 1");
$builder->addDocumentProjectReference("PROJECT-0002", "Project 2");
$builder->addDocumentUltimateCustomerOrderReference('UCOR-0000001', new DateTime());
$builder->setDocumentDespatchAdviceReference('DESPATCHADV-0000001', new DateTime());
$builder->setDocumentReceivingAdviceReference('RECEIPTADV-0000001', new DateTime());
$builder->setDocumentDeliveryNoteReference('DELIVERYNOTE-0000001', new DateTime());

$builder->setDocumentSupplyChainEvent(new DateTime());

//$builder->setDocumentPaymentMean("33", "Name", "CardId", "CardHolder", "BuyerIBAN", "PayeeIBAN", "PayeeAccountName", "PayeePropId", "PayeeBIC", "PaymentRef");
//$builder->addDocumentPaymentMeanAsCreditTransferSepa("PayeeIBAN", "PayeeAccountName", "PayeePropId", "PayeeBIC", "PaymentRef");
//$builder->addDocumentPaymentMeanAsCreditTransferNoSepa("PayeeIBAN", "PayeeAccountName", "PayeePropId", "PayeeBIC", "PaymentRef");
//$builder->addDocumentPaymentMeanAsDirectDebitSepa("BuyerIBAN");
//$builder->addDocumentPaymentMeanAsDirectDebitNoSepa("BuyerIBAN");
//$builder->addDocumentPaymentMeanAsPaymentCard("CardId", "CardHolder");

$builder->addDocumentPaymentMeanAsDirectDebitSepa("00000000000000000", "MANDATE-1");

$builder->addDocumentPaymentTerm("30 Tage Netto", new DateTime("+30 days"));
$builder->setDocumentPaymentDiscountTermsInLastPaymentTerm(100.0, 10.0, 10.0, new DateTime(), 10.0, 'DAY');
$builder->setDocumentPaymentPenaltyTermsInLastPaymentTerm(10.0, 1.0, 5.0, new DateTime(), 2, 'MON');

$builder->setDocumentPaymentCreditorReferenceID("CREDREF");
$builder->setDocumentPaymentCreditorReferenceID("CREDREF2");

$builder->setDocumentTax('S', 'VAT', 100.00, 19.00, 19.0, 'Reason', 'ReasonCode', new DateTime(), 'DUECODE');

$builder->setDocumentAllowanceCharge(true, 10, 100, 'S', 'VAT', 19.0, 'Reason', 'ReasonCode', 2);
$builder->addDocumentAllowanceCharge(true, 10, 100, 'S', 'VAT', 19.0, 'Reason', 'ReasonCode', 2);
$builder->setDocumentLogisticServiceCharge(50, "Logistic Service Charge", 'S', 'VAT', 19);

$builder->setDocumentAllowanceCharge(true, 10, 100, 'S', 'VAT', 19.0, 'ReasonAllowance', 'ReasonCodeAllowance', 2);

$builder->setDocumentPostingReference('1', 'FINACC');

$builder->prepareDocumentSummation();
$builder->setDocumentSummation(100, 10, 20, 90, 90 * 0.19, 50, 107.1, 100.0, 7.10, 0.0);
$builder->setDocumentTaxCurrency("DKK");

$builder->addDocumentPosition("1", null, null, "GROUP");
$builder->addDocumentPosition("1.1", "1", "0815", "DETAIL");
$builder->addDocumentPositionNote("Some Content");
$builder->addDocumentPositionNote("Some second Content");
$builder->setDocumentPositionNote("Some third Content", "ContentCode", "SubjectCode");
$builder->setDocumentPositionProductDetails('ProductId', 'ProductName', 'ProductDescription', 'SellerID', 'BuyerID', '3333432332', '0088', 'IndustryId', 'ModelId', 'BatchId', 'Brandname', 'Modelname', 'CN');
$builder->setDocumentPositionProductCharacteristic('Füllmenge', '1000 Liter', 'FM', 1000.0, "LTR");
$builder->setDocumentPositionProductClassification("classcode", 'listid', '1.0', 'classnam');
$builder->setDocumentPositionReferencedProduct("id", "name", "descr", "sellerid", "buyerid", "324423432", "0088", "industryidentifier", 10, "PCT");

$builder->setDocumentPositionSellerOrderReference('SO-2025/0000001', '10', new DateTime());
$builder->setDocumentPositionBuyerOrderReference('PO-0000011', '20', new DateTime());
$builder->setDocumentPositionQuotationReference('ANG-2025/0000055', '30', new DateTime());
$builder->setDocumentPositionContractReference('CON-2025/0000001', '40', new DateTime());
$builder->addDocumentPositionAdditionalReference('ADDDOC-001', '100', new DateTime(), "918", "0815", "Description for additional docuemnt", InvoiceSuiteAttachment::fromBase64String('SWNoIGJpbiBlaW4gVGVzdHRleHQ=', 'att.ext'));
$builder->addDocumentPositionAdditionalReference('ADDDOC-002', '101', new DateTime(), "918", "0816", "Description for additional docuemnt", InvoiceSuiteAttachment::fromUrl('http://some.url'));
$builder->addDocumentPositionUltimateCustomerOrderReference('UCOR-0000001', '200', new DateTime());
$builder->setDocumentPositionDespatchAdviceReference('DESPATCHADV-0000001', '300', new DateTime());
$builder->setDocumentPositionReceivingAdviceReference('RECEIPTADV-0000001', '400', new DateTime());
$builder->setDocumentPositionDeliveryNoteReference('DELIVERYNOTE-0000001', '500', new DateTime());

$builder->setDocumentPositionGrossPrice(110.0, 1.0, "C62");
$builder->addDocumentPositionGrossPriceAllowanceCharge(10, false, 10.0, 100.0, 'Reason', 'ReasonCode');
$builder->setDocumentPositionNetPrice(100.0, 1.0, "C62");
$builder->setDocumentPositionNetPriceTax("S", "VAT", 9.0, 7.0, 'Reason', 'Reasoncode');

$builder->setDocumentPositionQuantities(10.0, "C62", 2, "KTR", 1, "MTR");

$builder->setDocumentPositionShipToName("User GmbH");
$builder->setDocumentPositionShipToId("1111111");
$builder->addDocumentPositionShipToId("1111111-A");
$builder->setDocumentPositionShipToId("2222222");
$builder->setDocumentPositionShipToGlobalId("9999999", "0088");
$builder->setDocumentPositionShipToTaxRegistration("VA", "50970870000");
$builder->addDocumentPositionShipToTaxRegistration("FC", "99999999999");
$builder->setDocumentPositionShipToAddress("line1", "line2", "line3", "10175", "Berlin", "DE", "Berlin");
$builder->setDocumentPositionShipToLegalOrganisation("8884", "99ß0224444", "User AG");
$builder->addDocumentPositionShipToContact("Alfons Zitterbacke", "Buchhaltung", "030-9991", "030-9992", "alfzit@user-gmbh.de");
$builder->setDocumentPositionShipToCommunication("EM", "invoice@user-gmbh.de");

$builder->setDocumentPositionUltimateShipToName("Ultimate User GmbH");
$builder->setDocumentPositionUltimateShipToId("U-1111111");
$builder->addDocumentPositionUltimateShipToId("U-1111111-A");
$builder->setDocumentPositionUltimateShipToGlobalId("9999999", "0088");
$builder->setDocumentPositionUltimateShipToTaxRegistration("VA", "444574987534");
$builder->setDocumentPositionUltimateShipToAddress("line1", "line2", "line3", "10176", "Berlin", "DE", "Berlin");
$builder->setDocumentPositionUltimateShipToLegalOrganisation("8884", "99ß0224444", "User AG");
$builder->addDocumentPositionUltimateShipToContact("Alfons Baum", "Dispo", "030-10001", "030-10001", "alfzit@ultimate-user-gmbh.de");
$builder->setDocumentPositionUltimateShipToCommunication("EM", "invoice@ultimate-user-gmbh.de");

$builder->setDocumentPositionSupplyChainEvent(new DateTime());
$builder->setDocumentPositionBillingPeriod(new DateTime("first day of this month"), new DateTime("last day of this month"), "Some Description");
$builder->setDocumentPositionTax('S', 'VAT', null, 19,  'Reason', 'Reasoncode');
$builder->setDocumentPositionAllowanceCharge(false, 25.33, 133.44, 'Reason', 'Resoncode', 12.7);
$builder->setDocumentPositionSummation(2000, 1, 2, 3, 4);
$builder->addDocumentPositionInvoiceReference("INVREF-001", "4000", new DateTime(), "382");

$builder->setDocumentPositionPostingReference('1', 'FINACC');

echo $builder->saveAsXmlFile(__DIR__ . "/00_SimpleInvoice.xml");
