<?php

use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;

require __DIR__ . "/../vendor/autoload.php";

$readMode = 1; // 0 = UBL, 1 = ZF/FX Extended, 2 = ZF/FX Comfort

if ($readMode === 0) {
    $reader = InvoiceSuiteDocumentReader::createFromFile(__DIR__ . "/01_SimpleInvoice_UBL.xml");
}
if ($readMode === 1) {
    $reader = InvoiceSuiteDocumentReader::createFromFile(__DIR__ . "/01_SimpleInvoice.xml");
}

#region General

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

#endregion

#region Seller Output

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

#endregion

#region Buyer Output

echo "\n";
echo "Buyer/Customer Party\n";
echo "\n";

$reader->getDocumentBuyerName($documentBuyerName);
echo sprintf("Buyer Name ........ %s\n", $documentBuyerName);

while ($reader->nextDocumentBuyerId()) {
    $reader->getDocumentBuyerId($documentBuyerGlobalId);
    echo sprintf("Buyer ID .......... %s\n", $documentBuyerGlobalId);
}

while ($reader->nextDocumentBuyerGlobalId()) {
    $reader->getDocumentBuyerGlobalId($documentBuyerGlobalId, $documentBuyerGlobalIdType);
    echo sprintf("Buyer Global ID ... %s (%s)\n", $documentBuyerGlobalId, $documentBuyerGlobalIdType);
}

while ($reader->nextDocumentBuyerTaxRegistration()) {
    $reader->getDocumentBuyerTaxRegistration($documentBuyerTaxRegistrationType, $documentBuyerTaxRegistrationId);
    echo sprintf("Buyer Tax Reg. .... %s (%s)\n", $documentBuyerTaxRegistrationId, $documentBuyerTaxRegistrationType);
}

while ($reader->nextDocumentBuyerAddress()) {
    $reader->getDocumentBuyerAddress($documentBuyerAddressLine1, $documentBuyerAddressLine2, $documentBuyerAddressLine3, $documentBuyerPostCode, $documentBuyerCity, $documentBuyerCountryId, $documentBuyerSubDivision);
    echo sprintf("Buyer Address ..... %s\n", $documentBuyerAddressLine1);
    echo sprintf("               ..... %s\n", $documentBuyerAddressLine2);
    echo sprintf("               ..... %s\n", $documentBuyerAddressLine3);
    echo sprintf("               ..... %s %s %s\n", $documentBuyerCountryId, $documentBuyerPostCode, $documentBuyerCity);
    echo sprintf("               ..... %s\n", $documentBuyerSubDivision);
}

while ($reader->nextDocumentBuyerLegalOrganisation()) {
    $reader->getDocumentBuyerLegalOrganisation($documentBuyerLegalOrgType, $documentBuyerLegalOrgId, $documentBuyerLegalOrgName);
    echo sprintf("Buyer Legal ....... %s (%s), %s\n", $documentBuyerLegalOrgId, $documentBuyerLegalOrgType, $documentBuyerLegalOrgName);
}

while ($reader->nextDocumentBuyerContact()) {
    $reader->getDocumentBuyerContact($documentBuyerContactName, $documentBuyerContactDepartmenrName, $documentBuyerContactPhoneNumber, $documentBuyerContactFaxNumber, $documentBuyerContactEmailAddress);
    echo sprintf("Buyer Contact ..... %s\n", $documentBuyerContactName);
    echo sprintf("               ..... %s\n", $documentBuyerContactDepartmenrName);
    echo sprintf("               ..... %s\n", $documentBuyerContactPhoneNumber);
    echo sprintf("               ..... %s\n", $documentBuyerContactFaxNumber);
    echo sprintf("               ..... %s\n", $documentBuyerContactEmailAddress);
}

while ($reader->nextDocumentBuyerCommunication()) {
    $reader->getDocumentBuyerCommunication($documentBuyerCommunicationType, $documentBuyerCommunicationUri);
    echo sprintf("Buyer Comm. ....... %s (%s)\n", $documentBuyerCommunicationUri, $documentBuyerCommunicationType);
}

#endregion

#region Tax Representativ Output

echo "\n";
echo "Tax Representativ Party\n";
echo "\n";

$reader->getDocumentTaxRepresentativeName($documentTaxRepresentativeName);
echo sprintf("TaxRepresentative Name ........ %s\n", $documentTaxRepresentativeName);

while ($reader->nextDocumentTaxRepresentativeId()) {
    $reader->getDocumentTaxRepresentativeId($documentTaxRepresentativeGlobalId);
    echo sprintf("TaxRepresentative ID .......... %s\n", $documentTaxRepresentativeGlobalId);
}

while ($reader->nextDocumentTaxRepresentativeGlobalId()) {
    $reader->getDocumentTaxRepresentativeGlobalId($documentTaxRepresentativeGlobalId, $documentTaxRepresentativeGlobalIdType);
    echo sprintf("TaxRepresentative Global ID ... %s (%s)\n", $documentTaxRepresentativeGlobalId, $documentTaxRepresentativeGlobalIdType);
}

while ($reader->nextDocumentTaxRepresentativeTaxRegistration()) {
    $reader->getDocumentTaxRepresentativeTaxRegistration($documentTaxRepresentativeTaxRegistrationType, $documentTaxRepresentativeTaxRegistrationId);
    echo sprintf("TaxRepresentative Tax Reg. .... %s (%s)\n", $documentTaxRepresentativeTaxRegistrationId, $documentTaxRepresentativeTaxRegistrationType);
}

while ($reader->nextDocumentTaxRepresentativeAddress()) {
    $reader->getDocumentTaxRepresentativeAddress($documentTaxRepresentativeAddressLine1, $documentTaxRepresentativeAddressLine2, $documentTaxRepresentativeAddressLine3, $documentTaxRepresentativePostCode, $documentTaxRepresentativeCity, $documentTaxRepresentativeCountryId, $documentTaxRepresentativeSubDivision);
    echo sprintf("TaxRepresentative Address ..... %s\n", $documentTaxRepresentativeAddressLine1);
    echo sprintf("                          ..... %s\n", $documentTaxRepresentativeAddressLine2);
    echo sprintf("                          ..... %s\n", $documentTaxRepresentativeAddressLine3);
    echo sprintf("                          ..... %s %s %s\n", $documentTaxRepresentativeCountryId, $documentTaxRepresentativePostCode, $documentTaxRepresentativeCity);
    echo sprintf("                          ..... %s\n", $documentTaxRepresentativeSubDivision);
}

while ($reader->nextDocumentTaxRepresentativeLegalOrganisation()) {
    $reader->getDocumentTaxRepresentativeLegalOrganisation($documentTaxRepresentativeLegalOrgType, $documentTaxRepresentativeLegalOrgId, $documentTaxRepresentativeLegalOrgName);
    echo sprintf("TaxRepresentative Legal ....... %s (%s), %s\n", $documentTaxRepresentativeLegalOrgId, $documentTaxRepresentativeLegalOrgType, $documentTaxRepresentativeLegalOrgName);
}

while ($reader->nextDocumentTaxRepresentativeContact()) {
    $reader->getDocumentTaxRepresentativeContact($documentTaxRepresentativeContactName, $documentTaxRepresentativeContactDepartmenrName, $documentTaxRepresentativeContactPhoneNumber, $documentTaxRepresentativeContactFaxNumber, $documentTaxRepresentativeContactEmailAddress);
    echo sprintf("TaxRepresentative Contact ..... %s\n", $documentTaxRepresentativeContactName);
    echo sprintf("                          ..... %s\n", $documentTaxRepresentativeContactDepartmenrName);
    echo sprintf("                          ..... %s\n", $documentTaxRepresentativeContactPhoneNumber);
    echo sprintf("                          ..... %s\n", $documentTaxRepresentativeContactFaxNumber);
    echo sprintf("                          ..... %s\n", $documentTaxRepresentativeContactEmailAddress);
}

while ($reader->nextDocumentTaxRepresentativeCommunication()) {
    $reader->getDocumentTaxRepresentativeCommunication($documentTaxRepresentativeCommunicationType, $documentTaxRepresentativeCommunicationUri);
    echo sprintf("TaxRepresentative Comm. ....... %s (%s)\n", $documentTaxRepresentativeCommunicationUri, $documentTaxRepresentativeCommunicationType);
}

#endregion

#region Product Enduser Output

echo "\n";
echo "Product End User Party\n";
echo "\n";

$reader->getDocumentProductEndUserName($documentProductEndUserName);
echo sprintf("ProductEndUser Name ........ %s\n", $documentProductEndUserName);

while ($reader->nextDocumentProductEndUserId()) {
    $reader->getDocumentProductEndUserId($documentProductEndUserGlobalId);
    echo sprintf("ProductEndUser ID .......... %s\n", $documentProductEndUserGlobalId);
}

