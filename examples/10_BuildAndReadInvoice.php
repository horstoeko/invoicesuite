<?php

use horstoeko\invoicesuite\InvoiceSuiteBuiltInProviders;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

/**
 * Build an electronic invoice XML document and read the generated content without saving it first
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/00_ExampleHelpers.php';

$sourceFilesDirectory = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'tests', 'assets');
$sourceXmlFilename = InvoiceSuitePathUtils::combinePathWithFile($sourceFilesDirectory, '03_zugferddocumentreader_3.xml');
$targetXmlFilename = InvoiceSuitePathUtils::combinePathWithFile(__DIR__, '10_BuiltInvoice.xml');

/*
 * This example uses an existing invoice as DTO source to keep the example compact.
 * copyToReader() reads the freshly generated builder content through the reader API.
 */

$sourceReader = InvoiceSuiteDocumentReader::createFromFile($sourceXmlFilename);

$invoiceDocumentDTO = $sourceReader->toDTO();

$documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId(InvoiceSuiteBuiltInProviders::ZFFX_COMFORT);

$documentBuilder
    ->createFromDTO($invoiceDocumentDTO)
    ->setDocumentNo('471102-BUILT-AND-READ')
    ->saveContentToFile($targetXmlFilename);

$generatedReader = $documentBuilder->copyToReader();

$generatedReader
    ->getDocumentNo($generatedDocumentNumber)
    ->getDocumentDate($generatedDocumentDate)
    ->getDocumentSellerName($generatedSellerName);

echo sprintf("Built invoice XML: %s\n", $targetXmlFilename);
echo sprintf("Format provider: %s\n", $generatedReader->getCurrentDocumentFormatProvider()?->getUniqueId() ?? 'unknown');
echo sprintf("Document number: %s\n", $generatedDocumentNumber);
echo sprintf("Document date: %s\n", $generatedDocumentDate?->format('Y-m-d') ?? '');
echo sprintf("Seller: %s\n", $generatedSellerName);
