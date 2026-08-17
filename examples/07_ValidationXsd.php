<?php

use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\validators\InvoiceSuiteXsdDocumentValidator;

/**
 * Validate an electronic invoice XML document against the matching XSD schema
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/00_ExampleHelpers.php';

$sourceFilesDirectory = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'tests', 'assets');
$invoiceXmlFilename = InvoiceSuitePathUtils::combinePathWithFile($sourceFilesDirectory, '03_zugferddocumentreader_3.xml');

/*
 * The XSD validator reads the electronic invoice XML file, detects the matching format provider
 * and uses the XSD schema configured by this provider.
 */

$validator = InvoiceSuiteXsdDocumentValidator::createFromFile($invoiceXmlFilename);
$validator->validate();

$formatProvider = $validator->getCurrentDocumentFormatProvider();
$validationWasSuccessful = !$validator->hasErrorMessagesInMessageBag();

echo sprintf("Validated invoice XML: %s\n", $invoiceXmlFilename);
echo sprintf("Format provider: %s\n", $formatProvider?->getUniqueId() ?? 'unknown');
echo sprintf("XSD schema: %s\n", $validator->getXsdFilename());
echo sprintf("Status: %s\n", $validationWasSuccessful ? 'valid' : 'invalid');
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
