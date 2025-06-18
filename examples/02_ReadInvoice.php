<?php

use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;

require __DIR__ . "/../vendor/autoload.php";

$reader = InvoiceSuiteDocumentReader::createFromCFile(__DIR__ . "/01_SimpleInvoice.xml");
$reader->getDocumentNo($documentNumber);
$reader->getDocumentType($documentType);

echo "Document Number .... $documentNumber\n";
echo "Document Type ...... $documentType\n";
