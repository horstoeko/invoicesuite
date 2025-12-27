<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\DocumentDescription;
use horstoeko\invoicesuite\documents\models\ubl\cbc\DocumentStatusCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\DocumentType;
use horstoeko\invoicesuite\documents\models\ubl\cbc\DocumentTypeCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\LanguageID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\LocaleCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\UUID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\VersionID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\XPath;
use JMS\Serializer\Annotation as JMS;

class DocumentReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("CopyIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCopyIndicator", setter="setCopyIndicator")
     */
    private $copyIndicator;

    /**
     * @var null|UUID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\UUID")
     * @JMS\Expose
     * @JMS\SerializedName("UUID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUUID", setter="setUUID")
     */
    private $uUID;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("IssueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueDate", setter="setIssueDate")
     */
    private $issueDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("IssueTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueTime", setter="setIssueTime")
     */
    private $issueTime;

    /**
     * @var null|DocumentTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\DocumentTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentTypeCode", setter="setDocumentTypeCode")
     */
    private $documentTypeCode;

    /**
     * @var null|DocumentType
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\DocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentType", setter="setDocumentType")
     */
    private $documentType;

    /**
     * @var null|array<XPath>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\XPath>")
     * @JMS\Expose
     * @JMS\SerializedName("XPath")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="XPath", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getXPath", setter="setXPath")
     */
    private $xPath;

    /**
     * @var null|LanguageID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\LanguageID")
     * @JMS\Expose
     * @JMS\SerializedName("LanguageID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLanguageID", setter="setLanguageID")
     */
    private $languageID;

    /**
     * @var null|LocaleCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\LocaleCode")
     * @JMS\Expose
     * @JMS\SerializedName("LocaleCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLocaleCode", setter="setLocaleCode")
     */
    private $localeCode;

    /**
     * @var null|VersionID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\VersionID")
     * @JMS\Expose
     * @JMS\SerializedName("VersionID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getVersionID", setter="setVersionID")
     */
    private $versionID;

    /**
     * @var null|DocumentStatusCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\DocumentStatusCode")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentStatusCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentStatusCode", setter="setDocumentStatusCode")
     */
    private $documentStatusCode;

    /**
     * @var null|array<DocumentDescription>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\DocumentDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DocumentDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDocumentDescription", setter="setDocumentDescription")
     */
    private $documentDescription;

    /**
     * @var null|Attachment
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\Attachment")
     * @JMS\Expose
     * @JMS\SerializedName("Attachment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAttachment", setter="setAttachment")
     */
    private $attachment;

    /**
     * @var null|ValidityPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ValidityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("ValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidityPeriod", setter="setValidityPeriod")
     */
    private $validityPeriod;

    /**
     * @var null|IssuerParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\IssuerParty")
     * @JMS\Expose
     * @JMS\SerializedName("IssuerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssuerParty", setter="setIssuerParty")
     */
    private $issuerParty;

    /**
     * @var null|ResultOfVerification
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ResultOfVerification")
     * @JMS\Expose
     * @JMS\SerializedName("ResultOfVerification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getResultOfVerification", setter="setResultOfVerification")
     */
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
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
    {
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
    public function setCopyIndicator(?bool $copyIndicator = null): static
    {
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
        $this->uUID = is_null($this->uUID) ? new UUID() : $this->uUID;

        return $this->uUID;
    }

    /**
     * @param  null|UUID $uUID
     * @return static
     */
    public function setUUID(?UUID $uUID = null): static
    {
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
    public function setIssueDate(?DateTimeInterface $issueDate = null): static
    {
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
    public function setIssueTime(?DateTimeInterface $issueTime = null): static
    {
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
        $this->documentTypeCode = is_null($this->documentTypeCode) ? new DocumentTypeCode() : $this->documentTypeCode;

        return $this->documentTypeCode;
    }

    /**
     * @param  null|DocumentTypeCode $documentTypeCode
     * @return static
     */
    public function setDocumentTypeCode(?DocumentTypeCode $documentTypeCode = null): static
    {
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
        $this->documentType = is_null($this->documentType) ? new DocumentType() : $this->documentType;

        return $this->documentType;
    }

    /**
     * @param  null|DocumentType $documentType
     * @return static
     */
    public function setDocumentType(?DocumentType $documentType = null): static
    {
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
    public function setXPath(?array $xPath = null): static
    {
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
    public function addToXPath(XPath $xPath): static
    {
        $this->xPath[] = $xPath;

        return $this;
    }

    /**
     * @return XPath
     */
    public function addToXPathWithCreate(): XPath
    {
        $this->addToxPath($xPath = new XPath());

        return $xPath;
    }

    /**
     * @param  XPath  $xPath
     * @return static
     */
    public function addOnceToXPath(XPath $xPath): static
    {
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
            $this->addOnceToxPath(new XPath());
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
        $this->languageID = is_null($this->languageID) ? new LanguageID() : $this->languageID;

        return $this->languageID;
    }

    /**
     * @param  null|LanguageID $languageID
     * @return static
     */
    public function setLanguageID(?LanguageID $languageID = null): static
    {
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
        $this->localeCode = is_null($this->localeCode) ? new LocaleCode() : $this->localeCode;

        return $this->localeCode;
    }

    /**
     * @param  null|LocaleCode $localeCode
     * @return static
     */
    public function setLocaleCode(?LocaleCode $localeCode = null): static
    {
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
        $this->versionID = is_null($this->versionID) ? new VersionID() : $this->versionID;

        return $this->versionID;
    }

    /**
     * @param  null|VersionID $versionID
     * @return static
     */
    public function setVersionID(?VersionID $versionID = null): static
    {
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
        $this->documentStatusCode = is_null($this->documentStatusCode) ? new DocumentStatusCode() : $this->documentStatusCode;

        return $this->documentStatusCode;
    }

    /**
     * @param  null|DocumentStatusCode $documentStatusCode
     * @return static
     */
    public function setDocumentStatusCode(?DocumentStatusCode $documentStatusCode = null): static
    {
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
    public function setDocumentDescription(?array $documentDescription = null): static
    {
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
    public function addToDocumentDescription(DocumentDescription $documentDescription): static
    {
        $this->documentDescription[] = $documentDescription;

        return $this;
    }

    /**
     * @return DocumentDescription
     */
    public function addToDocumentDescriptionWithCreate(): DocumentDescription
    {
        $this->addTodocumentDescription($documentDescription = new DocumentDescription());

        return $documentDescription;
    }

    /**
     * @param  DocumentDescription $documentDescription
     * @return static
     */
    public function addOnceToDocumentDescription(DocumentDescription $documentDescription): static
    {
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
            $this->addOnceTodocumentDescription(new DocumentDescription());
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
        $this->attachment = is_null($this->attachment) ? new Attachment() : $this->attachment;

        return $this->attachment;
    }

    /**
     * @param  null|Attachment $attachment
     * @return static
     */
    public function setAttachment(?Attachment $attachment = null): static
    {
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
        $this->validityPeriod = is_null($this->validityPeriod) ? new ValidityPeriod() : $this->validityPeriod;

        return $this->validityPeriod;
    }

    /**
     * @param  null|ValidityPeriod $validityPeriod
     * @return static
     */
    public function setValidityPeriod(?ValidityPeriod $validityPeriod = null): static
    {
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
        $this->issuerParty = is_null($this->issuerParty) ? new IssuerParty() : $this->issuerParty;

        return $this->issuerParty;
    }

    /**
     * @param  null|IssuerParty $issuerParty
     * @return static
     */
    public function setIssuerParty(?IssuerParty $issuerParty = null): static
    {
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
        $this->resultOfVerification = is_null($this->resultOfVerification) ? new ResultOfVerification() : $this->resultOfVerification;

        return $this->resultOfVerification;
    }

    /**
     * @param  null|ResultOfVerification $resultOfVerification
     * @return static
     */
    public function setResultOfVerification(?ResultOfVerification $resultOfVerification = null): static
    {
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
