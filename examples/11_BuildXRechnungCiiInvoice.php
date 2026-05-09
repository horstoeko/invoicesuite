<?php

use horstoeko\invoicesuite\InvoiceSuiteBuiltInProviders;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

/**
 * Build an XRechnung invoice document in CII syntax
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/00_ExampleHelpers.php';

$sourceFilesDirectory = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'tests', 'assets');
$sourceXmlFilename = InvoiceSuitePathUtils::combinePathWithFile($sourceFilesDirectory, '03_zugferddocumentreader_3.xml');
$targetXmlFilename = InvoiceSuitePathUtils::combinePathWithFile(__DIR__, '11_XRechnungCiiInvoice.xml');

/*
 * The provider unique ID selects XRechnung in CII syntax explicitly.
 * The DTO source only keeps the example short and focused on the provider selection.
 */

$sourceReader = InvoiceSuiteDocumentReader::createFromFile($sourceXmlFilename);

$invoiceDocumentDTO = $sourceReader->toDTO();

$documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId(InvoiceSuiteBuiltInProviders::XRECHNUNG_CII);

$documentBuilder
    ->createFromDTO($invoiceDocumentDTO)
    ->setDocumentNo('XR-CII-471102')
    ->saveContentToFile($targetXmlFilename);

echo sprintf("Created XRechnung CII invoice: %s\n", $targetXmlFilename);
echo sprintf("Format provider: %s\n", $documentBuilder->getCurrentDocumentFormatProvider()?->getUniqueId() ?? 'unknown');
