<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @translation-german-untranslated
 */
class X509DataType
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @var null|X509IssuerSerialType
     */
    #[JMS\Accessor(getter: 'getX509IssuerSerial', setter: 'setX509IssuerSerial')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('X509IssuerSerial')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\X509IssuerSerialType')]
    #[JMS\XmlElement(cdata: false)]
    private ?X509IssuerSerialType $x509IssuerSerial = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getX509SKI', setter: 'setX509SKI')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('X509SKI')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $x509SKI = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getX509SubjectName', setter: 'setX509SubjectName')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('X509SubjectName')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $x509SubjectName = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getX509Certificate', setter: 'setX509Certificate')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('X509Certificate')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $x509Certificate = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getX509CRL', setter: 'setX509CRL')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('X509CRL')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $x509CRL = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|X509IssuerSerialType
     */
    public function getX509IssuerSerial(): ?X509IssuerSerialType
    {
        return $this->x509IssuerSerial;
    }

    /**
     * @translation-german-untranslated
     *
     * @return X509IssuerSerialType
     */
    public function getX509IssuerSerialWithCreate(): X509IssuerSerialType
    {
        $this->x509IssuerSerial ??= new X509IssuerSerialType();

        return $this->x509IssuerSerial;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  X509IssuerSerialType $x509IssuerSerial
     * @return static
     */
    public function setX509IssuerSerial(
        ?X509IssuerSerialType $x509IssuerSerial = null
    ): static {
        $this->x509IssuerSerial = $x509IssuerSerial;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetX509IssuerSerial(): static
    {
        $this->x509IssuerSerial = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getX509SKI(): ?string
    {
        return $this->x509SKI;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $x509SKI
     * @return static
     */
    public function setX509SKI(
        ?string $x509SKI = null
    ): static {
        $this->x509SKI = $x509SKI;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetX509SKI(): static
    {
        $this->x509SKI = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getX509SubjectName(): ?string
    {
        return $this->x509SubjectName;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $x509SubjectName
     * @return static
     */
    public function setX509SubjectName(
        ?string $x509SubjectName = null
    ): static {
        $this->x509SubjectName = $x509SubjectName;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetX509SubjectName(): static
    {
        $this->x509SubjectName = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getX509Certificate(): ?string
    {
        return $this->x509Certificate;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $x509Certificate
     * @return static
     */
    public function setX509Certificate(
        ?string $x509Certificate = null
    ): static {
        $this->x509Certificate = $x509Certificate;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetX509Certificate(): static
    {
        $this->x509Certificate = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getX509CRL(): ?string
    {
        return $this->x509CRL;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $x509CRL
     * @return static
     */
    public function setX509CRL(
        ?string $x509CRL = null
    ): static {
        $this->x509CRL = $x509CRL;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetX509CRL(): static
    {
        $this->x509CRL = null;

        return $this;
    }
}
