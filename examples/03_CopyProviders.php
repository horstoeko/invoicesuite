<?php

use horstoeko\invoicesuite\InvoiceSuiteSettings;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

require __DIR__ . "/../vendor/autoload.php";

InvoiceSuiteSettings::setUnitAmountDecimals(5);

$reader = InvoiceSuiteDocumentReader::createFromFile(InvoiceSuitePathUtils::combinePathWithFile(__DIR__, "01_SimpleInvoice.xml"));
$builder = $reader->copyToBuilder();
$builder->saveAsXmlFile(InvoiceSuitePathUtils::combinePathWithFile(__DIR__, "01_SimpleInvoice_Copy.xml"));
