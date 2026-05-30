<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

final class FatturaElettronicaBody
{
    use HandlesObjectFlags;

    /**
     * @translation-german Allgemeine Angaben
     */
    #[JMS\Accessor(getter: 'getDatiGenerali', setter: 'setDatiGenerali')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiGenerali')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiGenerali')]
    #[JMS\XmlElement(cdata: false)]
    private ?DatiGenerali $datiGenerali = null;

    /**
     * @translation-german Waren-/Dienstleistungsangaben
     */
    #[JMS\Accessor(getter: 'getDatiBeniServizi', setter: 'setDatiBeniServizi')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiBeniServizi')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiBeniServizi')]
    #[JMS\XmlElement(cdata: false)]
    private ?DatiBeniServizi $datiBeniServizi = null;

    /**
     * @translation-german Fahrzeugdaten
     */
    #[JMS\Accessor(getter: 'getDatiVeicoli', setter: 'setDatiVeicoli')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiVeicoli')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiVeicoli')]
    #[JMS\XmlElement(cdata: false)]
    private ?DatiVeicoli $datiVeicoli = null;

    /**
     * @translation-german Zahlungsangaben
     *
     * @var null|array<DatiPagamento>
     */
    #[JMS\Accessor(getter: 'getDatiPagamento', setter: 'setDatiPagamento')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiPagamento')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiPagamento>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DatiPagamento')]
    private ?array $datiPagamento = null;

    /**
     * @translation-german Anhänge
     *
     * @var null|array<Allegati>
     */
    #[JMS\Accessor(getter: 'getAllegati', setter: 'setAllegati')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Allegati')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\Allegati>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Allegati')]
    private ?array $allegati = null;

    /**
     * @translation-german Allgemeine Angaben
     *
     * @return null|DatiGenerali
     */
    public function getDatiGenerali(): ?DatiGenerali
    {
        return $this->datiGenerali;
    }

    /**
     * @translation-german Allgemeine Angaben
     *
     * @return DatiGenerali
     */
    public function getDatiGeneraliWithCreate(): DatiGenerali
    {
        $this->datiGenerali ??= new DatiGenerali();

        return $this->datiGenerali;
    }

    /**
     * @translation-german Allgemeine Angaben
     *
     * @param  null|DatiGenerali $datiGenerali
     * @return static
     */
    public function setDatiGenerali(
        ?DatiGenerali $datiGenerali = null
    ): static {
        $this->datiGenerali = $datiGenerali;

        return $this;
    }

    /**
     * @translation-german Allgemeine Angaben
     *
     * @return static
     */
    public function unsetDatiGenerali(): static
    {
        $this->datiGenerali = null;

        return $this;
    }

    /**
     * @translation-german Waren-/Dienstleistungsangaben
     *
     * @return null|DatiBeniServizi
     */
    public function getDatiBeniServizi(): ?DatiBeniServizi
    {
        return $this->datiBeniServizi;
    }

    /**
     * @translation-german Waren-/Dienstleistungsangaben
     *
     * @return DatiBeniServizi
     */
    public function getDatiBeniServiziWithCreate(): DatiBeniServizi
    {
        $this->datiBeniServizi ??= new DatiBeniServizi();

        return $this->datiBeniServizi;
    }

    /**
     * @translation-german Waren-/Dienstleistungsangaben
     *
     * @param  null|DatiBeniServizi $datiBeniServizi
     * @return static
     */
    public function setDatiBeniServizi(
        ?DatiBeniServizi $datiBeniServizi = null
    ): static {
        $this->datiBeniServizi = $datiBeniServizi;

        return $this;
    }

    /**
     * @translation-german Waren-/Dienstleistungsangaben
     *
     * @return static
     */
    public function unsetDatiBeniServizi(): static
    {
        $this->datiBeniServizi = null;

        return $this;
    }

    /**
     * @translation-german Fahrzeugdaten
     *
     * @return null|DatiVeicoli
     */
    public function getDatiVeicoli(): ?DatiVeicoli
    {
        return $this->datiVeicoli;
    }

    /**
     * @translation-german Fahrzeugdaten
     *
     * @return DatiVeicoli
     */
    public function getDatiVeicoliWithCreate(): DatiVeicoli
    {
        $this->datiVeicoli ??= new DatiVeicoli();

        return $this->datiVeicoli;
    }

    /**
     * @translation-german Fahrzeugdaten
     *
     * @param  null|DatiVeicoli $datiVeicoli
     * @return static
     */
    public function setDatiVeicoli(
        ?DatiVeicoli $datiVeicoli = null
    ): static {
        $this->datiVeicoli = $datiVeicoli;

        return $this;
    }

