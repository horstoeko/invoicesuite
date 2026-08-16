<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentcases;

use DateTime;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistCountryCodes;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistCurrencyCodes;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistDocumentTypes;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAddressDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAllowanceChargeDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteCommunicationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteContactDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentPositionDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteNoteDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteOrganisationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentMeanDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceNetDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductClassificationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentExtDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteSummationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitesummationLineDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteSettings;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageSeverity;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

final class XRechnungUBLCreditNoteDocumentBuilderDTOTest extends TestCase
{
    use HandlesXmlTests;

    public static function setUpBeforeClass(): void
    {
        InvoiceSuiteSettings::setQuantityDecimals(2);
        InvoiceSuiteSettings::setUnitAmountDecimals(2);

        $dtoDocumentHeader = (new InvoiceSuiteDocumentHeaderDTO())
            ->setNumber('Snippet1')
            ->setType(InvoiceSuiteCodelistDocumentTypes::CREDIT_NOTE->value)
            ->setDate(DateTime::createFromFormat('Ymd', '20171113'))
            ->addNote(new InvoiceSuiteNoteDTO('Please note we have a new phone number: 22 22 22 22'))
            ->setCurrency(InvoiceSuiteCodelistCurrencyCodes::EURO->value)
            ->addPostingReference((new InvoiceSuiteIdDTO())
                ->setId('4025:123:4343'))
            ->addBuyerReference((new InvoiceSuiteIdDTO())
                ->setId('0150abc'))
            ->addInvoiceReference((new InvoiceSuiteReferenceDocumentExtDTO())
                ->setReferenceNumber('Snippet1'))
            ->setSellerParty(
                (new InvoiceSuitePartyDTO())
                    ->addCommunication((new InvoiceSuiteCommunicationDTO())
                        ->setIdType('0088')
                        ->setId('9482348239847239874'))
                    ->addId((new InvoiceSuiteIdDTO())
                        ->setId('99887766'))
                    ->addName('SupplierOfficialName Ltd')
                    ->addLegalOrganisation((new InvoiceSuiteOrganisationDTO())
                        ->setName('SupplierTradingName Ltd.')
                        ->setId('GB983294'))
                    ->addAddress((new InvoiceSuiteAddressDTO())
                        ->setAddressLine1('Main street 1')
                        ->setAddressLine2('Postbox 123')
                        ->setCity('London')
                        ->setPostcode('GB 123 EW')
                        ->setCountry(InvoiceSuiteCodelistCountryCodes::VERE_KOEN->value))
                    ->addTaxRegistration((new InvoiceSuiteIdDTO())
                        ->setId('GB1232434')
                        ->setIdType('VAT'))
                    ->addContact((new InvoiceSuiteContactDTO())
                        ->setPersonName('Person Responsible')
                        ->setEmailAddress('user@company.all')
                        ->setPhoneNumber('08154711'))
            )
            ->setBuyerParty(
                (new InvoiceSuitePartyDTO())
                    ->addCommunication((new InvoiceSuiteCommunicationDTO())
                        ->setIdType('0002')
                        ->setId('FR23342'))
                    ->addGlobalId((new InvoiceSuiteIdDTO())
                        ->setIdType('0002')
                        ->setId('FR23342'))
                    ->addName('Buyer Official Name')
                    ->addLegalOrganisation((new InvoiceSuiteOrganisationDTO())
                        ->setName('BuyerTradingName AS')
                        ->setId('39937423947')
                        ->setIdType('0183'))
                    ->addAddress((new InvoiceSuiteAddressDTO())
                        ->setAddressLine1('Hovedgatan 32')
                        ->setAddressLine2('Po box 878')
                        ->setCity('Stockholm')
                        ->setPostcode('456 34')
                        ->setCountry(InvoiceSuiteCodelistCountryCodes::SCHWEDEN->value))
                    ->addTaxRegistration((new InvoiceSuiteIdDTO())
                        ->setId('SE4598375937')
                        ->setIdType('VAT'))
                    ->addContact((new InvoiceSuiteContactDTO())
                        ->setPersonName('Lisa Johnson')
                        ->setEmailAddress('lj@buyer.se')
                        ->setPhoneNumber('23434234'))
            )
            ->addSupplyChainEvent(DateTime::createFromFormat('Ymd', '20171101'))
            ->setShipToParty(
                (new InvoiceSuitePartyDTO())
                    ->addGlobalId((new InvoiceSuiteIdDTO())
                        ->setId('9483759475923478')
                        ->setIdType('0088'))
                    ->addAddress((new InvoiceSuiteAddressDTO())
                        ->setAddressLine1('Delivery street 2')
                        ->setAddressLine2('Building 56')
                        ->setCity('Stockholm')
                        ->setPostcode('21234')
                        ->setCountry(InvoiceSuiteCodelistCountryCodes::SCHWEDEN->value))
                    ->addName('Delivery party Name')
            )
            ->addPaymentMean(
                (new InvoiceSuitePaymentMeanDTO())
                    ->setTypeCode(InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_30->value)
                    ->setPayeeIban('IBAN32423940')
                    ->setPayeeAccountName('AccountName')
                    ->setPayeeBic('BIC324098')
                    ->setPaymentReference('Snippet1')
            )
            ->addPaymentTerm(
                (new InvoiceSuitePaymentTermDTO())
                    ->setDescription('Payment within 10 days, 2% discount')
            )
            ->addAllowanceCharge(
                (new InvoiceSuiteAllowanceChargeDTO())
                    ->setChargeIndicator(true)
                    ->setReason('Insurance')
                    ->setAmount(25.00)
                    ->setTaxCategory('S')
                    ->setTaxPercent(25.0)
                    ->setTaxType('VAT')
            )
            ->addTax(
                (new InvoiceSuiteTaxDTO())
                    ->setBasisAmount(1325.00)
                    ->setAmount(331.25)
                    ->setCategory('S')
                    ->setType('VAT')
                    ->setPercent(25.0)
            )
            ->addSummation(
                (new InvoiceSuiteSummationDTO())
                    ->setNetAmount(1300.00)
                    ->setTaxBasisAmount(1325.00)
                    ->setGrossAmount(1656.25)
                    ->setChargeTotalAmount(25.00)
                    ->setDueAmount(1656.25)
                    ->setTaxTotalAmount(331.25)
            );

        $dtoDocumentPositionOne = (new InvoiceSuiteDocumentPositionDTO())
            ->setLineId('1')
            ->setQuantityBilled(
                (new InvoiceSuiteQuantityDTO())
                    ->setQuantity(7.00)
                    ->setQuantityUnit('DAY')
            )
            ->setSummation(
                (new InvoiceSuitesummationLineDTO())
                    ->setNetAmount(2800.00)
            )
            ->addPostingReference(
                (new InvoiceSuiteIdDTO())
                    ->setId('Konteringsstreng')
            )
            ->addBuyerOrderReference(
                (new InvoiceSuiteReferenceDocumentLineDTO())
                    ->setReferenceLineNumber('123')
            )
            ->setProduct(
                (new InvoiceSuiteProductDTO())
                    ->setDescription('Description of item')
                    ->setName('item name')
                    ->setGlobalId(
                        (new InvoiceSuiteIdDTO())
                            ->setId('21382183120983')
                            ->setIdType('0088')
                    )
                    ->setOriginTradeCountry('NO')
                    ->addClassification(
                        (new InvoiceSuiteProductClassificationDTO())
                            ->setCode('09348023')
                            ->setListId('SRV')
                    )
            )
            ->addTax(
                (new InvoiceSuiteTaxDTO())
                    ->setCategory('S')
                    ->setType('VAT')
                    ->setPercent(25.0)
            )
            ->setNetPrice(
                (new InvoiceSuitePriceNetDTO())
                    ->setAmount(400.00)
            );

        $dtoDocumentPositionTwo = (new InvoiceSuiteDocumentPositionDTO())
            ->setLineId('2')
            ->setQuantityBilled(
                (new InvoiceSuiteQuantityDTO())
                    ->setQuantity(-3.00)
                    ->setQuantityUnit('DAY')
            )
            ->setSummation(
                (new InvoiceSuitesummationLineDTO())
                    ->setNetAmount(-1500.00)
            )
            ->addBuyerOrderReference(
                (new InvoiceSuiteReferenceDocumentLineDTO())
                    ->setReferenceLineNumber('123')
            )
            ->setProduct(
                (new InvoiceSuiteProductDTO())
                    ->setDescription('Description 2')
                    ->setName('item name 2')
                    ->setGlobalId(
                        (new InvoiceSuiteIdDTO())
                            ->setId('21382183120983')
                            ->setIdType('0088')
                    )
                    ->setOriginTradeCountry('NO')
                    ->addClassification(
                        (new InvoiceSuiteProductClassificationDTO())
                            ->setCode('09348023')
                            ->setListId('SRV')
                    )
            )
            ->addTax(
                (new InvoiceSuiteTaxDTO())
                    ->setCategory('S')
                    ->setType('VAT')
                    ->setPercent(25.0)
            )
            ->setNetPrice(
                (new InvoiceSuitePriceNetDTO())
                    ->setAmount(500.00)
            );

        $dtoDocumentHeader->addPosition($dtoDocumentPositionOne);
        $dtoDocumentHeader->addPosition($dtoDocumentPositionTwo);

        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublcreditnote');
        static::$document->createFromDTO($dtoDocumentHeader);
    }

