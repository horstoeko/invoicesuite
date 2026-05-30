<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class CedentePrestatore
{
    use HandlesObjectFlags;

    /**
     * @translation-german Stammdaten
     */
    #[JMS\Accessor(getter: 'getDatiAnagrafici', setter: 'setDatiAnagrafici')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiAnagrafici')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiAnagraficiCedente')]
    #[JMS\XmlElement(cdata: false)]
    private ?DatiAnagraficiCedente $datiAnagrafici = null;

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
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getIscrizioneREA', setter: 'setIscrizioneREA')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('IscrizioneREA')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\IscrizioneREA')]
    #[JMS\XmlElement(cdata: false)]
    private ?IscrizioneREA $iscrizioneREA = null;

    /**
     * @translation-german Kontakte
     */
    #[JMS\Accessor(getter: 'getContatti', setter: 'setContatti')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Contatti')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\Contatti')]
    #[JMS\XmlElement(cdata: false)]
    private ?Contatti $contatti = null;

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
     * @translation-german Stammdaten
     *
     * @return null|DatiAnagraficiCedente
     */
    public function getDatiAnagrafici(): ?DatiAnagraficiCedente
    {
        return $this->datiAnagrafici;
    }

    /**
     * @translation-german Stammdaten
     *
     * @return DatiAnagraficiCedente
     */
    public function getDatiAnagraficiWithCreate(): DatiAnagraficiCedente
    {
        $this->datiAnagrafici ??= new DatiAnagraficiCedente();

        return $this->datiAnagrafici;
    }

    /**
     * @translation-german Stammdaten
     *
     * @param  null|DatiAnagraficiCedente $datiAnagrafici
     * @return static
     */
    public function setDatiAnagrafici(
        ?DatiAnagraficiCedente $datiAnagrafici = null
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
     * @translation-german-untranslated
     *
     * @return null|IscrizioneREA
     */
    public function getIscrizioneREA(): ?IscrizioneREA
    {
        return $this->iscrizioneREA;
    }

    /**
     * @translation-german-untranslated
     *
     * @return IscrizioneREA
     */
    public function getIscrizioneREAWithCreate(): IscrizioneREA
    {
        $this->iscrizioneREA ??= new IscrizioneREA();

        return $this->iscrizioneREA;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|IscrizioneREA $iscrizioneREA
     * @return static
     */
    public function setIscrizioneREA(
        ?IscrizioneREA $iscrizioneREA = null
    ): static {
        $this->iscrizioneREA = $iscrizioneREA;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetIscrizioneREA(): static
    {
        $this->iscrizioneREA = null;

        return $this;
    }

    /**
     * @translation-german Kontakte
     *
     * @return null|Contatti
     */
    public function getContatti(): ?Contatti
    {
        return $this->contatti;
    }

    /**
     * @translation-german Kontakte
     *
     * @return Contatti
     */
    public function getContattiWithCreate(): Contatti
    {
        $this->contatti ??= new Contatti();

        return $this->contatti;
    }

    /**
     * @translation-german Kontakte
     *
     * @param  null|Contatti $contatti
     * @return static
     */
    public function setContatti(
        ?Contatti $contatti = null
    ): static {
        $this->contatti = $contatti;

        return $this;
    }

    /**
     * @translation-german Kontakte
     *
     * @return static
     */
    public function unsetContatti(): static
    {
        $this->contatti = null;

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
}
