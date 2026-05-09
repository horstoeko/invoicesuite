<?php

use horstoeko\invoicesuite\InvoiceSuitePdfDocumentReader;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

/**
 * Read the invoice XML attachment and all additional attachments from a hybrid electronic PDF invoice document
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/00_ExampleHelpers.php';

$sourceFilesDirectory = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'tests', 'assets');
$pdfInvoiceFilename = InvoiceSuitePathUtils::combinePathWithFile($sourceFilesDirectory, 'pdf_with_multiple_attachments.pdf');
$targetFilesDirectory = __DIR__;

$pdfReader = InvoiceSuitePdfDocumentReader::createFromFile($pdfInvoiceFilename);
$invoiceDocumentAttachment = $pdfReader->getInvoiceDocumentAttachment();

/*
 * The invoice document attachment is the embedded XML invoice that was detected by the PDF reader.
 * Additional PDF attachments are available separately and can be written to files if needed.
 */

echo sprintf("Read PDF invoice: %s\n", $pdfInvoiceFilename);
echo sprintf("Format provider: %s\n", $pdfReader->getCurrentDocumentFormatProvider()?->getUniqueId() ?? 'unknown');

if (null !== $invoiceDocumentAttachment) {
    $invoiceXmlFilename = InvoiceSuitePathUtils::combinePathWithFile(
        $targetFilesDirectory,
        sprintf('08_%s', InvoiceSuiteFileUtils::getFilenameWithExtension($invoiceDocumentAttachment->getAttachmentFilename()))
    );

    file_put_contents($invoiceXmlFilename, $invoiceDocumentAttachment->getAttachmentContent());

    echo sprintf("Invoice attachment: %s (%s)\n", $invoiceDocumentAttachment->getAttachmentFilename(), $invoiceDocumentAttachment->getAttachmentMimeType());
    echo sprintf("Saved invoice XML: %s\n", $invoiceXmlFilename);
}

$additionalAttachments = $pdfReader->getAdditionalDocumentAttachments();

echo sprintf("Additional attachments: %d\n", count($additionalAttachments));

foreach ($additionalAttachments as $attachmentIndex => $additionalAttachment) {
    $attachmentFilename = InvoiceSuiteFileUtils::getFilenameWithExtension($additionalAttachment->getAttachmentFilename());
    $targetAttachmentFilename = InvoiceSuitePathUtils::combinePathWithFile(
        $targetFilesDirectory,
        sprintf('08_Attachment_%02d_%s', $attachmentIndex + 1, $attachmentFilename)
    );

    file_put_contents($targetAttachmentFilename, $additionalAttachment->getAttachmentContent());

    echo sprintf(
        "Saved additional attachment: %s (%s) -> %s\n",
        $additionalAttachment->getAttachmentFilename(),
        $additionalAttachment->getAttachmentMimeType(),
        $targetAttachmentFilename
    );
}
