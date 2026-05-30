<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @translation-german-untranslated
 */
class ObjectType
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getId', setter: 'setId')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Id')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private ?string $id = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getMimeType', setter: 'setMimeType')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('MimeType')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private ?string $mimeType = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getEncoding', setter: 'setEncoding')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Encoding')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private ?string $encoding = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $id
     * @return static
     */
    public function setId(
        ?string $id = null
    ): static {
        $this->id = $id;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetId(): static
    {
        $this->id = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $mimeType
     * @return static
     */
    public function setMimeType(
        ?string $mimeType = null
    ): static {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetMimeType(): static
    {
        $this->mimeType = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getEncoding(): ?string
    {
        return $this->encoding;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $encoding
     * @return static
     */
    public function setEncoding(
        ?string $encoding = null
    ): static {
        $this->encoding = $encoding;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetEncoding(): static
    {
        $this->encoding = null;

        return $this;
    }
}
