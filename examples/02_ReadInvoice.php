<?php

use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;

require __DIR__ . "/../vendor/autoload.php";

$reader = InvoiceSuiteDocumentReader::createFromCFile(__DIR__ . "/01_SimpleInvoice.xml");
$reader->getDocumentNo($documentNumber);
$reader->getDocumentType($documentType);
$reader->getDocumentDescription($documentDescription);
$reader->getDocumentLanguage($documentLanguage);
$reader->getDocumentDate($documentDate);
$reader->getDocumentCompleteDate($documentCompleteDate);
$reader->getDocumentCurrency($documentCurrency);
$reader->getDocumentTaxCurrency($documentTaxCurrency);
$reader->getDocumentIsCopy($documentIsCopy);

echo "Document Number ........ $documentNumber\n";
echo "Document Type .......... $documentType\n";
echo "Document Name .......... $documentDescription\n";
echo "Document Language ...... $documentLanguage\n";
echo "Document Date .......... " . $documentDate->format("d.m.Y") . "\n";
echo "Document Compl. Date ... " . $documentCompleteDate->format("d.m.Y") . "\n";
echo "Document Currency ...... $documentCurrency\n";
echo "Document Tax Currency .. $documentTaxCurrency\n";
echo "Document Copy .......... $documentIsCopy\n";

while ($reader->nextDocumentNote()) {
    $reader->getDocumentNote($documentNoteContent, $documentNoteContentCode, $documentNoteSubjectCode);
    echo sprintf("%s (%s, %s)\n", $documentNoteContent, $documentNoteContentCode, $documentNoteSubjectCode);
}

while ($reader->nextDocumentBillingPeriod()) {
    $reader->getDocumentBillingPeriod($documentBillingPeriodStartDate, $documentBillingPeriodEndDate, $documentBillingPeriodDescription);
    echo sprintf("%s - %s (%s)\n", $documentBillingPeriodStartDate?->format("d.m.Y") ?? "", $documentBillingPeriodEndDate?->format("d.m.Y") ?? "", $documentBillingPeriodDescription);
}

while ($reader->nextDocumentPostingReference()) {
    $reader->getDocumentPostingReference($documentPostingReferenceType, $documentPostingReferenceAccountId);
    echo sprintf("%s (%s)\n", $documentPostingReferenceAccountId, $documentPostingReferenceType);
}

while ($reader->nextDocumentSellerOrderReference()) {
    $reader->getDocumentSellerOrderReference($documentBuyerOrderNo, $documentBuyerOrderDate);
    echo sprintf("Seller Order %s by %s\n", $documentBuyerOrderNo, $documentBuyerOrderDate?->format("d.m.Y") ?? "");
}

while ($reader->nextDocumentBuyerOrderReference()) {
    $reader->getDocumentBuyerOrderReference($documentBuyerOrderNo, $documentBuyerOrderDate);
    echo sprintf("Buyer Order %s by %s\n", $documentBuyerOrderNo, $documentBuyerOrderDate?->format("d.m.Y") ?? "");
}

while ($reader->nextDocumentQuotationReference()) {
    $reader->getDocumentQuotationReference($documentQuotationNo, $documentQuotationDate);
    echo sprintf("Quotation %s by %s\n", $documentQuotationNo, $documentQuotationDate?->format("d.m.Y") ?? "");
}

while ($reader->nextDocumentContractReference()) {
    $reader->getDocumentContractReference($documentContractNo, $documentContractDate);
    echo sprintf("Contract %s by %s\n", $documentContractNo, $documentContractDate?->format("d.m.Y") ?? "");
}

while ($reader->nextDocumentAdditionalReference()) {
    $reader->getDocumentAdditionalReference($documentAdditionalNo, $documentAdditionalDate, $documentAdditionalTypeCode, $documentAdditionalRefTypeCode, $documentAdditionalDescription, $documentAdditionalAttachment);
    echo sprintf("Additional Document %s by %s\n", $documentAdditionalNo, $documentAdditionalDate?->format("d.m.Y") ?? "");
}

while ($reader->nextDocumentInvoiceReference()) {
    $reader->getDocumentInvoiceReference($documentInvoiceReferenceNo, $documentInvoiceReferenceDate, $documentInvoiceReferenceTypeCode);
    echo sprintf("Invoice Reference Document %s by %s (%s)\n", $documentInvoiceReferenceNo, $documentInvoiceReferenceDate?->format("d.m.Y") ?? "", $documentInvoiceReferenceTypeCode);
}