while ($reader->nextDocumentProductEndUserGlobalId()) {
    $reader->getDocumentProductEndUserGlobalId($documentProductEndUserGlobalId, $documentProductEndUserGlobalIdType);
    echo sprintf("ProductEndUser Global ID ... %s (%s)\n", $documentProductEndUserGlobalId, $documentProductEndUserGlobalIdType);
}

while ($reader->nextDocumentProductEndUserTaxRegistration()) {
    $reader->getDocumentProductEndUserTaxRegistration($documentProductEndUserTaxRegistrationType, $documentProductEndUserTaxRegistrationId);
    echo sprintf("ProductEndUser Tax Reg. .... %s (%s)\n", $documentProductEndUserTaxRegistrationId, $documentProductEndUserTaxRegistrationType);
}

while ($reader->nextDocumentProductEndUserAddress()) {
    $reader->getDocumentProductEndUserAddress($documentProductEndUserAddressLine1, $documentProductEndUserAddressLine2, $documentProductEndUserAddressLine3, $documentProductEndUserPostCode, $documentProductEndUserCity, $documentProductEndUserCountryId, $documentProductEndUserSubDivision);
    echo sprintf("ProductEndUser Address ..... %s\n", $documentProductEndUserAddressLine1);
    echo sprintf("                       ..... %s\n", $documentProductEndUserAddressLine2);
    echo sprintf("                       ..... %s\n", $documentProductEndUserAddressLine3);
    echo sprintf("                       ..... %s %s %s\n", $documentProductEndUserCountryId, $documentProductEndUserPostCode, $documentProductEndUserCity);
    echo sprintf("                       ..... %s\n", $documentProductEndUserSubDivision);
}

while ($reader->nextDocumentProductEndUserLegalOrganisation()) {
    $reader->getDocumentProductEndUserLegalOrganisation($documentProductEndUserLegalOrgType, $documentProductEndUserLegalOrgId, $documentProductEndUserLegalOrgName);
    echo sprintf("ProductEndUser Legal ....... %s (%s), %s\n", $documentProductEndUserLegalOrgId, $documentProductEndUserLegalOrgType, $documentProductEndUserLegalOrgName);
}

while ($reader->nextDocumentProductEndUserContact()) {
    $reader->getDocumentProductEndUserContact($documentProductEndUserContactName, $documentProductEndUserContactDepartmenrName, $documentProductEndUserContactPhoneNumber, $documentProductEndUserContactFaxNumber, $documentProductEndUserContactEmailAddress);
    echo sprintf("ProductEndUser Contact ..... %s\n", $documentProductEndUserContactName);
    echo sprintf("                       ..... %s\n", $documentProductEndUserContactDepartmenrName);
    echo sprintf("                       ..... %s\n", $documentProductEndUserContactPhoneNumber);
    echo sprintf("                       ..... %s\n", $documentProductEndUserContactFaxNumber);
    echo sprintf("                       ..... %s\n", $documentProductEndUserContactEmailAddress);
}

while ($reader->nextDocumentProductEndUserCommunication()) {
    $reader->getDocumentProductEndUserCommunication($documentProductEndUserCommunicationType, $documentProductEndUserCommunicationUri);
    echo sprintf("ProductEndUser Comm. ....... %s (%s)\n", $documentProductEndUserCommunicationUri, $documentProductEndUserCommunicationType);
}

#endregion

#region Ship-To Output

echo "\n";
echo "Ship-To Party\n";
echo "\n";

$reader->getDocumentShipToName($documentShipToName);
echo sprintf("ShipTo Name ........ %s\n", $documentShipToName);

while ($reader->nextDocumentShipToId()) {
    $reader->getDocumentShipToId($documentShipToGlobalId);
    echo sprintf("ShipTo ID .......... %s\n", $documentShipToGlobalId);
}

while ($reader->nextDocumentShipToGlobalId()) {
    $reader->getDocumentShipToGlobalId($documentShipToGlobalId, $documentShipToGlobalIdType);
    echo sprintf("ShipTo Global ID ... %s (%s)\n", $documentShipToGlobalId, $documentShipToGlobalIdType);
}

while ($reader->nextDocumentShipToTaxRegistration()) {
    $reader->getDocumentShipToTaxRegistration($documentShipToTaxRegistrationType, $documentShipToTaxRegistrationId);
    echo sprintf("ShipTo Tax Reg. .... %s (%s)\n", $documentShipToTaxRegistrationId, $documentShipToTaxRegistrationType);
}

while ($reader->nextDocumentShipToAddress()) {
    $reader->getDocumentShipToAddress($documentShipToAddressLine1, $documentShipToAddressLine2, $documentShipToAddressLine3, $documentShipToPostCode, $documentShipToCity, $documentShipToCountryId, $documentShipToSubDivision);
    echo sprintf("ShipTo Address ..... %s\n", $documentShipToAddressLine1);
    echo sprintf("               ..... %s\n", $documentShipToAddressLine2);
    echo sprintf("               ..... %s\n", $documentShipToAddressLine3);
    echo sprintf("               ..... %s %s %s\n", $documentShipToCountryId, $documentShipToPostCode, $documentShipToCity);
    echo sprintf("               ..... %s\n", $documentShipToSubDivision);
}

while ($reader->nextDocumentShipToLegalOrganisation()) {
    $reader->getDocumentShipToLegalOrganisation($documentShipToLegalOrgType, $documentShipToLegalOrgId, $documentShipToLegalOrgName);
    echo sprintf("ShipTo Legal ....... %s (%s), %s\n", $documentShipToLegalOrgId, $documentShipToLegalOrgType, $documentShipToLegalOrgName);
}

while ($reader->nextDocumentShipToContact()) {
    $reader->getDocumentShipToContact($documentShipToContactName, $documentShipToContactDepartmenrName, $documentShipToContactPhoneNumber, $documentShipToContactFaxNumber, $documentShipToContactEmailAddress);
    echo sprintf("ShipTo Contact ..... %s\n", $documentShipToContactName);
    echo sprintf("               ..... %s\n", $documentShipToContactDepartmenrName);
    echo sprintf("               ..... %s\n", $documentShipToContactPhoneNumber);
    echo sprintf("               ..... %s\n", $documentShipToContactFaxNumber);
    echo sprintf("               ..... %s\n", $documentShipToContactEmailAddress);
}

while ($reader->nextDocumentShipToCommunication()) {
    $reader->getDocumentShipToCommunication($documentShipToCommunicationType, $documentShipToCommunicationUri);
    echo sprintf("ShipTo Comm. ....... %s (%s)\n", $documentShipToCommunicationUri, $documentShipToCommunicationType);
}

#endregion

#region Ultimate Ship-To Output

echo "\n";
echo "Ultimate Ship-To Party\n";
echo "\n";

$reader->getDocumentUltimateShipToName($documentUltimateShipToName);
echo sprintf("UltimateShipTo Name ........ %s\n", $documentUltimateShipToName);

while ($reader->nextDocumentUltimateShipToId()) {
    $reader->getDocumentUltimateShipToId($documentUltimateShipToGlobalId);
    echo sprintf("UltimateShipTo ID .......... %s\n", $documentUltimateShipToGlobalId);
}

while ($reader->nextDocumentUltimateShipToGlobalId()) {
    $reader->getDocumentUltimateShipToGlobalId($documentUltimateShipToGlobalId, $documentUltimateShipToGlobalIdType);
    echo sprintf("UltimateShipTo Global ID ... %s (%s)\n", $documentUltimateShipToGlobalId, $documentUltimateShipToGlobalIdType);
}

while ($reader->nextDocumentUltimateShipToTaxRegistration()) {
    $reader->getDocumentUltimateShipToTaxRegistration($documentUltimateShipToTaxRegistrationType, $documentUltimateShipToTaxRegistrationId);
    echo sprintf("UltimateShipTo Tax Reg. .... %s (%s)\n", $documentUltimateShipToTaxRegistrationId, $documentUltimateShipToTaxRegistrationType);
}

while ($reader->nextDocumentUltimateShipToAddress()) {
    $reader->getDocumentUltimateShipToAddress($documentUltimateShipToAddressLine1, $documentUltimateShipToAddressLine2, $documentUltimateShipToAddressLine3, $documentUltimateShipToPostCode, $documentUltimateShipToCity, $documentUltimateShipToCountryId, $documentUltimateShipToSubDivision);
    echo sprintf("UltimateShipTo Address ..... %s\n", $documentUltimateShipToAddressLine1);
    echo sprintf("                       ..... %s\n", $documentUltimateShipToAddressLine2);
    echo sprintf("                       ..... %s\n", $documentUltimateShipToAddressLine3);
    echo sprintf("                       ..... %s %s %s\n", $documentUltimateShipToCountryId, $documentUltimateShipToPostCode, $documentUltimateShipToCity);
    echo sprintf("                       ..... %s\n", $documentUltimateShipToSubDivision);
}

