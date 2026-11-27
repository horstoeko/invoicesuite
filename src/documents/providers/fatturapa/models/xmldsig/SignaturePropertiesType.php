<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

/**
 * @translation-german-untranslated
 */
class SignaturePropertiesType
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @var null|array<SignaturePropertyType>
     */
    #[JMS\Accessor(getter: 'getSignatureProperty', setter: 'setSignatureProperty')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('SignatureProperty')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\SignaturePropertyType>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(entry: 'SignatureProperty', inline: true)]
    private ?array $signatureProperty = null;

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
     * @return null|array<SignaturePropertyType>
     */
    public function getSignatureProperty(): ?array
    {
        return $this->signatureProperty;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  array<SignaturePropertyType> $signatureProperty
     * @return static
     */
    public function setSignatureProperty(
        ?array $signatureProperty = null
    ): static {
        $this->signatureProperty = $signatureProperty;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetSignatureProperty(): static
    {
        $this->signatureProperty = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function clearSignatureProperty(): static
    {
        $this->signatureProperty = [];

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  SignaturePropertyType $signatureProperty
     * @return static
     */
    public function addToSignatureProperty(
        SignaturePropertyType $signatureProperty
    ): static {
        $this->signatureProperty[] = $signatureProperty;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return SignaturePropertyType
     */
    public function addToSignaturePropertyWithCreate(): SignaturePropertyType
    {
        $this->addToSignatureProperty($signatureProperty = new SignaturePropertyType());

        return $signatureProperty;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  SignaturePropertyType $signatureProperty
     * @return static
     */
    public function addOnceToSignatureProperty(
        SignaturePropertyType $signatureProperty
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->signatureProperty)) {
            $this->signatureProperty = [];
        }

        $this->signatureProperty[0] = $signatureProperty;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return SignaturePropertyType
     */
    public function addOnceToSignaturePropertyWithCreate(): SignaturePropertyType
    {
        if (!InvoiceSuiteArrayUtils::is($this->signatureProperty)) {
            $this->signatureProperty = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->signatureProperty)) {
            $this->addOnceToSignatureProperty(new SignaturePropertyType());
        }

        return $this->signatureProperty[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(SignaturePropertyType): mixed $callback
     * @return static
     */
    public function forEachSignatureProperty(
        callable $callback
    ): static {
        foreach ($this->signatureProperty ?? [] as $signatureProperty) {
            $callback($signatureProperty);
        }

        return $this;
    }

    /**
     * Filter items using a callback
     *
     * @param  callable(SignaturePropertyType): mixed  $callback
     * @return array<array-key, SignaturePropertyType>
     */
    public function filterSignatureProperties(
        callable $callback
    ): array {
        return InvoiceSuiteArrayUtils::filter($this->signatureProperty ?? [], $callback);
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
