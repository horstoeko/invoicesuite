<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @translation-german-untranslated
 */
class PGPDataType
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getPGPKeyID', setter: 'setPGPKeyID')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('PGPKeyID')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $pGPKeyID = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getPGPKeyPacket', setter: 'setPGPKeyPacket')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('PGPKeyPacket')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $pGPKeyPacket = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getPGPKeyID(): ?string
    {
        return $this->pGPKeyID;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $pGPKeyID
     * @return static
     */
    public function setPGPKeyID(
        ?string $pGPKeyID = null
    ): static {
        $this->pGPKeyID = $pGPKeyID;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetPGPKeyID(): static
    {
        $this->pGPKeyID = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getPGPKeyPacket(): ?string
    {
        return $this->pGPKeyPacket;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $pGPKeyPacket
     * @return static
     */
    public function setPGPKeyPacket(
        ?string $pGPKeyPacket = null
    ): static {
        $this->pGPKeyPacket = $pGPKeyPacket;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetPGPKeyPacket(): static
    {
        $this->pGPKeyPacket = null;

        return $this;
    }
}
