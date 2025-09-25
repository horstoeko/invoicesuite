<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentDescription;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentStatusCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentType;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentTypeCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\LanguageID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\LocaleCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\VersionID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\XPath;

class DocumentReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var bool|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("CopyIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCopyIndicator", setter="setCopyIndicator")
     */
    private $copyIndicator;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID")
     * @JMS\Expose
     * @JMS\SerializedName("UUID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUUID", setter="setUUID")
     */
    private $uUID;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("IssueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueDate", setter="setIssueDate")
     */
    private $issueDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("IssueTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueTime", setter="setIssueTime")
     */
    private $issueTime;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentTypeCode", setter="setDocumentTypeCode")
     */
    private $documentTypeCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentType|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentType")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentType", setter="setDocumentType")
     */
    private $documentType;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\XPath>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\XPath>")
     * @JMS\Expose
     * @JMS\SerializedName("XPath")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="XPath", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getXPath", setter="setXPath")
     */
    private $xPath;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\LanguageID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\LanguageID")
     * @JMS\Expose
     * @JMS\SerializedName("LanguageID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLanguageID", setter="setLanguageID")
     */
    private $languageID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\LocaleCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\LocaleCode")
     * @JMS\Expose
     * @JMS\SerializedName("LocaleCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLocaleCode", setter="setLocaleCode")
     */
    private $localeCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\VersionID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\VersionID")
     * @JMS\Expose
     * @JMS\SerializedName("VersionID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getVersionID", setter="setVersionID")
     */
    private $versionID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentStatusCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentStatusCode")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentStatusCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentStatusCode", setter="setDocumentStatusCode")
     */
    private $documentStatusCode;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DocumentDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDocumentDescription", setter="setDocumentDescription")
     */
    private $documentDescription;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\Attachment|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\Attachment")
     * @JMS\Expose
     * @JMS\SerializedName("Attachment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAttachment", setter="setAttachment")
     */
    private $attachment;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("ValidityPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidityPeriod", setter="setValidityPeriod")
     */
    private $validityPeriod;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\IssuerParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\IssuerParty")
     * @JMS\Expose
     * @JMS\SerializedName("IssuerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssuerParty", setter="setIssuerParty")
     */
    private $issuerParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\ResultOfVerification|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\ResultOfVerification")
     * @JMS\Expose
     * @JMS\SerializedName("ResultOfVerification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getResultOfVerification", setter="setResultOfVerification")
     */
    private $resultOfVerification;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCopyIndicator(): ?bool
    {
        return $this->copyIndicator;
    }

    /**
     * @param bool|null $copyIndicator
     * @return self
     */
    public function setCopyIndicator(?bool $copyIndicator = null): self
    {
        $this->copyIndicator = $copyIndicator;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCopyIndicator(): self
    {
        $this->copyIndicator = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID|null
     */
    public function getUUID(): ?UUID
    {
        return $this->uUID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID
     */
    public function getUUIDWithCreate(): UUID
    {
        $this->uUID = is_null($this->uUID) ? new UUID() : $this->uUID;

        return $this->uUID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\UUID|null $uUID
     * @return self
     */
    public function setUUID(?UUID $uUID = null): self
    {
        $this->uUID = $uUID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUUID(): self
    {
        $this->uUID = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getIssueDate(): ?\DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * @param \DateTimeInterface|null $issueDate
     * @return self
     */
    public function setIssueDate(?\DateTimeInterface $issueDate = null): self
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetIssueDate(): self
    {
        $this->issueDate = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getIssueTime(): ?\DateTimeInterface
    {
        return $this->issueTime;
    }

    /**
     * @param \DateTimeInterface|null $issueTime
     * @return self
     */
    public function setIssueTime(?\DateTimeInterface $issueTime = null): self
    {
        $this->issueTime = $issueTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetIssueTime(): self
    {
        $this->issueTime = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentTypeCode|null
     */
    public function getDocumentTypeCode(): ?DocumentTypeCode
    {
        return $this->documentTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentTypeCode
     */
    public function getDocumentTypeCodeWithCreate(): DocumentTypeCode
    {
        $this->documentTypeCode = is_null($this->documentTypeCode) ? new DocumentTypeCode() : $this->documentTypeCode;

        return $this->documentTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentTypeCode|null $documentTypeCode
     * @return self
     */
    public function setDocumentTypeCode(?DocumentTypeCode $documentTypeCode = null): self
    {
        $this->documentTypeCode = $documentTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDocumentTypeCode(): self
    {
        $this->documentTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentType|null
     */
    public function getDocumentType(): ?DocumentType
    {
        return $this->documentType;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentType
     */
    public function getDocumentTypeWithCreate(): DocumentType
    {
        $this->documentType = is_null($this->documentType) ? new DocumentType() : $this->documentType;

        return $this->documentType;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentType|null $documentType
     * @return self
     */
    public function setDocumentType(?DocumentType $documentType = null): self
    {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDocumentType(): self
    {
        $this->documentType = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\XPath>|null
     */
    public function getXPath(): ?array
    {
        return $this->xPath;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\XPath>|null $xPath
     * @return self
     */
    public function setXPath(?array $xPath = null): self
    {
        $this->xPath = $xPath;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetXPath(): self
    {
        $this->xPath = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearXPath(): self
    {
        $this->xPath = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\XPath|null
     */
    public function firstXPath(): ?XPath
    {
        $xPath = $this->xPath ?? [];
        $xPath = reset($xPath);

        if ($xPath === false) {
            return null;
        }

        return $xPath;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\XPath|null
     */
    public function lastXPath(): ?XPath
    {
        $xPath = $this->xPath ?? [];
        $xPath = end($xPath);

        if ($xPath === false) {
            return null;
        }

        return $xPath;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\XPath $xPath
     * @return self
     */
    public function addToXPath(XPath $xPath): self
    {
        $this->xPath[] = $xPath;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\XPath
     */
    public function addToXPathWithCreate(): XPath
    {
        $this->addToxPath($xPath = new XPath());

        return $xPath;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\XPath $xPath
     * @return self
     */
    public function addOnceToXPath(XPath $xPath): self
    {
        if (!is_array($this->xPath)) {
            $this->xPath = [];
        }

        $this->xPath[0] = $xPath;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\XPath
     */
    public function addOnceToXPathWithCreate(): XPath
    {
        if (!is_array($this->xPath)) {
            $this->xPath = [];
        }

        if ($this->xPath === []) {
            $this->addOnceToxPath(new XPath());
        }

        return $this->xPath[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LanguageID|null
     */
    public function getLanguageID(): ?LanguageID
    {
        return $this->languageID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LanguageID
     */
    public function getLanguageIDWithCreate(): LanguageID
    {
        $this->languageID = is_null($this->languageID) ? new LanguageID() : $this->languageID;

        return $this->languageID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\LanguageID|null $languageID
     * @return self
     */
    public function setLanguageID(?LanguageID $languageID = null): self
    {
        $this->languageID = $languageID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLanguageID(): self
    {
        $this->languageID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LocaleCode|null
     */
    public function getLocaleCode(): ?LocaleCode
    {
        return $this->localeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LocaleCode
     */
    public function getLocaleCodeWithCreate(): LocaleCode
    {
        $this->localeCode = is_null($this->localeCode) ? new LocaleCode() : $this->localeCode;

        return $this->localeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\LocaleCode|null $localeCode
     * @return self
     */
    public function setLocaleCode(?LocaleCode $localeCode = null): self
    {
        $this->localeCode = $localeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLocaleCode(): self
    {
        $this->localeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\VersionID|null
     */
    public function getVersionID(): ?VersionID
    {
        return $this->versionID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\VersionID
     */
    public function getVersionIDWithCreate(): VersionID
    {
        $this->versionID = is_null($this->versionID) ? new VersionID() : $this->versionID;

        return $this->versionID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\VersionID|null $versionID
     * @return self
     */
    public function setVersionID(?VersionID $versionID = null): self
    {
        $this->versionID = $versionID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetVersionID(): self
    {
        $this->versionID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentStatusCode|null
     */
    public function getDocumentStatusCode(): ?DocumentStatusCode
    {
        return $this->documentStatusCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentStatusCode
     */
    public function getDocumentStatusCodeWithCreate(): DocumentStatusCode
    {
        $this->documentStatusCode = is_null($this->documentStatusCode) ? new DocumentStatusCode() : $this->documentStatusCode;

        return $this->documentStatusCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentStatusCode|null $documentStatusCode
     * @return self
     */
    public function setDocumentStatusCode(?DocumentStatusCode $documentStatusCode = null): self
    {
        $this->documentStatusCode = $documentStatusCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDocumentStatusCode(): self
    {
        $this->documentStatusCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentDescription>|null
     */
    public function getDocumentDescription(): ?array
    {
        return $this->documentDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentDescription>|null $documentDescription
     * @return self
     */
    public function setDocumentDescription(?array $documentDescription = null): self
    {
        $this->documentDescription = $documentDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDocumentDescription(): self
    {
        $this->documentDescription = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDocumentDescription(): self
    {
        $this->documentDescription = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentDescription|null
     */
    public function firstDocumentDescription(): ?DocumentDescription
    {
        $documentDescription = $this->documentDescription ?? [];
        $documentDescription = reset($documentDescription);

        if ($documentDescription === false) {
            return null;
        }

        return $documentDescription;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentDescription|null
     */
    public function lastDocumentDescription(): ?DocumentDescription
    {
        $documentDescription = $this->documentDescription ?? [];
        $documentDescription = end($documentDescription);

        if ($documentDescription === false) {
            return null;
        }

        return $documentDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentDescription $documentDescription
     * @return self
     */
    public function addToDocumentDescription(DocumentDescription $documentDescription): self
    {
        $this->documentDescription[] = $documentDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentDescription
     */
    public function addToDocumentDescriptionWithCreate(): DocumentDescription
    {
        $this->addTodocumentDescription($documentDescription = new DocumentDescription());

        return $documentDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentDescription $documentDescription
     * @return self
     */
    public function addOnceToDocumentDescription(DocumentDescription $documentDescription): self
    {
        if (!is_array($this->documentDescription)) {
            $this->documentDescription = [];
        }

        $this->documentDescription[0] = $documentDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DocumentDescription
     */
    public function addOnceToDocumentDescriptionWithCreate(): DocumentDescription
    {
        if (!is_array($this->documentDescription)) {
            $this->documentDescription = [];
        }

        if ($this->documentDescription === []) {
            $this->addOnceTodocumentDescription(new DocumentDescription());
        }

        return $this->documentDescription[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Attachment|null
     */
    public function getAttachment(): ?Attachment
    {
        return $this->attachment;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Attachment
     */
    public function getAttachmentWithCreate(): Attachment
    {
        $this->attachment = is_null($this->attachment) ? new Attachment() : $this->attachment;

        return $this->attachment;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Attachment|null $attachment
     * @return self
     */
    public function setAttachment(?Attachment $attachment = null): self
    {
        $this->attachment = $attachment;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAttachment(): self
    {
        $this->attachment = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod|null
     */
    public function getValidityPeriod(): ?ValidityPeriod
    {
        return $this->validityPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod
     */
    public function getValidityPeriodWithCreate(): ValidityPeriod
    {
        $this->validityPeriod = is_null($this->validityPeriod) ? new ValidityPeriod() : $this->validityPeriod;

        return $this->validityPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ValidityPeriod|null $validityPeriod
     * @return self
     */
    public function setValidityPeriod(?ValidityPeriod $validityPeriod = null): self
    {
        $this->validityPeriod = $validityPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetValidityPeriod(): self
    {
        $this->validityPeriod = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\IssuerParty|null
     */
    public function getIssuerParty(): ?IssuerParty
    {
        return $this->issuerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\IssuerParty
     */
    public function getIssuerPartyWithCreate(): IssuerParty
    {
        $this->issuerParty = is_null($this->issuerParty) ? new IssuerParty() : $this->issuerParty;

        return $this->issuerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\IssuerParty|null $issuerParty
     * @return self
     */
    public function setIssuerParty(?IssuerParty $issuerParty = null): self
    {
        $this->issuerParty = $issuerParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetIssuerParty(): self
    {
        $this->issuerParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ResultOfVerification|null
     */
    public function getResultOfVerification(): ?ResultOfVerification
    {
        return $this->resultOfVerification;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ResultOfVerification
     */
    public function getResultOfVerificationWithCreate(): ResultOfVerification
    {
        $this->resultOfVerification = is_null($this->resultOfVerification) ? new ResultOfVerification() : $this->resultOfVerification;

        return $this->resultOfVerification;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ResultOfVerification|null $resultOfVerification
     * @return self
     */
    public function setResultOfVerification(?ResultOfVerification $resultOfVerification = null): self
    {
        $this->resultOfVerification = $resultOfVerification;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetResultOfVerification(): self
    {
        $this->resultOfVerification = null;

        return $this;
    }
}
