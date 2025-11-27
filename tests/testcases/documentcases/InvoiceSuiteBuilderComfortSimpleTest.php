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
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

final class InvoiceSuiteBuilderComfortSimpleTest extends TestCase
{
    use HandlesXmlTests;

    public static function setUpBeforeClass(): void
    {
        InvoiceSuiteSettings::setQuantityDecimals(4);
        InvoiceSuiteSettings::setUnitAmountDecimals(4);

        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('zffxcomfort');
        static::$document->setDocumentNo('471102');
        static::$document->setDocumentType(InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE->value);
        static::$document->setDocumentDate(DateTime::createFromFormat('Ymd', '20241115'));
        static::$document->addDocumentNote('Rechnung gemäß Bestellung vom 01.11.2024.');
        static::$document->addDocumentNote("Lieferant GmbH\nLieferantenstraße 20\n80333 München\nDeutschland\nGeschäftsführer: Hans Muster\nHandelsregisternummer: H A 123\n", newSubjectCode: 'REG');
        static::$document->setDocumentCurrency(InvoiceSuiteCodelistCurrencyCodes::EURO->value);

        static::$document->addDocumentPosition('1');
        static::$document->setDocumentPositionProductDetails(
            newProductGlobalId: '4012345001235',
            newProductGlobalIdType: '0160',
            newProductSellerId: 'TB100A4',
            newProductName: 'Trennblätter A4'
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
            newProductGlobalId: '4000050986428',
            newProductGlobalIdType: '0160',
            newProductSellerId: 'ARNR2',
            newProductName: 'Joghurt Banane'
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
            newPostcode: '80333',
            newAddressLine1: 'Lieferantenstraße 20',
            newCity: 'München',
            newCountryId: 'DE'
        );
        static::$document->addDocumentSellerTaxRegistration('FC', '201/113/40209');
        static::$document->addDocumentSellerTaxRegistration('VA', 'DE123456789');

        static::$document->setDocumentBuyerId('GE2020211');
        static::$document->setDocumentBuyerName('Kunden AG Mitte');
        static::$document->setDocumentBuyerAddress(
            newPostcode: '69876',
            newAddressLine1: 'Kundenstraße 15',
            newCity: 'Frankfurt',
            newCountryId: 'DE'
        );

        static::$document->setDocumentSupplyChainEvent(DateTime::createFromFormat('Ymd', '20241114'));

        static::$document->addDocumentTax(
            newTaxAmount: 19.25,
            newTaxType: 'VAT',
            newBasisAmount: 275.00,
            newTaxCategory: 'S',
            newTaxPercent: 7.00
        );
        static::$document->addDocumentTax(
            newTaxAmount: 37.62,
            newTaxType: 'VAT',
            newBasisAmount: 198.00,
            newTaxCategory: 'S',
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
            newPrepaidAmount: 0.00,
            newDueAmount: 529.87
        );
    }

    public static function tearDownAfterClass(): void
    {
        InvoiceSuiteSettings::setQuantityDecimals(2);
        InvoiceSuiteSettings::setUnitAmountDecimals(2);
    }

