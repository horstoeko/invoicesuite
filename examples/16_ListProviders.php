<?php

use horstoeko\invoicesuite\InvoiceSuiteBuiltInProviders;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;

/**
 * List all registered document format providers
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/00_ExampleHelpers.php';

/*
 * Any document builder or reader can expose the registered providers.
 * Here a builder is used only to bootstrap the provider registry.
 */

$documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId(InvoiceSuiteBuiltInProviders::ZFFX_COMFORT);
$formatProviders = $documentBuilder->getRegisteredDocumentFormatProviders();

echo sprintf("Registered document format providers: %d\n", count($formatProviders));
echo "\n";

foreach ($formatProviders as $formatProvider) {
    echo sprintf("Unique ID ............ %s\n", $formatProvider->getUniqueId());
    echo sprintf("Description ......... %s\n", $formatProvider->getDescription());
    echo sprintf("Version ............. %s\n", (string) $formatProvider->getVersion());
    echo sprintf("Content type ........ %s\n", $formatProvider->getContentType()->value);
    echo sprintf("PDF support ......... %s\n", $formatProvider->getIsPdfSupportAvailable() ? 'yes' : 'no');
    echo sprintf("Default PDF XML ..... %s\n", $formatProvider->getPdfDefaultAttachmentFilename() ?: '-');
    echo sprintf("XSD validation ...... %s\n", $formatProvider->getValidationXsdAvailable() ? 'yes' : 'no');
    echo "\n";
}