while ($reader->nextDocumentUltimateShipToLegalOrganisation()) {
    $reader->getDocumentUltimateShipToLegalOrganisation($documentUltimateShipToLegalOrgType, $documentUltimateShipToLegalOrgId, $documentUltimateShipToLegalOrgName);
    echo sprintf("UltimateShipTo Legal ....... %s (%s), %s\n", $documentUltimateShipToLegalOrgId, $documentUltimateShipToLegalOrgType, $documentUltimateShipToLegalOrgName);
}

while ($reader->nextDocumentUltimateShipToContact()) {
    $reader->getDocumentUltimateShipToContact($documentUltimateShipToContactName, $documentUltimateShipToContactDepartmenrName, $documentUltimateShipToContactPhoneNumber, $documentUltimateShipToContactFaxNumber, $documentUltimateShipToContactEmailAddress);
    echo sprintf("UltimateShipTo Contact ..... %s\n", $documentUltimateShipToContactName);
    echo sprintf("                       ..... %s\n", $documentUltimateShipToContactDepartmenrName);
    echo sprintf("                       ..... %s\n", $documentUltimateShipToContactPhoneNumber);
    echo sprintf("                       ..... %s\n", $documentUltimateShipToContactFaxNumber);
    echo sprintf("                       ..... %s\n", $documentUltimateShipToContactEmailAddress);
}

while ($reader->nextDocumentUltimateShipToCommunication()) {
    $reader->getDocumentUltimateShipToCommunication($documentUltimateShipToCommunicationType, $documentUltimateShipToCommunicationUri);
    echo sprintf("UltimateShipTo Comm. ....... %s (%s)\n", $documentUltimateShipToCommunicationUri, $documentUltimateShipToCommunicationType);
}

#endregion

#region Ship-From Output

echo "\n";
echo "Ship-From Party\n";
echo "\n";

$reader->getDocumentShipFromName($documentShipFromName);
echo sprintf("Ship-From Name ........ %s\n", $documentShipFromName);

while ($reader->nextDocumentShipFromId()) {
    $reader->getDocumentShipFromId($documentShipFromGlobalId);
    echo sprintf("Ship-From ID .......... %s\n", $documentShipFromGlobalId);
}

while ($reader->nextDocumentShipFromGlobalId()) {
    $reader->getDocumentShipFromGlobalId($documentShipFromGlobalId, $documentShipFromGlobalIdType);
    echo sprintf("Ship-From Global ID ... %s (%s)\n", $documentShipFromGlobalId, $documentShipFromGlobalIdType);
}

while ($reader->nextDocumentShipFromTaxRegistration()) {
    $reader->getDocumentShipFromTaxRegistration($documentShipFromTaxRegistrationType, $documentShipFromTaxRegistrationId);
    echo sprintf("Ship-From Tax Reg. .... %s (%s)\n", $documentShipFromTaxRegistrationId, $documentShipFromTaxRegistrationType);
}

while ($reader->nextDocumentShipFromAddress()) {
    $reader->getDocumentShipFromAddress($documentShipFromAddressLine1, $documentShipFromAddressLine2, $documentShipFromAddressLine3, $documentShipFromPostCode, $documentShipFromCity, $documentShipFromCountryId, $documentShipFromSubDivision);
    echo sprintf("Ship-From Address ..... %s\n", $documentShipFromAddressLine1);
    echo sprintf("                  ..... %s\n", $documentShipFromAddressLine2);
    echo sprintf("                  ..... %s\n", $documentShipFromAddressLine3);
    echo sprintf("                  ..... %s %s %s\n", $documentShipFromCountryId, $documentShipFromPostCode, $documentShipFromCity);
    echo sprintf("                  ..... %s\n", $documentShipFromSubDivision);
}

while ($reader->nextDocumentShipFromLegalOrganisation()) {
    $reader->getDocumentShipFromLegalOrganisation($documentShipFromLegalOrgType, $documentShipFromLegalOrgId, $documentShipFromLegalOrgName);
    echo sprintf("Ship-From Legal ....... %s (%s), %s\n", $documentShipFromLegalOrgId, $documentShipFromLegalOrgType, $documentShipFromLegalOrgName);
}

while ($reader->nextDocumentShipFromContact()) {
    $reader->getDocumentShipFromContact($documentShipFromContactName, $documentShipFromContactDepartmenrName, $documentShipFromContactPhoneNumber, $documentShipFromContactFaxNumber, $documentShipFromContactEmailAddress);
    echo sprintf("Ship-From Contact ..... %s\n", $documentShipFromContactName);
    echo sprintf("                  ..... %s\n", $documentShipFromContactDepartmenrName);
    echo sprintf("                  ..... %s\n", $documentShipFromContactPhoneNumber);
    echo sprintf("                  ..... %s\n", $documentShipFromContactFaxNumber);
    echo sprintf("                  ..... %s\n", $documentShipFromContactEmailAddress);
}

while ($reader->nextDocumentShipFromCommunication()) {
    $reader->getDocumentShipFromCommunication($documentShipFromCommunicationType, $documentShipFromCommunicationUri);
    echo sprintf("Ship-From Comm. ....... %s (%s)\n", $documentShipFromCommunicationUri, $documentShipFromCommunicationType);
}

#endregion

#region Invoicer Output

echo "\n";
echo "Invoicer Party\n";
echo "\n";

$reader->getDocumentInvoicerName($documentInvoicerName);
echo sprintf("Invoicer Name ........ %s\n", $documentInvoicerName);

while ($reader->nextDocumentInvoicerId()) {
    $reader->getDocumentInvoicerId($documentInvoicerGlobalId);
    echo sprintf("Invoicer ID .......... %s\n", $documentInvoicerGlobalId);
}

while ($reader->nextDocumentInvoicerGlobalId()) {
    $reader->getDocumentInvoicerGlobalId($documentInvoicerGlobalId, $documentInvoicerGlobalIdType);
    echo sprintf("Invoicer Global ID ... %s (%s)\n", $documentInvoicerGlobalId, $documentInvoicerGlobalIdType);
}

while ($reader->nextDocumentInvoicerTaxRegistration()) {
    $reader->getDocumentInvoicerTaxRegistration($documentInvoicerTaxRegistrationType, $documentInvoicerTaxRegistrationId);
    echo sprintf("Invoicer Tax Reg. .... %s (%s)\n", $documentInvoicerTaxRegistrationId, $documentInvoicerTaxRegistrationType);
}

while ($reader->nextDocumentInvoicerAddress()) {
    $reader->getDocumentInvoicerAddress($documentInvoicerAddressLine1, $documentInvoicerAddressLine2, $documentInvoicerAddressLine3, $documentInvoicerPostCode, $documentInvoicerCity, $documentInvoicerCountryId, $documentInvoicerSubDivision);
    echo sprintf("Invoicer Address ..... %s\n", $documentInvoicerAddressLine1);
    echo sprintf("                 ..... %s\n", $documentInvoicerAddressLine2);
    echo sprintf("                 ..... %s\n", $documentInvoicerAddressLine3);
    echo sprintf("                 ..... %s %s %s\n", $documentInvoicerCountryId, $documentInvoicerPostCode, $documentInvoicerCity);
    echo sprintf("                 ..... %s\n", $documentInvoicerSubDivision);
}

while ($reader->nextDocumentInvoicerLegalOrganisation()) {
    $reader->getDocumentInvoicerLegalOrganisation($documentInvoicerLegalOrgType, $documentInvoicerLegalOrgId, $documentInvoicerLegalOrgName);
    echo sprintf("Invoicer Legal ....... %s (%s), %s\n", $documentInvoicerLegalOrgId, $documentInvoicerLegalOrgType, $documentInvoicerLegalOrgName);
}

while ($reader->nextDocumentInvoicerContact()) {
    $reader->getDocumentInvoicerContact($documentInvoicerContactName, $documentInvoicerContactDepartmenrName, $documentInvoicerContactPhoneNumber, $documentInvoicerContactFaxNumber, $documentInvoicerContactEmailAddress);
    echo sprintf("Invoicer Contact ..... %s\n", $documentInvoicerContactName);
    echo sprintf("                 ..... %s\n", $documentInvoicerContactDepartmenrName);
    echo sprintf("                 ..... %s\n", $documentInvoicerContactPhoneNumber);
    echo sprintf("                 ..... %s\n", $documentInvoicerContactFaxNumber);
    echo sprintf("                 ..... %s\n", $documentInvoicerContactEmailAddress);
}

while ($reader->nextDocumentInvoicerCommunication()) {
    $reader->getDocumentInvoicerCommunication($documentInvoicerCommunicationType, $documentInvoicerCommunicationUri);
    echo sprintf("Invoicer Comm. ....... %s (%s)\n", $documentInvoicerCommunicationUri, $documentInvoicerCommunicationType);
}

#endregion

#region Invoicee Output

echo "\n";
echo "Invoicee Party\n";
echo "\n";

$reader->getDocumentInvoiceeName($documentInvoiceeName);
echo sprintf("Invoicee Name ........ %s\n", $documentInvoiceeName);

while ($reader->nextDocumentInvoiceeId()) {
    $reader->getDocumentInvoiceeId($documentInvoiceeGlobalId);
    echo sprintf("Invoicee ID .......... %s\n", $documentInvoiceeGlobalId);
}

