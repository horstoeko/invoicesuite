<?php

use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\validators\InvoiceSuiteDocuflairDocumentValidator;

/**
 * Validate an electronic invoice XML document against the matching XSD schema
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/00_ExampleHelpers.php';

$sourceFilesDirectory = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'tests', 'assets');
$invoiceXmlFilename = InvoiceSuitePathUtils::combinePathWithFile($sourceFilesDirectory, '03_zugferddocumentreader_3.xml');

/*
 * The DocuFlair validator reads the electronic invoice XML file, detects the matching format provider
 * and uses the DocuFlair-API to validate the document. An API-Key is required
 */

$docuflairApiKey = ''; // Add the DocuFlair API key here....

$validator = InvoiceSuiteDocuflairDocumentValidator::createFromFile($invoiceXmlFilename);
$validator
    ->setApiKey($docuflairApiKey)
    ->validate();

$formatProvider = $validator->getCurrentDocumentFormatProvider();
$validationWasSuccessful = !$validator->hasErrorMessagesInMessageBag() && !$validator->hasInternalErrorMessagesInMessageBag();

echo sprintf("Validated invoice XML: %s\n", $invoiceXmlFilename);
echo sprintf("Format provider: %s\n", $formatProvider?->getUniqueId() ?? 'unknown');
echo sprintf("Status: %s\n", $validationWasSuccessful ? 'valid' : 'invalid');
echo sprintf("Internal Errors: %d\n", $validator->countInternalErrorMessagesInMessageBag());
echo sprintf("Errors: %d\n", $validator->countErrorMessagesInMessageBag());
echo sprintf("Warnings: %d\n", $validator->countWarningMessagesInMessageBag());
echo sprintf("Infos: %d\n", $validator->countInfoMessagesInMessageBag());

foreach ($validator->getMessageBag() as $messageBagItem) {
    echo sprintf(
        "%s: %s\n",
        $messageBagItem->getMessageSeverityValue(),
        $messageBagItem->getMessageContent()
    );
}
