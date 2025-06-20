<?php

use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;

require __DIR__ . "/../vendor/autoload.php";

$reader = InvoiceSuiteDocumentReader::createFromCFile(__DIR__ . "/01_SimpleInvoice.xml");
$reader->getDocumentNo($documentNumber);
$reader->getDocumentType($documentType);
$reader->getDocumentDescription($documentDescription);
$reader->getDocumentLanguage($documentLanguage);
$reader->getDocumentDate($documentDate);
$reader->getDocumentCompleteDate($documentCompleteDate);

echo "Document Numbe..r .... $documentNumber\n";
echo "Document Type ........ $documentType\n";
echo "Document Name ........ $documentDescription\n";
echo "Document Language .... $documentLanguage\n";
echo "Document Date ........ " . $documentDate->format("d.m.Y") . "\n";
echo "Document Compl. Date . " . $documentCompleteDate->format("d.m.Y") . "\n";
