<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\Natura;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\Ritenuta;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\TipoCessionePrestazione;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class DettaglioLinee
{
    use HandlesObjectFlags;

    /**
     * @translation-german Nummer Position
     */
    #[JMS\Accessor(getter: 'getNumeroLinea', setter: 'setNumeroLinea')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('NumeroLinea')]
    #[JMS\Type('int')]
    #[JMS\XmlElement(cdata: false)]
    private ?int $numeroLinea = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getTipoCessionePrestazione', setter: 'setTipoCessionePrestazione')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('TipoCessionePrestazione')]
    #[JMS\Type('enum<\'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\TipoCessionePrestazione\',\'value\'>')]
    #[JMS\XmlElement(cdata: false)]
    private ?TipoCessionePrestazione $tipoCessionePrestazione = null;

    /**
     * @translation-german Code Articolo
     *
     * @var null|array<CodiceArticolo>
     */
    #[JMS\Accessor(getter: 'getCodiceArticolo', setter: 'setCodiceArticolo')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('CodiceArticolo')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\CodiceArticolo>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'CodiceArticolo')]
    private ?array $codiceArticolo = null;

    /**
     * @translation-german Beschreibung
     */
    #[JMS\Accessor(getter: 'getDescrizione', setter: 'setDescrizione')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Descrizione')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $descrizione = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getQuantita', setter: 'setQuantita')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Quantita')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $quantita = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getUnitaMisura', setter: 'setUnitaMisura')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('UnitaMisura')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $unitaMisura = null;

    /**
     * @translation-german Datum Inizio Periodo
     */
    #[JMS\Accessor(getter: 'getDataInizioPeriodo', setter: 'setDataInizioPeriodo')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DataInizioPeriodo')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(cdata: false)]
    private ?DateTimeInterface $dataInizioPeriodo = null;

    /**
     * @translation-german Datum Fine Periodo
     */
    #[JMS\Accessor(getter: 'getDataFinePeriodo', setter: 'setDataFinePeriodo')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DataFinePeriodo')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(cdata: false)]
    private ?DateTimeInterface $dataFinePeriodo = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getPrezzoUnitario', setter: 'setPrezzoUnitario')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('PrezzoUnitario')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $prezzoUnitario = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|array<ScontoMaggiorazione>
     */
    #[JMS\Accessor(getter: 'getScontoMaggiorazione', setter: 'setScontoMaggiorazione')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('ScontoMaggiorazione')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\ScontoMaggiorazione>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ScontoMaggiorazione')]
    private ?array $scontoMaggiorazione = null;

    /**
     * @translation-german Prezzo Gesamt
     */
    #[JMS\Accessor(getter: 'getPrezzoTotale', setter: 'setPrezzoTotale')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('PrezzoTotale')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $prezzoTotale = null;

    /**
     * @translation-german Steuersatz IVA
     */
    #[JMS\Accessor(getter: 'getAliquotaIVA', setter: 'setAliquotaIVA')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('AliquotaIVA')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $aliquotaIVA = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getRitenuta', setter: 'setRitenuta')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Ritenuta')]
    #[JMS\Type('enum<\'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\Ritenuta\',\'value\'>')]
    #[JMS\XmlElement(cdata: false)]
    private ?Ritenuta $ritenuta = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getNatura', setter: 'setNatura')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Natura')]
    #[JMS\Type('enum<\'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\Natura\',\'value\'>')]
    #[JMS\XmlElement(cdata: false)]
    private ?Natura $natura = null;

    /**
     * @translation-german Referenz Amministrazione
     */
    #[JMS\Accessor(getter: 'getRiferimentoAmministrazione', setter: 'setRiferimentoAmministrazione')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('RiferimentoAmministrazione')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $riferimentoAmministrazione = null;

    /**
     * @translation-german Altri Angaben Gestionali
     *
     * @var null|array<AltriDatiGestionali>
     */
    #[JMS\Accessor(getter: 'getAltriDatiGestionali', setter: 'setAltriDatiGestionali')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('AltriDatiGestionali')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\AltriDatiGestionali>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'AltriDatiGestionali')]
    private ?array $altriDatiGestionali = null;

    /**
     * @translation-german Nummer Position
     *
     * @return null|int
     */
    public function getNumeroLinea(): ?int
    {
        return $this->numeroLinea;
    }

    /**
     * @translation-german Nummer Position
     *
     * @param  null|int $numeroLinea
     * @return static
     */
    public function setNumeroLinea(
        ?int $numeroLinea = null
    ): static {
        $this->numeroLinea = $numeroLinea;

        return $this;
    }

    /**
     * @translation-german Nummer Position
     *
     * @return static
     */
    public function unsetNumeroLinea(): static
    {
        $this->numeroLinea = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|TipoCessionePrestazione
     */
    public function getTipoCessionePrestazione(): ?TipoCessionePrestazione
    {
        return $this->tipoCessionePrestazione;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|TipoCessionePrestazione $tipoCessionePrestazione
     * @return static
     */
    public function setTipoCessionePrestazione(
        ?TipoCessionePrestazione $tipoCessionePrestazione = null
    ): static {
        $this->tipoCessionePrestazione = $tipoCessionePrestazione;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetTipoCessionePrestazione(): static
    {
        $this->tipoCessionePrestazione = null;

        return $this;
    }

    /**
     * @translation-german Code Articolo
     *
     * @return null|array<CodiceArticolo>
     */
    public function getCodiceArticolo(): ?array
    {
        return $this->codiceArticolo;
    }

    /**
     * @translation-german Code Articolo
     *
     * @param  null|array<CodiceArticolo> $codiceArticolo
     * @return static
     */
    public function setCodiceArticolo(
        ?array $codiceArticolo = null
    ): static {
        $this->codiceArticolo = $codiceArticolo;

        return $this;
    }

    /**
     * @translation-german Code Articolo
     *
     * @return static
     */
    public function unsetCodiceArticolo(): static
    {
        $this->codiceArticolo = null;

        return $this;
    }

    /**
     * @translation-german Code Articolo
     *
     * @return static
     */
    public function clearCodiceArticolo(): static
    {
        $this->codiceArticolo = [];

        return $this;
    }

    /**
     * @translation-german Code Articolo
     *
     * @param  CodiceArticolo $codiceArticolo
     * @return static
     */
    public function addToCodiceArticolo(
        CodiceArticolo $codiceArticolo
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->codiceArticolo)) {
            $this->codiceArticolo = [];
        }

        $this->codiceArticolo[] = $codiceArticolo;

        return $this;
    }

    /**
     * @translation-german Code Articolo
     *
     * @return CodiceArticolo
     */
    public function addToCodiceArticoloWithCreate(): CodiceArticolo
    {
        $this->addToCodiceArticolo($codiceArticolo = new CodiceArticolo());

        return $codiceArticolo;
    }

    /**
     * @translation-german Code Articolo
     *
     * @param  CodiceArticolo $codiceArticolo
     * @return static
     */
    public function addOnceToCodiceArticolo(
        CodiceArticolo $codiceArticolo
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->codiceArticolo)) {
            $this->codiceArticolo = [];
        }

        $this->codiceArticolo[0] = $codiceArticolo;

        return $this;
    }

    /**
     * @translation-german Code Articolo
     *
     * @return CodiceArticolo
     */
    public function addOnceToCodiceArticoloWithCreate(): CodiceArticolo
    {
        if (!InvoiceSuiteArrayUtils::is($this->codiceArticolo)) {
            $this->codiceArticolo = [];
        }

        if ([] === $this->codiceArticolo) {
            $this->addOnceToCodiceArticolo(new CodiceArticolo());
        }

        return $this->codiceArticolo[0];
    }

    /**
     * @translation-german Beschreibung
     *
     * @return null|string
     */
    public function getDescrizione(): ?string
    {
        return $this->descrizione;
    }

    /**
     * @translation-german Beschreibung
     *
     * @param  null|string $descrizione
     * @return static
     */
    public function setDescrizione(
        ?string $descrizione = null
    ): static {
        $this->descrizione = InvoiceSuiteStringUtils::asNullWhenEmpty($descrizione);

        return $this;
    }

    /**
     * @translation-german Beschreibung
     *
     * @return static
     */
    public function unsetDescrizione(): static
    {
        $this->descrizione = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|float
     */
    public function getQuantita(): ?float
    {
        return $this->quantita;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|float $quantita
     * @return static
     */
    public function setQuantita(
        ?float $quantita = null
    ): static {
        $this->quantita = $quantita;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetQuantita(): static
    {
        $this->quantita = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getUnitaMisura(): ?string
    {
        return $this->unitaMisura;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $unitaMisura
     * @return static
     */
    public function setUnitaMisura(
        ?string $unitaMisura = null
    ): static {
        $this->unitaMisura = InvoiceSuiteStringUtils::asNullWhenEmpty($unitaMisura);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetUnitaMisura(): static
    {
        $this->unitaMisura = null;

        return $this;
    }

    /**
     * @translation-german Datum Inizio Periodo
     *
     * @return null|DateTimeInterface
     */
    public function getDataInizioPeriodo(): ?DateTimeInterface
    {
        return $this->dataInizioPeriodo;
    }

    /**
     * @translation-german Datum Inizio Periodo
     *
     * @param  null|DateTimeInterface $dataInizioPeriodo
     * @return static
     */
    public function setDataInizioPeriodo(
        ?DateTimeInterface $dataInizioPeriodo = null
    ): static {
        $this->dataInizioPeriodo = $dataInizioPeriodo;

        return $this;
    }

    /**
     * @translation-german Datum Inizio Periodo
     *
     * @return static
     */
    public function unsetDataInizioPeriodo(): static
    {
        $this->dataInizioPeriodo = null;

        return $this;
    }

    /**
     * @translation-german Datum Fine Periodo
     *
     * @return null|DateTimeInterface
     */
    public function getDataFinePeriodo(): ?DateTimeInterface
    {
        return $this->dataFinePeriodo;
    }

    /**
     * @translation-german Datum Fine Periodo
     *
     * @param  null|DateTimeInterface $dataFinePeriodo
     * @return static
     */
    public function setDataFinePeriodo(
        ?DateTimeInterface $dataFinePeriodo = null
    ): static {
        $this->dataFinePeriodo = $dataFinePeriodo;

        return $this;
    }

    /**
     * @translation-german Datum Fine Periodo
     *
     * @return static
     */
    public function unsetDataFinePeriodo(): static
    {
        $this->dataFinePeriodo = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|float
     */
    public function getPrezzoUnitario(): ?float
    {
        return $this->prezzoUnitario;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|float $prezzoUnitario
     * @return static
     */
    public function setPrezzoUnitario(
        ?float $prezzoUnitario = null
    ): static {
        $this->prezzoUnitario = $prezzoUnitario;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetPrezzoUnitario(): static
    {
        $this->prezzoUnitario = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|array<ScontoMaggiorazione>
     */
    public function getScontoMaggiorazione(): ?array
    {
        return $this->scontoMaggiorazione;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|array<ScontoMaggiorazione> $scontoMaggiorazione
     * @return static
     */
    public function setScontoMaggiorazione(
        ?array $scontoMaggiorazione = null
    ): static {
        $this->scontoMaggiorazione = $scontoMaggiorazione;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetScontoMaggiorazione(): static
    {
        $this->scontoMaggiorazione = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function clearScontoMaggiorazione(): static
    {
        $this->scontoMaggiorazione = [];

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  ScontoMaggiorazione $scontoMaggiorazione
     * @return static
     */
    public function addToScontoMaggiorazione(
        ScontoMaggiorazione $scontoMaggiorazione
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->scontoMaggiorazione)) {
            $this->scontoMaggiorazione = [];
        }

        $this->scontoMaggiorazione[] = $scontoMaggiorazione;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return ScontoMaggiorazione
     */
    public function addToScontoMaggiorazioneWithCreate(): ScontoMaggiorazione
    {
        $this->addToScontoMaggiorazione($scontoMaggiorazione = new ScontoMaggiorazione());

        return $scontoMaggiorazione;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  ScontoMaggiorazione $scontoMaggiorazione
     * @return static
     */
    public function addOnceToScontoMaggiorazione(
        ScontoMaggiorazione $scontoMaggiorazione
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->scontoMaggiorazione)) {
            $this->scontoMaggiorazione = [];
        }

        $this->scontoMaggiorazione[0] = $scontoMaggiorazione;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return ScontoMaggiorazione
     */
    public function addOnceToScontoMaggiorazioneWithCreate(): ScontoMaggiorazione
    {
        if (!InvoiceSuiteArrayUtils::is($this->scontoMaggiorazione)) {
            $this->scontoMaggiorazione = [];
        }

        if ([] === $this->scontoMaggiorazione) {
            $this->addOnceToScontoMaggiorazione(new ScontoMaggiorazione());
        }

        return $this->scontoMaggiorazione[0];
    }

    /**
     * @translation-german Prezzo Gesamt
     *
     * @return null|float
     */
    public function getPrezzoTotale(): ?float
    {
        return $this->prezzoTotale;
    }

    /**
     * @translation-german Prezzo Gesamt
     *
     * @param  null|float $prezzoTotale
     * @return static
     */
    public function setPrezzoTotale(
        ?float $prezzoTotale = null
    ): static {
        $this->prezzoTotale = $prezzoTotale;

        return $this;
    }

    /**
     * @translation-german Prezzo Gesamt
     *
     * @return static
     */
    public function unsetPrezzoTotale(): static
    {
        $this->prezzoTotale = null;

        return $this;
    }

    /**
     * @translation-german Steuersatz IVA
     *
     * @return null|float
     */
    public function getAliquotaIVA(): ?float
    {
        return $this->aliquotaIVA;
    }

    /**
     * @translation-german Steuersatz IVA
     *
     * @param  null|float $aliquotaIVA
     * @return static
     */
    public function setAliquotaIVA(
        ?float $aliquotaIVA = null
    ): static {
        $this->aliquotaIVA = $aliquotaIVA;

        return $this;
    }

    /**
     * @translation-german Steuersatz IVA
     *
     * @return static
     */
    public function unsetAliquotaIVA(): static
    {
        $this->aliquotaIVA = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|Ritenuta
     */
    public function getRitenuta(): ?Ritenuta
    {
        return $this->ritenuta;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|Ritenuta $ritenuta
     * @return static
     */
    public function setRitenuta(
        ?Ritenuta $ritenuta = null
    ): static {
        $this->ritenuta = $ritenuta;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetRitenuta(): static
    {
        $this->ritenuta = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|Natura
     */
    public function getNatura(): ?Natura
    {
        return $this->natura;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|Natura $natura
     * @return static
     */
    public function setNatura(
        ?Natura $natura = null
    ): static {
        $this->natura = $natura;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetNatura(): static
    {
        $this->natura = null;

        return $this;
    }

    /**
     * @translation-german Referenz Amministrazione
     *
     * @return null|string
     */
    public function getRiferimentoAmministrazione(): ?string
    {
        return $this->riferimentoAmministrazione;
    }

    /**
     * @translation-german Referenz Amministrazione
     *
     * @param  null|string $riferimentoAmministrazione
     * @return static
     */
    public function setRiferimentoAmministrazione(
        ?string $riferimentoAmministrazione = null
    ): static {
        $this->riferimentoAmministrazione = InvoiceSuiteStringUtils::asNullWhenEmpty($riferimentoAmministrazione);

        return $this;
    }

    /**
     * @translation-german Referenz Amministrazione
     *
     * @return static
     */
    public function unsetRiferimentoAmministrazione(): static
    {
        $this->riferimentoAmministrazione = null;

        return $this;
    }

    /**
     * @translation-german Altri Angaben Gestionali
     *
     * @return null|array<AltriDatiGestionali>
     */
    public function getAltriDatiGestionali(): ?array
    {
        return $this->altriDatiGestionali;
    }

    /**
     * @translation-german Altri Angaben Gestionali
     *
     * @param  null|array<AltriDatiGestionali> $altriDatiGestionali
     * @return static
     */
    public function setAltriDatiGestionali(
        ?array $altriDatiGestionali = null
    ): static {
        $this->altriDatiGestionali = $altriDatiGestionali;

        return $this;
    }

    /**
     * @translation-german Altri Angaben Gestionali
     *
     * @return static
     */
    public function unsetAltriDatiGestionali(): static
    {
        $this->altriDatiGestionali = null;

        return $this;
    }

    /**
     * @translation-german Altri Angaben Gestionali
     *
     * @return static
     */
    public function clearAltriDatiGestionali(): static
    {
        $this->altriDatiGestionali = [];

        return $this;
    }

    /**
     * @translation-german Altri Angaben Gestionali
     *
     * @param  AltriDatiGestionali $altriDatiGestionali
     * @return static
     */
    public function addToAltriDatiGestionali(
        AltriDatiGestionali $altriDatiGestionali
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->altriDatiGestionali)) {
            $this->altriDatiGestionali = [];
        }

        $this->altriDatiGestionali[] = $altriDatiGestionali;

        return $this;
    }

    /**
     * @translation-german Altri Angaben Gestionali
     *
     * @return AltriDatiGestionali
     */
    public function addToAltriDatiGestionaliWithCreate(): AltriDatiGestionali
    {
        $this->addToAltriDatiGestionali($altriDatiGestionali = new AltriDatiGestionali());

        return $altriDatiGestionali;
    }

    /**
     * @translation-german Altri Angaben Gestionali
     *
     * @param  AltriDatiGestionali $altriDatiGestionali
     * @return static
     */
    public function addOnceToAltriDatiGestionali(
        AltriDatiGestionali $altriDatiGestionali
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->altriDatiGestionali)) {
            $this->altriDatiGestionali = [];
        }

        $this->altriDatiGestionali[0] = $altriDatiGestionali;

        return $this;
    }

    /**
     * @translation-german Altri Angaben Gestionali
     *
     * @return AltriDatiGestionali
     */
    public function addOnceToAltriDatiGestionaliWithCreate(): AltriDatiGestionali
    {
        if (!InvoiceSuiteArrayUtils::is($this->altriDatiGestionali)) {
            $this->altriDatiGestionali = [];
        }

        if ([] === $this->altriDatiGestionali) {
            $this->addOnceToAltriDatiGestionali(new AltriDatiGestionali());
        }

        return $this->altriDatiGestionali[0];
    }
}
