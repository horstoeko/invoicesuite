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
     */
    #[JMS\Accessor(getter: 'getDatiAnagraficiVettore', setter: 'setDatiAnagraficiVettore')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiAnagraficiVettore')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiAnagraficiVettore')]
    #[JMS\XmlElement(cdata: false)]
    private ?DatiAnagraficiVettore $datiAnagraficiVettore = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getMezzoTrasporto', setter: 'setMezzoTrasporto')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('MezzoTrasporto')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $mezzoTrasporto = null;

    /**
     * @translation-german Begründung Trasporto
     */
    #[JMS\Accessor(getter: 'getCausaleTrasporto', setter: 'setCausaleTrasporto')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('CausaleTrasporto')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $causaleTrasporto = null;

    /**
     * @translation-german Nummer Colli
     */
    #[JMS\Accessor(getter: 'getNumeroColli', setter: 'setNumeroColli')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('NumeroColli')]
    #[JMS\Type('int')]
    #[JMS\XmlElement(cdata: false)]
    private ?int $numeroColli = null;

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
    #[JMS\Accessor(getter: 'getUnitaMisuraPeso', setter: 'setUnitaMisuraPeso')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('UnitaMisuraPeso')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $unitaMisuraPeso = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getPesoLordo', setter: 'setPesoLordo')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('PesoLordo')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $pesoLordo = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getPesoNetto', setter: 'setPesoNetto')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('PesoNetto')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $pesoNetto = null;

    /**
     * @translation-german Datum Ora Ritiro
     */
    #[JMS\Accessor(getter: 'getDataOraRitiro', setter: 'setDataOraRitiro')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DataOraRitiro')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\DateTime')]
    #[JMS\XmlElement(cdata: false)]
    private ?DateTimeInterface $dataOraRitiro = null;

    /**
     * @translation-german Datum Inizio Trasporto
     */
    #[JMS\Accessor(getter: 'getDataInizioTrasporto', setter: 'setDataInizioTrasporto')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DataInizioTrasporto')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(cdata: false)]
    private ?DateTimeInterface $dataInizioTrasporto = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getTipoResa', setter: 'setTipoResa')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('TipoResa')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $tipoResa = null;

    /**
     * @translation-german Adresse Resa
     */
    #[JMS\Accessor(getter: 'getIndirizzoResa', setter: 'setIndirizzoResa')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('IndirizzoResa')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\Indirizzo')]
    #[JMS\XmlElement(cdata: false)]
    private ?Indirizzo $indirizzoResa = null;

    /**
     * @translation-german Datum Ora Consegna
     */
    #[JMS\Accessor(getter: 'getDataOraConsegna', setter: 'setDataOraConsegna')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DataOraConsegna')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\DateTime')]
    #[JMS\XmlElement(cdata: false)]
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
        $this->datiAnagraficiVettore ??= new DatiAnagraficiVettore();

        return $this->datiAnagraficiVettore;
    }

    /**
     * @translation-german Stammdaten Vettore
     *
     * @param  null|DatiAnagraficiVettore $datiAnagraficiVettore
     * @return static
     */
    public function setDatiAnagraficiVettore(
        ?DatiAnagraficiVettore $datiAnagraficiVettore = null
    ): static {
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
    public function setMezzoTrasporto(
        ?string $mezzoTrasporto = null
    ): static {
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
    public function setCausaleTrasporto(
        ?string $causaleTrasporto = null
    ): static {
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
    public function setNumeroColli(
        ?int $numeroColli = null
    ): static {
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
    public function setUnitaMisuraPeso(
        ?string $unitaMisuraPeso = null
    ): static {
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
     * @return null|float
     */
    public function getPesoLordo(): ?float
    {
        return $this->pesoLordo;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|float $pesoLordo
     * @return static
     */
    public function setPesoLordo(
        ?float $pesoLordo = null
    ): static {
        $this->pesoLordo = $pesoLordo;

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
     * @return null|float
     */
    public function getPesoNetto(): ?float
    {
        return $this->pesoNetto;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|float $pesoNetto
     * @return static
     */
    public function setPesoNetto(
        ?float $pesoNetto = null
    ): static {
        $this->pesoNetto = $pesoNetto;

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
    public function setDataOraRitiro(
        ?DateTimeInterface $dataOraRitiro = null
    ): static {
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
    public function setDataInizioTrasporto(
        ?DateTimeInterface $dataInizioTrasporto = null
    ): static {
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
    public function setTipoResa(
        ?string $tipoResa = null
    ): static {
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
        $this->indirizzoResa ??= new Indirizzo();

        return $this->indirizzoResa;
    }

    /**
     * @translation-german Adresse Resa
     *
     * @param  null|Indirizzo $indirizzoResa
     * @return static
     */
    public function setIndirizzoResa(
        ?Indirizzo $indirizzoResa = null
    ): static {
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
    public function setDataOraConsegna(
        ?DateTimeInterface $dataOraConsegna = null
    ): static {
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
}
