<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class Allegati
{
    use HandlesObjectFlags;

    /**
     * @translation-german Name Attachment
     */
    #[JMS\Accessor(getter: 'getNomeAttachment', setter: 'setNomeAttachment')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('NomeAttachment')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $nomeAttachment = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getAlgoritmoCompressione', setter: 'setAlgoritmoCompressione')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('AlgoritmoCompressione')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $algoritmoCompressione = null;

    /**
     * @translation-german Format Attachment
     */
    #[JMS\Accessor(getter: 'getFormatoAttachment', setter: 'setFormatoAttachment')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('FormatoAttachment')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $formatoAttachment = null;

    /**
     * @translation-german Beschreibung Attachment
     */
    #[JMS\Accessor(getter: 'getDescrizioneAttachment', setter: 'setDescrizioneAttachment')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DescrizioneAttachment')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $descrizioneAttachment = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getAttachment', setter: 'setAttachment')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Attachment')]
    #[JMS\Type('mixed')]
    #[JMS\XmlElement(cdata: false)]
    private mixed $attachment;

    /**
     * @translation-german Name Attachment
     *
     * @return null|string
     */
    public function getNomeAttachment(): ?string
    {
        return $this->nomeAttachment;
    }

    /**
     * @translation-german Name Attachment
     *
     * @param  null|string $nomeAttachment
     * @return static
     */
    public function setNomeAttachment(
        ?string $nomeAttachment = null
    ): static {
        $this->nomeAttachment = InvoiceSuiteStringUtils::asNullWhenEmpty($nomeAttachment);

        return $this;
    }

    /**
     * @translation-german Name Attachment
     *
     * @return static
     */
    public function unsetNomeAttachment(): static
    {
        $this->nomeAttachment = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getAlgoritmoCompressione(): ?string
    {
        return $this->algoritmoCompressione;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $algoritmoCompressione
     * @return static
     */
    public function setAlgoritmoCompressione(
        ?string $algoritmoCompressione = null
    ): static {
        $this->algoritmoCompressione = InvoiceSuiteStringUtils::asNullWhenEmpty($algoritmoCompressione);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetAlgoritmoCompressione(): static
    {
        $this->algoritmoCompressione = null;

        return $this;
    }

    /**
     * @translation-german Format Attachment
     *
     * @return null|string
     */
    public function getFormatoAttachment(): ?string
    {
        return $this->formatoAttachment;
    }

    /**
     * @translation-german Format Attachment
     *
     * @param  null|string $formatoAttachment
     * @return static
     */
    public function setFormatoAttachment(
        ?string $formatoAttachment = null
    ): static {
        $this->formatoAttachment = InvoiceSuiteStringUtils::asNullWhenEmpty($formatoAttachment);

        return $this;
    }

    /**
     * @translation-german Format Attachment
     *
     * @return static
     */
    public function unsetFormatoAttachment(): static
    {
        $this->formatoAttachment = null;

        return $this;
    }

    /**
     * @translation-german Beschreibung Attachment
     *
     * @return null|string
     */
    public function getDescrizioneAttachment(): ?string
    {
        return $this->descrizioneAttachment;
    }

    /**
     * @translation-german Beschreibung Attachment
     *
     * @param  null|string $descrizioneAttachment
     * @return static
     */
    public function setDescrizioneAttachment(
        ?string $descrizioneAttachment = null
    ): static {
        $this->descrizioneAttachment = InvoiceSuiteStringUtils::asNullWhenEmpty($descrizioneAttachment);

        return $this;
    }

    /**
     * @translation-german Beschreibung Attachment
     *
     * @return static
     */
    public function unsetDescrizioneAttachment(): static
    {
        $this->descrizioneAttachment = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|mixed
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|mixed $attachment
     * @return static
     */
    public function setAttachment(
        $attachment = null
    ): static {
        $this->attachment = $attachment;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetAttachment(): static
    {
        $this->attachment = null;

        return $this;
    }
}
