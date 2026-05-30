<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @translation-german-untranslated
 */
class X509IssuerSerialType
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getX509IssuerName', setter: 'setX509IssuerName')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('X509IssuerName')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $x509IssuerName = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|int
     */
    #[JMS\Accessor(getter: 'getX509SerialNumber', setter: 'setX509SerialNumber')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('X509SerialNumber')]
    #[JMS\Type('int')]
    #[JMS\XmlElement(cdata: false)]
    private ?int $x509SerialNumber = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getX509IssuerName(): ?string
    {
        return $this->x509IssuerName;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $x509IssuerName
     * @return static
     */
    public function setX509IssuerName(
        ?string $x509IssuerName = null
    ): static {
        $this->x509IssuerName = $x509IssuerName;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetX509IssuerName(): static
    {
        $this->x509IssuerName = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|int
     */
    public function getX509SerialNumber(): ?int
    {
        return $this->x509SerialNumber;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  int    $x509SerialNumber
     * @return static
     */
    public function setX509SerialNumber(
        ?int $x509SerialNumber = null
    ): static {
        $this->x509SerialNumber = $x509SerialNumber;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetX509SerialNumber(): static
    {
        $this->x509SerialNumber = null;

        return $this;
    }
}