while ($reader->nextDocumentInvoiceeGlobalId()) {
    $reader->getDocumentInvoiceeGlobalId($documentInvoiceeGlobalId, $documentInvoiceeGlobalIdType);
    echo sprintf("Invoicee Global ID ... %s (%s)\n", $documentInvoiceeGlobalId, $documentInvoiceeGlobalIdType);
}

while ($reader->nextDocumentInvoiceeTaxRegistration()) {
    $reader->getDocumentInvoiceeTaxRegistration($documentInvoiceeTaxRegistrationType, $documentInvoiceeTaxRegistrationId);
    echo sprintf("Invoicee Tax Reg. .... %s (%s)\n", $documentInvoiceeTaxRegistrationId, $documentInvoiceeTaxRegistrationType);
}

while ($reader->nextDocumentInvoiceeAddress()) {
    $reader->getDocumentInvoiceeAddress($documentInvoiceeAddressLine1, $documentInvoiceeAddressLine2, $documentInvoiceeAddressLine3, $documentInvoiceePostCode, $documentInvoiceeCity, $documentInvoiceeCountryId, $documentInvoiceeSubDivision);
    echo sprintf("Invoicee Address ..... %s\n", $documentInvoiceeAddressLine1);
    echo sprintf("                 ..... %s\n", $documentInvoiceeAddressLine2);
    echo sprintf("                 ..... %s\n", $documentInvoiceeAddressLine3);
    echo sprintf("                 ..... %s %s %s\n", $documentInvoiceeCountryId, $documentInvoiceePostCode, $documentInvoiceeCity);
    echo sprintf("                 ..... %s\n", $documentInvoiceeSubDivision);
}

while ($reader->nextDocumentInvoiceeLegalOrganisation()) {
    $reader->getDocumentInvoiceeLegalOrganisation($documentInvoiceeLegalOrgType, $documentInvoiceeLegalOrgId, $documentInvoiceeLegalOrgName);
    echo sprintf("Invoicee Legal ....... %s (%s), %s\n", $documentInvoiceeLegalOrgId, $documentInvoiceeLegalOrgType, $documentInvoiceeLegalOrgName);
}

while ($reader->nextDocumentInvoiceeContact()) {
    $reader->getDocumentInvoiceeContact($documentInvoiceeContactName, $documentInvoiceeContactDepartmenrName, $documentInvoiceeContactPhoneNumber, $documentInvoiceeContactFaxNumber, $documentInvoiceeContactEmailAddress);
    echo sprintf("Invoicee Contact ..... %s\n", $documentInvoiceeContactName);
    echo sprintf("                 ..... %s\n", $documentInvoiceeContactDepartmenrName);
    echo sprintf("                 ..... %s\n", $documentInvoiceeContactPhoneNumber);
    echo sprintf("                 ..... %s\n", $documentInvoiceeContactFaxNumber);
    echo sprintf("                 ..... %s\n", $documentInvoiceeContactEmailAddress);
}

while ($reader->nextDocumentInvoiceeCommunication()) {
    $reader->getDocumentInvoiceeCommunication($documentInvoiceeCommunicationType, $documentInvoiceeCommunicationUri);
    echo sprintf("Invoicee Comm. ....... %s (%s)\n", $documentInvoiceeCommunicationUri, $documentInvoiceeCommunicationType);
}

#endregion

#region Payee Output

echo "\n";
echo "Payee Party\n";
echo "\n";

$reader->getDocumentPayeeName($documentPayeeName);
echo sprintf("Payee Name ........ %s\n", $documentPayeeName);

while ($reader->nextDocumentPayeeId()) {
    $reader->getDocumentPayeeId($documentPayeeGlobalId);
    echo sprintf("Payee ID .......... %s\n", $documentPayeeGlobalId);
}

while ($reader->nextDocumentPayeeGlobalId()) {
    $reader->getDocumentPayeeGlobalId($documentPayeeGlobalId, $documentPayeeGlobalIdType);
    echo sprintf("Payee Global ID ... %s (%s)\n", $documentPayeeGlobalId, $documentPayeeGlobalIdType);
}

while ($reader->nextDocumentPayeeTaxRegistration()) {
    $reader->getDocumentPayeeTaxRegistration($documentPayeeTaxRegistrationType, $documentPayeeTaxRegistrationId);
    echo sprintf("Payee Tax Reg. .... %s (%s)\n", $documentPayeeTaxRegistrationId, $documentPayeeTaxRegistrationType);
}

while ($reader->nextDocumentPayeeAddress()) {
    $reader->getDocumentPayeeAddress($documentPayeeAddressLine1, $documentPayeeAddressLine2, $documentPayeeAddressLine3, $documentPayeePostCode, $documentPayeeCity, $documentPayeeCountryId, $documentPayeeSubDivision);
    echo sprintf("Payee Address ..... %s\n", $documentPayeeAddressLine1);
    echo sprintf("              ..... %s\n", $documentPayeeAddressLine2);
    echo sprintf("              ..... %s\n", $documentPayeeAddressLine3);
    echo sprintf("              ..... %s %s %s\n", $documentPayeeCountryId, $documentPayeePostCode, $documentPayeeCity);
    echo sprintf("              ..... %s\n", $documentPayeeSubDivision);
}

while ($reader->nextDocumentPayeeLegalOrganisation()) {
    $reader->getDocumentPayeeLegalOrganisation($documentPayeeLegalOrgType, $documentPayeeLegalOrgId, $documentPayeeLegalOrgName);
    echo sprintf("Payee Legal ....... %s (%s), %s\n", $documentPayeeLegalOrgId, $documentPayeeLegalOrgType, $documentPayeeLegalOrgName);
}

while ($reader->nextDocumentPayeeContact()) {
    $reader->getDocumentPayeeContact($documentPayeeContactName, $documentPayeeContactDepartmenrName, $documentPayeeContactPhoneNumber, $documentPayeeContactFaxNumber, $documentPayeeContactEmailAddress);
    echo sprintf("Payee Contact ..... %s\n", $documentPayeeContactName);
    echo sprintf("              ..... %s\n", $documentPayeeContactDepartmenrName);
    echo sprintf("              ..... %s\n", $documentPayeeContactPhoneNumber);
    echo sprintf("              ..... %s\n", $documentPayeeContactFaxNumber);
    echo sprintf("              ..... %s\n", $documentPayeeContactEmailAddress);
}

while ($reader->nextDocumentPayeeCommunication()) {
    $reader->getDocumentPayeeCommunication($documentPayeeCommunicationType, $documentPayeeCommunicationUri);
    echo sprintf("Payee Comm. ....... %s (%s)\n", $documentPayeeCommunicationUri, $documentPayeeCommunicationType);
}

#endregion

#region Payment Mean Output

echo "\n";
echo "Payments Means\n";
echo "\n";

while ($reader->nextDocumentPaymentMean()) {
    $reader->getDocumentPaymentMean(
        $paymentMeanTypeCode,
        $paymentMeanName,
        $paymentMeanFinancialCardId,
        $paymentMeanFinancialCardHolder,
        $paymentMeanBuyerIban,
        $paymentMeanPayeeIban,
        $paymentMeanPayeeAccountName,
        $paymentMeanPayeeProprietaryId,
        $paymentMeanPayeeBic,
        $paymentMeanPaymentReference,
        $paymentMeanMandate
    );

    echo "Type ..................... $paymentMeanTypeCode\n";
    echo "Name ..................... $paymentMeanName\n";
    echo "Financial Card ID ........ $paymentMeanFinancialCardId\n";
    echo "Financial Card Holder .... $paymentMeanFinancialCardHolder\n";
    echo "Buyer IBAN ............... $paymentMeanBuyerIban\n";
    echo "Payee IBAN ............... $paymentMeanPayeeIban\n";
    echo "Payee Account Name ....... $paymentMeanPayeeAccountName\n";
    echo "Payee Prop. ID ........... $paymentMeanPayeeProprietaryId\n";
    echo "Payee BIC ................ $paymentMeanPayeeBic\n";
    echo "Payment Reference ........ $paymentMeanPaymentReference\n";
    echo "Payment Mandate .......... $paymentMeanMandate\n";
    echo "\n";
}

#endregion

#region Payment Creditor References Output

echo "\n";
echo "Creditor References\n";
echo "\n";

while ($reader->nextDocumentPaymentCreditorReferenceID()) {
    $reader->getDocumentPaymentCreditorReferenceID($paymentCreditorReferenceId);
    echo $paymentCreditorReferenceId . "\n";
}

#endregion

#region Payment Terms Output

echo "\n";
echo "Payments Terms\n";
echo "\n";

