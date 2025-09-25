<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\CharacterSetCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Description;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentHash;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\EncodingCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\FileName;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\FormatCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\HashAlgorithmMethod;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\MimeCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\URI;

class ExternalReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\URI|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\URI")
     * @JMS\Expose
     * @JMS\SerializedName("URI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getURI", setter="setURI")
     */
    private $uRI;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentHash|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentHash")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentHash")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentHash", setter="setDocumentHash")
     */
    private $documentHash;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\HashAlgorithmMethod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\HashAlgorithmMethod")
     * @JMS\Expose
     * @JMS\SerializedName("HashAlgorithmMethod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHashAlgorithmMethod", setter="setHashAlgorithmMethod")
     */
    private $hashAlgorithmMethod;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ExpiryDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExpiryDate", setter="setExpiryDate")
     */
    private $expiryDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("ExpiryTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExpiryTime", setter="setExpiryTime")
     */
    private $expiryTime;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\MimeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\MimeCode")
     * @JMS\Expose
     * @JMS\SerializedName("MimeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMimeCode", setter="setMimeCode")
     */
    private $mimeCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\FormatCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\FormatCode")
     * @JMS\Expose
     * @JMS\SerializedName("FormatCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFormatCode", setter="setFormatCode")
     */
    private $formatCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\EncodingCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\EncodingCode")
     * @JMS\Expose
     * @JMS\SerializedName("EncodingCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getEncodingCode", setter="setEncodingCode")
     */
    private $encodingCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\CharacterSetCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\CharacterSetCode")
     * @JMS\Expose
     * @JMS\SerializedName("CharacterSetCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCharacterSetCode", setter="setCharacterSetCode")
     */
    private $characterSetCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\FileName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\FileName")
     * @JMS\Expose
     * @JMS\SerializedName("FileName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFileName", setter="setFileName")
     */
    private $fileName;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\URI|null
     */
    public function getURI(): ?URI
    {
        return $this->uRI;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\URI
     */
    public function getURIWithCreate(): URI
    {
        $this->uRI = is_null($this->uRI) ? new URI() : $this->uRI;

        return $this->uRI;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\URI|null $uRI
     * @return self
     */
    public function setURI(?URI $uRI = null): self
    {
        $this->uRI = $uRI;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetURI(): self
    {
        $this->uRI = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentHash|null
     */
    public function getDocumentHash(): ?DocumentHash
    {
        return $this->documentHash;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentHash
     */
    public function getDocumentHashWithCreate(): DocumentHash
    {
        $this->documentHash = is_null($this->documentHash) ? new DocumentHash() : $this->documentHash;

        return $this->documentHash;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentHash|null $documentHash
     * @return self
     */
    public function setDocumentHash(?DocumentHash $documentHash = null): self
    {
        $this->documentHash = $documentHash;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDocumentHash(): self
    {
        $this->documentHash = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\HashAlgorithmMethod|null
     */
    public function getHashAlgorithmMethod(): ?HashAlgorithmMethod
    {
        return $this->hashAlgorithmMethod;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\HashAlgorithmMethod
     */
    public function getHashAlgorithmMethodWithCreate(): HashAlgorithmMethod
    {
        $this->hashAlgorithmMethod = is_null($this->hashAlgorithmMethod) ? new HashAlgorithmMethod() : $this->hashAlgorithmMethod;

        return $this->hashAlgorithmMethod;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\HashAlgorithmMethod|null $hashAlgorithmMethod
     * @return self
     */
    public function setHashAlgorithmMethod(?HashAlgorithmMethod $hashAlgorithmMethod = null): self
    {
        $this->hashAlgorithmMethod = $hashAlgorithmMethod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetHashAlgorithmMethod(): self
    {
        $this->hashAlgorithmMethod = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getExpiryDate(): ?\DateTimeInterface
    {
        return $this->expiryDate;
    }

    /**
     * @param \DateTimeInterface|null $expiryDate
     * @return self
     */
    public function setExpiryDate(?\DateTimeInterface $expiryDate = null): self
    {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetExpiryDate(): self
    {
        $this->expiryDate = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getExpiryTime(): ?\DateTimeInterface
    {
        return $this->expiryTime;
    }

    /**
     * @param \DateTimeInterface|null $expiryTime
     * @return self
     */
    public function setExpiryTime(?\DateTimeInterface $expiryTime = null): self
    {
        $this->expiryTime = $expiryTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetExpiryTime(): self
    {
        $this->expiryTime = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MimeCode|null
     */
    public function getMimeCode(): ?MimeCode
    {
        return $this->mimeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MimeCode
     */
    public function getMimeCodeWithCreate(): MimeCode
    {
        $this->mimeCode = is_null($this->mimeCode) ? new MimeCode() : $this->mimeCode;

        return $this->mimeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\MimeCode|null $mimeCode
     * @return self
     */
    public function setMimeCode(?MimeCode $mimeCode = null): self
    {
        $this->mimeCode = $mimeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMimeCode(): self
    {
        $this->mimeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FormatCode|null
     */
    public function getFormatCode(): ?FormatCode
    {
        return $this->formatCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FormatCode
     */
    public function getFormatCodeWithCreate(): FormatCode
    {
        $this->formatCode = is_null($this->formatCode) ? new FormatCode() : $this->formatCode;

        return $this->formatCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\FormatCode|null $formatCode
     * @return self
     */
    public function setFormatCode(?FormatCode $formatCode = null): self
    {
        $this->formatCode = $formatCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFormatCode(): self
    {
        $this->formatCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\EncodingCode|null
     */
    public function getEncodingCode(): ?EncodingCode
    {
        return $this->encodingCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\EncodingCode
     */
    public function getEncodingCodeWithCreate(): EncodingCode
    {
        $this->encodingCode = is_null($this->encodingCode) ? new EncodingCode() : $this->encodingCode;

        return $this->encodingCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\EncodingCode|null $encodingCode
     * @return self
     */
    public function setEncodingCode(?EncodingCode $encodingCode = null): self
    {
        $this->encodingCode = $encodingCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEncodingCode(): self
    {
        $this->encodingCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CharacterSetCode|null
     */
    public function getCharacterSetCode(): ?CharacterSetCode
    {
        return $this->characterSetCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\CharacterSetCode
     */
    public function getCharacterSetCodeWithCreate(): CharacterSetCode
    {
        $this->characterSetCode = is_null($this->characterSetCode) ? new CharacterSetCode() : $this->characterSetCode;

        return $this->characterSetCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\CharacterSetCode|null $characterSetCode
     * @return self
     */
    public function setCharacterSetCode(?CharacterSetCode $characterSetCode = null): self
    {
        $this->characterSetCode = $characterSetCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCharacterSetCode(): self
    {
        $this->characterSetCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FileName|null
     */
    public function getFileName(): ?FileName
    {
        return $this->fileName;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FileName
     */
    public function getFileNameWithCreate(): FileName
    {
        $this->fileName = is_null($this->fileName) ? new FileName() : $this->fileName;

        return $this->fileName;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\FileName|null $fileName
     * @return self
     */
    public function setFileName(?FileName $fileName = null): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFileName(): self
    {
        $this->fileName = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null $description
     * @return self
     */
    public function setDescription(?array $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDescription(): self
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDescription(): self
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
     * @return self
     */
    public function addOnceToDescription(Description $description): self
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ($this->description === []) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }
}
