<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @translation-german-untranslated
 */
class TransformsType
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @var null|array<TransformType>
     */
    #[JMS\Accessor(getter: 'getTransform', setter: 'setTransform')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Transform')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\TransformType>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Transform')]
    private ?array $transform = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|array<TransformType>
     */
    public function getTransform(): ?array
    {
        return $this->transform;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  array<TransformType> $transform
     * @return static
     */
    public function setTransform(
        ?array $transform = null
    ): static {
        $this->transform = $transform;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetTransform(): static
    {
        $this->transform = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function clearTransform(): static
    {
        $this->transform = [];

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  TransformType $transform
     * @return static
     */
    public function addToTransform(
        TransformType $transform
    ): static {
        $this->transform[] = $transform;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return TransformType
     */
    public function addToTransformWithCreate(): TransformType
    {
        $this->addToTransform($transform = new TransformType());

        return $transform;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  TransformType $transform
     * @return static
     */
    public function addOnceToTransform(
        TransformType $transform
    ): static {
        if (!is_array($this->transform)) {
            $this->transform = [];
        }

        $this->transform[0] = $transform;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return TransformType
     */
    public function addOnceToTransformWithCreate(): TransformType
    {
        if (!is_array($this->transform)) {
            $this->transform = [];
        }

        if ([] === $this->transform) {
            $this->addOnceToTransform(new TransformType());
        }

        return $this->transform[0];
    }
}
