<?php

/**
 * Build an elctronic invoice document in Factor-X/ZUGFeRD COMFORT profile using the InvoiceSuiteDocumentBuilder
 * by calling the builder methods separately
 */

use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistCurrencyCodes;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/00_ExampleHelpers.php';

// Instanciate a new document with a profile (in our case the profile is ZUGFeRD/Factor-X in COMFORT profile)

$documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('zffxcomfort');

// Set general invoice information

$documentBuilder->setDocumentNo('471102');
$documentBuilder->setDocumentType('380');
$documentBuilder->setDocumentDate(DateTime::createFromFormat('Ymd', '20241115'));
$documentBuilder->addDocumentNote('Rechnung gemäß Bestellung vom 01.11.2024.');
$documentBuilder->addDocumentNote("Lieferant GmbH\nLieferantenstraße 20\n80333 München\nDeutschland\nGeschäftsführer: Hans Muster\nHandelsregisternummer: H A 123\n", newSubjectCode: 'REG');
$documentBuilder->setDocumentCurrency(InvoiceSuiteCodelistCurrencyCodes::EURO->value);
$documentBuilder->setDocumentTaxCurrency(InvoiceSuiteCodelistCurrencyCodes::POUND_STERLING->value);

// Set the seller's (supplier's information) - this could be your company

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
$documentBuilder->addDocumentSellerContact('Hans Meier', '', '+49-800-1234567-0', '+49-800-1234567-1', 'hm@seller.de');
$documentBuilder->addDocumentSellerCommunication('EM', 'info@seller.de');

// Set the buyer's/customer's information - this could be your customer who's bought some goods from you

$documentBuilder->setDocumentBuyerId('GE2020211');
$documentBuilder->setDocumentBuyerName('Kunden AG Mitte');
$documentBuilder->setDocumentBuyerAddress(
    newPostcode: '69876',
    newAddressLine1: 'Kundenstraße 15',
    newCity: 'Frankfurt',
    newCountryId: 'DE'
);
$documentBuilder->addDocumentBuyerCommunication('EM', 'info@buyer.de');

// Set information about the actual delivery date

$documentBuilder->setDocumentSupplyChainEvent(DateTime::createFromFormat('Ymd', '20241114'));

// Set the reference issued by the the buyer/customer. For XRechnung (Germany only) this is the Leitweg ID

$documentBuilder->setDocumentBuyerReference('0814-4711');

// Set the single summarized taxes

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

// Set the terms of payment (as a textual information)

$documentBuilder->addDocumentPaymentTerm('Zahlbar innerhalb 30 Tagen netto bis 15.12.2024, 3% Skonto innerhalb 10 Tagen bis 25.11.2024');

// Set the information how the payment for this invoice is handled

$documentBuilder->setDocumentPaymentMean(
    newTypeCode: '59',
    newBuyerIban: 'DE02120300000000202051',
    newMandate: '287982197798127'
);

// Set information abount the unique bank account identifier for the payee or the seller, assigned by the payee’s or seller’s bank

$documentBuilder->setDocumentPaymentCreditorReferenceID('94467863782647362');

// Set information about invoice's document total amounts

$documentBuilder->setDocumentSummation(
    newNetAmount: 473.00,
    newChargeTotalAmount: 0.00,
    newDiscountTotalAmount: 0.00,
    newTaxBasisAmount: 473.00,
    newTaxTotalAmount: 56.87,
    newTaxTotalAmount2: 49.00,
    newGrossAmount: 529.87,
    newPrepaidAmount: 0.00,
    newDueAmount: 529.87
);

// Add first invoiced item/good/product

$documentBuilder->addDocumentPosition('1');

// Set the information about product details in the current position

$documentBuilder->setDocumentPositionProductDetails(
    newProductGlobalId: '4012345001235',
    newProductGlobalIdType: '0160',
    newProductSellerId: 'TB100A4',
    newProductName: 'Trennblätter A4'
);

// Set the unit price of the product excluding all charges/disacount

$documentBuilder->setDocumentPositionGrossPrice(9.9000);

// Set the unit price of the product including all charges/disacount

$documentBuilder->setDocumentPositionNetPrice(9.9000);

// Set the quantity of the product which is invoiced

$documentBuilder->setDocumentPositionQuantities(20.0000, 'H87');

// Set the tax percentage of the product

$documentBuilder->setDocumentPositionTax(
    newTaxCategory: 'S',
    newTaxType: 'VAT',
    newTaxPercent: 19.0
);

// Set the line total amount (excluding VAT) for the current position

$documentBuilder->setDocumentPositionSummation(198.00);

// Add a second invoiced item/good/product (see details above)

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

// Save the generated invoice document to a file

$documentBuilder->saveContentToFile(__DIR__ . '/01_SimpleInvoice.xml');
