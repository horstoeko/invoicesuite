<?php

use horstoeko\invoicesuite\InvoiceSuiteBuiltInProviders;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\InvoiceSuiteSettings;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

/**
 * Configure general InvoiceSuite settings before building an electronic invoice document
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/00_ExampleHelpers.php';

$sourceFilesDirectory = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'tests', 'assets');
$sourceXmlFilename = InvoiceSuitePathUtils::combinePathWithFile($sourceFilesDirectory, '03_zugferddocumentreader_3.xml');
$serializerCacheDirectory = InvoiceSuitePathUtils::combineAllPaths(sys_get_temp_dir(), 'invoicesuite-serializer-cache');
$targetXmlFilename = InvoiceSuitePathUtils::combinePathWithFile(__DIR__, '17_SettingsInvoice.xml');

if (!is_dir($serializerCacheDirectory)) {
    mkdir($serializerCacheDirectory, 0775, true);
}

/*
 * Settings are global and should be configured before the document is serialized.
 * Not every provider uses every setting in the same way.
 */

InvoiceSuiteSettings::setAmountDecimals(2);
InvoiceSuiteSettings::setQuantityDecimals(4);
InvoiceSuiteSettings::setPercentDecimals(2);
InvoiceSuiteSettings::setMeasureDecimals(3);
InvoiceSuiteSettings::setUnitAmountDecimals(4);
InvoiceSuiteSettings::setDecimalSeparator('.');
InvoiceSuiteSettings::setThousandsSeparator('');
InvoiceSuiteSettings::setSerializerCacheDirectory($serializerCacheDirectory);

$sourceReader = InvoiceSuiteDocumentReader::createFromFile($sourceXmlFilename);
$invoiceDocumentDTO = $sourceReader->toDTO();

$documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId(InvoiceSuiteBuiltInProviders::ZFFX_COMFORT);
$documentBuilder
    ->createFromDTO($invoiceDocumentDTO)
    ->setDocumentNo('471102-SETTINGS')
    ->saveContentToFile($targetXmlFilename);

echo sprintf("Created invoice XML with custom settings: %s\n", $targetXmlFilename);
echo sprintf("Amount decimals: %d\n", InvoiceSuiteSettings::getAmountDecimals());
echo sprintf("Quantity decimals: %d\n", InvoiceSuiteSettings::getQuantityDecimals());
echo sprintf("Percent decimals: %d\n", InvoiceSuiteSettings::getPercentDecimals());
echo sprintf("Measure decimals: %d\n", InvoiceSuiteSettings::getMeasureDecimals());
echo sprintf("Serializer cache directory: %s\n", InvoiceSuiteSettings::getSerializerCacheDirectory());
