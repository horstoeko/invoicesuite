<?php

use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;

require __DIR__ . "/../vendor/autoload.php";

$builder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('zffxextended');
//$builder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnung');
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

echo $builder->getContentAsXml();
