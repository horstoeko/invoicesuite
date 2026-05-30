<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @translation-german-untranslated
 */
class TransformType
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getXPath', setter: 'setXPath')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('XPath')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $xPath = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getAlgorithm', setter: 'setAlgorithm')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Algorithm')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private ?string $algorithm = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getXPath(): ?string
    {
        return $this->xPath;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $xPath
     * @return static
     */
    public function setXPath(
        ?string $xPath = null
    ): static {
        $this->xPath = $xPath;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetXPath(): static
    {
        $this->xPath = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getAlgorithm(): ?string
    {
        return $this->algorithm;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $algorithm
     * @return static
     */
    public function setAlgorithm(
        ?string $algorithm = null
    ): static {
        $this->algorithm = $algorithm;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetAlgorithm(): static
    {
        $this->algorithm = null;

        return $this;
    }
}
