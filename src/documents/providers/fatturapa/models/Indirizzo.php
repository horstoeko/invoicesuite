<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class Indirizzo
{
    use HandlesObjectFlags;

    /**
     * @translation-german Adresse
     */
    #[JMS\Accessor(getter: 'getIndirizzo', setter: 'setIndirizzo')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Indirizzo')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $indirizzo = null;

    /**
     * @translation-german Nummer Hausnummer
     */
    #[JMS\Accessor(getter: 'getNumeroCivico', setter: 'setNumeroCivico')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('NumeroCivico')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $numeroCivico = null;

    /**
     * @translation-german PLZ
     */
    #[JMS\Accessor(getter: 'getCAP', setter: 'setCAP')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('CAP')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $cAP = null;

    /**
     * @translation-german Gemeinde
     */
    #[JMS\Accessor(getter: 'getComune', setter: 'setComune')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Comune')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $comune = null;

    /**
     * @translation-german Provinz
     */
    #[JMS\Accessor(getter: 'getProvincia', setter: 'setProvincia')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Provincia')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $provincia = null;

    /**
     * @translation-german Land
     */
    #[JMS\Accessor(getter: 'getNazione', setter: 'setNazione')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Nazione')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $nazione = null;

    /**
     * @translation-german Adresse
     *
     * @return null|string
     */
    public function getIndirizzo(): ?string
    {
        return $this->indirizzo;
    }

    /**
     * @translation-german Adresse
     *
     * @param  null|string $indirizzo
     * @return static
     */
    public function setIndirizzo(
        ?string $indirizzo = null
    ): static {
        $this->indirizzo = InvoiceSuiteStringUtils::asNullWhenEmpty($indirizzo);

        return $this;
    }

    /**
     * @translation-german Adresse
     *
     * @return static
     */
    public function unsetIndirizzo(): static
    {
        $this->indirizzo = null;

        return $this;
    }

    /**
     * @translation-german Nummer Hausnummer
     *
     * @return null|string
     */
    public function getNumeroCivico(): ?string
    {
        return $this->numeroCivico;
    }

    /**
     * @translation-german Nummer Hausnummer
     *
     * @param  null|string $numeroCivico
     * @return static
     */
    public function setNumeroCivico(
        ?string $numeroCivico = null
    ): static {
        $this->numeroCivico = InvoiceSuiteStringUtils::asNullWhenEmpty($numeroCivico);

        return $this;
    }

    /**
     * @translation-german Nummer Hausnummer
     *
     * @return static
     */
    public function unsetNumeroCivico(): static
    {
        $this->numeroCivico = null;

        return $this;
    }

    /**
     * @translation-german PLZ
     *
     * @return null|string
     */
    public function getCAP(): ?string
    {
        return $this->cAP;
    }

    /**
     * @translation-german PLZ
     *
     * @param  null|string $cAP
     * @return static
     */
    public function setCAP(
        ?string $cAP = null
    ): static {
        $this->cAP = InvoiceSuiteStringUtils::asNullWhenEmpty($cAP);

        return $this;
    }

    /**
     * @translation-german PLZ
     *
     * @return static
     */
    public function unsetCAP(): static
    {
        $this->cAP = null;

        return $this;
    }

    /**
     * @translation-german Gemeinde
     *
     * @return null|string
     */
    public function getComune(): ?string
    {
        return $this->comune;
    }

    /**
     * @translation-german Gemeinde
     *
     * @param  null|string $comune
     * @return static
     */
    public function setComune(
        ?string $comune = null
    ): static {
        $this->comune = InvoiceSuiteStringUtils::asNullWhenEmpty($comune);

        return $this;
    }

    /**
     * @translation-german Gemeinde
     *
     * @return static
     */
    public function unsetComune(): static
    {
        $this->comune = null;

        return $this;
    }

    /**
     * @translation-german Provinz
     *
     * @return null|string
     */
    public function getProvincia(): ?string
    {
        return $this->provincia;
    }

    /**
     * @translation-german Provinz
     *
     * @param  null|string $provincia
     * @return static
     */
    public function setProvincia(
        ?string $provincia = null
    ): static {
        $this->provincia = InvoiceSuiteStringUtils::asNullWhenEmpty($provincia);

        return $this;
    }

    /**
     * @translation-german Provinz
     *
     * @return static
     */
    public function unsetProvincia(): static
    {
        $this->provincia = null;

        return $this;
    }

    /**
     * @translation-german Land
     *
     * @return null|string
     */
    public function getNazione(): ?string
    {
        return $this->nazione;
    }

    /**
     * @translation-german Land
     *
     * @param  null|string $nazione
     * @return static
     */
    public function setNazione(
        ?string $nazione = null
    ): static {
        $this->nazione = InvoiceSuiteStringUtils::asNullWhenEmpty($nazione);

        return $this;
    }

    /**
     * @translation-german Land
     *
     * @return static
     */
    public function unsetNazione(): static
    {
        $this->nazione = null;

        return $this;
    }
}
