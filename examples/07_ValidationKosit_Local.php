<?php

use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\validators\InvoiceSuiteKositDocumentValidator;

/**
 * Validate an XRechnung XML document by using the KoSIT validator locally
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/00_ExampleHelpers.php';

$sourceFilesDirectory = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'tests', 'assets');
$invoiceXmlFilename = InvoiceSuitePathUtils::combinePathWithFile($sourceFilesDirectory, '03_zugferddocumentreader_3.xml');
$kositBaseDirectory = InvoiceSuitePathUtils::combinePathWithFile(sys_get_temp_dir(), 'invoicesuite-kosit-local');

if (!is_dir($kositBaseDirectory)) {
    mkdir($kositBaseDirectory, 0775, true);
}

/*
 * The local KoSIT validation downloads the validator application and the validation scenarios,
 * unpacks them into the configured base directory and runs the Java validator application locally.
 * disableCleanup() keeps the downloaded files for later example runs.
 */

$validator = InvoiceSuiteKositDocumentValidator::createFromFile($invoiceXmlFilename);
$validator
    ->setBaseDirectory($kositBaseDirectory)
    ->disableCleanup()
    ->validate();

$formatProvider = $validator->getCurrentDocumentFormatProvider();
$validationWasSuccessful = !$validator->hasErrorMessagesInMessageBag() && !$validator->hasInternalErrorMessagesInMessageBag();

echo sprintf("Validated invoice XML: %s\n", $invoiceXmlFilename);
echo sprintf("KoSIT base directory: %s\n", $kositBaseDirectory);
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
