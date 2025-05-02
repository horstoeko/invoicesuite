<?php

use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;

require __DIR__ . "/../vendor/autoload.php";

//$builder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('ublinvoice');
$builder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('zffxextended');
//$builder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('zffxxrechnung');
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

$builder->setSellerName("Lieferant GmbH");
$builder->setSellerId("0815-4711");
$builder->addSellerId("0815-4712");
$builder->setSellerGlobalId("11111", "0088");
$builder->addSellerGlobalId("22222", "0088");
$builder->setSellerTaxRegistration("VA", "893489787987");
$builder->setSellerTaxRegistration("VA", "893489787987");
$builder->addSellerTaxRegistration("FC", "893489787987_x");
$builder->setSellerAddress("line1", "line2", "line3", "06108", "City", "DE", "Bavaria");
$builder->setSellerLegalOrganisation("8884", "3874837489237", "Lieferant AG");
$builder->addSellerContact("Horst Meier", "Buchhaltung", "0815-4711", "0815-4712", "horst.meier@lieferant.de");
$builder->setSellerCommunication("EM", "info@lieferant.de");

$builder->setBuyerName("Kunde GmbH");
$builder->setBuyerId("0815-4711");
$builder->addBuyerId("0815-4712");
$builder->setBuyerGlobalId("347364862366467", "0088");
$builder->setBuyerTaxRegistration("VA", "333355525");
$builder->setBuyerAddress("line1", "line2", "line3", "06108", "City", "DE", "Bavaria");
$builder->setBuyerLegalOrganisation("8884", "3874837489237", "Kunde AG");
$builder->addBuyerContact("Lars Müller", "Buchhaltung", "0815-9991", "0815-9992", "la.mue@kunde.de");
$builder->setBuyerCommunication("EM", "invoice@kunde.de");

$builder->setTaxRepresentativeName("Tax GmbH");
$builder->setTaxRepresentativeId("0901-4711");
$builder->addTaxRepresentativeId("0901-4712");
$builder->setTaxRepresentativeGlobalId("T-1", "0088");
$builder->setTaxRepresentativeTaxRegistration("VA", "9089767578");
$builder->setTaxRepresentativeAddress("line1", "line2", "line3", "04001", "Somewhere", "DE", "Saxonia");
$builder->setTaxRepresentativeLegalOrganisation("8884", "3874837489237", "Tax AG");
$builder->addTaxRepresentativeContact("Karl Schneider", "Buchhaltung", "0901-9991", "0901-9992", "ks@tax-gnbh.de");
$builder->setTaxRepresentativeCommunication("EM", "invoice@tax-gmbh.de");

$builder->setProductEndUserName("End-User GmbH");
$builder->setProductEndUserId("0201-4711");
$builder->addProductEndUserId("0201-4712");
$builder->setProductEndUserGlobalId("37877787", "0088");
$builder->setProductEndUserTaxRegistration("VA", "333355525");
$builder->setProductEndUserAddress("line1", "line2", "line3", "06108", "OtherCity", "DE", "NRW");
$builder->setProductEndUserLegalOrganisation("8884", "3874837489237", "Kunde AG");
$builder->addProductEndUserContact("Lars Müller", "Buchhaltung", "0815-9991", "0815-9992", "la.mue@end-user.de");
$builder->setProductEndUserCommunication("EM", "invoice@end-user.de");

$builder->setShipToName("User GmbH");
$builder->setShipToId("1111111");
$builder->addShipToId("1111111-A");
$builder->setShipToGlobalId("9999999", "0088");
$builder->setShipToTaxRegistration("VA", "50970870000");
$builder->setShipToAddress("line1", "line2", "line3", "10175", "Berlin", "DE", "Berlin");
$builder->setShipToLegalOrganisation("8884", "99ß0224444", "User AG");
$builder->addShipToContact("Alfons Zitterbacke", "Buchhaltung", "030-9991", "030-9992", "alfzit@user-gmbh.de");
$builder->setShipToCommunication("EM", "invoice@user-gmbh.de");

$builder->setUltimateShipToName("Ultimate User GmbH");
$builder->setUltimateShipToId("U-1111111");
$builder->addUltimateShipToId("U-1111111-A");
$builder->setUltimateShipToGlobalId("9999999", "0088");
$builder->setUltimateShipToTaxRegistration("VA", "444574987534");
$builder->setUltimateShipToAddress("line1", "line2", "line3", "10176", "Berlin", "DE", "Berlin");
$builder->setUltimateShipToLegalOrganisation("8884", "99ß0224444", "User AG");
$builder->addUltimateShipToContact("Alfons Baum", "Dispo", "030-10001", "030-10001", "alfzit@ultimate-user-gmbh.de");
$builder->setUltimateShipToCommunication("EM", "invoice@ultimate-user-gmbh.de");

$builder->setShipFromName("Ship-From GmbH");
$builder->setShipFromId("SF-999999-A");
$builder->addShipFromId("SF-999999-B");
$builder->setShipFromGlobalId("8888888", "0088");
$builder->setShipFromTaxRegistration("VA", "000008080663");
$builder->setShipFromAddress("line1", "line2", "line3", "10176", "Düsseldorf", "DE", "NRW");
$builder->setShipFromLegalOrganisation("8884", "99ß0224444", "Ship-From AG");
$builder->addShipFromContact("Alfons Baum", "Dispo", "0221-10001", "0221-10001", "alfzit@ship-from-gmbh.de");
$builder->setShipFromCommunication("EM", "invoice@ship-from-gmbh.de");

$builder->setInvoicerName("Invoicer GmbH");
$builder->setInvoicerId("INVOICER-001");
$builder->addInvoicerId("INVOICER-002");
$builder->setInvoicerGlobalId("INVOICER222", "0088");
$builder->setInvoicerTaxRegistration("VA", "9989773373");
$builder->setInvoicerAddress("Invoicer Street", "Invoicer Street 2", "Invoicer Street 3", "99999", "Invoicer-City", "DE", "RLP");
$builder->setInvoicerLegalOrganisation("8884", "Invoicer-Org-Id", "Invoicer AG");
$builder->addInvoicerContact("Alfons Baum", "Dispo", "0999-10001", "0999-10001", "alfzit@Invoicer-gmbh.de");
$builder->setInvoicerCommunication("EM", "invoice@invoicer-gmbh.de");

$builder->setInvoiceeName("Invoicee GmbH");
$builder->setInvoiceeId("INVOICEE-001");
$builder->addInvoiceeId("INVOICEE-002");
$builder->setInvoiceeGlobalId("INVOICEE222", "0088");
$builder->setInvoiceeTaxRegistration("VA", "9989773373");
$builder->setInvoiceeAddress("Invoicee Street", "Invoicee Street 2", "Invoicee Street 3", "99999", "Invoicee-City", "DE", "RLP");
$builder->setInvoiceeLegalOrganisation("8884", "Invoicee-Org-Id", "Invoicee AG");
$builder->addInvoiceeContact("Alfons Baum", "Dispo", "0999-10001", "0999-10001", "alfzit@Invoicee-gmbh.de");
$builder->setInvoiceeCommunication("EM", "invoice@invoicee-gmbh.de");

echo $builder->getContentAsXml();
