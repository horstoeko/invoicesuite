<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentcases;

use DateTime;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistCurrencyCodes;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistDocumentTypes;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAddressDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAllowanceChargeDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteContactDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentPositionDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteNoteDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDiscountDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePeriodDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceGrossDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceNetDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductCharacteristicDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentExtDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceProductDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteServiceChargeDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteSummationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitesummationLineDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteSettings;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

final class InvoiceSuiteBuilderExtendedSimpleDTOTest extends TestCase
{
    use HandlesXmlTests;

    public static function setUpBeforeClass(): void
    {
        InvoiceSuiteSettings::setQuantityDecimals(4);
        InvoiceSuiteSettings::setUnitAmountDecimals(4);
        InvoiceSuiteSettings::setMeasureDecimals(0);

        $dtoDocumentHeader = (new InvoiceSuiteDocumentHeaderDTO())
            ->setNumber('R87654321012345')
            ->setDescription('WARENRECHNUNG')
            ->setType(InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE->value)
            ->setDate(DateTime::createFromFormat('Ymd', '20241115'))
            ->addNote(new InvoiceSuiteNoteDTO('Es bestehen Rabatt- oder Bonusvereinbarungen.', 'ST3', 'AAK'))
            ->addNote(new InvoiceSuiteNoteDTO('Der Verkäufer bleibt Eigentümer der Waren bis zu vollständigen Erfüllung der Kaufpreisforderung.', 'EEV', 'AAJ'))
            ->addNote(new InvoiceSuiteNoteDTO("MUSTERLIEFERANT GMBH\nBAHNHOFSTRASSE 99\n99199 MUSTERHAUSEN\nGeschäftsführung:\nMax Mustermann\nUSt-IdNr: DE123456789\nTelefon: +49 932 431 0\nwww.musterlieferant.de\nHRB Nr. 372876\nAmtsgericht Musterstadt\nGLN 4304171000002\nWEEE-Reg-Nr.: DE87654321\n", subjectCode: 'REG'))
            ->addNote(new InvoiceSuiteNoteDTO('Leergutwert: 46,50'))
            ->addNote(new InvoiceSuiteNoteDTO('Wichtige Information: Bei Bestellungen bis zum 19.12. ist die Auslieferung bis spätestens 23.12. garantiert.'))
            ->setCurrency(InvoiceSuiteCodelistCurrencyCodes::EURO->value)
            ->addBuyerReference((new InvoiceSuiteIdDTO())
                ->setId('SomeRef'))
            ->setIsTest(true)
            ->setSellerParty((new InvoiceSuitePartyDTO())
                ->addId((new InvoiceSuiteIdDTO())
                    ->setId('549910'))
                ->addGlobalId((new InvoiceSuiteIdDTO())
                    ->setId('4333741000005')
                    ->setIdType('0088'))
                ->addName('MUSTERLIEFERANT GMBH')
                ->addContact((new InvoiceSuiteContactDTO())
                    ->setPhoneNumber('+49 932 431 500')
                    ->setEmailAddress('max.mustermann@musterlieferant.de'))
                ->addAddress((new InvoiceSuiteAddressDTO())
                    ->setPostcode('99199')
                    ->setAddressLine1('BAHNHOFSTRASSE 99')
                    ->setCity('MUSTERHAUSEN')
                    ->setCountry('DE'))
                ->addTaxRegistration((new InvoiceSuiteIdDTO())
                    ->setId('DE123456789')
                    ->setIdType('VA')))
            ->setBuyerParty((new InvoiceSuitePartyDTO())
                ->addId((new InvoiceSuiteIdDTO())
                    ->setId('009420'))
                ->addGlobalId((new InvoiceSuiteIdDTO())
                    ->setId('4304171000002')
                    ->setIdType('0088'))
                ->addName('MUSTER-KUNDE GMBH')
                ->addAddress((new InvoiceSuiteAddressDTO())
                    ->setPostcode('40235')
                    ->setAddressLine1('KUNDENWEG 88')
                    ->setCity('DUESSELDORF')
                    ->setCountry('DE')))
            ->addBuyerOrderReference((new InvoiceSuiteReferenceDocumentDTO())
                ->setReferenceNumber('B123456789'))
            ->addAdditionalReference((new InvoiceSuiteReferenceDocumentExtDTO())
                ->setReferenceNumber('A456123')
                ->setTypeCode('130'))
            ->setShipToParty((new InvoiceSuitePartyDTO())
                ->addGlobalId((new InvoiceSuiteIdDTO())
                    ->setId('4304171088093')
                    ->setIdType('0088'))
                ->addName('MUSTER-MARKT')
                ->addContact((new InvoiceSuiteContactDTO())
                    ->setDepartmentName('8211'))
                ->addAddress((new InvoiceSuiteAddressDTO())
                    ->setPostcode('31157')
                    ->setAddressLine1('HAUPTSTRASSE 44')
                    ->setCity('SARSTEDT')
                    ->setCountry('DE')))
            ->addSupplyChainEvent(DateTime::createFromFormat('Ymd', '20180805'))
            ->addDeliveryNoteReference((new InvoiceSuiteReferenceDocumentDTO())
                ->setReferenceNumber('L87654321012345'))
            ->setInvoiceeParty((new InvoiceSuitePartyDTO())
                ->addId((new InvoiceSuiteIdDTO())
                    ->setId('009420'))
                ->addGlobalId((new InvoiceSuiteIdDTO())
                    ->setId('4304171000002')
                    ->setIdType('0088'))
                ->addName('MUSTER-KUNDE GMBH')
                ->addAddress((new InvoiceSuiteAddressDTO())
                    ->setPostcode('40235')
                    ->setAddressLine1('KUNDENWEG 88')
                    ->setCity('DUESSELDORF')
                    ->setCountry('DE')))
            ->addTax((new InvoiceSuiteTaxDTO())
                ->setAmount(61.07)
                ->setType('VAT')
                ->setBasisAmount(321.40)
                ->setCategory('S')
                ->setPercent(19.00))
            ->addTax((new InvoiceSuiteTaxDTO())
                ->setAmount(8.93)
                ->setType('VAT')
                ->setBasisAmount(127.59)
                ->setCategory('S')
                ->setPercent(7.00))
            ->addAllowanceCharge((new InvoiceSuiteAllowanceChargeDTO())
                ->setChargeIndicator(false)
                ->setPercent(2.00)
                ->setBaseAmount(280.00)
                ->setAmount(5.60)
                ->setReason('Rechnungsrabatt 1')
                ->setTaxType('VAT')
                ->setTaxCategory('S')
                ->setTaxPercent(19.00))
            ->addAllowanceCharge((new InvoiceSuiteAllowanceChargeDTO())
                ->setChargeIndicator(false)
                ->setPercent(2.00)
                ->setBaseAmount(130.70)
                ->setAmount(2.61)
                ->setReason('Rechnungsrabatt 1')
                ->setTaxType('VAT')
                ->setTaxCategory('S')
                ->setTaxPercent(7.00))
            ->addAllowanceCharge((new InvoiceSuiteAllowanceChargeDTO())
                ->setChargeIndicator(false)
                ->setBaseAmount(280.00)
                ->setAmount(2.50)
                ->setReason('Rechnungsrabatt 2')
                ->setTaxType('VAT')
                ->setTaxCategory('S')
                ->setTaxPercent(19.00))
            ->addAllowanceCharge((new InvoiceSuiteAllowanceChargeDTO())
                ->setChargeIndicator(false)
                ->setBaseAmount(130.70)
                ->setAmount(0.50)
                ->setReason('Rechnungsrabatt 2')
                ->setTaxType('VAT')
                ->setTaxCategory('S')
                ->setTaxPercent(7.00))
            ->addServiceCharge((new InvoiceSuiteServiceChargeDTO())
                ->setDescription('Transportkosten')
                ->setAmount(3.00)
                ->setTaxType('VAT')
                ->setTaxCategory('S')
                ->setTaxPercent(19.00))
            ->addPaymentTerm((new InvoiceSuitePaymentTermDTO())
                ->setDescription('Bei Zahlung innerhalb 14 Tagen gewähren wir 2,0% Skonto.')
                ->addDiscountTerm((new InvoiceSuitePaymentTermDiscountDTO())
                    ->setPeriod((new InvoiceSuitePeriodDTO())
                        ->setPeriod(14.0)
                        ->setPeriodUnit('DAY'))
                    ->setDiscountPercent(2.00)))
            ->addSummation((new InvoiceSuiteSummationDTO())
                ->setNetAmount(457.20)
                ->setChargeTotalAmount(3.00)
                ->setDiscountTotalAmount(11.21)
                ->setTaxBasisAmount(448.99)
                ->setTaxTotalAmount(70.00)
                ->setGrossAmount(518.99)
                ->setPrepaidAmount(0.00)
                ->setDueAmount(518.99));

        $dtoDocumentPositionOne = (new InvoiceSuiteDocumentPositionDTO())
            ->setLineId('1')
            ->setProduct((new InvoiceSuiteProductDTO())
                ->setGlobalId((new InvoiceSuiteIdDTO())
                    ->setId('4123456000014')
                    ->setIdType('0160'))
                ->setSellerId('ZS997')
                ->setName('Zitronensäure 100ml')
                ->addCharacteristic((new InvoiceSuiteProductCharacteristicDTO())
                    ->setDescription('Verpackungsart')
                    ->setValue('BO')))
            ->setGrossPrice((new InvoiceSuitePriceGrossDTO())
                ->setAmount(1.0000))
            ->setNetPrice((new InvoiceSuitePriceNetDTO())
                ->setAmount(1.0000))
            ->setQuantityBilled((new InvoiceSuiteQuantityDTO())
                ->setQuantity(100.0000)
                ->setQuantityUnit('H87'))
            ->setQuantityPackage((new InvoiceSuiteQuantityDTO())
                ->setQuantity(4.0000)
                ->setQuantityUnit('XCT'))
            ->addTax((new InvoiceSuiteTaxDTO())
                ->setCategory('S')
                ->setType('VAT')
                ->setPercent(19.0))
            ->setSummation((new InvoiceSuitesummationLineDTO())
                ->setNetAmount(100.00));

        $dtoDocumentPositionTwo = (new InvoiceSuiteDocumentPositionDTO())
            ->setLineId('2')
            ->setProduct((new InvoiceSuiteProductDTO())
                ->setGlobalId((new InvoiceSuiteIdDTO())
                    ->setId('4123456000021')
                    ->setIdType('0160'))
                ->setSellerId('GZ250')
                ->setName('Gelierzucker Extra 250g'))
            ->setGrossPrice((new InvoiceSuitePriceGrossDTO())
                ->setAmount(1.5000)
                ->addAllowanceCharge((new InvoiceSuiteAllowanceChargeDTO())
                    ->setAmount(0.03)
                    ->setChargeIndicator(false)
                    ->setReason('Artikelrabatt 1'))
                ->addAllowanceCharge((new InvoiceSuiteAllowanceChargeDTO())
                    ->setAmount(0.02)
                    ->setChargeIndicator(false)
                    ->setReason('Artikelrabatt 2')))
            ->setNetPrice((new InvoiceSuitePriceNetDTO())
                ->setAmount(1.4500))
            ->setQuantityBilled((new InvoiceSuiteQuantityDTO())
                ->setQuantity(50.0000)
                ->setQuantityUnit('H87'))
            ->setQuantityPackage((new InvoiceSuiteQuantityDTO())
                ->setQuantity(1.0000)
                ->setQuantityUnit('XCT'))
            ->addTax((new InvoiceSuiteTaxDTO())
                ->setCategory('S')
                ->setType('VAT')
                ->setPercent(7.0))
            ->setSummation((new InvoiceSuitesummationLineDTO())
                ->setNetAmount(72.50));

        $dtoDocumentPositionThree = (new InvoiceSuiteDocumentPositionDTO())
            ->setLineId('3')
            ->setProduct((new InvoiceSuiteProductDTO())
                ->setGlobalId((new InvoiceSuiteIdDTO())
                    ->setId('4123456000021')
                    ->setIdType('0160'))
                ->setSellerId('GZ250')
                ->setName('Gelierzucker Extra 250g')
                ->setDescription('Artikel wie vereinbart ohne Berechnung'))
            ->setGrossPrice((new InvoiceSuitePriceGrossDTO())
                ->setAmount(0.0000))
            ->setNetPrice((new InvoiceSuitePriceNetDTO())
                ->setAmount(0.0000))
            ->setQuantityBilled((new InvoiceSuiteQuantityDTO())
                ->setQuantity(10.0000)
                ->setQuantityUnit('H87'))
            ->setQuantityPackage((new InvoiceSuiteQuantityDTO())
                ->setQuantity(1.0000)
                ->setQuantityUnit('XCT'))
            ->addTax((new InvoiceSuiteTaxDTO())
                ->setCategory('S')
                ->setType('VAT')
                ->setPercent(7.0))
            ->setSummation((new InvoiceSuitesummationLineDTO())
                ->setNetAmount(0.00));

        $dtoDocumentPositionFour = (new InvoiceSuiteDocumentPositionDTO())
            ->setLineId('4')
            ->setProduct((new InvoiceSuiteProductDTO())
                ->setGlobalId((new InvoiceSuiteIdDTO())
                    ->setId('4100130013294')
                    ->setIdType('0160'))
                ->setSellerId('2031')
                ->setName('Bierbrau Pils 20/0500')
                ->setDescription('EAN-VKE: 4100130913297')
                ->addCharacteristic((new InvoiceSuiteProductCharacteristicDTO())
                    ->setDescription('Verpackung')
                    ->setValue('Kiste')))
            ->setGrossPrice((new InvoiceSuitePriceGrossDTO())
                ->setAmount(12.0000))
            ->setNetPrice((new InvoiceSuitePriceNetDTO())
                ->setAmount(12.0000))
            ->setQuantityBilled((new InvoiceSuiteQuantityDTO())
                ->setQuantity(15.0000)
                ->setQuantityUnit('XBC'))
            ->setQuantityPackage((new InvoiceSuiteQuantityDTO())
                ->setQuantity(20.0000)
                ->setQuantityUnit('XBO'))
            ->addTax((new InvoiceSuiteTaxDTO())
                ->setCategory('S')
                ->setType('VAT')
                ->setPercent(19.0))
            ->setSummation((new InvoiceSuitesummationLineDTO())
                ->setNetAmount(180.00));

        $dtoDocumentPositionFive = (new InvoiceSuiteDocumentPositionDTO())
            ->setLineId('5')
            ->setProduct((new InvoiceSuiteProductDTO())
                ->setGlobalId((new InvoiceSuiteIdDTO())
                    ->setId('2001015001325')
                    ->setIdType('0160'))
                ->setSellerId('1805')
                ->setName('Leergutpfand 20 x 0,5l')
                ->addCharacteristic((new InvoiceSuiteProductCharacteristicDTO())
                    ->setDescription('Verpackung')
                    ->setValue('unverpackt')))
            ->setGrossPrice((new InvoiceSuitePriceGrossDTO())
                ->setAmount(3.1000))
            ->setNetPrice((new InvoiceSuitePriceNetDTO())
                ->setAmount(3.1000))
            ->setQuantityBilled((new InvoiceSuiteQuantityDTO())
                ->setQuantity(15.0000)
                ->setQuantityUnit('C62'))
            ->setQuantityPackage((new InvoiceSuiteQuantityDTO())
                ->setQuantity(1.0000)
                ->setQuantityUnit('XBC'))
            ->addTax((new InvoiceSuiteTaxDTO())
                ->setCategory('S')
                ->setType('VAT')
                ->setPercent(19.0))
            ->setSummation((new InvoiceSuitesummationLineDTO())
                ->setNetAmount(46.50));

        $dtoDocumentPositionSix = (new InvoiceSuiteDocumentPositionDTO())
            ->setLineId('6')
            ->setProduct((new InvoiceSuiteProductDTO())
                ->setGlobalId((new InvoiceSuiteIdDTO())
                    ->setId('4123456000038')
                    ->setIdType('0160'))
                ->setSellerId('MP107')
                ->setName('Mischpalette Joghurt Karton 3 x 20')
                ->addCharacteristic((new InvoiceSuiteProductCharacteristicDTO())
                    ->setDescription('Verpackung')
                    ->setValue('Karton'))
                ->addReferenceProduct((new InvoiceSuiteReferenceProductDTO())
                    ->setGlobalId((new InvoiceSuiteIdDTO())
                        ->setId('4123456001035')
                        ->setIdType('0160'))
                    ->setSellerId('JOG103')
                    ->setName('Erdbeer 20 x 150g Becher')
                    ->setUnitQuantity((new InvoiceSuiteQuantityDTO())
                        ->setQuantity(20.00000)
                        ->setQuantityUnit('C62')))
                ->addReferenceProduct((new InvoiceSuiteReferenceProductDTO())
                    ->setGlobalId((new InvoiceSuiteIdDTO())
                        ->setId('4123456002032')
                        ->setIdType('0160'))
                    ->setSellerId('JOG203')
                    ->setName('Banane 20 x 150g Becher')
                    ->setUnitQuantity((new InvoiceSuiteQuantityDTO())
                        ->setQuantity(20.00000)
                        ->setQuantityUnit('C62')))
                ->addReferenceProduct((new InvoiceSuiteReferenceProductDTO())
                    ->setGlobalId((new InvoiceSuiteIdDTO())
                        ->setId('4123456003039')
                        ->setIdType('0160'))
                    ->setSellerId('JOG303')
                    ->setName('Schoko 20 x 150g Becher')
                    ->setUnitQuantity((new InvoiceSuiteQuantityDTO())
                        ->setQuantity(20.00000)
                        ->setQuantityUnit('C62'))))
            ->setGrossPrice((new InvoiceSuitePriceGrossDTO())
                ->setAmount(30.0000)
                ->addAllowanceCharge((new InvoiceSuiteAllowanceChargeDTO())
                    ->setAmount(0.90)
                    ->setChargeIndicator(false)
                    ->setReason('Artikelrabatt 1')))
            ->setNetPrice((new InvoiceSuitePriceNetDTO())
                ->setAmount(29.10000))
            ->setQuantityBilled((new InvoiceSuiteQuantityDTO())
                ->setQuantity(2.0000)
                ->setQuantityUnit('C62'))
            ->setQuantityPackage((new InvoiceSuiteQuantityDTO())
                ->setQuantity(1.0000)
                ->setQuantityUnit('XPX'))
            ->addTax((new InvoiceSuiteTaxDTO())
                ->setCategory('S')
                ->setType('VAT')
                ->setPercent(7.0))
            ->setSummation((new InvoiceSuitesummationLineDTO())
                ->setNetAmount(58.20000));

        $dtoDocumentHeader->addPosition($dtoDocumentPositionOne);
        $dtoDocumentHeader->addPosition($dtoDocumentPositionTwo);
        $dtoDocumentHeader->addPosition($dtoDocumentPositionThree);
        $dtoDocumentHeader->addPosition($dtoDocumentPositionFour);
        $dtoDocumentHeader->addPosition($dtoDocumentPositionFive);
        $dtoDocumentHeader->addPosition($dtoDocumentPositionSix);

        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('zffxextended');
        static::$document->createFromDTO($dtoDocumentHeader);
    }

