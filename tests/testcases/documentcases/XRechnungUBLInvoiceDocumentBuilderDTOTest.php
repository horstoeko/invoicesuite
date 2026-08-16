<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentcases;

use DateTime;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistCurrencyCodes;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistDocumentTypes;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAddressDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteCommunicationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteContactDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentPositionDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteNoteDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentMeanDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceGrossDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceNetDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteSummationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitesummationLineDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30InvoiceProviderBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteSettings;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageSeverity;
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
                ->setId('1'))
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
                    ->setIdType('VA'))
                ->addCommunication((new InvoiceSuiteCommunicationDTO())
                    ->setId('user@lieferant.de')
                    ->setIdType('EM'))
                ->addContact((new InvoiceSuiteContactDTO())
                    ->setPersonName('Hans Meyer')
                    ->setPhoneNumber('0800-12345678')
                    ->setEmailAddress('hm@lieferant.de')))
            ->setBuyerParty((new InvoiceSuitePartyDTO())
                ->addId((new InvoiceSuiteIdDTO())
                    ->setId('GE2020211'))
                ->addName('Kunden AG Mitte')
                ->addAddress((new InvoiceSuiteAddressDTO())
                    ->setPostcode('69876')
                    ->setAddressLine1('Kundenstraße 15')
                    ->setCity('Frankfurt')
                    ->setCountry('DE'))
                ->addCommunication((new InvoiceSuiteCommunicationDTO())
                    ->setId('user@kunde.de')
                    ->setIdType('EM')))
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
                ->setDescription('Zahlbar innerhalb 30 Tagen netto bis 15.12.2024, 3% Skonto innerhalb 10 Tagen bis 25.11.2024')
                ->setMandate('z3237167126'))
            ->addPaymentMean((new InvoiceSuitePaymentMeanDTO())
                ->setTypeCode('59')
                ->setBuyerIban('DE02120300000000202051')
                ->setMandate('z3237167126'))
            ->addCreditorReference((new InvoiceSuiteIdDTO())
                ->setId('94467863782647362'))
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

        $this->assertXPathValue('/ubl:Invoice/cbc:Note', 'Rechnung gemäß Bestellung vom 01.11.2024.');
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
        $this->assertXPathValue('/ubl:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity[@unitCode="H87"]', '20.0000');
        $this->assertXPathValue('/ubl:Invoice/cac:InvoiceLine/cbc:LineExtensionAmount[@currencyID="EUR"]', '198.00');
        $this->assertXPathValue('/ubl:Invoice/cac:InvoiceLine/cac:Item/cbc:Name', 'Trennblätter A4');
        $this->assertXPathValue('/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID', 'TB100A4');
        $this->assertXPathValue('/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID[@schemeID="0160"]', '4012345001235');
        $this->assertXPathValue('/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 'S');
        $this->assertXPathValue('/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', '19.00');
        $this->assertXPathValue('/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathValue('/ubl:Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount[@currencyID="EUR"]', '9.9000');

        // Position 2

        $this->assertXPathValue('(/ubl:Invoice/cac:InvoiceLine/cbc:ID)[2]', '2');
        $this->assertXPathValue('(/ubl:Invoice/cac:InvoiceLine/cbc:InvoicedQuantity)[2][@unitCode="H87"]', '50.0000');
        $this->assertXPathValue('(/ubl:Invoice/cac:InvoiceLine/cbc:LineExtensionAmount)[2][@currencyID="EUR"]', '275.00');
        $this->assertXPathValue('(/ubl:Invoice/cac:InvoiceLine/cac:Item/cbc:Name)[2]', 'Joghurt Banane');
        $this->assertXPathValue('(/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:SellersItemIdentification/cbc:ID)[2]', 'ARNR2');
        $this->assertXPathValue('(/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2][@schemeID="0160"]', '4000050986428');
        $this->assertXPathValue('(/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID)[2]', 'S');
        $this->assertXPathValue('(/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent)[2]', '7.00');
        $this->assertXPathValue('(/ubl:Invoice/cac:InvoiceLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID)[2]', 'VAT');
        $this->assertXPathValue('(/ubl:Invoice/cac:InvoiceLine/cac:Price/cbc:PriceAmount)[2][@currencyID="EUR"]', '5.5000');

        // Header

        // Vendor

        $this->assertXPathValue('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID[@schemeID="EM"]', 'user@lieferant.de');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID)[2]');

        $this->assertXPathNotExists('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        $this->assertXPathValue('/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', '549910');
        $this->assertXPathValue('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2][@schemeID="0088"]', '4000001123452');
        $this->assertXPathValue('(/ubl:Invoice/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[3][@schemeID="SEPA"]', '94467863782647362');
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

        $this->assertXPathValue('/ubl:Invoice/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID[@schemeID="EM"]', 'user@kunde.de');
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

        $this->assertXPathValue('/ubl:Invoice/cac:TaxTotal/cbc:TaxAmount[@currencyID="EUR"]', '56.87');

        $this->assertXPathValue('/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount[@currencyID="EUR"]', '275.00');
        $this->assertXPathValue('/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount[@currencyID="EUR"]', '19.25');
        $this->assertXPathValue('/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 'S');
        $this->assertXPathValue('/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', '7.00');
        $this->assertXPathValue('/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 'VAT');

        $this->assertXPathValue('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount)[2][@currencyID="EUR"]', '198.00');
        $this->assertXPathValue('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount)[2][@currencyID="EUR"]', '37.62');
        $this->assertXPathValue('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID)[2]', 'S');
        $this->assertXPathValue('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent)[2]', '19.00');
        $this->assertXPathValue('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID)[2]', 'VAT');

        $this->assertXPathNotExists('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount)[3]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount)[3]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID)[3]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent)[3]');
        $this->assertXPathNotExists('(/ubl:Invoice/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID)[3]');

        // Summation

        $this->assertXPathValue('/ubl:Invoice/cac:LegalMonetaryTotal/cbc:LineExtensionAmount[@currencyID="EUR"]', '473.00');
        $this->assertXPathValue('/ubl:Invoice/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount[@currencyID="EUR"]', '473.00');
        $this->assertXPathValue('/ubl:Invoice/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount[@currencyID="EUR"]', '529.87');
        $this->assertXPathValue('/ubl:Invoice/cac:LegalMonetaryTotal/cbc:AllowanceTotalAmount[@currencyID="EUR"]', '0.00');
        $this->assertXPathValue('/ubl:Invoice/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount[@currencyID="EUR"]', '0.00');
        $this->assertXPathValue('/ubl:Invoice/cac:LegalMonetaryTotal/cbc:PrepaidAmount[@currencyID="EUR"]', '0.00');
        $this->assertXPathValue('/ubl:Invoice/cac:LegalMonetaryTotal/cbc:PayableAmount[@currencyID="EUR"]', '529.87');

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
        $this->assertTrue(static::$document->hasMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::WARNING));
        $this->assertFalse(static::$document->hasMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::ERROR));

        $this->assertTrue(static::$document->hasInfoMessagesInMessageBag());
        $this->assertTrue(static::$document->hasWarningMessagesInMessageBag());
        $this->assertFalse(static::$document->hasErrorMessagesInMessageBag());

        $this->assertSame(92, static::$document->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::INFO));
        $this->assertSame(1, static::$document->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::WARNING));
        $this->assertSame(0, static::$document->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::ERROR));

        $this->assertSame(92, static::$document->countInfoMessagesInMessageBag());
        $this->assertSame(1, static::$document->countWarningMessagesInMessageBag());
        $this->assertSame(0, static::$document->countErrorMessagesInMessageBag());

        $this->assertArrayHasKey(0, static::$document->getInfoMessagesInMessageBag());
        $this->assertArrayHasKey(0, static::$document->getWarningMessagesInMessageBag());
        $this->assertArrayHasKey('early_exit', static::$document->getWarningMessagesInMessageBag()[0]->getMessageAdditionalData());
        $this->assertSame('yes', static::$document->getWarningMessagesInMessageBag()[0]->getMessageAdditionalData()['early_exit']);
        $this->assertSame('EXIT ' . InvoiceSuitePeppol30InvoiceProviderBuilder::class . '::setDocumentTaxCurrency', static::$document->getWarningMessagesInMessageBag()[0]->getMessageContent());
        $this->assertArrayNotHasKey(0, static::$document->getErrorMessagesInMessageBag());
    }

    private function getStoreFilename(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            '00_case_xrechnung_ublinvoice_simple_dto.xml'
        );
    }
}
