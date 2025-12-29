<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ApplicationStatusCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CertificateType;
use horstoeko\invoicesuite\documents\models\peppol\cbc\OriginalJobID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PreviousJobID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ReferenceID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Remarks;
use JMS\Serializer\Annotation as JMS;

class CertificateOfOriginApplicationType
{
    use HandlesObjectFlags;

    /**
     * @var null|ReferenceID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ReferenceID")
     * @JMS\Expose
     * @JMS\SerializedName("ReferenceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReferenceID", setter="setReferenceID")
     */
    private $referenceID;

    /**
     * @var null|CertificateType
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CertificateType")
     * @JMS\Expose
     * @JMS\SerializedName("CertificateType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCertificateType", setter="setCertificateType")
     */
    private $certificateType;

    /**
     * @var null|ApplicationStatusCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ApplicationStatusCode")
     * @JMS\Expose
     * @JMS\SerializedName("ApplicationStatusCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getApplicationStatusCode", setter="setApplicationStatusCode")
     */
    private $applicationStatusCode;

    /**
     * @var null|OriginalJobID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\OriginalJobID")
     * @JMS\Expose
     * @JMS\SerializedName("OriginalJobID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOriginalJobID", setter="setOriginalJobID")
     */
    private $originalJobID;

    /**
     * @var null|PreviousJobID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PreviousJobID")
     * @JMS\Expose
     * @JMS\SerializedName("PreviousJobID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreviousJobID", setter="setPreviousJobID")
     */
    private $previousJobID;

    /**
     * @var null|array<Remarks>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Remarks>")
     * @JMS\Expose
     * @JMS\SerializedName("Remarks")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Remarks", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getRemarks", setter="setRemarks")
     */
    private $remarks;

    /**
     * @var null|Shipment
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Shipment")
     * @JMS\Expose
     * @JMS\SerializedName("Shipment")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getShipment", setter="setShipment")
     */
    private $shipment;

    /**
     * @var null|array<EndorserParty>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\EndorserParty>")
     * @JMS\Expose
     * @JMS\SerializedName("EndorserParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EndorserParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEndorserParty", setter="setEndorserParty")
     */
    private $endorserParty;

    /**
     * @var null|PreparationParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\PreparationParty")
     * @JMS\Expose
     * @JMS\SerializedName("PreparationParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreparationParty", setter="setPreparationParty")
     */
    private $preparationParty;

    /**
     * @var null|IssuerParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\IssuerParty")
     * @JMS\Expose
     * @JMS\SerializedName("IssuerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssuerParty", setter="setIssuerParty")
     */
    private $issuerParty;

    /**
     * @var null|ExporterParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ExporterParty")
     * @JMS\Expose
     * @JMS\SerializedName("ExporterParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExporterParty", setter="setExporterParty")
     */
    private $exporterParty;

    /**
     * @var null|ImporterParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ImporterParty")
     * @JMS\Expose
     * @JMS\SerializedName("ImporterParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getImporterParty", setter="setImporterParty")
     */
    private $importerParty;

    /**
     * @var null|IssuingCountry
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\IssuingCountry")
     * @JMS\Expose
     * @JMS\SerializedName("IssuingCountry")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssuingCountry", setter="setIssuingCountry")
     */
    private $issuingCountry;

    /**
     * @var null|array<DocumentDistribution>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\DocumentDistribution>")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentDistribution")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DocumentDistribution", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDocumentDistribution", setter="setDocumentDistribution")
     */
    private $documentDistribution;

    /**
     * @var null|array<SupportingDocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\SupportingDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("SupportingDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SupportingDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSupportingDocumentReference", setter="setSupportingDocumentReference")
     */
    private $supportingDocumentReference;

    /**
     * @var null|array<Signature>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\Signature>")
     * @JMS\Expose
     * @JMS\SerializedName("Signature")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Signature", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSignature", setter="setSignature")
     */
    private $signature;

    /**
     * @return null|ReferenceID
     */
    public function getReferenceID(): ?ReferenceID
    {
        return $this->referenceID;
    }

    /**
     * @return ReferenceID
     */
    public function getReferenceIDWithCreate(): ReferenceID
    {
        $this->referenceID = is_null($this->referenceID) ? new ReferenceID() : $this->referenceID;

        return $this->referenceID;
    }

