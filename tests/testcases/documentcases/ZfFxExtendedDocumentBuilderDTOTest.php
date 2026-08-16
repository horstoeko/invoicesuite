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
use horstoeko\invoicesuite\documents\providers\zffx\InvoiceSuiteZfFxProviderBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteSettings;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use horstoeko\invoicesuite\utils\InvoiceSuiteMessageSeverity;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;

final class ZfFxExtendedDocumentBuilderDTOTest extends TestCase
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
            ->addDeliveryTerm((new InvoiceSuiteIdDTO())
                ->setId('1'))
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
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:BusinessProcessSpecifiedDocumentContextParameter/ram:ID', 'urn:fdc:peppol.eu:2017:poacc:billing:01:1.0');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:BusinessProcessSpecifiedDocumentContextParameter/ram:ID)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:GuidelineSpecifiedDocumentContextParameter/ram:ID', 'urn:cen.eu:en16931:2017#conformant#urn:factur-x.eu:1p0:extended');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocumentContext/ram:GuidelineSpecifiedDocumentContextParameter/ram:ID)[2]');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:ID', 'R87654321012345');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:ID)[2]');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:Name', 'WARENRECHNUNG');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:Name)[2]');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:TypeCode', '380');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:TypeCode)[2]');

        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IssueDateTime/udt:DateTimeString', '20241115', 'format', '102');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IssueDateTime/udt:DateTimeString)[2]');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content', 'Es bestehen Rabatt- oder Bonusvereinbarungen.');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode', 'ST3');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode', 'AAK');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content)[2]', 'Der Verkäufer bleibt Eigentümer der Waren bis zu vollständigen Erfüllung der Kaufpreisforderung.');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode)[2]', 'EEV');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode)[2]', 'AAJ');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content)[3]', "MUSTERLIEFERANT GMBH\nBAHNHOFSTRASSE 99\n99199 MUSTERHAUSEN\nGeschäftsführung:\nMax Mustermann\nUSt-IdNr: DE123456789\nTelefon: +49 932 431 0\nwww.musterlieferant.de\nHRB Nr. 372876\nAmtsgericht Musterstadt\nGLN 4304171000002\nWEEE-Reg-Nr.: DE87654321\n");
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode)[3]');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode)[3]', 'REG');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content)[4]', 'Leergutwert: 46,50');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode)[4]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode)[4]');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:Content)[5]', 'Wichtige Information: Bei Bestellungen bis zum 19.12. ist die Auslieferung bis spätestens 23.12. garantiert.');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:ContentCode)[5]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:ExchangedDocument/ram:IncludedNote/ram:SubjectCode)[5]');

        // Position 1

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:AssociatedDocumentLineDocument/ram:LineID', '1');

        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:GlobalID', '4123456000014', 'schemeID', '0160');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:SellerAssignedID', 'ZS997');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Name', 'Zitronensäure 100ml');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:ApplicableProductCharacteristic/ram:Description', 'Verpackungsart');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:ApplicableProductCharacteristic/ram:Value', 'BO');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount', '1.0000');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount', '1.0000');

        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:BilledQuantity', '100.0000', 'unitCode', 'H87');
        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:PackageQuantity', '4.0000', 'unitCode', 'XCT');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 'VAT');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 'S');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent', '19.00');

        // Position 2

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:AssociatedDocumentLineDocument/ram:LineID)[2]', '2');

        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:GlobalID)[2]', '4123456000021', 'schemeID', '0160');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:SellerAssignedID)[2]', 'GZ250');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Name)[2]', 'Gelierzucker Extra 250g');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount)[2]', '1.5000');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:ChargeIndicator/udt:Indicator', 'false');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:ActualAmount', '0.03');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:Reason', 'Artikelrabatt 1');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:ChargeIndicator/udt:Indicator)[2]', 'false');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:ActualAmount)[2]', '0.02');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:Reason)[2]', 'Artikelrabatt 2');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount)[2]', '1.4500');

        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:BilledQuantity)[2]', '50.0000', 'unitCode', 'H87');
        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:PackageQuantity)[2]', '1.0000', 'unitCode', 'XCT');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode)[2]', 'VAT');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode)[2]', 'S');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent)[2]', '7.00');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:SpecifiedTradeSettlementLineMonetarySummation/ram:LineTotalAmount)[2]', '72.50');

        // Position 3

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:AssociatedDocumentLineDocument/ram:LineID)[3]', '3');

        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:GlobalID)[3]', '4123456000021', 'schemeID', '0160');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:SellerAssignedID)[3]', 'GZ250');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Name)[3]', 'Gelierzucker Extra 250g');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Description', 'Artikel wie vereinbart ohne Berechnung');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount)[3]', '0.0000');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount)[3]', '0.0000');

        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:BilledQuantity)[3]', '10.0000', 'unitCode', 'H87');
        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:PackageQuantity)[3]', '1.0000', 'unitCode', 'XCT');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode)[3]', 'VAT');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode)[3]', 'S');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent)[3]', '7.00');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:SpecifiedTradeSettlementLineMonetarySummation/ram:LineTotalAmount)[3]', '0.00');

        // Position 4

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:AssociatedDocumentLineDocument/ram:LineID)[4]', '4');

        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:GlobalID)[4]', '4100130013294', 'schemeID', '0160');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:SellerAssignedID)[4]', '2031');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Name)[4]', 'Bierbrau Pils 20/0500');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Description)[2]', 'EAN-VKE: 4100130913297');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:ApplicableProductCharacteristic/ram:Description)[2]', 'Verpackung');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:ApplicableProductCharacteristic/ram:Value)[2]', 'Kiste');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount)[4]', '12.0000');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount)[4]', '12.0000');

        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:BilledQuantity)[4]', '15.0000', 'unitCode', 'XBC');
        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:PackageQuantity)[4]', '20.0000', 'unitCode', 'XBO');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode)[4]', 'VAT');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode)[4]', 'S');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent)[4]', '19.00');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:SpecifiedTradeSettlementLineMonetarySummation/ram:LineTotalAmount)[4]', '180.00');

        // Position 5

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:AssociatedDocumentLineDocument/ram:LineID)[5]', '5');

        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:GlobalID)[5]', '2001015001325', 'schemeID', '0160');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:SellerAssignedID)[5]', '1805');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Name)[5]', 'Leergutpfand 20 x 0,5l');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Description)[3]');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount)[5]', '3.1000');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount)[5]', '3.1000');

        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:BilledQuantity)[5]', '15.0000', 'unitCode', 'C62');
        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:PackageQuantity)[5]', '1.0000', 'unitCode', 'XBC');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode)[5]', 'VAT');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode)[5]', 'S');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent)[5]', '19.00');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:SpecifiedTradeSettlementLineMonetarySummation/ram:LineTotalAmount)[5]', '46.50');

        // Position 6

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:AssociatedDocumentLineDocument/ram:LineID)[6]', '6');

        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:GlobalID)[6]', '4123456000038', 'schemeID', '0160');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:SellerAssignedID)[6]', 'MP107');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Name)[6]', 'Mischpalette Joghurt Karton 3 x 20');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:Description)[4]');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:ApplicableProductCharacteristic/ram:Description)[4]', 'Verpackung');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:ApplicableProductCharacteristic/ram:Value)[4]', 'Karton');

        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:GlobalID', '4123456001035', 'schemeID', '0160');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:SellerAssignedID', 'JOG103');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:Name', 'Erdbeer 20 x 150g Becher');
        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:UnitQuantity', '20.0000', 'unitCode', 'C62');

        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:GlobalID)[2]', '4123456002032', 'schemeID', '0160');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:SellerAssignedID)[2]', 'JOG203');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:Name)[2]', 'Banane 20 x 150g Becher');
        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:UnitQuantity)[2]', '20.0000', 'unitCode', 'C62');

        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:GlobalID)[3]', '4123456003039', 'schemeID', '0160');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:SellerAssignedID)[3]', 'JOG303');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:Name)[3]', 'Schoko 20 x 150g Becher');
        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedTradeProduct/ram:IncludedReferencedProduct/ram:UnitQuantity)[3]', '20.0000', 'unitCode', 'C62');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:ChargeAmount)[6]', '30.0000');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:ChargeIndicator/udt:Indicator)[3]', 'false');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:ActualAmount)[3]', '0.90');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:GrossPriceProductTradePrice/ram:AppliedTradeAllowanceCharge/ram:Reason)[3]', 'Artikelrabatt 1');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeAgreement/ram:NetPriceProductTradePrice/ram:ChargeAmount)[6]', '29.1000');

        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:BilledQuantity)[6]', '2.0000', 'unitCode', 'C62');
        $this->assertXPathValueWithAttribute('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeDelivery/ram:PackageQuantity)[6]', '1.0000', 'unitCode', 'XPX');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode)[6]', 'VAT');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode)[6]', 'S');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent)[6]', '7.00');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:IncludedSupplyChainTradeLineItem/ram:SpecifiedLineTradeSettlement/ram:SpecifiedTradeSettlementLineMonetarySummation/ram:LineTotalAmount)[6]', '58.20');

        // Header

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerReference', 'SomeRef');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:ApplicableTradeDeliveryTerms/ram:DeliveryTypeCode', '1');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:ID', '549910');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:ID)[2]');
        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:GlobalID', '4333741000005', 'schemeID', '0088');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:GlobalID)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:Name', 'MUSTERLIEFERANT GMBH');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:Name)[2]');
        $this->assertXPathExists('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:DefinedTradeContact');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:DefinedTradeContact/ram:TelephoneUniversalCommunication/ram:CompleteNumber', '+49 932 431 500');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:DefinedTradeContact/ram:EmailURIUniversalCommunication/ram:URIID', 'max.mustermann@musterlieferant.de');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:DefinedTradeContact)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:PostcodeCode', '99199');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:PostcodeCode)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:LineOne', 'BAHNHOFSTRASSE 99');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:LineTwo)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:LineThree)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:CityName', 'MUSTERHAUSEN');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:CityName)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:CountryID', 'DE');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:PostalTradeAddress/ram:CountryID)[2]');
        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:SpecifiedTaxRegistration/ram:ID', 'DE123456789', 'schemeID', 'VA');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:SellerTradeParty/ram:SpecifiedTaxRegistration/ram:ID)[2]');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:ID', '009420');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:ID)[2]');
        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:GlobalID', '4304171000002', 'schemeID', '0088');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:GlobalID)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:Name', 'MUSTER-KUNDE GMBH');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:Name)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:Name)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:PostcodeCode', '40235');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:PostcodeCode)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:LineOne', 'KUNDENWEG 88');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:LineTwo)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:LineThree)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:CityName', 'DUESSELDORF');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:CityName)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:CountryID', 'DE');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerTradeParty/ram:PostalTradeAddress/ram:CountryID)[2]');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID', 'B123456789');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:BuyerOrderReferencedDocument/ram:IssuerAssignedID)[2]');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID', 'A456123');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode', '130');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:IssuerAssignedID)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeAgreement/ram:AdditionalReferencedDocument/ram:TypeCode)[2]');

        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:ID');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:ID)[2]');
        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:GlobalID', '4304171088093', 'schemeID', '0088');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:GlobalID)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:Name', 'MUSTER-MARKT');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:Name)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:DefinedTradeContact/ram:DepartmentName', '8211');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:DefinedTradeContact/ram:DepartmentName)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:PostcodeCode', '31157');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:PostcodeCode)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:LineOne', 'HAUPTSTRASSE 44');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:LineTwo)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:LineThree)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:CityName', 'SARSTEDT');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:CityName)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:CountryID', 'DE');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ShipToTradeParty/ram:PostalTradeAddress/ram:CountryID)[2]');

        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ActualDeliverySupplyChainEvent/ram:OccurrenceDateTime/udt:DateTimeString', '20180805', 'format', '102');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:ActualDeliverySupplyChainEvent/ram:OccurrenceDateTime/udt:DateTimeString)[2]');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:IssuerAssignedID', 'L87654321012345');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeDelivery/ram:DeliveryNoteReferencedDocument/ram:IssuerAssignedID)[2]');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceCurrencyCode', 'EUR');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceCurrencyCode)[2]');
        $this->assertXPathNotExists('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:TaxCurrencyCode');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:TaxCurrencyCode)[2]');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:ID', '009420');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:ID)[2]');
        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:GlobalID', '4304171000002', 'schemeID', '0088');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:GlobalID)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:Name', 'MUSTER-KUNDE GMBH');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:Name)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:Name)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:PostcodeCode', '40235');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:PostcodeCode)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:LineOne', 'KUNDENWEG 88');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:LineTwo)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:LineThree)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:CityName', 'DUESSELDORF');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:CityName)[2]');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:CountryID', 'DE');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:InvoiceeTradeParty/ram:PostalTradeAddress/ram:CountryID)[2]');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CalculatedAmount', '61.07');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode', 'VAT');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:BasisAmount', '321.40');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode', 'S');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent', '19.00');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CalculatedAmount)[2]', '8.93');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode)[2]', 'VAT');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:BasisAmount)[2]', '127.59');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode)[2]', 'S');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent)[2]', '7.00');

        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CalculatedAmount)[3]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:TypeCode)[3]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:BasisAmount)[3]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:CategoryCode)[3]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:ApplicableTradeTax/ram:RateApplicablePercent)[3]');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:ChargeIndicator/udt:Indicator', 'false');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CalculationPercent', '2.00');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:BasisAmount', '280.00');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:ActualAmount', '5.60');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:Reason', 'Rechnungsrabatt 1');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:TypeCode', 'VAT');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:CategoryCode', 'S');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:RateApplicablePercent', '19.00');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:ChargeIndicator/udt:Indicator)[2]', 'false');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CalculationPercent)[2]', '2.00');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:BasisAmount)[2]', '130.70');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:ActualAmount)[2]', '2.61');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:Reason)[2]', 'Rechnungsrabatt 1');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:TypeCode)[2]', 'VAT');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:CategoryCode)[2]', 'S');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:RateApplicablePercent)[2]', '7.00');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:ChargeIndicator/udt:Indicator)[3]', 'false');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CalculationPercent)[3]');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:BasisAmount)[3]', '280.00');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:ActualAmount)[3]', '2.50');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:Reason)[3]', 'Rechnungsrabatt 2');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:TypeCode)[3]', 'VAT');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:CategoryCode)[3]', 'S');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:RateApplicablePercent)[3]', '19.00');

        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:ChargeIndicator/udt:Indicator)[4]', 'false');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CalculationPercent)[4]');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:BasisAmount)[4]', '130.70');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:ActualAmount)[4]', '0.50');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:Reason)[4]', 'Rechnungsrabatt 2');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:TypeCode)[4]', 'VAT');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:CategoryCode)[4]', 'S');
        $this->assertXPathValue('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeAllowanceCharge/ram:CategoryTradeTax/ram:RateApplicablePercent)[4]', '7.00');

        $this->assertXPathExists('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedLogisticsServiceCharge');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedLogisticsServiceCharge/ram:Description', 'Transportkosten');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedLogisticsServiceCharge/ram:AppliedAmount', '3.00');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedLogisticsServiceCharge/ram:AppliedTradeTax/ram:TypeCode', 'VAT');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedLogisticsServiceCharge/ram:AppliedTradeTax/ram:CategoryCode', 'S');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedLogisticsServiceCharge/ram:AppliedTradeTax/ram:RateApplicablePercent', '19.00');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedLogisticsServiceCharge)[2]');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description', 'Bei Zahlung innerhalb 14 Tagen gewähren wir 2,0% Skonto.');
        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:ApplicableTradePaymentDiscountTerms/ram:BasisPeriodMeasure', '14', 'unitCode', 'DAY');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:ApplicableTradePaymentDiscountTerms/ram:CalculationPercent', '2.00');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:Description)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:ApplicableTradePaymentDiscountTerms/ram:BasisPeriodMeasure)[2]');
        $this->assertXPathNotExists('(/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradePaymentTerms/ram:ApplicableTradePaymentDiscountTerms/ram:CalculationPercent)[2]');

        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:LineTotalAmount', '457.20');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:ChargeTotalAmount', '3.00');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:AllowanceTotalAmount', '11.21');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:TaxBasisTotalAmount', '448.99');
        $this->assertXPathValueWithAttribute('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:TaxTotalAmount', '70.00', 'currencyID', 'EUR');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:GrandTotalAmount', '518.99');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:TotalPrepaidAmount', '0.00');
        $this->assertXPathValue('/rsm:CrossIndustryInvoice/rsm:SupplyChainTradeTransaction/ram:ApplicableHeaderTradeSettlement/ram:SpecifiedTradeSettlementHeaderMonetarySummation/ram:DuePayableAmount', '518.99');
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

        $this->assertSame(210, static::$document->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::INFO));
        $this->assertSame(4, static::$document->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::WARNING));
        $this->assertSame(0, static::$document->countMessagesInMessageBagBySeverity(InvoiceSuiteMessageSeverity::ERROR));

        $this->assertSame(210, static::$document->countInfoMessagesInMessageBag());
        $this->assertSame(4, static::$document->countWarningMessagesInMessageBag());
        $this->assertSame(0, static::$document->countErrorMessagesInMessageBag());

        $this->assertArrayHasKey(0, static::$document->getInfoMessagesInMessageBag());
        $this->assertArrayHasKey(0, static::$document->getWarningMessagesInMessageBag());
        $this->assertArrayHasKey(1, static::$document->getWarningMessagesInMessageBag());
        $this->assertArrayHasKey(2, static::$document->getWarningMessagesInMessageBag());
        $this->assertArrayHasKey(3, static::$document->getWarningMessagesInMessageBag());
        $this->assertArrayHasKey('early_exit', static::$document->getWarningMessagesInMessageBag()[0]->getMessageAdditionalData());
        $this->assertSame('yes', static::$document->getWarningMessagesInMessageBag()[0]->getMessageAdditionalData()['early_exit']);
        $this->assertSame('EXIT ' . InvoiceSuiteZfFxProviderBuilder::class . '::setDocumentLanguage', static::$document->getWarningMessagesInMessageBag()[0]->getMessageContent());
        $this->assertArrayHasKey('early_exit', static::$document->getWarningMessagesInMessageBag()[1]->getMessageAdditionalData());
        $this->assertSame('yes', static::$document->getWarningMessagesInMessageBag()[1]->getMessageAdditionalData()['early_exit']);
        $this->assertSame('EXIT ' . InvoiceSuiteZfFxProviderBuilder::class . '::setDocumentCompleteDate', static::$document->getWarningMessagesInMessageBag()[1]->getMessageContent());
        $this->assertArrayHasKey('early_exit', static::$document->getWarningMessagesInMessageBag()[2]->getMessageAdditionalData());
        $this->assertSame('yes', static::$document->getWarningMessagesInMessageBag()[2]->getMessageAdditionalData()['early_exit']);
        $this->assertSame('EXIT ' . InvoiceSuiteZfFxProviderBuilder::class . '::setDocumentTaxCurrency', static::$document->getWarningMessagesInMessageBag()[2]->getMessageContent());
        $this->assertArrayHasKey('early_exit', static::$document->getWarningMessagesInMessageBag()[3]->getMessageAdditionalData());
        $this->assertSame('yes', static::$document->getWarningMessagesInMessageBag()[3]->getMessageAdditionalData()['early_exit']);
        $this->assertSame('EXIT ' . InvoiceSuiteZfFxProviderBuilder::class . '::setDocumentIsCopy', static::$document->getWarningMessagesInMessageBag()[3]->getMessageContent());
        $this->assertArrayNotHasKey(0, static::$document->getErrorMessagesInMessageBag());
    }

    private function getStoreFilename(): string
    {
        return InvoiceSuitePathUtils::combinePathWithFile(
            InvoiceSuitePathUtils::combineAllPaths(__DIR__, '..', '..', 'assets'),
            '00_case_extended_simple_dto.xml'
        );
    }
}
