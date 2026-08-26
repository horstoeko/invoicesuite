<?php

use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\validators\InvoiceSuiteKositDocumentValidator;

/**
 * Validate an XRechnung XML document by using a KoSIT validator running in remote daemon mode
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/00_ExampleHelpers.php';

$sourceFilesDirectory = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'tests', 'assets');
$invoiceXmlFilename = InvoiceSuitePathUtils::combinePathWithFile($sourceFilesDirectory, '03_zugferddocumentreader_3.xml');

$remoteHost = getenv('KOSIT_REMOTE_HOST') ?: '127.0.0.1';
$remotePortValue = getenv('KOSIT_REMOTE_PORT') ?: '8080';
$remotePort = is_numeric($remotePortValue) ? (int) $remotePortValue : 8080;

/*
 * The remote KoSIT validation sends the XML content to an already running validator service.
 * You can override the default host and port by setting KOSIT_REMOTE_HOST and KOSIT_REMOTE_PORT.
 */

$validator = InvoiceSuiteKositDocumentValidator::createFromFile($invoiceXmlFilename);
$validator
    ->activateRemoteValidation($remoteHost, $remotePort)
    ->validate();

$formatProvider = $validator->getCurrentDocumentFormatProvider();
$validationWasSuccessful = !$validator->hasErrorMessagesInMessageBag() && !$validator->hasInternalErrorMessagesInMessageBag();

echo sprintf("Validated invoice XML: %s\n", $invoiceXmlFilename);
echo sprintf("KoSIT remote URL: %s\n", $validator->getRemoteModeUrl());
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
