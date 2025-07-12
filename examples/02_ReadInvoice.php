<?php

use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;

require __DIR__ . "/../vendor/autoload.php";

$readMode = 1; // 0 = UBL, 1 = ZF/FX

if ($readMode === 0) {
    $reader = InvoiceSuiteDocumentReader::createFromCFile(__DIR__ . "/01_SimpleInvoice_UBL.xml");
}
if ($readMode === 1) {
    $reader = InvoiceSuiteDocumentReader::createFromCFile(__DIR__ . "/01_SimpleInvoice.xml");
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

echo "Document Number ........ $documentNumber\n";
echo "Document Type .......... $documentType\n";
echo "Document Name .......... $documentDescription\n";
echo "Document Language ...... $documentLanguage\n";
echo "Document Date .......... " . $documentDate?->format("d.m.Y") . "\n";
echo "Document Compl. Date ... " . $documentCompleteDate?->format("d.m.Y") . "\n";
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

    if ($reader->firstDocumentPaymentDiscountTermsInLastPaymentTerm()) {
        echo sprintf("  DiscountTerm\n");
        do {
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
        } while ($reader->nextDocumentPaymentDiscountTermsInLastPaymentTerm());
    }
}

#endregion