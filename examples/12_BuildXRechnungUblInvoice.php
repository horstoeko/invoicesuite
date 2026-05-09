<?php

use horstoeko\invoicesuite\InvoiceSuiteBuiltInProviders;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

/**
 * Build an XRechnung invoice document in UBL Invoice syntax
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/00_ExampleHelpers.php';

$sourceFilesDirectory = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'tests', 'assets');
$sourceXmlFilename = InvoiceSuitePathUtils::combinePathWithFile($sourceFilesDirectory, '00_case_xrechnung_ublinvoice_simple.xml');
$targetXmlFilename = InvoiceSuitePathUtils::combinePathWithFile(__DIR__, '12_XRechnungUblInvoice.xml');

/*
 * The provider unique ID selects XRechnung in UBL Invoice syntax explicitly.
 * This creates an UBL Invoice root document, not a CII document.
 */

$sourceReader = InvoiceSuiteDocumentReader::createFromFile($sourceXmlFilename);

$invoiceDocumentDTO = $sourceReader->toDTO();

$documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId(InvoiceSuiteBuiltInProviders::XRECHNUNG_UBL_INVOICE);

$documentBuilder
    ->createFromDTO($invoiceDocumentDTO)
    ->setDocumentNo('XR-UBL-INV-471102')
    ->saveContentToFile($targetXmlFilename);

echo sprintf("Created XRechnung UBL invoice: %s\n", $targetXmlFilename);
echo sprintf("Format provider: %s\n", $documentBuilder->getCurrentDocumentFormatProvider()?->getUniqueId() ?? 'unknown');
