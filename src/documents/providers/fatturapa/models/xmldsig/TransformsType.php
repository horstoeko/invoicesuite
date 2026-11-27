<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
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
    #[JMS\XmlList(entry: 'Transform', inline: true)]
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
        if (!InvoiceSuiteArrayUtils::is($this->transform)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->transform)) {
            $this->transform = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->transform)) {
            $this->addOnceToTransform(new TransformType());
        }

        return $this->transform[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(TransformType): mixed $callback
     * @return static
     */
    public function forEachTransform(
        callable $callback
    ): static {
        foreach ($this->transform ?? [] as $transform) {
            $callback($transform);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(TransformType): mixed  $callback
     * @return array<array-key, TransformType>
     */
    public function filterTransforms(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->transform ?? [], $callback);
    }
}
