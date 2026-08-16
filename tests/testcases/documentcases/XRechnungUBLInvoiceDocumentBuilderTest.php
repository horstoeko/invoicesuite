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
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageSeverity;
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
        static::$document->setDocumentSellerCommunication('EM', 'user@lieferant.de');
        static::$document->setDocumentSellerContact(
            newPersonName: 'Hans Meyer',
            newPhoneNumber: '0800-12345678',
            newEmailAddress: 'hm@lieferant.de'
        );

        static::$document->setDocumentBuyerId('GE2020211');
        static::$document->setDocumentBuyerName('Kunden AG Mitte');
        static::$document->setDocumentBuyerAddress(
            newAddressLine1: 'Kundenstraße 15',
            newPostcode: '69876',
            newCity: 'Frankfurt',
            newCountryId: 'DE'
        );
        static::$document->setDocumentBuyerCommunication('EM', 'user@kunde.de');

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

        static::$document->addDocumentPaymentTerm('Zahlbar innerhalb 30 Tagen netto bis 15.12.2024, 3% Skonto innerhalb 10 Tagen bis 25.11.2024', null, 'z3237167126');

        static::$document->setDocumentPaymentMean(
            newTypeCode: '59',
            newBuyerIban: 'DE02120300000000202051',
            newMandate: 'z3237167126'
        );

        static::$document->setDocumentPaymentCreditorReferenceID('94467863782647362');

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

        $this->assertXPathValue('/ubl:Invoice/cbc:CustomizationID', 'urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0');
        $this->assertXPathNotExists('(/ubl:Invoice/cbc:CustomizationID)[2]');
        $this->assertXPathValue('/ubl:Invoice/cbc:ProfileID', 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0');
        $this->assertXPathNotExists('(/ubl:Invoice/cbc:ProfileID)[2]');

        $this->assertXPathValue('/ubl:Invoice/cbc:ID', '471102');
        $this->assertXPathNotExists('(/ubl:Invoice/cbc:ID)[2]');

        $this->assertXPathValue('/ubl:Invoice/cbc:IssueDate', '2024-11-15');
        $this->assertXPathNotExists('(/ubl:Invoice/cbc:IssueDate)[2]');

        $this->assertXPathValue('/ubl:Invoice/cbc:InvoiceTypeCode', '380');
        $this->assertXPathNotExists('(/ubl:Invoice/cbc:InvoiceTypeCode)[2]');

        $this->assertXPathValue('/ubl:Invoice/cbc:Note', "Lieferant GmbH\nLieferantenstraße 20\n80333 München\nDeutschland\nGeschäftsführer: Hans Muster\nHandelsregisternummer: H A 123\n");
        $this->assertXPathNotExists('(/ubl:Invoice/cbc:Note)[2]');

        $this->assertXPathValue('/ubl:Invoice/cbc:DocumentCurrencyCode', 'EUR');
        $this->assertXPathNotExists('(/ubl:Invoice/cbc:DocumentCurrencyCode)[2]');

        $this->assertXPathNotExists('/ubl:Invoice/cbc:TaxCurrencyCode');
        $this->assertXPathNotExists('(/ubl:Invoice/cbc:TaxCurrencyCode)[2]');

        $this->assertXPathValue('/ubl:Invoice/cbc:BuyerReference', 'SomeRef');
        $this->assertXPathNotExists('(/ubl:Invoice/cbc:BuyerReference)[2]');

        // Position (General)

        $this->assertXPathExists('/ubl:Invoice/cac:InvoiceLine');
        $this->assertXPathExists('(/ubl:Invoice/cac:InvoiceLine)[2]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:InvoiceLine)[3]');

        // Position 1

        $this->assertXPathValue('/ubl:Invoice/cac:InvoiceLine/cbc:ID', '1');
        $this->assertXPathValueWithAttribute('/ubl:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity', '20.0000', 'unitCode', 'H87');
        $this->assertXPathValueWithAttribute('/ubl:Invoice/cac:InvoiceLine/cbc:LineExtensionAmount', '198.00', 'currencyID', 'EUR');
        $this->assertXPathValue('/ubl:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 'Trennblätter A4');
        $this->assertXPathValue('/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 'TB100A4');
        $this->assertXPathValueWithAttribute('/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID', '4012345001235', 'schemeID', '0160');
        $this->assertXPathValue('/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 'S');
        $this->assertXPathValue('/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', '19.00');
        $this->assertXPathValue('/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathValueWithAttribute('/ubl:Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount', '9.9000', 'currencyID', 'EUR');

        // Position 2

        $this->assertXPathValue('(/ubl:Invoice/cac:InvoiceLine/cbc:ID)[2]', '2');
        $this->assertXPathValueWithAttribute('(/ubl:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity)[2]', '50.0000', 'unitCode', 'H87');
        $this->assertXPathValueWithAttribute('(/ubl:Invoice/cac:InvoiceLine/cbc:LineExtensionAmount)[2]', '275.00', 'currencyID', 'EUR');
        $this->assertXPathValue('(/ubl:Invoice/cac:InvoiceLine/cac:Item/cbc:Name)[2]', 'Joghurt Banane');
        $this->assertXPathValue('(/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]', 'ARNR2');
        $this->assertXPathValueWithAttribute('(/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]', '4000050986428', 'schemeID', '0160');
        $this->assertXPathValue('(/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID)[2]', 'S');
        $this->assertXPathValue('(/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent)[2]', '7.00');
        $this->assertXPathValue('(/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID)[2]', 'VAT');
        $this->assertXPathValueWithAttribute('(/ubl:Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount)[2]', '5.5000', 'currencyID', 'EUR');

        // Header

        // Vendor

        $this->assertXPathValueWithAttribute('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 'user@lieferant.de', 'schemeID', 'EM');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID)[2]');

        $this->assertXPathNotExists('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        $this->assertXPathValue('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', '549910');
        $this->assertXPathValueWithAttribute('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]', '4000001123452', 'schemeID', '0088');
        $this->assertXPathValueWithAttribute('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[3]', '94467863782647362', 'schemeID', 'SEPA');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[4]');

        $this->assertXPathValue('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 'Lieferantenstraße 20');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName)[2]');

        $this->assertXPathNotExists('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName)[2]');

        $this->assertXPathValue('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 'München');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName)[2]');

        $this->assertXPathValue('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', '80333');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone)[2]');

        $this->assertXPathNotExists('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity)[2]');

        $this->assertXPathNotExists('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:AddressLine/cbc:Line');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:AddressLine/cbc:Line)[2]');

        $this->assertXPathValue('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 'DE');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');

        $this->assertXPathValue('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', '201/113/40209');
        $this->assertXPathValue('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'FC');
        $this->assertXPathValue('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]', 'DE123456789');
        $this->assertXPathValue('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]', 'VAT');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[3]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[3]');

        $this->assertXPathValue('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 'Lieferant GmbH');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        $this->assertXPathValue('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 'Hans Meyer');
        $this->assertXPathValue('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', '0800-12345678');
        $this->assertXPathNotExists('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathValue('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 'hm@lieferant.de');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        // Customer

        $this->assertXPathValueWithAttribute('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 'user@kunde.de', 'schemeID', 'EM');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID)[2]');

        $this->assertXPathNotExists('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        $this->assertXPathValue('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 'GE2020211');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        $this->assertXPathValue('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 'Kundenstraße 15');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName)[2]');

        $this->assertXPathNotExists('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName)[2]');

        $this->assertXPathValue('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 'Frankfurt');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName)[2]');

        $this->assertXPathValue('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', '69876');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone)[2]');

        $this->assertXPathNotExists('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CountrySubentity)[2]');

        $this->assertXPathNotExists('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:AddressLine/cbc:Line');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:AddressLine/cbc:Line)[2]');

        $this->assertXPathValue('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 'DE');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');

        $this->assertXPathNotExists('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID');
        $this->assertXPathNotExists('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[3]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[3]');

        $this->assertXPathValue('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 'Kunden AG Mitte');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');

        $this->assertXPathNotExists('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name');
        $this->assertXPathNotExists('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone');
        $this->assertXPathNotExists('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax');
        $this->assertXPathNotExists('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:Telefax)[2]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        // Delivery

        $this->assertXPathValue('/ubl:Invoice/cac:Delivery/cbc:ActualDeliveryDate', '2024-11-14');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:Delivery/cbc:ActualDeliveryDate)[2]');

        // Payment

        $this->assertXPathValue('/ubl:Invoice/cac:PaymentTerms/cbc:Note', 'Zahlbar innerhalb 30 Tagen netto bis 15.12.2024, 3% Skonto innerhalb 10 Tagen bis 25.11.2024');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:PaymentTerms/cbc:Note)[2]');

        $this->assertXPathValue('/ubl:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode', '59');
        $this->assertXPathValue('/ubl:Invoice/cac:PaymentMeans/cac:PaymentMandate/cbc:ID', 'z3237167126');
        $this->assertXPathValue('/ubl:Invoice/cac:PaymentMeans/cac:PaymentMandate/cac:PayerFinancialAccount/cbc:ID', 'DE02120300000000202051');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:PaymentMeans/cbc:PaymentMeansCode)[2]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:PaymentMeans/cac:PaymentMandate/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:PaymentMeans/cac:PaymentMandate/cac:PayerFinancialAccount/cbc:ID)[2]');

        // Tax

        $this->assertXPathExists('/ubl:Invoice/cac:TaxTotal');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:TaxTotal)[2]');

        $this->assertXPathValueWithAttribute('/ubl:Invoice/cac:TaxTotal/cbc:TaxAmount', '56.87', 'currencyID', 'EUR');

        $this->assertXPathValueWithAttribute('/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', '275.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', '19.25', 'currencyID', 'EUR');
        $this->assertXPathValue('/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 'S');
        $this->assertXPathValue('/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', '7.00');
        $this->assertXPathValue('/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 'VAT');

        $this->assertXPathValueWithAttribute('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount)[2]', '198.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount)[2]', '37.62', 'currencyID', 'EUR');
        $this->assertXPathValue('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID)[2]', 'S');
        $this->assertXPathValue('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent)[2]', '19.00');
        $this->assertXPathValue('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID)[2]', 'VAT');

        $this->assertXPathNotExists('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount)[3]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount)[3]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID)[3]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent)[3]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID)[3]');

        // Summation

        $this->assertXPathValueWithAttribute('/ubl:Invoice/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', '473.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ubl:Invoice/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', '473.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ubl:Invoice/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', '529.87', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ubl:Invoice/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount', '0.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ubl:Invoice/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', '0.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ubl:Invoice/cac:LegalMonetaryTotal/cbc:PrepaidAmount', '0.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ubl:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount', '529.87', 'currencyID', 'EUR');

        $this->assertXPathNotExists('(/ubl:Invoice/cac:LegalMonetaryTotal/cbc:LineExtensionAmount)[2]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount)[2]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount)[2]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount)[2]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount)[2]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:LegalMonetaryTotal/cbc:PrepaidAmount)[2]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount)[2]');
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

    public function testMessageBag(): void
    {
        $this->assertTrue(static::$document->hasMessagesInMessageBag());

        $this->assertTrue(static::$document->hasMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::INFO));
        $this->assertFalse(static::$document->hasMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::WARNING));
        $this->assertFalse(static::$document->hasMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::ERROR));

        $this->assertTrue(static::$document->hasInfoMessagesInMessageBag());
        $this->assertFalse(static::$document->hasWarningMessagesInMessageBag());
        $this->assertFalse(static::$document->hasErrorMessagesInMessageBag());

        $this->assertSame(96, static::$document->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::INFO));
        $this->assertSame(0, static::$document->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::WARNING));
        $this->assertSame(0, static::$document->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::ERROR));

        $this->assertSame(96, static::$document->countInfoMessagesInMessageBag());
        $this->assertSame(0, static::$document->countWarningMessagesInMessageBag());
        $this->assertSame(0, static::$document->countErrorMessagesInMessageBag());

        $this->assertArrayHasKey(0, static::$document->getInfoMessagesInMessageBag());
        $this->assertArrayNotHasKey(0, static::$document->getWarningMessagesInMessageBag());
        $this->assertArrayNotHasKey(0, static::$document->getErrorMessagesInMessageBag());
    }

    private function getStoreFilename(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            '00_case_xrechnung_ublinvoice_simple.xml'
        );
    }
}
