<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @translation-german-untranslated
 */
class DSAKeyValueType
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getP', setter: 'setP')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('P')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $p = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getQ', setter: 'setQ')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Q')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $q = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getG', setter: 'setG')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('G')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $g = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getY', setter: 'setY')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Y')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $y = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getJ', setter: 'setJ')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('J')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $j = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getSeed', setter: 'setSeed')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Seed')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $seed = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getPgenCounter', setter: 'setPgenCounter')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('PgenCounter')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $pgenCounter = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getP(): ?string
    {
        return $this->p;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $p
     * @return static
     */
    public function setP(
        ?string $p = null
    ): static {
        $this->p = $p;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetP(): static
    {
        $this->p = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getQ(): ?string
    {
        return $this->q;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $q
     * @return static
     */
    public function setQ(
        ?string $q = null
    ): static {
        $this->q = $q;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetQ(): static
    {
        $this->q = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getG(): ?string
    {
        return $this->g;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $g
     * @return static
     */
    public function setG(
        ?string $g = null
    ): static {
        $this->g = $g;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetG(): static
    {
        $this->g = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getY(): ?string
    {
        return $this->y;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $y
     * @return static
     */
    public function setY(
        ?string $y = null
    ): static {
        $this->y = $y;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetY(): static
    {
        $this->y = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getJ(): ?string
    {
        return $this->j;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $j
     * @return static
     */
    public function setJ(
        ?string $j = null
    ): static {
        $this->j = $j;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetJ(): static
    {
        $this->j = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getSeed(): ?string
    {
        return $this->seed;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $seed
     * @return static
     */
    public function setSeed(
        ?string $seed = null
    ): static {
        $this->seed = $seed;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetSeed(): static
    {
        $this->seed = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getPgenCounter(): ?string
    {
        return $this->pgenCounter;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $pgenCounter
     * @return static
     */
    public function setPgenCounter(
        ?string $pgenCounter = null
    ): static {
        $this->pgenCounter = $pgenCounter;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetPgenCounter(): static
    {
        $this->pgenCounter = null;

        return $this;
    }
}
