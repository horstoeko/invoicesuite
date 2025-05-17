<?php

use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;

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
$builder->setDocumentBillingPeriod(new DateTime("first day of this month"), new DateTime("last day of this month"), "Some Description");

$builder->setDocumentSellerName("Lieferant GmbH");
$builder->setDocumentSellerId("0815-4711");
$builder->addDocumentSellerId("0815-4712");
$builder->setDocumentSellerGlobalId("11111", "0088");
$builder->addDocumentSellerGlobalId("22222", "0088");
$builder->setDocumentSellerId("0815-4713");
$builder->setDocumentSellerTaxRegistration("VA", "893489787987");
$builder->setDocumentSellerTaxRegistration("VA", "893489787987");
$builder->addDocumentSellerTaxRegistration("FC", "893489787987_x");
$builder->setDocumentSellerAddress("line1", "line2", "line3", "06108", "City", "DE", "Bavaria");
$builder->setDocumentSellerLegalOrganisation("8884", "3874837489237", "Lieferant AG");
$builder->addDocumentSellerContact("Horst Meier", "Buchhaltung", "0815-4711", "0815-4712", "horst.meier@lieferant.de");
$builder->setDocumentSellerCommunication("EM", "info@lieferant.de");

$builder->setDocumentBuyerName("Kunde GmbH");
$builder->setDocumentBuyerId("0815-4711");
$builder->addDocumentBuyerId("0815-4712");
$builder->setDocumentBuyerGlobalId("347364862366467", "0088");
$builder->setDocumentBuyerTaxRegistration("VA", "333355525");
$builder->setDocumentBuyerAddress("line1", "line2", "line3", "06108", "City", "DE", "Bavaria");
$builder->setDocumentBuyerLegalOrganisation("8884", "3874837489237", "Kunde AG");
$builder->addDocumentBuyerContact("Lars Müller", "Buchhaltung", "0815-9991", "0815-9992", "la.mue@kunde.de");
$builder->setDocumentBuyerCommunication("EM", "invoice@kunde.de");

$builder->setDocumentTaxRepresentativeName("Tax GmbH");
$builder->setDocumentTaxRepresentativeId("0901-4711");
$builder->addDocumentTaxRepresentativeId("0901-4712");
$builder->setDocumentTaxRepresentativeGlobalId("T-1", "0088");
$builder->setDocumentTaxRepresentativeTaxRegistration("VA", "9089767578");
$builder->setDocumentTaxRepresentativeAddress("line1", "line2", "line3", "04001", "Somewhere", "DE", "Saxonia");
$builder->setDocumentTaxRepresentativeLegalOrganisation("8884", "3874837489237", "Tax AG");
$builder->addDocumentTaxRepresentativeContact("Karl Schneider", "Buchhaltung", "0901-9991", "0901-9992", "ks@tax-gnbh.de");
$builder->setDocumentTaxRepresentativeCommunication("EM", "invoice@tax-gmbh.de");

$builder->setDocumentProductEndUserName("End-User GmbH");
$builder->setDocumentProductEndUserId("0201-4711");
$builder->addDocumentProductEndUserId("0201-4712");
$builder->setDocumentProductEndUserGlobalId("37877787", "0088");
$builder->setDocumentProductEndUserTaxRegistration("VA", "333355525");
$builder->setDocumentProductEndUserAddress("line1", "line2", "line3", "06108", "OtherCity", "DE", "NRW");
$builder->setDocumentProductEndUserLegalOrganisation("8884", "3874837489237", "Kunde AG");
$builder->addDocumentProductEndUserContact("Lars Müller", "Buchhaltung", "0815-9991", "0815-9992", "la.mue@end-user.de");
$builder->setDocumentProductEndUserCommunication("EM", "invoice@end-user.de");

$builder->setDocumentShipToName("User GmbH");
$builder->setDocumentShipToId("1111111");
$builder->addDocumentShipToId("1111111-A");
$builder->setDocumentShipToGlobalId("9999999", "0088");
$builder->setDocumentShipToTaxRegistration("VA", "50970870000");
$builder->setDocumentShipToAddress("line1", "line2", "line3", "10175", "Berlin", "DE", "Berlin");
$builder->setDocumentShipToLegalOrganisation("8884", "99ß0224444", "User AG");
$builder->addDocumentShipToContact("Alfons Zitterbacke", "Buchhaltung", "030-9991", "030-9992", "alfzit@user-gmbh.de");
$builder->setDocumentShipToCommunication("EM", "invoice@user-gmbh.de");

