<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @translation-german-untranslated
 */
class SignedInfoType
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @var null|CanonicalizationMethodType
     */
    #[JMS\Accessor(getter: 'getCanonicalizationMethod', setter: 'setCanonicalizationMethod')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('CanonicalizationMethod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\CanonicalizationMethodType')]
    #[JMS\XmlElement(cdata: false)]
    private ?CanonicalizationMethodType $canonicalizationMethod = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|SignatureMethodType
     */
    #[JMS\Accessor(getter: 'getSignatureMethod', setter: 'setSignatureMethod')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('SignatureMethod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\SignatureMethodType')]
    #[JMS\XmlElement(cdata: false)]
    private ?SignatureMethodType $signatureMethod = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|array<ReferenceType>
     */
    #[JMS\Accessor(getter: 'getReference', setter: 'setReference')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Reference')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\ReferenceType>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Reference')]
    private ?array $reference = null;

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
     * @return null|CanonicalizationMethodType
     */
    public function getCanonicalizationMethod(): ?CanonicalizationMethodType
    {
        return $this->canonicalizationMethod;
    }

    /**
     * @translation-german-untranslated
     *
     * @return CanonicalizationMethodType
     */
    public function getCanonicalizationMethodWithCreate(): CanonicalizationMethodType
    {
        $this->canonicalizationMethod ??= new CanonicalizationMethodType();

        return $this->canonicalizationMethod;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  CanonicalizationMethodType $canonicalizationMethod
     * @return static
     */
    public function setCanonicalizationMethod(
        ?CanonicalizationMethodType $canonicalizationMethod = null
    ): static {
        $this->canonicalizationMethod = $canonicalizationMethod;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetCanonicalizationMethod(): static
    {
        $this->canonicalizationMethod = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|SignatureMethodType
     */
    public function getSignatureMethod(): ?SignatureMethodType
    {
        return $this->signatureMethod;
    }

    /**
     * @translation-german-untranslated
     *
     * @return SignatureMethodType
     */
    public function getSignatureMethodWithCreate(): SignatureMethodType
    {
        $this->signatureMethod ??= new SignatureMethodType();

        return $this->signatureMethod;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  SignatureMethodType $signatureMethod
     * @return static
     */
    public function setSignatureMethod(
        ?SignatureMethodType $signatureMethod = null
    ): static {
        $this->signatureMethod = $signatureMethod;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetSignatureMethod(): static
    {
        $this->signatureMethod = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|array<ReferenceType>
     */
    public function getReference(): ?array
    {
        return $this->reference;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  array<ReferenceType> $reference
     * @return static
     */
    public function setReference(
        ?array $reference = null
    ): static {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetReference(): static
    {
        $this->reference = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function clearReference(): static
    {
        $this->reference = [];

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  ReferenceType $reference
     * @return static
     */
    public function addToReference(
        ReferenceType $reference
    ): static {
        $this->reference[] = $reference;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return ReferenceType
     */
    public function addToReferenceWithCreate(): ReferenceType
    {
        $this->addToReference($reference = new ReferenceType());

        return $reference;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  ReferenceType $reference
     * @return static
     */
    public function addOnceToReference(
        ReferenceType $reference
    ): static {
        if (!is_array($this->reference)) {
            $this->reference = [];
        }

        $this->reference[0] = $reference;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return ReferenceType
     */
    public function addOnceToReferenceWithCreate(): ReferenceType
    {
        if (!is_array($this->reference)) {
            $this->reference = [];
        }

        if ([] === $this->reference) {
            $this->addOnceToReference(new ReferenceType());
        }

        return $this->reference[0];
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