while ($reader->nextDocumentPaymentTerm()) {
    $reader->getDocumentPaymentTerm($paymentTermDescription, $paymentTermDueDate);
    echo sprintf("%s, %s\n", $paymentTermDescription, $paymentTermDueDate?->format("d.m.Y") ?? "");

    echo sprintf("  DiscountTerm\n");

    while ($reader->nextDocumentPaymentDiscountTermsInLastPaymentTerm()) {
        $reader->getDocumentPaymentDiscountTermsInLastPaymentTerm(
            $baseAmount,
            $discountAmount,
            $discountpercent,
            $baseDate,
            $baseperiod,
            $baseperiodUnnit
        );

        echo sprintf("  DiscountTerm Base Amount ....... %s\n", $baseAmount);
        echo sprintf("  DiscountTerm Discount Amount ... %s\n", $discountAmount);
        echo sprintf("  DiscountTerm Discount Percent .. %s\n", $discountpercent);
        echo sprintf("  DiscountTerm Base Date ......... %s\n", $baseDate?->format("d.m.Y") ?? "");
        echo sprintf("  DiscountTerm Period ............ %s\n", $baseperiod);
        echo sprintf("  DiscountTerm Period Unit ....... %s\n", $baseperiodUnnit);
    }

    echo sprintf("  PenaltyTerm\n");

    while ($reader->nextDocumentPaymentPenaltyTermsInLastPaymentTerm()) {
        $reader->getDocumentPaymentPenaltyTermsInLastPaymentTerm(
            $baseAmount,
            $penaltyAmount,
            $penaltypercent,
            $baseDate,
            $baseperiod,
            $baseperiodUnnit
        );

        echo sprintf("  PenaltyTerm Base Amount ....... %s\n", $baseAmount);
        echo sprintf("  PenaltyTerm Penalty Amount ... %s\n", $penaltyAmount);
        echo sprintf("  PenaltyTerm Penalty Percent .. %s\n", $penaltypercent);
        echo sprintf("  PenaltyTerm Base Date ......... %s\n", $baseDate?->format("d.m.Y") ?? "");
        echo sprintf("  PenaltyTerm Period ............ %s\n", $baseperiod);
        echo sprintf("  PenaltyTerm Period Unit ....... %s\n", $baseperiodUnnit);
    };
}

#endregion

#region Document Taxes Output

echo "\n";
echo "Document Taxes\n";
echo "\n";

while ($reader->nextDocumentTax()) {
    $reader->getDocumentTax($taxCategory, $taxType, $taxBasisAmount, $taxAmount, $taxPercent, $taxExcemptionReson, $taxExcemptionResonCode, $taxDueDate, $taxDueCode);
    echo " - Tax\n";
    echo sprintf("   Category .............. %s\n", $taxCategory);
    echo sprintf("   Type .................. %s\n", $taxType);
    echo sprintf("   Basis Amount .......... %s\n", $taxBasisAmount);
    echo sprintf("   Tax Amount ............ %s\n", $taxAmount);
    echo sprintf("   Tax Percent ........... %s\n", $taxPercent);
    echo sprintf("   Excemption Reason ....  %s\n", $taxExcemptionReson);
    echo sprintf("   Excemption Reason Code  %s\n", $taxExcemptionResonCode);
    echo sprintf("   Tax Due Date .........  %s\n", $taxDueDate?->format("d.m.y") ?? "");
    echo sprintf("   Tax Due Code .........  %s\n", $taxDueCode);
}

#endregion

#region Document Allowance Charges Output

echo "\n";
echo "Document Allowances/Charges\n";
echo "\n";

while ($reader->nextDocumentAllowanceCharge()) {
    $reader->getDocumentAllowanceCharge(
        $allowanceChargeindicator,
        $allowanceChargeAmount,
        $allowanceChargeBaseAmount,
        $allowanceChargeTaxCategory,
        $allowanceChargeTaxType,
        $allowanceChargeTaxPercent,
        $allowanceChargeReason,
        $allowanceChargeReasonCode,
        $allowanceChargePercent
    );
    echo " - Allowance/Charge\n";
    echo sprintf("   Is Charge ............. %s\n", $allowanceChargeindicator === true ? "Yes" : "No");
    echo sprintf("   Amount ................ %s\n", $allowanceChargeAmount);
    echo sprintf("   Basis Amount .......... %s\n", $allowanceChargeBaseAmount);
    echo sprintf("   Tax Category .......... %s\n", $allowanceChargeTaxCategory);
    echo sprintf("   Tax Type .............. %s\n", $allowanceChargeTaxType);
    echo sprintf("   Tax Percent ........... %s\n", $allowanceChargeTaxPercent);
    echo sprintf("   Reason ................ %s\n", $allowanceChargeReason);
    echo sprintf("   Reason Code ........... %s\n", $allowanceChargeReasonCode);
    echo sprintf("   Percentage ............ %s\n", $allowanceChargePercent);
}

echo "\n";
echo "DOcument Logistic Service Charges\n";
echo "\n";

while ($reader->nextDocumentLogisticServiceCharge()) {
    $reader->getDocumentLogisticServiceCharge(
        $logisticServiceChargeAmount,
        $logisticServiceChargeDescription,
        $logisticServiceChargeTaxCategory,
        $logisticServiceChargeTaxType,
        $logisticServiceChargeTaxPercent
    );
    echo " - Logistic Service Charge\n";
    echo sprintf("   Amount ................ %s\n", $logisticServiceChargeAmount);
    echo sprintf("   Description ........... %s\n", $logisticServiceChargeDescription);
    echo sprintf("   Tax Category .......... %s\n", $logisticServiceChargeTaxCategory);
    echo sprintf("   Tax Type .............. %s\n", $logisticServiceChargeTaxType);
    echo sprintf("   Tax Percent ........... %s\n", $logisticServiceChargeTaxPercent);
}

#endregion

#region Document Totals

echo "\n";
echo "Document Totals\n";
echo "\n";

$reader->getDocumentSummation(
    $documentNetAmount,
    $documentChargeTotalAmount,
    $documentDiscountTotalAmount,
    $documentTaxBasisAmount,
    $documentTaxTotalAmount,
    $documentTaxTotalAmount2,
    $documentGrossAmount,
    $documentDueAmount,
    $documentPrepaidAmount,
    $documentRoungingAmount
);

echo sprintf("Net Amount ................ %s\n", $documentNetAmount);
echo sprintf("Charge Total Amount ....... %s\n", $documentChargeTotalAmount);
echo sprintf("Discount Total Amount ..... %s\n", $documentDiscountTotalAmount);
echo sprintf("Tax Basis Amount .......... %s\n", $documentTaxBasisAmount);
echo sprintf("Tax Total Amount 1 ........ %s\n", $documentTaxTotalAmount);
echo sprintf("Tax Total Amount 2 ........ %s\n", $documentTaxTotalAmount2);
echo sprintf("Gross Amount .............. %s\n", $documentGrossAmount);
echo sprintf("Due Amount ................ %s\n", $documentDueAmount);
echo sprintf("Prepaid Amount ............ %s\n", $documentPrepaidAmount);
echo sprintf("Rounding Amount ........... %s\n", $documentRoungingAmount);

#endregion

#region Document Positions

echo "\n";
echo "Document Positions\n";
echo "\n";

