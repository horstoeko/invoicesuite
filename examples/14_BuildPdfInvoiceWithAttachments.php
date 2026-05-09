<?php

use horstoeko\invoicesuite\InvoiceSuitePdfDocumentBuilder;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

/**
 * Build a hybrid electronic PDF invoice document and add additional PDF attachments
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/00_ExampleHelpers.php';

$sourceFilesDirectory = InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', 'tests', 'assets');
$invoiceXmlFilename = InvoiceSuitePathUtils::combinePathWithFile($sourceFilesDirectory, '03_zugferddocumentreader_3.xml');
$sourcePdfFilename = InvoiceSuitePathUtils::combinePathWithFile($sourceFilesDirectory, 'pdf_plain.pdf');
$attachmentTextFilename = InvoiceSuitePathUtils::combinePathWithFile($sourceFilesDirectory, '01_InvoiceSuiteAttachment_1.txt');
$attachmentCsvFilename = InvoiceSuitePathUtils::combinePathWithFile($sourceFilesDirectory, '01_InvoiceSuiteAttachment_3.csv');
$targetPdfFilename = InvoiceSuitePathUtils::combinePathWithFile(__DIR__, '14_InvoiceWithAttachments.pdf');

/*
 * The invoice XML is embedded as the main electronic invoice document.
 * Additional documents are embedded as supplemental attachments.
 */

$pdfBuilder = InvoiceSuitePdfDocumentBuilder::createFromDocumentContentAndPdfFile(
    InvoiceSuiteFileUtils::getContentFromFileOrString($invoiceXmlFilename),
    $sourcePdfFilename
);

$pdfBuilder
    ->setAdditionalCreatorTool('InvoiceSuite example')
    ->setDocumentRelationshipTypeToAlternative()
    ->setAttachmentPaneVisibility(true)
    ->addAdditionalDocumentByRealFile($attachmentTextFilename, 'Additional text attachment')
    ->addAdditionalDocumentByContent(
        InvoiceSuiteFileUtils::getContentFromFileOrString($attachmentCsvFilename),
        'invoice-lines.csv',
        'Invoice line CSV export'
    )
    ->generatePdfDocumentAndSaveToFile($targetPdfFilename);

echo sprintf("Created PDF invoice with attachments: %s\n", $targetPdfFilename);
echo sprintf("Additional attachments: %d\n", count($pdfBuilder->getaddAdditionalDocument()));
