<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\SoggettoEmittente;
use JMS\Serializer\Annotation as JMS;

final class FatturaElettronicaHeader
{
    use HandlesObjectFlags;

    /**
     * @translation-german Übertragungsdaten
     */
    #[JMS\Accessor(getter: 'getDatiTrasmissione', setter: 'setDatiTrasmissione')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiTrasmissione')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiTrasmissione')]
    #[JMS\XmlElement(cdata: false)]
    private ?DatiTrasmissione $datiTrasmissione = null;

    /**
     * @translation-german Aussteller Leistungserbringer
     */
    #[JMS\Accessor(getter: 'getCedentePrestatore', setter: 'setCedentePrestatore')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('CedentePrestatore')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\CedentePrestatore')]
    #[JMS\XmlElement(cdata: false)]
    private ?CedentePrestatore $cedentePrestatore = null;

    /**
     * @translation-german Vertreter Fiscale
     */
    #[JMS\Accessor(getter: 'getRappresentanteFiscale', setter: 'setRappresentanteFiscale')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('RappresentanteFiscale')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\RappresentanteFiscale')]
    #[JMS\XmlElement(cdata: false)]
    private ?RappresentanteFiscale $rappresentanteFiscale = null;

    /**
     * @translation-german Empfänger Auftraggeber
     */
    #[JMS\Accessor(getter: 'getCessionarioCommittente', setter: 'setCessionarioCommittente')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('CessionarioCommittente')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\CessionarioCommittente')]
    #[JMS\XmlElement(cdata: false)]
    private ?CessionarioCommittente $cessionarioCommittente = null;

    /**
     * @translation-german Dritter Vermittler O Soggetto Emittente
     */
    #[JMS\Accessor(getter: 'getTerzoIntermediarioOSoggettoEmittente', setter: 'setTerzoIntermediarioOSoggettoEmittente')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('TerzoIntermediarioOSoggettoEmittente')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\TerzoIntermediarioSoggettoEmittente')]
    #[JMS\XmlElement(cdata: false)]
    private ?TerzoIntermediarioSoggettoEmittente $terzoIntermediarioOSoggettoEmittente = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getSoggettoEmittente', setter: 'setSoggettoEmittente')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('SoggettoEmittente')]
    #[JMS\Type('enum<\'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\SoggettoEmittente\',\'value\'>')]
    #[JMS\XmlElement(cdata: false)]
    private ?SoggettoEmittente $soggettoEmittente = null;

    /**
     * @translation-german Übertragungsdaten
     *
     * @return null|DatiTrasmissione
     */
    public function getDatiTrasmissione(): ?DatiTrasmissione
    {
        return $this->datiTrasmissione;
    }

    /**
     * @translation-german Übertragungsdaten
     *
     * @return DatiTrasmissione
     */
    public function getDatiTrasmissioneWithCreate(): DatiTrasmissione
    {
        $this->datiTrasmissione ??= new DatiTrasmissione();

        return $this->datiTrasmissione;
    }

    /**
     * @translation-german Übertragungsdaten
     *
     * @param  null|DatiTrasmissione $datiTrasmissione
     * @return static
     */
    public function setDatiTrasmissione(
        ?DatiTrasmissione $datiTrasmissione = null
    ): static {
        $this->datiTrasmissione = $datiTrasmissione;

        return $this;
    }

    /**
     * @translation-german Übertragungsdaten
     *
     * @return static
     */
    public function unsetDatiTrasmissione(): static
    {
        $this->datiTrasmissione = null;

        return $this;
    }

    /**
     * @translation-german Aussteller Leistungserbringer
     *
     * @return null|CedentePrestatore
     */
    public function getCedentePrestatore(): ?CedentePrestatore
    {
        return $this->cedentePrestatore;
    }

    /**
     * @translation-german Aussteller Leistungserbringer
     *
     * @return CedentePrestatore
     */
    public function getCedentePrestatoreWithCreate(): CedentePrestatore
    {
        $this->cedentePrestatore ??= new CedentePrestatore();

        return $this->cedentePrestatore;
    }

    /**
     * @translation-german Aussteller Leistungserbringer
     *
     * @param  null|CedentePrestatore $cedentePrestatore
     * @return static
     */
    public function setCedentePrestatore(
        ?CedentePrestatore $cedentePrestatore = null
    ): static {
        $this->cedentePrestatore = $cedentePrestatore;

        return $this;
    }

    /**
     * @translation-german Aussteller Leistungserbringer
     *
     * @return static
     */
    public function unsetCedentePrestatore(): static
    {
        $this->cedentePrestatore = null;

        return $this;
    }

