<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class DatiTrasporto
{
    use HandlesObjectFlags;

    /**
     * @translation-german Stammdaten Vettore
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiAnagraficiVettore")
     * @JMS\Accessor(getter="getDatiAnagraficiVettore", setter="setDatiAnagraficiVettore")
     * @JMS\SerializedName("DatiAnagraficiVettore")
     * @JMS\XmlElement(cdata=false)
     */
    private ?DatiAnagraficiVettore $datiAnagraficiVettore = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getMezzoTrasporto", setter="setMezzoTrasporto")
     * @JMS\SerializedName("MezzoTrasporto")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $mezzoTrasporto = null;

    /**
     * @translation-german Begründung Trasporto
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getCausaleTrasporto", setter="setCausaleTrasporto")
     * @JMS\SerializedName("CausaleTrasporto")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $causaleTrasporto = null;

    /**
     * @translation-german Nummer Colli
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("int")
     * @JMS\Accessor(getter="getNumeroColli", setter="setNumeroColli")
     * @JMS\SerializedName("NumeroColli")
     * @JMS\XmlElement(cdata=false)
     */
    private ?int $numeroColli = null;

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
     * @JMS\Accessor(getter="getUnitaMisuraPeso", setter="setUnitaMisuraPeso")
     * @JMS\SerializedName("UnitaMisuraPeso")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $unitaMisuraPeso = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getPesoLordo", setter="setPesoLordo")
     * @JMS\SerializedName("PesoLordo")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $pesoLordo = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getPesoNetto", setter="setPesoNetto")
     * @JMS\SerializedName("PesoNetto")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $pesoNetto = null;

    /**
     * @translation-german Datum Ora Ritiro
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\DateTime")
     * @JMS\Accessor(getter="getDataOraRitiro", setter="setDataOraRitiro")
     * @JMS\SerializedName("DataOraRitiro")
     * @JMS\XmlElement(cdata=false)
     */
    private ?DateTimeInterface $dataOraRitiro = null;

    /**
     * @translation-german Datum Inizio Trasporto
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Accessor(getter="getDataInizioTrasporto", setter="setDataInizioTrasporto")
     * @JMS\SerializedName("DataInizioTrasporto")
     * @JMS\XmlElement(cdata=false)
     */
    private ?DateTimeInterface $dataInizioTrasporto = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getTipoResa", setter="setTipoResa")
     * @JMS\SerializedName("TipoResa")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $tipoResa = null;

    /**
     * @translation-german Adresse Resa
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("horstoeko\invoicesuite\documents\providers\fatturapa\models\Indirizzo")
     * @JMS\Accessor(getter="getIndirizzoResa", setter="setIndirizzoResa")
     * @JMS\SerializedName("IndirizzoResa")
     * @JMS\XmlElement(cdata=false)
     */
    private ?Indirizzo $indirizzoResa = null;

    /**
     * @translation-german Datum Ora Consegna
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\DateTime")
     * @JMS\Accessor(getter="getDataOraConsegna", setter="setDataOraConsegna")
     * @JMS\SerializedName("DataOraConsegna")
     * @JMS\XmlElement(cdata=false)
     */
    private ?DateTimeInterface $dataOraConsegna = null;

    /**
     * @translation-german Stammdaten Vettore
     *
     * @return null|DatiAnagraficiVettore
     */
    public function getDatiAnagraficiVettore(): ?DatiAnagraficiVettore
    {
        return $this->datiAnagraficiVettore;
    }

    /**
     * @translation-german Stammdaten Vettore
     *
     * @return DatiAnagraficiVettore
     */
    public function getDatiAnagraficiVettoreWithCreate(): DatiAnagraficiVettore
    {
        $this->datiAnagraficiVettore = is_null($this->datiAnagraficiVettore) ? new DatiAnagraficiVettore() : $this->datiAnagraficiVettore;

        return $this->datiAnagraficiVettore;
    }

    /**
     * @translation-german Stammdaten Vettore
     *
     * @param  null|DatiAnagraficiVettore $datiAnagraficiVettore
     * @return static
     */
    public function setDatiAnagraficiVettore(?DatiAnagraficiVettore $datiAnagraficiVettore = null): static
    {
        $this->datiAnagraficiVettore = $datiAnagraficiVettore;

        return $this;
    }

    /**
     * @translation-german Stammdaten Vettore
     *
     * @return static
     */
    public function unsetDatiAnagraficiVettore(): static
    {
        $this->datiAnagraficiVettore = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getMezzoTrasporto(): ?string
    {
        return $this->mezzoTrasporto;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $mezzoTrasporto
     * @return static
     */
    public function setMezzoTrasporto(?string $mezzoTrasporto = null): static
    {
        $this->mezzoTrasporto = InvoiceSuiteStringUtils::asNullWhenEmpty($mezzoTrasporto);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetMezzoTrasporto(): static
    {
        $this->mezzoTrasporto = null;

        return $this;
    }

    /**
     * @translation-german Begründung Trasporto
     *
     * @return null|string
     */
    public function getCausaleTrasporto(): ?string
    {
        return $this->causaleTrasporto;
    }

    /**
     * @translation-german Begründung Trasporto
     *
     * @param  null|string $causaleTrasporto
     * @return static
     */
    public function setCausaleTrasporto(?string $causaleTrasporto = null): static
    {
        $this->causaleTrasporto = InvoiceSuiteStringUtils::asNullWhenEmpty($causaleTrasporto);

        return $this;
    }

    /**
     * @translation-german Begründung Trasporto
     *
     * @return static
     */
    public function unsetCausaleTrasporto(): static
    {
        $this->causaleTrasporto = null;

        return $this;
    }

    /**
     * @translation-german Nummer Colli
     *
     * @return null|int
     */
    public function getNumeroColli(): ?int
    {
        return $this->numeroColli;
    }

    /**
     * @translation-german Nummer Colli
     *
     * @param  null|int $numeroColli
     * @return static
     */
    public function setNumeroColli(?int $numeroColli = null): static
    {
        $this->numeroColli = $numeroColli;

        return $this;
    }

    /**
     * @translation-german Nummer Colli
     *
     * @return static
     */
    public function unsetNumeroColli(): static
    {
        $this->numeroColli = null;

        return $this;
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
    public function getUnitaMisuraPeso(): ?string
    {
        return $this->unitaMisuraPeso;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $unitaMisuraPeso
     * @return static
     */
    public function setUnitaMisuraPeso(?string $unitaMisuraPeso = null): static
    {
        $this->unitaMisuraPeso = InvoiceSuiteStringUtils::asNullWhenEmpty($unitaMisuraPeso);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetUnitaMisuraPeso(): static
    {
        $this->unitaMisuraPeso = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getPesoLordo(): ?string
    {
        return $this->pesoLordo;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $pesoLordo
     * @return static
     */
    public function setPesoLordo(?string $pesoLordo = null): static
    {
        $this->pesoLordo = InvoiceSuiteStringUtils::asNullWhenEmpty($pesoLordo);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetPesoLordo(): static
    {
        $this->pesoLordo = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getPesoNetto(): ?string
    {
        return $this->pesoNetto;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $pesoNetto
     * @return static
     */
    public function setPesoNetto(?string $pesoNetto = null): static
    {
        $this->pesoNetto = InvoiceSuiteStringUtils::asNullWhenEmpty($pesoNetto);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetPesoNetto(): static
    {
        $this->pesoNetto = null;

        return $this;
    }

    /**
     * @translation-german Datum Ora Ritiro
     *
     * @return null|DateTimeInterface
     */
    public function getDataOraRitiro(): ?DateTimeInterface
    {
        return $this->dataOraRitiro;
    }

    /**
     * @translation-german Datum Ora Ritiro
     *
     * @param  null|DateTimeInterface $dataOraRitiro
     * @return static
     */
    public function setDataOraRitiro(?DateTimeInterface $dataOraRitiro = null): static
    {
        $this->dataOraRitiro = $dataOraRitiro;

        return $this;
    }

    /**
     * @translation-german Datum Ora Ritiro
     *
     * @return static
     */
    public function unsetDataOraRitiro(): static
    {
        $this->dataOraRitiro = null;

        return $this;
    }

    /**
     * @translation-german Datum Inizio Trasporto
     *
     * @return null|DateTimeInterface
     */
    public function getDataInizioTrasporto(): ?DateTimeInterface
    {
        return $this->dataInizioTrasporto;
    }

    /**
     * @translation-german Datum Inizio Trasporto
     *
     * @param  null|DateTimeInterface $dataInizioTrasporto
     * @return static
     */
    public function setDataInizioTrasporto(?DateTimeInterface $dataInizioTrasporto = null): static
    {
        $this->dataInizioTrasporto = $dataInizioTrasporto;

        return $this;
    }

    /**
     * @translation-german Datum Inizio Trasporto
     *
     * @return static
     */
    public function unsetDataInizioTrasporto(): static
    {
        $this->dataInizioTrasporto = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getTipoResa(): ?string
    {
        return $this->tipoResa;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $tipoResa
     * @return static
     */
    public function setTipoResa(?string $tipoResa = null): static
    {
        $this->tipoResa = InvoiceSuiteStringUtils::asNullWhenEmpty($tipoResa);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetTipoResa(): static
    {
        $this->tipoResa = null;

        return $this;
    }

    /**
     * @translation-german Adresse Resa
     *
     * @return null|Indirizzo
     */
    public function getIndirizzoResa(): ?Indirizzo
    {
        return $this->indirizzoResa;
    }

    /**
     * @translation-german Adresse Resa
     *
     * @return Indirizzo
     */
    public function getIndirizzoResaWithCreate(): Indirizzo
    {
        $this->indirizzoResa = is_null($this->indirizzoResa) ? new Indirizzo() : $this->indirizzoResa;

        return $this->indirizzoResa;
    }

    /**
     * @translation-german Adresse Resa
     *
     * @param  null|Indirizzo $indirizzoResa
     * @return static
     */
    public function setIndirizzoResa(?Indirizzo $indirizzoResa = null): static
    {
        $this->indirizzoResa = $indirizzoResa;

        return $this;
    }

    /**
     * @translation-german Adresse Resa
     *
     * @return static
     */
    public function unsetIndirizzoResa(): static
    {
        $this->indirizzoResa = null;

        return $this;
    }

    /**
     * @translation-german Datum Ora Consegna
     *
     * @return null|DateTimeInterface
     */
    public function getDataOraConsegna(): ?DateTimeInterface
    {
        return $this->dataOraConsegna;
    }

    /**
     * @translation-german Datum Ora Consegna
     *
     * @param  null|DateTimeInterface $dataOraConsegna
     * @return static
     */
    public function setDataOraConsegna(?DateTimeInterface $dataOraConsegna = null): static
    {
        $this->dataOraConsegna = $dataOraConsegna;

        return $this;
    }

    /**
     * @translation-german Datum Ora Consegna
     *
     * @return static
     */
    public function unsetDataOraConsegna(): static
    {
        $this->dataOraConsegna = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert als Float lesen.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @return null|float
     */
    public function getPesoLordoAsFloat(): ?float
    {
        return is_null($this->pesoLordo) ? null : (float) $this->pesoLordo;
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
    public function setPesoLordoFromFloat(?float $value = null, ?int $scale = null): static
    {
        if (is_null($value)) {
            return $this->setPesoLordo(null);
        }

        $scale = max(1, min(2, $scale ?? 1));
        $formatted = number_format($value, $scale, '.', '');

        return $this->setPesoLordo($formatted);
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert als Float lesen.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @return null|float
     */
    public function getPesoNettoAsFloat(): ?float
    {
        return is_null($this->pesoNetto) ? null : (float) $this->pesoNetto;
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
    public function setPesoNettoFromFloat(?float $value = null, ?int $scale = null): static
    {
        if (is_null($value)) {
            return $this->setPesoNetto(null);
        }

        $scale = max(1, min(2, $scale ?? 1));
        $formatted = number_format($value, $scale, '.', '');

        return $this->setPesoNetto($formatted);
    }
}
