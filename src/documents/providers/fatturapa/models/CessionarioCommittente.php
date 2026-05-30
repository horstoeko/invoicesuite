<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

final class CessionarioCommittente
{
    use HandlesObjectFlags;

    /**
     * @translation-german Stammdaten
     */
    #[JMS\Accessor(getter: 'getDatiAnagrafici', setter: 'setDatiAnagrafici')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiAnagrafici')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiAnagraficiCessionario')]
    #[JMS\XmlElement(cdata: false)]
    private ?DatiAnagraficiCessionario $datiAnagrafici = null;

    /**
     * @translation-german Sitz
     */
    #[JMS\Accessor(getter: 'getSede', setter: 'setSede')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Sede')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\Indirizzo')]
    #[JMS\XmlElement(cdata: false)]
    private ?Indirizzo $sede = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getStabileOrganizzazione', setter: 'setStabileOrganizzazione')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('StabileOrganizzazione')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\Indirizzo')]
    #[JMS\XmlElement(cdata: false)]
    private ?Indirizzo $stabileOrganizzazione = null;

    /**
     * @translation-german Vertreter Fiscale
     */
    #[JMS\Accessor(getter: 'getRappresentanteFiscale', setter: 'setRappresentanteFiscale')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('RappresentanteFiscale')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\RappresentanteFiscaleCessionario')]
    #[JMS\XmlElement(cdata: false)]
    private ?RappresentanteFiscaleCessionario $rappresentanteFiscale = null;

    /**
     * @translation-german Stammdaten
     *
     * @return null|DatiAnagraficiCessionario
     */
    public function getDatiAnagrafici(): ?DatiAnagraficiCessionario
    {
        return $this->datiAnagrafici;
    }

    /**
     * @translation-german Stammdaten
     *
     * @return DatiAnagraficiCessionario
     */
    public function getDatiAnagraficiWithCreate(): DatiAnagraficiCessionario
    {
        $this->datiAnagrafici ??= new DatiAnagraficiCessionario();

        return $this->datiAnagrafici;
    }

    /**
     * @translation-german Stammdaten
     *
     * @param  null|DatiAnagraficiCessionario $datiAnagrafici
     * @return static
     */
    public function setDatiAnagrafici(
        ?DatiAnagraficiCessionario $datiAnagrafici = null
    ): static {
        $this->datiAnagrafici = $datiAnagrafici;

        return $this;
    }

    /**
     * @translation-german Stammdaten
     *
     * @return static
     */
    public function unsetDatiAnagrafici(): static
    {
        $this->datiAnagrafici = null;

        return $this;
    }

    /**
     * @translation-german Sitz
     *
     * @return null|Indirizzo
     */
    public function getSede(): ?Indirizzo
    {
        return $this->sede;
    }

    /**
     * @translation-german Sitz
     *
     * @return Indirizzo
     */
    public function getSedeWithCreate(): Indirizzo
    {
        $this->sede ??= new Indirizzo();

        return $this->sede;
    }

    /**
     * @translation-german Sitz
     *
     * @param  null|Indirizzo $sede
     * @return static
     */
    public function setSede(
        ?Indirizzo $sede = null
    ): static {
        $this->sede = $sede;

        return $this;
    }

    /**
     * @translation-german Sitz
     *
     * @return static
     */
    public function unsetSede(): static
    {
        $this->sede = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|Indirizzo
     */
    public function getStabileOrganizzazione(): ?Indirizzo
    {
        return $this->stabileOrganizzazione;
    }

    /**
     * @translation-german-untranslated
     *
     * @return Indirizzo
     */
    public function getStabileOrganizzazioneWithCreate(): Indirizzo
    {
        $this->stabileOrganizzazione ??= new Indirizzo();

        return $this->stabileOrganizzazione;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|Indirizzo $stabileOrganizzazione
     * @return static
     */
    public function setStabileOrganizzazione(
        ?Indirizzo $stabileOrganizzazione = null
    ): static {
        $this->stabileOrganizzazione = $stabileOrganizzazione;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetStabileOrganizzazione(): static
    {
        $this->stabileOrganizzazione = null;

        return $this;
    }

    /**
     * @translation-german Vertreter Fiscale
     *
     * @return null|RappresentanteFiscaleCessionario
     */
    public function getRappresentanteFiscale(): ?RappresentanteFiscaleCessionario
    {
        return $this->rappresentanteFiscale;
    }

    /**
     * @translation-german Vertreter Fiscale
     *
     * @return RappresentanteFiscaleCessionario
     */
    public function getRappresentanteFiscaleWithCreate(): RappresentanteFiscaleCessionario
    {
        $this->rappresentanteFiscale ??= new RappresentanteFiscaleCessionario();

        return $this->rappresentanteFiscale;
    }

    /**
     * @translation-german Vertreter Fiscale
     *
     * @param  null|RappresentanteFiscaleCessionario $rappresentanteFiscale
     * @return static
     */
    public function setRappresentanteFiscale(
        ?RappresentanteFiscaleCessionario $rappresentanteFiscale = null
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
}