    public static function tearDownAfterClass(): void
    {
        InvoiceSuiteSettings::setQuantityDecimals(2);
        InvoiceSuiteSettings::setUnitAmountDecimals(2);
        InvoiceSuiteSettings::setMeasureDecimals(2);
    }

    public function testXmlOutput(): void
    {
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:BusinessProcessSpecifiedDocumentContextParameter/ram:ID', 0, 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:BusinessProcessSpecifiedDocumentContextParameter/ram:ID', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:GuidelineSpecifiedDocumentContextParameter/ram:ID', 0, 'urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:GuidelineSpecifiedDocumentContextParameter/ram:ID', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:ID', 0, 'R87654321012345');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:ID', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:Name', 0, 'WARENRECHNUNG');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:Name', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:TypeCode', 0, '380');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:TypeCode', 1);

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IssueDateTime/udt:DateTimeString', 0, '20241115', 'format', '102');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IssueDateTime/udt:DateTimeString', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 0, 'Es bestehen Rabatt- oder Bonusvereinbarungen.');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 0, 'ST3');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 0, 'AAK');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 1, 'Der Verkäufer bleibt Eigentümer der Waren bis zu vollständigen Erfüllung der Kaufpreisforderung.');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 1, 'EEV');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 1, 'AAJ');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 2, "MUSTERLIEFERANT GMBH\nBAHNHOFSTRASSE 99\n99199 MUSTERHAUSEN\nGeschäftsführung:\nMax Mustermann\nUSt-IdNr: DE123456789\nTelefon: +49 932 431 0\nwww.musterlieferant.de\nHRB Nr. 372876\nAmtsgericht Musterstadt\nGLN 4304171000002\nWEEE-Reg-Nr.: DE87654321\n");
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 2);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 2, 'REG');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 3, 'Leergutwert: 46,50');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 3);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 3);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 4, 'Wichtige Information: Bei Bestellungen bis zum 19.12. ist die Auslieferung bis spätestens 23.12. garantiert.');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 4);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 4);

        // Position 1

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:AssociatedDocumentLineDocument/ram:LineID', 0, '1');

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:GlobalID', 0, '4123456000014', 'schemeID', '0160');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:SellerAssignedID', 0, 'ZS997');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Name', 0, 'Zitronensäure 100ml');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:ApplicableProductCharacteristic/ram:Description', 0, 'Verpackungsart');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:ApplicableProductCharacteristic/ram:Value', 0, 'BO');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount', 0, '1.0000');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount', 0, '1.0000');

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:BilledQuantity', 0, '100.0000', 'unitCode', 'H87');
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:PackageQuantity', 0, '4.0000', 'unitCode', 'XCT');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 0, 'VAT');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 0, 'S');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent', 0, '19.00');

        // Position 2

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:AssociatedDocumentLineDocument/ram:LineID', 1, '2');

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:GlobalID', 1, '4123456000021', 'schemeID', '0160');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:SellerAssignedID', 1, 'GZ250');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Name', 1, 'Gelierzucker Extra 250g');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount', 1, '1.5000');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:ChargeIndicator/udt:Indicator', 0, 'false');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:ActualAmount', 0, '0.03');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:Reason', 0, 'Artikelrabatt 1');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:ChargeIndicator/udt:Indicator', 1, 'false');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:ActualAmount', 1, '0.02');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:Reason', 1, 'Artikelrabatt 2');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount', 1, '1.4500');

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:BilledQuantity', 1, '50.0000', 'unitCode', 'H87');
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:PackageQuantity', 1, '1.0000', 'unitCode', 'XCT');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 1, 'VAT');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 1, 'S');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent', 1, '7.00');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:SpecifiedTradeSettlementLineMonetarySummation/ram:LineTotalAmount', 1, '72.50');

        // Position 3

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:AssociatedDocumentLineDocument/ram:LineID', 2, '3');

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:GlobalID', 2, '4123456000021', 'schemeID', '0160');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:SellerAssignedID', 2, 'GZ250');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Name', 2, 'Gelierzucker Extra 250g');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Description', 0, 'Artikel wie vereinbart ohne Berechnung');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount', 2, '0.0000');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount', 2, '0.0000');

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:BilledQuantity', 2, '10.0000', 'unitCode', 'H87');
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:PackageQuantity', 2, '1.0000', 'unitCode', 'XCT');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 2, 'VAT');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 2, 'S');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent', 2, '7.00');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:SpecifiedTradeSettlementLineMonetarySummation/ram:LineTotalAmount', 2, '0.00');

        // Position 4

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:AssociatedDocumentLineDocument/ram:LineID', 3, '4');

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:GlobalID', 3, '4100130013294', 'schemeID', '0160');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:SellerAssignedID', 3, '2031');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Name', 3, 'Bierbrau Pils 20/0500');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Description', 1, 'EAN-VKE: 4100130913297');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:ApplicableProductCharacteristic/ram:Description', 1, 'Verpackung');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:ApplicableProductCharacteristic/ram:Value', 1, 'Kiste');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount', 3, '12.0000');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount', 3, '12.0000');

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:BilledQuantity', 3, '15.0000', 'unitCode', 'XBC');
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:PackageQuantity', 3, '20.0000', 'unitCode', 'XBO');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 3, 'VAT');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 3, 'S');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent', 3, '19.00');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:SpecifiedTradeSettlementLineMonetarySummation/ram:LineTotalAmount', 3, '180.00');

        // Position 5

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:AssociatedDocumentLineDocument/ram:LineID', 4, '5');

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:GlobalID', 4, '2001015001325', 'schemeID', '0160');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:SellerAssignedID', 4, '1805');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Name', 4, 'Leergutpfand 20 x 0,5l');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Description', 2);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount', 4, '3.1000');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount', 4, '3.1000');

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:BilledQuantity', 4, '15.0000', 'unitCode', 'C62');
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:PackageQuantity', 4, '1.0000', 'unitCode', 'XBC');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 4, 'VAT');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 4, 'S');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent', 4, '19.00');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:SpecifiedTradeSettlementLineMonetarySummation/ram:LineTotalAmount', 4, '46.50');

        // Position 6

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:AssociatedDocumentLineDocument/ram:LineID', 5, '6');

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:GlobalID', 5, '4123456000038', 'schemeID', '0160');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:SellerAssignedID', 5, 'MP107');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Name', 5, 'Mischpalette Joghurt Karton 3 x 20');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Description', 3);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:ApplicableProductCharacteristic/ram:Description', 3, 'Verpackung');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:ApplicableProductCharacteristic/ram:Value', 3, 'Karton');

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:GlobalID', 0, '4123456001035', 'schemeID', '0160');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:SellerAssignedID', 0, 'JOG103');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:Name', 0, 'Erdbeer 20 x 150g Becher');
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:UnitQuantity', 0, '20.0000', 'unitCode', 'C62');

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:GlobalID', 1, '4123456002032', 'schemeID', '0160');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:SellerAssignedID', 1, 'JOG203');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:Name', 1, 'Banane 20 x 150g Becher');
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:UnitQuantity', 1, '20.0000', 'unitCode', 'C62');

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:GlobalID', 2, '4123456003039', 'schemeID', '0160');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:SellerAssignedID', 2, 'JOG303');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:Name', 2, 'Schoko 20 x 150g Becher');
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:UnitQuantity', 2, '20.0000', 'unitCode', 'C62');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount', 5, '30.0000');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:ChargeIndicator/udt:Indicator', 2, 'false');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:ActualAmount', 2, '0.90');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:Reason', 2, 'Artikelrabatt 1');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount', 5, '29.1000');

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:BilledQuantity', 5, '2.0000', 'unitCode', 'C62');
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:PackageQuantity', 5, '1.0000', 'unitCode', 'XPX');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 5, 'VAT');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 5, 'S');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent', 5, '7.00');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:SpecifiedTradeSettlementLineMonetarySummation/ram:LineTotalAmount', 5, '58.20');

        // Header

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerReference', 0, 'SomeRef');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:ID', 0, '549910');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:ID', 1);
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:GlobalID', 0, '4333741000005', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:GlobalID', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:Name', 0, 'MUSTERLIEFERANT GMBH');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:Name', 1);
        $this->assertXPathExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:DefinedTradeContact', 0);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:DefinedTradeContact/ram:TelephoneUniversalCommunication/ram:CompleteNumber', 0, '+49 932 431 500');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:DefinedTradeContact/ram:EmailURIUniversalCommunication/ram:URIID', 0, 'max.mustermann@musterlieferant.de');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:DefinedTradeContact', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:PostcodeCode', 0, '99199');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:PostcodeCode', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:LineOne', 0, 'BAHNHOFSTRASSE 99');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:LineTwo', 1);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:LineThree', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:CityName', 0, 'MUSTERHAUSEN');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:CityName', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:CountryID', 0, 'DE');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:CountryID', 1);
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:SpecifiedTaxRegistration/ram:ID', 0, 'DE123456789', 'schemeID', 'VA');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:SpecifiedTaxRegistration/ram:ID', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:ID', 0, '009420');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:ID', 1);
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:GlobalID', 0, '4304171000002', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:GlobalID', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:Name', 0, 'MUSTER-KUNDE GMBH');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:Name', 1);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:Name', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:PostcodeCode', 0, '40235');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:PostcodeCode', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:LineOne', 0, 'KUNDENWEG 88');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:LineTwo', 1);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:LineThree', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:CityName', 0, 'DUESSELDORF');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:CityName', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:CountryID', 0, 'DE');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:CountryID', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID', 0, 'B123456789');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 0, 'A456123');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 0, '130');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 1);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', 1);

        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:ID', 0);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:ID', 1);
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:GlobalID', 0, '4304171088093', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:GlobalID', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:Name', 0, 'MUSTER-MARKT');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:Name', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:DefinedTradeContact/ram:DepartmentName', 0, '8211');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:DefinedTradeContact/ram:DepartmentName', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:PostcodeCode', 0, '31157');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:PostcodeCode', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:LineOne', 0, 'HAUPTSTRASSE 44');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:LineTwo', 1);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:LineThree', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:CityName', 0, 'SARSTEDT');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:CityName', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:CountryID', 0, 'DE');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:CountryID', 1);

        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ActualDeliverySupplyChainEvent/ram:OccurrenceDateTime/udt:DateTimeString', 0, '20180805', 'format', '102');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ActualDeliverySupplyChainEvent/ram:OccurrenceDateTime/udt:DateTimeString', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:IssuerAssignedID', 0, 'L87654321012345');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:IssuerAssignedID', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceCurrencyCode', 0, 'EUR');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceCurrencyCode', 1);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:TaxCurrencyCode', 0);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:TaxCurrencyCode', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:ID', 0, '009420');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:ID', 1);
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:GlobalID', 0, '4304171000002', 'schemeID', '0088');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:GlobalID', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:Name', 0, 'MUSTER-KUNDE GMBH');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:Name', 1);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:Name', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:PostcodeCode', 0, '40235');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:PostcodeCode', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:LineOne', 0, 'KUNDENWEG 88');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:LineTwo', 1);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:LineThree', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:CityName', 0, 'DUESSELDORF');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:CityName', 1);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:CountryID', 0, 'DE');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:CountryID', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CalculatedAmount', 0, '61.07');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 0, 'VAT');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:BasisAmount', 0, '321.40');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 0, 'S');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent', 0, '19.00');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CalculatedAmount', 1, '8.93');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 1, 'VAT');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:BasisAmount', 1, '127.59');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 1, 'S');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent', 1, '7.00');

        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CalculatedAmount', 2);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 2);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:BasisAmount', 2);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 2);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent', 2);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:ChargeIndicator/udt:Indicator', 0, 'false');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CalculationPercent', 0, '2.00');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:BasisAmount', 0, '280.00');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:ActualAmount', 0, '5.60');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:Reason', 0, 'Rechnungsrabatt 1');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:TypeCode', 0, 'VAT');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:CategoryCode', 0, 'S');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:RateApplicablePercent', 0, '19.00');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:ChargeIndicator/udt:Indicator', 1, 'false');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CalculationPercent', 1, '2.00');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:BasisAmount', 1, '130.70');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:ActualAmount', 1, '2.61');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:Reason', 1, 'Rechnungsrabatt 1');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:TypeCode', 1, 'VAT');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:CategoryCode', 1, 'S');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:RateApplicablePercent', 1, '7.00');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:ChargeIndicator/udt:Indicator', 2, 'false');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CalculationPercent', 2);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:BasisAmount', 2, '280.00');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:ActualAmount', 2, '2.50');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:Reason', 2, 'Rechnungsrabatt 2');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:TypeCode', 2, 'VAT');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:CategoryCode', 2, 'S');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:RateApplicablePercent', 2, '19.00');

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:ChargeIndicator/udt:Indicator', 3, 'false');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CalculationPercent', 3);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:BasisAmount', 3, '130.70');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:ActualAmount', 3, '0.50');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:Reason', 3, 'Rechnungsrabatt 2');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:TypeCode', 3, 'VAT');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:CategoryCode', 3, 'S');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:RateApplicablePercent', 3, '7.00');

        $this->assertXPathExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedLogisticsServiceCharge', 0);
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedLogisticsServiceCharge/ram:Description', 0, 'Transportkosten');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedLogisticsServiceCharge/ram:AppliedAmount', 0, '3.00');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedLogisticsServiceCharge/ram:AppliedTradeTax/ram:TypeCode', 0, 'VAT');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedLogisticsServiceCharge/ram:AppliedTradeTax/ram:CategoryCode', 0, 'S');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedLogisticsServiceCharge/ram:AppliedTradeTax/ram:RateApplicablePercent', 0, '19.00');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedLogisticsServiceCharge', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description', 0, 'Bei Zahlung innerhalb 14 Tagen gewähren wir 2,0% Skonto.');
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:ApplicableTradePaymentDiscountTerms/ram:BasisPeriodMeasure', 0, '14', 'unitCode', 'DAY');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:ApplicableTradePaymentDiscountTerms/ram:CalculationPercent', 0, '2.00');
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description', 1);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:ApplicableTradePaymentDiscountTerms/ram:BasisPeriodMeasure', 1);
        $this->assertXPathNotExistsWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:ApplicableTradePaymentDiscountTerms/ram:CalculationPercent', 1);

        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:LineTotalAmount', 0, '457.20');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:ChargeTotalAmount', 0, '3.00');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:AllowanceTotalAmount', 0, '11.21');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:TaxBasisTotalAmount', 0, '448.99');
        $this->assertXPathValueWithIndexAndAttribute('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:TaxTotalAmount', 0, '70.00', 'currencyID', 'EUR');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:GrandTotalAmount', 0, '518.99');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:TotalPrepaidAmount', 0, '0.00');
        $this->assertXPathValueWithIndex('//rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:DuePayableAmount', 0, '518.99');
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
            '00_case_extended_simple_dto.xml'
        );
    }
}
