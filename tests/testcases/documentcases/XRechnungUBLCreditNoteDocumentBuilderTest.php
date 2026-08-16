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
        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity', '7.00', 'unitCode', 'DAY');
        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:CreditNoteLine/cbc:LineExtensionAmount', '2800.00', 'currencyID', 'EUR');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cbc:AccountingCost', 'Konteringsstreng');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID', '123');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description', 'Description of item');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name', 'item name');
        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID', '21382183120983', 'schemeID', '0088');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode', 'NO');
        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode', '09348023', 'listID', 'SRV');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID', 'S');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent', '25.00');
        $this->assertXPathValue('/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID', 'VAT');
        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:CreditNoteLine/cac:Price/cbc:PriceAmount', '400.00', 'currencyID', 'EUR');

        // Position 2

        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cbc:ID)[2]', '2');
        $this->assertXPathValueWithAttribute('(/ubl:CreditNote/cac:CreditNoteLine/cbc:CreditedQuantity)[2]', '-3.00', 'unitCode', 'DAY');
        $this->assertXPathValueWithAttribute('(/ubl:CreditNote/cac:CreditNoteLine/cbc:LineExtensionAmount)[2]', '-1500.00', 'currencyID', 'EUR');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:CreditNoteLine/cbc:AccountingCost)[2]');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cac:OrderLineReference/cbc:LineID)[2]', '123');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Description)[2]', 'Description 2');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cbc:Name)[2]', 'item name 2');
        $this->assertXPathValueWithAttribute('(/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:StandardItemIdentification/cbc:ID)[2]', '21382183120983', 'schemeID', '0088');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:OriginCountry/cbc:IdentificationCode)[2]', 'NO');
        $this->assertXPathValueWithAttribute('(/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:CommodityClassification/cbc:ItemClassificationCode)[2]', '09348023', 'listID', 'SRV');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:ID)[2]', 'S');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cbc:Percent)[2]', '25.00');
        $this->assertXPathValue('(/ubl:CreditNote/cac:CreditNoteLine/cac:Item/cac:ClassifiedTaxCategory/cac:TaxScheme/cbc:ID)[2]', 'VAT');
        $this->assertXPathValueWithAttribute('(/ubl:CreditNote/cac:CreditNoteLine/cac:Price/cbc:PriceAmount)[2]', '500.00', 'currencyID', 'EUR');

        // Header

        // Vendor

        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:AccountingSupplierParty/cac:Party/cbc:EndpointID', '9482348239847239874', 'schemeID', '0088');
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

        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID', 'FR23342', 'schemeID', '0002');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cbc:EndpointID)[2]');

        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID', 'FR23342', 'schemeID', '0002');
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
        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID', '39937423947', 'schemeID', '0183');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:RegistrationName)[2]');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:AccountingCustomerParty/cac:Party/cac:PartyLegalEntity/cbc:CompanyID)[2]');

        // Delivery

        $this->assertXPathValue('/ubl:CreditNote/cac:Delivery/cbc:ActualDeliveryDate', '2017-11-01');
        $this->assertXPathNotExists('(/ubl:CreditNote/cac:Delivery/cbc:ActualDeliveryDate)[2]');

        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:Delivery/cac:DeliveryLocation/cbc:ID', '9483759475923478', 'schemeID', '0088');
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
        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:AllowanceCharge/cbc:Amount', '25.00', 'currencyID', 'EUR');
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

        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:TaxTotal/cbc:TaxAmount', '331.25', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxableAmount', '1325.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:TaxTotal/cac:TaxSubtotal/cbc:TaxAmount', '331.25', 'currencyID', 'EUR');
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

        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:LegalMonetaryTotal/cbc:LineExtensionAmount', '1300.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:LegalMonetaryTotal/cbc:TaxExclusiveAmount', '1325.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:LegalMonetaryTotal/cbc:TaxInclusiveAmount', '1656.25', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:LegalMonetaryTotal/cbc:ChargeTotalAmount', '25.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithAttribute('/ubl:CreditNote/cac:LegalMonetaryTotal/cbc:PayableAmount', '1656.25', 'currencyID', 'EUR');
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
