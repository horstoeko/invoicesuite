<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentreadbuild;

use DateTimeImmutable;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistDocumentTypes;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatBuilder;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAddressDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteCommunicationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentPositionDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteNoteDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentMeanDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDiscountDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermPenaltyDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceNetDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentExtDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteSummationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitesummationLineDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\documents\providers\fatturapa\InvoiceSuiteFatturaPaProviderBuilder;
use horstoeko\invoicesuite\documents\providers\fatturapa\InvoiceSuiteFatturaPaProviderReader;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\FatturaElettronica;
use horstoeko\invoicesuite\InvoiceSuiteDocumentBuilder;
use horstoeko\invoicesuite\InvoiceSuiteDocumentReader;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\tests\traits\HandlesXmlTests;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentType;
use horstoeko\invoicesuite\utils\InvoiceSuiteContentTypeResolver;
use horstoeko\invoicesuite\utils\InvoiceSuitePathUtils;
use horstoeko\invoicesuite\validators\InvoiceSuiteXsdDocumentValidator;

final class FatturaPaDocumentBuilderTest extends TestCase
{
    use HandlesXmlTests;

    protected function setUp(): void
    {
        parent::setUp();

        static::$document = InvoiceSuiteDocumentBuilder::createByProviderUniqueId('fatturapa');
    }

