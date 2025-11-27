<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentcases;

use DateTime;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistCurrencyCodes;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistDocumentTypes;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAddressDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentPositionDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteNoteDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceGrossDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceNetDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteSummationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitesummationLineDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteSettings;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

final class InvoiceSuiteBuilderComfortSimpleDTOTest extends TestCase
{
    use HandlesXmlTests;

    public static function setUpBeforeClass(): void
    {
        InvoiceSuiteSettings::setQuantityDecimals(4);
        InvoiceSuiteSettings::setUnitAmountDecimals(4);

        $dtoDocumentHeader = (new InvoiceSuiteDocumentHeaderDTO())
            ->setNumber('471102')
            ->setType(InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE->value)
            ->setDate(DateTime::createFromFormat('Ymd', '20241115'))
            ->addNote(new InvoiceSuiteNoteDTO('Rechnung gemäß Bestellung vom 01.11.2024.'))
            ->addNote(new InvoiceSuiteNoteDTO("Lieferant GmbH\nLieferantenstraße 20\n80333 München\nDeutschland\nGeschäftsführer: Hans Muster\nHandelsregisternummer: H A 123\n", subjectCode: 'REG'))
            ->setCurrency(InvoiceSuiteCodelistCurrencyCodes::EURO->value)
            ->setSellerParty(
                (new InvoiceSuitePartyDTO())
                    ->addId((new InvoiceSuiteIdDTO())
                        ->setId('549910'))
                    ->addGlobalId((new InvoiceSuiteIdDTO())
                        ->setId('4000001123452')
                        ->setIdType('0088'))
                    ->addName('Lieferant GmbH')
                    ->addAddress((new InvoiceSuiteAddressDTO())
                        ->setPostcode('80333')
                        ->setAddressLine1('Lieferantenstraße 20')
                        ->setCity('München')
                        ->setCountry('DE'))
                    ->addTaxRegistration((new InvoiceSuiteIdDTO())
                        ->setId('201/113/40209')
                        ->setIdType('FC'))
                    ->addTaxRegistration((new InvoiceSuiteIdDTO())
                        ->setId('DE123456789')
                        ->setIdType('VA'))
            )
            ->setBuyerParty(
                (new InvoiceSuitePartyDTO())
                    ->addId((new InvoiceSuiteIdDTO())
                        ->setId('GE2020211'))
                    ->addName('Kunden AG Mitte')
                    ->addAddress((new InvoiceSuiteAddressDTO())
                        ->setPostcode('69876')
                        ->setAddressLine1('Kundenstraße 15')
                        ->setCity('Frankfurt')
                        ->setCountry('DE'))
            )
            ->addSupplyChainEvent(DateTime::createFromFormat('Ymd', '20241114'))
            ->addTax(
                (new InvoiceSuiteTaxDTO())
                    ->setAmount(19.25)
                    ->setType('VAT')
                    ->setBasisAmount(275.00)
                    ->setCategory('S')
                    ->setPercent(7.00)
            )
            ->addTax(
                (new InvoiceSuiteTaxDTO())
                    ->setAmount(37.62)
                    ->setType('VAT')
                    ->setBasisAmount(198.00)
                    ->setCategory('S')
                    ->setPercent(19.00)
            )
            ->addPaymentTerm((new InvoiceSuitePaymentTermDTO())
                ->setDescription('Zahlbar innerhalb 30 Tagen netto bis 15.12.2024, 3% Skonto innerhalb 10 Tagen bis 25.11.2024'))
            ->addSummation(
                (new InvoiceSuiteSummationDTO())
                    ->setNetAmount(473.00)
                    ->setChargeTotalAmount(0.00)
                    ->setDiscountTotalAmount(0.00)
                    ->setTaxBasisAmount(473.00)
                    ->setTaxTotalAmount(56.87)
                    ->setGrossAmount(529.87)
                    ->setPrepaidAmount(0.00)
                    ->setDueAmount(529.87)
            );

        $dtoDocumentPositionOne = (new InvoiceSuiteDocumentPositionDTO())
            ->setLineId('1')
            ->setProduct(
                (new InvoiceSuiteProductDTO())
                    ->setGlobalId((new InvoiceSuiteIdDTO())
                        ->setId('4012345001235')
                        ->setIdType('0160'))
                    ->setSellerId('TB100A4')
                    ->setName('Trennblätter A4')
            )
            ->setGrossPrice((new InvoiceSuitePriceGrossDTO())
                ->setAmount(9.9000))
            ->setNetPrice((new InvoiceSuitePriceNetDTO())
                ->setAmount(9.9000))
            ->setQuantityBilled((new InvoiceSuiteQuantityDTO())
                ->setQuantity(20.0)
                ->setQuantityUnit('H87'))
            ->addTax(
                (new InvoiceSuiteTaxDTO())
                    ->setCategory('S')
                    ->setType('VAT')
                    ->setPercent(19.0)
            )
            ->setSummation(
                (new InvoiceSuitesummationLineDTO())
                    ->setNetAmount(198.00)
            );

        $dtoDocumentPositionTwo = (new InvoiceSuiteDocumentPositionDTO())
            ->setLineId('2')
            ->setProduct(
                (new InvoiceSuiteProductDTO())
                    ->setGlobalId((new InvoiceSuiteIdDTO())
                        ->setId('4000050986428')
                        ->setIdType('0160'))
                    ->setSellerId('ARNR2')
                    ->setName('Joghurt Banane')
            )
            ->setGrossPrice((new InvoiceSuitePriceGrossDTO())
                ->setAmount(5.5000))
            ->setNetPrice((new InvoiceSuitePriceNetDTO())
                ->setAmount(5.5000))
            ->setQuantityBilled((new InvoiceSuiteQuantityDTO())
                ->setQuantity(50.0)
                ->setQuantityUnit('H87'))
            ->addTax(
                (new InvoiceSuiteTaxDTO())
                    ->setCategory('S')
                    ->setType('VAT')
                    ->setPercent(7.0)
            )
            ->setSummation(
                (new InvoiceSuitesummationLineDTO())
                    ->setNetAmount(275.00)
            );

        $dtoDocumentHeader->addPosition($dtoDocumentPositionOne);
        $dtoDocumentHeader->addPosition($dtoDocumentPositionTwo);

        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('zffxcomfort');
        static::$document->createFromDTO($dtoDocumentHeader);
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
            '00_case_comfort_simple_dto.xml'
        );
    }
}
