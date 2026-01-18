<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\Natura;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\Ritenuta;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\TipoCessionePrestazione;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class DettaglioLinee
{
    use HandlesObjectFlags;

    /**
     * @translation-german Nummer Position
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("int")
     * @JMS\Accessor(getter="getNumeroLinea", setter="setNumeroLinea")
     * @JMS\SerializedName("NumeroLinea")
     * @JMS\XmlElement(cdata=false)
     */
    private ?int $numeroLinea = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("enum<'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\TipoCessionePrestazione','value'>")
     * @JMS\Accessor(getter="getTipoCessionePrestazione", setter="setTipoCessionePrestazione")
     * @JMS\SerializedName("TipoCessionePrestazione")
     * @JMS\XmlElement(cdata=false)
     */
    private ?TipoCessionePrestazione $tipoCessionePrestazione = null;

    /**
     * @translation-german Code Articolo
     *
     * @var null|array<CodiceArticolo>
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\providers\fatturapa\models\CodiceArticolo>")
     * @JMS\Accessor(getter="getCodiceArticolo", setter="setCodiceArticolo")
     * @JMS\SerializedName("CodiceArticolo")
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlList(inline=true, entry="CodiceArticolo")
     */
    private ?array $codiceArticolo = null;

    /**
     * @translation-german Beschreibung
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getDescrizione", setter="setDescrizione")
     * @JMS\SerializedName("Descrizione")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $descrizione = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getQuantita", setter="setQuantita")
     * @JMS\SerializedName("Quantita")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $quantita = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getUnitaMisura", setter="setUnitaMisura")
     * @JMS\SerializedName("UnitaMisura")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $unitaMisura = null;

    /**
     * @translation-german Datum Inizio Periodo
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Accessor(getter="getDataInizioPeriodo", setter="setDataInizioPeriodo")
     * @JMS\SerializedName("DataInizioPeriodo")
     * @JMS\XmlElement(cdata=false)
     */
    private ?DateTimeInterface $dataInizioPeriodo = null;

    /**
     * @translation-german Datum Fine Periodo
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Accessor(getter="getDataFinePeriodo", setter="setDataFinePeriodo")
     * @JMS\SerializedName("DataFinePeriodo")
     * @JMS\XmlElement(cdata=false)
     */
    private ?DateTimeInterface $dataFinePeriodo = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getPrezzoUnitario", setter="setPrezzoUnitario")
     * @JMS\SerializedName("PrezzoUnitario")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $prezzoUnitario = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|array<ScontoMaggiorazione>
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\providers\fatturapa\models\ScontoMaggiorazione>")
     * @JMS\Accessor(getter="getScontoMaggiorazione", setter="setScontoMaggiorazione")
     * @JMS\SerializedName("ScontoMaggiorazione")
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlList(inline=true, entry="ScontoMaggiorazione")
     */
    private ?array $scontoMaggiorazione = null;

    /**
     * @translation-german Prezzo Gesamt
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getPrezzoTotale", setter="setPrezzoTotale")
     * @JMS\SerializedName("PrezzoTotale")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $prezzoTotale = null;

    /**
     * @translation-german Steuersatz IVA
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getAliquotaIVA", setter="setAliquotaIVA")
     * @JMS\SerializedName("AliquotaIVA")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $aliquotaIVA = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("enum<'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\Ritenuta','value'>")
     * @JMS\Accessor(getter="getRitenuta", setter="setRitenuta")
     * @JMS\SerializedName("Ritenuta")
     * @JMS\XmlElement(cdata=false)
     */
    private ?Ritenuta $ritenuta = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("enum<'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\Natura','value'>")
     * @JMS\Accessor(getter="getNatura", setter="setNatura")
     * @JMS\SerializedName("Natura")
     * @JMS\XmlElement(cdata=false)
     */
    private ?Natura $natura = null;

    /**
     * @translation-german Referenz Amministrazione
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getRiferimentoAmministrazione", setter="setRiferimentoAmministrazione")
     * @JMS\SerializedName("RiferimentoAmministrazione")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $riferimentoAmministrazione = null;

    /**
     * @translation-german Altri Angaben Gestionali
     *
     * @var null|array<AltriDatiGestionali>
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\providers\fatturapa\models\AltriDatiGestionali>")
     * @JMS\Accessor(getter="getAltriDatiGestionali", setter="setAltriDatiGestionali")
     * @JMS\SerializedName("AltriDatiGestionali")
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlList(inline=true, entry="AltriDatiGestionali")
     */
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
    public function setNumeroLinea(?int $numeroLinea = null): static
    {
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
    public function setTipoCessionePrestazione(?TipoCessionePrestazione $tipoCessionePrestazione = null): static
    {
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
    public function setCodiceArticolo(?array $codiceArticolo = null): static
    {
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
    public function addToCodiceArticolo(CodiceArticolo $codiceArticolo): static
    {
        if (!is_array($this->codiceArticolo)) {
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
    public function addOnceToCodiceArticolo(CodiceArticolo $codiceArticolo): static
    {
        if (!is_array($this->codiceArticolo)) {
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
        if (!is_array($this->codiceArticolo)) {
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
    public function setDescrizione(?string $descrizione = null): static
    {
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
     * @return null|string
     */
    public function getQuantita(): ?string
    {
        return $this->quantita;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $quantita
     * @return static
     */
    public function setQuantita(?string $quantita = null): static
    {
        $this->quantita = InvoiceSuiteStringUtils::asNullWhenEmpty($quantita);

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
    public function setUnitaMisura(?string $unitaMisura = null): static
    {
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
    public function setDataInizioPeriodo(?DateTimeInterface $dataInizioPeriodo = null): static
    {
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
    public function setDataFinePeriodo(?DateTimeInterface $dataFinePeriodo = null): static
    {
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
     * @return null|string
     */
    public function getPrezzoUnitario(): ?string
    {
        return $this->prezzoUnitario;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $prezzoUnitario
     * @return static
     */
    public function setPrezzoUnitario(?string $prezzoUnitario = null): static
    {
        $this->prezzoUnitario = InvoiceSuiteStringUtils::asNullWhenEmpty($prezzoUnitario);

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
    public function setScontoMaggiorazione(?array $scontoMaggiorazione = null): static
    {
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
    public function addToScontoMaggiorazione(ScontoMaggiorazione $scontoMaggiorazione): static
    {
        if (!is_array($this->scontoMaggiorazione)) {
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
    public function addOnceToScontoMaggiorazione(ScontoMaggiorazione $scontoMaggiorazione): static
    {
        if (!is_array($this->scontoMaggiorazione)) {
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
        if (!is_array($this->scontoMaggiorazione)) {
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
     * @return null|string
     */
    public function getPrezzoTotale(): ?string
    {
        return $this->prezzoTotale;
    }

    /**
     * @translation-german Prezzo Gesamt
     *
     * @param  null|string $prezzoTotale
     * @return static
     */
    public function setPrezzoTotale(?string $prezzoTotale = null): static
    {
        $this->prezzoTotale = InvoiceSuiteStringUtils::asNullWhenEmpty($prezzoTotale);

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
     * @return null|string
     */
    public function getAliquotaIVA(): ?string
    {
        return $this->aliquotaIVA;
    }

    /**
     * @translation-german Steuersatz IVA
     *
     * @param  null|string $aliquotaIVA
     * @return static
     */
    public function setAliquotaIVA(?string $aliquotaIVA = null): static
    {
        $this->aliquotaIVA = InvoiceSuiteStringUtils::asNullWhenEmpty($aliquotaIVA);

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
    public function setRitenuta(?Ritenuta $ritenuta = null): static
    {
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
    public function setNatura(?Natura $natura = null): static
    {
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
    public function setRiferimentoAmministrazione(?string $riferimentoAmministrazione = null): static
    {
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
    public function setAltriDatiGestionali(?array $altriDatiGestionali = null): static
    {
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
    public function addToAltriDatiGestionali(AltriDatiGestionali $altriDatiGestionali): static
    {
        if (!is_array($this->altriDatiGestionali)) {
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
    public function addOnceToAltriDatiGestionali(AltriDatiGestionali $altriDatiGestionali): static
    {
        if (!is_array($this->altriDatiGestionali)) {
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
        if (!is_array($this->altriDatiGestionali)) {
            $this->altriDatiGestionali = [];
        }

        if ([] === $this->altriDatiGestionali) {
            $this->addOnceToAltriDatiGestionali(new AltriDatiGestionali());
        }

        return $this->altriDatiGestionali[0];
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert als Float lesen.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @return null|float
     */
    public function getQuantitaAsFloat(): ?float
    {
        return is_null($this->quantita) ? null : (float) $this->quantita;
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert aus Float setzen.
     * Wenn $scale nicht gesetzt ist, wird ein sinnvoller Default verwendet.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @param  null|float $value
     * @param  null|int   $scale anzahl Nachkommastellen (wird auf den erlaubten Bereich begrenzt)
     * @return static
     */
    public function setQuantitaFromFloat(?float $value = null, ?int $scale = null): static
    {
        if (is_null($value)) {
            return $this->setQuantita(null);
        }

        $scale = max(2, min(8, $scale ?? 2));
        $formatted = number_format($value, $scale, '.', '');

        return $this->setQuantita($formatted);
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert als Float lesen.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @return null|float
     */
    public function getPrezzoUnitarioAsFloat(): ?float
    {
        return is_null($this->prezzoUnitario) ? null : (float) $this->prezzoUnitario;
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert aus Float setzen.
     * Wenn $scale nicht gesetzt ist, wird ein sinnvoller Default verwendet.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @param  null|float $value
     * @param  null|int   $scale anzahl Nachkommastellen (wird auf den erlaubten Bereich begrenzt)
     * @return static
     */
    public function setPrezzoUnitarioFromFloat(?float $value = null, ?int $scale = null): static
    {
        if (is_null($value)) {
            return $this->setPrezzoUnitario(null);
        }

        $scale = max(2, min(8, $scale ?? 2));
        $formatted = number_format($value, $scale, '.', '');

        return $this->setPrezzoUnitario($formatted);
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert als Float lesen.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @return null|float
     */
    public function getPrezzoTotaleAsFloat(): ?float
    {
        return is_null($this->prezzoTotale) ? null : (float) $this->prezzoTotale;
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert aus Float setzen.
     * Wenn $scale nicht gesetzt ist, wird ein sinnvoller Default verwendet.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @param  null|float $value
     * @param  null|int   $scale anzahl Nachkommastellen (wird auf den erlaubten Bereich begrenzt)
     * @return static
     */
    public function setPrezzoTotaleFromFloat(?float $value = null, ?int $scale = null): static
    {
        if (is_null($value)) {
            return $this->setPrezzoTotale(null);
        }

        $scale = max(2, min(8, $scale ?? 2));
        $formatted = number_format($value, $scale, '.', '');

        return $this->setPrezzoTotale($formatted);
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert als Float lesen.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @return null|float
     */
    public function getAliquotaIVAAsFloat(): ?float
    {
        return is_null($this->aliquotaIVA) ? null : (float) $this->aliquotaIVA;
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert aus Float setzen.
     * Wenn $scale nicht gesetzt ist, wird ein sinnvoller Default verwendet.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @param  null|float $value
     * @param  null|int   $scale anzahl Nachkommastellen (wird auf den erlaubten Bereich begrenzt)
     * @return static
     */
    public function setAliquotaIVAFromFloat(?float $value = null, ?int $scale = null): static
    {
        if (is_null($value)) {
            return $this->setAliquotaIVA(null);
        }

        $formatted = number_format($value, 2, '.', '');

        return $this->setAliquotaIVA($formatted);
    }
}
