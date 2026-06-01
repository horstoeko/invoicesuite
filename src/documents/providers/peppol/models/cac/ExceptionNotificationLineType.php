<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CollaborationPriorityCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ComparedValueMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExceptionStatusCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PerformanceMetricTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ResolutionCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SourceValueMeasure;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SupplyChainActivityTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\VarianceQuantity;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class ExceptionNotificationLineType
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
     * @var null|array<Note>
     */
    #[JMS\Accessor(getter: 'getNote', setter: 'setNote')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Note')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Note', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $note;

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
     * @var null|ExceptionStatusCode
     */
    #[JMS\Accessor(getter: 'getExceptionStatusCode', setter: 'setExceptionStatusCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExceptionStatusCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ExceptionStatusCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $exceptionStatusCode;

    /**
     * @var null|CollaborationPriorityCode
     */
    #[JMS\Accessor(getter: 'getCollaborationPriorityCode', setter: 'setCollaborationPriorityCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CollaborationPriorityCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CollaborationPriorityCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $collaborationPriorityCode;

    /**
     * @var null|ResolutionCode
     */
    #[JMS\Accessor(getter: 'getResolutionCode', setter: 'setResolutionCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ResolutionCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ResolutionCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $resolutionCode;

    /**
     * @var null|ComparedValueMeasure
     */
    #[JMS\Accessor(getter: 'getComparedValueMeasure', setter: 'setComparedValueMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ComparedValueMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ComparedValueMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $comparedValueMeasure;

    /**
     * @var null|SourceValueMeasure
     */
    #[JMS\Accessor(getter: 'getSourceValueMeasure', setter: 'setSourceValueMeasure')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SourceValueMeasure')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SourceValueMeasure')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $sourceValueMeasure;

    /**
     * @var null|VarianceQuantity
     */
    #[JMS\Accessor(getter: 'getVarianceQuantity', setter: 'setVarianceQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('VarianceQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\VarianceQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $varianceQuantity;

    /**
     * @var null|SupplyChainActivityTypeCode
     */
    #[JMS\Accessor(getter: 'getSupplyChainActivityTypeCode', setter: 'setSupplyChainActivityTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SupplyChainActivityTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SupplyChainActivityTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $supplyChainActivityTypeCode;

    /**
     * @var null|PerformanceMetricTypeCode
     */
    #[JMS\Accessor(getter: 'getPerformanceMetricTypeCode', setter: 'setPerformanceMetricTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PerformanceMetricTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PerformanceMetricTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $performanceMetricTypeCode;

    /**
     * @var null|ExceptionObservationPeriod
     */
    #[JMS\Accessor(getter: 'getExceptionObservationPeriod', setter: 'setExceptionObservationPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExceptionObservationPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ExceptionObservationPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $exceptionObservationPeriod;

    /**
     * @var null|array<DocumentReference>
     */
    #[JMS\Accessor(getter: 'getDocumentReference', setter: 'setDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DocumentReference')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\DocumentReference>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DocumentReference', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $documentReference;

    /**
     * @var null|ForecastException
     */
    #[JMS\Accessor(getter: 'getForecastException', setter: 'setForecastException')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ForecastException')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ForecastException')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $forecastException;

    /**
     * @var null|SupplyItem
     */
    #[JMS\Accessor(getter: 'getSupplyItem', setter: 'setSupplyItem')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SupplyItem')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\SupplyItem')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $supplyItem;

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
     * @return null|array<Note>
     */
    public function getNote(): ?array
    {
        return $this->note;
    }

    /**
     * @param  null|array<Note> $note
     * @return static
     */
    public function setNote(
        ?array $note = null
    ): static {
        $this->note = $note;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNote(): static
    {
        $this->note = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearNote(): static
    {
        $this->note = [];

        return $this;
    }

    /**
     * @return null|Note
     */
    public function firstNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = reset($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @return null|Note
     */
    public function lastNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = end($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addToNote(
        Note $note
    ): static {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addToNote($note = new Note());

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addOnceToNote(
        Note $note
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->note)) {
            $this->note = [];
        }

        $this->note[0] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addOnceToNoteWithCreate(): Note
    {
        if (!InvoiceSuiteArrayUtils::is($this->note)) {
            $this->note = [];
        }

        if ([] === $this->note) {
            $this->addOnceToNote(new Note());
        }

        return $this->note[0];
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
        $this->addToDescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(
        Description $description
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->description)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceToDescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return null|ExceptionStatusCode
     */
    public function getExceptionStatusCode(): ?ExceptionStatusCode
    {
        return $this->exceptionStatusCode;
    }

    /**
     * @return ExceptionStatusCode
     */
    public function getExceptionStatusCodeWithCreate(): ExceptionStatusCode
    {
        $this->exceptionStatusCode ??= new ExceptionStatusCode();

        return $this->exceptionStatusCode;
    }

    /**
     * @param  null|ExceptionStatusCode $exceptionStatusCode
     * @return static
     */
    public function setExceptionStatusCode(
        ?ExceptionStatusCode $exceptionStatusCode = null
    ): static {
        $this->exceptionStatusCode = $exceptionStatusCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExceptionStatusCode(): static
    {
        $this->exceptionStatusCode = null;

        return $this;
    }

    /**
     * @return null|CollaborationPriorityCode
     */
    public function getCollaborationPriorityCode(): ?CollaborationPriorityCode
    {
        return $this->collaborationPriorityCode;
    }

    /**
     * @return CollaborationPriorityCode
     */
    public function getCollaborationPriorityCodeWithCreate(): CollaborationPriorityCode
    {
        $this->collaborationPriorityCode ??= new CollaborationPriorityCode();

        return $this->collaborationPriorityCode;
    }

    /**
     * @param  null|CollaborationPriorityCode $collaborationPriorityCode
     * @return static
     */
    public function setCollaborationPriorityCode(
        ?CollaborationPriorityCode $collaborationPriorityCode = null
    ): static {
        $this->collaborationPriorityCode = $collaborationPriorityCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCollaborationPriorityCode(): static
    {
        $this->collaborationPriorityCode = null;

        return $this;
    }

    /**
     * @return null|ResolutionCode
     */
    public function getResolutionCode(): ?ResolutionCode
    {
        return $this->resolutionCode;
    }

    /**
     * @return ResolutionCode
     */
    public function getResolutionCodeWithCreate(): ResolutionCode
    {
        $this->resolutionCode ??= new ResolutionCode();

        return $this->resolutionCode;
    }

    /**
     * @param  null|ResolutionCode $resolutionCode
     * @return static
     */
    public function setResolutionCode(
        ?ResolutionCode $resolutionCode = null
    ): static {
        $this->resolutionCode = $resolutionCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetResolutionCode(): static
    {
        $this->resolutionCode = null;

        return $this;
    }

    /**
     * @return null|ComparedValueMeasure
     */
    public function getComparedValueMeasure(): ?ComparedValueMeasure
    {
        return $this->comparedValueMeasure;
    }

    /**
     * @return ComparedValueMeasure
     */
    public function getComparedValueMeasureWithCreate(): ComparedValueMeasure
    {
        $this->comparedValueMeasure ??= new ComparedValueMeasure();

        return $this->comparedValueMeasure;
    }

    /**
     * @param  null|ComparedValueMeasure $comparedValueMeasure
     * @return static
     */
    public function setComparedValueMeasure(
        ?ComparedValueMeasure $comparedValueMeasure = null
    ): static {
        $this->comparedValueMeasure = $comparedValueMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetComparedValueMeasure(): static
    {
        $this->comparedValueMeasure = null;

        return $this;
    }

    /**
     * @return null|SourceValueMeasure
     */
    public function getSourceValueMeasure(): ?SourceValueMeasure
    {
        return $this->sourceValueMeasure;
    }

    /**
     * @return SourceValueMeasure
     */
    public function getSourceValueMeasureWithCreate(): SourceValueMeasure
    {
        $this->sourceValueMeasure ??= new SourceValueMeasure();

        return $this->sourceValueMeasure;
    }

    /**
     * @param  null|SourceValueMeasure $sourceValueMeasure
     * @return static
     */
    public function setSourceValueMeasure(
        ?SourceValueMeasure $sourceValueMeasure = null
    ): static {
        $this->sourceValueMeasure = $sourceValueMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSourceValueMeasure(): static
    {
        $this->sourceValueMeasure = null;

        return $this;
    }

    /**
     * @return null|VarianceQuantity
     */
    public function getVarianceQuantity(): ?VarianceQuantity
    {
        return $this->varianceQuantity;
    }

    /**
     * @return VarianceQuantity
     */
    public function getVarianceQuantityWithCreate(): VarianceQuantity
    {
        $this->varianceQuantity ??= new VarianceQuantity();

        return $this->varianceQuantity;
    }

    /**
     * @param  null|VarianceQuantity $varianceQuantity
     * @return static
     */
    public function setVarianceQuantity(
        ?VarianceQuantity $varianceQuantity = null
    ): static {
        $this->varianceQuantity = $varianceQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetVarianceQuantity(): static
    {
        $this->varianceQuantity = null;

        return $this;
    }

    /**
     * @return null|SupplyChainActivityTypeCode
     */
    public function getSupplyChainActivityTypeCode(): ?SupplyChainActivityTypeCode
    {
        return $this->supplyChainActivityTypeCode;
    }

    /**
     * @return SupplyChainActivityTypeCode
     */
    public function getSupplyChainActivityTypeCodeWithCreate(): SupplyChainActivityTypeCode
    {
        $this->supplyChainActivityTypeCode ??= new SupplyChainActivityTypeCode();

        return $this->supplyChainActivityTypeCode;
    }

    /**
     * @param  null|SupplyChainActivityTypeCode $supplyChainActivityTypeCode
     * @return static
     */
    public function setSupplyChainActivityTypeCode(
        ?SupplyChainActivityTypeCode $supplyChainActivityTypeCode = null,
    ): static {
        $this->supplyChainActivityTypeCode = $supplyChainActivityTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSupplyChainActivityTypeCode(): static
    {
        $this->supplyChainActivityTypeCode = null;

        return $this;
    }

    /**
     * @return null|PerformanceMetricTypeCode
     */
    public function getPerformanceMetricTypeCode(): ?PerformanceMetricTypeCode
    {
        return $this->performanceMetricTypeCode;
    }

    /**
     * @return PerformanceMetricTypeCode
     */
    public function getPerformanceMetricTypeCodeWithCreate(): PerformanceMetricTypeCode
    {
        $this->performanceMetricTypeCode ??= new PerformanceMetricTypeCode();

        return $this->performanceMetricTypeCode;
    }

    /**
     * @param  null|PerformanceMetricTypeCode $performanceMetricTypeCode
     * @return static
     */
    public function setPerformanceMetricTypeCode(
        ?PerformanceMetricTypeCode $performanceMetricTypeCode = null
    ): static {
        $this->performanceMetricTypeCode = $performanceMetricTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPerformanceMetricTypeCode(): static
    {
        $this->performanceMetricTypeCode = null;

        return $this;
    }

    /**
     * @return null|ExceptionObservationPeriod
     */
    public function getExceptionObservationPeriod(): ?ExceptionObservationPeriod
    {
        return $this->exceptionObservationPeriod;
    }

    /**
     * @return ExceptionObservationPeriod
     */
    public function getExceptionObservationPeriodWithCreate(): ExceptionObservationPeriod
    {
        $this->exceptionObservationPeriod ??= new ExceptionObservationPeriod();

        return $this->exceptionObservationPeriod;
    }

    /**
     * @param  null|ExceptionObservationPeriod $exceptionObservationPeriod
     * @return static
     */
    public function setExceptionObservationPeriod(
        ?ExceptionObservationPeriod $exceptionObservationPeriod = null,
    ): static {
        $this->exceptionObservationPeriod = $exceptionObservationPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExceptionObservationPeriod(): static
    {
        $this->exceptionObservationPeriod = null;

        return $this;
    }

    /**
     * @return null|array<DocumentReference>
     */
    public function getDocumentReference(): ?array
    {
        return $this->documentReference;
    }

    /**
     * @param  null|array<DocumentReference> $documentReference
     * @return static
     */
    public function setDocumentReference(
        ?array $documentReference = null
    ): static {
        $this->documentReference = $documentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentReference(): static
    {
        $this->documentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDocumentReference(): static
    {
        $this->documentReference = [];

        return $this;
    }

    /**
     * @return null|DocumentReference
     */
    public function firstDocumentReference(): ?DocumentReference
    {
        $documentReference = $this->documentReference ?? [];
        $documentReference = reset($documentReference);

        if (false === $documentReference) {
            return null;
        }

        return $documentReference;
    }

    /**
     * @return null|DocumentReference
     */
    public function lastDocumentReference(): ?DocumentReference
    {
        $documentReference = $this->documentReference ?? [];
        $documentReference = end($documentReference);

        if (false === $documentReference) {
            return null;
        }

        return $documentReference;
    }

    /**
     * @param  DocumentReference $documentReference
     * @return static
     */
    public function addToDocumentReference(
        DocumentReference $documentReference
    ): static {
        $this->documentReference[] = $documentReference;

        return $this;
    }

    /**
     * @return DocumentReference
     */
    public function addToDocumentReferenceWithCreate(): DocumentReference
    {
        $this->addToDocumentReference($documentReference = new DocumentReference());

        return $documentReference;
    }

    /**
     * @param  DocumentReference $documentReference
     * @return static
     */
    public function addOnceToDocumentReference(
        DocumentReference $documentReference
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->documentReference)) {
            $this->documentReference = [];
        }

        $this->documentReference[0] = $documentReference;

        return $this;
    }

    /**
     * @return DocumentReference
     */
    public function addOnceToDocumentReferenceWithCreate(): DocumentReference
    {
        if (!InvoiceSuiteArrayUtils::is($this->documentReference)) {
            $this->documentReference = [];
        }

        if ([] === $this->documentReference) {
            $this->addOnceToDocumentReference(new DocumentReference());
        }

        return $this->documentReference[0];
    }

    /**
     * @return null|ForecastException
     */
    public function getForecastException(): ?ForecastException
    {
        return $this->forecastException;
    }

    /**
     * @return ForecastException
     */
    public function getForecastExceptionWithCreate(): ForecastException
    {
        $this->forecastException ??= new ForecastException();

        return $this->forecastException;
    }

    /**
     * @param  null|ForecastException $forecastException
     * @return static
     */
    public function setForecastException(
        ?ForecastException $forecastException = null
    ): static {
        $this->forecastException = $forecastException;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetForecastException(): static
    {
        $this->forecastException = null;

        return $this;
    }

    /**
     * @return null|SupplyItem
     */
    public function getSupplyItem(): ?SupplyItem
    {
        return $this->supplyItem;
    }

    /**
     * @return SupplyItem
     */
    public function getSupplyItemWithCreate(): SupplyItem
    {
        $this->supplyItem ??= new SupplyItem();

        return $this->supplyItem;
    }

    /**
     * @param  null|SupplyItem $supplyItem
     * @return static
     */
    public function setSupplyItem(
        ?SupplyItem $supplyItem = null
    ): static {
        $this->supplyItem = $supplyItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSupplyItem(): static
    {
        $this->supplyItem = null;

        return $this;
    }
}