while ($reader->nextDocumentPosition()) {
    $reader->getDocumentPosition($positionLineNumber, $positionParentLineNumber, $positionStatusCode, $positionStatusReasonCode);
    echo sprintf("Line Number: %s, Parent Line Number: %s, StatusCode: %s, ReasonCode: %s\n", $positionLineNumber, $positionParentLineNumber, $positionStatusCode, $positionStatusReasonCode);

    while ($reader->nextDocumentPositionNote()) {
        $reader->getDocumentPositionNote($positionNoteContent, $positionNoteContentCode, $positionNoteSubjectCode);
        echo sprintf(" - Note: %s (%s, %s)\n", $positionNoteContent, $positionNoteContentCode, $positionNoteSubjectCode);
    }

    $reader->getDocumentPositionProductDetails(
        $positionProductId,
        $positionProductName,
        $positionProductDescription,
        $positionProductSellerId,
        $positionProductBuyerId,
        $positionProductGlobalId,
        $positionProductGlobalIdType,
        $positionProductIndustryId,
        $positionProductModelId,
        $positionProductBatchId,
        $positionProductBrandName,
        $positionProductModelName,
        $positionProductOriginTradeCountry
    );

    echo " - Product:\n";
    echo sprintf("   Product ID .............. %s\n", $positionProductId);
    echo sprintf("   Product Name ............ %s\n", $positionProductName);
    echo sprintf("   Product Description ..... %s\n", $positionProductDescription);
    echo sprintf("   Product Seller ID ....... %s\n", $positionProductSellerId);
    echo sprintf("   Product Buyer ID ........ %s\n", $positionProductBuyerId);
    echo sprintf("   Product Global ID ....... %s (%s)\n", $positionProductGlobalId, $positionProductGlobalIdType);
    echo sprintf("   Product Industy ID ...... %s\n", $positionProductIndustryId);
    echo sprintf("   Product Model ID ........ %s\n", $positionProductModelId);
    echo sprintf("   Product Batch ID ........ %s\n", $positionProductBatchId);
    echo sprintf("   Product Brandname ....... %s\n", $positionProductBrandName);
    echo sprintf("   Product Modelname ....... %s\n", $positionProductModelName);
    echo sprintf("   Product Country ......... %s\n", $positionProductOriginTradeCountry);

    echo " - Product Characteristics:\n";

    while ($reader->nextDocumentPositionProductCharacteristic()) {
        $reader->getDocumentPositionProductCharacteristic(
            $positionProductCharacteristicDescription,
            $positionProductCharacteristicValue,
            $positionProductCharacteristicType,
            $positionProductCharacteristicQtyValue,
            $positionProductCharacteristicQtyValueUnit
        );
        echo "    - Product Characteristic:\n";
        echo sprintf("      Description ........... %s\n", $positionProductCharacteristicDescription);
        echo sprintf("      Value ................. %s\n", $positionProductCharacteristicValue);
        echo sprintf("      Type Code ............. %s\n", $positionProductCharacteristicType);
        echo sprintf("      Quantity ....-......... %s %s\n", $positionProductCharacteristicQtyValue, $positionProductCharacteristicQtyValueUnit);
    }

    echo " - Product Classifications:\n";

    while ($reader->nextDocumentPositionProductClassification()) {
        $reader->getDocumentPositionProductClassification(
            $positionProductClassificationCode,
            $positionProductClassificationListId,
            $positionProductClassificationListVersionId,
            $positionProductClassificationClassname,
        );

        echo "    - Product Characteristic:\n";
        echo sprintf("      Code .................. %s\n", $positionProductClassificationCode);
        echo sprintf("      List ID ............... %s\n", $positionProductClassificationListId);
        echo sprintf("      List Version ID ....... %s\n", $positionProductClassificationListVersionId);
        echo sprintf("      Classname ............. %s\n", $positionProductClassificationClassname);
    }

    echo " - Product Referenced Product:\n";

    while ($reader->nextDocumentPositionReferencedProduct()) {
        $reader->getDocumentPositionReferencedProduct(
            $positionReferencedProductId,
            $positionReferencedProductName,
            $positionReferencedProductDescription,
            $positionReferencedProductSellerId,
            $positionReferencedProductBuyerId,
            $positionReferencedProductGlobalId,
            $positionReferencedProductGlobalIdType,
            $positionReferencedProductIndustryId,
            $positionReferencedProductUnitQuantity,
            $positionReferencedProductUnitQuantityUnit
        );

        echo "    - Referenced Product:\n";
        echo sprintf("      ID .................... %s\n", $positionReferencedProductId);
        echo sprintf("      Name .................. %s\n", $positionReferencedProductName);
        echo sprintf("      Description ........... %s\n", $positionReferencedProductDescription);
        echo sprintf("      Seller ID ............. %s\n", $positionReferencedProductSellerId);
        echo sprintf("      Buyer ID .............. %s\n", $positionReferencedProductBuyerId);
        echo sprintf("      Global ID ............. %s (%s)\n", $positionReferencedProductGlobalId, $positionReferencedProductGlobalIdType);
        echo sprintf("      Industry ID ........... %s\n", $positionReferencedProductIndustryId);
        echo sprintf("      Unit Quantity ......... %s %s\n", $positionReferencedProductUnitQuantity, $positionReferencedProductUnitQuantityUnit);
    }

    echo " - Seller Order Line References:\n";

    while ($reader->nextDocumentPositionSellerOrderReference()) {
        $reader->getDocumentPositionSellerOrderReference(
            $positionSellerOrderReferenceId,
            $positionSellerOrderReferenceLineId,
            $positionSellerOrderReferenceDate
        );

        echo "    - Seller Order Line Referencet:\n";
        echo sprintf("      ID .................... %s\n", $positionSellerOrderReferenceId);
        echo sprintf("      Line ID ............... %s\n", $positionSellerOrderReferenceLineId);
        echo sprintf("      Date .................. %s\n", $positionSellerOrderReferenceDate?->format("d.m.Y") ?? "");
    }

    echo " - Buyer Order Line References:\n";

    while ($reader->nextDocumentPositionBuyerOrderReference()) {
        $reader->getDocumentPositionBuyerOrderReference(
            $positionBuyerOrderReferenceId,
            $positionBuyerOrderReferenceLineId,
            $positionBuyerOrderReferenceDate
        );

        echo "    - Buyer Order Line Referencet:\n";
        echo sprintf("      ID .................... %s\n", $positionBuyerOrderReferenceId);
        echo sprintf("      Line ID ............... %s\n", $positionBuyerOrderReferenceLineId);
        echo sprintf("      Date .................. %s\n", $positionBuyerOrderReferenceDate?->format("d.m.Y") ?? "");
    }

    echo " - Quotation Line References:\n";

    while ($reader->nextDocumentPositionQuotationReference()) {
        $reader->getDocumentPositionQuotationReference(
            $positionQuotationReferenceId,
            $positionQuotationReferenceLineId,
            $positionQuotationReferenceDate
        );

        echo "    - Quotation Line Referencet:\n";
        echo sprintf("      ID .................... %s\n", $positionQuotationReferenceId);
        echo sprintf("      Line ID ............... %s\n", $positionQuotationReferenceLineId);
        echo sprintf("      Date .................. %s\n", $positionQuotationReferenceDate?->format("d.m.Y") ?? "");
    }

    echo " - Contract Line References:\n";

    while ($reader->nextDocumentPositionContractReference()) {
        $reader->getDocumentPositionContractReference(
            $positionContractReferenceId,
            $positionContractReferenceLineId,
            $positionContractReferenceDate
        );

        echo "    - Contract Line Referencet:\n";
        echo sprintf("      ID .................... %s\n", $positionContractReferenceId);
        echo sprintf("      Line ID ............... %s\n", $positionContractReferenceLineId);
        echo sprintf("      Date .................. %s\n", $positionContractReferenceDate?->format("d.m.Y") ?? "");
    }

    echo " - Additional Line References:\n";

    while ($reader->nextDocumentPositionAdditionalReference()) {
        $reader->getDocumentPositionAdditionalReference(
            $positionAdditionalReferenceId,
            $positionAdditionalReferenceLineId,
            $positionAdditionalReferenceDate,
            $positionAdditionalReferenceTypeCode,
            $positionAdditionalReferenceReferenceTypeCode,
            $positionAdditionalReferenceDescription,
            $positionAdditionalReferenceAttchment
        );

        echo "    - Additional Line Referencet:\n";
        echo sprintf("      ID .................... %s\n", $positionAdditionalReferenceId);
        echo sprintf("      Line ID ............... %s\n", $positionAdditionalReferenceLineId);
        echo sprintf("      Date .................. %s\n", $positionAdditionalReferenceDate?->format("d.m.Y") ?? "");
    }

    echo " - UltimateCustomerOrder Line References:\n";

    while ($reader->nextDocumentPositionUltimateCustomerOrderReference()) {
        $reader->getDocumentPositionUltimateCustomerOrderReference(
            $positionUltimateCustomerOrderReferenceId,
            $positionUltimateCustomerOrderReferenceLineId,
            $positionUltimateCustomerOrderReferenceDate
        );

        echo "    - UltimateCustomerOrder Line Referencet:\n";
        echo sprintf("      ID .................... %s\n", $positionUltimateCustomerOrderReferenceId);
        echo sprintf("      Line ID ............... %s\n", $positionUltimateCustomerOrderReferenceLineId);
        echo sprintf("      Date .................. %s\n", $positionUltimateCustomerOrderReferenceDate?->format("d.m.Y") ?? "");
    }

    echo " - DespatchAdvice Line References:\n";

    while ($reader->nextDocumentPositionDespatchAdviceReference()) {
        $reader->getDocumentPositionDespatchAdviceReference(
            $positionDespatchAdviceReferenceId,
            $positionDespatchAdviceReferenceLineId,
            $positionDespatchAdviceReferenceDate
        );

        echo "    - DespatchAdvice Line Referencet:\n";
        echo sprintf("      ID .................... %s\n", $positionDespatchAdviceReferenceId);
        echo sprintf("      Line ID ............... %s\n", $positionDespatchAdviceReferenceLineId);
        echo sprintf("      Date .................. %s\n", $positionDespatchAdviceReferenceDate?->format("d.m.Y") ?? "");
    }

    echo " - ReceivingAdvice Line References:\n";

    while ($reader->nextDocumentPositionReceivingAdviceReference()) {
        $reader->getDocumentPositionReceivingAdviceReference(
            $positionReceivingAdviceReferenceId,
            $positionReceivingAdviceReferenceLineId,
            $positionReceivingAdviceReferenceDate
        );

        echo "    - ReceivingAdvice Line Referencet:\n";
        echo sprintf("      ID .................... %s\n", $positionReceivingAdviceReferenceId);
        echo sprintf("      Line ID ............... %s\n", $positionReceivingAdviceReferenceLineId);
        echo sprintf("      Date .................. %s\n", $positionReceivingAdviceReferenceDate?->format("d.m.Y") ?? "");
    }

    echo " - DeliveryNote Line References:\n";

    while ($reader->nextDocumentPositionDeliveryNoteReference()) {
        $reader->getDocumentPositionDeliveryNoteReference(
            $positionDeliveryNoteReferenceId,
            $positionDeliveryNoteReferenceLineId,
            $positionDeliveryNoteReferenceDate
        );

        echo "    - DeliveryNote Line Referencet:\n";
        echo sprintf("      ID .................... %s\n", $positionDeliveryNoteReferenceId);
        echo sprintf("      Line ID ............... %s\n", $positionDeliveryNoteReferenceLineId);
        echo sprintf("      Date .................. %s\n", $positionDeliveryNoteReferenceDate?->format("d.m.Y") ?? "");
    }

    echo " - Invoice Line References:\n";

    while ($reader->nextDocumentPositionInvoiceReference()) {
        $reader->getDocumentPositionInvoiceReference(
            $positionInvoiceReferenceId,
            $positionInvoiceReferenceLineId,
            $positionInvoiceReferenceDate,
            $positionInvoiceReferenceTypeCode
        );

        echo "    - Invoice Line Referencet:\n";
        echo sprintf("      ID .................... %s\n", $positionInvoiceReferenceId);
        echo sprintf("      Line ID ............... %s\n", $positionInvoiceReferenceLineId);
        echo sprintf("      Date .................. %s\n", $positionInvoiceReferenceDate?->format("d.m.Y") ?? "");
        echo sprintf("      Type Code ............. %s\n", $positionInvoiceReferenceTypeCode);
    }

    echo " - Position Gross Price:\n";

    $reader->getDocumentPositionGrossPrice($positionGrossPrice, $positionGrossPriceBaseQuantity, $positionGrossPriceBaseQuantityUnit);

    echo sprintf("    - Gross Price: ........... %s\n", $positionGrossPrice);
    echo sprintf("    - Base Quantity: ......... %s %s\n", $positionGrossPriceBaseQuantity, $positionGrossPriceBaseQuantityUnit);

    echo "    - Position Gross Price Allowances/Charges:\n";

    while ($reader->nextDocumentPositionGrossPriceAllowanceCharge()) {
        $reader->getDocumentPositionGrossPriceAllowanceCharge(
            $positionGrossPriceAllowanceChargeAmount,
            $positionGrossPriceAllowanceChargeIsCharge,
            $positionGrossPriceAllowanceChargePercent,
            $positionGrossPriceAllowanceChargeBasisAmount,
            $positionGrossPriceAllowanceChargeReason,
            $positionGrossPriceAllowanceChargeReasonCode
        );
        echo "      - Position Gross Price Allowances/Charge:\n";
        echo sprintf("        Charge Amount .......... %s:\n", $positionGrossPriceAllowanceChargeAmount);
        echo sprintf("        Is Charge .............. %s:\n", $positionGrossPriceAllowanceChargeIsCharge === true ? "Yes" : "Mo");
        echo sprintf("        Charge Percent ......... %s:\n", $positionGrossPriceAllowanceChargePercent);
        echo sprintf("        Basis Amount ........... %s:\n", $positionGrossPriceAllowanceChargeBasisAmount);
        echo sprintf("        Reason ................. %s:\n", $positionGrossPriceAllowanceChargeReason);
        echo sprintf("        Reason Code ............ %s:\n", $positionGrossPriceAllowanceChargeReasonCode);
    }

    echo " - Position Net Price:\n";

    $reader->getDocumentPositionNetPrice($positionNetPrice, $positionNetPriceBaseQuantity, $positionNetPriceBaseQuantityUnit);

    echo sprintf("    - Net Price .............. %s\n", $positionNetPrice);
    echo sprintf("    - Base Quantity: ......... %s %s\n", $positionNetPriceBaseQuantity, $positionNetPriceBaseQuantityUnit);

    echo " - Position Net Price Included Tax:\n";

    $reader->getDocumentPositionNetPriceTax(
        $positionNetPriceTaxCategory,
        $positionNetPriceTaxType,
        $positionNetPriceTaxAmount,
        $positionNetPriceTaxPercent,
        $positionNetPriceExemptionReason,
        $positionNetPriceExemptionReasonCode
    );

    echo sprintf("    - Tax Category ........... %s\n", $positionNetPriceTaxCategory);
    echo sprintf("    - Tax Type ............... %s\n", $positionNetPriceTaxType);
    echo sprintf("    - Tax Amount ............. %s\n", $positionNetPriceTaxAmount);
    echo sprintf("    - Tax Percent ............ %s\n", $positionNetPriceTaxPercent);
    echo sprintf("    - Tax Exception Reason ... %s\n", $positionNetPriceExemptionReason);
    echo sprintf("    - Tax Exception Reason C.. %s\n", $positionNetPriceExemptionReasonCode);

    echo " - Position Quantities:\n";

    $reader->getDocumentPositionQuantities(
        $positionQuantity,
        $positionQuantityUnit,
        $positionChargeFreeQuantity,
        $positionChargeFreeQuantityUnit,
        $positionPackageQuantity,
        $positionPackageQuantityUnit
    );

    echo sprintf("    - Invoiced Quantity ...... %s %s\n", $positionQuantity, $positionQuantityUnit);
    echo sprintf("    - Charge-Free Quantity ... %s %s\n", $positionChargeFreeQuantity, $positionChargeFreeQuantityUnit);
    echo sprintf("    - Package Quantity ....... %s %s\n", $positionPackageQuantity, $positionPackageQuantityUnit);

    echo "\n";
    echo " - Position Ship-To Party\n";
    echo "\n";

    $reader->getDocumentPositionShipToName($documentPositionShipToName);
    echo sprintf("   ShipTo Name ........ %s\n", $documentPositionShipToName);

    while ($reader->nextDocumentPositionShipToId()) {
        $reader->getDocumentPositionShipToId($documentPositionShipToGlobalId);
        echo sprintf("   ShipTo ID .......... %s\n", $documentPositionShipToGlobalId);
    }

    while ($reader->nextDocumentPositionShipToGlobalId()) {
        $reader->getDocumentPositionShipToGlobalId($documentPositionShipToGlobalId, $documentPositionShipToGlobalIdType);
        echo sprintf("   ShipTo Global ID ... %s (%s)\n", $documentPositionShipToGlobalId, $documentPositionShipToGlobalIdType);
    }

    while ($reader->nextDocumentPositionShipToTaxRegistration()) {
        $reader->getDocumentPositionShipToTaxRegistration($documentPositionShipToTaxRegistrationType, $documentPositionShipToTaxRegistrationId);
        echo sprintf("   ShipTo Tax Reg. .... %s (%s)\n", $documentPositionShipToTaxRegistrationId, $documentPositionShipToTaxRegistrationType);
    }

    while ($reader->nextDocumentPositionShipToAddress()) {
        $reader->getDocumentPositionShipToAddress($documentPositionShipToAddressLine1, $documentPositionShipToAddressLine2, $documentPositionShipToAddressLine3, $documentPositionShipToPostCode, $documentPositionShipToCity, $documentPositionShipToCountryId, $documentPositionShipToSubDivision);
        echo sprintf("   ShipTo Address ..... %s\n", $documentPositionShipToAddressLine1);
        echo sprintf("                  ..... %s\n", $documentPositionShipToAddressLine2);
        echo sprintf("                  ..... %s\n", $documentPositionShipToAddressLine3);
        echo sprintf("                  ..... %s %s %s\n", $documentPositionShipToCountryId, $documentPositionShipToPostCode, $documentPositionShipToCity);
        echo sprintf("                  ..... %s\n", $documentPositionShipToSubDivision);
    }

    while ($reader->nextDocumentPositionShipToLegalOrganisation()) {
        $reader->getDocumentPositionShipToLegalOrganisation($documentPositionShipToLegalOrgType, $documentPositionShipToLegalOrgId, $documentPositionShipToLegalOrgName);
        echo sprintf("   ShipTo Legal ....... %s (%s), %s\n", $documentPositionShipToLegalOrgId, $documentPositionShipToLegalOrgType, $documentPositionShipToLegalOrgName);
    }

    while ($reader->nextDocumentPositionShipToContact()) {
        $reader->getDocumentPositionShipToContact($documentPositionShipToContactName, $documentPositionShipToContactDepartmenrName, $documentPositionShipToContactPhoneNumber, $documentPositionShipToContactFaxNumber, $documentPositionShipToContactEmailAddress);
        echo sprintf("   ShipTo Contact ..... %s\n", $documentPositionShipToContactName);
        echo sprintf("                  ..... %s\n", $documentPositionShipToContactDepartmenrName);
        echo sprintf("                  ..... %s\n", $documentPositionShipToContactPhoneNumber);
        echo sprintf("                  ..... %s\n", $documentPositionShipToContactFaxNumber);
        echo sprintf("                  ..... %s\n", $documentPositionShipToContactEmailAddress);
    }

    while ($reader->nextDocumentPositionShipToCommunication()) {
        $reader->getDocumentPositionShipToCommunication($documentPositionShipToCommunicationType, $documentPositionShipToCommunicationUri);
        echo sprintf("   ShipTo Comm. ....... %s (%s)\n", $documentPositionShipToCommunicationUri, $documentPositionShipToCommunicationType);
    }

    echo "\n";
    echo " - Position Ultimate Ship-To Party\n";
    echo "\n";

    $reader->getDocumentPositionUltimateShipToName($documentPositionUltimateShipToName);
    echo sprintf("   UltimateShipTo Name ........ %s\n", $documentPositionUltimateShipToName);

    while ($reader->nextDocumentPositionUltimateShipToId()) {
        $reader->getDocumentPositionUltimateShipToId($documentPositionUltimateShipToGlobalId);
        echo sprintf("   UltimateShipTo ID .......... %s\n", $documentPositionUltimateShipToGlobalId);
    }

    while ($reader->nextDocumentPositionUltimateShipToGlobalId()) {
        $reader->getDocumentPositionUltimateShipToGlobalId($documentPositionUltimateShipToGlobalId, $documentPositionUltimateShipToGlobalIdType);
        echo sprintf("   UltimateShipTo Global ID ... %s (%s)\n", $documentPositionUltimateShipToGlobalId, $documentPositionUltimateShipToGlobalIdType);
    }

    while ($reader->nextDocumentPositionUltimateShipToTaxRegistration()) {
        $reader->getDocumentPositionUltimateShipToTaxRegistration($documentPositionUltimateShipToTaxRegistrationType, $documentPositionUltimateShipToTaxRegistrationId);
        echo sprintf("   UltimateShipTo Tax Reg. .... %s (%s)\n", $documentPositionUltimateShipToTaxRegistrationId, $documentPositionUltimateShipToTaxRegistrationType);
    }

    while ($reader->nextDocumentPositionUltimateShipToAddress()) {
        $reader->getDocumentPositionUltimateShipToAddress($documentPositionUltimateShipToAddressLine1, $documentPositionUltimateShipToAddressLine2, $documentPositionUltimateShipToAddressLine3, $documentPositionUltimateShipToPostCode, $documentPositionUltimateShipToCity, $documentPositionUltimateShipToCountryId, $documentPositionUltimateShipToSubDivision);
        echo sprintf("   UltimateShipTo Address ..... %s\n", $documentPositionUltimateShipToAddressLine1);
        echo sprintf("                          ..... %s\n", $documentPositionUltimateShipToAddressLine2);
        echo sprintf("                          ..... %s\n", $documentPositionUltimateShipToAddressLine3);
        echo sprintf("                          ..... %s %s %s\n", $documentPositionUltimateShipToCountryId, $documentPositionUltimateShipToPostCode, $documentPositionUltimateShipToCity);
        echo sprintf("                          ..... %s\n", $documentPositionUltimateShipToSubDivision);
    }

    while ($reader->nextDocumentPositionUltimateShipToLegalOrganisation()) {
        $reader->getDocumentPositionUltimateShipToLegalOrganisation($documentPositionUltimateShipToLegalOrgType, $documentPositionUltimateShipToLegalOrgId, $documentPositionUltimateShipToLegalOrgName);
        echo sprintf("   UltimateShipTo Legal ....... %s (%s), %s\n", $documentPositionUltimateShipToLegalOrgId, $documentPositionUltimateShipToLegalOrgType, $documentPositionUltimateShipToLegalOrgName);
    }

    while ($reader->nextDocumentPositionUltimateShipToContact()) {
        $reader->getDocumentPositionUltimateShipToContact($documentPositionUltimateShipToContactName, $documentPositionUltimateShipToContactDepartmenrName, $documentPositionUltimateShipToContactPhoneNumber, $documentPositionUltimateShipToContactFaxNumber, $documentPositionUltimateShipToContactEmailAddress);
        echo sprintf("   UltimateShipTo Contact ..... %s\n", $documentPositionUltimateShipToContactName);
        echo sprintf("                          ..... %s\n", $documentPositionUltimateShipToContactDepartmenrName);
        echo sprintf("                          ..... %s\n", $documentPositionUltimateShipToContactPhoneNumber);
        echo sprintf("                          ..... %s\n", $documentPositionUltimateShipToContactFaxNumber);
        echo sprintf("                          ..... %s\n", $documentPositionUltimateShipToContactEmailAddress);
    }

    while ($reader->nextDocumentPositionUltimateShipToCommunication()) {
        $reader->getDocumentPositionUltimateShipToCommunication($documentPositionUltimateShipToCommunicationType, $documentPositionUltimateShipToCommunicationUri);
        echo sprintf("   UltimateShipTo Comm. ....... %s (%s)\n", $documentPositionUltimateShipToCommunicationUri, $documentPositionUltimateShipToCommunicationType);
    }

    echo "\n";
    echo " - Position Supply Chain Event\n";
    echo "\n";

    $reader->getDocumentPositionSupplyChainEvent($positionSupplyChainEvent);
    echo sprintf("   Date of Event .............. %s\n", $positionSupplyChainEvent?->format("d.m.y") ?? "");

    echo "\n";
    echo " - Position Billing Period\n";
    echo "\n";

    while ($reader->nextDocumentPositionBillingPeriod()) {
        $reader->getDocumentPositionBillingPeriod($documentBillingPeriodStartDate, $documentBillingPeriodEndDate, $documentBillingPeriodDescription);
        echo sprintf("   %s - %s (%s)\n", $documentBillingPeriodStartDate?->format("d.m.Y") ?? "", $documentBillingPeriodEndDate?->format("d.m.Y") ?? "", $documentBillingPeriodDescription);
    }

    echo "\n";
    echo " - Position Tax\n";
    echo "\n";

    while ($reader->nextDocumentPositionTax()) {
        $reader->getDocumentPositionTax($positionTaxCategory, $positionTaxType, $positionTaxAmount, $positionTaxPercent, $positionTaxExcemptionReason, $positionTaxExcemptionReasonCode);
        echo sprintf("   - Tax:\n");
        echo sprintf("     Tax Category ........ %s\n", $positionTaxCategory);
        echo sprintf("     Tax Type ............ %s\n", $positionTaxType);
        echo sprintf("     Tax Amount .......... %s\n", $positionTaxAmount);
        echo sprintf("     Tax Percent ......... %s\n", $positionTaxPercent);
        echo sprintf("     Tax Exc. Reason ..... %s\n", $positionTaxExcemptionReason);
        echo sprintf("     Tax Exc. Reason Code  %s\n", $positionTaxExcemptionReasonCode);
    }

    echo "\n";
    echo " - Position Allowanced/Charges\n";
    echo "\n";

    while ($reader->nextDocumentPositionAllowanceCharge()) {
        $reader->getDocumentPositionAllowanceCharge($positionACIndicator, $positionACAmount, $positionACBaseAmount, $positionACReason, $positionACReasonCode, $positionACPercent);
        echo sprintf("   - Allowance/Charge:\n");
        echo sprintf("     Is Charge ........... %s\n", $positionACIndicator === true ? "Yes" : "No");
        echo sprintf("     Amount .............. %s\n", $positionACAmount);
        echo sprintf("     Base Amount ......... %s\n", $positionACBaseAmount);
        echo sprintf("     Percent ............. %s\n", $positionACPercent);
        echo sprintf("     Reason .............. %s\n", $positionACReason);
        echo sprintf("     Reason Code ......... %s\n", $positionACReasonCode);
    }

    echo "\n";
    echo " - Position Summation\n";
    echo "\n";

    $reader->getDocumentPositionSummation($positionNetAmount, $positionChargeTotalAmount, $positionDiscountTotalAmount, $positionTaxTotalAmount, $positionGrossAmount);

    echo sprintf("     Net Amount .......... %s\n", $positionNetAmount);
    echo sprintf("     Charge Total Amount . %s\n", $positionChargeTotalAmount);
    echo sprintf("     Disc. Total Amount .. %s\n", $positionDiscountTotalAmount);
    echo sprintf("     Tax Total Amount .... %s\n", $positionTaxTotalAmount);
    echo sprintf("     Gross Amount ........ %s\n", $positionGrossAmount);

    echo "\n";
    echo " - Position Posting References\n";
    echo "\n";

    while ($reader->nextDocumentPositionPostingReference()) {
        $reader->getDocumentPositionPostingReference($positionPostingReferenceType, $positionPostingReferenceAccountId);
        echo sprintf("   - Posting Reference:\n");
        echo sprintf("     Type ................ %s\n", $positionPostingReferenceType);
        echo sprintf("     Account ID .......... %s\n", $positionPostingReferenceAccountId);
    }
}

$reader->convertToDTO($dto);

var_dump($dto);

echo sprintf("\n%s\n", $reader->getCurrentDocumentFormatProvider()->getUniqueId());

#endregion
