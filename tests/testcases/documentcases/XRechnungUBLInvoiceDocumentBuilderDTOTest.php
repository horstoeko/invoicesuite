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
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

final class XRechnungUBLInvoiceDocumentBuilderDTOTest extends TestCase
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
            ->addBuyerReference((new InvoiceSuiteIdDTO())
                ->setId('SomeRef'))
            ->addDeliveryTerm((new InvoiceSuiteIdDTO())
                ->setId('devterm'))
            ->setSellerParty((new InvoiceSuitePartyDTO())
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
                    ->setIdType('VA')))
            ->setBuyerParty((new InvoiceSuitePartyDTO())
                ->addId((new InvoiceSuiteIdDTO())
                    ->setId('GE2020211'))
                ->addName('Kunden AG Mitte')
                ->addAddress((new InvoiceSuiteAddressDTO())
                    ->setPostcode('69876')
                    ->setAddressLine1('Kundenstraße 15')
                    ->setCity('Frankfurt')
                    ->setCountry('DE')))
            ->addSupplyChainEvent(DateTime::createFromFormat('Ymd', '20241114'))
            ->addTax((new InvoiceSuiteTaxDTO())
                ->setAmount(19.25)
                ->setType('VAT')
                ->setBasisAmount(275.00)
                ->setCategory('S')
                ->setPercent(7.00))
            ->addTax((new InvoiceSuiteTaxDTO())
                ->setAmount(37.62)
                ->setType('VAT')
                ->setBasisAmount(198.00)
                ->setCategory('S')
                ->setPercent(19.00))
            ->addPaymentTerm((new InvoiceSuitePaymentTermDTO())
                ->setDescription('Zahlbar innerhalb 30 Tagen netto bis 15.12.2024, 3% Skonto innerhalb 10 Tagen bis 25.11.2024'))
            ->addSummation((new InvoiceSuiteSummationDTO())
                ->setNetAmount(473.00)
                ->setChargeTotalAmount(0.00)
                ->setDiscountTotalAmount(0.00)
                ->setTaxBasisAmount(473.00)
                ->setTaxTotalAmount(56.87)
                ->setGrossAmount(529.87)
                ->setPrepaidAmount(0.00)
                ->setDueAmount(529.87));

        $dtoDocumentPositionOne = (new InvoiceSuiteDocumentPositionDTO())
            ->setLineId('1')
            ->setProduct((new InvoiceSuiteProductDTO())
                ->setGlobalId((new InvoiceSuiteIdDTO())
                    ->setId('4012345001235')
                    ->setIdType('0160'))
                ->setSellerId('TB100A4')
                ->setName('Trennblätter A4'))
            ->setGrossPrice((new InvoiceSuitePriceGrossDTO())
                ->setAmount(9.9000))
            ->setNetPrice((new InvoiceSuitePriceNetDTO())
                ->setAmount(9.9000))
            ->setQuantityBilled((new InvoiceSuiteQuantityDTO())
                ->setQuantity(20.0)
                ->setQuantityUnit('H87'))
            ->addTax((new InvoiceSuiteTaxDTO())
                ->setCategory('S')
                ->setType('VAT')
                ->setPercent(19.0))
            ->setSummation((new InvoiceSuitesummationLineDTO())
                ->setNetAmount(198.00));

        $dtoDocumentPositionTwo = (new InvoiceSuiteDocumentPositionDTO())
            ->setLineId('2')
            ->setProduct((new InvoiceSuiteProductDTO())
                ->setGlobalId((new InvoiceSuiteIdDTO())
                    ->setId('4000050986428')
                    ->setIdType('0160'))
                ->setSellerId('ARNR2')
                ->setName('Joghurt Banane'))
            ->setGrossPrice((new InvoiceSuitePriceGrossDTO())
                ->setAmount(5.5000))
            ->setNetPrice((new InvoiceSuitePriceNetDTO())
                ->setAmount(5.5000))
            ->setQuantityBilled((new InvoiceSuiteQuantityDTO())
                ->setQuantity(50.0)
                ->setQuantityUnit('H87'))
            ->addTax((new InvoiceSuiteTaxDTO())
                ->setCategory('S')
                ->setType('VAT')
                ->setPercent(7.0))
            ->setSummation((new InvoiceSuitesummationLineDTO())
                ->setNetAmount(275.00));

        $dtoDocumentHeader->addPosition($dtoDocumentPositionOne);
        $dtoDocumentHeader->addPosition($dtoDocumentPositionTwo);

        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublinvoice');
        static::$document->createFromDTO($dtoDocumentHeader);
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

        $this->assertXPathValueWithIndex('//ubl:Invoice/cbc:Note', 0, 'Rechnung gemäß Bestellung vom 01.11.2024.');
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
            '00_case_xrechnung_ublinvoice_simple_dto.xml'
        );
    }
}
