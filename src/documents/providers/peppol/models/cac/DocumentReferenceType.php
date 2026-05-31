<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DocumentDescription;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DocumentStatusCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DocumentType;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DocumentTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LanguageID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LocaleCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\VersionID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\XPath;
use JMS\Serializer\Annotation as JMS;

class DocumentReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getCopyIndicator', setter: 'setCopyIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CopyIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $copyIndicator;

    /**
     * @var null|UUID
     */
    #[JMS\Accessor(getter: 'getUUID', setter: 'setUUID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('UUID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $uUID;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getIssueDate', setter: 'setIssueDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('IssueDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $issueDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getIssueTime', setter: 'setIssueTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('IssueTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $issueTime;

    /**
     * @var null|DocumentTypeCode
     */
    #[JMS\Accessor(getter: 'getDocumentTypeCode', setter: 'setDocumentTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DocumentTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DocumentTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $documentTypeCode;

    /**
     * @var null|DocumentType
     */
    #[JMS\Accessor(getter: 'getDocumentType', setter: 'setDocumentType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DocumentType')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DocumentType')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $documentType;

    /**
     * @var null|array<XPath>
     */
    #[JMS\Accessor(getter: 'getXPath', setter: 'setXPath')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('XPath')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\XPath>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'XPath', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $xPath;

    /**
     * @var null|LanguageID
     */
    #[JMS\Accessor(getter: 'getLanguageID', setter: 'setLanguageID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LanguageID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LanguageID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $languageID;

    /**
     * @var null|LocaleCode
     */
    #[JMS\Accessor(getter: 'getLocaleCode', setter: 'setLocaleCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LocaleCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LocaleCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $localeCode;

    /**
     * @var null|VersionID
     */
    #[JMS\Accessor(getter: 'getVersionID', setter: 'setVersionID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('VersionID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\VersionID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $versionID;

    /**
     * @var null|DocumentStatusCode
     */
    #[JMS\Accessor(getter: 'getDocumentStatusCode', setter: 'setDocumentStatusCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DocumentStatusCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DocumentStatusCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $documentStatusCode;

    /**
     * @var null|array<DocumentDescription>
     */
    #[JMS\Accessor(getter: 'getDocumentDescription', setter: 'setDocumentDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DocumentDescription')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DocumentDescription>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DocumentDescription', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $documentDescription;

    /**
     * @var null|Attachment
     */
    #[JMS\Accessor(getter: 'getAttachment', setter: 'setAttachment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Attachment')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Attachment')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $attachment;

    /**
     * @var null|ValidityPeriod
     */
    #[JMS\Accessor(getter: 'getValidityPeriod', setter: 'setValidityPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ValidityPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ValidityPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $validityPeriod;

    /**
     * @var null|IssuerParty
     */
    #[JMS\Accessor(getter: 'getIssuerParty', setter: 'setIssuerParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('IssuerParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\IssuerParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $issuerParty;

    /**
     * @var null|ResultOfVerification
     */
    #[JMS\Accessor(getter: 'getResultOfVerification', setter: 'setResultOfVerification')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ResultOfVerification')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ResultOfVerification')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $resultOfVerification;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
    ): static {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getCopyIndicator(): ?bool
    {
        return $this->copyIndicator;
    }

    /**
     * @param  null|bool $copyIndicator
     * @return static
     */
    public function setCopyIndicator(
        ?bool $copyIndicator = null
    ): static {
        $this->copyIndicator = $copyIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCopyIndicator(): static
    {
        $this->copyIndicator = null;

        return $this;
    }

    /**
     * @return null|UUID
     */
    public function getUUID(): ?UUID
    {
        return $this->uUID;
    }

    /**
     * @return UUID
     */
    public function getUUIDWithCreate(): UUID
    {
        $this->uUID ??= new UUID();

        return $this->uUID;
    }

    /**
     * @param  null|UUID $uUID
     * @return static
     */
    public function setUUID(
        ?UUID $uUID = null
    ): static {
        $this->uUID = $uUID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUUID(): static
    {
        $this->uUID = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getIssueDate(): ?DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * @param  null|DateTimeInterface $issueDate
     * @return static
     */
    public function setIssueDate(
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssueDate(): static
    {
        $this->issueDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getIssueTime(): ?DateTimeInterface
    {
        return $this->issueTime;
    }

    /**
     * @param  null|DateTimeInterface $issueTime
     * @return static
     */
    public function setIssueTime(
        ?DateTimeInterface $issueTime = null
    ): static {
        $this->issueTime = $issueTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssueTime(): static
    {
        $this->issueTime = null;

        return $this;
    }

    /**
     * @return null|DocumentTypeCode
     */
    public function getDocumentTypeCode(): ?DocumentTypeCode
    {
        return $this->documentTypeCode;
    }

    /**
     * @return DocumentTypeCode
     */
    public function getDocumentTypeCodeWithCreate(): DocumentTypeCode
    {
        $this->documentTypeCode ??= new DocumentTypeCode();

        return $this->documentTypeCode;
    }

    /**
     * @param  null|DocumentTypeCode $documentTypeCode
     * @return static
     */
    public function setDocumentTypeCode(
        ?DocumentTypeCode $documentTypeCode = null
    ): static {
        $this->documentTypeCode = $documentTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentTypeCode(): static
    {
        $this->documentTypeCode = null;

        return $this;
    }

    /**
     * @return null|DocumentType
     */
    public function getDocumentType(): ?DocumentType
    {
        return $this->documentType;
    }

    /**
     * @return DocumentType
     */
    public function getDocumentTypeWithCreate(): DocumentType
    {
        $this->documentType ??= new DocumentType();

        return $this->documentType;
    }

    /**
     * @param  null|DocumentType $documentType
     * @return static
     */
    public function setDocumentType(
        ?DocumentType $documentType = null
    ): static {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentType(): static
    {
        $this->documentType = null;

        return $this;
    }

    /**
     * @return null|array<XPath>
     */
    public function getXPath(): ?array
    {
        return $this->xPath;
    }

    /**
     * @param  null|array<XPath> $xPath
     * @return static
     */
    public function setXPath(
        ?array $xPath = null
    ): static {
        $this->xPath = $xPath;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetXPath(): static
    {
        $this->xPath = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearXPath(): static
    {
        $this->xPath = [];

        return $this;
    }

    /**
     * @return null|XPath
     */
    public function firstXPath(): ?XPath
    {
        $xPath = $this->xPath ?? [];
        $xPath = reset($xPath);

        if (false === $xPath) {
            return null;
        }

        return $xPath;
    }

    /**
     * @return null|XPath
     */
    public function lastXPath(): ?XPath
    {
        $xPath = $this->xPath ?? [];
        $xPath = end($xPath);

        if (false === $xPath) {
            return null;
        }

        return $xPath;
    }

    /**
     * @param  XPath  $xPath
     * @return static
     */
    public function addToXPath(
        XPath $xPath
    ): static {
        $this->xPath[] = $xPath;

        return $this;
    }

    /**
     * @return XPath
     */
    public function addToXPathWithCreate(): XPath
    {
        $this->addToXPath($xPath = new XPath());

        return $xPath;
    }

    /**
     * @param  XPath  $xPath
     * @return static
     */
    public function addOnceToXPath(
        XPath $xPath
    ): static {
        if (!is_array($this->xPath)) {
            $this->xPath = [];
        }

        $this->xPath[0] = $xPath;

        return $this;
    }

    /**
     * @return XPath
     */
    public function addOnceToXPathWithCreate(): XPath
    {
        if (!is_array($this->xPath)) {
            $this->xPath = [];
        }

        if ([] === $this->xPath) {
            $this->addOnceToXPath(new XPath());
        }

        return $this->xPath[0];
    }

    /**
     * @return null|LanguageID
     */
    public function getLanguageID(): ?LanguageID
    {
        return $this->languageID;
    }

    /**
     * @return LanguageID
     */
    public function getLanguageIDWithCreate(): LanguageID
    {
        $this->languageID ??= new LanguageID();

        return $this->languageID;
    }

    /**
     * @param  null|LanguageID $languageID
     * @return static
     */
    public function setLanguageID(
        ?LanguageID $languageID = null
    ): static {
        $this->languageID = $languageID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLanguageID(): static
    {
        $this->languageID = null;

        return $this;
    }

    /**
     * @return null|LocaleCode
     */
    public function getLocaleCode(): ?LocaleCode
    {
        return $this->localeCode;
    }

    /**
     * @return LocaleCode
     */
    public function getLocaleCodeWithCreate(): LocaleCode
    {
        $this->localeCode ??= new LocaleCode();

        return $this->localeCode;
    }

    /**
     * @param  null|LocaleCode $localeCode
     * @return static
     */
    public function setLocaleCode(
        ?LocaleCode $localeCode = null
    ): static {
        $this->localeCode = $localeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLocaleCode(): static
    {
        $this->localeCode = null;

        return $this;
    }

    /**
     * @return null|VersionID
     */
    public function getVersionID(): ?VersionID
    {
        return $this->versionID;
    }

    /**
     * @return VersionID
     */
    public function getVersionIDWithCreate(): VersionID
    {
        $this->versionID ??= new VersionID();

        return $this->versionID;
    }

    /**
     * @param  null|VersionID $versionID
     * @return static
     */
    public function setVersionID(
        ?VersionID $versionID = null
    ): static {
        $this->versionID = $versionID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetVersionID(): static
    {
        $this->versionID = null;

        return $this;
    }

    /**
     * @return null|DocumentStatusCode
     */
    public function getDocumentStatusCode(): ?DocumentStatusCode
    {
        return $this->documentStatusCode;
    }

    /**
     * @return DocumentStatusCode
     */
    public function getDocumentStatusCodeWithCreate(): DocumentStatusCode
    {
        $this->documentStatusCode ??= new DocumentStatusCode();

        return $this->documentStatusCode;
    }

    /**
     * @param  null|DocumentStatusCode $documentStatusCode
     * @return static
     */
    public function setDocumentStatusCode(
        ?DocumentStatusCode $documentStatusCode = null
    ): static {
        $this->documentStatusCode = $documentStatusCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentStatusCode(): static
    {
        $this->documentStatusCode = null;

        return $this;
    }

    /**
     * @return null|array<DocumentDescription>
     */
    public function getDocumentDescription(): ?array
    {
        return $this->documentDescription;
    }

    /**
     * @param  null|array<DocumentDescription> $documentDescription
     * @return static
     */
    public function setDocumentDescription(
        ?array $documentDescription = null
    ): static {
        $this->documentDescription = $documentDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentDescription(): static
    {
        $this->documentDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDocumentDescription(): static
    {
        $this->documentDescription = [];

        return $this;
    }

    /**
     * @return null|DocumentDescription
     */
    public function firstDocumentDescription(): ?DocumentDescription
    {
        $documentDescription = $this->documentDescription ?? [];
        $documentDescription = reset($documentDescription);

        if (false === $documentDescription) {
            return null;
        }

        return $documentDescription;
    }

    /**
     * @return null|DocumentDescription
     */
    public function lastDocumentDescription(): ?DocumentDescription
    {
        $documentDescription = $this->documentDescription ?? [];
        $documentDescription = end($documentDescription);

        if (false === $documentDescription) {
            return null;
        }

        return $documentDescription;
    }

    /**
     * @param  DocumentDescription $documentDescription
     * @return static
     */
    public function addToDocumentDescription(
        DocumentDescription $documentDescription
    ): static {
        $this->documentDescription[] = $documentDescription;

        return $this;
    }

    /**
     * @return DocumentDescription
     */
    public function addToDocumentDescriptionWithCreate(): DocumentDescription
    {
        $this->addToDocumentDescription($documentDescription = new DocumentDescription());

        return $documentDescription;
    }

    /**
     * @param  DocumentDescription $documentDescription
     * @return static
     */
    public function addOnceToDocumentDescription(
        DocumentDescription $documentDescription
    ): static {
        if (!is_array($this->documentDescription)) {
            $this->documentDescription = [];
        }

        $this->documentDescription[0] = $documentDescription;

        return $this;
    }

    /**
     * @return DocumentDescription
     */
    public function addOnceToDocumentDescriptionWithCreate(): DocumentDescription
    {
        if (!is_array($this->documentDescription)) {
            $this->documentDescription = [];
        }

        if ([] === $this->documentDescription) {
            $this->addOnceToDocumentDescription(new DocumentDescription());
        }

        return $this->documentDescription[0];
    }

    /**
     * @return null|Attachment
     */
    public function getAttachment(): ?Attachment
    {
        return $this->attachment;
    }

    /**
     * @return Attachment
     */
    public function getAttachmentWithCreate(): Attachment
    {
        $this->attachment ??= new Attachment();

        return $this->attachment;
    }

    /**
     * @param  null|Attachment $attachment
     * @return static
     */
    public function setAttachment(
        ?Attachment $attachment = null
    ): static {
        $this->attachment = $attachment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAttachment(): static
    {
        $this->attachment = null;

        return $this;
    }

    /**
     * @return null|ValidityPeriod
     */
    public function getValidityPeriod(): ?ValidityPeriod
    {
        return $this->validityPeriod;
    }

    /**
     * @return ValidityPeriod
     */
    public function getValidityPeriodWithCreate(): ValidityPeriod
    {
        $this->validityPeriod ??= new ValidityPeriod();

        return $this->validityPeriod;
    }

    /**
     * @param  null|ValidityPeriod $validityPeriod
     * @return static
     */
    public function setValidityPeriod(
        ?ValidityPeriod $validityPeriod = null
    ): static {
        $this->validityPeriod = $validityPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValidityPeriod(): static
    {
        $this->validityPeriod = null;

        return $this;
    }

    /**
     * @return null|IssuerParty
     */
    public function getIssuerParty(): ?IssuerParty
    {
        return $this->issuerParty;
    }

    /**
     * @return IssuerParty
     */
    public function getIssuerPartyWithCreate(): IssuerParty
    {
        $this->issuerParty ??= new IssuerParty();

        return $this->issuerParty;
    }

    /**
     * @param  null|IssuerParty $issuerParty
     * @return static
     */
    public function setIssuerParty(
        ?IssuerParty $issuerParty = null
    ): static {
        $this->issuerParty = $issuerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssuerParty(): static
    {
        $this->issuerParty = null;

        return $this;
    }

    /**
     * @return null|ResultOfVerification
     */
    public function getResultOfVerification(): ?ResultOfVerification
    {
        return $this->resultOfVerification;
    }

    /**
     * @return ResultOfVerification
     */
    public function getResultOfVerificationWithCreate(): ResultOfVerification
    {
        $this->resultOfVerification ??= new ResultOfVerification();

        return $this->resultOfVerification;
    }

    /**
     * @param  null|ResultOfVerification $resultOfVerification
     * @return static
     */
    public function setResultOfVerification(
        ?ResultOfVerification $resultOfVerification = null
    ): static {
        $this->resultOfVerification = $resultOfVerification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetResultOfVerification(): static
    {
        $this->resultOfVerification = null;

        return $this;
    }
}
