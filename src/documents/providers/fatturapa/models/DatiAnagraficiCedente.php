<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\RegimeFiscale;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class DatiAnagraficiCedente
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getIdFiscaleIVA', setter: 'setIdFiscaleIVA')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('IdFiscaleIVA')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\IdFiscale')]
    #[JMS\XmlElement(cdata: false)]
    private ?IdFiscale $idFiscaleIVA = null;

    /**
     * @translation-german Code Fiscale
     */
    #[JMS\Accessor(getter: 'getCodiceFiscale', setter: 'setCodiceFiscale')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('CodiceFiscale')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $codiceFiscale = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getAnagrafica', setter: 'setAnagrafica')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Anagrafica')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\Anagrafica')]
    #[JMS\XmlElement(cdata: false)]
    private ?Anagrafica $anagrafica = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getAlboProfessionale', setter: 'setAlboProfessionale')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('AlboProfessionale')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $alboProfessionale = null;

    /**
     * @translation-german Provinz Albo
     */
    #[JMS\Accessor(getter: 'getProvinciaAlbo', setter: 'setProvinciaAlbo')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('ProvinciaAlbo')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $provinciaAlbo = null;

    /**
     * @translation-german Nummer Iscrizione Albo
     */
    #[JMS\Accessor(getter: 'getNumeroIscrizioneAlbo', setter: 'setNumeroIscrizioneAlbo')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('NumeroIscrizioneAlbo')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $numeroIscrizioneAlbo = null;

    /**
     * @translation-german Datum Iscrizione Albo
     */
    #[JMS\Accessor(getter: 'getDataIscrizioneAlbo', setter: 'setDataIscrizioneAlbo')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DataIscrizioneAlbo')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(cdata: false)]
    private ?DateTimeInterface $dataIscrizioneAlbo = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getRegimeFiscale', setter: 'setRegimeFiscale')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('RegimeFiscale')]
    #[JMS\Type('enum<\'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\RegimeFiscale\',\'value\'>')]
    #[JMS\XmlElement(cdata: false)]
    private ?RegimeFiscale $regimeFiscale = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|IdFiscale
     */
    public function getIdFiscaleIVA(): ?IdFiscale
    {
        return $this->idFiscaleIVA;
    }

    /**
     * @translation-german-untranslated
     *
     * @return IdFiscale
     */
    public function getIdFiscaleIVAWithCreate(): IdFiscale
    {
        $this->idFiscaleIVA ??= new IdFiscale();

        return $this->idFiscaleIVA;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|IdFiscale $idFiscaleIVA
     * @return static
     */
    public function setIdFiscaleIVA(
        ?IdFiscale $idFiscaleIVA = null
    ): static {
        $this->idFiscaleIVA = $idFiscaleIVA;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetIdFiscaleIVA(): static
    {
        $this->idFiscaleIVA = null;

        return $this;
    }

    /**
     * @translation-german Code Fiscale
     *
     * @return null|string
     */
    public function getCodiceFiscale(): ?string
    {
        return $this->codiceFiscale;
    }

    /**
     * @translation-german Code Fiscale
     *
     * @param  null|string $codiceFiscale
     * @return static
     */
    public function setCodiceFiscale(
        ?string $codiceFiscale = null
    ): static {
        $this->codiceFiscale = InvoiceSuiteStringUtils::asNullWhenEmpty($codiceFiscale);

        return $this;
    }

    /**
     * @translation-german Code Fiscale
     *
     * @return static
     */
    public function unsetCodiceFiscale(): static
    {
        $this->codiceFiscale = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|Anagrafica
     */
    public function getAnagrafica(): ?Anagrafica
    {
        return $this->anagrafica;
    }

    /**
     * @translation-german-untranslated
     *
     * @return Anagrafica
     */
    public function getAnagraficaWithCreate(): Anagrafica
    {
        $this->anagrafica ??= new Anagrafica();

        return $this->anagrafica;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|Anagrafica $anagrafica
     * @return static
     */
    public function setAnagrafica(
        ?Anagrafica $anagrafica = null
    ): static {
        $this->anagrafica = $anagrafica;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetAnagrafica(): static
    {
        $this->anagrafica = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getAlboProfessionale(): ?string
    {
        return $this->alboProfessionale;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $alboProfessionale
     * @return static
     */
    public function setAlboProfessionale(
        ?string $alboProfessionale = null
    ): static {
        $this->alboProfessionale = InvoiceSuiteStringUtils::asNullWhenEmpty($alboProfessionale);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetAlboProfessionale(): static
    {
        $this->alboProfessionale = null;

        return $this;
    }

    /**
     * @translation-german Provinz Albo
     *
     * @return null|string
     */
    public function getProvinciaAlbo(): ?string
    {
        return $this->provinciaAlbo;
    }

    /**
     * @translation-german Provinz Albo
     *
     * @param  null|string $provinciaAlbo
     * @return static
     */
    public function setProvinciaAlbo(
        ?string $provinciaAlbo = null
    ): static {
        $this->provinciaAlbo = InvoiceSuiteStringUtils::asNullWhenEmpty($provinciaAlbo);

        return $this;
    }

    /**
     * @translation-german Provinz Albo
     *
     * @return static
     */
    public function unsetProvinciaAlbo(): static
    {
        $this->provinciaAlbo = null;

        return $this;
    }

    /**
     * @translation-german Nummer Iscrizione Albo
     *
     * @return null|string
     */
    public function getNumeroIscrizioneAlbo(): ?string
    {
        return $this->numeroIscrizioneAlbo;
    }

    /**
     * @translation-german Nummer Iscrizione Albo
     *
     * @param  null|string $numeroIscrizioneAlbo
     * @return static
     */
    public function setNumeroIscrizioneAlbo(
        ?string $numeroIscrizioneAlbo = null
    ): static {
        $this->numeroIscrizioneAlbo = InvoiceSuiteStringUtils::asNullWhenEmpty($numeroIscrizioneAlbo);

        return $this;
    }

    /**
     * @translation-german Nummer Iscrizione Albo
     *
     * @return static
     */
    public function unsetNumeroIscrizioneAlbo(): static
    {
        $this->numeroIscrizioneAlbo = null;

        return $this;
    }

    /**
     * @translation-german Datum Iscrizione Albo
     *
     * @return null|DateTimeInterface
     */
    public function getDataIscrizioneAlbo(): ?DateTimeInterface
    {
        return $this->dataIscrizioneAlbo;
    }

    /**
     * @translation-german Datum Iscrizione Albo
     *
     * @param  null|DateTimeInterface $dataIscrizioneAlbo
     * @return static
     */
    public function setDataIscrizioneAlbo(
        ?DateTimeInterface $dataIscrizioneAlbo = null
    ): static {
        $this->dataIscrizioneAlbo = $dataIscrizioneAlbo;

        return $this;
    }

    /**
     * @translation-german Datum Iscrizione Albo
     *
     * @return static
     */
    public function unsetDataIscrizioneAlbo(): static
    {
        $this->dataIscrizioneAlbo = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|RegimeFiscale
     */
    public function getRegimeFiscale(): ?RegimeFiscale
    {
        return $this->regimeFiscale;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|RegimeFiscale $regimeFiscale
     * @return static
     */
    public function setRegimeFiscale(
        ?RegimeFiscale $regimeFiscale = null
    ): static {
        $this->regimeFiscale = $regimeFiscale;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetRegimeFiscale(): static
    {
        $this->regimeFiscale = null;

        return $this;
    }
}
