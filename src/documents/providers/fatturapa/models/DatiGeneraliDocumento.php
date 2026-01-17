<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use DateTimeImmutable;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\Art73;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\TipoDocumento;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class DatiGeneraliDocumento
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("enum<'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\TipoDocumento','value'>")
     * @JMS\Accessor(getter="getTipoDocumento", setter="setTipoDocumento")
     * @JMS\SerializedName("TipoDocumento")
     * @JMS\XmlElement(cdata=false)
     */
    private ?TipoDocumento $tipoDocumento = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getDivisa", setter="setDivisa")
     * @JMS\SerializedName("Divisa")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $divisa = null;

    /**
     * @translation-german Datum
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Accessor(getter="getData", setter="setData")
     * @JMS\SerializedName("Data")
     * @JMS\XmlElement(cdata=false)
     */
    private ?DateTimeImmutable $data = null;

    /**
     * @translation-german Nummer
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getNumero", setter="setNumero")
     * @JMS\SerializedName("Numero")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $numero = null;

    /**
     * @translation-german Quellensteuerdaten
     *
     * @var null|array<DatiRitenuta>
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiRitenuta>")
     * @JMS\Accessor(getter="getDatiRitenuta", setter="setDatiRitenuta")
     * @JMS\SerializedName("DatiRitenuta")
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlList(inline=true, entry="DatiRitenuta")
     */
    private ?array $datiRitenuta = null;

    /**
     * @translation-german Stempelsteuerdaten
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiBollo")
     * @JMS\Accessor(getter="getDatiBollo", setter="setDatiBollo")
     * @JMS\SerializedName("DatiBollo")
     * @JMS\XmlElement(cdata=false)
     */
    private ?DatiBollo $datiBollo = null;

    /**
     * @translation-german Sozialkassen-/Vorsorgedaten
     *
     * @var null|array<DatiCassaPrevidenziale>
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiCassaPrevidenziale>")
     * @JMS\Accessor(getter="getDatiCassaPrevidenziale", setter="setDatiCassaPrevidenziale")
     * @JMS\SerializedName("DatiCassaPrevidenziale")
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlList(inline=true, entry="DatiCassaPrevidenziale")
     */
    private ?array $datiCassaPrevidenziale = null;

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
     * @translation-german Betrag Gesamt Documento
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getImportoTotaleDocumento", setter="setImportoTotaleDocumento")
     * @JMS\SerializedName("ImportoTotaleDocumento")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $importoTotaleDocumento = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getArrotondamento", setter="setArrotondamento")
     * @JMS\SerializedName("Arrotondamento")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $arrotondamento = null;

    /**
     * @translation-german Begründung
     *
     * @var null|array<string>
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("array<string>")
     * @JMS\Accessor(getter="getCausale", setter="setCausale")
     * @JMS\SerializedName("Causale")
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlList(inline=true, entry="Causale")
     */
    private ?array $causale = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("enum<'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\Art73','value'>")
     * @JMS\Accessor(getter="getArt73", setter="setArt73")
     * @JMS\SerializedName("Art73")
     * @JMS\XmlElement(cdata=false)
     */
    private ?Art73 $art73 = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|TipoDocumento
     */
    public function getTipoDocumento(): ?TipoDocumento
    {
        return $this->tipoDocumento;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|TipoDocumento $tipoDocumento
     * @return static
     */
    public function setTipoDocumento(?TipoDocumento $tipoDocumento = null): static
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetTipoDocumento(): static
    {
        $this->tipoDocumento = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getDivisa(): ?string
    {
        return $this->divisa;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $divisa
     * @return static
     */
    public function setDivisa(?string $divisa = null): static
    {
        $this->divisa = InvoiceSuiteStringUtils::asNullWhenEmpty($divisa);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetDivisa(): static
    {
        $this->divisa = null;

        return $this;
    }

    /**
     * @translation-german Datum
     *
     * @return null|DateTimeImmutable
     */
    public function getData(): ?DateTimeImmutable
    {
        return $this->data;
    }

    /**
     * @translation-german Datum
     *
     * @param  null|DateTimeImmutable $data
     * @return static
     */
    public function setData(?DateTimeImmutable $data = null): static
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @translation-german Datum
     *
     * @return static
     */
    public function unsetData(): static
    {
        $this->data = null;

        return $this;
    }

    /**
     * @translation-german Nummer
     *
     * @return null|string
     */
    public function getNumero(): ?string
    {
        return $this->numero;
    }

    /**
     * @translation-german Nummer
     *
     * @param  null|string $numero
     * @return static
     */
    public function setNumero(?string $numero = null): static
    {
        $this->numero = InvoiceSuiteStringUtils::asNullWhenEmpty($numero);

        return $this;
    }

    /**
     * @translation-german Nummer
     *
     * @return static
     */
    public function unsetNumero(): static
    {
        $this->numero = null;

        return $this;
    }

    /**
     * @translation-german Quellensteuerdaten
     *
     * @return null|array<DatiRitenuta>
     */
    public function getDatiRitenuta(): ?array
    {
        return $this->datiRitenuta;
    }

    /**
     * @translation-german Quellensteuerdaten
     *
     * @param  null|array<DatiRitenuta> $datiRitenuta
     * @return static
     */
    public function setDatiRitenuta(?array $datiRitenuta = null): static
    {
        $this->datiRitenuta = $datiRitenuta;

        return $this;
    }

    /**
     * @translation-german Quellensteuerdaten
     *
     * @return static
     */
    public function unsetDatiRitenuta(): static
    {
        $this->datiRitenuta = null;

        return $this;
    }

    /**
     * @translation-german Quellensteuerdaten
     *
     * @return static
     */
    public function clearDatiRitenuta(): static
    {
        $this->datiRitenuta = [];

        return $this;
    }

    /**
     * @translation-german Quellensteuerdaten
     *
     * @param  DatiRitenuta $datiRitenuta
     * @return static
     */
    public function addToDatiRitenuta(DatiRitenuta $datiRitenuta): static
    {
        if (!is_array($this->datiRitenuta)) {
            $this->datiRitenuta = [];
        }

        $this->datiRitenuta[] = $datiRitenuta;

        return $this;
    }

    /**
     * @translation-german Quellensteuerdaten
     *
     * @return DatiRitenuta
     */
    public function addToDatiRitenutaWithCreate(): DatiRitenuta
    {
        $this->addToDatiRitenuta($datiRitenuta = new DatiRitenuta());

        return $datiRitenuta;
    }

    /**
     * @translation-german Quellensteuerdaten
     *
     * @param  DatiRitenuta $datiRitenuta
     * @return static
     */
    public function addOnceToDatiRitenuta(DatiRitenuta $datiRitenuta): static
    {
        if (!is_array($this->datiRitenuta)) {
            $this->datiRitenuta = [];
        }

        $this->datiRitenuta[0] = $datiRitenuta;

        return $this;
    }

    /**
     * @translation-german Quellensteuerdaten
     *
     * @return DatiRitenuta
     */
    public function addOnceToDatiRitenutaWithCreate(): DatiRitenuta
    {
        if (!is_array($this->datiRitenuta)) {
            $this->datiRitenuta = [];
        }

        if ([] === $this->datiRitenuta) {
            $this->addOnceToDatiRitenuta(new DatiRitenuta());
        }

        return $this->datiRitenuta[0];
    }

    /**
     * @translation-german Stempelsteuerdaten
     *
     * @return null|DatiBollo
     */
    public function getDatiBollo(): ?DatiBollo
    {
        return $this->datiBollo;
    }

    /**
     * @translation-german Stempelsteuerdaten
     *
     * @return DatiBollo
     */
    public function getDatiBolloWithCreate(): DatiBollo
    {
        $this->datiBollo = is_null($this->datiBollo) ? new DatiBollo() : $this->datiBollo;

        return $this->datiBollo;
    }

    /**
     * @translation-german Stempelsteuerdaten
     *
     * @param  null|DatiBollo $datiBollo
     * @return static
     */
    public function setDatiBollo(?DatiBollo $datiBollo = null): static
    {
        $this->datiBollo = $datiBollo;

        return $this;
    }

    /**
     * @translation-german Stempelsteuerdaten
     *
     * @return static
     */
    public function unsetDatiBollo(): static
    {
        $this->datiBollo = null;

        return $this;
    }

    /**
     * @translation-german Sozialkassen-/Vorsorgedaten
     *
     * @return null|array<DatiCassaPrevidenziale>
     */
    public function getDatiCassaPrevidenziale(): ?array
    {
        return $this->datiCassaPrevidenziale;
    }

    /**
     * @translation-german Sozialkassen-/Vorsorgedaten
     *
     * @param  null|array<DatiCassaPrevidenziale> $datiCassaPrevidenziale
     * @return static
     */
    public function setDatiCassaPrevidenziale(?array $datiCassaPrevidenziale = null): static
    {
        $this->datiCassaPrevidenziale = $datiCassaPrevidenziale;

        return $this;
    }

    /**
     * @translation-german Sozialkassen-/Vorsorgedaten
     *
     * @return static
     */
    public function unsetDatiCassaPrevidenziale(): static
    {
        $this->datiCassaPrevidenziale = null;

        return $this;
    }

    /**
     * @translation-german Sozialkassen-/Vorsorgedaten
     *
     * @return static
     */
    public function clearDatiCassaPrevidenziale(): static
    {
        $this->datiCassaPrevidenziale = [];

        return $this;
    }

    /**
     * @translation-german Sozialkassen-/Vorsorgedaten
     *
     * @param  DatiCassaPrevidenziale $datiCassaPrevidenziale
     * @return static
     */
    public function addToDatiCassaPrevidenziale(DatiCassaPrevidenziale $datiCassaPrevidenziale): static
    {
        if (!is_array($this->datiCassaPrevidenziale)) {
            $this->datiCassaPrevidenziale = [];
        }

        $this->datiCassaPrevidenziale[] = $datiCassaPrevidenziale;

        return $this;
    }

    /**
     * @translation-german Sozialkassen-/Vorsorgedaten
     *
     * @return DatiCassaPrevidenziale
     */
    public function addToDatiCassaPrevidenzialeWithCreate(): DatiCassaPrevidenziale
    {
        $this->addToDatiCassaPrevidenziale($datiCassaPrevidenziale = new DatiCassaPrevidenziale());

        return $datiCassaPrevidenziale;
    }

    /**
     * @translation-german Sozialkassen-/Vorsorgedaten
     *
     * @param  DatiCassaPrevidenziale $datiCassaPrevidenziale
     * @return static
     */
    public function addOnceToDatiCassaPrevidenziale(DatiCassaPrevidenziale $datiCassaPrevidenziale): static
    {
        if (!is_array($this->datiCassaPrevidenziale)) {
            $this->datiCassaPrevidenziale = [];
        }

        $this->datiCassaPrevidenziale[0] = $datiCassaPrevidenziale;

        return $this;
    }

    /**
     * @translation-german Sozialkassen-/Vorsorgedaten
     *
     * @return DatiCassaPrevidenziale
     */
    public function addOnceToDatiCassaPrevidenzialeWithCreate(): DatiCassaPrevidenziale
    {
        if (!is_array($this->datiCassaPrevidenziale)) {
            $this->datiCassaPrevidenziale = [];
        }

        if ([] === $this->datiCassaPrevidenziale) {
            $this->addOnceToDatiCassaPrevidenziale(new DatiCassaPrevidenziale());
        }

        return $this->datiCassaPrevidenziale[0];
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
     * @translation-german Betrag Gesamt Documento
     *
     * @return null|string
     */
    public function getImportoTotaleDocumento(): ?string
    {
        return $this->importoTotaleDocumento;
    }

    /**
     * @translation-german Betrag Gesamt Documento
     *
     * @param  null|string $importoTotaleDocumento
     * @return static
     */
    public function setImportoTotaleDocumento(?string $importoTotaleDocumento = null): static
    {
        $this->importoTotaleDocumento = InvoiceSuiteStringUtils::asNullWhenEmpty($importoTotaleDocumento);

        return $this;
    }

    /**
     * @translation-german Betrag Gesamt Documento
     *
     * @return static
     */
    public function unsetImportoTotaleDocumento(): static
    {
        $this->importoTotaleDocumento = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getArrotondamento(): ?string
    {
        return $this->arrotondamento;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $arrotondamento
     * @return static
     */
    public function setArrotondamento(?string $arrotondamento = null): static
    {
        $this->arrotondamento = InvoiceSuiteStringUtils::asNullWhenEmpty($arrotondamento);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetArrotondamento(): static
    {
        $this->arrotondamento = null;

        return $this;
    }

    /**
     * @translation-german Begründung
     *
     * @return null|array<string>
     */
    public function getCausale(): ?array
    {
        return $this->causale;
    }

    /**
     * @translation-german Begründung
     *
     * @param  null|array<string> $causale
     * @return static
     */
    public function setCausale(?array $causale = null): static
    {
        $this->causale = $causale;

        return $this;
    }

    /**
     * @translation-german Begründung
     *
     * @return static
     */
    public function unsetCausale(): static
    {
        $this->causale = null;

        return $this;
    }

    /**
     * @translation-german Begründung
     *
     * @return static
     */
    public function clearCausale(): static
    {
        $this->causale = [];

        return $this;
    }

    /**
     * @translation-german Begründung
     *
     * @param  string $causale
     * @return static
     */
    public function addToCausale(string $causale): static
    {
        if (!is_array($this->causale)) {
            $this->causale = [];
        }

        $this->causale[] = $causale;

        return $this;
    }

    /**
     * @translation-german Begründung
     *
     * @param  string $causale
     * @return static
     */
    public function addOnceToCausale(string $causale): static
    {
        if (!is_array($this->causale)) {
            $this->causale = [];
        }

        $this->causale[0] = $causale;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|Art73
     */
    public function getArt73(): ?Art73
    {
        return $this->art73;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|Art73 $art73
     * @return static
     */
    public function setArt73(?Art73 $art73 = null): static
    {
        $this->art73 = $art73;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetArt73(): static
    {
        $this->art73 = null;

        return $this;
    }
}
