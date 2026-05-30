<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @translation-german-untranslated
 */
class RetrievalMethodType
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @var null|TransformsType
     */
    #[JMS\Accessor(getter: 'getTransforms', setter: 'setTransforms')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Transforms')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\TransformsType')]
    #[JMS\XmlElement(cdata: false)]
    private ?TransformsType $transforms = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getURI', setter: 'setURI')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('URI')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private ?string $uRI = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getType', setter: 'setType')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Type')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private ?string $type = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|TransformsType
     */
    public function getTransforms(): ?TransformsType
    {
        return $this->transforms;
    }

    /**
     * @translation-german-untranslated
     *
     * @return TransformsType
     */
    public function getTransformsWithCreate(): TransformsType
    {
        $this->transforms ??= new TransformsType();

        return $this->transforms;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  TransformsType $transforms
     * @return static
     */
    public function setTransforms(
        ?TransformsType $transforms = null
    ): static {
        $this->transforms = $transforms;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetTransforms(): static
    {
        $this->transforms = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getURI(): ?string
    {
        return $this->uRI;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $uRI
     * @return static
     */
    public function setURI(
        ?string $uRI = null
    ): static {
        $this->uRI = $uRI;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetURI(): static
    {
        $this->uRI = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $type
     * @return static
     */
    public function setType(
        ?string $type = null
    ): static {
        $this->type = $type;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetType(): static
    {
        $this->type = null;

        return $this;
    }
}