$builder->setDocumentUltimateShipToName("Ultimate User GmbH");
$builder->setDocumentUltimateShipToId("U-1111111");
$builder->addDocumentUltimateShipToId("U-1111111-A");
$builder->setDocumentUltimateShipToGlobalId("9999999", "0088");
$builder->setDocumentUltimateShipToTaxRegistration("VA", "444574987534");
$builder->setDocumentUltimateShipToAddress("line1", "line2", "line3", "10176", "Berlin", "DE", "Berlin");
$builder->setDocumentUltimateShipToLegalOrganisation("8884", "99ß0224444", "User AG");
$builder->addDocumentUltimateShipToContact("Alfons Baum", "Dispo", "030-10001", "030-10001", "alfzit@ultimate-user-gmbh.de");
$builder->setDocumentUltimateShipToCommunication("EM", "invoice@ultimate-user-gmbh.de");

$builder->setDocumentShipFromName("Ship-From GmbH");
$builder->setDocumentShipFromId("SF-999999-A");
$builder->addDocumentShipFromId("SF-999999-B");
$builder->setDocumentShipFromGlobalId("8888888", "0088");
$builder->setDocumentShipFromTaxRegistration("VA", "000008080663");
$builder->setDocumentShipFromAddress("line1", "line2", "line3", "10176", "Düsseldorf", "DE", "NRW");
$builder->setDocumentShipFromLegalOrganisation("8884", "99ß0224444", "Ship-From AG");
$builder->addDocumentShipFromContact("Alfons Baum", "Dispo", "0221-10001", "0221-10001", "alfzit@ship-from-gmbh.de");
$builder->setDocumentShipFromCommunication("EM", "invoice@ship-from-gmbh.de");

$builder->setDocumentInvoicerName("Invoicer GmbH");
$builder->setDocumentInvoicerId("INVOICER-001");
$builder->addDocumentInvoicerId("INVOICER-002");
$builder->setDocumentInvoicerGlobalId("INVOICER222", "0088");
$builder->setDocumentInvoicerTaxRegistration("VA", "9989773373");
$builder->setDocumentInvoicerAddress("Invoicer Street", "Invoicer Street 2", "Invoicer Street 3", "99999", "Invoicer-City", "DE", "RLP");
$builder->setDocumentInvoicerLegalOrganisation("8884", "Invoicer-Org-Id", "Invoicer AG");
$builder->addDocumentInvoicerContact("Alfons Baum", "Dispo", "0999-10001", "0999-10001", "alfzit@Invoicer-gmbh.de");
$builder->setDocumentInvoicerCommunication("EM", "invoice@invoicer-gmbh.de");

$builder->setDocumentInvoiceeName("Invoicee GmbH");
$builder->setDocumentInvoiceeId("INVOICEE-001");
$builder->addDocumentInvoiceeId("INVOICEE-002");
$builder->setDocumentInvoiceeGlobalId("INVOICEE222", "0088");
$builder->setDocumentInvoiceeTaxRegistration("VA", "9989773373");
$builder->setDocumentInvoiceeAddress("Invoicee Street", "Invoicee Street 2", "Invoicee Street 3", "99999", "Invoicee-City", "DE", "RLP");
$builder->setDocumentInvoiceeLegalOrganisation("8884", "Invoicee-Org-Id", "Invoicee AG");
$builder->addDocumentInvoiceeContact("Alfons Baum", "Dispo", "0999-10001", "0999-10001", "alfzit@Invoicee-gmbh.de");
$builder->setDocumentInvoiceeCommunication("EM", "invoice@invoicee-gmbh.de");

$builder->setDocumentPayeeName("Payee GmbH");
$builder->setDocumentPayeeId("PAYEE-001");
$builder->addDocumentPayeeId("PAYEE-002");
$builder->setDocumentPayeeGlobalId("PAYEE222", "0088");
$builder->setDocumentPayeeTaxRegistration("VA", "9989773373");
$builder->setDocumentPayeeAddress("Payee Street", "Payee Street 2", "Payee Street 3", "99999", "Payee-City", "DE", "RLP");
$builder->setDocumentPayeeLegalOrganisation("8884", "Payee-Org-Id", "Payee AG");
$builder->addDocumentPayeeContact("Alfons Baum", "Dispo", "0999-10001", "0999-10001", "alfzit@payee-gmbh.de");
$builder->setDocumentPayeeCommunication("EM", "invoice@payee-gmbh.de");

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

$builder->setAocumentSupplyChainEvent(new DateTime());

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

echo $builder->saveAsXmlFile(__DIR__ . "/00_SimpleInvoice.xml");