    /**
     * @translation-german Vertreter Fiscale
     *
     * @return null|RappresentanteFiscale
     */
    public function getRappresentanteFiscale(): ?RappresentanteFiscale
    {
        return $this->rappresentanteFiscale;
    }

    /**
     * @translation-german Vertreter Fiscale
     *
     * @return RappresentanteFiscale
     */
    public function getRappresentanteFiscaleWithCreate(): RappresentanteFiscale
    {
        $this->rappresentanteFiscale ??= new RappresentanteFiscale();

        return $this->rappresentanteFiscale;
    }

    /**
     * @translation-german Vertreter Fiscale
     *
     * @param  null|RappresentanteFiscale $rappresentanteFiscale
     * @return static
     */
    public function setRappresentanteFiscale(
        ?RappresentanteFiscale $rappresentanteFiscale = null
    ): static {
        $this->rappresentanteFiscale = $rappresentanteFiscale;

        return $this;
    }

    /**
     * @translation-german Vertreter Fiscale
     *
     * @return static
     */
    public function unsetRappresentanteFiscale(): static
    {
        $this->rappresentanteFiscale = null;

        return $this;
    }

    /**
     * @translation-german Empfänger Auftraggeber
     *
     * @return null|CessionarioCommittente
     */
    public function getCessionarioCommittente(): ?CessionarioCommittente
    {
        return $this->cessionarioCommittente;
    }

    /**
     * @translation-german Empfänger Auftraggeber
     *
     * @return CessionarioCommittente
     */
    public function getCessionarioCommittenteWithCreate(): CessionarioCommittente
    {
        $this->cessionarioCommittente ??= new CessionarioCommittente();

        return $this->cessionarioCommittente;
    }

    /**
     * @translation-german Empfänger Auftraggeber
     *
     * @param  null|CessionarioCommittente $cessionarioCommittente
     * @return static
     */
    public function setCessionarioCommittente(
        ?CessionarioCommittente $cessionarioCommittente = null
    ): static {
        $this->cessionarioCommittente = $cessionarioCommittente;

        return $this;
    }

    /**
     * @translation-german Empfänger Auftraggeber
     *
     * @return static
     */
    public function unsetCessionarioCommittente(): static
    {
        $this->cessionarioCommittente = null;

        return $this;
    }

    /**
     * @translation-german Dritter Vermittler O Soggetto Emittente
     *
     * @return null|TerzoIntermediarioSoggettoEmittente
     */
    public function getTerzoIntermediarioOSoggettoEmittente(): ?TerzoIntermediarioSoggettoEmittente
    {
        return $this->terzoIntermediarioOSoggettoEmittente;
    }

    /**
     * @translation-german Dritter Vermittler O Soggetto Emittente
     *
     * @return TerzoIntermediarioSoggettoEmittente
     */
    public function getTerzoIntermediarioOSoggettoEmittenteWithCreate(): TerzoIntermediarioSoggettoEmittente
    {
        $this->terzoIntermediarioOSoggettoEmittente ??= new TerzoIntermediarioSoggettoEmittente();

        return $this->terzoIntermediarioOSoggettoEmittente;
    }

    /**
     * @translation-german Dritter Vermittler O Soggetto Emittente
     *
     * @param  null|TerzoIntermediarioSoggettoEmittente $terzoIntermediarioOSoggettoEmittente
     * @return static
     */
    public function setTerzoIntermediarioOSoggettoEmittente(
        ?TerzoIntermediarioSoggettoEmittente $terzoIntermediarioOSoggettoEmittente = null
    ): static {
        $this->terzoIntermediarioOSoggettoEmittente = $terzoIntermediarioOSoggettoEmittente;

        return $this;
    }

    /**
     * @translation-german Dritter Vermittler O Soggetto Emittente
     *
     * @return static
     */
    public function unsetTerzoIntermediarioOSoggettoEmittente(): static
    {
        $this->terzoIntermediarioOSoggettoEmittente = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|SoggettoEmittente
     */
    public function getSoggettoEmittente(): ?SoggettoEmittente
    {
        return $this->soggettoEmittente;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|SoggettoEmittente $soggettoEmittente
     * @return static
     */
    public function setSoggettoEmittente(
        ?SoggettoEmittente $soggettoEmittente = null
    ): static {
        $this->soggettoEmittente = $soggettoEmittente;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetSoggettoEmittente(): static
    {
        $this->soggettoEmittente = null;

        return $this;
    }
}
