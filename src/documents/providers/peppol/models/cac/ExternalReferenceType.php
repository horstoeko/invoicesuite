<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CharacterSetCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DocumentHash;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EncodingCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FileName;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FormatCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HashAlgorithmMethod;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MimeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\URI;
use JMS\Serializer\Annotation as JMS;

class ExternalReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var null|URI
     */
    #[JMS\Accessor(getter: 'getURI', setter: 'setURI')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('URI')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\URI')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $uRI;

    /**
     * @var null|DocumentHash
     */
    #[JMS\Accessor(getter: 'getDocumentHash', setter: 'setDocumentHash')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DocumentHash')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DocumentHash')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $documentHash;

    /**
     * @var null|HashAlgorithmMethod
     */
    #[JMS\Accessor(getter: 'getHashAlgorithmMethod', setter: 'setHashAlgorithmMethod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('HashAlgorithmMethod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HashAlgorithmMethod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $hashAlgorithmMethod;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getExpiryDate', setter: 'setExpiryDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExpiryDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $expiryDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getExpiryTime', setter: 'setExpiryTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExpiryTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $expiryTime;

    /**
     * @var null|MimeCode
     */
    #[JMS\Accessor(getter: 'getMimeCode', setter: 'setMimeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MimeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MimeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $mimeCode;

    /**
     * @var null|FormatCode
     */
    #[JMS\Accessor(getter: 'getFormatCode', setter: 'setFormatCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FormatCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FormatCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $formatCode;

    /**
     * @var null|EncodingCode
     */
    #[JMS\Accessor(getter: 'getEncodingCode', setter: 'setEncodingCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EncodingCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EncodingCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $encodingCode;

    /**
     * @var null|CharacterSetCode
     */
    #[JMS\Accessor(getter: 'getCharacterSetCode', setter: 'setCharacterSetCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CharacterSetCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CharacterSetCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $characterSetCode;

    /**
     * @var null|FileName
     */
    #[JMS\Accessor(getter: 'getFileName', setter: 'setFileName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FileName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FileName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $fileName;

    /**
     * @var null|array<Description>
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Description', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $description;

    /**
     * @return null|URI
     */
    public function getURI(): ?URI
    {
        return $this->uRI;
    }

    /**
     * @return URI
     */
    public function getURIWithCreate(): URI
    {
        $this->uRI ??= new URI();

        return $this->uRI;
    }

    /**
     * @param  null|URI $uRI
     * @return static
     */
    public function setURI(
        ?URI $uRI = null
    ): static {
        $this->uRI = $uRI;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetURI(): static
    {
        $this->uRI = null;

        return $this;
    }

    /**
     * @return null|DocumentHash
     */
    public function getDocumentHash(): ?DocumentHash
    {
        return $this->documentHash;
    }

    /**
     * @return DocumentHash
     */
    public function getDocumentHashWithCreate(): DocumentHash
    {
        $this->documentHash ??= new DocumentHash();

        return $this->documentHash;
    }

    /**
     * @param  null|DocumentHash $documentHash
     * @return static
     */
    public function setDocumentHash(
        ?DocumentHash $documentHash = null
    ): static {
        $this->documentHash = $documentHash;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentHash(): static
    {
        $this->documentHash = null;

        return $this;
    }

    /**
     * @return null|HashAlgorithmMethod
     */
    public function getHashAlgorithmMethod(): ?HashAlgorithmMethod
    {
        return $this->hashAlgorithmMethod;
    }

    /**
     * @return HashAlgorithmMethod
     */
    public function getHashAlgorithmMethodWithCreate(): HashAlgorithmMethod
    {
        $this->hashAlgorithmMethod ??= new HashAlgorithmMethod();

        return $this->hashAlgorithmMethod;
    }

    /**
     * @param  null|HashAlgorithmMethod $hashAlgorithmMethod
     * @return static
     */
    public function setHashAlgorithmMethod(
        ?HashAlgorithmMethod $hashAlgorithmMethod = null
    ): static {
        $this->hashAlgorithmMethod = $hashAlgorithmMethod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHashAlgorithmMethod(): static
    {
        $this->hashAlgorithmMethod = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getExpiryDate(): ?DateTimeInterface
    {
        return $this->expiryDate;
    }

    /**
     * @param  null|DateTimeInterface $expiryDate
     * @return static
     */
    public function setExpiryDate(
        ?DateTimeInterface $expiryDate = null
    ): static {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExpiryDate(): static
    {
        $this->expiryDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getExpiryTime(): ?DateTimeInterface
    {
        return $this->expiryTime;
    }

    /**
     * @param  null|DateTimeInterface $expiryTime
     * @return static
     */
    public function setExpiryTime(
        ?DateTimeInterface $expiryTime = null
    ): static {
        $this->expiryTime = $expiryTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExpiryTime(): static
    {
        $this->expiryTime = null;

        return $this;
    }

    /**
     * @return null|MimeCode
     */
    public function getMimeCode(): ?MimeCode
    {
        return $this->mimeCode;
    }

    /**
     * @return MimeCode
     */
    public function getMimeCodeWithCreate(): MimeCode
    {
        $this->mimeCode ??= new MimeCode();

        return $this->mimeCode;
    }

    /**
     * @param  null|MimeCode $mimeCode
     * @return static
     */
    public function setMimeCode(
        ?MimeCode $mimeCode = null
    ): static {
        $this->mimeCode = $mimeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMimeCode(): static
    {
        $this->mimeCode = null;

        return $this;
    }

    /**
     * @return null|FormatCode
     */
    public function getFormatCode(): ?FormatCode
    {
        return $this->formatCode;
    }

    /**
     * @return FormatCode
     */
    public function getFormatCodeWithCreate(): FormatCode
    {
        $this->formatCode ??= new FormatCode();

        return $this->formatCode;
    }

    /**
     * @param  null|FormatCode $formatCode
     * @return static
     */
    public function setFormatCode(
        ?FormatCode $formatCode = null
    ): static {
        $this->formatCode = $formatCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFormatCode(): static
    {
        $this->formatCode = null;

        return $this;
    }

    /**
     * @return null|EncodingCode
     */
    public function getEncodingCode(): ?EncodingCode
    {
        return $this->encodingCode;
    }

    /**
     * @return EncodingCode
     */
    public function getEncodingCodeWithCreate(): EncodingCode
    {
        $this->encodingCode ??= new EncodingCode();

        return $this->encodingCode;
    }

    /**
     * @param  null|EncodingCode $encodingCode
     * @return static
     */
    public function setEncodingCode(
        ?EncodingCode $encodingCode = null
    ): static {
        $this->encodingCode = $encodingCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEncodingCode(): static
    {
        $this->encodingCode = null;

        return $this;
    }

    /**
     * @return null|CharacterSetCode
     */
    public function getCharacterSetCode(): ?CharacterSetCode
    {
        return $this->characterSetCode;
    }

    /**
     * @return CharacterSetCode
     */
    public function getCharacterSetCodeWithCreate(): CharacterSetCode
    {
        $this->characterSetCode ??= new CharacterSetCode();

        return $this->characterSetCode;
    }

    /**
     * @param  null|CharacterSetCode $characterSetCode
     * @return static
     */
    public function setCharacterSetCode(
        ?CharacterSetCode $characterSetCode = null
    ): static {
        $this->characterSetCode = $characterSetCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCharacterSetCode(): static
    {
        $this->characterSetCode = null;

        return $this;
    }

    /**
     * @return null|FileName
     */
    public function getFileName(): ?FileName
    {
        return $this->fileName;
    }

    /**
     * @return FileName
     */
    public function getFileNameWithCreate(): FileName
    {
        $this->fileName ??= new FileName();

        return $this->fileName;
    }

    /**
     * @param  null|FileName $fileName
     * @return static
     */
    public function setFileName(
        ?FileName $fileName = null
    ): static {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFileName(): static
    {
        $this->fileName = null;

        return $this;
    }

    /**
     * @return null|array<Description>
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param  null|array<Description> $description
     * @return static
     */
    public function setDescription(
        ?array $description = null
    ): static {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDescription(): static
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return null|Description
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @return null|Description
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addToDescription(
        Description $description
    ): static {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(
        Description $description
    ): static {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }
}
