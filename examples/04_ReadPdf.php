<?php

use horstoeko\invoicesuite\InvoiceSuitePdfDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

require __DIR__ . "/../vendor/autoload.php";

$documentReader = InvoiceSuitePdfDocumentReader::createFromFile(InvoiceSuitePathUtils::combinePathWithFile(__DIR__, "04_Invoice.pdf"));
$documentReader->getDocumentReader()->getDocumentNo($documentNo);
$documentReader->getDocumentReader()->getDocumentDate($documentDate);
echo $documentNo . PHP_EOL;
echo $documentDate->format("d.m.Y") . PHP_EOL;
