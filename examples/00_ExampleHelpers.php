<?php

use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\validators\InvoiceSuiteKositDocumentValidator;
use horstoeko\invoicesuite\visualizers\InvoiceSuiteVisualizer;

/**
 * Validate an invoice document by a given InvoiceSuiteDocumentBuilder
 *
 * @param  InvoiceSuiteDocumentBuilder $documentBuilder
 * @return bool
 */
function validateInvoiceSuiteDocumentBuilder(InvoiceSuiteDocumentBuilder $documentBuilder): bool
{
    $validator = InvoiceSuiteKositDocumentValidator::createFromDocumentBuilder($documentBuilder);
    $validator->activateRemoteValidation('192.168.1.83', 8081)->validate();

    echo "Finished\n";

    echo sprintf("HasErrorMessages .......... %s\n", $validator->hasErrorMessagesInMessageBag());
    echo sprintf("HasWarningMessages ........ %s\n", $validator->hasWarningMessagesInMessageBag());
    echo sprintf("HasLogMessages ............ %s\n", $validator->hasInfoMessagesInMessageBag());

    foreach ($validator->getErrorMessagesInMessageBag() as $message) {
        echo sprintf("  ....... %s\n", $message->getMessageContent());
    }

    return $validator->hasErrorMessagesInMessageBag();
}

/**
 * Render a PDF as output or to a specified file
 *
 * @param  InvoiceSuiteDocumentBuilder $documentBuilder
 * @param  string                      $tofilename
 * @return string
 */
function visualizeInvoiceSuiteDocumentBuilder(InvoiceSuiteDocumentBuilder $documentBuilder, string $tofilename = ''): string
{
    $visualizer = InvoiceSuiteVisualizer::createFromDocumentBuilder($documentBuilder);
    $visualizer->setDefaultTemplate();

    if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($tofilename)) {
        return $visualizer->renderPdf();
    }

    $visualizer->renderPdfFile($tofilename);

    return $tofilename;
}
