<?php

use horstoeko\invoicesuite\InvoiceSuiteBuiltInProviders;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

/**
 * Build an XRechnung credit note document in UBL CreditNote syntax
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/00_ExampleHelpers.php';

$sourceFilesDirectory = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'tests', 'assets');
$sourceXmlFilename = InvoiceSuitePathUtils::combinePathWithFile($sourceFilesDirectory, '00_case_xrechnung_ublcreditnote_simple.xml');
$targetXmlFilename = InvoiceSuitePathUtils::combinePathWithFile(__DIR__, '13_XRechnungUblCreditNote.xml');

/*
 * Credit notes are separate UBL root documents.
 * Therefore the credit note provider is selected explicitly instead of the invoice provider.
 */

$sourceReader = InvoiceSuiteDocumentReader::createFromFile($sourceXmlFilename);

$invoiceDocumentDTO = $sourceReader->toDTO();

$documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId(InvoiceSuiteBuiltInProviders::XRECHNUNG_UBL_CREDIT_NOTE);

$documentBuilder
    ->createFromDTO($invoiceDocumentDTO)
    ->setDocumentNo('XR-UBL-CN-471102')
    ->saveContentToFile($targetXmlFilename);

echo sprintf("Created XRechnung UBL credit note: %s\n", $targetXmlFilename);
echo sprintf("Format provider: %s\n", $documentBuilder->getCurrentDocumentFormatProvider()?->getUniqueId() ?? 'unknown');