    public function testHasCurrentDocumentProvider(): void
    {
        $this->assertTrue(static::$document->hasCurrentDocumentFormatProvider());
        $this->assertSame('fatturapa', static::$document->getCurrentDocumentFormatProvider()->getUniqueId());
        $this->assertNotNull(static::$document->getCurrentDocumentFormatProvider()->getBuilder());
        $this->assertInstanceOf(InvoiceSuiteFatturaPaProviderBuilder::class, static::$document->getCurrentDocumentFormatProvider()->getBuilder());
        $this->assertInstanceOf(InvoiceSuiteAbstractDocumentFormatBuilder::class, static::$document->getCurrentDocumentFormatProvider()->getBuilder());
        $this->assertInstanceOf(FatturaElettronica::class, static::$document->getCurrentDocumentFormatProvider()->getBuilder()->getDocumentRootObject());
        $this->assertStringContainsString('versione="FPR12"', static::$document->getContent());
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/DatiTrasmissione/FormatoTrasmissione', 'FPR12');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/DatiAnagrafici/RegimeFiscale', 'RF01');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/TipoDocumento', 'TD01');
    }

    public function testSetDocumentGeneral(): void
    {
        static::$document
            ->setDocumentNo('2026-07-000001')
            ->setDocumentType(InvoiceSuiteCodelistDocumentTypes::COMMERCIAL_INVOICE->value)
            ->setDocumentDate(new DateTimeImmutable('2026-07-18'))
            ->setDocumentCurrency('EUR')
            ->setDocumentNote('First invoice note')
            ->addDocumentNote('Second invoice note');

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/DatiTrasmissione/ProgressivoInvio', '2026-07-00');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/Numero', '2026-07-000001');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/TipoDocumento', 'TD01');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/Data', '2026-07-18');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/Divisa', 'EUR');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/Causale', 0, 'First invoice note');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/Causale', 1, 'Second invoice note');
    }

    public function testSetAddDocumentReferences(): void
    {
        static::$document
            ->setDocumentBuyerOrderReference('ORDER-1', new DateTimeImmutable('2026-07-01'))
            ->setDocumentContractReference('CONTRACT-1', new DateTimeImmutable('2026-06-01'))
            ->addDocumentContractReference('CONTRACT-2', new DateTimeImmutable('2026-06-02'))
            ->setDocumentInvoiceReference('INVOICE-REF-1', new DateTimeImmutable('2026-05-01'))
            ->addDocumentInvoiceReference('INVOICE-REF-2', new DateTimeImmutable('2026-05-02'));

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiOrdineAcquisto/IdDocumento', 'ORDER-1');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiContratto/IdDocumento', 0, 'CONTRACT-1');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiContratto/IdDocumento', 1, 'CONTRACT-2');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiFattureCollegate/IdDocumento', 0, 'INVOICE-REF-1');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiFattureCollegate/IdDocumento', 1, 'INVOICE-REF-2');
    }

    public function testSetDocumentParties(): void
    {
        static::$document
            ->setDocumentSellerName('Example Seller S.r.l.')
            ->setDocumentSellerTaxRegistration('VA', '12345678901')
            ->addDocumentSellerTaxRegistration('FC', 'SELLERFISCAL01')
            ->setDocumentSellerAddress('Via Roma 1', null, null, '00100', 'Roma', 'IT', 'RM')
            ->setDocumentSellerContact('Mario Rossi', 'Accounting', '06123456', '06654321', 'seller@example.it')
            ->setDocumentBuyerName('Example Buyer S.p.A.')
            ->setDocumentBuyerTaxRegistration('VA', '98765432109')
            ->addDocumentBuyerTaxRegistration('FC', 'BUYERFISCAL001')
            ->setDocumentBuyerAddress('Via Milano 2', null, null, '20100', 'Milano', 'IT', 'MI')
            ->setDocumentBuyerCommunication('CODICE_DESTINATARIO', 'ABC1234');

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/DatiAnagrafici/Anagrafica/Denominazione', 'Example Seller S.r.l.');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/DatiTrasmissione/IdTrasmittente/IdPaese', 'IT');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/DatiTrasmissione/IdTrasmittente/IdCodice', '12345678901');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/DatiAnagrafici/IdFiscaleIVA/IdPaese', 'IT');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/DatiAnagrafici/IdFiscaleIVA/IdCodice', '12345678901');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/DatiAnagrafici/CodiceFiscale', 'SELLERFISCAL01');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Sede/Indirizzo', 'Via Roma 1');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Sede/CAP', '00100');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Sede/Comune', 'Roma');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Sede/Provincia', 'RM');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Sede/Nazione', 'IT');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Contatti/Telefono', '06123456');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Contatti/Fax', '06654321');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Contatti/Email', 'seller@example.it');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/DatiAnagrafici/Anagrafica/Denominazione', 'Example Buyer S.p.A.');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/DatiAnagrafici/IdFiscaleIVA/IdPaese', 'IT');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/DatiAnagrafici/IdFiscaleIVA/IdCodice', '98765432109');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/DatiAnagrafici/CodiceFiscale', 'BUYERFISCAL001');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/Sede/Indirizzo', 'Via Milano 2');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/Sede/CAP', '20100');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/Sede/Comune', 'Milano');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/Sede/Provincia', 'MI');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/Sede/Nazione', 'IT');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/DatiTrasmissione/CodiceDestinatario', 'ABC1234');
        $this->assertXPathValue('/p:FatturaElettronica/@versione', 'FPR12');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/DatiTrasmissione/FormatoTrasmissione', 'FPR12');
    }

    public function testSetDocumentPaymentAndTax(): void
    {
        static::$document
            ->setDocumentPaymentMean('58', 'Example Bank', null, null, null, 'IT60X0542811101000000123456', 'Example Seller S.r.l.', null, 'BCITITMM', 'PAYMENT-REF-1')
            ->setDocumentPaymentTerm('TP01', new DateTimeImmutable('2026-08-17'))
            ->setDocumentPaymentDiscountTermsInLastPaymentTerm(null, 2.5, null, new DateTimeImmutable('2026-08-01'))
            ->setDocumentPaymentPenaltyTermsInLastPaymentTerm(null, 5.0, null, new DateTimeImmutable('2026-08-18'))
            ->setDocumentTax('S', 'I', 200.123456, 44.03, 22.0)
            ->setDocumentSummation(200.123456, 0.0, 0.0, 200.123456, 44.03, null, 244.15, 244.15, 0.0, 0.0);

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/CondizioniPagamento', 'TP01');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ModalitaPagamento', 'MP05');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ImportoPagamento', '244.15');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/IstitutoFinanziario', 'Example Bank');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/IBAN', 'IT60X0542811101000000123456');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/Beneficiario', 'Example Seller S.r.l.');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/BIC', 'BCITITMM');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/CodicePagamento', 'PAYMENT-REF-1');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/DataScadenzaPagamento', '2026-08-17');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ScontoPagamentoAnticipato', '2.50');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/DataLimitePagamentoAnticipato', '2026-08-01');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/PenalitaPagamentiRitardati', '5.00');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/DataDecorrenzaPenale', '2026-08-18');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/AliquotaIVA', '22.00');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/ImponibileImporto', '200.12');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/Imposta', '44.03');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/EsigibilitaIVA', 'I');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/ImportoTotaleDocumento', '244.15');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/Arrotondamento', '0.00');
    }

    public function testAddDocumentPositions(): void
    {
        static::$document
            ->addDocumentPosition('1')
            ->setDocumentPositionProductDetails('PRODUCT-1', 'Consulting service', 'Ignored description', null, null, null, null, 'INTERNAL')
            ->setDocumentPositionNetPrice(100.123456, 1.0, 'H87')
            ->setDocumentPositionQuantities(1.0, 'H87')
            ->setDocumentPositionBillingPeriod(new DateTimeImmutable('2026-07-01'), new DateTimeImmutable('2026-07-15'))
            ->setDocumentPositionTax('S', 'VAT', null, 22.0)
            ->setDocumentPositionAllowanceCharge(false, 1.123456, null, null, null, 1.5)
            ->setDocumentPositionSummation(100.123456)
            ->addDocumentPosition('line-two')
            ->setDocumentPositionProductDetails('PRODUCT-2')
            ->setDocumentPositionNetPrice(200.0, 2.0, 'H87')
            ->setDocumentPositionQuantities(1.0, 'H87')
            ->setDocumentPositionTax('S', 'VAT', null, 22.0)
            ->setDocumentPositionSummation(100.0);

        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/NumeroLinea', 0, '1');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/CodiceArticolo/CodiceTipo', 0, 'INTERNAL');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/CodiceArticolo/CodiceValore', 0, 'PRODUCT-1');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/Descrizione', 0, 'Consulting service');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/PrezzoUnitario', 0, '100.123456');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/Quantita', 0, '1.00');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/UnitaMisura', 0, 'H87');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/DataInizioPeriodo', 0, '2026-07-01');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/DataFinePeriodo', 0, '2026-07-15');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/AliquotaIVA', 0, '22.00');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/ScontoMaggiorazione/Tipo', 0, 'SC');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/ScontoMaggiorazione/Percentuale', 0, '1.50');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/ScontoMaggiorazione/Importo', 0, '1.123456');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/PrezzoTotale', 0, '100.123456');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/NumeroLinea', 1, '2');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/CodiceArticolo/CodiceTipo', 1, 'INTERNO');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/CodiceArticolo/CodiceValore', 1, 'PRODUCT-2');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/Descrizione', 1, 'PRODUCT-2');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/PrezzoUnitario', 1, '100.00');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/Quantita', 1, '1.00');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/UnitaMisura', 1, 'H87');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/AliquotaIVA', 1, '22.00');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/PrezzoTotale', 1, '100.00');
    }

    public function testGetContentAsXml(): void
    {
        $resolvedContentType = InvoiceSuiteContentTypeResolver::resolveContentType(static::$document->getContent());

        $this->assertSame(InvoiceSuiteContentType::XML, $resolvedContentType);
    }

    public function testSaveAsXmlFile(): void
    {
        $xmlFilename = InvoiceSuitePathUtils::combinePathWithFile(__DIR__, 'fatturapa-invoice.xml');

        $this->registerFileForTestCaseTeardown($xmlFilename);

        static::$document->saveContentToFile($xmlFilename);

        $this->assertFileExists($xmlFilename);
        $this->assertSame(static::$document->getContent(), file_get_contents($xmlFilename));
    }

    public function testCopyToReader(): void
    {
        $documentReader = static::$document->copyToReader();

        $this->assertInstanceOf(InvoiceSuiteDocumentReader::class, $documentReader);
        $this->assertSame('fatturapa', $documentReader->getCurrentDocumentFormatProvider()->getUniqueId());
        $this->assertInstanceOf(InvoiceSuiteFatturaPaProviderReader::class, $documentReader->getCurrentDocumentFormatProvider()->getReader());
    }

    public function testCreateFromDTO(): void
    {
        $sellerParty = (new InvoiceSuitePartyDTO())
            ->addName('DTO Seller S.r.l.')
            ->addTaxRegistration(new InvoiceSuiteIdDTO('12345678901', 'VA'))
            ->addTaxRegistration(new InvoiceSuiteIdDTO('SELLERFISCAL01', 'FC'))
            ->addAddress(new InvoiceSuiteAddressDTO('Via Roma 1', null, null, '00100', 'Roma', 'IT', 'RM'));

        $buyerParty = (new InvoiceSuitePartyDTO())
            ->addName('DTO Buyer S.p.A.')
            ->addTaxRegistration(new InvoiceSuiteIdDTO('98765432109', 'VA'))
            ->addAddress(new InvoiceSuiteAddressDTO('Via Milano 2', null, null, '20100', 'Milano', 'IT', 'MI'))
            ->addCommunication(new InvoiceSuiteCommunicationDTO('ABC1234', 'CODICE_DESTINATARIO'));

        $position = (new InvoiceSuiteDocumentPositionDTO())
            ->setLineId('1')
            ->setProduct(new InvoiceSuiteProductDTO('DTO-PRODUCT-1', 'DTO consulting service'))
            ->setNetPrice(new InvoiceSuitePriceNetDTO(100.123456, new InvoiceSuiteQuantityDTO(1.0, 'H87')))
            ->setQuantityBilled(new InvoiceSuiteQuantityDTO(2.0, 'H87'))
            ->addTax(new InvoiceSuiteTaxDTO('S', 'VAT', 44.05, null, 22.0))
            ->setSummation(new InvoiceSuitesummationLineDTO(200.246912));

        $paymentTerm = (new InvoiceSuitePaymentTermDTO('TP01', new DateTimeImmutable('2026-08-17')))
            ->addDiscountTerm(new InvoiceSuitePaymentTermDiscountDTO(null, 2.5, null, new DateTimeImmutable('2026-08-01')))
            ->addPenaltyTerm(new InvoiceSuitePaymentTermPenaltyDTO(null, 5.0, null, new DateTimeImmutable('2026-08-18')));

        $documentDTO = (new InvoiceSuiteDocumentHeaderDTO())
            ->setNumber('DTO-2026-0001')
            ->setType('380')
            ->setDate(new DateTimeImmutable('2026-07-18'))
            ->setCurrency('EUR')
            ->addNote(new InvoiceSuiteNoteDTO('First DTO invoice note'))
            ->addNote(new InvoiceSuiteNoteDTO('Second DTO invoice note'))
            ->addBuyerOrderReference(new InvoiceSuiteReferenceDocumentDTO('DTO-ORDER-1', new DateTimeImmutable('2026-07-01')))
            ->addContractReference(new InvoiceSuiteReferenceDocumentDTO('DTO-CONTRACT-1', new DateTimeImmutable('2026-06-01')))
            ->addInvoiceReference(new InvoiceSuiteReferenceDocumentExtDTO('DTO-INVOICE-REF-1', new DateTimeImmutable('2026-05-01')))
            ->setSellerParty($sellerParty)
            ->setBuyerParty($buyerParty)
            ->addPaymentMean(new InvoiceSuitePaymentMeanDTO('58', 'DTO Bank', null, null, null, 'IT60X0542811101000000123456', 'DTO Seller S.r.l.', null, 'BCITITMM', 'DTO-PAYMENT-REF-1'))
            ->addPaymentTerm($paymentTerm)
            ->addTax(new InvoiceSuiteTaxDTO('S', 'I', 200.246912, 44.05, 22.0))
            ->addSummation(new InvoiceSuiteSummationDTO(200.246912, 0.0, 0.0, 200.246912, 44.05, null, 244.30, 244.30))
            ->addPosition($position);

        static::$document->createFromDTO($documentDTO);

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/DatiTrasmissione/ProgressivoInvio', 'DTO-2026-0');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/Numero', 'DTO-2026-0001');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/TipoDocumento', 'TD01');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/Data', '2026-07-18');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/Divisa', 'EUR');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/Causale', 0, 'First DTO invoice note');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/Causale', 1, 'Second DTO invoice note');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiOrdineAcquisto/IdDocumento', 'DTO-ORDER-1');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiOrdineAcquisto/Data', '2026-07-01');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiContratto/IdDocumento', 'DTO-CONTRACT-1');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiContratto/Data', '2026-06-01');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiFattureCollegate/IdDocumento', 'DTO-INVOICE-REF-1');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiFattureCollegate/Data', '2026-05-01');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/DatiAnagrafici/Anagrafica/Denominazione', 'DTO Seller S.r.l.');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/DatiTrasmissione/IdTrasmittente/IdPaese', 'IT');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/DatiTrasmissione/IdTrasmittente/IdCodice', '12345678901');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/DatiAnagrafici/IdFiscaleIVA/IdPaese', 'IT');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/DatiAnagrafici/IdFiscaleIVA/IdCodice', '12345678901');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/DatiAnagrafici/CodiceFiscale', 'SELLERFISCAL01');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Sede/Indirizzo', 'Via Roma 1');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Sede/CAP', '00100');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Sede/Comune', 'Roma');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Sede/Provincia', 'RM');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Sede/Nazione', 'IT');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/DatiAnagrafici/Anagrafica/Denominazione', 'DTO Buyer S.p.A.');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/DatiAnagrafici/IdFiscaleIVA/IdPaese', 'IT');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/DatiAnagrafici/IdFiscaleIVA/IdCodice', '98765432109');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/Sede/Indirizzo', 'Via Milano 2');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/Sede/CAP', '20100');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/Sede/Comune', 'Milano');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/Sede/Provincia', 'MI');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/Sede/Nazione', 'IT');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/DatiTrasmissione/CodiceDestinatario', 'ABC1234');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/CondizioniPagamento', 'TP01');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ModalitaPagamento', 'MP05');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ImportoPagamento', '244.30');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/IstitutoFinanziario', 'DTO Bank');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/IBAN', 'IT60X0542811101000000123456');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/Beneficiario', 'DTO Seller S.r.l.');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/BIC', 'BCITITMM');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/CodicePagamento', 'DTO-PAYMENT-REF-1');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/DataScadenzaPagamento', '2026-08-17');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ScontoPagamentoAnticipato', '2.50');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/DataLimitePagamentoAnticipato', '2026-08-01');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/PenalitaPagamentiRitardati', '5.00');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/DataDecorrenzaPenale', '2026-08-18');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/AliquotaIVA', '22.00');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/ImponibileImporto', '200.25');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/Imposta', '44.05');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/EsigibilitaIVA', 'I');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/ImportoTotaleDocumento', '244.30');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/NumeroLinea', '1');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/CodiceArticolo/CodiceTipo', 'INTERNO');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/CodiceArticolo/CodiceValore', 'DTO-PRODUCT-1');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/Descrizione', 'DTO consulting service');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/PrezzoUnitario', '100.123456');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/Quantita', '2.00');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/UnitaMisura', 'H87');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/AliquotaIVA', '22.00');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/PrezzoTotale', '200.246912');

        $validator = InvoiceSuiteXsdDocumentValidator::createFromContent(static::$document->getContent())->validate();

        $this->assertFalse($validator->hasMessagesInMessageBag());
    }

    public function testAdditionalImplementedMethodsWriteAllSupportedXmlPaths(): void
    {
        static::$document->initDocumentRootObject();

        $this->assertInstanceOf(FatturaElettronica::class, static::$document->getCurrentDocumentFormatProvider()->getBuilder()?->getDocumentRootObject());

        static::$document->addDocumentBuyerCommunication('CODICE_DESTINATARIO', 'ABC1234');

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/DatiTrasmissione/CodiceDestinatario', 'ABC1234');

        static::$document->setDocumentBuyerCommunication('PEC', 'buyer@example.it');

        $this->assertStringContainsString('versione="FPR12"', static::$document->getContent());
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/DatiTrasmissione/CodiceDestinatario', '0000000');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/DatiTrasmissione/PECDestinatario', 'buyer@example.it');

        static::$document->addDocumentBuyerCommunication('CODICE_DESTINATARIO', 'ABC1234');

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/DatiTrasmissione/CodiceDestinatario', 'ABC1234');
        $this->assertXPathNotExists('/p:FatturaElettronica/FatturaElettronicaHeader/DatiTrasmissione/PECDestinatario');

        static::$document->addDocumentPaymentMean('58', 'Initial Bank', null, null, null, 'IT60X0000000000000000000000', 'Initial Seller', null, 'INITIALBIC', 'INITIAL-REF');

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ModalitaPagamento', 'MP05');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/IstitutoFinanziario', 'Initial Bank');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/IBAN', 'IT60X0000000000000000000000');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/Beneficiario', 'Initial Seller');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/BIC', 'INITIALBIC');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/CodicePagamento', 'INITIAL-REF');

        static::$document->setDocumentBuyerOrderReference('ORDER-1', new DateTimeImmutable('2026-07-01'));
        static::$document->addDocumentBuyerOrderReference('ORDER-2', new DateTimeImmutable('2026-07-02'));

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiOrdineAcquisto/IdDocumento', 'ORDER-2');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiOrdineAcquisto/Data', '2026-07-02');
        $this->assertXPathNotExistsWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiGenerali/DatiOrdineAcquisto', 1);
    }

    public function testAddDocumentSellerMethodsUpdateTheSupportedSingleXmlBlocks(): void
    {
        static::$document->setDocumentSellerName('First Seller S.r.l.');
        static::$document->addDocumentSellerName('Final Seller S.r.l.');
        static::$document->setDocumentSellerAddress('Via Roma 1', 'Ignored line 2', 'Ignored line 3', '00100', 'Roma', 'IT', 'RM');
        static::$document->addDocumentSellerAddress('Via Torino 2', 'Ignored line 2', 'Ignored line 3', '10100', 'Torino', 'IT', 'TO');
        static::$document->setDocumentSellerContact('Ignored person', 'Ignored department', '01111111', '01222222', 'first@example.it');
        static::$document->addDocumentSellerContact('Ignored person', 'Ignored department', '01333333', '01444444', 'final@example.it');

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/DatiAnagrafici/Anagrafica/Denominazione', 'Final Seller S.r.l.');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Sede/Indirizzo', 'Via Torino 2');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Sede/CAP', '10100');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Sede/Comune', 'Torino');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Sede/Provincia', 'TO');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Sede/Nazione', 'IT');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Contatti/Telefono', '01333333');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Contatti/Fax', '01444444');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Contatti/Email', 'final@example.it');
        $this->assertXPathNotExists('/p:FatturaElettronica/FatturaElettronicaHeader/CedentePrestatore/Sede/Indirizzo2');
    }

    public function testAddDocumentBuyerMethodsUpdateTheSupportedSingleXmlBlocks(): void
    {
        static::$document->setDocumentBuyerName('First Buyer S.p.A.');
        static::$document->addDocumentBuyerName('Final Buyer S.p.A.');
        static::$document->setDocumentBuyerAddress('Via Milano 1', 'Ignored line 2', 'Ignored line 3', '20100', 'Milano', 'IT', 'MI');
        static::$document->addDocumentBuyerAddress('Via Bologna 2', 'Ignored line 2', 'Ignored line 3', '40100', 'Bologna', 'IT', 'BO');

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/DatiAnagrafici/Anagrafica/Denominazione', 'Final Buyer S.p.A.');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/Sede/Indirizzo', 'Via Bologna 2');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/Sede/CAP', '40100');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/Sede/Comune', 'Bologna');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/Sede/Provincia', 'BO');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/Sede/Nazione', 'IT');
        $this->assertXPathNotExists('/p:FatturaElettronica/FatturaElettronicaHeader/CessionarioCommittente/Sede/Indirizzo2');
    }

    public function testDocumentSellerTaxRepresentativeMethodsWriteAllSupportedXmlPaths(): void
    {
        static::$document->setDocumentSellerTaxRepresentativeName('First Tax Representative S.r.l.');

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/RappresentanteFiscale/DatiAnagrafici/Anagrafica/Denominazione', 'First Tax Representative S.r.l.');

        static::$document->addDocumentSellerTaxRepresentativeName('Final Tax Representative S.r.l.');

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/RappresentanteFiscale/DatiAnagrafici/Anagrafica/Denominazione', 'Final Tax Representative S.r.l.');

        static::$document->setDocumentSellerTaxRepresentativeTaxRegistration('VA', '11111111111');

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/RappresentanteFiscale/DatiAnagrafici/IdFiscaleIVA/IdCodice', '11111111111');

        static::$document->addDocumentSellerTaxRepresentativeTaxRegistration('FC', 'REPRESENTATIVE01');

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaHeader/RappresentanteFiscale/DatiAnagrafici/CodiceFiscale', 'REPRESENTATIVE01');
        $this->assertXPathNotExists('/p:FatturaElettronica/FatturaElettronicaHeader/RappresentanteFiscale/DatiAnagrafici/IdFiscaleIVA');
    }

    public function testPaymentMeanConvenienceMethodsWriteTheirConcreteXmlPaths(): void
    {
        static::$document->setDocumentPaymentMeanAsCreditTransferSepa('IT60X0000000000000000000001', 'SEPA Seller', 'Ignored proprietary ID', 'SEPAITMM', 'SEPA-REF');
        static::$document->addDocumentPaymentMeanAsCreditTransferSepa('IT60X0000000000000000000002', 'Second SEPA Seller', 'Ignored proprietary ID', 'SEPAITM2', 'SEPA-REF-2');
        static::$document->addDocumentPaymentMeanAsCreditTransferNoSepa('IT60X0000000000000000000003', 'Non-SEPA Seller', 'Ignored proprietary ID', 'NOSEPAIT', 'NO-SEPA-REF');
        static::$document->addDocumentPaymentMeanAsDirectDebitSepa('IT60X0000000000000000000004', 'Ignored mandate');
        static::$document->addDocumentPaymentMeanAsDirectDebitNoSepa('IT60X0000000000000000000005', 'Ignored mandate');
        static::$document->addDocumentPaymentMeanAsPaymentCard('Ignored card ID', 'Card Holder');

        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ModalitaPagamento', 0, 'MP05');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/IBAN', 0, 'IT60X0000000000000000000001');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/Beneficiario', 0, 'SEPA Seller');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/BIC', 0, 'SEPAITMM');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/CodicePagamento', 0, 'SEPA-REF');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ModalitaPagamento', 1, 'MP05');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ModalitaPagamento', 2, 'MP05');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ModalitaPagamento', 3, 'MP19');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/IBAN', 3, 'IT60X0000000000000000000004');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ModalitaPagamento', 4, 'MP20');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/IBAN', 4, 'IT60X0000000000000000000005');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ModalitaPagamento', 5, 'MP08');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento[6]/DettaglioPagamento/Beneficiario', 'Card Holder');

        static::$document->setDocumentPaymentMeanAsCreditTransferNoSepa('IT60X0000000000000000000006', 'Reset Seller', 'Ignored proprietary ID', 'RESETITM', 'RESET-REF');

        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ModalitaPagamento', 0, 'MP05');
        $this->assertXPathNotExistsWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento', 1);

        static::$document->setDocumentPaymentMeanAsDirectDebitSepa('IT60X0000000000000000000007', 'Ignored mandate');

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ModalitaPagamento', 'MP19');

        static::$document->setDocumentPaymentMeanAsDirectDebitNoSepa('IT60X0000000000000000000008', 'Ignored mandate');

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ModalitaPagamento', 'MP20');

        static::$document->setDocumentPaymentMeanAsPaymentCard('Ignored card ID', 'Final Card Holder');

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ModalitaPagamento', 'MP08');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/Beneficiario', 'Final Card Holder');
    }

    public function testPaymentReferenceAndAddPaymentTermMethodsWriteAllSupportedXmlPaths(): void
    {
        static::$document->setDocumentPaymentReference('REFERENCE-1');
        static::$document->addDocumentPaymentReference('REFERENCE-2');
        static::$document->addDocumentPaymentTerm('TP02', new DateTimeImmutable('2026-09-01'), 'Ignored mandate');
        static::$document->addDocumentPaymentDiscountTermsInLastPaymentTerm(100.0, null, 2.5, new DateTimeImmutable('2026-08-20'), 10.0, 'DAY');
        static::$document->addDocumentPaymentPenaltyTermsInLastPaymentTerm(100.0, null, 5.0, new DateTimeImmutable('2026-09-02'), 5.0, 'DAY');

        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/CondizioniPagamento', 0, 'TP02');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/CondizioniPagamento', 1, 'TP01');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ModalitaPagamento', 0, 'MP01');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ImportoPagamento', 0, '0.00');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/CodicePagamento', 0, 'REFERENCE-1');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/DataScadenzaPagamento', 0, '2026-09-01');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ScontoPagamentoAnticipato', 0, '2.50');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/DataLimitePagamentoAnticipato', 0, '2026-08-20');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/PenalitaPagamentiRitardati', 0, '5.00');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/DataDecorrenzaPenale', 0, '2026-09-02');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ModalitaPagamento', 1, 'MP01');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/ImportoPagamento', 1, '0.00');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/CodicePagamento', 1, 'REFERENCE-2');
        $this->assertXPathNotExistsWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiPagamento/DettaglioPagamento/DataScadenzaPagamento', 1);
    }

    public function testAddDocumentTaxAppendsEverySupportedTaxXmlPath(): void
    {
        static::$document->setDocumentTax('S', 'I', 100.0, 22.0, 22.0);
        static::$document->addDocumentTax('E', 'D', 50.0, 0.0, 0.0, 'Article 10 exemption', 'N4');

        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/AliquotaIVA', 0, '22.00');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/ImponibileImporto', 0, '100.00');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/Imposta', 0, '22.00');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/EsigibilitaIVA', 0, 'I');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/AliquotaIVA', 1, '0.00');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/ImponibileImporto', 1, '50.00');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/Imposta', 1, '0.00');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/EsigibilitaIVA', 1, 'D');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo[2]/Natura', 'N4');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo[2]/RiferimentoNormativo', 'Article 10 exemption');
    }

    public function testAdditionalPositionMethodsWriteEverySupportedXmlPath(): void
    {
        static::$document->addDocumentPosition('1');
        static::$document->setDocumentPositionProductDetails('PRODUCT-1', 'Product name', 'Ignored description', 'Ignored seller ID', 'Ignored buyer ID', 'Ignored global ID', 'Ignored global type', 'INTERNAL');
        static::$document->setDocumentPositionNetPrice(200.0, 2.0, 'H87');
        static::$document->setDocumentPositionNetPriceTax('S', 'VAT', 44.0, 22.0);
        static::$document->setDocumentPositionQuantities(3.0, 'H87', 4.0, 'H87', 5.0, 'H87', 6.0, 'H87');
        static::$document->setDocumentPositionBillingPeriod(new DateTimeImmutable('2026-07-01'), new DateTimeImmutable('2026-07-15'), 'Ignored description');
        static::$document->addDocumentPositionBillingPeriod(new DateTimeImmutable('2026-07-02'), new DateTimeImmutable('2026-07-16'), 'Ignored description');
        static::$document->setDocumentPositionTax('S', 'VAT', 44.0, 22.0);
        static::$document->addDocumentPositionTax('E', 'VAT', 0.0, 0.0, null, 'N4');
        static::$document->setDocumentPositionAllowanceCharge(false, 1.25, 100.0, 'Ignored reason', 'Ignored code', 1.5);
        static::$document->addDocumentPositionAllowanceCharge(true, 2.50, 100.0, 'Ignored reason', 'Ignored code', 2.5);
        static::$document->setDocumentPositionSummation(300.0, 0.0, 3.75, 66.0, 362.25);

        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/NumeroLinea', '1');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/CodiceArticolo/CodiceTipo', 'INTERNAL');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/CodiceArticolo/CodiceValore', 'PRODUCT-1');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/Descrizione', 'Product name');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/PrezzoUnitario', '100.00');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/Quantita', '3.00');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/UnitaMisura', 'H87');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/DataInizioPeriodo', '2026-07-02');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/DataFinePeriodo', '2026-07-16');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/AliquotaIVA', '0.00');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/Natura', 'N4');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/ScontoMaggiorazione/Tipo', 0, 'SC');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/ScontoMaggiorazione/Percentuale', 0, '1.50');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/ScontoMaggiorazione/Importo', 0, '1.25');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/ScontoMaggiorazione/Tipo', 1, 'MG');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/ScontoMaggiorazione/Percentuale', 1, '2.50');
        $this->assertXPathValueWithIndex('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/ScontoMaggiorazione/Importo', 1, '2.50');
        $this->assertXPathValue('/p:FatturaElettronica/FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/PrezzoTotale', '300.00');
    }

    public function testUnsupportedMethodsDoNotChangeDocument(): void
    {
        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentDescription('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentLanguage('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentCompleteDate(new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentTaxCurrency('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentIsCopy(true);
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentIsTest(true);
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBillingPeriod(new DateTimeImmutable('2026-07-19'), new DateTimeImmutable('2026-07-19'), 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBillingPeriod(new DateTimeImmutable('2026-07-19'), new DateTimeImmutable('2026-07-19'), 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPostingReference('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPostingReference('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSellerOrderReference('Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSellerOrderReference('Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentQuotationReference('Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentQuotationReference('Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentAdditionalReference('Test value', new DateTimeImmutable('2026-07-19'), 'Test value', 'Test value', 'Test value', null);
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentAdditionalReference('Test value', new DateTimeImmutable('2026-07-19'), 'Test value', 'Test value', 'Test value', null);
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentProjectReference('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentProjectReference('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateCustomerOrderReference('Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentUltimateCustomerOrderReference('Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentDespatchAdviceReference('Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentDespatchAdviceReference('Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentReceivingAdviceReference('Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentReceivingAdviceReference('Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentDeliveryNoteReference('Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentDeliveryNoteReference('Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSupplyChainEvent(new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerReference('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentDeliveryTerms('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSellerId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSellerId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSellerGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSellerGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSellerLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSellerLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSellerCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSellerCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSellerTaxRepresentativeId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSellerTaxRepresentativeId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSellerTaxRepresentativeGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSellerTaxRepresentativeGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSellerTaxRepresentativeAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSellerTaxRepresentativeAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSellerTaxRepresentativeLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSellerTaxRepresentativeLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSellerTaxRepresentativeContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSellerTaxRepresentativeContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSellerTaxRepresentativeCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSellerTaxRepresentativeCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerTaxRepresentativeName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerTaxRepresentativeName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerTaxRepresentativeId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerTaxRepresentativeId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerTaxRepresentativeGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerTaxRepresentativeGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerTaxRepresentativeTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerTaxRepresentativeTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerTaxRepresentativeAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerTaxRepresentativeAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerTaxRepresentativeLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerTaxRepresentativeLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerTaxRepresentativeContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerTaxRepresentativeContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerTaxRepresentativeCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerTaxRepresentativeCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSalesAgentName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSalesAgentName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSalesAgentId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSalesAgentId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSalesAgentGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSalesAgentGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSalesAgentTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSalesAgentTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSalesAgentAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSalesAgentAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSalesAgentLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSalesAgentLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSalesAgentContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSalesAgentContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentSalesAgentCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentSalesAgentCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerAgentName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerAgentName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerAgentId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerAgentId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerAgentGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerAgentGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerAgentTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerAgentTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerAgentAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerAgentAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerAgentLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerAgentLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerAgentContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerAgentContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentBuyerAgentCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentBuyerAgentCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentProductEndUserName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentProductEndUserName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentProductEndUserId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentProductEndUserId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentProductEndUserGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentProductEndUserGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentProductEndUserTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentProductEndUserTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentProductEndUserAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentProductEndUserAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentProductEndUserLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentProductEndUserLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentProductEndUserContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentProductEndUserContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentProductEndUserCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentProductEndUserCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipToName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentShipToName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipToId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentShipToId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipToGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentShipToGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipToTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentShipToTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipToAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentShipToAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipToLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentShipToLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipToContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentShipToContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipToCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentShipToCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateShipToName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentUltimateShipToName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateShipToId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentUltimateShipToId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateShipToGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentUltimateShipToGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateShipToTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentUltimateShipToTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateShipToAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentUltimateShipToAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateShipToLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentUltimateShipToLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateShipToContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentUltimateShipToContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentUltimateShipToCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentUltimateShipToCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipFromName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentShipFromName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipFromId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentShipFromId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipFromGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentShipFromGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipFromTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentShipFromTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipFromAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentShipFromAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipFromLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentShipFromLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipFromContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentShipFromContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentShipFromCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentShipFromCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoicerName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentInvoicerName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoicerId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentInvoicerId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoicerGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentInvoicerGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoicerTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentInvoicerTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoicerAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentInvoicerAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoicerLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentInvoicerLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoicerContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentInvoicerContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoicerCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentInvoicerCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoiceeName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentInvoiceeName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoiceeId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentInvoiceeId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoiceeGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentInvoiceeGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoiceeTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentInvoiceeTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoiceeAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentInvoiceeAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoiceeLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentInvoiceeLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoiceeContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentInvoiceeContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentInvoiceeCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentInvoiceeCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayeeName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPayeeName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayeeId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPayeeId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayeeGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPayeeGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayeeTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPayeeTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayeeAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPayeeAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayeeLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPayeeLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayeeContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPayeeContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayeeCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPayeeCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayerName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPayerName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayerId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPayerId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayerGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPayerGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayerTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPayerTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayerAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPayerAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayerLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPayerLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayerContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPayerContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPayerCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPayerCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPaymentCreditorReferenceID('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPaymentCreditorReferenceID('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentAllowanceCharge(true, 1.0, 1.0, 'Test value', 'Test value', 1.0, 'Test value', 'Test value', 1.0);
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentAllowanceCharge(true, 1.0, 1.0, 'Test value', 'Test value', 1.0, 'Test value', 'Test value', 1.0);
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentLogisticServiceCharge(1.0, 'Test value', 'Test value', 'Test value', 1.0);
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentLogisticServiceCharge(1.0, 'Test value', 'Test value', 'Test value', 1.0);
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->prepareDocumentSummation();
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionNote('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionNote('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionProductCharacteristic('Test value', 'Test value', 'Test value', 1.0, 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionProductCharacteristic('Test value', 'Test value', 'Test value', 1.0, 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionProductClassification('Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionProductClassification('Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionReferencedProduct('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 1.0, 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionReferencedProduct('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 1.0, 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionSellerOrderReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionSellerOrderReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionBuyerOrderReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionBuyerOrderReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionQuotationReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionQuotationReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionContractReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionContractReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionAdditionalReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'), 'Test value', 'Test value', 'Test value', null);
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionAdditionalReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'), 'Test value', 'Test value', 'Test value', null);
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateCustomerOrderReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionUltimateCustomerOrderReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionDespatchAdviceReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionDespatchAdviceReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionReceivingAdviceReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionReceivingAdviceReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionDeliveryNoteReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionDeliveryNoteReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionInvoiceReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'), 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionInvoiceReference('Test value', 'Test value', new DateTimeImmutable('2026-07-19'), 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionAdditionalObjectReference('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionAdditionalObjectReference('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionGrossPrice(1.0, 1.0, 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionGrossPriceAllowanceCharge(1.0, true, 1.0, 1.0, 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionGrossPriceAllowanceCharge(1.0, true, 1.0, 1.0, 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionShipToName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionShipToName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionShipToId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionShipToId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionShipToGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionShipToGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionShipToTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionShipToTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionShipToAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionShipToAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionShipToLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionShipToLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionShipToContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionShipToContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionShipToCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionShipToCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateShipToName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionUltimateShipToName('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateShipToId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionUltimateShipToId('Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateShipToGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionUltimateShipToGlobalId('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateShipToTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionUltimateShipToTaxRegistration('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateShipToAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionUltimateShipToAddress('Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateShipToLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionUltimateShipToLegalOrganisation('Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateShipToContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionUltimateShipToContact('Test value', 'Test value', 'Test value', 'Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionUltimateShipToCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionUltimateShipToCommunication('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionSupplyChainEvent(new DateTimeImmutable('2026-07-19'));
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->setDocumentPositionPostingReference('Test value', 'Test value');
        });

        $this->assertXmlWasNotChanged(static function (): void {
            static::$document->addDocumentPositionPostingReference('Test value', 'Test value');
        });
    }
}
