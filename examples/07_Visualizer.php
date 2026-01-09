<?php

use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteNoteDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAddressDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteContactDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceNetDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteSummationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceGrossDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentMeanDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteCommunicationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitesummationLineDTO;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistCurrencyCodes;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistDocumentTypes;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentPositionDTO;
use horstoeko\invoicesuite\visualizers\InvoiceSuiteVisualizer;

require __DIR__ . "/../vendor/autoload.php";

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
        ->setBuyerIban('DE02120300000000202051'))
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

$documentBuilder = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('zffxcomfort');
$documentBuilder->createFromDTO($dtoDocumentHeader);

$visualizer = InvoiceSuiteVisualizer::createFromDocumentBuilder($documentBuilder);
$visualizer->setDefaultTemplate()->renderPdfFile(__DIR__ . '/07_visualized_document.pdf');