    public function testXmlOutput(): void
    {
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:GuidelineSpecifiedDocumentContextParameter/ram:ID', 0, 'urn:cen.eu:en16931:2017');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:GuidelineSpecifiedDocumentContextParameter/ram:ID', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:ID', 0, '471102');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:ID', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:TypeCode', 0, '380');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:TypeCode', 1);

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IssueDateTime/udt:DateTimeString', 0, '20241115', 'format', '102');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IssueDateTime/udt:DateTimeString', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 0, 'Rechnung gemäß Bestellung vom 01.11.2024.');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 1, "Lieferant GmbH\nLieferantenstraße 20\n80333 München\nDeutschland\nGeschäftsführer: Hans Muster\nHandelsregisternummer: H A 123\n");
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 2);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 0, 'REG');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 1);

        // Position 1

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:AssociatedDocumentLineDocument/ram:LineID', 0, '1');
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:GlobalID', 0, '4012345001235', 'schemeID', '0160');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:SellerAssignedID', 0, 'TB100A4');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Name', 0, 'Trennblätter A4');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount', 0, '9.9000');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount', 0, '9.9000');

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:BilledQuantity', 0, '20.0000', 'unitCode', 'H87');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 0, 'VAT');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 0, 'S');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent', 0, '19.00');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:SpecifiedTradeSettlementLineMonetarySummation/ram:LineTotalAmount', 0, '198.00');

        // Position 2

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:AssociatedDocumentLineDocument/ram:LineID', 1, '2');
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:GlobalID', 1, '4000050986428', 'schemeID', '0160');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:SellerAssignedID', 1, 'ARNR2');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Name', 1, 'Joghurt Banane');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount', 1, '5.5000');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount', 1, '5.5000');

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:BilledQuantity', 1, '50.0000', 'unitCode', 'H87');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 1, 'VAT');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 1, 'S');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent', 1, '7.00');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:SpecifiedTradeSettlementLineMonetarySummation/ram:LineTotalAmount', 1, '275.00');

        // Header

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:ID', 0, '549910');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:ID', 1);
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:GlobalID', 0, '4000001123452', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:GlobalID', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:Name', 0, 'Lieferant GmbH');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:Name', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:PostcodeCode', 0, '80333');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:PostcodeCode', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:LineOne', 0, 'Lieferantenstraße 20');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:LineTwo', 1);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:LineThree', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:CityName', 0, 'München');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:CityName', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:CountryID', 0, 'DE');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:CountryID', 1);
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:SpecifiedTaxRegistration/ram:ID', 0, '201/113/40209', 'schemeID', 'FC');
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:SpecifiedTaxRegistration/ram:ID', 1, 'DE123456789', 'schemeID', 'VA');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:SpecifiedTaxRegistration/ram:ID', 2);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:ID', 0, 'GE2020211');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:ID', 1);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:GlobalID', 0);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:GlobalID', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:Name', 0, 'Kunden AG Mitte');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:Name', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:PostcodeCode', 0, '69876');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:PostcodeCode', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:LineOne', 0, 'Kundenstraße 15');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:LineTwo', 1);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:LineThree', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:CityName', 0, 'Frankfurt');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:CityName', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:CountryID', 0, 'DE');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:CountryID', 1);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:SpecifiedTaxRegistration/ram:ID', 0);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:SpecifiedTaxRegistration/ram:ID', 1);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:SpecifiedTaxRegistration/ram:ID', 2);

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ActualDeliverySupplyChainEvent/ram:OccurrenceDateTime/udt:DateTimeString', 0, '20241114', 'format', '102');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ActualDeliverySupplyChainEvent/ram:OccurrenceDateTime/udt:DateTimeString', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceCurrencyCode', 0, 'EUR');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceCurrencyCode', 1);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:TaxCurrencyCode', 0);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:TaxCurrencyCode', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CalculatedAmount', 0, '19.25');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 0, 'VAT');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:BasisAmount', 0, '275.00');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 0, 'S');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent', 0, '7.00');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CalculatedAmount', 1, '37.62');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 1, 'VAT');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:BasisAmount', 1, '198.00');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 1, 'S');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent', 1, '19.00');

        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CalculatedAmount', 2);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 2);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:BasisAmount', 2);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 2);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent', 2);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description', 0, 'Zahlbar innerhalb 30 Tagen netto bis 15.12.2024, 3% Skonto innerhalb 10 Tagen bis 25.11.2024');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:LineTotalAmount', 0, '473.00');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:ChargeTotalAmount', 0, '0.00');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:AllowanceTotalAmount', 0, '0.00');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:TaxBasisTotalAmount', 0, '473.00');
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:TaxTotalAmount', 0, '56.87', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:GrandTotalAmount', 0, '529.87');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:TotalPrepaidAmount', 0, '0.00');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:DuePayableAmount', 0, '529.87');
    }

    public function testContentType(): void
    {
        $contentType = InvoiceSuiteContentTypeResolver::resolveContentType(static::$document->getContentAsXml());

        $this->assertSame(InvoiceSuiteContentTypeResolver::XML, $contentType);
    }

    public function testWriteFile(): void
    {
        static::$document->saveAsXmlFile($this->getStoreFilename());

        $this->assertFileExists($this->getStoreFilename());
    }

    private function getStoreFilename(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            '00_case_comfort_simple.xml'
        );
    }
}
