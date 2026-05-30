<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\FormatoTrasmissione;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class DatiTrasmissione
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getIdTrasmittente', setter: 'setIdTrasmittente')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('IdTrasmittente')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\IdFiscale')]
    #[JMS\XmlElement(cdata: false)]
    private ?IdFiscale $idTrasmittente = null;

    /**
     * @translation-german fortlaufend Invio
     */
    #[JMS\Accessor(getter: 'getProgressivoInvio', setter: 'setProgressivoInvio')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('ProgressivoInvio')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $progressivoInvio = null;

    /**
     * @translation-german Format Übertragung
     */
    #[JMS\Accessor(getter: 'getFormatoTrasmissione', setter: 'setFormatoTrasmissione')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('FormatoTrasmissione')]
    #[JMS\Type('enum<\'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\FormatoTrasmissione\',\'value\'>')]
    #[JMS\XmlElement(cdata: false)]
    private ?FormatoTrasmissione $formatoTrasmissione = null;

    /**
     * @translation-german Code Empfänger
     */
    #[JMS\Accessor(getter: 'getCodiceDestinatario', setter: 'setCodiceDestinatario')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('CodiceDestinatario')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $codiceDestinatario = null;

    /**
     * @translation-german Kontakte Trasmittente
     */
    #[JMS\Accessor(getter: 'getContattiTrasmittente', setter: 'setContattiTrasmittente')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('ContattiTrasmittente')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\ContattiTrasmittente')]
    #[JMS\XmlElement(cdata: false)]
    private ?ContattiTrasmittente $contattiTrasmittente = null;

    /**
     * @translation-german PEC Empfänger
     */
    #[JMS\Accessor(getter: 'getPECDestinatario', setter: 'setPECDestinatario')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('PECDestinatario')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $pECDestinatario = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|IdFiscale
     */
    public function getIdTrasmittente(): ?IdFiscale
    {
        return $this->idTrasmittente;
    }

    /**
     * @translation-german-untranslated
     *
     * @return IdFiscale
     */
    public function getIdTrasmittenteWithCreate(): IdFiscale
    {
        $this->idTrasmittente ??= new IdFiscale();

        return $this->idTrasmittente;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|IdFiscale $idTrasmittente
     * @return static
     */
    public function setIdTrasmittente(
        ?IdFiscale $idTrasmittente = null
    ): static {
        $this->idTrasmittente = $idTrasmittente;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetIdTrasmittente(): static
    {
        $this->idTrasmittente = null;

        return $this;
    }

    /**
     * @translation-german fortlaufend Invio
     *
     * @return null|string
     */
    public function getProgressivoInvio(): ?string
    {
        return $this->progressivoInvio;
    }

    /**
     * @translation-german fortlaufend Invio
     *
     * @param  null|string $progressivoInvio
     * @return static
     */
    public function setProgressivoInvio(
        ?string $progressivoInvio = null
    ): static {
        $this->progressivoInvio = InvoiceSuiteStringUtils::asNullWhenEmpty($progressivoInvio);

        return $this;
    }

    /**
     * @translation-german fortlaufend Invio
     *
     * @return static
     */
    public function unsetProgressivoInvio(): static
    {
        $this->progressivoInvio = null;

        return $this;
    }

    /**
     * @translation-german Format Übertragung
     *
     * @return null|FormatoTrasmissione
     */
    public function getFormatoTrasmissione(): ?FormatoTrasmissione
    {
        return $this->formatoTrasmissione;
    }

    /**
     * @translation-german Format Übertragung
     *
     * @param  null|FormatoTrasmissione $formatoTrasmissione
     * @return static
     */
    public function setFormatoTrasmissione(
        ?FormatoTrasmissione $formatoTrasmissione = null
    ): static {
        $this->formatoTrasmissione = $formatoTrasmissione;

        return $this;
    }

    /**
     * @translation-german Format Übertragung
     *
     * @return static
     */
    public function unsetFormatoTrasmissione(): static
    {
        $this->formatoTrasmissione = null;

        return $this;
    }

    /**
     * @translation-german Code Empfänger
     *
     * @return null|string
     */
    public function getCodiceDestinatario(): ?string
    {
        return $this->codiceDestinatario;
    }

    /**
     * @translation-german Code Empfänger
     *
     * @param  null|string $codiceDestinatario
     * @return static
     */
    public function setCodiceDestinatario(
        ?string $codiceDestinatario = null
    ): static {
        $this->codiceDestinatario = InvoiceSuiteStringUtils::asNullWhenEmpty($codiceDestinatario);

        return $this;
    }

    /**
     * @translation-german Code Empfänger
     *
     * @return static
     */
    public function unsetCodiceDestinatario(): static
    {
        $this->codiceDestinatario = null;

        return $this;
    }

    /**
     * @translation-german Kontakte Trasmittente
     *
     * @return null|ContattiTrasmittente
     */
    public function getContattiTrasmittente(): ?ContattiTrasmittente
    {
        return $this->contattiTrasmittente;
    }

    /**
     * @translation-german Kontakte Trasmittente
     *
     * @return ContattiTrasmittente
     */
    public function getContattiTrasmittenteWithCreate(): ContattiTrasmittente
    {
        $this->contattiTrasmittente ??= new ContattiTrasmittente();

        return $this->contattiTrasmittente;
    }

    /**
     * @translation-german Kontakte Trasmittente
     *
     * @param  null|ContattiTrasmittente $contattiTrasmittente
     * @return static
     */
    public function setContattiTrasmittente(
        ?ContattiTrasmittente $contattiTrasmittente = null
    ): static {
        $this->contattiTrasmittente = $contattiTrasmittente;

        return $this;
    }

    /**
     * @translation-german Kontakte Trasmittente
     *
     * @return static
     */
    public function unsetContattiTrasmittente(): static
    {
        $this->contattiTrasmittente = null;

        return $this;
    }

    /**
     * @translation-german PEC Empfänger
     *
     * @return null|string
     */
    public function getPECDestinatario(): ?string
    {
        return $this->pECDestinatario;
    }

    /**
     * @translation-german PEC Empfänger
     *
     * @param  null|string $pECDestinatario
     * @return static
     */
    public function setPECDestinatario(
        ?string $pECDestinatario = null
    ): static {
        $this->pECDestinatario = InvoiceSuiteStringUtils::asNullWhenEmpty($pECDestinatario);

        return $this;
    }

    /**
     * @translation-german PEC Empfänger
     *
     * @return static
     */
    public function unsetPECDestinatario(): static
    {
        $this->pECDestinatario = null;

        return $this;
    }
}
