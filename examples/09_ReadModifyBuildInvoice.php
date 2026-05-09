<?php

use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

/**
 * Read an electronic invoice XML document, change a few values and save it again
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/00_ExampleHelpers.php';

$sourceFilesDirectory = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'tests', 'assets');
$sourceXmlFilename = InvoiceSuitePathUtils::combinePathWithFile($sourceFilesDirectory, '03_zugferddocumentreader_3.xml');
$targetXmlFilename = InvoiceSuitePathUtils::combinePathWithFile(__DIR__, '09_ModifiedInvoice.xml');

/*
 * copyToBuilder() converts the detected invoice document into the matching builder.
 * This is useful if an existing electronic invoice should be read, changed and serialized again.
 */

$reader = InvoiceSuiteDocumentReader::createFromFile($sourceXmlFilename);

$reader->getDocumentNo($originalDocumentNumber);

$documentBuilder = $reader->copyToBuilder();

$documentBuilder
    ->setDocumentNo('471102-MODIFIED')
    ->setDocumentDate(DateTime::createFromFormat('Ymd', '20241201'))
    ->addDocumentNote('This invoice was read from XML, modified and rebuilt by InvoiceSuite.')
    ->saveContentToFile($targetXmlFilename);

$documentBuilder->copyToReader()->getDocumentNo($modifiedDocumentNumber);

echo sprintf("Source invoice XML: %s\n", $sourceXmlFilename);
echo sprintf("Modified invoice XML: %s\n", $targetXmlFilename);
echo sprintf("Original document number: %s\n", $originalDocumentNumber);
echo sprintf("Modified document number: %s\n", $modifiedDocumentNumber);
