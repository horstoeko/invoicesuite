<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ApplicationStatusCode;
use horstoeko\invoicesuite\models\ubl\cbc\CertificateType;
use horstoeko\invoicesuite\models\ubl\cbc\OriginalJobID;
use horstoeko\invoicesuite\models\ubl\cbc\PreviousJobID;
use horstoeko\invoicesuite\models\ubl\cbc\ReferenceID;
use horstoeko\invoicesuite\models\ubl\cbc\Remarks;

class CertificateOfOriginApplicationType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ReferenceID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ReferenceID")
     * @JMS\Expose
     * @JMS\SerializedName("ReferenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReferenceID", setter="setReferenceID")
     */
    private $referenceID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CertificateType|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CertificateType")
     * @JMS\Expose
     * @JMS\SerializedName("CertificateType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCertificateType", setter="setCertificateType")
     */
    private $certificateType;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ApplicationStatusCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ApplicationStatusCode")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicationStatusCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getApplicationStatusCode", setter="setApplicationStatusCode")
     */
    private $applicationStatusCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\OriginalJobID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\OriginalJobID")
     * @JMS\Expose
     * @JMS\SerializedName("OriginalJobID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOriginalJobID", setter="setOriginalJobID")
     */
    private $originalJobID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PreviousJobID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PreviousJobID")
     * @JMS\Expose
     * @JMS\SerializedName("PreviousJobID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreviousJobID", setter="setPreviousJobID")
     */
    private $previousJobID;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Remarks>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Remarks>")
     * @JMS\Expose
     * @JMS\SerializedName("Remarks")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Remarks", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getRemarks", setter="setRemarks")
     */
    private $remarks;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Shipment|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Shipment")
     * @JMS\Expose
     * @JMS\SerializedName("Shipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getShipment", setter="setShipment")
     */
    private $shipment;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\EndorserParty>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\EndorserParty>")
     * @JMS\Expose
     * @JMS\SerializedName("EndorserParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EndorserParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEndorserParty", setter="setEndorserParty")
     */
    private $endorserParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\PreparationParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\PreparationParty")
     * @JMS\Expose
     * @JMS\SerializedName("PreparationParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreparationParty", setter="setPreparationParty")
     */
    private $preparationParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\IssuerParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\IssuerParty")
     * @JMS\Expose
     * @JMS\SerializedName("IssuerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssuerParty", setter="setIssuerParty")
     */
    private $issuerParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ExporterParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ExporterParty")
     * @JMS\Expose
     * @JMS\SerializedName("ExporterParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExporterParty", setter="setExporterParty")
     */
    private $exporterParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ImporterParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ImporterParty")
     * @JMS\Expose
     * @JMS\SerializedName("ImporterParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getImporterParty", setter="setImporterParty")
     */
    private $importerParty;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\IssuingCountry|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\IssuingCountry")
     * @JMS\Expose
     * @JMS\SerializedName("IssuingCountry")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssuingCountry", setter="setIssuingCountry")
     */
    private $issuingCountry;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\DocumentDistribution>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\DocumentDistribution>")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentDistribution")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DocumentDistribution", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDocumentDistribution", setter="setDocumentDistribution")
     */
    private $documentDistribution;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\SupportingDocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\SupportingDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("SupportingDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SupportingDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSupportingDocumentReference", setter="setSupportingDocumentReference")
     */
    private $supportingDocumentReference;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\Signature>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\Signature>")
     * @JMS\Expose
     * @JMS\SerializedName("Signature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Signature", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSignature", setter="setSignature")
     */
    private $signature;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ReferenceID|null
     */
    public function getReferenceID(): ?ReferenceID
    {
        return $this->referenceID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ReferenceID
     */
    public function getReferenceIDWithCreate(): ReferenceID
    {
        $this->referenceID = is_null($this->referenceID) ? new ReferenceID() : $this->referenceID;

        return $this->referenceID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ReferenceID|null $referenceID
     * @return self
     */
    public function setReferenceID(?ReferenceID $referenceID = null): self
    {
        $this->referenceID = $referenceID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CertificateType|null
     */
    public function getCertificateType(): ?CertificateType
    {
        return $this->certificateType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CertificateType
     */
    public function getCertificateTypeWithCreate(): CertificateType
    {
        $this->certificateType = is_null($this->certificateType) ? new CertificateType() : $this->certificateType;

        return $this->certificateType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CertificateType|null $certificateType
     * @return self
     */
    public function setCertificateType(?CertificateType $certificateType = null): self
    {
        $this->certificateType = $certificateType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ApplicationStatusCode|null
     */
    public function getApplicationStatusCode(): ?ApplicationStatusCode
    {
        return $this->applicationStatusCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ApplicationStatusCode
     */
    public function getApplicationStatusCodeWithCreate(): ApplicationStatusCode
    {
        $this->applicationStatusCode = is_null($this->applicationStatusCode) ? new ApplicationStatusCode() : $this->applicationStatusCode;

        return $this->applicationStatusCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ApplicationStatusCode|null $applicationStatusCode
     * @return self
     */
    public function setApplicationStatusCode(?ApplicationStatusCode $applicationStatusCode = null): self
    {
        $this->applicationStatusCode = $applicationStatusCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OriginalJobID|null
     */
    public function getOriginalJobID(): ?OriginalJobID
    {
        return $this->originalJobID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\OriginalJobID
     */
    public function getOriginalJobIDWithCreate(): OriginalJobID
    {
        $this->originalJobID = is_null($this->originalJobID) ? new OriginalJobID() : $this->originalJobID;

        return $this->originalJobID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\OriginalJobID|null $originalJobID
     * @return self
     */
    public function setOriginalJobID(?OriginalJobID $originalJobID = null): self
    {
        $this->originalJobID = $originalJobID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PreviousJobID|null
     */
    public function getPreviousJobID(): ?PreviousJobID
    {
        return $this->previousJobID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PreviousJobID
     */
    public function getPreviousJobIDWithCreate(): PreviousJobID
    {
        $this->previousJobID = is_null($this->previousJobID) ? new PreviousJobID() : $this->previousJobID;

        return $this->previousJobID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PreviousJobID|null $previousJobID
     * @return self
     */
    public function setPreviousJobID(?PreviousJobID $previousJobID = null): self
    {
        $this->previousJobID = $previousJobID;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Remarks>|null
     */
    public function getRemarks(): ?array
    {
        return $this->remarks;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Remarks>|null $remarks
     * @return self
     */
    public function setRemarks(?array $remarks = null): self
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * @return self
     */
    public function clearRemarks(): self
    {
        $this->remarks = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Remarks $remarks
     * @return self
     */
    public function addToRemarks(Remarks $remarks): self
    {
        $this->remarks[] = $remarks;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Remarks
     */
    public function addToRemarksWithCreate(): Remarks
    {
        $this->addToremarks($remarks = new Remarks());

        return $remarks;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Remarks $remarks
     * @return self
     */
    public function addOnceToRemarks(Remarks $remarks): self
    {
        if (!is_array($this->remarks)) {
            $this->remarks = [];
        }

        $this->remarks[0] = $remarks;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Remarks
     */
    public function addOnceToRemarksWithCreate(): Remarks
    {
        if (!is_array($this->remarks)) {
            $this->remarks = [];
        }

        if ($this->remarks === []) {
            $this->addOnceToremarks(new Remarks());
        }

        return $this->remarks[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Shipment|null
     */
    public function getShipment(): ?Shipment
    {
        return $this->shipment;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Shipment
     */
    public function getShipmentWithCreate(): Shipment
    {
        $this->shipment = is_null($this->shipment) ? new Shipment() : $this->shipment;

        return $this->shipment;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Shipment|null $shipment
     * @return self
     */
    public function setShipment(?Shipment $shipment = null): self
    {
        $this->shipment = $shipment;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\EndorserParty>|null
     */
    public function getEndorserParty(): ?array
    {
        return $this->endorserParty;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\EndorserParty>|null $endorserParty
     * @return self
     */
    public function setEndorserParty(?array $endorserParty = null): self
    {
        $this->endorserParty = $endorserParty;

        return $this;
    }

    /**
     * @return self
     */
    public function clearEndorserParty(): self
    {
        $this->endorserParty = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EndorserParty $endorserParty
     * @return self
     */
    public function addToEndorserParty(EndorserParty $endorserParty): self
    {
        $this->endorserParty[] = $endorserParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EndorserParty
     */
    public function addToEndorserPartyWithCreate(): EndorserParty
    {
        $this->addToendorserParty($endorserParty = new EndorserParty());

        return $endorserParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\EndorserParty $endorserParty
     * @return self
     */
    public function addOnceToEndorserParty(EndorserParty $endorserParty): self
    {
        if (!is_array($this->endorserParty)) {
            $this->endorserParty = [];
        }

        $this->endorserParty[0] = $endorserParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\EndorserParty
     */
    public function addOnceToEndorserPartyWithCreate(): EndorserParty
    {
        if (!is_array($this->endorserParty)) {
            $this->endorserParty = [];
        }

        if ($this->endorserParty === []) {
            $this->addOnceToendorserParty(new EndorserParty());
        }

        return $this->endorserParty[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PreparationParty|null
     */
    public function getPreparationParty(): ?PreparationParty
    {
        return $this->preparationParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\PreparationParty
     */
    public function getPreparationPartyWithCreate(): PreparationParty
    {
        $this->preparationParty = is_null($this->preparationParty) ? new PreparationParty() : $this->preparationParty;

        return $this->preparationParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\PreparationParty|null $preparationParty
     * @return self
     */
    public function setPreparationParty(?PreparationParty $preparationParty = null): self
    {
        $this->preparationParty = $preparationParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\IssuerParty|null
     */
    public function getIssuerParty(): ?IssuerParty
    {
        return $this->issuerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\IssuerParty
     */
    public function getIssuerPartyWithCreate(): IssuerParty
    {
        $this->issuerParty = is_null($this->issuerParty) ? new IssuerParty() : $this->issuerParty;

        return $this->issuerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\IssuerParty|null $issuerParty
     * @return self
     */
    public function setIssuerParty(?IssuerParty $issuerParty = null): self
    {
        $this->issuerParty = $issuerParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ExporterParty|null
     */
    public function getExporterParty(): ?ExporterParty
    {
        return $this->exporterParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ExporterParty
     */
    public function getExporterPartyWithCreate(): ExporterParty
    {
        $this->exporterParty = is_null($this->exporterParty) ? new ExporterParty() : $this->exporterParty;

        return $this->exporterParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ExporterParty|null $exporterParty
     * @return self
     */
    public function setExporterParty(?ExporterParty $exporterParty = null): self
    {
        $this->exporterParty = $exporterParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ImporterParty|null
     */
    public function getImporterParty(): ?ImporterParty
    {
        return $this->importerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ImporterParty
     */
    public function getImporterPartyWithCreate(): ImporterParty
    {
        $this->importerParty = is_null($this->importerParty) ? new ImporterParty() : $this->importerParty;

        return $this->importerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ImporterParty|null $importerParty
     * @return self
     */
    public function setImporterParty(?ImporterParty $importerParty = null): self
    {
        $this->importerParty = $importerParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\IssuingCountry|null
     */
    public function getIssuingCountry(): ?IssuingCountry
    {
        return $this->issuingCountry;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\IssuingCountry
     */
    public function getIssuingCountryWithCreate(): IssuingCountry
    {
        $this->issuingCountry = is_null($this->issuingCountry) ? new IssuingCountry() : $this->issuingCountry;

        return $this->issuingCountry;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\IssuingCountry|null $issuingCountry
     * @return self
     */
    public function setIssuingCountry(?IssuingCountry $issuingCountry = null): self
    {
        $this->issuingCountry = $issuingCountry;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\DocumentDistribution>|null
     */
    public function getDocumentDistribution(): ?array
    {
        return $this->documentDistribution;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\DocumentDistribution>|null $documentDistribution
     * @return self
     */
    public function setDocumentDistribution(?array $documentDistribution = null): self
    {
        $this->documentDistribution = $documentDistribution;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDocumentDistribution(): self
    {
        $this->documentDistribution = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DocumentDistribution $documentDistribution
     * @return self
     */
    public function addToDocumentDistribution(DocumentDistribution $documentDistribution): self
    {
        $this->documentDistribution[] = $documentDistribution;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DocumentDistribution
     */
    public function addToDocumentDistributionWithCreate(): DocumentDistribution
    {
        $this->addTodocumentDistribution($documentDistribution = new DocumentDistribution());

        return $documentDistribution;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DocumentDistribution $documentDistribution
     * @return self
     */
    public function addOnceToDocumentDistribution(DocumentDistribution $documentDistribution): self
    {
        if (!is_array($this->documentDistribution)) {
            $this->documentDistribution = [];
        }

        $this->documentDistribution[0] = $documentDistribution;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DocumentDistribution
     */
    public function addOnceToDocumentDistributionWithCreate(): DocumentDistribution
    {
        if (!is_array($this->documentDistribution)) {
            $this->documentDistribution = [];
        }

        if ($this->documentDistribution === []) {
            $this->addOnceTodocumentDistribution(new DocumentDistribution());
        }

        return $this->documentDistribution[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\SupportingDocumentReference>|null
     */
    public function getSupportingDocumentReference(): ?array
    {
        return $this->supportingDocumentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\SupportingDocumentReference>|null $supportingDocumentReference
     * @return self
     */
    public function setSupportingDocumentReference(?array $supportingDocumentReference = null): self
    {
        $this->supportingDocumentReference = $supportingDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSupportingDocumentReference(): self
    {
        $this->supportingDocumentReference = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SupportingDocumentReference $supportingDocumentReference
     * @return self
     */
    public function addToSupportingDocumentReference(SupportingDocumentReference $supportingDocumentReference): self
    {
        $this->supportingDocumentReference[] = $supportingDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SupportingDocumentReference
     */
    public function addToSupportingDocumentReferenceWithCreate(): SupportingDocumentReference
    {
        $this->addTosupportingDocumentReference($supportingDocumentReference = new SupportingDocumentReference());

        return $supportingDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SupportingDocumentReference $supportingDocumentReference
     * @return self
     */
    public function addOnceToSupportingDocumentReference(
        SupportingDocumentReference $supportingDocumentReference,
    ): self {
        if (!is_array($this->supportingDocumentReference)) {
            $this->supportingDocumentReference = [];
        }

        $this->supportingDocumentReference[0] = $supportingDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SupportingDocumentReference
     */
    public function addOnceToSupportingDocumentReferenceWithCreate(): SupportingDocumentReference
    {
        if (!is_array($this->supportingDocumentReference)) {
            $this->supportingDocumentReference = [];
        }

        if ($this->supportingDocumentReference === []) {
            $this->addOnceTosupportingDocumentReference(new SupportingDocumentReference());
        }

        return $this->supportingDocumentReference[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\Signature>|null
     */
    public function getSignature(): ?array
    {
        return $this->signature;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\Signature>|null $signature
     * @return self
     */
    public function setSignature(?array $signature = null): self
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * @return self
     */
    public function clearSignature(): self
    {
        $this->signature = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Signature $signature
     * @return self
     */
    public function addToSignature(Signature $signature): self
    {
        $this->signature[] = $signature;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Signature
     */
    public function addToSignatureWithCreate(): Signature
    {
        $this->addTosignature($signature = new Signature());

        return $signature;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Signature $signature
     * @return self
     */
    public function addOnceToSignature(Signature $signature): self
    {
        if (!is_array($this->signature)) {
            $this->signature = [];
        }

        $this->signature[0] = $signature;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Signature
     */
    public function addOnceToSignatureWithCreate(): Signature
    {
        if (!is_array($this->signature)) {
            $this->signature = [];
        }

        if ($this->signature === []) {
            $this->addOnceTosignature(new Signature());
        }

        return $this->signature[0];
    }
}
