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

        // (1) Property DettaglioLinee - ForEach

        $dettagliLinee = [new DettaglioLinee(), new DettaglioLinee()];
        $model->setDettaglioLinee($dettagliLinee);

        $visitedDettagliLinee = [];

        $collectDettaglioLinea = static function (DettaglioLinee $dettaglioLinea) use (&$visitedDettagliLinee): void {
            $visitedDettagliLinee[] = $dettaglioLinea;
        };

        $this->assertSame($model, $model->forEachDettaglioLinee($collectDettaglioLinea));
        $this->assertSame($dettagliLinee, $visitedDettagliLinee);
        $this->assertSame($dettagliLinee, $model->getDettaglioLinee());

        $model->clearDettaglioLinee();
        $visitedDettagliLinee = [];

        $this->assertSame($model, $model->forEachDettaglioLinee($collectDettaglioLinea));
        $this->assertSame([], $visitedDettagliLinee);

        $model->unsetDettaglioLinee();
        $visitedDettagliLinee = [];

        $this->assertSame($model, $model->forEachDettaglioLinee($collectDettaglioLinea));
        $this->assertSame([], $visitedDettagliLinee);

        // (1) Property DatiRiepilogo - ForEach

        $datiRiepilogo = [new DatiRiepilogo(), new DatiRiepilogo()];
        $model->setDatiRiepilogo($datiRiepilogo);

        $visitedDatiRiepilogo = [];

        $collectDatoRiepilogo = static function (DatiRiepilogo $datoRiepilogo) use (&$visitedDatiRiepilogo): void {
            $visitedDatiRiepilogo[] = $datoRiepilogo;
        };

        $this->assertSame($model, $model->forEachDatiRiepilogo($collectDatoRiepilogo));
        $this->assertSame($datiRiepilogo, $visitedDatiRiepilogo);
        $this->assertSame($datiRiepilogo, $model->getDatiRiepilogo());

        $model->clearDatiRiepilogo();
        $visitedDatiRiepilogo = [];

        $this->assertSame($model, $model->forEachDatiRiepilogo($collectDatoRiepilogo));
        $this->assertSame([], $visitedDatiRiepilogo);

        $model->unsetDatiRiepilogo();
        $visitedDatiRiepilogo = [];

        $this->assertSame($model, $model->forEachDatiRiepilogo($collectDatoRiepilogo));
        $this->assertSame([], $visitedDatiRiepilogo);

        // (2) Property DettaglioLinee - Filter

        $model->setDettaglioLinee($dettagliLinee);

        $dettaglioLineaToKeep = $dettagliLinee[1];
        $visitedDettagliLinee = [];

        $selectDettaglioLinea = static function (
            DettaglioLinee $dettaglioLinea
        ) use (
            $dettaglioLineaToKeep,
            &$visitedDettagliLinee
        ): bool {
            $visitedDettagliLinee[] = $dettaglioLinea;

            return $dettaglioLinea === $dettaglioLineaToKeep;
        };

        $filteredDettagliLinee = $model->filterDettagliLinee($selectDettaglioLinea);

        $this->assertSame([1 => $dettaglioLineaToKeep], $filteredDettagliLinee);
        $this->assertSame($dettagliLinee, $visitedDettagliLinee);
        $this->assertSame($dettagliLinee, $model->getDettaglioLinee());

        $model->clearDettaglioLinee();
        $visitedDettagliLinee = [];

        $filteredDettagliLinee = $model->filterDettagliLinee($selectDettaglioLinea);

        $this->assertSame([], $filteredDettagliLinee);
        $this->assertSame([], $visitedDettagliLinee);

        $model->unsetDettaglioLinee();
        $visitedDettagliLinee = [];

        $filteredDettagliLinee = $model->filterDettagliLinee($selectDettaglioLinea);

        $this->assertSame([], $filteredDettagliLinee);
        $this->assertSame([], $visitedDettagliLinee);

        // (2) Property DatiRiepilogo - Filter

        $model->setDatiRiepilogo($datiRiepilogo);

        $datoRiepilogoToKeep = $datiRiepilogo[1];
        $visitedDatiRiepilogo = [];

        $selectDatoRiepilogo = static function (
            DatiRiepilogo $datoRiepilogo
        ) use (
            $datoRiepilogoToKeep,
            &$visitedDatiRiepilogo
        ): bool {
            $visitedDatiRiepilogo[] = $datoRiepilogo;

            return $datoRiepilogo === $datoRiepilogoToKeep;
        };

        $filteredDatiRiepilogo = $model->filterDatiRiepilogo($selectDatoRiepilogo);

        $this->assertSame([1 => $datoRiepilogoToKeep], $filteredDatiRiepilogo);
        $this->assertSame($datiRiepilogo, $visitedDatiRiepilogo);
        $this->assertSame($datiRiepilogo, $model->getDatiRiepilogo());

        $model->clearDatiRiepilogo();
        $visitedDatiRiepilogo = [];

        $filteredDatiRiepilogo = $model->filterDatiRiepilogo($selectDatoRiepilogo);

        $this->assertSame([], $filteredDatiRiepilogo);
        $this->assertSame([], $visitedDatiRiepilogo);

        $model->unsetDatiRiepilogo();
        $visitedDatiRiepilogo = [];

        $filteredDatiRiepilogo = $model->filterDatiRiepilogo($selectDatoRiepilogo);

        $this->assertSame([], $filteredDatiRiepilogo);
        $this->assertSame([], $visitedDatiRiepilogo);
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiDDT.
     */
    public function testModelsFatturaPaDatiDDT(): void
    {
        $model = new DatiDDT();

        // (1) Property RiferimentoNumeroLinea - ForEach

        $riferimentiNumeroLinea = [0, 12];
        $model->setRiferimentoNumeroLinea($riferimentiNumeroLinea);

        $visitedRiferimentiNumeroLinea = [];

        $collectRiferimentoNumeroLinea = static function (
            int $riferimentoNumeroLinea
        ) use (
            &$visitedRiferimentiNumeroLinea
        ): void {
            $visitedRiferimentiNumeroLinea[] = $riferimentoNumeroLinea;
        };

        $this->assertSame($model, $model->forEachRiferimentoNumeroLinea($collectRiferimentoNumeroLinea));
        $this->assertSame($riferimentiNumeroLinea, $visitedRiferimentiNumeroLinea);
        $this->assertSame($riferimentiNumeroLinea, $model->getRiferimentoNumeroLinea());

        $model->clearRiferimentoNumeroLinea();
        $visitedRiferimentiNumeroLinea = [];

        $this->assertSame($model, $model->forEachRiferimentoNumeroLinea($collectRiferimentoNumeroLinea));
        $this->assertSame([], $visitedRiferimentiNumeroLinea);

        $model->unsetRiferimentoNumeroLinea();
        $visitedRiferimentiNumeroLinea = [];

        $this->assertSame($model, $model->forEachRiferimentoNumeroLinea($collectRiferimentoNumeroLinea));
        $this->assertSame([], $visitedRiferimentiNumeroLinea);

        // (2) Property RiferimentoNumeroLinea - Filter

        $model->setRiferimentoNumeroLinea($riferimentiNumeroLinea);

        $riferimentoNumeroLineaToKeep = $riferimentiNumeroLinea[1];
        $visitedRiferimentiNumeroLinea = [];

        $selectRiferimentoNumeroLinea = static function (
            int $riferimentoNumeroLinea
        ) use (
            $riferimentoNumeroLineaToKeep,
            &$visitedRiferimentiNumeroLinea
        ): bool {
            $visitedRiferimentiNumeroLinea[] = $riferimentoNumeroLinea;

            return $riferimentoNumeroLinea === $riferimentoNumeroLineaToKeep;
        };

        $filteredRiferimentiNumeroLinea = $model->filterRiferimentiNumeroLinea($selectRiferimentoNumeroLinea);

        $this->assertSame([1 => $riferimentoNumeroLineaToKeep], $filteredRiferimentiNumeroLinea);
        $this->assertSame($riferimentiNumeroLinea, $visitedRiferimentiNumeroLinea);
        $this->assertSame($riferimentiNumeroLinea, $model->getRiferimentoNumeroLinea());

        $model->clearRiferimentoNumeroLinea();
        $visitedRiferimentiNumeroLinea = [];

        $filteredRiferimentiNumeroLinea = $model->filterRiferimentiNumeroLinea($selectRiferimentoNumeroLinea);

        $this->assertSame([], $filteredRiferimentiNumeroLinea);
        $this->assertSame([], $visitedRiferimentiNumeroLinea);

        $model->unsetRiferimentoNumeroLinea();
        $visitedRiferimentiNumeroLinea = [];

        $filteredRiferimentiNumeroLinea = $model->filterRiferimentiNumeroLinea($selectRiferimentoNumeroLinea);

        $this->assertSame([], $filteredRiferimentiNumeroLinea);
        $this->assertSame([], $visitedRiferimentiNumeroLinea);
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiDocumentiCorrelati.
     */
    public function testModelsFatturaPaDatiDocumentiCorrelati(): void
    {
        $model = new DatiDocumentiCorrelati();

        // (1) Property RiferimentoNumeroLinea - ForEach

        $riferimentiNumeroLinea = [0, 12];
        $model->setRiferimentoNumeroLinea($riferimentiNumeroLinea);

        $visitedRiferimentiNumeroLinea = [];

        $collectRiferimentoNumeroLinea = static function (
            int $riferimentoNumeroLinea
        ) use (
            &$visitedRiferimentiNumeroLinea
        ): void {
            $visitedRiferimentiNumeroLinea[] = $riferimentoNumeroLinea;
        };

        $this->assertSame($model, $model->forEachRiferimentoNumeroLinea($collectRiferimentoNumeroLinea));
        $this->assertSame($riferimentiNumeroLinea, $visitedRiferimentiNumeroLinea);
        $this->assertSame($riferimentiNumeroLinea, $model->getRiferimentoNumeroLinea());

        $model->clearRiferimentoNumeroLinea();
        $visitedRiferimentiNumeroLinea = [];

        $this->assertSame($model, $model->forEachRiferimentoNumeroLinea($collectRiferimentoNumeroLinea));
        $this->assertSame([], $visitedRiferimentiNumeroLinea);

        $model->unsetRiferimentoNumeroLinea();
        $visitedRiferimentiNumeroLinea = [];

        $this->assertSame($model, $model->forEachRiferimentoNumeroLinea($collectRiferimentoNumeroLinea));
        $this->assertSame([], $visitedRiferimentiNumeroLinea);

        // (2) Property RiferimentoNumeroLinea - Filter

        $model->setRiferimentoNumeroLinea($riferimentiNumeroLinea);

        $riferimentoNumeroLineaToKeep = $riferimentiNumeroLinea[1];
        $visitedRiferimentiNumeroLinea = [];

        $selectRiferimentoNumeroLinea = static function (
            int $riferimentoNumeroLinea
        ) use (
            $riferimentoNumeroLineaToKeep,
            &$visitedRiferimentiNumeroLinea
        ): bool {
            $visitedRiferimentiNumeroLinea[] = $riferimentoNumeroLinea;

            return $riferimentoNumeroLinea === $riferimentoNumeroLineaToKeep;
        };

        $filteredRiferimentiNumeroLinea = $model->filterRiferimentiNumeroLinea($selectRiferimentoNumeroLinea);

        $this->assertSame([1 => $riferimentoNumeroLineaToKeep], $filteredRiferimentiNumeroLinea);
        $this->assertSame($riferimentiNumeroLinea, $visitedRiferimentiNumeroLinea);
        $this->assertSame($riferimentiNumeroLinea, $model->getRiferimentoNumeroLinea());

        $model->clearRiferimentoNumeroLinea();
        $visitedRiferimentiNumeroLinea = [];

        $filteredRiferimentiNumeroLinea = $model->filterRiferimentiNumeroLinea($selectRiferimentoNumeroLinea);

        $this->assertSame([], $filteredRiferimentiNumeroLinea);
        $this->assertSame([], $visitedRiferimentiNumeroLinea);

        $model->unsetRiferimentoNumeroLinea();
        $visitedRiferimentiNumeroLinea = [];

        $filteredRiferimentiNumeroLinea = $model->filterRiferimentiNumeroLinea($selectRiferimentoNumeroLinea);

        $this->assertSame([], $filteredRiferimentiNumeroLinea);
        $this->assertSame([], $visitedRiferimentiNumeroLinea);
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiGenerali.
     */
    public function testModelsFatturaPaDatiGenerali(): void
    {
        $model = new DatiGenerali();

        // (1) Property DatiOrdineAcquisto - ForEach

        $datiOrdineAcquisto = [new DatiDocumentiCorrelati(), new DatiDocumentiCorrelati()];
        $model->setDatiOrdineAcquisto($datiOrdineAcquisto);

        $visitedDatiOrdineAcquisto = [];

        $collectDatoOrdineAcquisto = static function (
            DatiDocumentiCorrelati $datoOrdineAcquisto
        ) use (
            &$visitedDatiOrdineAcquisto
        ): void {
            $visitedDatiOrdineAcquisto[] = $datoOrdineAcquisto;
        };

        $this->assertSame($model, $model->forEachDatiOrdineAcquisto($collectDatoOrdineAcquisto));
        $this->assertSame($datiOrdineAcquisto, $visitedDatiOrdineAcquisto);
        $this->assertSame($datiOrdineAcquisto, $model->getDatiOrdineAcquisto());

        $model->clearDatiOrdineAcquisto();
        $visitedDatiOrdineAcquisto = [];

        $this->assertSame($model, $model->forEachDatiOrdineAcquisto($collectDatoOrdineAcquisto));
        $this->assertSame([], $visitedDatiOrdineAcquisto);

        $model->unsetDatiOrdineAcquisto();
        $visitedDatiOrdineAcquisto = [];

        $this->assertSame($model, $model->forEachDatiOrdineAcquisto($collectDatoOrdineAcquisto));
        $this->assertSame([], $visitedDatiOrdineAcquisto);

        // (1) Property DatiContratto - ForEach

        $datiContratto = [new DatiDocumentiCorrelati(), new DatiDocumentiCorrelati()];
        $model->setDatiContratto($datiContratto);

        $visitedDatiContratto = [];

        $collectDatoContratto = static function (
            DatiDocumentiCorrelati $datoContratto
        ) use (
            &$visitedDatiContratto
        ): void {
            $visitedDatiContratto[] = $datoContratto;
        };

        $this->assertSame($model, $model->forEachDatiContratto($collectDatoContratto));
        $this->assertSame($datiContratto, $visitedDatiContratto);
        $this->assertSame($datiContratto, $model->getDatiContratto());

        $model->clearDatiContratto();
        $visitedDatiContratto = [];

        $this->assertSame($model, $model->forEachDatiContratto($collectDatoContratto));
        $this->assertSame([], $visitedDatiContratto);

        $model->unsetDatiContratto();
        $visitedDatiContratto = [];

        $this->assertSame($model, $model->forEachDatiContratto($collectDatoContratto));
        $this->assertSame([], $visitedDatiContratto);

        // (1) Property DatiConvenzione - ForEach

        $datiConvenzione = [new DatiDocumentiCorrelati(), new DatiDocumentiCorrelati()];
        $model->setDatiConvenzione($datiConvenzione);

        $visitedDatiConvenzione = [];

        $collectDatoConvenzione = static function (
            DatiDocumentiCorrelati $datoConvenzione
        ) use (
            &$visitedDatiConvenzione
        ): void {
            $visitedDatiConvenzione[] = $datoConvenzione;
        };

        $this->assertSame($model, $model->forEachDatiConvenzione($collectDatoConvenzione));
        $this->assertSame($datiConvenzione, $visitedDatiConvenzione);
        $this->assertSame($datiConvenzione, $model->getDatiConvenzione());

        $model->clearDatiConvenzione();
        $visitedDatiConvenzione = [];

        $this->assertSame($model, $model->forEachDatiConvenzione($collectDatoConvenzione));
        $this->assertSame([], $visitedDatiConvenzione);

        $model->unsetDatiConvenzione();
        $visitedDatiConvenzione = [];

        $this->assertSame($model, $model->forEachDatiConvenzione($collectDatoConvenzione));
        $this->assertSame([], $visitedDatiConvenzione);

        // (1) Property DatiRicezione - ForEach

        $datiRicezione = [new DatiDocumentiCorrelati(), new DatiDocumentiCorrelati()];
        $model->setDatiRicezione($datiRicezione);

        $visitedDatiRicezione = [];

        $collectDatoRicezione = static function (
            DatiDocumentiCorrelati $datoRicezione
        ) use (
            &$visitedDatiRicezione
        ): void {
            $visitedDatiRicezione[] = $datoRicezione;
        };

        $this->assertSame($model, $model->forEachDatiRicezione($collectDatoRicezione));
        $this->assertSame($datiRicezione, $visitedDatiRicezione);
        $this->assertSame($datiRicezione, $model->getDatiRicezione());

        $model->clearDatiRicezione();
        $visitedDatiRicezione = [];

        $this->assertSame($model, $model->forEachDatiRicezione($collectDatoRicezione));
        $this->assertSame([], $visitedDatiRicezione);

        $model->unsetDatiRicezione();
        $visitedDatiRicezione = [];

        $this->assertSame($model, $model->forEachDatiRicezione($collectDatoRicezione));
        $this->assertSame([], $visitedDatiRicezione);

        // (1) Property DatiFattureCollegate - ForEach

        $datiFattureCollegate = [new DatiDocumentiCorrelati(), new DatiDocumentiCorrelati()];
        $model->setDatiFattureCollegate($datiFattureCollegate);

        $visitedDatiFattureCollegate = [];

        $collectDatoFatturaCollegata = static function (
            DatiDocumentiCorrelati $datoFatturaCollegata
        ) use (
            &$visitedDatiFattureCollegate
        ): void {
            $visitedDatiFattureCollegate[] = $datoFatturaCollegata;
        };

        $this->assertSame($model, $model->forEachDatiFattureCollegate($collectDatoFatturaCollegata));
        $this->assertSame($datiFattureCollegate, $visitedDatiFattureCollegate);
        $this->assertSame($datiFattureCollegate, $model->getDatiFattureCollegate());

        $model->clearDatiFattureCollegate();
        $visitedDatiFattureCollegate = [];

        $this->assertSame($model, $model->forEachDatiFattureCollegate($collectDatoFatturaCollegata));
        $this->assertSame([], $visitedDatiFattureCollegate);

        $model->unsetDatiFattureCollegate();
        $visitedDatiFattureCollegate = [];

        $this->assertSame($model, $model->forEachDatiFattureCollegate($collectDatoFatturaCollegata));
        $this->assertSame([], $visitedDatiFattureCollegate);

        // (1) Property DatiSAL - ForEach

        $datiSAL = [new DatiSAL(), new DatiSAL()];
        $model->setDatiSAL($datiSAL);

        $visitedDatiSAL = [];

        $collectDatoSAL = static function (DatiSAL $datoSAL) use (&$visitedDatiSAL): void {
            $visitedDatiSAL[] = $datoSAL;
        };

        $this->assertSame($model, $model->forEachDatiSAL($collectDatoSAL));
        $this->assertSame($datiSAL, $visitedDatiSAL);
        $this->assertSame($datiSAL, $model->getDatiSAL());

        $model->clearDatiSAL();
        $visitedDatiSAL = [];

        $this->assertSame($model, $model->forEachDatiSAL($collectDatoSAL));
        $this->assertSame([], $visitedDatiSAL);

        $model->unsetDatiSAL();
        $visitedDatiSAL = [];

        $this->assertSame($model, $model->forEachDatiSAL($collectDatoSAL));
        $this->assertSame([], $visitedDatiSAL);

        // (1) Property DatiDDT - ForEach

        $datiDDT = [new DatiDDT(), new DatiDDT()];
        $model->setDatiDDT($datiDDT);

        $visitedDatiDDT = [];

        $collectDatoDDT = static function (DatiDDT $datoDDT) use (&$visitedDatiDDT): void {
            $visitedDatiDDT[] = $datoDDT;
        };

        $this->assertSame($model, $model->forEachDatiDDT($collectDatoDDT));
        $this->assertSame($datiDDT, $visitedDatiDDT);
        $this->assertSame($datiDDT, $model->getDatiDDT());

        $model->clearDatiDDT();
        $visitedDatiDDT = [];

        $this->assertSame($model, $model->forEachDatiDDT($collectDatoDDT));
        $this->assertSame([], $visitedDatiDDT);

        $model->unsetDatiDDT();
        $visitedDatiDDT = [];

        $this->assertSame($model, $model->forEachDatiDDT($collectDatoDDT));
        $this->assertSame([], $visitedDatiDDT);

        // (2) Property DatiOrdineAcquisto - Filter

        $model->setDatiOrdineAcquisto($datiOrdineAcquisto);

        $datoOrdineAcquistoToKeep = $datiOrdineAcquisto[1];
        $visitedDatiOrdineAcquisto = [];

        $selectDatoOrdineAcquisto = static function (
            DatiDocumentiCorrelati $datoOrdineAcquisto
        ) use (
            $datoOrdineAcquistoToKeep,
            &$visitedDatiOrdineAcquisto
        ): bool {
            $visitedDatiOrdineAcquisto[] = $datoOrdineAcquisto;

            return $datoOrdineAcquisto === $datoOrdineAcquistoToKeep;
        };

        $filteredDatiOrdineAcquisto = $model->filterDatiOrdineAcquisto($selectDatoOrdineAcquisto);

        $this->assertSame([1 => $datoOrdineAcquistoToKeep], $filteredDatiOrdineAcquisto);
        $this->assertSame($datiOrdineAcquisto, $visitedDatiOrdineAcquisto);
        $this->assertSame($datiOrdineAcquisto, $model->getDatiOrdineAcquisto());

        $model->clearDatiOrdineAcquisto();
        $visitedDatiOrdineAcquisto = [];

        $filteredDatiOrdineAcquisto = $model->filterDatiOrdineAcquisto($selectDatoOrdineAcquisto);

        $this->assertSame([], $filteredDatiOrdineAcquisto);
        $this->assertSame([], $visitedDatiOrdineAcquisto);

        $model->unsetDatiOrdineAcquisto();
        $visitedDatiOrdineAcquisto = [];

        $filteredDatiOrdineAcquisto = $model->filterDatiOrdineAcquisto($selectDatoOrdineAcquisto);

        $this->assertSame([], $filteredDatiOrdineAcquisto);
        $this->assertSame([], $visitedDatiOrdineAcquisto);

        // (2) Property DatiContratto - Filter

        $model->setDatiContratto($datiContratto);

        $datoContrattoToKeep = $datiContratto[1];
        $visitedDatiContratto = [];

        $selectDatoContratto = static function (
            DatiDocumentiCorrelati $datoContratto
        ) use (
            $datoContrattoToKeep,
            &$visitedDatiContratto
        ): bool {
            $visitedDatiContratto[] = $datoContratto;

            return $datoContratto === $datoContrattoToKeep;
        };

        $filteredDatiContratto = $model->filterDatiContratto($selectDatoContratto);

        $this->assertSame([1 => $datoContrattoToKeep], $filteredDatiContratto);
        $this->assertSame($datiContratto, $visitedDatiContratto);
        $this->assertSame($datiContratto, $model->getDatiContratto());

        $model->clearDatiContratto();
        $visitedDatiContratto = [];

        $filteredDatiContratto = $model->filterDatiContratto($selectDatoContratto);

        $this->assertSame([], $filteredDatiContratto);
        $this->assertSame([], $visitedDatiContratto);

        $model->unsetDatiContratto();
        $visitedDatiContratto = [];

        $filteredDatiContratto = $model->filterDatiContratto($selectDatoContratto);

        $this->assertSame([], $filteredDatiContratto);
        $this->assertSame([], $visitedDatiContratto);

        // (2) Property DatiConvenzione - Filter

        $model->setDatiConvenzione($datiConvenzione);

        $datoConvenzioneToKeep = $datiConvenzione[1];
        $visitedDatiConvenzione = [];

        $selectDatoConvenzione = static function (
            DatiDocumentiCorrelati $datoConvenzione
        ) use (
            $datoConvenzioneToKeep,
            &$visitedDatiConvenzione
        ): bool {
            $visitedDatiConvenzione[] = $datoConvenzione;

            return $datoConvenzione === $datoConvenzioneToKeep;
        };

        $filteredDatiConvenzione = $model->filterDatiConvenzione($selectDatoConvenzione);

        $this->assertSame([1 => $datoConvenzioneToKeep], $filteredDatiConvenzione);
        $this->assertSame($datiConvenzione, $visitedDatiConvenzione);
        $this->assertSame($datiConvenzione, $model->getDatiConvenzione());

        $model->clearDatiConvenzione();
        $visitedDatiConvenzione = [];

        $filteredDatiConvenzione = $model->filterDatiConvenzione($selectDatoConvenzione);

        $this->assertSame([], $filteredDatiConvenzione);
        $this->assertSame([], $visitedDatiConvenzione);

        $model->unsetDatiConvenzione();
        $visitedDatiConvenzione = [];

        $filteredDatiConvenzione = $model->filterDatiConvenzione($selectDatoConvenzione);

        $this->assertSame([], $filteredDatiConvenzione);
        $this->assertSame([], $visitedDatiConvenzione);

        // (2) Property DatiRicezione - Filter

        $model->setDatiRicezione($datiRicezione);

        $datoRicezioneToKeep = $datiRicezione[1];
        $visitedDatiRicezione = [];

        $selectDatoRicezione = static function (
            DatiDocumentiCorrelati $datoRicezione
        ) use (
            $datoRicezioneToKeep,
            &$visitedDatiRicezione
        ): bool {
            $visitedDatiRicezione[] = $datoRicezione;

            return $datoRicezione === $datoRicezioneToKeep;
        };

        $filteredDatiRicezione = $model->filterDatiRicezione($selectDatoRicezione);

        $this->assertSame([1 => $datoRicezioneToKeep], $filteredDatiRicezione);
        $this->assertSame($datiRicezione, $visitedDatiRicezione);
        $this->assertSame($datiRicezione, $model->getDatiRicezione());

        $model->clearDatiRicezione();
        $visitedDatiRicezione = [];

        $filteredDatiRicezione = $model->filterDatiRicezione($selectDatoRicezione);

        $this->assertSame([], $filteredDatiRicezione);
        $this->assertSame([], $visitedDatiRicezione);

        $model->unsetDatiRicezione();
        $visitedDatiRicezione = [];

        $filteredDatiRicezione = $model->filterDatiRicezione($selectDatoRicezione);

        $this->assertSame([], $filteredDatiRicezione);
        $this->assertSame([], $visitedDatiRicezione);

        // (2) Property DatiFattureCollegate - Filter

        $model->setDatiFattureCollegate($datiFattureCollegate);

        $datoFatturaCollegataToKeep = $datiFattureCollegate[1];
        $visitedDatiFattureCollegate = [];

        $selectDatoFatturaCollegata = static function (
            DatiDocumentiCorrelati $datoFatturaCollegata
        ) use (
            $datoFatturaCollegataToKeep,
            &$visitedDatiFattureCollegate
        ): bool {
            $visitedDatiFattureCollegate[] = $datoFatturaCollegata;

            return $datoFatturaCollegata === $datoFatturaCollegataToKeep;
        };

        $filteredDatiFattureCollegate = $model->filterDatiFattureCollegate($selectDatoFatturaCollegata);

        $this->assertSame([1 => $datoFatturaCollegataToKeep], $filteredDatiFattureCollegate);
        $this->assertSame($datiFattureCollegate, $visitedDatiFattureCollegate);
        $this->assertSame($datiFattureCollegate, $model->getDatiFattureCollegate());

        $model->clearDatiFattureCollegate();
        $visitedDatiFattureCollegate = [];

        $filteredDatiFattureCollegate = $model->filterDatiFattureCollegate($selectDatoFatturaCollegata);

        $this->assertSame([], $filteredDatiFattureCollegate);
        $this->assertSame([], $visitedDatiFattureCollegate);

        $model->unsetDatiFattureCollegate();
        $visitedDatiFattureCollegate = [];

        $filteredDatiFattureCollegate = $model->filterDatiFattureCollegate($selectDatoFatturaCollegata);

        $this->assertSame([], $filteredDatiFattureCollegate);
        $this->assertSame([], $visitedDatiFattureCollegate);

        // (2) Property DatiSAL - Filter

        $model->setDatiSAL($datiSAL);

        $datoSALToKeep = $datiSAL[1];
        $visitedDatiSAL = [];

        $selectDatoSAL = static function (DatiSAL $datoSAL) use ($datoSALToKeep, &$visitedDatiSAL): bool {
            $visitedDatiSAL[] = $datoSAL;

            return $datoSAL === $datoSALToKeep;
        };

        $filteredDatiSAL = $model->filterDatiSAL($selectDatoSAL);

        $this->assertSame([1 => $datoSALToKeep], $filteredDatiSAL);
        $this->assertSame($datiSAL, $visitedDatiSAL);
        $this->assertSame($datiSAL, $model->getDatiSAL());

        $model->clearDatiSAL();
        $visitedDatiSAL = [];

        $filteredDatiSAL = $model->filterDatiSAL($selectDatoSAL);

        $this->assertSame([], $filteredDatiSAL);
        $this->assertSame([], $visitedDatiSAL);

        $model->unsetDatiSAL();
        $visitedDatiSAL = [];

        $filteredDatiSAL = $model->filterDatiSAL($selectDatoSAL);

        $this->assertSame([], $filteredDatiSAL);
        $this->assertSame([], $visitedDatiSAL);

        // (2) Property DatiDDT - Filter

        $model->setDatiDDT($datiDDT);

        $datoDDTToKeep = $datiDDT[1];
        $visitedDatiDDT = [];

        $selectDatoDDT = static function (DatiDDT $datoDDT) use ($datoDDTToKeep, &$visitedDatiDDT): bool {
            $visitedDatiDDT[] = $datoDDT;

            return $datoDDT === $datoDDTToKeep;
        };

        $filteredDatiDDT = $model->filterDatiDDT($selectDatoDDT);

        $this->assertSame([1 => $datoDDTToKeep], $filteredDatiDDT);
        $this->assertSame($datiDDT, $visitedDatiDDT);
        $this->assertSame($datiDDT, $model->getDatiDDT());

        $model->clearDatiDDT();
        $visitedDatiDDT = [];

        $filteredDatiDDT = $model->filterDatiDDT($selectDatoDDT);

        $this->assertSame([], $filteredDatiDDT);
        $this->assertSame([], $visitedDatiDDT);

        $model->unsetDatiDDT();
        $visitedDatiDDT = [];

        $filteredDatiDDT = $model->filterDatiDDT($selectDatoDDT);

        $this->assertSame([], $filteredDatiDDT);
        $this->assertSame([], $visitedDatiDDT);
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiGeneraliDocumento.
     */
    public function testModelsFatturaPaDatiGeneraliDocumento(): void
    {
        $model = new DatiGeneraliDocumento();

        // (1) Property DatiRitenuta - ForEach

        $datiRitenuta = [new DatiRitenuta(), new DatiRitenuta()];
        $model->setDatiRitenuta($datiRitenuta);

        $visitedDatiRitenuta = [];

        $collectDatoRitenuta = static function (DatiRitenuta $datoRitenuta) use (&$visitedDatiRitenuta): void {
            $visitedDatiRitenuta[] = $datoRitenuta;
        };

        $this->assertSame($model, $model->forEachDatiRitenuta($collectDatoRitenuta));
        $this->assertSame($datiRitenuta, $visitedDatiRitenuta);
        $this->assertSame($datiRitenuta, $model->getDatiRitenuta());

        $model->clearDatiRitenuta();
        $visitedDatiRitenuta = [];

        $this->assertSame($model, $model->forEachDatiRitenuta($collectDatoRitenuta));
        $this->assertSame([], $visitedDatiRitenuta);

        $model->unsetDatiRitenuta();
        $visitedDatiRitenuta = [];

        $this->assertSame($model, $model->forEachDatiRitenuta($collectDatoRitenuta));
        $this->assertSame([], $visitedDatiRitenuta);

        // (1) Property DatiCassaPrevidenziale - ForEach

        $datiCassaPrevidenziale = [new DatiCassaPrevidenziale(), new DatiCassaPrevidenziale()];
        $model->setDatiCassaPrevidenziale($datiCassaPrevidenziale);

        $visitedDatiCassaPrevidenziale = [];

        $collectDatoCassaPrevidenziale = static function (
            DatiCassaPrevidenziale $datoCassaPrevidenziale
        ) use (
            &$visitedDatiCassaPrevidenziale
        ): void {
            $visitedDatiCassaPrevidenziale[] = $datoCassaPrevidenziale;
        };

        $this->assertSame($model, $model->forEachDatiCassaPrevidenziale($collectDatoCassaPrevidenziale));
        $this->assertSame($datiCassaPrevidenziale, $visitedDatiCassaPrevidenziale);
        $this->assertSame($datiCassaPrevidenziale, $model->getDatiCassaPrevidenziale());

        $model->clearDatiCassaPrevidenziale();
        $visitedDatiCassaPrevidenziale = [];

        $this->assertSame($model, $model->forEachDatiCassaPrevidenziale($collectDatoCassaPrevidenziale));
        $this->assertSame([], $visitedDatiCassaPrevidenziale);

        $model->unsetDatiCassaPrevidenziale();
        $visitedDatiCassaPrevidenziale = [];

        $this->assertSame($model, $model->forEachDatiCassaPrevidenziale($collectDatoCassaPrevidenziale));
        $this->assertSame([], $visitedDatiCassaPrevidenziale);

        // (1) Property ScontoMaggiorazione - ForEach

        $scontiMaggiorazioni = [new ScontoMaggiorazione(), new ScontoMaggiorazione()];
        $model->setScontoMaggiorazione($scontiMaggiorazioni);

        $visitedScontiMaggiorazioni = [];

        $collectScontoMaggiorazione = static function (
            ScontoMaggiorazione $scontoMaggiorazione
        ) use (
            &$visitedScontiMaggiorazioni
        ): void {
            $visitedScontiMaggiorazioni[] = $scontoMaggiorazione;
        };

        $this->assertSame($model, $model->forEachScontoMaggiorazione($collectScontoMaggiorazione));
        $this->assertSame($scontiMaggiorazioni, $visitedScontiMaggiorazioni);
        $this->assertSame($scontiMaggiorazioni, $model->getScontoMaggiorazione());

        $model->clearScontoMaggiorazione();
        $visitedScontiMaggiorazioni = [];

        $this->assertSame($model, $model->forEachScontoMaggiorazione($collectScontoMaggiorazione));
        $this->assertSame([], $visitedScontiMaggiorazioni);

        $model->unsetScontoMaggiorazione();
        $visitedScontiMaggiorazioni = [];

        $this->assertSame($model, $model->forEachScontoMaggiorazione($collectScontoMaggiorazione));
        $this->assertSame([], $visitedScontiMaggiorazioni);

        // (1) Property Causale - ForEach

        $causali = ['', 'second'];
        $model->setCausale($causali);

        $visitedCausali = [];

        $collectCausale = static function (string $causale) use (&$visitedCausali): void {
            $visitedCausali[] = $causale;
        };

        $this->assertSame($model, $model->forEachCausale($collectCausale));
        $this->assertSame($causali, $visitedCausali);
        $this->assertSame($causali, $model->getCausale());

        $model->clearCausale();
        $visitedCausali = [];

        $this->assertSame($model, $model->forEachCausale($collectCausale));
        $this->assertSame([], $visitedCausali);

        $model->unsetCausale();
        $visitedCausali = [];

        $this->assertSame($model, $model->forEachCausale($collectCausale));
        $this->assertSame([], $visitedCausali);

        // (2) Property DatiRitenuta - Filter

        $model->setDatiRitenuta($datiRitenuta);

        $datoRitenutaToKeep = $datiRitenuta[1];
        $visitedDatiRitenuta = [];

        $selectDatoRitenuta = static function (
            DatiRitenuta $datoRitenuta
        ) use (
            $datoRitenutaToKeep,
            &$visitedDatiRitenuta
        ): bool {
            $visitedDatiRitenuta[] = $datoRitenuta;

            return $datoRitenuta === $datoRitenutaToKeep;
        };

        $filteredDatiRitenuta = $model->filterDatiRitenuta($selectDatoRitenuta);

        $this->assertSame([1 => $datoRitenutaToKeep], $filteredDatiRitenuta);
        $this->assertSame($datiRitenuta, $visitedDatiRitenuta);
        $this->assertSame($datiRitenuta, $model->getDatiRitenuta());

        $model->clearDatiRitenuta();
        $visitedDatiRitenuta = [];

        $filteredDatiRitenuta = $model->filterDatiRitenuta($selectDatoRitenuta);

        $this->assertSame([], $filteredDatiRitenuta);
        $this->assertSame([], $visitedDatiRitenuta);

        $model->unsetDatiRitenuta();
        $visitedDatiRitenuta = [];

        $filteredDatiRitenuta = $model->filterDatiRitenuta($selectDatoRitenuta);

        $this->assertSame([], $filteredDatiRitenuta);
        $this->assertSame([], $visitedDatiRitenuta);

        // (2) Property DatiCassaPrevidenziale - Filter

        $model->setDatiCassaPrevidenziale($datiCassaPrevidenziale);

        $datoCassaPrevidenzialeToKeep = $datiCassaPrevidenziale[1];
        $visitedDatiCassaPrevidenziale = [];

        $selectDatoCassaPrevidenziale = static function (
            DatiCassaPrevidenziale $datoCassaPrevidenziale
        ) use (
            $datoCassaPrevidenzialeToKeep,
            &$visitedDatiCassaPrevidenziale
        ): bool {
            $visitedDatiCassaPrevidenziale[] = $datoCassaPrevidenziale;

            return $datoCassaPrevidenziale === $datoCassaPrevidenzialeToKeep;
        };

        $filteredDatiCassaPrevidenziale = $model->filterDatiCassaPrevidenziale($selectDatoCassaPrevidenziale);

        $this->assertSame([1 => $datoCassaPrevidenzialeToKeep], $filteredDatiCassaPrevidenziale);
        $this->assertSame($datiCassaPrevidenziale, $visitedDatiCassaPrevidenziale);
        $this->assertSame($datiCassaPrevidenziale, $model->getDatiCassaPrevidenziale());

        $model->clearDatiCassaPrevidenziale();
        $visitedDatiCassaPrevidenziale = [];

        $filteredDatiCassaPrevidenziale = $model->filterDatiCassaPrevidenziale($selectDatoCassaPrevidenziale);

        $this->assertSame([], $filteredDatiCassaPrevidenziale);
        $this->assertSame([], $visitedDatiCassaPrevidenziale);

        $model->unsetDatiCassaPrevidenziale();
        $visitedDatiCassaPrevidenziale = [];

        $filteredDatiCassaPrevidenziale = $model->filterDatiCassaPrevidenziale($selectDatoCassaPrevidenziale);

        $this->assertSame([], $filteredDatiCassaPrevidenziale);
        $this->assertSame([], $visitedDatiCassaPrevidenziale);

        // (2) Property ScontoMaggiorazione - Filter

        $model->setScontoMaggiorazione($scontiMaggiorazioni);

        $scontoMaggiorazioneToKeep = $scontiMaggiorazioni[1];
        $visitedScontiMaggiorazioni = [];

        $selectScontoMaggiorazione = static function (
            ScontoMaggiorazione $scontoMaggiorazione
        ) use (
            $scontoMaggiorazioneToKeep,
            &$visitedScontiMaggiorazioni
        ): bool {
            $visitedScontiMaggiorazioni[] = $scontoMaggiorazione;

            return $scontoMaggiorazione === $scontoMaggiorazioneToKeep;
        };

        $filteredScontiMaggiorazioni = $model->filterScontiMaggiorazioni($selectScontoMaggiorazione);

        $this->assertSame([1 => $scontoMaggiorazioneToKeep], $filteredScontiMaggiorazioni);
        $this->assertSame($scontiMaggiorazioni, $visitedScontiMaggiorazioni);
        $this->assertSame($scontiMaggiorazioni, $model->getScontoMaggiorazione());

        $model->clearScontoMaggiorazione();
        $visitedScontiMaggiorazioni = [];

        $filteredScontiMaggiorazioni = $model->filterScontiMaggiorazioni($selectScontoMaggiorazione);

        $this->assertSame([], $filteredScontiMaggiorazioni);
        $this->assertSame([], $visitedScontiMaggiorazioni);

        $model->unsetScontoMaggiorazione();
        $visitedScontiMaggiorazioni = [];

        $filteredScontiMaggiorazioni = $model->filterScontiMaggiorazioni($selectScontoMaggiorazione);

        $this->assertSame([], $filteredScontiMaggiorazioni);
        $this->assertSame([], $visitedScontiMaggiorazioni);

        // (2) Property Causale - Filter

        $model->setCausale($causali);

        $causaleToKeep = $causali[1];
        $visitedCausali = [];

        $selectCausale = static function (string $causale) use ($causaleToKeep, &$visitedCausali): bool {
            $visitedCausali[] = $causale;

            return $causale === $causaleToKeep;
        };

        $filteredCausali = $model->filterCausali($selectCausale);

        $this->assertSame([1 => $causaleToKeep], $filteredCausali);
        $this->assertSame($causali, $visitedCausali);
        $this->assertSame($causali, $model->getCausale());

        $model->clearCausale();
        $visitedCausali = [];

        $filteredCausali = $model->filterCausali($selectCausale);

        $this->assertSame([], $filteredCausali);
        $this->assertSame([], $visitedCausali);

        $model->unsetCausale();
        $visitedCausali = [];

        $filteredCausali = $model->filterCausali($selectCausale);

        $this->assertSame([], $filteredCausali);
        $this->assertSame([], $visitedCausali);
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiPagamento.
     */
    public function testModelsFatturaPaDatiPagamento(): void
    {
        $model = new DatiPagamento();

        // (1) Property DettaglioPagamento - ForEach

        $dettagliPagamento = [new DettaglioPagamento(), new DettaglioPagamento()];
        $model->setDettaglioPagamento($dettagliPagamento);

        $visitedDettagliPagamento = [];

        $collectDettaglioPagamento = static function (
            DettaglioPagamento $dettaglioPagamento
        ) use (
            &$visitedDettagliPagamento
        ): void {
            $visitedDettagliPagamento[] = $dettaglioPagamento;
        };

        $this->assertSame($model, $model->forEachDettaglioPagamento($collectDettaglioPagamento));
        $this->assertSame($dettagliPagamento, $visitedDettagliPagamento);
        $this->assertSame($dettagliPagamento, $model->getDettaglioPagamento());

        $model->clearDettaglioPagamento();
        $visitedDettagliPagamento = [];

        $this->assertSame($model, $model->forEachDettaglioPagamento($collectDettaglioPagamento));
        $this->assertSame([], $visitedDettagliPagamento);

        $model->unsetDettaglioPagamento();
        $visitedDettagliPagamento = [];

        $this->assertSame($model, $model->forEachDettaglioPagamento($collectDettaglioPagamento));
        $this->assertSame([], $visitedDettagliPagamento);

        // (2) Property DettaglioPagamento - Filter

        $model->setDettaglioPagamento($dettagliPagamento);

        $dettaglioPagamentoToKeep = $dettagliPagamento[1];
        $visitedDettagliPagamento = [];

        $selectDettaglioPagamento = static function (
            DettaglioPagamento $dettaglioPagamento
        ) use (
            $dettaglioPagamentoToKeep,
            &$visitedDettagliPagamento
        ): bool {
            $visitedDettagliPagamento[] = $dettaglioPagamento;

            return $dettaglioPagamento === $dettaglioPagamentoToKeep;
        };

        $filteredDettagliPagamento = $model->filterDettagliPagamento($selectDettaglioPagamento);

        $this->assertSame([1 => $dettaglioPagamentoToKeep], $filteredDettagliPagamento);
        $this->assertSame($dettagliPagamento, $visitedDettagliPagamento);
        $this->assertSame($dettagliPagamento, $model->getDettaglioPagamento());

        $model->clearDettaglioPagamento();
        $visitedDettagliPagamento = [];

        $filteredDettagliPagamento = $model->filterDettagliPagamento($selectDettaglioPagamento);

        $this->assertSame([], $filteredDettagliPagamento);
        $this->assertSame([], $visitedDettagliPagamento);

        $model->unsetDettaglioPagamento();
        $visitedDettagliPagamento = [];

        $filteredDettagliPagamento = $model->filterDettagliPagamento($selectDettaglioPagamento);

        $this->assertSame([], $filteredDettagliPagamento);
        $this->assertSame([], $visitedDettagliPagamento);
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\DettaglioLinee.
     */
    public function testModelsFatturaPaDettaglioLinee(): void
    {
        $model = new DettaglioLinee();

        // (1) Property CodiceArticolo - ForEach

        $codiciArticolo = [new CodiceArticolo(), new CodiceArticolo()];
        $model->setCodiceArticolo($codiciArticolo);

        $visitedCodiciArticolo = [];

        $collectCodiceArticolo = static function (CodiceArticolo $codiceArticolo) use (&$visitedCodiciArticolo): void {
            $visitedCodiciArticolo[] = $codiceArticolo;
        };

        $this->assertSame($model, $model->forEachCodiceArticolo($collectCodiceArticolo));
        $this->assertSame($codiciArticolo, $visitedCodiciArticolo);
        $this->assertSame($codiciArticolo, $model->getCodiceArticolo());

        $model->clearCodiceArticolo();
        $visitedCodiciArticolo = [];

        $this->assertSame($model, $model->forEachCodiceArticolo($collectCodiceArticolo));
        $this->assertSame([], $visitedCodiciArticolo);

        $model->unsetCodiceArticolo();
        $visitedCodiciArticolo = [];

        $this->assertSame($model, $model->forEachCodiceArticolo($collectCodiceArticolo));
        $this->assertSame([], $visitedCodiciArticolo);

        // (1) Property ScontoMaggiorazione - ForEach

        $scontiMaggiorazioni = [new ScontoMaggiorazione(), new ScontoMaggiorazione()];
        $model->setScontoMaggiorazione($scontiMaggiorazioni);

        $visitedScontiMaggiorazioni = [];

        $collectScontoMaggiorazione = static function (
            ScontoMaggiorazione $scontoMaggiorazione
        ) use (
            &$visitedScontiMaggiorazioni
        ): void {
            $visitedScontiMaggiorazioni[] = $scontoMaggiorazione;
        };

        $this->assertSame($model, $model->forEachScontoMaggiorazione($collectScontoMaggiorazione));
        $this->assertSame($scontiMaggiorazioni, $visitedScontiMaggiorazioni);
        $this->assertSame($scontiMaggiorazioni, $model->getScontoMaggiorazione());

        $model->clearScontoMaggiorazione();
        $visitedScontiMaggiorazioni = [];

        $this->assertSame($model, $model->forEachScontoMaggiorazione($collectScontoMaggiorazione));
        $this->assertSame([], $visitedScontiMaggiorazioni);

        $model->unsetScontoMaggiorazione();
        $visitedScontiMaggiorazioni = [];

        $this->assertSame($model, $model->forEachScontoMaggiorazione($collectScontoMaggiorazione));
        $this->assertSame([], $visitedScontiMaggiorazioni);

        // (1) Property AltriDatiGestionali - ForEach

        $altriDatiGestionali = [new AltriDatiGestionali(), new AltriDatiGestionali()];
        $model->setAltriDatiGestionali($altriDatiGestionali);

        $visitedAltriDatiGestionali = [];

        $collectAltroDatoGestionale = static function (
            AltriDatiGestionali $altroDatoGestionale
        ) use (
            &$visitedAltriDatiGestionali
        ): void {
            $visitedAltriDatiGestionali[] = $altroDatoGestionale;
        };

        $this->assertSame($model, $model->forEachAltriDatiGestionali($collectAltroDatoGestionale));
        $this->assertSame($altriDatiGestionali, $visitedAltriDatiGestionali);
        $this->assertSame($altriDatiGestionali, $model->getAltriDatiGestionali());

        $model->clearAltriDatiGestionali();
        $visitedAltriDatiGestionali = [];

        $this->assertSame($model, $model->forEachAltriDatiGestionali($collectAltroDatoGestionale));
        $this->assertSame([], $visitedAltriDatiGestionali);

        $model->unsetAltriDatiGestionali();
        $visitedAltriDatiGestionali = [];

        $this->assertSame($model, $model->forEachAltriDatiGestionali($collectAltroDatoGestionale));
        $this->assertSame([], $visitedAltriDatiGestionali);

        // (2) Property CodiceArticolo - Filter

        $model->setCodiceArticolo($codiciArticolo);

        $codiceArticoloToKeep = $codiciArticolo[1];
        $visitedCodiciArticolo = [];

        $selectCodiceArticolo = static function (
            CodiceArticolo $codiceArticolo
        ) use (
            $codiceArticoloToKeep,
            &$visitedCodiciArticolo
        ): bool {
            $visitedCodiciArticolo[] = $codiceArticolo;

            return $codiceArticolo === $codiceArticoloToKeep;
        };

        $filteredCodiciArticolo = $model->filterCodiciArticolo($selectCodiceArticolo);

        $this->assertSame([1 => $codiceArticoloToKeep], $filteredCodiciArticolo);
        $this->assertSame($codiciArticolo, $visitedCodiciArticolo);
        $this->assertSame($codiciArticolo, $model->getCodiceArticolo());

        $model->clearCodiceArticolo();
        $visitedCodiciArticolo = [];

        $filteredCodiciArticolo = $model->filterCodiciArticolo($selectCodiceArticolo);

        $this->assertSame([], $filteredCodiciArticolo);
        $this->assertSame([], $visitedCodiciArticolo);

        $model->unsetCodiceArticolo();
        $visitedCodiciArticolo = [];

        $filteredCodiciArticolo = $model->filterCodiciArticolo($selectCodiceArticolo);

        $this->assertSame([], $filteredCodiciArticolo);
        $this->assertSame([], $visitedCodiciArticolo);

        // (2) Property ScontoMaggiorazione - Filter

        $model->setScontoMaggiorazione($scontiMaggiorazioni);

        $scontoMaggiorazioneToKeep = $scontiMaggiorazioni[1];
        $visitedScontiMaggiorazioni = [];

        $selectScontoMaggiorazione = static function (
            ScontoMaggiorazione $scontoMaggiorazione
        ) use (
            $scontoMaggiorazioneToKeep,
            &$visitedScontiMaggiorazioni
        ): bool {
            $visitedScontiMaggiorazioni[] = $scontoMaggiorazione;

            return $scontoMaggiorazione === $scontoMaggiorazioneToKeep;
        };

        $filteredScontiMaggiorazioni = $model->filterScontiMaggiorazioni($selectScontoMaggiorazione);

        $this->assertSame([1 => $scontoMaggiorazioneToKeep], $filteredScontiMaggiorazioni);
        $this->assertSame($scontiMaggiorazioni, $visitedScontiMaggiorazioni);
        $this->assertSame($scontiMaggiorazioni, $model->getScontoMaggiorazione());

        $model->clearScontoMaggiorazione();
        $visitedScontiMaggiorazioni = [];

        $filteredScontiMaggiorazioni = $model->filterScontiMaggiorazioni($selectScontoMaggiorazione);

        $this->assertSame([], $filteredScontiMaggiorazioni);
        $this->assertSame([], $visitedScontiMaggiorazioni);

        $model->unsetScontoMaggiorazione();
        $visitedScontiMaggiorazioni = [];

        $filteredScontiMaggiorazioni = $model->filterScontiMaggiorazioni($selectScontoMaggiorazione);

        $this->assertSame([], $filteredScontiMaggiorazioni);
        $this->assertSame([], $visitedScontiMaggiorazioni);

        // (2) Property AltriDatiGestionali - Filter

        $model->setAltriDatiGestionali($altriDatiGestionali);

        $altroDatoGestionaleToKeep = $altriDatiGestionali[1];
        $visitedAltriDatiGestionali = [];

        $selectAltroDatoGestionale = static function (
            AltriDatiGestionali $altroDatoGestionale
        ) use (
            $altroDatoGestionaleToKeep,
            &$visitedAltriDatiGestionali
        ): bool {
            $visitedAltriDatiGestionali[] = $altroDatoGestionale;

            return $altroDatoGestionale === $altroDatoGestionaleToKeep;
        };

        $filteredAltriDatiGestionali = $model->filterAltriDatiGestionali($selectAltroDatoGestionale);

        $this->assertSame([1 => $altroDatoGestionaleToKeep], $filteredAltriDatiGestionali);
        $this->assertSame($altriDatiGestionali, $visitedAltriDatiGestionali);
        $this->assertSame($altriDatiGestionali, $model->getAltriDatiGestionali());

        $model->clearAltriDatiGestionali();
        $visitedAltriDatiGestionali = [];

        $filteredAltriDatiGestionali = $model->filterAltriDatiGestionali($selectAltroDatoGestionale);

        $this->assertSame([], $filteredAltriDatiGestionali);
        $this->assertSame([], $visitedAltriDatiGestionali);

        $model->unsetAltriDatiGestionali();
        $visitedAltriDatiGestionali = [];

        $filteredAltriDatiGestionali = $model->filterAltriDatiGestionali($selectAltroDatoGestionale);

        $this->assertSame([], $filteredAltriDatiGestionali);
        $this->assertSame([], $visitedAltriDatiGestionali);
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\FatturaElettronicaBody.
     */
    public function testModelsFatturaPaFatturaElettronicaBody(): void
    {
        $model = new FatturaElettronicaBody();

        // (1) Property DatiPagamento - ForEach

        $datiPagamento = [new DatiPagamento(), new DatiPagamento()];
        $model->setDatiPagamento($datiPagamento);

        $visitedDatiPagamento = [];

        $collectDatoPagamento = static function (DatiPagamento $datoPagamento) use (&$visitedDatiPagamento): void {
            $visitedDatiPagamento[] = $datoPagamento;
        };

        $this->assertSame($model, $model->forEachDatiPagamento($collectDatoPagamento));
        $this->assertSame($datiPagamento, $visitedDatiPagamento);
        $this->assertSame($datiPagamento, $model->getDatiPagamento());

        $model->clearDatiPagamento();
        $visitedDatiPagamento = [];

        $this->assertSame($model, $model->forEachDatiPagamento($collectDatoPagamento));
        $this->assertSame([], $visitedDatiPagamento);

        $model->unsetDatiPagamento();
        $visitedDatiPagamento = [];

        $this->assertSame($model, $model->forEachDatiPagamento($collectDatoPagamento));
        $this->assertSame([], $visitedDatiPagamento);

        // (1) Property Allegati - ForEach

        $allegati = [new Allegati(), new Allegati()];
        $model->setAllegati($allegati);

        $visitedAllegati = [];

        $collectAllegato = static function (Allegati $allegato) use (&$visitedAllegati): void {
            $visitedAllegati[] = $allegato;
        };

        $this->assertSame($model, $model->forEachAllegati($collectAllegato));
        $this->assertSame($allegati, $visitedAllegati);
        $this->assertSame($allegati, $model->getAllegati());

        $model->clearAllegati();
        $visitedAllegati = [];

        $this->assertSame($model, $model->forEachAllegati($collectAllegato));
        $this->assertSame([], $visitedAllegati);

        $model->unsetAllegati();
        $visitedAllegati = [];

        $this->assertSame($model, $model->forEachAllegati($collectAllegato));
        $this->assertSame([], $visitedAllegati);

        // (2) Property DatiPagamento - Filter

        $model->setDatiPagamento($datiPagamento);

        $datoPagamentoToKeep = $datiPagamento[1];
        $visitedDatiPagamento = [];

        $selectDatoPagamento = static function (
            DatiPagamento $datoPagamento
        ) use (
            $datoPagamentoToKeep,
            &$visitedDatiPagamento
        ): bool {
            $visitedDatiPagamento[] = $datoPagamento;

            return $datoPagamento === $datoPagamentoToKeep;
        };

        $filteredDatiPagamento = $model->filterDatiPagamento($selectDatoPagamento);

        $this->assertSame([1 => $datoPagamentoToKeep], $filteredDatiPagamento);
        $this->assertSame($datiPagamento, $visitedDatiPagamento);
        $this->assertSame($datiPagamento, $model->getDatiPagamento());

        $model->clearDatiPagamento();
        $visitedDatiPagamento = [];

        $filteredDatiPagamento = $model->filterDatiPagamento($selectDatoPagamento);

        $this->assertSame([], $filteredDatiPagamento);
        $this->assertSame([], $visitedDatiPagamento);

        $model->unsetDatiPagamento();
        $visitedDatiPagamento = [];

        $filteredDatiPagamento = $model->filterDatiPagamento($selectDatoPagamento);

        $this->assertSame([], $filteredDatiPagamento);
        $this->assertSame([], $visitedDatiPagamento);

        // (2) Property Allegati - Filter

        $model->setAllegati($allegati);

        $allegatoToKeep = $allegati[1];
        $visitedAllegati = [];

        $selectAllegato = static function (Allegati $allegato) use ($allegatoToKeep, &$visitedAllegati): bool {
            $visitedAllegati[] = $allegato;

            return $allegato === $allegatoToKeep;
        };

        $filteredAllegati = $model->filterAllegati($selectAllegato);

        $this->assertSame([1 => $allegatoToKeep], $filteredAllegati);
        $this->assertSame($allegati, $visitedAllegati);
        $this->assertSame($allegati, $model->getAllegati());

        $model->clearAllegati();
        $visitedAllegati = [];

        $filteredAllegati = $model->filterAllegati($selectAllegato);

        $this->assertSame([], $filteredAllegati);
        $this->assertSame([], $visitedAllegati);

        $model->unsetAllegati();
        $visitedAllegati = [];

        $filteredAllegati = $model->filterAllegati($selectAllegato);

        $this->assertSame([], $filteredAllegati);
        $this->assertSame([], $visitedAllegati);
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\FatturaElettronicaType.
     */
    public function testModelsFatturaPaFatturaElettronicaType(): void
    {
        $model = new FatturaElettronicaType();

        // (1) Property FatturaElettronicaBody - ForEach

        $fattureElettronicheBody = [new FatturaElettronicaBody(), new FatturaElettronicaBody()];
        $model->setFatturaElettronicaBody($fattureElettronicheBody);

        $visitedFattureElettronicheBody = [];

        $collectFatturaElettronicaBody = static function (
            FatturaElettronicaBody $fatturaElettronicaBody
        ) use (
            &$visitedFattureElettronicheBody
        ): void {
            $visitedFattureElettronicheBody[] = $fatturaElettronicaBody;
        };

        $this->assertSame($model, $model->forEachFatturaElettronicaBody($collectFatturaElettronicaBody));
        $this->assertSame($fattureElettronicheBody, $visitedFattureElettronicheBody);
        $this->assertSame($fattureElettronicheBody, $model->getFatturaElettronicaBody());

        $model->clearFatturaElettronicaBody();
        $visitedFattureElettronicheBody = [];

        $this->assertSame($model, $model->forEachFatturaElettronicaBody($collectFatturaElettronicaBody));
        $this->assertSame([], $visitedFattureElettronicheBody);

        $model->unsetFatturaElettronicaBody();
        $visitedFattureElettronicheBody = [];

        $this->assertSame($model, $model->forEachFatturaElettronicaBody($collectFatturaElettronicaBody));
        $this->assertSame([], $visitedFattureElettronicheBody);

        // (2) Property FatturaElettronicaBody - Filter

        $model->setFatturaElettronicaBody($fattureElettronicheBody);

        $fatturaElettronicaBodyToKeep = $fattureElettronicheBody[1];
        $visitedFattureElettronicheBody = [];

        $selectFatturaElettronicaBody = static function (
            FatturaElettronicaBody $fatturaElettronicaBody
        ) use (
            $fatturaElettronicaBodyToKeep,
            &$visitedFattureElettronicheBody
        ): bool {
            $visitedFattureElettronicheBody[] = $fatturaElettronicaBody;

            return $fatturaElettronicaBody === $fatturaElettronicaBodyToKeep;
        };

        $filteredFattureElettronicheBody = $model->filterFattureElettronicheBody($selectFatturaElettronicaBody);

        $this->assertSame([1 => $fatturaElettronicaBodyToKeep], $filteredFattureElettronicheBody);
        $this->assertSame($fattureElettronicheBody, $visitedFattureElettronicheBody);
        $this->assertSame($fattureElettronicheBody, $model->getFatturaElettronicaBody());

        $model->clearFatturaElettronicaBody();
        $visitedFattureElettronicheBody = [];

        $filteredFattureElettronicheBody = $model->filterFattureElettronicheBody($selectFatturaElettronicaBody);

        $this->assertSame([], $filteredFattureElettronicheBody);
        $this->assertSame([], $visitedFattureElettronicheBody);

        $model->unsetFatturaElettronicaBody();
        $visitedFattureElettronicheBody = [];

        $filteredFattureElettronicheBody = $model->filterFattureElettronicheBody($selectFatturaElettronicaBody);

        $this->assertSame([], $filteredFattureElettronicheBody);
        $this->assertSame([], $visitedFattureElettronicheBody);
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\ManifestType.
     */
    public function testModelsFatturaPaxmldsigManifestType(): void
    {
        $model = new ManifestType();

        // (1) Property Reference - ForEach

        $references = [new ReferenceType(), new ReferenceType()];
        $model->setReference($references);

        $visitedReferences = [];

        $collectReference = static function (ReferenceType $reference) use (&$visitedReferences): void {
            $visitedReferences[] = $reference;
        };

        $this->assertSame($model, $model->forEachReference($collectReference));
        $this->assertSame($references, $visitedReferences);
        $this->assertSame($references, $model->getReference());

        $model->clearReference();
        $visitedReferences = [];

        $this->assertSame($model, $model->forEachReference($collectReference));
        $this->assertSame([], $visitedReferences);

        $model->unsetReference();
        $visitedReferences = [];

        $this->assertSame($model, $model->forEachReference($collectReference));
        $this->assertSame([], $visitedReferences);

        // (2) Property Reference - Filter

        $model->setReference($references);

        $referenceToKeep = $references[1];
        $visitedReferences = [];

        $selectReference = static function (
            ReferenceType $reference
        ) use (
            $referenceToKeep,
            &$visitedReferences
        ): bool {
            $visitedReferences[] = $reference;

            return $reference === $referenceToKeep;
        };

        $filteredReferences = $model->filterReferences($selectReference);

        $this->assertSame([1 => $referenceToKeep], $filteredReferences);
        $this->assertSame($references, $visitedReferences);
        $this->assertSame($references, $model->getReference());

        $model->clearReference();
        $visitedReferences = [];

        $filteredReferences = $model->filterReferences($selectReference);

        $this->assertSame([], $filteredReferences);
        $this->assertSame([], $visitedReferences);

        $model->unsetReference();
        $visitedReferences = [];

        $filteredReferences = $model->filterReferences($selectReference);

        $this->assertSame([], $filteredReferences);
        $this->assertSame([], $visitedReferences);
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\SignaturePropertiesType.
     */
    public function testModelsFatturaPaxmldsigSignaturePropertiesType(): void
    {
        $model = new SignaturePropertiesType();

        // (1) Property SignatureProperty - ForEach

        $signatureProperties = [new SignaturePropertyType(), new SignaturePropertyType()];
        $model->setSignatureProperty($signatureProperties);

        $visitedSignatureProperties = [];

        $collectSignatureProperty = static function (
            SignaturePropertyType $signatureProperty
        ) use (
            &$visitedSignatureProperties
        ): void {
            $visitedSignatureProperties[] = $signatureProperty;
        };

        $this->assertSame($model, $model->forEachSignatureProperty($collectSignatureProperty));
        $this->assertSame($signatureProperties, $visitedSignatureProperties);
        $this->assertSame($signatureProperties, $model->getSignatureProperty());

        $model->clearSignatureProperty();
        $visitedSignatureProperties = [];

        $this->assertSame($model, $model->forEachSignatureProperty($collectSignatureProperty));
        $this->assertSame([], $visitedSignatureProperties);

        $model->unsetSignatureProperty();
        $visitedSignatureProperties = [];

        $this->assertSame($model, $model->forEachSignatureProperty($collectSignatureProperty));
        $this->assertSame([], $visitedSignatureProperties);

        // (2) Property SignatureProperty - Filter

        $model->setSignatureProperty($signatureProperties);

        $signaturePropertyToKeep = $signatureProperties[1];
        $visitedSignatureProperties = [];

        $selectSignatureProperty = static function (
            SignaturePropertyType $signatureProperty
        ) use (
            $signaturePropertyToKeep,
            &$visitedSignatureProperties
        ): bool {
            $visitedSignatureProperties[] = $signatureProperty;

            return $signatureProperty === $signaturePropertyToKeep;
        };

        $filteredSignatureProperties = $model->filterSignatureProperties($selectSignatureProperty);

        $this->assertSame([1 => $signaturePropertyToKeep], $filteredSignatureProperties);
        $this->assertSame($signatureProperties, $visitedSignatureProperties);
        $this->assertSame($signatureProperties, $model->getSignatureProperty());

        $model->clearSignatureProperty();
        $visitedSignatureProperties = [];

        $filteredSignatureProperties = $model->filterSignatureProperties($selectSignatureProperty);

        $this->assertSame([], $filteredSignatureProperties);
        $this->assertSame([], $visitedSignatureProperties);

        $model->unsetSignatureProperty();
        $visitedSignatureProperties = [];

        $filteredSignatureProperties = $model->filterSignatureProperties($selectSignatureProperty);

        $this->assertSame([], $filteredSignatureProperties);
        $this->assertSame([], $visitedSignatureProperties);
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\SignatureType.
     */
    public function testModelsFatturaPaxmldsigSignatureType(): void
    {
        $model = new SignatureType();

        // (1) Property Object - ForEach

        $objects = [new ObjectType(), new ObjectType()];
        $model->setObject($objects);

        $visitedObjects = [];

        $collectObject = static function (ObjectType $object) use (&$visitedObjects): void {
            $visitedObjects[] = $object;
        };

        $this->assertSame($model, $model->forEachObject($collectObject));
        $this->assertSame($objects, $visitedObjects);
        $this->assertSame($objects, $model->getObject());

        $model->clearObject();
        $visitedObjects = [];

        $this->assertSame($model, $model->forEachObject($collectObject));
        $this->assertSame([], $visitedObjects);

        $model->unsetObject();
        $visitedObjects = [];

        $this->assertSame($model, $model->forEachObject($collectObject));
        $this->assertSame([], $visitedObjects);

        // (2) Property Object - Filter

        $model->setObject($objects);

        $objectToKeep = $objects[1];
        $visitedObjects = [];

        $selectObject = static function (ObjectType $object) use ($objectToKeep, &$visitedObjects): bool {
            $visitedObjects[] = $object;

            return $object === $objectToKeep;
        };

        $filteredObjects = $model->filterObjects($selectObject);

        $this->assertSame([1 => $objectToKeep], $filteredObjects);
        $this->assertSame($objects, $visitedObjects);
        $this->assertSame($objects, $model->getObject());

        $model->clearObject();
        $visitedObjects = [];

        $filteredObjects = $model->filterObjects($selectObject);

        $this->assertSame([], $filteredObjects);
        $this->assertSame([], $visitedObjects);

        $model->unsetObject();
        $visitedObjects = [];

        $filteredObjects = $model->filterObjects($selectObject);

        $this->assertSame([], $filteredObjects);
        $this->assertSame([], $visitedObjects);
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\SignedInfoType.
     */
    public function testModelsFatturaPaxmldsigSignedInfoType(): void
    {
        $model = new SignedInfoType();

        // (1) Property Reference - ForEach

        $references = [new ReferenceType(), new ReferenceType()];
        $model->setReference($references);

        $visitedReferences = [];

        $collectReference = static function (ReferenceType $reference) use (&$visitedReferences): void {
            $visitedReferences[] = $reference;
        };

        $this->assertSame($model, $model->forEachReference($collectReference));
        $this->assertSame($references, $visitedReferences);
        $this->assertSame($references, $model->getReference());

        $model->clearReference();
        $visitedReferences = [];

        $this->assertSame($model, $model->forEachReference($collectReference));
        $this->assertSame([], $visitedReferences);

        $model->unsetReference();
        $visitedReferences = [];

        $this->assertSame($model, $model->forEachReference($collectReference));
        $this->assertSame([], $visitedReferences);

        // (2) Property Reference - Filter

        $model->setReference($references);

        $referenceToKeep = $references[1];
        $visitedReferences = [];

        $selectReference = static function (
            ReferenceType $reference
        ) use (
            $referenceToKeep,
            &$visitedReferences
        ): bool {
            $visitedReferences[] = $reference;

            return $reference === $referenceToKeep;
        };

        $filteredReferences = $model->filterReferences($selectReference);

        $this->assertSame([1 => $referenceToKeep], $filteredReferences);
        $this->assertSame($references, $visitedReferences);
        $this->assertSame($references, $model->getReference());

        $model->clearReference();
        $visitedReferences = [];

        $filteredReferences = $model->filterReferences($selectReference);

        $this->assertSame([], $filteredReferences);
        $this->assertSame([], $visitedReferences);

        $model->unsetReference();
        $visitedReferences = [];

        $filteredReferences = $model->filterReferences($selectReference);

        $this->assertSame([], $filteredReferences);
        $this->assertSame([], $visitedReferences);
    }

    /**
     * Tests array iteration methods of \horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\TransformsType.
     */
    public function testModelsFatturaPaxmldsigTransformsType(): void
    {
        $model = new TransformsType();

        // (1) Property Transform - ForEach

        $transforms = [new TransformType(), new TransformType()];
        $model->setTransform($transforms);

        $visitedTransforms = [];

        $collectTransform = static function (TransformType $transform) use (&$visitedTransforms): void {
            $visitedTransforms[] = $transform;
        };

        $this->assertSame($model, $model->forEachTransform($collectTransform));
        $this->assertSame($transforms, $visitedTransforms);
        $this->assertSame($transforms, $model->getTransform());

        $model->clearTransform();
        $visitedTransforms = [];

        $this->assertSame($model, $model->forEachTransform($collectTransform));
        $this->assertSame([], $visitedTransforms);

        $model->unsetTransform();
        $visitedTransforms = [];

        $this->assertSame($model, $model->forEachTransform($collectTransform));
        $this->assertSame([], $visitedTransforms);

        // (2) Property Transform - Filter

        $model->setTransform($transforms);

        $transformToKeep = $transforms[1];
        $visitedTransforms = [];

        $selectTransform = static function (
            TransformType $transform
        ) use (
            $transformToKeep,
            &$visitedTransforms
        ): bool {
            $visitedTransforms[] = $transform;

            return $transform === $transformToKeep;
        };

        $filteredTransforms = $model->filterTransforms($selectTransform);

        $this->assertSame([1 => $transformToKeep], $filteredTransforms);
        $this->assertSame($transforms, $visitedTransforms);
        $this->assertSame($transforms, $model->getTransform());

        $model->clearTransform();
        $visitedTransforms = [];

        $filteredTransforms = $model->filterTransforms($selectTransform);

        $this->assertSame([], $filteredTransforms);
        $this->assertSame([], $visitedTransforms);

        $model->unsetTransform();
        $visitedTransforms = [];

        $filteredTransforms = $model->filterTransforms($selectTransform);

        $this->assertSame([], $filteredTransforms);
        $this->assertSame([], $visitedTransforms);
    }
}
