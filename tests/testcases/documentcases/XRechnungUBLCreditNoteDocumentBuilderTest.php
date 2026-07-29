<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentcases;

use DateTime;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistCountryCodes;
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

final class XRechnungUBLCreditNoteDocumentBuilderTest extends TestCase
{
    use HandlesXmlTests;

    public static function setUpBeforeClass(): void
    {
        InvoiceSuiteSettings::setQuantityDecimals(2);
        InvoiceSuiteSettings::setUnitAmountDecimals(2);

        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('xrechnungublcreditnote');
        static::$document->setDocumentNo('Snippet1');
        static::$document->setDocumentDate(DateTime::createFromFormat('Ymd', '20171113'));
        static::$document->setDocumentType(InvoiceSuiteCodelistDocumentTypes::CREDIT_NOTE->value);
        static::$document->setDocumentNote('Please note we have a new phone number: 22 22 22 22');
        static::$document->setDocumentCurrency(InvoiceSuiteCodelistCurrencyCodes::EURO->value);
        static::$document->setDocumentPostingReference(newAccountId: '4025:123:4343');
        static::$document->setDocumentBuyerReference('0150abc');
        static::$document->setDocumentInvoiceReference('Snippet1');

        static::$document->setDocumentSellerCommunication('0088', '9482348239847239874');
        static::$document->setDocumentSellerId('99887766');
        static::$document->setDocumentSellerName('SupplierOfficialName Ltd');
        static::$document->setDocumentSellerLegalOrganisation(newId: 'GB983294', newName: 'SupplierTradingName Ltd.');
        static::$document->setDocumentSellerAddress(
            newAddressLine1: 'Main street 1',
            newAddressLine2: 'Postbox 123',
            newPostcode: 'GB 123 EW',
            newCity: 'London',
            newCountryId: InvoiceSuiteCodelistCountryCodes::VERE_KOEN->value
        );
        static::$document->setDocumentSellerTaxRegistration('VAT', 'GB1232434');
        static::$document->setDocumentSellerContact(
            newPersonName: 'Person Responsible',
            newPhoneNumber: '08154711',
            newEmailAddress: 'user@company.all'
        );

        static::$document->setDocumentBuyerCommunication('0002', 'FR23342');
        static::$document->setDocumentBuyerGlobalId('FR23342', '0002');
        static::$document->setDocumentBuyerName('Buyer Official Name');
        static::$document->setDocumentBuyerLegalOrganisation('0183', '39937423947', 'BuyerTradingName AS');
        static::$document->setDocumentBuyerAddress(
            newAddressLine1: 'Hovedgatan 32',
            newAddressLine2: 'Po box 878',
            newPostcode: '456 34',
            newCity: 'Stockholm',
            newCountryId: InvoiceSuiteCodelistCountryCodes::SCHWEDEN->value
        );
        static::$document->setDocumentBuyerTaxRegistration('VAT', 'SE4598375937');
        static::$document->setDocumentBuyerContact(
            newPersonName: 'Lisa Johnson',
            newPhoneNumber: '23434234',
            newEmailAddress: 'lj@buyer.se'
        );

        static::$document->setDocumentSupplyChainEvent(DateTime::createFromFormat('Ymd', '20171101'));

        static::$document->setDocumentShipToGlobalId('9483759475923478', '0088');
        static::$document->setDocumentShipToAddress(
            newAddressLine1: 'Delivery street 2',
            newAddressLine2: 'Building 56',
            newPostcode: '21234',
            newCity: 'Stockholm',
            newCountryId: InvoiceSuiteCodelistCountryCodes::SCHWEDEN->value
        );
        static::$document->setDocumentShipToName('Delivery party Name');

        static::$document->setDocumentPaymentMeanAsCreditTransferNoSepa(
            newPayeeIban: 'IBAN32423940',
            newPayeeAccountName: 'AccountName',
            newPayeeBic: 'BIC324098',
            newPaymentReference: 'Snippet1'
        );

        static::$document->setDocumentPaymentTerm('Payment within 10 days, 2% discount');

        static::$document->setDocumentAllowanceCharge(
            newChargeIndicator: true,
            newAllowanceChargeAmount: 25.00,
            newTaxCategory: 'S',
            newTaxType: 'VAT',
            newTaxPercent: 25.0,
            newAllowanceChargeReason: 'Insurance'
        );

        static::$document->setDocumentTax(
            newTaxCategory: 'S',
            newTaxType: 'VAT',
            newBasisAmount: 1325.00,
            newTaxAmount: 331.25,
            newTaxPercent: 25.0
        );

        static::$document->setDocumentSummation(
            newNetAmount: 1300.00,
            newChargeTotalAmount: 25.00,
            newTaxBasisAmount: 1325.00,
            newTaxTotalAmount: 331.25,
            newGrossAmount: 1656.25,
            newDueAmount: 1656.25
        );

        static::$document->addDocumentPosition('1');
        static::$document->setDocumentPositionQuantities(7, 'DAY');
        static::$document->setDocumentPositionSummation(2800.00);
        static::$document->setDocumentPositionPostingReference(newAccountId: 'Konteringsstreng');
        static::$document->setDocumentPositionBuyerOrderReference(newReferenceLineNumber: '123');
        static::$document->setDocumentPositionProductDetails(
            newProductName: 'item name',
            newProductDescription: 'Description of item',
            newProductGlobalId: '21382183120983',
            newProductGlobalIdType: '0088',
            newProductOriginTradeCountry: 'NO'
        );
        static::$document->setDocumentPositionProductClassification(
            newProductClassificationCode: '09348023',
            newProductClassificationListId: 'SRV'
        );
        static::$document->setDocumentPositionTax('S', 'VAT', newTaxPercent: 25.0);
        static::$document->setDocumentPositionNetPrice(400.00);

        static::$document->addDocumentPosition('2');
        static::$document->setDocumentPositionQuantities(-3, 'DAY');
        static::$document->setDocumentPositionSummation(-1500.00);
        static::$document->setDocumentPositionBuyerOrderReference(newReferenceLineNumber: '123');
        static::$document->setDocumentPositionProductDetails(
            newProductName: 'item name 2',
            newProductDescription: 'Description 2',
            newProductGlobalId: '21382183120983',
            newProductGlobalIdType: '0088',
            newProductOriginTradeCountry: 'NO'
        );
        static::$document->setDocumentPositionProductClassification(
            newProductClassificationCode: '09348023',
            newProductClassificationListId: 'SRV'
        );
        static::$document->setDocumentPositionTax('S', 'VAT', newTaxPercent: 25.0);
        static::$document->setDocumentPositionNetPrice(500.00);
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

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cbc:CustomizationID', 0, 'urn:cen.eu:en16931:2017#compliant#urn:xeinkauf.de:kosit:xrechnung_3.0');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cbc:CustomizationID', 1);
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cbc:ProfileID', 0, 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cbc:ProfileID', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cbc:ID', 0, 'Snippet1');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cbc:ID', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cbc:IssueDate', 0, '2017-11-13');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cbc:IssueDate', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cbc:CreditNoteTypeCode', 0, '381');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cbc:CreditNoteTypeCode', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cbc:Note', 0, 'Please note we have a new phone number: 22 22 22 22');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cbc:Note', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cbc:DocumentCurrencyCode', 0, 'EUR');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cbc:DocumentCurrencyCode', 1);

        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cbc:TaxCurrencyCode', 0);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cbc:TaxCurrencyCode', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cbc:BuyerReference', 0, '0150abc');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cbc:BuyerReference', 1);

        // Position (General)

        $this->assertXPathExistsWithIndex('//ubl:CreditNote/cac:CreditNoteLine', 0);
        $this->assertXPathExistsWithIndex('//ubl:CreditNote/cac:CreditNoteLine', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:CreditNoteLine', 2);

        // Position 1

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cbc:ID', 0, '1');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity', 0, '7.00', 'unitCode', 'DAY');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:CreditNoteLine/cbc:LineExtensionAmount', 0, '2800.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cbc:AccountingCost', 0, 'Konteringsstreng');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID', 0, '123');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description', 0, 'Description of item');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name', 0, 'item name');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 0, '21382183120983', 'schemeID', '0088');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 0, 'NO');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 0, '09348023', 'listID', 'SRV');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 0, 'S');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', 0, '25.00');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:CreditNoteLine/cac:Price/cbc:PriceAmount', 0, '400.00', 'currencyID', 'EUR');

        // Position 2

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cbc:ID', 1, '2');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity', 1, '-3.00', 'unitCode', 'DAY');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:CreditNoteLine/cbc:LineExtensionAmount', 1, '-1500.00', 'currencyID', 'EUR');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cbc:AccountingCost', 1);
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID', 1, '123');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description', 1, 'Description 2');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name', 1, 'item name 2');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID', 1, '21382183120983', 'schemeID', '0088');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 1, 'NO');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', 1, '09348023', 'listID', 'SRV');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 1, 'S');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', 1, '25.00');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 1, 'VAT');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:CreditNoteLine/cac:Price/cbc:PriceAmount', 1, '500.00', 'currencyID', 'EUR');

        // Header

        // Vendor

        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 0, '9482348239847239874', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, '99887766');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 0, 'SupplierTradingName Ltd.');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyName/cbc:Name', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 0, 'Main street 1');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:StreetName', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Postbox 123');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 0, 'London');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:CityName', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 0, 'GB 123 EW');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0, 'GB');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, 'GB1232434');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'SupplierOfficialName Ltd');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, 'GB983294');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 0, 'Person Responsible');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 0, '08154711');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 0, 'user@company.all');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:Telephone', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cac:Contact/cbc:ElectronicMail', 1);

        // Customer

        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 0, 'FR23342', 'schemeID', '0002');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 1);

        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 0, 'FR23342', 'schemeID', '0002');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 0, 'BuyerTradingName AS');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyName/cbc:Name', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 0, 'Hovedgatan 32');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:StreetName', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 0, 'Po box 878');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:AdditionalStreetName', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 0, 'Stockholm');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:CityName', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 0, '456 34');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cbc:PostalZone', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 0, 'SE');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PostalAddress/cac:Country/cbc:IdentificationCode', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 0, 'SE4598375937');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cbc:CompanyID', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyTaxScheme/cac:TaxScheme/cbc:ID', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 0, 'Buyer Official Name');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 0, '39937423947', 'schemeID', '0183');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', 1);

        // Delivery

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:Delivery/cbc:ActualDeliveryDate', 0, '2017-11-01');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:Delivery/cbc:ActualDeliveryDate', 1);

        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID', 0, '9483759475923478', 'schemeID', '0088');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName', 0, 'Delivery street 2');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName', 0, 'Building 56');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName', 0, 'Stockholm');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone', 0, '21234');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode', 0, 'SE');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:StreetName', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:AdditionalStreetName', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:CityName', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cbc:PostalZone', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cac:Address/cac:Country/cbc:IdentificationCode', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 0, 'Delivery party Name');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:Delivery/cac:DeliveryParty/cac:PartyName/cbc:Name', 1);

        // Payment

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode', 0, '30');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:PaymentMeans/cbc:PaymentID', 0, 'Snippet1');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID', 0, 'IBAN32423940');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name', 0, 'AccountName');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID', 0, 'BIC324098');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:PaymentMeans/cbc:PaymentMeansCode', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:PaymentMeans/cbc:PaymentID', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cbc:Name', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:PaymentMeans/cac:PayeeFinancialAccount/cac:FinancialInstitutionBranch/cbc:ID', 1);

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:PaymentTerms/cbc:Note', 0, 'Payment within 10 days, 2% discount');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:PaymentTerms/cbc:Note', 1);

        // Allowances/Charges

        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator', 0, 'true');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason', 0, 'Insurance');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:AllowanceCharge/cbc:Amount', 0, '25.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 0, 'S');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', 0, '25.00');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 0, 'VAT');

        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AllowanceCharge/cbc:ChargeIndicator', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AllowanceCharge/cbc:AllowanceChargeReason', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AllowanceCharge/cbc:Amount', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:AllowanceCharge/cac:TaxCategory/cac:TaxScheme/cbc:ID', 1);

        // Tax

        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:TaxTotal/cbc:TaxAmount', 0, '331.25', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', 0, '1325.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', 0, '331.25', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 0, 'S');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', 0, '25.00');
        $this->assertXPathValueWithIndex('//ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 0, 'VAT');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:TaxTotal/cbc:TaxAmount', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:ID', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cbc:Percent', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cac:TaxCategory/cac:TaxScheme/cbc:ID', 1);

        // Summation

        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', 0, '1300.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', 0, '1325.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', 0, '1656.25', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', 0, '25.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndexAndAttribute('//ubl:CreditNote/cac:LegalMonetaryTotal/cbc:PayableAmount', 0, '1656.25', 'currencyID', 'EUR');
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', 1);
        $this->assertXPathNotExistsWithIndex('//ubl:CreditNote/cac:LegalMonetaryTotal/cbc:PayableAmount', 1);
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

        $this->assertSame(116, static::$document->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::INFO));
        $this->assertSame(0, static::$document->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::WARNING));
        $this->assertSame(0, static::$document->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::ERROR));

        $this->assertSame(116, static::$document->countInfoMessagesInMessageBag());
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
            '00_case_xrechnung_ublcreditnote_simple.xml'
        );
    }
}
