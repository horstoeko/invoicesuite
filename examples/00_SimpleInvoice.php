<?php

use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;

require __DIR__ . "/../vendor/autoload.php";

$builder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('ublinvoice');
//$builder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('zffxextended');
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

echo $builder->getContentAsXml();
