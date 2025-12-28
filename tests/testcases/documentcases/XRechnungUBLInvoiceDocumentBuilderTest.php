<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentcases;

use DateTime;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistCurrencyCodes;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistDocumentTypes;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteSettings;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

final class XRechnungUBLInvoiceDocumentBuilderTest extends TestCase
{
    use HandlesXmlTests;

    public static function setUpBeforeClass(): void
    {
        InvoiceSuiteSettings::setQuantityDecimals(4);
        InvoiceSuiteSettings::setUnitAmountDecimals(4);

        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublinvoice');
        static::$document->setDocumentNo('471102');
        static::$document->setDocumentType(InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE->value);
        static::$document->setDocumentDate(DateTime::createFromFormat('Ymd', '20241115'));
        static::$document->addDocumentNote('Rechnung gemäß Bestellung vom 01.11.2024.');
        static::$document->addDocumentNote("Lieferant GmbH\nLieferantenstraße 20\n80333 München\nDeutschland\nGeschäftsführer: Hans Muster\nHandelsregisternummer: H A 123\n", newSubjectCode: 'REG');
        static::$document->setDocumentCurrency(InvoiceSuiteCodelistCurrencyCodes::EURO->value);
        static::$document->setDocumentBuyerReference('SomeRef');
        static::$document->setDocumentDeliveryTerms('devtem');

        static::$document->addDocumentPosition('1');
        static::$document->setDocumentPositionProductDetails(
            newProductName: 'Trennblätter A4',
            newProductSellerId: 'TB100A4',
            newProductGlobalId: '4012345001235',
            newProductGlobalIdType: '0160'
        );
        static::$document->setDocumentPositionGrossPrice(9.9000);
        static::$document->setDocumentPositionNetPrice(9.9000);
        static::$document->setDocumentPositionQuantities(20.0000, 'H87');
        static::$document->setDocumentPositionTax(
            newTaxCategory: 'S',
            newTaxType: 'VAT',
            newTaxPercent: 19.0
        );
        static::$document->setDocumentPositionSummation(198.00);

        static::$document->addDocumentPosition('2');
        static::$document->setDocumentPositionProductDetails(
            newProductName: 'Joghurt Banane',
            newProductSellerId: 'ARNR2',
            newProductGlobalId: '4000050986428',
            newProductGlobalIdType: '0160'
        );
        static::$document->setDocumentPositionGrossPrice(5.5000);
        static::$document->setDocumentPositionNetPrice(5.5000);
        static::$document->setDocumentPositionQuantities(50.0000, 'H87');
        static::$document->setDocumentPositionTax(
            newTaxCategory: 'S',
            newTaxType: 'VAT',
            newTaxPercent: 7.0
        );
        static::$document->setDocumentPositionSummation(275.00);

        static::$document->setDocumentSellerId('549910');
        static::$document->setDocumentSellerGlobalId('4000001123452', '0088');
        static::$document->setDocumentSellerName('Lieferant GmbH');
        static::$document->setDocumentSellerAddress(
            newAddressLine1: 'Lieferantenstraße 20',
            newPostcode: '80333',
            newCity: 'München',
            newCountryId: 'DE'
        );
        static::$document->addDocumentSellerTaxRegistration('FC', '201/113/40209');
        static::$document->addDocumentSellerTaxRegistration('VA', 'DE123456789');

        static::$document->setDocumentBuyerId('GE2020211');
        static::$document->setDocumentBuyerName('Kunden AG Mitte');
        static::$document->setDocumentBuyerAddress(
            newAddressLine1: 'Kundenstraße 15',
            newPostcode: '69876',
            newCity: 'Frankfurt',
            newCountryId: 'DE'
        );

        static::$document->setDocumentSupplyChainEvent(DateTime::createFromFormat('Ymd', '20241114'));

        static::$document->addDocumentTax(
            newTaxCategory: 'S',
            newTaxType: 'VAT',
            newBasisAmount: 275.00,
            newTaxAmount: 19.25,
            newTaxPercent: 7.00
        );
        static::$document->addDocumentTax(
            newTaxCategory: 'S',
            newTaxType: 'VAT',
            newBasisAmount: 198.00,
            newTaxAmount: 37.62,
            newTaxPercent: 19.00
        );

        static::$document->addDocumentPaymentTerm('Zahlbar innerhalb 30 Tagen netto bis 15.12.2024, 3% Skonto innerhalb 10 Tagen bis 25.11.2024');

        static::$document->setDocumentSummation(
            newNetAmount: 473.00,
            newChargeTotalAmount: 0.00,
            newDiscountTotalAmount: 0.00,
            newTaxBasisAmount: 473.00,
            newTaxTotalAmount: 56.87,
            newGrossAmount: 529.87,
            newDueAmount: 529.87,
            newPrepaidAmount: 0.00
        );
    }

    public static function tearDownAfterClass(): void
    {
        InvoiceSuiteSettings::setQuantityDecimals(2);
        InvoiceSuiteSettings::setUnitAmountDecimals(2);
    }

