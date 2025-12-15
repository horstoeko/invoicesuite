<?php

use horstoeko\zugferd\ZugferdDocumentPdfMerger;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\InvoiceSuitePdfDocumentBuilder;
use horstoeko\zugferd\ZugferdDocumentBuilder;
use horstoeko\zugferd\ZugferdDocumentPdfBuilder;
use horstoeko\zugferd\ZugferdProfiles;

require __DIR__ . "/../vendor/autoload.php";

/*
$xmlContent = file_get_contents(InvoiceSuitePathUtils::combinePathWithFile(__DIR__, "05_xml.xml"));
$pdfContent = file_get_contents(InvoiceSuitePathUtils::combinePathWithFile(__DIR__, "05_pdf.pdf"));

$builder = InvoiceSuitePdfDocumentBuilder::createFromDocumentContentAndPdfContent($xmlContent, $pdfContent);

$builder->generatePdfDocumentAndSaveToFile(InvoiceSuitePathUtils::combinePathWithFile(__DIR__, "05_pdf_1.pdf"));
*/

$xmlContent = file_get_contents(InvoiceSuitePathUtils::combinePathWithFile(__DIR__, "05_xml.xml"));
$pdfContent = file_get_contents(InvoiceSuitePathUtils::combinePathWithFile(__DIR__, "05_pdf.pdf"));

$pdfMerger = new ZugferdDocumentPdfMerger($xmlContent, $pdfContent);
$pdfMerger
    ->showAttachmentPane()
    ->generateDocument()
    ->saveDocument(InvoiceSuitePathUtils::combinePathWithFile(__DIR__, "05_pdf_1.pdf"));

$documentBuilder = ZugferdDocumentBuilder::createNew(ZugferdProfiles::PROFILE_BASIC);
$documentBuilder->setDocumentInformation('123', '380', new DateTime(), 'EUR');
$documentBuilder->setDocumentSeller("Baum GmbH", '0815');
$pdfBuilder = ZugferdDocumentPdfBuilder::fromPdfFile($documentBuilder, InvoiceSuitePathUtils::combinePathWithFile(__DIR__, "05_pdf.pdf"));
$pdfBuilder
    ->showAttachmentPane()
    ->generateDocument()
    ->saveDocument(InvoiceSuitePathUtils::combinePathWithFile(__DIR__, "05_pdf_2.pdf"));
