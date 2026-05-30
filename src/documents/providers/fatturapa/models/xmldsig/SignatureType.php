<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @translation-german-untranslated
 */
class SignatureType
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @var null|SignedInfoType
     */
    #[JMS\Accessor(getter: 'getSignedInfo', setter: 'setSignedInfo')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('SignedInfo')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\SignedInfoType')]
    #[JMS\XmlElement(cdata: false)]
    private ?SignedInfoType $signedInfo = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|SignatureValueType
     */
    #[JMS\Accessor(getter: 'getSignatureValue', setter: 'setSignatureValue')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('SignatureValue')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\SignatureValueType')]
    #[JMS\XmlElement(cdata: false)]
    private ?SignatureValueType $signatureValue = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|KeyInfoType
     */
    #[JMS\Accessor(getter: 'getKeyInfo', setter: 'setKeyInfo')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('KeyInfo')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\KeyInfoType')]
    #[JMS\XmlElement(cdata: false)]
    private ?KeyInfoType $keyInfo = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|array<ObjectType>
     */
    #[JMS\Accessor(getter: 'getObject', setter: 'setObject')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Object')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\ObjectType>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Object')]
    private ?array $object = null;

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
     * @return null|SignedInfoType
     */
    public function getSignedInfo(): ?SignedInfoType
    {
        return $this->signedInfo;
    }

    /**
     * @translation-german-untranslated
     *
     * @return SignedInfoType
     */
    public function getSignedInfoWithCreate(): SignedInfoType
    {
        $this->signedInfo ??= new SignedInfoType();

        return $this->signedInfo;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  SignedInfoType $signedInfo
     * @return static
     */
    public function setSignedInfo(
        ?SignedInfoType $signedInfo = null
    ): static {
        $this->signedInfo = $signedInfo;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetSignedInfo(): static
    {
        $this->signedInfo = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|SignatureValueType
     */
    public function getSignatureValue(): ?SignatureValueType
    {
        return $this->signatureValue;
    }

    /**
     * @translation-german-untranslated
     *
     * @return SignatureValueType
     */
    public function getSignatureValueWithCreate(): SignatureValueType
    {
        $this->signatureValue ??= new SignatureValueType();

        return $this->signatureValue;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  SignatureValueType $signatureValue
     * @return static
     */
    public function setSignatureValue(
        ?SignatureValueType $signatureValue = null
    ): static {
        $this->signatureValue = $signatureValue;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetSignatureValue(): static
    {
        $this->signatureValue = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|KeyInfoType
     */
    public function getKeyInfo(): ?KeyInfoType
    {
        return $this->keyInfo;
    }

    /**
     * @translation-german-untranslated
     *
     * @return KeyInfoType
     */
    public function getKeyInfoWithCreate(): KeyInfoType
    {
        $this->keyInfo ??= new KeyInfoType();

        return $this->keyInfo;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  KeyInfoType $keyInfo
     * @return static
     */
    public function setKeyInfo(
        ?KeyInfoType $keyInfo = null
    ): static {
        $this->keyInfo = $keyInfo;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetKeyInfo(): static
    {
        $this->keyInfo = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|array<ObjectType>
     */
    public function getObject(): ?array
    {
        return $this->object;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  array<ObjectType> $object
     * @return static
     */
    public function setObject(
        ?array $object = null
    ): static {
        $this->object = $object;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetObject(): static
    {
        $this->object = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function clearObject(): static
    {
        $this->object = [];

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  ObjectType $object
     * @return static
     */
    public function addToObject(
        ObjectType $object
    ): static {
        $this->object[] = $object;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return ObjectType
     */
    public function addToObjectWithCreate(): ObjectType
    {
        $this->addToObject($object = new ObjectType());

        return $object;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  ObjectType $object
     * @return static
     */
    public function addOnceToObject(
        ObjectType $object
    ): static {
        if (!is_array($this->object)) {
            $this->object = [];
        }

        $this->object[0] = $object;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return ObjectType
     */
    public function addOnceToObjectWithCreate(): ObjectType
    {
        if (!is_array($this->object)) {
            $this->object = [];
        }

        if ([] === $this->object) {
            $this->addOnceToObject(new ObjectType());
        }

        return $this->object[0];
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
