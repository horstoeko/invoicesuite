<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentmodels;

use horstoeko\invoicesuite\documents\providers\fatturapa\models\Allegati;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\AltriDatiGestionali;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\CodiceArticolo;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiBeniServizi;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiCassaPrevidenziale;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiDDT;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiDocumentiCorrelati;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiGenerali;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiGeneraliDocumento;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiPagamento;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiRiepilogo;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiRitenuta;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiSAL;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\DettaglioLinee;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\DettaglioPagamento;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\FatturaElettronicaBody;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\FatturaElettronicaType;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\ScontoMaggiorazione;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\ManifestType;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\ObjectType;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\ReferenceType;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\SignaturePropertiesType;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\SignaturePropertyType;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\SignatureType;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\SignedInfoType;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\TransformsType;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\TransformType;
use horstoeko\invoicesuite\tests\TestCase;

final class FatturaPaModelTest extends TestCase
{
    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiBeniServizi.
     */
    public function testModelsFatturaPaDatiBeniServizi(): void
    {
        $model = new DatiBeniServizi();

        // Property DettaglioLinee

        $itemsBeforeForEach = $model->getDettaglioLinee();

        $this->assertSame($model, $model->forEachDettaglioLinee(
            static function (DettaglioLinee $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getDettaglioLinee());

        $model->setDettaglioLinee([new DettaglioLinee(), new DettaglioLinee()]);

        $itemsBeforeForEach = $model->getDettaglioLinee();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachDettaglioLinee(
            static function (DettaglioLinee $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getDettaglioLinee());

        $model->clearDettaglioLinee();

        $this->assertSame($model, $model->forEachDettaglioLinee(
            static function (DettaglioLinee $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));

        // Property DatiRiepilogo

        $itemsBeforeForEach = $model->getDatiRiepilogo();

        $this->assertSame($model, $model->forEachDatiRiepilogo(
            static function (DatiRiepilogo $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getDatiRiepilogo());

        $model->setDatiRiepilogo([new DatiRiepilogo(), new DatiRiepilogo()]);

        $itemsBeforeForEach = $model->getDatiRiepilogo();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachDatiRiepilogo(
            static function (DatiRiepilogo $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getDatiRiepilogo());

        $model->clearDatiRiepilogo();

        $this->assertSame($model, $model->forEachDatiRiepilogo(
            static function (DatiRiepilogo $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiDDT.
     */
    public function testModelsFatturaPaDatiDDT(): void
    {
        $model = new DatiDDT();

        // Property RiferimentoNumeroLinea

        $itemsBeforeForEach = $model->getRiferimentoNumeroLinea();

        $this->assertSame($model, $model->forEachRiferimentoNumeroLinea(
            static function (int $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getRiferimentoNumeroLinea());

        $model->setRiferimentoNumeroLinea([0, 12]);

        $itemsBeforeForEach = $model->getRiferimentoNumeroLinea();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachRiferimentoNumeroLinea(
            static function (int $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getRiferimentoNumeroLinea());

        $model->clearRiferimentoNumeroLinea();

        $this->assertSame($model, $model->forEachRiferimentoNumeroLinea(
            static function (int $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiDocumentiCorrelati.
     */
    public function testModelsFatturaPaDatiDocumentiCorrelati(): void
    {
        $model = new DatiDocumentiCorrelati();

        // Property RiferimentoNumeroLinea

        $itemsBeforeForEach = $model->getRiferimentoNumeroLinea();

        $this->assertSame($model, $model->forEachRiferimentoNumeroLinea(
            static function (int $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getRiferimentoNumeroLinea());

        $model->setRiferimentoNumeroLinea([0, 12]);

        $itemsBeforeForEach = $model->getRiferimentoNumeroLinea();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachRiferimentoNumeroLinea(
            static function (int $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getRiferimentoNumeroLinea());

        $model->clearRiferimentoNumeroLinea();

        $this->assertSame($model, $model->forEachRiferimentoNumeroLinea(
            static function (int $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiGenerali.
     */
    public function testModelsFatturaPaDatiGenerali(): void
    {
        $model = new DatiGenerali();

        // Property DatiOrdineAcquisto

        $itemsBeforeForEach = $model->getDatiOrdineAcquisto();

        $this->assertSame($model, $model->forEachDatiOrdineAcquisto(
            static function (DatiDocumentiCorrelati $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getDatiOrdineAcquisto());

        $model->setDatiOrdineAcquisto([new DatiDocumentiCorrelati(), new DatiDocumentiCorrelati()]);

        $itemsBeforeForEach = $model->getDatiOrdineAcquisto();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachDatiOrdineAcquisto(
            static function (DatiDocumentiCorrelati $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getDatiOrdineAcquisto());

        $model->clearDatiOrdineAcquisto();

        $this->assertSame($model, $model->forEachDatiOrdineAcquisto(
            static function (DatiDocumentiCorrelati $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));

        // Property DatiContratto

        $itemsBeforeForEach = $model->getDatiContratto();

        $this->assertSame($model, $model->forEachDatiContratto(
            static function (DatiDocumentiCorrelati $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getDatiContratto());

        $model->setDatiContratto([new DatiDocumentiCorrelati(), new DatiDocumentiCorrelati()]);

        $itemsBeforeForEach = $model->getDatiContratto();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachDatiContratto(
            static function (DatiDocumentiCorrelati $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getDatiContratto());

        $model->clearDatiContratto();

        $this->assertSame($model, $model->forEachDatiContratto(
            static function (DatiDocumentiCorrelati $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));

        // Property DatiConvenzione

        $itemsBeforeForEach = $model->getDatiConvenzione();

        $this->assertSame($model, $model->forEachDatiConvenzione(
            static function (DatiDocumentiCorrelati $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getDatiConvenzione());

        $model->setDatiConvenzione([new DatiDocumentiCorrelati(), new DatiDocumentiCorrelati()]);

        $itemsBeforeForEach = $model->getDatiConvenzione();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachDatiConvenzione(
            static function (DatiDocumentiCorrelati $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getDatiConvenzione());

        $model->clearDatiConvenzione();

        $this->assertSame($model, $model->forEachDatiConvenzione(
            static function (DatiDocumentiCorrelati $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));

        // Property DatiRicezione

        $itemsBeforeForEach = $model->getDatiRicezione();

        $this->assertSame($model, $model->forEachDatiRicezione(
            static function (DatiDocumentiCorrelati $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getDatiRicezione());

        $model->setDatiRicezione([new DatiDocumentiCorrelati(), new DatiDocumentiCorrelati()]);

        $itemsBeforeForEach = $model->getDatiRicezione();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachDatiRicezione(
            static function (DatiDocumentiCorrelati $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getDatiRicezione());

        $model->clearDatiRicezione();

        $this->assertSame($model, $model->forEachDatiRicezione(
            static function (DatiDocumentiCorrelati $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));

        // Property DatiFattureCollegate

        $itemsBeforeForEach = $model->getDatiFattureCollegate();

        $this->assertSame($model, $model->forEachDatiFattureCollegate(
            static function (DatiDocumentiCorrelati $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getDatiFattureCollegate());

        $model->setDatiFattureCollegate([new DatiDocumentiCorrelati(), new DatiDocumentiCorrelati()]);

        $itemsBeforeForEach = $model->getDatiFattureCollegate();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachDatiFattureCollegate(
            static function (DatiDocumentiCorrelati $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getDatiFattureCollegate());

        $model->clearDatiFattureCollegate();

        $this->assertSame($model, $model->forEachDatiFattureCollegate(
            static function (DatiDocumentiCorrelati $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));

        // Property DatiSAL

        $itemsBeforeForEach = $model->getDatiSAL();

        $this->assertSame($model, $model->forEachDatiSAL(
            static function (DatiSAL $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getDatiSAL());

        $model->setDatiSAL([new DatiSAL(), new DatiSAL()]);

        $itemsBeforeForEach = $model->getDatiSAL();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachDatiSAL(
            static function (DatiSAL $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getDatiSAL());

        $model->clearDatiSAL();

        $this->assertSame($model, $model->forEachDatiSAL(
            static function (DatiSAL $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));

        // Property DatiDDT

        $itemsBeforeForEach = $model->getDatiDDT();

        $this->assertSame($model, $model->forEachDatiDDT(
            static function (DatiDDT $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getDatiDDT());

        $model->setDatiDDT([new DatiDDT(), new DatiDDT()]);

        $itemsBeforeForEach = $model->getDatiDDT();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachDatiDDT(
            static function (DatiDDT $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getDatiDDT());

        $model->clearDatiDDT();

        $this->assertSame($model, $model->forEachDatiDDT(
            static function (DatiDDT $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiGeneraliDocumento.
     */
    public function testModelsFatturaPaDatiGeneraliDocumento(): void
    {
        $model = new DatiGeneraliDocumento();

        // Property DatiRitenuta

        $itemsBeforeForEach = $model->getDatiRitenuta();

        $this->assertSame($model, $model->forEachDatiRitenuta(
            static function (DatiRitenuta $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getDatiRitenuta());

        $model->setDatiRitenuta([new DatiRitenuta(), new DatiRitenuta()]);

        $itemsBeforeForEach = $model->getDatiRitenuta();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachDatiRitenuta(
            static function (DatiRitenuta $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getDatiRitenuta());

        $model->clearDatiRitenuta();

        $this->assertSame($model, $model->forEachDatiRitenuta(
            static function (DatiRitenuta $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));

        // Property DatiCassaPrevidenziale

        $itemsBeforeForEach = $model->getDatiCassaPrevidenziale();

        $this->assertSame($model, $model->forEachDatiCassaPrevidenziale(
            static function (DatiCassaPrevidenziale $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getDatiCassaPrevidenziale());

        $model->setDatiCassaPrevidenziale([new DatiCassaPrevidenziale(), new DatiCassaPrevidenziale()]);

        $itemsBeforeForEach = $model->getDatiCassaPrevidenziale();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachDatiCassaPrevidenziale(
            static function (DatiCassaPrevidenziale $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getDatiCassaPrevidenziale());

        $model->clearDatiCassaPrevidenziale();

        $this->assertSame($model, $model->forEachDatiCassaPrevidenziale(
            static function (DatiCassaPrevidenziale $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));

        // Property ScontoMaggiorazione

        $itemsBeforeForEach = $model->getScontoMaggiorazione();

        $this->assertSame($model, $model->forEachScontoMaggiorazione(
            static function (ScontoMaggiorazione $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getScontoMaggiorazione());

        $model->setScontoMaggiorazione([new ScontoMaggiorazione(), new ScontoMaggiorazione()]);

        $itemsBeforeForEach = $model->getScontoMaggiorazione();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachScontoMaggiorazione(
            static function (ScontoMaggiorazione $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getScontoMaggiorazione());

        $model->clearScontoMaggiorazione();

        $this->assertSame($model, $model->forEachScontoMaggiorazione(
            static function (ScontoMaggiorazione $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));

        // Property Causale

        $itemsBeforeForEach = $model->getCausale();

        $this->assertSame($model, $model->forEachCausale(
            static function (string $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getCausale());

        $model->setCausale(['', 'second']);

        $itemsBeforeForEach = $model->getCausale();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachCausale(
            static function (string $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getCausale());

        $model->clearCausale();

        $this->assertSame($model, $model->forEachCausale(
            static function (string $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiPagamento.
     */
    public function testModelsFatturaPaDatiPagamento(): void
    {
        $model = new DatiPagamento();

        // Property DettaglioPagamento

        $itemsBeforeForEach = $model->getDettaglioPagamento();

        $this->assertSame($model, $model->forEachDettaglioPagamento(
            static function (DettaglioPagamento $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getDettaglioPagamento());

        $model->setDettaglioPagamento([new DettaglioPagamento(), new DettaglioPagamento()]);

        $itemsBeforeForEach = $model->getDettaglioPagamento();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachDettaglioPagamento(
            static function (DettaglioPagamento $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getDettaglioPagamento());

        $model->clearDettaglioPagamento();

        $this->assertSame($model, $model->forEachDettaglioPagamento(
            static function (DettaglioPagamento $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\DettaglioLinee.
     */
    public function testModelsFatturaPaDettaglioLinee(): void
    {
        $model = new DettaglioLinee();

        // Property CodiceArticolo

        $itemsBeforeForEach = $model->getCodiceArticolo();

        $this->assertSame($model, $model->forEachCodiceArticolo(
            static function (CodiceArticolo $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getCodiceArticolo());

        $model->setCodiceArticolo([new CodiceArticolo(), new CodiceArticolo()]);

        $itemsBeforeForEach = $model->getCodiceArticolo();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachCodiceArticolo(
            static function (CodiceArticolo $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getCodiceArticolo());

        $model->clearCodiceArticolo();

        $this->assertSame($model, $model->forEachCodiceArticolo(
            static function (CodiceArticolo $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));

        // Property ScontoMaggiorazione

        $itemsBeforeForEach = $model->getScontoMaggiorazione();

        $this->assertSame($model, $model->forEachScontoMaggiorazione(
            static function (ScontoMaggiorazione $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getScontoMaggiorazione());

        $model->setScontoMaggiorazione([new ScontoMaggiorazione(), new ScontoMaggiorazione()]);

        $itemsBeforeForEach = $model->getScontoMaggiorazione();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachScontoMaggiorazione(
            static function (ScontoMaggiorazione $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getScontoMaggiorazione());

        $model->clearScontoMaggiorazione();

        $this->assertSame($model, $model->forEachScontoMaggiorazione(
            static function (ScontoMaggiorazione $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));

        // Property AltriDatiGestionali

        $itemsBeforeForEach = $model->getAltriDatiGestionali();

        $this->assertSame($model, $model->forEachAltriDatiGestionali(
            static function (AltriDatiGestionali $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getAltriDatiGestionali());

        $model->setAltriDatiGestionali([new AltriDatiGestionali(), new AltriDatiGestionali()]);

        $itemsBeforeForEach = $model->getAltriDatiGestionali();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachAltriDatiGestionali(
            static function (AltriDatiGestionali $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getAltriDatiGestionali());

        $model->clearAltriDatiGestionali();

        $this->assertSame($model, $model->forEachAltriDatiGestionali(
            static function (AltriDatiGestionali $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\FatturaElettronicaBody.
     */
    public function testModelsFatturaPaFatturaElettronicaBody(): void
    {
        $model = new FatturaElettronicaBody();

        // Property DatiPagamento

        $itemsBeforeForEach = $model->getDatiPagamento();

        $this->assertSame($model, $model->forEachDatiPagamento(
            static function (DatiPagamento $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getDatiPagamento());

        $model->setDatiPagamento([new DatiPagamento(), new DatiPagamento()]);

        $itemsBeforeForEach = $model->getDatiPagamento();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachDatiPagamento(
            static function (DatiPagamento $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getDatiPagamento());

        $model->clearDatiPagamento();

        $this->assertSame($model, $model->forEachDatiPagamento(
            static function (DatiPagamento $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));

        // Property Allegati

        $itemsBeforeForEach = $model->getAllegati();

        $this->assertSame($model, $model->forEachAllegati(
            static function (Allegati $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getAllegati());

        $model->setAllegati([new Allegati(), new Allegati()]);

        $itemsBeforeForEach = $model->getAllegati();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachAllegati(
            static function (Allegati $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getAllegati());

        $model->clearAllegati();

        $this->assertSame($model, $model->forEachAllegati(
            static function (Allegati $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\FatturaElettronicaType.
     */
    public function testModelsFatturaPaFatturaElettronicaType(): void
    {
        $model = new FatturaElettronicaType();

        // Property FatturaElettronicaBody

        $itemsBeforeForEach = $model->getFatturaElettronicaBody();

        $this->assertSame($model, $model->forEachFatturaElettronicaBody(
            static function (FatturaElettronicaBody $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getFatturaElettronicaBody());

        $model->setFatturaElettronicaBody([new FatturaElettronicaBody(), new FatturaElettronicaBody()]);

        $itemsBeforeForEach = $model->getFatturaElettronicaBody();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachFatturaElettronicaBody(
            static function (FatturaElettronicaBody $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getFatturaElettronicaBody());

        $model->clearFatturaElettronicaBody();

        $this->assertSame($model, $model->forEachFatturaElettronicaBody(
            static function (FatturaElettronicaBody $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\ManifestType.
     */
    public function testModelsFatturaPaxmldsigManifestType(): void
    {
        $model = new ManifestType();

        // Property Reference

        $itemsBeforeForEach = $model->getReference();

        $this->assertSame($model, $model->forEachReference(
            static function (ReferenceType $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getReference());

        $model->setReference([new ReferenceType(), new ReferenceType()]);

        $itemsBeforeForEach = $model->getReference();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachReference(
            static function (ReferenceType $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getReference());

        $model->clearReference();

        $this->assertSame($model, $model->forEachReference(
            static function (ReferenceType $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\SignaturePropertiesType.
     */
    public function testModelsFatturaPaxmldsigSignaturePropertiesType(): void
    {
        $model = new SignaturePropertiesType();

        // Property SignatureProperty

        $itemsBeforeForEach = $model->getSignatureProperty();

        $this->assertSame($model, $model->forEachSignatureProperty(
            static function (SignaturePropertyType $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getSignatureProperty());

        $model->setSignatureProperty([new SignaturePropertyType(), new SignaturePropertyType()]);

        $itemsBeforeForEach = $model->getSignatureProperty();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachSignatureProperty(
            static function (SignaturePropertyType $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getSignatureProperty());

        $model->clearSignatureProperty();

        $this->assertSame($model, $model->forEachSignatureProperty(
            static function (SignaturePropertyType $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\SignatureType.
     */
    public function testModelsFatturaPaxmldsigSignatureType(): void
    {
        $model = new SignatureType();

        // Property Object

        $itemsBeforeForEach = $model->getObject();

        $this->assertSame($model, $model->forEachObject(
            static function (ObjectType $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getObject());

        $model->setObject([new ObjectType(), new ObjectType()]);

        $itemsBeforeForEach = $model->getObject();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachObject(
            static function (ObjectType $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getObject());

        $model->clearObject();

        $this->assertSame($model, $model->forEachObject(
            static function (ObjectType $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\SignedInfoType.
     */
    public function testModelsFatturaPaxmldsigSignedInfoType(): void
    {
        $model = new SignedInfoType();

        // Property Reference

        $itemsBeforeForEach = $model->getReference();

        $this->assertSame($model, $model->forEachReference(
            static function (ReferenceType $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getReference());

        $model->setReference([new ReferenceType(), new ReferenceType()]);

        $itemsBeforeForEach = $model->getReference();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachReference(
            static function (ReferenceType $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getReference());

        $model->clearReference();

        $this->assertSame($model, $model->forEachReference(
            static function (ReferenceType $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\TransformsType.
     */
    public function testModelsFatturaPaxmldsigTransformsType(): void
    {
        $model = new TransformsType();

        // Property Transform

        $itemsBeforeForEach = $model->getTransform();

        $this->assertSame($model, $model->forEachTransform(
            static function (TransformType $item): void {
                self::fail('The callback must not be called for an unset array.');
            }
        ));

        $this->assertSame($itemsBeforeForEach, $model->getTransform());

        $model->setTransform([new TransformType(), new TransformType()]);

        $itemsBeforeForEach = $model->getTransform();
        $itemsFromForEach = [];

        $this->assertSame($model, $model->forEachTransform(
            static function (TransformType $item) use (&$itemsFromForEach): void {
                $itemsFromForEach[] = $item;
            }
        ));

        $this->assertSame($itemsBeforeForEach, $itemsFromForEach);
        $this->assertSame($itemsBeforeForEach, $model->getTransform());

        $model->clearTransform();

        $this->assertSame($model, $model->forEachTransform(
            static function (TransformType $item): void {
                self::fail('The callback must not be called for an empty array.');
            }
        ));
    }
}
