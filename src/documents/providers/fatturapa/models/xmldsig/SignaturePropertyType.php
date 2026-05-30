<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @translation-german-untranslated
 */
class SignaturePropertyType
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getTarget', setter: 'setTarget')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Target')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private ?string $target = null;

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
     * @return null|string
     */
    public function getTarget(): ?string
    {
        return $this->target;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $target
     * @return static
     */
    public function setTarget(
        ?string $target = null
    ): static {
        $this->target = $target;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetTarget(): static
    {
        $this->target = null;

        return $this;
    }

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
}