    public static function tearDownAfterClass(): void
    {
        InvoiceSuiteSettings::setQuantityDecimals(2);
        InvoiceSuiteSettings::setUnitAmountDecimals(2);
    }

    public function testXmlOutput(): void
    {
        $this->registerCustomNamespace('ubl', 'urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2');
        $this->registerCustomNamespace('cbc', 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2');

        $this->disableRenderXmlContent();

        $this->assertXPathValue('/ubl:CreditNote/cbc:CustomizationID', 'urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0');
        $this->assertXPathNotExists('(/ubl:CreditNote/cbc:CustomizationID)[2]');
        $this->assertXPathValue('/ubl:CreditNote/cbc:ProfileID', 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0');
        $this->assertXPathNotExists('(/ubl:CreditNote/cbc:ProfileID)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cbc:ID', 'Snippet1');
        $this->assertXPathNotExists('(/ubl:CreditNote/cbc:ID)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cbc:IssueDate', '2017-11-13');
        $this->assertXPathNotExists('(/ubl:CreditNote/cbc:IssueDate)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cbc:CreditNoteTypeCode', '381');
        $this->assertXPathNotExists('(/ubl:CreditNote/cbc:CreditNoteTypeCode)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cbc:Note', 'Please note we have a new phone number: 22 22 22 22');
        $this->assertXPathNotExists('(/ubl:CreditNote/cbc:Note)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cbc:DocumentCurrencyCode', 'EUR');
        $this->assertXPathNotExists('(/ubl:CreditNote/cbc:DocumentCurrencyCode)[2]');

        $this->assertXPathNotExists('/ubl:CreditNote/cbc:TaxCurrencyCode');
        $this->assertXPathNotExists('(/ubl:CreditNote/cbc:TaxCurrencyCode)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cbc:BuyerReference', '0150abc');
        $this->assertXPathNotExists('(/ubl:CreditNote/cbc:BuyerReference)[2]');

        // Position (General)

        $this->assertXPathExists('/ubl:CreditNote/cac:CreditNoteLine');
        $this->assertXPathExists('(/ubl:CreditNote/cac:CreditNoteLine)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:CreditNoteLine)[3]');

        // Position 1

        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cbc:ID', '1');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity[@unitCode="DAY"]', '7.00');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cbc:LineExtensionAmount[@currencyID="EUR"]', '2800.00');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cbc:AccountingCost', 'Konteringsstreng');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID', '123');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description', 'Description of item');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name', 'item name');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID[@schemeID="0088"]', '21382183120983');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 'NO');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode[@listID="SRV"]', '09348023');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 'S');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', '25.00');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cac:Price/cbc:PriceAmount[@currencyID="EUR"]', '400.00');

        // Position 2

        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cbc:ID)[2]', '2');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity)[2][@unitCode="DAY"]', '-3.00');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cbc:LineExtensionAmount)[2][@currencyID="EUR"]', '-1500.00');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:CreditNoteLine/cbc:AccountingCost)[2]');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID)[2]', '123');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]', 'Description 2');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]', 'item name 2');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2][@schemeID="0088"]', '21382183120983');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]', 'NO');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode)[2][@listID="SRV"]', '09348023');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID)[2]', 'S');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent)[2]', '25.00');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID)[2]', 'VAT');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cac:Price/cbc:PriceAmount)[2][@currencyID="EUR"]', '500.00');

        // Header

        // Vendor

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID[@schemeID="0088"]', '9482348239847239874');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', '99887766');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 'SupplierTradingName Ltd.');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 'Main street 1');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 'Postbox 123');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 'London');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 'GB 123 EW');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 'GB');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 'GB1232434');
        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 'SupplierOfficialName Ltd');
        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 'GB983294');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 'Person Responsible');
        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', '08154711');
        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 'user@company.all');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail)[2]');

        // Customer

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID[@schemeID="0002"]', 'FR23342');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID[@schemeID="0002"]', 'FR23342');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 'BuyerTradingName AS');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 'Hovedgatan 32');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 'Po box 878');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 'Stockholm');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', '456 34');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 'SE');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 'SE4598375937');
        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 'Buyer Official Name');
        $this->assertXPathValue('/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID[@schemeID="0183"]', '39937423947');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');

        // Delivery

        $this->assertXPathValue('/ubl:CreditNote/cac:Delivery/cbc:ActualDeliveryDate', '2017-11-01');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:Delivery/cbc:ActualDeliveryDate)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID[@schemeID="0088"]', '9483759475923478');
        $this->assertXPathValue('/ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName', 'Delivery street 2');
        $this->assertXPathValue('/ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName', 'Building 56');
        $this->assertXPathValue('/ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName', 'Stockholm');
        $this->assertXPathValue('/ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone', '21234');
        $this->assertXPathValue('/ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode', 'SE');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 'Delivery party Name');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name)[2]');

        // Payment

        $this->assertXPathValue('/ubl:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode', '30');
        $this->assertXPathValue('/ubl:CreditNote/cac:PaymentMeans/cbc:PaymentID', 'Snippet1');
        $this->assertXPathValue('/ubl:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID', 'IBAN32423940');
        $this->assertXPathValue('/ubl:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name', 'AccountName');
        $this->assertXPathValue('/ubl:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID', 'BIC324098');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:PaymentMeans/cbc:PaymentID)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID)[2]');

        $this->assertXPathValue('/ubl:CreditNote/cac:PaymentTerms/cbc:Note', 'Payment within 10 days, 2% discount');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:PaymentTerms/cbc:Note)[2]');

        // Allowances/Charges

        $this->assertXPathValue('/ubl:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator', 'true');
        $this->assertXPathValue('/ubl:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason', 'Insurance');
        $this->assertXPathValue('/ubl:CreditNote/cac:AllowanceCharge/cbc:Amount[@currencyID="EUR"]', '25.00');
        $this->assertXPathValue('/ubl:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 'S');
        $this->assertXPathValue('/ubl:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', '25.00');
        $this->assertXPathValue('/ubl:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 'VAT');

        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AllowanceCharge/cbc:Amount)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID)[2]');

        // Tax

        $this->assertXPathValue('/ubl:CreditNote/cac:TaxTotal/cbc:TaxAmount[@currencyID="EUR"]', '331.25');
        $this->assertXPathValue('/ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount[@currencyID="EUR"]', '1325.00');
        $this->assertXPathValue('/ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount[@currencyID="EUR"]', '331.25');
        $this->assertXPathValue('/ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 'S');
        $this->assertXPathValue('/ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', '25.00');
        $this->assertXPathValue('/ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:TaxTotal/cbc:TaxAmount)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID)[2]');

        // Summation

        $this->assertXPathValue('/ubl:CreditNote/cac:LegalMonetaryTotal/cbc:LineExtensionAmount[@currencyID="EUR"]', '1300.00');
        $this->assertXPathValue('/ubl:CreditNote/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount[@currencyID="EUR"]', '1325.00');
        $this->assertXPathValue('/ubl:CreditNote/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount[@currencyID="EUR"]', '1656.25');
        $this->assertXPathValue('/ubl:CreditNote/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount[@currencyID="EUR"]', '25.00');
        $this->assertXPathValue('/ubl:CreditNote/cac:LegalMonetaryTotal/cbc:PayableAmount[@currencyID="EUR"]', '1656.25');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:LegalMonetaryTotal/cbc:LineExtensionAmount)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:LegalMonetaryTotal/cbc:PayableAmount)[2]');
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

        $this->assertSame(112, static::$document->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::INFO));
        $this->assertSame(1, static::$document->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::WARNING));
        $this->assertSame(0, static::$document->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::ERROR));

        $this->assertSame(112, static::$document->countInfoMessagesInMessageBag());
        $this->assertSame(1, static::$document->countWarningMessagesInMessageBag());
        $this->assertSame(0, static::$document->countErrorMessagesInMessageBag());

        $this->assertArrayHasKey(0, static::$document->getInfoMessagesInMessageBag());
        $this->assertArrayHasKey(0, static::$document->getWarningMessagesInMessageBag());
        $this->assertArrayNotHasKey(0, static::$document->getErrorMessagesInMessageBag());
    }

    private function getStoreFilename(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            '00_case_xrechnung_ublcreditnote_simple_dto.xml'
        );
    }
}
