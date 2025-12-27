<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\CharacterSetCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Description;
use horstoeko\invoicesuite\documents\models\ubl\cbc\DocumentHash;
use horstoeko\invoicesuite\documents\models\ubl\cbc\EncodingCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\FileName;
use horstoeko\invoicesuite\documents\models\ubl\cbc\FormatCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\HashAlgorithmMethod;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MimeCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\URI;
use JMS\Serializer\Annotation as JMS;

class ExternalReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var null|URI
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\URI")
     * @JMS\Expose
     * @JMS\SerializedName("URI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getURI", setter="setURI")
     */
    private $uRI;

    /**
     * @var null|DocumentHash
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\DocumentHash")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentHash")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentHash", setter="setDocumentHash")
     */
    private $documentHash;

    /**
     * @var null|HashAlgorithmMethod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\HashAlgorithmMethod")
     * @JMS\Expose
     * @JMS\SerializedName("HashAlgorithmMethod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHashAlgorithmMethod", setter="setHashAlgorithmMethod")
     */
    private $hashAlgorithmMethod;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ExpiryDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExpiryDate", setter="setExpiryDate")
     */
    private $expiryDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("ExpiryTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExpiryTime", setter="setExpiryTime")
     */
    private $expiryTime;

    /**
     * @var null|MimeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MimeCode")
     * @JMS\Expose
     * @JMS\SerializedName("MimeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMimeCode", setter="setMimeCode")
     */
    private $mimeCode;

    /**
     * @var null|FormatCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\FormatCode")
     * @JMS\Expose
     * @JMS\SerializedName("FormatCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFormatCode", setter="setFormatCode")
     */
    private $formatCode;

    /**
     * @var null|EncodingCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\EncodingCode")
     * @JMS\Expose
     * @JMS\SerializedName("EncodingCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEncodingCode", setter="setEncodingCode")
     */
    private $encodingCode;

    /**
     * @var null|CharacterSetCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\CharacterSetCode")
     * @JMS\Expose
     * @JMS\SerializedName("CharacterSetCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCharacterSetCode", setter="setCharacterSetCode")
     */
    private $characterSetCode;

    /**
     * @var null|FileName
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\FileName")
     * @JMS\Expose
     * @JMS\SerializedName("FileName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFileName", setter="setFileName")
     */
    private $fileName;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
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
        $this->uRI = is_null($this->uRI) ? new URI() : $this->uRI;

        return $this->uRI;
    }

    /**
     * @param  null|URI $uRI
     * @return static
     */
    public function setURI(?URI $uRI = null): static
    {
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
        $this->documentHash = is_null($this->documentHash) ? new DocumentHash() : $this->documentHash;

        return $this->documentHash;
    }

    /**
     * @param  null|DocumentHash $documentHash
     * @return static
     */
    public function setDocumentHash(?DocumentHash $documentHash = null): static
    {
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
        $this->hashAlgorithmMethod = is_null($this->hashAlgorithmMethod) ? new HashAlgorithmMethod() : $this->hashAlgorithmMethod;

        return $this->hashAlgorithmMethod;
    }

    /**
     * @param  null|HashAlgorithmMethod $hashAlgorithmMethod
     * @return static
     */
    public function setHashAlgorithmMethod(?HashAlgorithmMethod $hashAlgorithmMethod = null): static
    {
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
    public function setExpiryDate(?DateTimeInterface $expiryDate = null): static
    {
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
    public function setExpiryTime(?DateTimeInterface $expiryTime = null): static
    {
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
        $this->mimeCode = is_null($this->mimeCode) ? new MimeCode() : $this->mimeCode;

        return $this->mimeCode;
    }

    /**
     * @param  null|MimeCode $mimeCode
     * @return static
     */
    public function setMimeCode(?MimeCode $mimeCode = null): static
    {
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
        $this->formatCode = is_null($this->formatCode) ? new FormatCode() : $this->formatCode;

        return $this->formatCode;
    }

    /**
     * @param  null|FormatCode $formatCode
     * @return static
     */
    public function setFormatCode(?FormatCode $formatCode = null): static
    {
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
        $this->encodingCode = is_null($this->encodingCode) ? new EncodingCode() : $this->encodingCode;

        return $this->encodingCode;
    }

    /**
     * @param  null|EncodingCode $encodingCode
     * @return static
     */
    public function setEncodingCode(?EncodingCode $encodingCode = null): static
    {
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
        $this->characterSetCode = is_null($this->characterSetCode) ? new CharacterSetCode() : $this->characterSetCode;

        return $this->characterSetCode;
    }

    /**
     * @param  null|CharacterSetCode $characterSetCode
     * @return static
     */
    public function setCharacterSetCode(?CharacterSetCode $characterSetCode = null): static
    {
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
        $this->fileName = is_null($this->fileName) ? new FileName() : $this->fileName;

        return $this->fileName;
    }

    /**
     * @param  null|FileName $fileName
     * @return static
     */
    public function setFileName(?FileName $fileName = null): static
    {
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
    public function setDescription(?array $description = null): static
    {
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
    public function addToDescription(Description $description): static
    {
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
    public function addOnceToDescription(Description $description): static
    {
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
