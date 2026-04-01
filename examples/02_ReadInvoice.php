<?php

use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;

/**
 * Read an elctronic invoice document from a XML file
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/00_ExampleHelpers.php';

$reader = InvoiceSuiteDocumentReader::createFromFile(__DIR__ . "/01_SimpleInvoice.xml");

// General invoice document information

$reader->getDocumentNo($documentNumber);
$reader->getDocumentType($documentType);
$reader->getDocumentDescription($documentDescription);
$reader->getDocumentLanguage($documentLanguage);
$reader->getDocumentDate($documentDate);
$reader->getDocumentCompleteDate($documentCompleteDate);
$reader->getDocumentCurrency($documentCurrency);
$reader->getDocumentTaxCurrency($documentTaxCurrency);
$reader->getDocumentIsCopy($documentIsCopy);
$reader->getDocumentBuyerReference($documentBuyerReference);

echo "Document Number ........ $documentNumber\n";
echo "Document Type .......... $documentType\n";
echo "Document Name .......... $documentDescription\n";
echo "Document Language ...... $documentLanguage\n";
echo "Document Date .......... " . $documentDate?->format("d.m.Y") . "\n";
echo "Document Compl. Date ... " . $documentCompleteDate?->format("d.m.Y") . "\n";
echo "Document Currency ...... $documentCurrency\n";
echo "Document Tax Currency .. $documentTaxCurrency\n";
echo "Document Copy .......... $documentIsCopy\n";
echo "Document Leitweg ....... $documentBuyerReference\n";


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
    echo sprintf("Additional Document %s by %s (%s)\n", $documentAdditionalNo, $documentAdditionalDate?->format("d.m.Y") ?? "", $documentAdditionalTypeCode);
}

while ($reader->nextDocumentInvoiceReference()) {
    $reader->getDocumentInvoiceReference($documentInvoiceReferenceNo, $documentInvoiceReferenceDate, $documentInvoiceReferenceTypeCode);
    echo sprintf("Invoice Reference Document %s by %s (%s)\n", $documentInvoiceReferenceNo, $documentInvoiceReferenceDate?->format("d.m.Y") ?? "", $documentInvoiceReferenceTypeCode);
}

while ($reader->nextDocumentProjectReference()) {
    $reader->getDocumentProjectReference($documentProjectReferenceNo, $documentProjectReferenceName);
    echo sprintf("Project Reference %s, %s\n", $documentProjectReferenceNo, $documentProjectReferenceName);
}

while ($reader->nextDocumentUltimateCustomerOrderReference()) {
    $reader->getDocumentUltimateCustomerOrderReference($documentUltimateCustomerOrderNo, $documentUltimateCustomerOrderDate);
    echo sprintf("Ultimate Customer Order %s by %s\n", $documentUltimateCustomerOrderNo, $documentUltimateCustomerOrderDate?->format("d.m.Y") ?? "");
}

while ($reader->nextDocumentDespatchAdviceReference()) {
    $reader->getDocumentDespatchAdviceReference($documentDespatchAdviceNo, $documentDespatchAdviceDate);
    echo sprintf("Despatch Advice %s by %s\n", $documentDespatchAdviceNo, $documentDespatchAdviceDate?->format("d.m.Y") ?? "");
}

while ($reader->nextDocumentReceivingAdviceReference()) {
    $reader->getDocumentReceivingAdviceReference($documentReceivingAdviceNo, $documentReceivingAdviceDate);
    echo sprintf("Receiving Advice %s by %s\n", $documentReceivingAdviceNo, $documentReceivingAdviceDate?->format("d.m.Y") ?? "");
}

while ($reader->nextDocumentDeliveryNoteReference()) {
    $reader->getDocumentDeliveryNoteReference($documentDeliveryNoteNo, $documentDeliveryNoteDate);
    echo sprintf("Delivery Note %s by %s\n", $documentDeliveryNoteNo, $documentDeliveryNoteDate?->format("d.m.Y") ?? "");
}

$reader->getDocumentSupplyChainEvent($documemtSupplyChainEventDate);

echo sprintf("Supply Chain event at %s\n", $documemtSupplyChainEventDate?->format("d.m.Y") ?? "");

// Read information about the seller/supplier


echo "\n";
echo "Seller/Supplier Party\n";
echo "\n";

$reader->getDocumentSellerName($documentSellerName);
echo sprintf("Seller Name ........ %s\n", $documentSellerName);

while ($reader->nextDocumentSellerId()) {
    $reader->getDocumentSellerId($documentSellerGlobalId);
    echo sprintf("Seller ID .......... %s\n", $documentSellerGlobalId);
}

while ($reader->nextDocumentSellerGlobalId()) {
    $reader->getDocumentSellerGlobalId($documentSellerGlobalId, $documentSellerGlobalIdType);
    echo sprintf("Seller Global ID ... %s (%s)\n", $documentSellerGlobalId, $documentSellerGlobalIdType);
}

while ($reader->nextDocumentSellerTaxRegistration()) {
    $reader->getDocumentSellerTaxRegistration($documentSellerTaxRegistrationType, $documentSellerTaxRegistrationId);
    echo sprintf("Seller Tax Reg. .... %s (%s)\n", $documentSellerTaxRegistrationId, $documentSellerTaxRegistrationType);
}

while ($reader->nextDocumentSellerAddress()) {
    $reader->getDocumentSellerAddress($documentSellerAddressLine1, $documentSellerAddressLine2, $documentSellerAddressLine3, $documentSellerPostCode, $documentSellerCity, $documentSellerCountryId, $documentSellerSubDivision);
    echo sprintf("Seller Address ..... %s\n", $documentSellerAddressLine1);
    echo sprintf("               ..... %s\n", $documentSellerAddressLine2);
    echo sprintf("               ..... %s\n", $documentSellerAddressLine3);
    echo sprintf("               ..... %s %s %s\n", $documentSellerCountryId, $documentSellerPostCode, $documentSellerCity);
    echo sprintf("               ..... %s\n", $documentSellerSubDivision);
}

while ($reader->nextDocumentSellerLegalOrganisation()) {
    $reader->getDocumentSellerLegalOrganisation($documentSellerLegalOrgType, $documentSellerLegalOrgId, $documentSellerLegalOrgName);
    echo sprintf("Seller Legal ....... %s (%s), %s\n", $documentSellerLegalOrgId, $documentSellerLegalOrgType, $documentSellerLegalOrgName);
}

while ($reader->nextDocumentSellerContact()) {
    $reader->getDocumentSellerContact($documentSellerContactName, $documentSellerContactDepartmenrName, $documentSellerContactPhoneNumber, $documentSellerContactFaxNumber, $documentSellerContactEmailAddress);
    echo sprintf("Seller Contact ..... %s\n", $documentSellerContactName);
    echo sprintf("               ..... %s\n", $documentSellerContactDepartmenrName);
    echo sprintf("               ..... %s\n", $documentSellerContactPhoneNumber);
    echo sprintf("               ..... %s\n", $documentSellerContactFaxNumber);
    echo sprintf("               ..... %s\n", $documentSellerContactEmailAddress);
}

while ($reader->nextDocumentSellerCommunication()) {
    $reader->getDocumentSellerCommunication($documentSellerCommunicationType, $documentSellerCommunicationUri);
    echo sprintf("Seller Comm. ....... %s (%s)\n", $documentSellerCommunicationUri, $documentSellerCommunicationType);
}
