<?php

use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\validators\InvoiceSuiteCompositeDocumentValidator;
use horstoeko\invoicesuite\validators\InvoiceSuiteDocuflairDocumentValidator;
use horstoeko\invoicesuite\validators\InvoiceSuiteKositDocumentValidator;
use horstoeko\invoicesuite\validators\InvoiceSuiteXsdDocumentValidator;

/**
 * Validate an XRechnung XML document with the composite document validator
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/00_ExampleHelpers.php';

$sourceFilesDirectory = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'tests', 'assets');
$invoiceXmlFilename = InvoiceSuitePathUtils::combinePathWithFile($sourceFilesDirectory, '00_case_xrechnung_cii_simple_dto.xml');
$documentReader = InvoiceSuiteDocumentReader::createFromFile($invoiceXmlFilename);

/*
 * The default run uses XSD validation.
 * Remove KoSIT from the list to run it with Java. Its options can also target a running daemon.
 * Set DOCUFLAIR_API_KEY and remove DocuFlair from the list to use its validation API.
 */

$validator = InvoiceSuiteCompositeDocumentValidator::createFromDocumentReader($documentReader);
$validator->setDisabledValidators([
    InvoiceSuiteKositDocumentValidator::class,
    InvoiceSuiteDocuflairDocumentValidator::class,
]);

/*
 * Configure every public setter with demo values, including the inherited format provider setter.
 * Each option maps a method name to its list of positional arguments.
 */

$validator->setValidatorOptions(InvoiceSuiteXsdDocumentValidator::class, [
    'setXsdFilename' => [__DIR__ . '\..\src\documents\providers\zffx\xsd\FACTUR-X_EN16931.xsd'],
]);

$validator->setValidatorOptions(InvoiceSuiteKositDocumentValidator::class, [
    'setBaseDirectory' => [sys_get_temp_dir()],
    'setValidatorDownloadUrl' => ['https://github.com/itplr-kosit/validator/releases/download/v1.6.2/validator-1.6.2-standalone.jar'],
    'setValidatorScenarioDownloadUrl' => ['https://github.com/itplr-kosit/validator-configuration-xrechnung/releases/download/v2026-01-31/xrechnung-3.0.2-validator-configuration-2026-01-31.zip'],
    'setValidatorAppZipFilename' => ['validator.zip'],
    'setValidatorScenarioZipFilename' => ['validator-configuration.zip'],
    'setValidatorAppJarFilename' => ['validator-1.6.2-standalone.jar'],
    'setValidatorAppScenarioFilename' => ['scenarios.xml'],
    'setRemoteModeHost' => ['127.0.0.1'],
    'setRemoteModePort' => [8080],
    'disableRemoteMode' => [], // Use enableRemoteMode to connect to the configured daemon.
]);

$validator->setValidatorOptions(InvoiceSuiteDocuflairDocumentValidator::class, [
    'setBaseUrl' => ['https://invoice.docuflair.com'],
    'setApiKey' => ['demo-api-key'],
]);

$validator->validate();

$validationWasSuccessful = !$validator->hasErrorOrInternalErrorMessagesInMessageBag();

echo InvoiceSuiteStringUtils::sprintf("Validated invoice XML: %s\n", $invoiceXmlFilename);
echo InvoiceSuiteStringUtils::sprintf("Status: %s\n", $validationWasSuccessful ? 'valid' : 'invalid');
echo InvoiceSuiteStringUtils::sprintf("Internal Errors: %d\n", $validator->countInternalErrorMessagesInMessageBag());
echo InvoiceSuiteStringUtils::sprintf("Errors: %d\n", $validator->countErrorMessagesInMessageBag());
echo InvoiceSuiteStringUtils::sprintf("Warnings: %d\n", $validator->countWarningMessagesInMessageBag());
echo InvoiceSuiteStringUtils::sprintf("Infos: %d\n", $validator->countInfoMessagesInMessageBag());

foreach ($validator->getMessageBag() as $messageBagItem) {
    echo InvoiceSuiteStringUtils::sprintf(
        "%s: %s\n",
        $messageBagItem->getMessageSeverityValue(),
        $messageBagItem->getMessageContent()
    );
}