    /**
     * @param  null|ReferenceID $referenceID
     * @return static
     */
    public function setReferenceID(?ReferenceID $referenceID = null): static
    {
        $this->referenceID = $referenceID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReferenceID(): static
    {
        $this->referenceID = null;

        return $this;
    }

    /**
     * @return null|CertificateType
     */
    public function getCertificateType(): ?CertificateType
    {
        return $this->certificateType;
    }

    /**
     * @return CertificateType
     */
    public function getCertificateTypeWithCreate(): CertificateType
    {
        $this->certificateType = is_null($this->certificateType) ? new CertificateType() : $this->certificateType;

        return $this->certificateType;
    }

    /**
     * @param  null|CertificateType $certificateType
     * @return static
     */
    public function setCertificateType(?CertificateType $certificateType = null): static
    {
        $this->certificateType = $certificateType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCertificateType(): static
    {
        $this->certificateType = null;

        return $this;
    }

    /**
     * @return null|ApplicationStatusCode
     */
    public function getApplicationStatusCode(): ?ApplicationStatusCode
    {
        return $this->applicationStatusCode;
    }

    /**
     * @return ApplicationStatusCode
     */
    public function getApplicationStatusCodeWithCreate(): ApplicationStatusCode
    {
        $this->applicationStatusCode = is_null($this->applicationStatusCode) ? new ApplicationStatusCode() : $this->applicationStatusCode;

        return $this->applicationStatusCode;
    }

    /**
     * @param  null|ApplicationStatusCode $applicationStatusCode
     * @return static
     */
    public function setApplicationStatusCode(?ApplicationStatusCode $applicationStatusCode = null): static
    {
        $this->applicationStatusCode = $applicationStatusCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetApplicationStatusCode(): static
    {
        $this->applicationStatusCode = null;

        return $this;
    }

    /**
     * @return null|OriginalJobID
     */
    public function getOriginalJobID(): ?OriginalJobID
    {
        return $this->originalJobID;
    }

    /**
     * @return OriginalJobID
     */
    public function getOriginalJobIDWithCreate(): OriginalJobID
    {
        $this->originalJobID = is_null($this->originalJobID) ? new OriginalJobID() : $this->originalJobID;

        return $this->originalJobID;
    }

    /**
     * @param  null|OriginalJobID $originalJobID
     * @return static
     */
    public function setOriginalJobID(?OriginalJobID $originalJobID = null): static
    {
        $this->originalJobID = $originalJobID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOriginalJobID(): static
    {
        $this->originalJobID = null;

        return $this;
    }

    /**
     * @return null|PreviousJobID
     */
    public function getPreviousJobID(): ?PreviousJobID
    {
        return $this->previousJobID;
    }

    /**
     * @return PreviousJobID
     */
    public function getPreviousJobIDWithCreate(): PreviousJobID
    {
        $this->previousJobID = is_null($this->previousJobID) ? new PreviousJobID() : $this->previousJobID;

        return $this->previousJobID;
    }

    /**
     * @param  null|PreviousJobID $previousJobID
     * @return static
     */
    public function setPreviousJobID(?PreviousJobID $previousJobID = null): static
    {
        $this->previousJobID = $previousJobID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPreviousJobID(): static
    {
        $this->previousJobID = null;

        return $this;
    }

    /**
     * @return null|array<Remarks>
     */
    public function getRemarks(): ?array
    {
        return $this->remarks;
    }

    /**
     * @param  null|array<Remarks> $remarks
     * @return static
     */
    public function setRemarks(?array $remarks = null): static
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRemarks(): static
    {
        $this->remarks = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRemarks(): static
    {
        $this->remarks = [];

        return $this;
    }

    /**
     * @return null|Remarks
     */
    public function firstRemarks(): ?Remarks
    {
        $remarks = $this->remarks ?? [];
        $remarks = reset($remarks);

        if (false === $remarks) {
            return null;
        }

        return $remarks;
    }

    /**
     * @return null|Remarks
     */
    public function lastRemarks(): ?Remarks
    {
        $remarks = $this->remarks ?? [];
        $remarks = end($remarks);

        if (false === $remarks) {
            return null;
        }

        return $remarks;
    }

    /**
     * @param  Remarks $remarks
     * @return static
     */
    public function addToRemarks(Remarks $remarks): static
    {
        $this->remarks[] = $remarks;

        return $this;
    }

    /**
     * @return Remarks
     */
    public function addToRemarksWithCreate(): Remarks
    {
        $this->addToremarks($remarks = new Remarks());

        return $remarks;
    }

    /**
     * @param  Remarks $remarks
     * @return static
     */
    public function addOnceToRemarks(Remarks $remarks): static
    {
        if (!is_array($this->remarks)) {
            $this->remarks = [];
        }

        $this->remarks[0] = $remarks;

        return $this;
    }

    /**
     * @return Remarks
     */
    public function addOnceToRemarksWithCreate(): Remarks
    {
        if (!is_array($this->remarks)) {
            $this->remarks = [];
        }

        if ([] === $this->remarks) {
            $this->addOnceToremarks(new Remarks());
        }

        return $this->remarks[0];
    }

    /**
     * @return null|Shipment
     */
    public function getShipment(): ?Shipment
    {
        return $this->shipment;
    }

    /**
     * @return Shipment
     */
    public function getShipmentWithCreate(): Shipment
    {
        $this->shipment = is_null($this->shipment) ? new Shipment() : $this->shipment;

        return $this->shipment;
    }

    /**
     * @param  null|Shipment $shipment
     * @return static
     */
    public function setShipment(?Shipment $shipment = null): static
    {
        $this->shipment = $shipment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetShipment(): static
    {
        $this->shipment = null;

        return $this;
    }

    /**
     * @return null|array<EndorserParty>
     */
    public function getEndorserParty(): ?array
    {
        return $this->endorserParty;
    }

    /**
     * @param  null|array<EndorserParty> $endorserParty
     * @return static
     */
    public function setEndorserParty(?array $endorserParty = null): static
    {
        $this->endorserParty = $endorserParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEndorserParty(): static
    {
        $this->endorserParty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearEndorserParty(): static
    {
        $this->endorserParty = [];

        return $this;
    }

    /**
     * @return null|EndorserParty
     */
    public function firstEndorserParty(): ?EndorserParty
    {
        $endorserParty = $this->endorserParty ?? [];
        $endorserParty = reset($endorserParty);

        if (false === $endorserParty) {
            return null;
        }

        return $endorserParty;
    }

    /**
     * @return null|EndorserParty
     */
    public function lastEndorserParty(): ?EndorserParty
    {
        $endorserParty = $this->endorserParty ?? [];
        $endorserParty = end($endorserParty);

        if (false === $endorserParty) {
            return null;
        }

        return $endorserParty;
    }

    /**
     * @param  EndorserParty $endorserParty
     * @return static
     */
    public function addToEndorserParty(EndorserParty $endorserParty): static
    {
        $this->endorserParty[] = $endorserParty;

        return $this;
    }

    /**
     * @return EndorserParty
     */
    public function addToEndorserPartyWithCreate(): EndorserParty
    {
        $this->addToendorserParty($endorserParty = new EndorserParty());

        return $endorserParty;
    }

    /**
     * @param  EndorserParty $endorserParty
     * @return static
     */
    public function addOnceToEndorserParty(EndorserParty $endorserParty): static
    {
        if (!is_array($this->endorserParty)) {
            $this->endorserParty = [];
        }

        $this->endorserParty[0] = $endorserParty;

        return $this;
    }

    /**
     * @return EndorserParty
     */
    public function addOnceToEndorserPartyWithCreate(): EndorserParty
    {
        if (!is_array($this->endorserParty)) {
            $this->endorserParty = [];
        }

        if ([] === $this->endorserParty) {
            $this->addOnceToendorserParty(new EndorserParty());
        }

        return $this->endorserParty[0];
    }

    /**
     * @return null|PreparationParty
     */
    public function getPreparationParty(): ?PreparationParty
    {
        return $this->preparationParty;
    }

    /**
     * @return PreparationParty
     */
    public function getPreparationPartyWithCreate(): PreparationParty
    {
        $this->preparationParty = is_null($this->preparationParty) ? new PreparationParty() : $this->preparationParty;

        return $this->preparationParty;
    }

    /**
     * @param  null|PreparationParty $preparationParty
     * @return static
     */
    public function setPreparationParty(?PreparationParty $preparationParty = null): static
    {
        $this->preparationParty = $preparationParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPreparationParty(): static
    {
        $this->preparationParty = null;

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
     * @return null|ExporterParty
     */
    public function getExporterParty(): ?ExporterParty
    {
        return $this->exporterParty;
    }

    /**
     * @return ExporterParty
     */
    public function getExporterPartyWithCreate(): ExporterParty
    {
        $this->exporterParty = is_null($this->exporterParty) ? new ExporterParty() : $this->exporterParty;

        return $this->exporterParty;
    }

    /**
     * @param  null|ExporterParty $exporterParty
     * @return static
     */
    public function setExporterParty(?ExporterParty $exporterParty = null): static
    {
        $this->exporterParty = $exporterParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExporterParty(): static
    {
        $this->exporterParty = null;

        return $this;
    }

    /**
     * @return null|ImporterParty
     */
    public function getImporterParty(): ?ImporterParty
    {
        return $this->importerParty;
    }

    /**
     * @return ImporterParty
     */
    public function getImporterPartyWithCreate(): ImporterParty
    {
        $this->importerParty = is_null($this->importerParty) ? new ImporterParty() : $this->importerParty;

        return $this->importerParty;
    }

    /**
     * @param  null|ImporterParty $importerParty
     * @return static
     */
    public function setImporterParty(?ImporterParty $importerParty = null): static
    {
        $this->importerParty = $importerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetImporterParty(): static
    {
        $this->importerParty = null;

        return $this;
    }

    /**
     * @return null|IssuingCountry
     */
    public function getIssuingCountry(): ?IssuingCountry
    {
        return $this->issuingCountry;
    }

    /**
     * @return IssuingCountry
     */
    public function getIssuingCountryWithCreate(): IssuingCountry
    {
        $this->issuingCountry = is_null($this->issuingCountry) ? new IssuingCountry() : $this->issuingCountry;

        return $this->issuingCountry;
    }

    /**
     * @param  null|IssuingCountry $issuingCountry
     * @return static
     */
    public function setIssuingCountry(?IssuingCountry $issuingCountry = null): static
    {
        $this->issuingCountry = $issuingCountry;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssuingCountry(): static
    {
        $this->issuingCountry = null;

        return $this;
    }

    /**
     * @return null|array<DocumentDistribution>
     */
    public function getDocumentDistribution(): ?array
    {
        return $this->documentDistribution;
    }

    /**
     * @param  null|array<DocumentDistribution> $documentDistribution
     * @return static
     */
    public function setDocumentDistribution(?array $documentDistribution = null): static
    {
        $this->documentDistribution = $documentDistribution;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentDistribution(): static
    {
        $this->documentDistribution = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDocumentDistribution(): static
    {
        $this->documentDistribution = [];

        return $this;
    }

    /**
     * @return null|DocumentDistribution
     */
    public function firstDocumentDistribution(): ?DocumentDistribution
    {
        $documentDistribution = $this->documentDistribution ?? [];
        $documentDistribution = reset($documentDistribution);

        if (false === $documentDistribution) {
            return null;
        }

        return $documentDistribution;
    }

    /**
     * @return null|DocumentDistribution
     */
    public function lastDocumentDistribution(): ?DocumentDistribution
    {
        $documentDistribution = $this->documentDistribution ?? [];
        $documentDistribution = end($documentDistribution);

        if (false === $documentDistribution) {
            return null;
        }

        return $documentDistribution;
    }

    /**
     * @param  DocumentDistribution $documentDistribution
     * @return static
     */
    public function addToDocumentDistribution(DocumentDistribution $documentDistribution): static
    {
        $this->documentDistribution[] = $documentDistribution;

        return $this;
    }

    /**
     * @return DocumentDistribution
     */
    public function addToDocumentDistributionWithCreate(): DocumentDistribution
    {
        $this->addTodocumentDistribution($documentDistribution = new DocumentDistribution());

        return $documentDistribution;
    }

    /**
     * @param  DocumentDistribution $documentDistribution
     * @return static
     */
    public function addOnceToDocumentDistribution(DocumentDistribution $documentDistribution): static
    {
        if (!is_array($this->documentDistribution)) {
            $this->documentDistribution = [];
        }

        $this->documentDistribution[0] = $documentDistribution;

        return $this;
    }

    /**
     * @return DocumentDistribution
     */
    public function addOnceToDocumentDistributionWithCreate(): DocumentDistribution
    {
        if (!is_array($this->documentDistribution)) {
            $this->documentDistribution = [];
        }

        if ([] === $this->documentDistribution) {
            $this->addOnceTodocumentDistribution(new DocumentDistribution());
        }

        return $this->documentDistribution[0];
    }

    /**
     * @return null|array<SupportingDocumentReference>
     */
    public function getSupportingDocumentReference(): ?array
    {
        return $this->supportingDocumentReference;
    }

    /**
     * @param  null|array<SupportingDocumentReference> $supportingDocumentReference
     * @return static
     */
    public function setSupportingDocumentReference(?array $supportingDocumentReference = null): static
    {
        $this->supportingDocumentReference = $supportingDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSupportingDocumentReference(): static
    {
        $this->supportingDocumentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSupportingDocumentReference(): static
    {
        $this->supportingDocumentReference = [];

        return $this;
    }

    /**
     * @return null|SupportingDocumentReference
     */
    public function firstSupportingDocumentReference(): ?SupportingDocumentReference
    {
        $supportingDocumentReference = $this->supportingDocumentReference ?? [];
        $supportingDocumentReference = reset($supportingDocumentReference);

        if (false === $supportingDocumentReference) {
            return null;
        }

        return $supportingDocumentReference;
    }

    /**
     * @return null|SupportingDocumentReference
     */
    public function lastSupportingDocumentReference(): ?SupportingDocumentReference
    {
        $supportingDocumentReference = $this->supportingDocumentReference ?? [];
        $supportingDocumentReference = end($supportingDocumentReference);

        if (false === $supportingDocumentReference) {
            return null;
        }

        return $supportingDocumentReference;
    }

    /**
     * @param  SupportingDocumentReference $supportingDocumentReference
     * @return static
     */
    public function addToSupportingDocumentReference(SupportingDocumentReference $supportingDocumentReference): static
    {
        $this->supportingDocumentReference[] = $supportingDocumentReference;

        return $this;
    }

    /**
     * @return SupportingDocumentReference
     */
    public function addToSupportingDocumentReferenceWithCreate(): SupportingDocumentReference
    {
        $this->addTosupportingDocumentReference($supportingDocumentReference = new SupportingDocumentReference());

        return $supportingDocumentReference;
    }

    /**
     * @param  SupportingDocumentReference $supportingDocumentReference
     * @return static
     */
    public function addOnceToSupportingDocumentReference(
        SupportingDocumentReference $supportingDocumentReference,
    ): static {
        if (!is_array($this->supportingDocumentReference)) {
            $this->supportingDocumentReference = [];
        }

        $this->supportingDocumentReference[0] = $supportingDocumentReference;

        return $this;
    }

    /**
     * @return SupportingDocumentReference
     */
    public function addOnceToSupportingDocumentReferenceWithCreate(): SupportingDocumentReference
    {
        if (!is_array($this->supportingDocumentReference)) {
            $this->supportingDocumentReference = [];
        }

        if ([] === $this->supportingDocumentReference) {
            $this->addOnceTosupportingDocumentReference(new SupportingDocumentReference());
        }

        return $this->supportingDocumentReference[0];
    }

    /**
     * @return null|array<Signature>
     */
    public function getSignature(): ?array
    {
        return $this->signature;
    }

    /**
     * @param  null|array<Signature> $signature
     * @return static
     */
    public function setSignature(?array $signature = null): static
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSignature(): static
    {
        $this->signature = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSignature(): static
    {
        $this->signature = [];

        return $this;
    }

    /**
     * @return null|Signature
     */
    public function firstSignature(): ?Signature
    {
        $signature = $this->signature ?? [];
        $signature = reset($signature);

        if (false === $signature) {
            return null;
        }

        return $signature;
    }

    /**
     * @return null|Signature
     */
    public function lastSignature(): ?Signature
    {
        $signature = $this->signature ?? [];
        $signature = end($signature);

        if (false === $signature) {
            return null;
        }

        return $signature;
    }

    /**
     * @param  Signature $signature
     * @return static
     */
    public function addToSignature(Signature $signature): static
    {
        $this->signature[] = $signature;

        return $this;
    }

    /**
     * @return Signature
     */
    public function addToSignatureWithCreate(): Signature
    {
        $this->addTosignature($signature = new Signature());

        return $signature;
    }

    /**
     * @param  Signature $signature
     * @return static
     */
    public function addOnceToSignature(Signature $signature): static
    {
        if (!is_array($this->signature)) {
            $this->signature = [];
        }

        $this->signature[0] = $signature;

        return $this;
    }

    /**
     * @return Signature
     */
    public function addOnceToSignatureWithCreate(): Signature
    {
        if (!is_array($this->signature)) {
            $this->signature = [];
        }

        if ([] === $this->signature) {
            $this->addOnceTosignature(new Signature());
        }

        return $this->signature[0];
    }
}