    public function testXmlOutput(): void
    {
        $this->registerCustomNamespace('ubl', 'urn:oasis:names:specification:ubl:schema:xsd:Invoice-2');
        $this->registerCustomNamespace('cbc', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

        $this->assertXPathValueWithIndex('//ubl:Invoice/cbc:CustomizationID', 0, 'urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cbc:CustomizationID', 1);
        $this->assertXPathValueWithIndex('//ubl:Invoice/cbc:ProfileID', 0, 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cbc:ProfileID', 1);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cbc:ID', 0, '471102');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cbc:ID', 1);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cbc:IssueDate', 0, '2024-11-15');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cbc:IssueDate', 1);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cbc:InvoiceTypeCode', 0, '380');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cbc:InvoiceTypeCode', 1);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cbc:Note', 0, "Lieferant GmbH\nLieferantenstraße 20\n80333 München\nDeutschland\nGeschäftsführer: Hans Muster\nHandelsregisternummer: H A 123\n");
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cbc:Note', 1);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cbc:DocumentCurrencyCode', 0, 'EUR');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cbc:DocumentCurrencyCode', 1);

        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cbc:TaxCurrencyCode', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cbc:TaxCurrencyCode', 1);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cbc:BuyerReference', 0, 'SomeRef');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cbc:BuyerReference', 1);

        // Position (General)

        $this->assertXPathExistsWithIndex('//ubl:Invoice/cac:InvoiceLine', 0);
        $this->assertXPathExistsWithIndex('//ubl:Invoice/cac:InvoiceLine', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:InvoiceLine', 2);

        // Position 1

        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:InvoiceLine/cbc:ID', 0, '1');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity', 0, '20.0000', 'unitCode', 'H87');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:InvoiceLine/cbc:LineExtensionAmount', 0, '198.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 0, 'Trennblätter A4');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 0, 'TB100A4');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0, '4012345001235', 'schemeID', '0160');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 0, 'S');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', 0, '19.00');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount', 0, '9.9000', 'currencyID', 'EUR');

        // Position 2

        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:InvoiceLine/cbc:ID', 1, '2');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity', 1, '50.0000', 'unitCode', 'H87');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:InvoiceLine/cbc:LineExtensionAmount', 1, '275.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 1, 'Joghurt Banane');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 1, 'ARNR2');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1, '4000050986428', 'schemeID', '0160');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 1, 'S');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', 1, '7.00');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 1, 'VAT');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount', 1, '5.5000', 'currencyID', 'EUR');

        // Header

        // Vendor

        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, '549910');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1, '4000001123452', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 2);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 0, 'Lieferantenstraße 20');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 1);

        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 1);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 0, 'München');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 1);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 0, '80333');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 1);

        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 1);

        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:AddressLine/cbc:Line', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:AddressLine/cbc:Line', 1);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0, 'DE');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, '201/113/40209');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'FC');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1, 'DE123456789');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1, 'VAT');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 2);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 2);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Lieferant GmbH');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        // Customer

        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'GE2020211');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 0, 'Kundenstraße 15');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 1);

        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 1);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 0, 'Frankfurt');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 1);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 0, '69876');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 1);

        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity', 1);

        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:AddressLine/cbc:Line', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:AddressLine/cbc:Line', 1);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0, 'DE');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);

        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 2);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 2);

        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Kunden AG Mitte');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);

        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        // Delivery

        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 0, '2024-11-14');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:Delivery/cbc:ActualDeliveryDate', 1);

        // Payment

        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:PaymentTerms/cbc:Note', 0, 'Zahlbar innerhalb 30 Tagen netto bis 15.12.2024, 3% Skonto innerhalb 10 Tagen bis 25.11.2024');
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:PaymentTerms/cbc:Note', 1);

        // Tax

        $this->assertXPathExistsWithIndex('//ubl:Invoice/cac:TaxTotal', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:TaxTotal', 1);

        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:TaxTotal/cbc:TaxAmount', 0, '56.87', 'currencyID', 'EUR');

        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', 0, '275.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', 0, '19.25', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 0, 'S');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', 0, '7.00');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 0, 'VAT');

        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', 1, '198.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', 1, '37.62', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 1, 'S');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', 1, '19.00');
        $this->assertXPathValueWithIndex('//ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 1, 'VAT');

        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', 2);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', 2);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 2);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', 2);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 2);

        // Summation

        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', 0, '473.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', 0, '473.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', 0, '529.87', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', 0, '0.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', 0, '0.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:LegalMonetaryTotal/cbc:PrepaidAmount', 0, '0.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount', 0, '529.87', 'currencyID', 'EUR');

        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:LegalMonetaryTotal/cbc:PrepaidAmount', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount', 1);
    }

    public function testContentType(): void
    {
        $contentType = InvoiceSuiteContentTypeResolver::resolveContentType(static::$document->getContent());

        $this->assertSame(InvoiceSuiteContentType::XML, $contentType);
    }

    public function testWriteFile(): void
    {
        static::$document->saveContentToFile($this->getStoreFilename());

        $this->assertFileExists($this->getStoreFilename());
    }

    private function getStoreFilename(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            '00_case_xrechnung_ublinvoice_simple.xml'
        );
    }
}
