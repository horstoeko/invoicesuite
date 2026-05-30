<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @translation-german-untranslated
 */
class KeyInfoType
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getKeyName', setter: 'setKeyName')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('KeyName')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $keyName = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|KeyValueType
     */
    #[JMS\Accessor(getter: 'getKeyValue', setter: 'setKeyValue')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('KeyValue')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\KeyValueType')]
    #[JMS\XmlElement(cdata: false)]
    private ?KeyValueType $keyValue = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|RetrievalMethodType
     */
    #[JMS\Accessor(getter: 'getRetrievalMethod', setter: 'setRetrievalMethod')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('RetrievalMethod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\RetrievalMethodType')]
    #[JMS\XmlElement(cdata: false)]
    private ?RetrievalMethodType $retrievalMethod = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|X509DataType
     */
    #[JMS\Accessor(getter: 'getX509Data', setter: 'setX509Data')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('X509Data')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\X509DataType')]
    #[JMS\XmlElement(cdata: false)]
    private ?X509DataType $x509Data = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|PGPDataType
     */
    #[JMS\Accessor(getter: 'getPGPData', setter: 'setPGPData')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('PGPData')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\PGPDataType')]
    #[JMS\XmlElement(cdata: false)]
    private ?PGPDataType $pGPData = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|SPKIDataType
     */
    #[JMS\Accessor(getter: 'getSPKIData', setter: 'setSPKIData')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('SPKIData')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig\SPKIDataType')]
    #[JMS\XmlElement(cdata: false)]
    private ?SPKIDataType $sPKIData = null;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getMgmtData', setter: 'setMgmtData')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('MgmtData')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $mgmtData = null;

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
     * @return null|string
     */
    public function getKeyName(): ?string
    {
        return $this->keyName;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $keyName
     * @return static
     */
    public function setKeyName(
        ?string $keyName = null
    ): static {
        $this->keyName = $keyName;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetKeyName(): static
    {
        $this->keyName = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|KeyValueType
     */
    public function getKeyValue(): ?KeyValueType
    {
        return $this->keyValue;
    }

    /**
     * @translation-german-untranslated
     *
     * @return KeyValueType
     */
    public function getKeyValueWithCreate(): KeyValueType
    {
        $this->keyValue ??= new KeyValueType();

        return $this->keyValue;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  KeyValueType $keyValue
     * @return static
     */
    public function setKeyValue(
        ?KeyValueType $keyValue = null
    ): static {
        $this->keyValue = $keyValue;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetKeyValue(): static
    {
        $this->keyValue = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|RetrievalMethodType
     */
    public function getRetrievalMethod(): ?RetrievalMethodType
    {
        return $this->retrievalMethod;
    }

    /**
     * @translation-german-untranslated
     *
     * @return RetrievalMethodType
     */
    public function getRetrievalMethodWithCreate(): RetrievalMethodType
    {
        $this->retrievalMethod ??= new RetrievalMethodType();

        return $this->retrievalMethod;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  RetrievalMethodType $retrievalMethod
     * @return static
     */
    public function setRetrievalMethod(
        ?RetrievalMethodType $retrievalMethod = null
    ): static {
        $this->retrievalMethod = $retrievalMethod;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetRetrievalMethod(): static
    {
        $this->retrievalMethod = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|X509DataType
     */
    public function getX509Data(): ?X509DataType
    {
        return $this->x509Data;
    }

    /**
     * @translation-german-untranslated
     *
     * @return X509DataType
     */
    public function getX509DataWithCreate(): X509DataType
    {
        $this->x509Data ??= new X509DataType();

        return $this->x509Data;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  X509DataType $x509Data
     * @return static
     */
    public function setX509Data(
        ?X509DataType $x509Data = null
    ): static {
        $this->x509Data = $x509Data;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetX509Data(): static
    {
        $this->x509Data = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|PGPDataType
     */
    public function getPGPData(): ?PGPDataType
    {
        return $this->pGPData;
    }

    /**
     * @translation-german-untranslated
     *
     * @return PGPDataType
     */
    public function getPGPDataWithCreate(): PGPDataType
    {
        $this->pGPData ??= new PGPDataType();

        return $this->pGPData;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  PGPDataType $pGPData
     * @return static
     */
    public function setPGPData(
        ?PGPDataType $pGPData = null
    ): static {
        $this->pGPData = $pGPData;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetPGPData(): static
    {
        $this->pGPData = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|SPKIDataType
     */
    public function getSPKIData(): ?SPKIDataType
    {
        return $this->sPKIData;
    }

    /**
     * @translation-german-untranslated
     *
     * @return SPKIDataType
     */
    public function getSPKIDataWithCreate(): SPKIDataType
    {
        $this->sPKIData ??= new SPKIDataType();

        return $this->sPKIData;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  SPKIDataType $sPKIData
     * @return static
     */
    public function setSPKIData(
        ?SPKIDataType $sPKIData = null
    ): static {
        $this->sPKIData = $sPKIData;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetSPKIData(): static
    {
        $this->sPKIData = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getMgmtData(): ?string
    {
        return $this->mgmtData;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $mgmtData
     * @return static
     */
    public function setMgmtData(
        ?string $mgmtData = null
    ): static {
        $this->mgmtData = $mgmtData;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetMgmtData(): static
    {
        $this->mgmtData = null;

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
}
