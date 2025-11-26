<?php

use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistCurrencyCodes;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistDocumentTypes;
use horstoeko\invoicesuite\validators\documents\InvoiceSuiteKositDocumentValidator;

require __DIR__ . "/../vendor/autoload.php";

// Build document

$documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('zffxcomfort');
$documentBuilder->setDocumentNo('471102');
$documentBuilder->setDocumentType(InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE->value);
$documentBuilder->setDocumentDate(DateTime::createFromFormat('Ymd', '20241115'));
$documentBuilder->addDocumentNote('Rechnung gemäß Bestellung vom 01.11.2024.');
$documentBuilder->addDocumentNote("Lieferant GmbH\nLieferantenstraße 20\n80333 München\nDeutschland\nGeschäftsführer: Hans Muster\nHandelsregisternummer: H A 123\n", newSubjectCode: 'REG');
$documentBuilder->setDocumentCurrency(InvoiceSuiteCodelistCurrencyCodes::EURO->value);

$documentBuilder->addDocumentPosition('1');
$documentBuilder->setDocumentPositionProductDetails(
    newProductGlobalId: '4012345001235',
    newProductGlobalIdType: '0160',
    newProductSellerId: 'TB100A4',
    newProductName: 'Trennblätter A4'
);
$documentBuilder->setDocumentPositionGrossPrice(9.9000);
$documentBuilder->setDocumentPositionNetPrice(9.9000);
$documentBuilder->setDocumentPositionQuantities(20.0000, 'H87');
$documentBuilder->setDocumentPositionTax(
    newTaxCategory: 'S',
    newTaxType: 'VAT',
    newTaxPercent: 19.0
);
$documentBuilder->setDocumentPositionSummation(198.00);

$documentBuilder->addDocumentPosition('2');
$documentBuilder->setDocumentPositionProductDetails(
    newProductGlobalId: '4000050986428',
    newProductGlobalIdType: '0160',
    newProductSellerId: 'ARNR2',
    newProductName: 'Joghurt Banane'
);
$documentBuilder->setDocumentPositionGrossPrice(5.5000);
$documentBuilder->setDocumentPositionNetPrice(5.5000);
$documentBuilder->setDocumentPositionQuantities(50.0000, 'H87');
$documentBuilder->setDocumentPositionTax(
    newTaxCategory: 'S',
    newTaxType: 'VAT',
    newTaxPercent: 7.0
);
$documentBuilder->setDocumentPositionSummation(275.00);

$documentBuilder->setDocumentSellerId('549910');
$documentBuilder->setDocumentSellerGlobalId('4000001123452', '0088');
$documentBuilder->setDocumentSellerName('Lieferant GmbH');
$documentBuilder->setDocumentSellerAddress(
    newPostcode: '80333',
    newAddressLine1: 'Lieferantenstraße 20',
    newCity: 'München',
    newCountryId: 'DE'
);
$documentBuilder->addDocumentSellerTaxRegistration('FC', '201/113/40209');
$documentBuilder->addDocumentSellerTaxRegistration('VA', 'DE123456789');

$documentBuilder->setDocumentBuyerId('GE2020211');
$documentBuilder->setDocumentBuyerName('Kunden AG Mitte');
$documentBuilder->setDocumentBuyerAddress(
    newPostcode: '69876',
    newAddressLine1: 'Kundenstraße 15',
    newCity: 'Frankfurt',
    newCountryId: 'DE'
);

$documentBuilder->setDocumentSupplyChainEvent(DateTime::createFromFormat('Ymd', '20241114'));

$documentBuilder->addDocumentTax(
    newTaxAmount: 19.25,
    newTaxType: 'VAT',
    newBasisAmount: 275.00,
    newTaxCategory: 'S',
    newTaxPercent: 7.00
);
$documentBuilder->addDocumentTax(
    newTaxAmount: 37.62,
    newTaxType: 'VAT',
    newBasisAmount: 198.00,
    newTaxCategory: 'S',
    newTaxPercent: 19.00
);

$documentBuilder->addDocumentPaymentTerm('Zahlbar innerhalb 30 Tagen netto bis 15.12.2024, 3% Skonto innerhalb 10 Tagen bis 25.11.2024');

$documentBuilder->setDocumentSummation(
    newNetAmount: 473.00,
    newChargeTotalAmount: 0.00,
    newDiscountTotalAmount: 0.00,
    newTaxBasisAmount: 473.00,
    newTaxTotalAmount: 56.87,
    newGrossAmount: 529.87,
    newPrepaidAmount: 0.00,
    newDueAmount: 529.87
);

// Create (Remote-) Validator

$validator = InvoiceSuiteKositDocumentValidator::createFromDocumentBuilderAsXml($documentBuilder);
$validator->disableRemoteMode();
$validator->setRemoteModeHost('192.168.1.83');
$validator->setRemoteModePort(8081);
$validator->validate();

echo "Finished\n";
echo sprintf("HasErrorMessages .......... %s\n", $validator->hasErrorMessagesInMessageBag());
echo sprintf("HasWarningMessages ........ %s\n", $validator->hasWarningMessagesInMessageBag());
echo sprintf("HasLogMessages ............ %s\n", $validator->hasInfoMessagesInMessageBag());

foreach ($validator->getErrorMessagesInMessageBag() as $message)
{
    echo sprintf("  ....... %s\n", $message->getMessageContent());
}
