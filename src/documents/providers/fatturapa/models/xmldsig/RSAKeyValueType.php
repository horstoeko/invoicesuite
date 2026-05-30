<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @translation-german-untranslated
 */
class RSAKeyValueType
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getModulus', setter: 'setModulus')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Modulus')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $modulus = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getExponent', setter: 'setExponent')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Exponent')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $exponent = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getModulus(): ?string
    {
        return $this->modulus;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $modulus
     * @return static
     */
    public function setModulus(
        ?string $modulus = null
    ): static {
        $this->modulus = $modulus;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetModulus(): static
    {
        $this->modulus = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getExponent(): ?string
    {
        return $this->exponent;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $exponent
     * @return static
     */
    public function setExponent(
        ?string $exponent = null
    ): static {
        $this->exponent = $exponent;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetExponent(): static
    {
        $this->exponent = null;

        return $this;
    }
}
