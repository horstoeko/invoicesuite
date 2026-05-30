<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @translation-german-untranslated
 */
class ReferenceType
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @var null|TransformsType
     */
    #[JMS\Accessor(getter: 'getTransforms', setter: 'setTransforms')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Transforms')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\TransformsType')]
    #[JMS\XmlElement(cdata: false)]
    private ?TransformsType $transforms = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|DigestMethodType
     */
    #[JMS\Accessor(getter: 'getDigestMethod', setter: 'setDigestMethod')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DigestMethod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\DigestMethodType')]
    #[JMS\XmlElement(cdata: false)]
    private ?DigestMethodType $digestMethod = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getDigestValue', setter: 'setDigestValue')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DigestValue')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $digestValue = null;

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
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getURI', setter: 'setURI')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('URI')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private ?string $uRI = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getType', setter: 'setType')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Type')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private ?string $type = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|TransformsType
     */
    public function getTransforms(): ?TransformsType
    {
        return $this->transforms;
    }

    /**
     * @translation-german-untranslated
     *
     * @return TransformsType
     */
    public function getTransformsWithCreate(): TransformsType
    {
        $this->transforms ??= new TransformsType();

        return $this->transforms;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  TransformsType $transforms
     * @return static
     */
    public function setTransforms(
        ?TransformsType $transforms = null
    ): static {
        $this->transforms = $transforms;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetTransforms(): static
    {
        $this->transforms = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|DigestMethodType
     */
    public function getDigestMethod(): ?DigestMethodType
    {
        return $this->digestMethod;
    }

    /**
     * @translation-german-untranslated
     *
     * @return DigestMethodType
     */
    public function getDigestMethodWithCreate(): DigestMethodType
    {
        $this->digestMethod ??= new DigestMethodType();

        return $this->digestMethod;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  DigestMethodType $digestMethod
     * @return static
     */
    public function setDigestMethod(
        ?DigestMethodType $digestMethod = null
    ): static {
        $this->digestMethod = $digestMethod;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetDigestMethod(): static
    {
        $this->digestMethod = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getDigestValue(): ?string
    {
        return $this->digestValue;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $digestValue
     * @return static
     */
    public function setDigestValue(
        ?string $digestValue = null
    ): static {
        $this->digestValue = $digestValue;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetDigestValue(): static
    {
        $this->digestValue = null;

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

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getURI(): ?string
    {
        return $this->uRI;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $uRI
     * @return static
     */
    public function setURI(
        ?string $uRI = null
    ): static {
        $this->uRI = $uRI;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetURI(): static
    {
        $this->uRI = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $type
     * @return static
     */
    public function setType(
        ?string $type = null
    ): static {
        $this->type = $type;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetType(): static
    {
        $this->type = null;

        return $this;
    }
}