    /**
     * @translation-german Fahrzeugdaten
     *
     * @return static
     */
    public function unsetDatiVeicoli(): static
    {
        $this->datiVeicoli = null;

        return $this;
    }

    /**
     * @translation-german Zahlungsangaben
     *
     * @return null|array<DatiPagamento>
     */
    public function getDatiPagamento(): ?array
    {
        return $this->datiPagamento;
    }

    /**
     * @translation-german Zahlungsangaben
     *
     * @param  null|array<DatiPagamento> $datiPagamento
     * @return static
     */
    public function setDatiPagamento(
        ?array $datiPagamento = null
    ): static {
        $this->datiPagamento = $datiPagamento;

        return $this;
    }

    /**
     * @translation-german Zahlungsangaben
     *
     * @return static
     */
    public function unsetDatiPagamento(): static
    {
        $this->datiPagamento = null;

        return $this;
    }

    /**
     * @translation-german Zahlungsangaben
     *
     * @return static
     */
    public function clearDatiPagamento(): static
    {
        $this->datiPagamento = [];

        return $this;
    }

    /**
     * @translation-german Zahlungsangaben
     *
     * @param  DatiPagamento $datiPagamento
     * @return static
     */
    public function addToDatiPagamento(
        DatiPagamento $datiPagamento
    ): static {
        if (!is_array($this->datiPagamento)) {
            $this->datiPagamento = [];
        }

        $this->datiPagamento[] = $datiPagamento;

        return $this;
    }

    /**
     * @translation-german Zahlungsangaben
     *
     * @return DatiPagamento
     */
    public function addToDatiPagamentoWithCreate(): DatiPagamento
    {
        $this->addToDatiPagamento($datiPagamento = new DatiPagamento());

        return $datiPagamento;
    }

    /**
     * @translation-german Zahlungsangaben
     *
     * @param  DatiPagamento $datiPagamento
     * @return static
     */
    public function addOnceToDatiPagamento(
        DatiPagamento $datiPagamento
    ): static {
        if (!is_array($this->datiPagamento)) {
            $this->datiPagamento = [];
        }

        $this->datiPagamento[0] = $datiPagamento;

        return $this;
    }

    /**
     * @translation-german Zahlungsangaben
     *
     * @return DatiPagamento
     */
    public function addOnceToDatiPagamentoWithCreate(): DatiPagamento
    {
        if (!is_array($this->datiPagamento)) {
            $this->datiPagamento = [];
        }

        if ([] === $this->datiPagamento) {
            $this->addOnceToDatiPagamento(new DatiPagamento());
        }

        return $this->datiPagamento[0];
    }

    /**
     * @translation-german Anhänge
     *
     * @return null|array<Allegati>
     */
    public function getAllegati(): ?array
    {
        return $this->allegati;
    }

    /**
     * @translation-german Anhänge
     *
     * @param  null|array<Allegati> $allegati
     * @return static
     */
    public function setAllegati(
        ?array $allegati = null
    ): static {
        $this->allegati = $allegati;

        return $this;
    }

    /**
     * @translation-german Anhänge
     *
     * @return static
     */
    public function unsetAllegati(): static
    {
        $this->allegati = null;

        return $this;
    }

    /**
     * @translation-german Anhänge
     *
     * @return static
     */
    public function clearAllegati(): static
    {
        $this->allegati = [];

        return $this;
    }

    /**
     * @translation-german Anhänge
     *
     * @param  Allegati $allegati
     * @return static
     */
    public function addToAllegati(
        Allegati $allegati
    ): static {
        if (!is_array($this->allegati)) {
            $this->allegati = [];
        }

        $this->allegati[] = $allegati;

        return $this;
    }

    /**
     * @translation-german Anhänge
     *
     * @return Allegati
     */
    public function addToAllegatiWithCreate(): Allegati
    {
        $this->addToAllegati($allegati = new Allegati());

        return $allegati;
    }

    /**
     * @translation-german Anhänge
     *
     * @param  Allegati $allegati
     * @return static
     */
    public function addOnceToAllegati(
        Allegati $allegati
    ): static {
        if (!is_array($this->allegati)) {
            $this->allegati = [];
        }

        $this->allegati[0] = $allegati;

        return $this;
    }

    /**
     * @translation-german Anhänge
     *
     * @return Allegati
     */
    public function addOnceToAllegatiWithCreate(): Allegati
    {
        if (!is_array($this->allegati)) {
            $this->allegati = [];
        }

        if ([] === $this->allegati) {
            $this->addOnceToAllegati(new Allegati());
        }

        return $this->allegati[0];
    }
}
