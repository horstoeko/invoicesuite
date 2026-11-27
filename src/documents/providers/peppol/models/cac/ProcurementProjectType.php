<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EstimatedOverallContractQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FeeDescription;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ProcurementSubTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ProcurementTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\QualityControlCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RequiredFeeAmount;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class ProcurementProjectType
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
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $iD;

    /**
     * @var null|array<Name>
     */
    #[JMS\Accessor(getter: 'getName', setter: 'setName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Name')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'Name', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $name;

    /**
     * @var null|array<Description>
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'Description', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $description;

    /**
     * @var null|ProcurementTypeCode
     */
    #[JMS\Accessor(getter: 'getProcurementTypeCode', setter: 'setProcurementTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ProcurementTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ProcurementTypeCode')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $procurementTypeCode;

    /**
     * @var null|ProcurementSubTypeCode
     */
    #[JMS\Accessor(getter: 'getProcurementSubTypeCode', setter: 'setProcurementSubTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ProcurementSubTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ProcurementSubTypeCode')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $procurementSubTypeCode;

    /**
     * @var null|QualityControlCode
     */
    #[JMS\Accessor(getter: 'getQualityControlCode', setter: 'setQualityControlCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('QualityControlCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\QualityControlCode')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $qualityControlCode;

    /**
     * @var null|RequiredFeeAmount
     */
    #[JMS\Accessor(getter: 'getRequiredFeeAmount', setter: 'setRequiredFeeAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequiredFeeAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RequiredFeeAmount')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $requiredFeeAmount;

    /**
     * @var null|array<FeeDescription>
     */
    #[JMS\Accessor(getter: 'getFeeDescription', setter: 'setFeeDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FeeDescription')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FeeDescription>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'FeeDescription', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $feeDescription;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getRequestedDeliveryDate', setter: 'setRequestedDeliveryDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequestedDeliveryDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $requestedDeliveryDate;

    /**
     * @var null|EstimatedOverallContractQuantity
     */
    #[JMS\Accessor(getter: 'getEstimatedOverallContractQuantity', setter: 'setEstimatedOverallContractQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EstimatedOverallContractQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\EstimatedOverallContractQuantity')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $estimatedOverallContractQuantity;

    /**
     * @var null|array<Note>
     */
    #[JMS\Accessor(getter: 'getNote', setter: 'setNote')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Note')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Note>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    #[JMS\XmlList(entry: 'Note', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $note;

    /**
     * @var null|RequestedTenderTotal
     */
    #[JMS\Accessor(getter: 'getRequestedTenderTotal', setter: 'setRequestedTenderTotal')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequestedTenderTotal')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\RequestedTenderTotal')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $requestedTenderTotal;

    /**
     * @var null|MainCommodityClassification
     */
    #[JMS\Accessor(getter: 'getMainCommodityClassification', setter: 'setMainCommodityClassification')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MainCommodityClassification')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\MainCommodityClassification')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $mainCommodityClassification;

    /**
     * @var null|array<AdditionalCommodityClassification>
     */
    #[JMS\Accessor(getter: 'getAdditionalCommodityClassification', setter: 'setAdditionalCommodityClassification')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AdditionalCommodityClassification')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\AdditionalCommodityClassification>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'AdditionalCommodityClassification', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $additionalCommodityClassification;

    /**
     * @var null|array<RealizedLocation>
     */
    #[JMS\Accessor(getter: 'getRealizedLocation', setter: 'setRealizedLocation')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RealizedLocation')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\RealizedLocation>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'RealizedLocation', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $realizedLocation;

    /**
     * @var null|PlannedPeriod
     */
    #[JMS\Accessor(getter: 'getPlannedPeriod', setter: 'setPlannedPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PlannedPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PlannedPeriod')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $plannedPeriod;

    /**
     * @var null|ContractExtension
     */
    #[JMS\Accessor(getter: 'getContractExtension', setter: 'setContractExtension')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ContractExtension')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ContractExtension')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $contractExtension;

    /**
     * @var null|array<RequestForTenderLine>
     */
    #[JMS\Accessor(getter: 'getRequestForTenderLine', setter: 'setRequestForTenderLine')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RequestForTenderLine')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\RequestForTenderLine>')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    #[JMS\XmlList(entry: 'RequestForTenderLine', inline: true, namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $requestForTenderLine;

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
     * @return null|array<Name>
     */
    public function getName(): ?array
    {
        return $this->name;
    }

    /**
     * @param  null|array<Name> $name
     * @return static
     */
    public function setName(
        ?array $name = null
    ): static {
        $this->name = $name;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetName(): static
    {
        $this->name = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearName(): static
    {
        $this->name = [];

        return $this;
    }

    /**
     * @return null|Name
     */
    public function firstName(): ?Name
    {
        $name = $this->name ?? [];
        $name = InvoiceSuiteArrayUtils::first($name);

        if (false === $name) {
            return null;
        }

        return $name;
    }

    /**
     * @return null|Name
     */
    public function lastName(): ?Name
    {
        $name = $this->name ?? [];
        $name = InvoiceSuiteArrayUtils::last($name);

        if (false === $name) {
            return null;
        }

        return $name;
    }

    /**
     * @param  Name   $name
     * @return static
     */
    public function addToName(
        Name $name
    ): static {
        $this->name[] = $name;

        return $this;
    }

    /**
     * @return Name
     */
    public function addToNameWithCreate(): Name
    {
        $this->addToName($name = new Name());

        return $name;
    }

    /**
     * @param  Name   $name
     * @return static
     */
    public function addOnceToName(
        Name $name
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->name)) {
            $this->name = [];
        }

        $this->name[0] = $name;

        return $this;
    }

    /**
     * @return Name
     */
    public function addOnceToNameWithCreate(): Name
    {
        if (!InvoiceSuiteArrayUtils::is($this->name)) {
            $this->name = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->name)) {
            $this->addOnceToName(new Name());
        }

        return $this->name[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(Name): mixed $callback
     * @return static
     */
    public function forEachName(
        callable $callback
    ): static {
        foreach ($this->name ?? [] as $name) {
            $callback($name);
        }

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
        $description = InvoiceSuiteArrayUtils::first($description);

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
        $description = InvoiceSuiteArrayUtils::last($description);

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

        if (InvoiceSuiteArrayUtils::empty($this->description)) {
            $this->addOnceToDescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(Description): mixed $callback
     * @return static
     */
    public function forEachDescription(
        callable $callback
    ): static {
        foreach ($this->description ?? [] as $description) {
            $callback($description);
        }

        return $this;
    }

    /**
     * @return null|ProcurementTypeCode
     */
    public function getProcurementTypeCode(): ?ProcurementTypeCode
    {
        return $this->procurementTypeCode;
    }

    /**
     * @return ProcurementTypeCode
     */
    public function getProcurementTypeCodeWithCreate(): ProcurementTypeCode
    {
        $this->procurementTypeCode ??= new ProcurementTypeCode();

        return $this->procurementTypeCode;
    }

    /**
     * @param  null|ProcurementTypeCode $procurementTypeCode
     * @return static
     */
    public function setProcurementTypeCode(
        ?ProcurementTypeCode $procurementTypeCode = null
    ): static {
        $this->procurementTypeCode = $procurementTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProcurementTypeCode(): static
    {
        $this->procurementTypeCode = null;

        return $this;
    }

    /**
     * @return null|ProcurementSubTypeCode
     */
    public function getProcurementSubTypeCode(): ?ProcurementSubTypeCode
    {
        return $this->procurementSubTypeCode;
    }

    /**
     * @return ProcurementSubTypeCode
     */
    public function getProcurementSubTypeCodeWithCreate(): ProcurementSubTypeCode
    {
        $this->procurementSubTypeCode ??= new ProcurementSubTypeCode();

        return $this->procurementSubTypeCode;
    }

    /**
     * @param  null|ProcurementSubTypeCode $procurementSubTypeCode
     * @return static
     */
    public function setProcurementSubTypeCode(
        ?ProcurementSubTypeCode $procurementSubTypeCode = null
    ): static {
        $this->procurementSubTypeCode = $procurementSubTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProcurementSubTypeCode(): static
    {
        $this->procurementSubTypeCode = null;

        return $this;
    }

    /**
     * @return null|QualityControlCode
     */
    public function getQualityControlCode(): ?QualityControlCode
    {
        return $this->qualityControlCode;
    }

    /**
     * @return QualityControlCode
     */
    public function getQualityControlCodeWithCreate(): QualityControlCode
    {
        $this->qualityControlCode ??= new QualityControlCode();

        return $this->qualityControlCode;
    }

    /**
     * @param  null|QualityControlCode $qualityControlCode
     * @return static
     */
    public function setQualityControlCode(
        ?QualityControlCode $qualityControlCode = null
    ): static {
        $this->qualityControlCode = $qualityControlCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetQualityControlCode(): static
    {
        $this->qualityControlCode = null;

        return $this;
    }

    /**
     * @return null|RequiredFeeAmount
     */
    public function getRequiredFeeAmount(): ?RequiredFeeAmount
    {
        return $this->requiredFeeAmount;
    }

    /**
     * @return RequiredFeeAmount
     */
    public function getRequiredFeeAmountWithCreate(): RequiredFeeAmount
    {
        $this->requiredFeeAmount ??= new RequiredFeeAmount();

        return $this->requiredFeeAmount;
    }

    /**
     * @param  null|RequiredFeeAmount $requiredFeeAmount
     * @return static
     */
    public function setRequiredFeeAmount(
        ?RequiredFeeAmount $requiredFeeAmount = null
    ): static {
        $this->requiredFeeAmount = $requiredFeeAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequiredFeeAmount(): static
    {
        $this->requiredFeeAmount = null;

        return $this;
    }

    /**
     * @return null|array<FeeDescription>
     */
    public function getFeeDescription(): ?array
    {
        return $this->feeDescription;
    }

    /**
     * @param  null|array<FeeDescription> $feeDescription
     * @return static
     */
    public function setFeeDescription(
        ?array $feeDescription = null
    ): static {
        $this->feeDescription = $feeDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFeeDescription(): static
    {
        $this->feeDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearFeeDescription(): static
    {
        $this->feeDescription = [];

        return $this;
    }

    /**
     * @return null|FeeDescription
     */
    public function firstFeeDescription(): ?FeeDescription
    {
        $feeDescription = $this->feeDescription ?? [];
        $feeDescription = InvoiceSuiteArrayUtils::first($feeDescription);

        if (false === $feeDescription) {
            return null;
        }

        return $feeDescription;
    }

    /**
     * @return null|FeeDescription
     */
    public function lastFeeDescription(): ?FeeDescription
    {
        $feeDescription = $this->feeDescription ?? [];
        $feeDescription = InvoiceSuiteArrayUtils::last($feeDescription);

        if (false === $feeDescription) {
            return null;
        }

        return $feeDescription;
    }

    /**
     * @param  FeeDescription $feeDescription
     * @return static
     */
    public function addToFeeDescription(
        FeeDescription $feeDescription
    ): static {
        $this->feeDescription[] = $feeDescription;

        return $this;
    }

    /**
     * @return FeeDescription
     */
    public function addToFeeDescriptionWithCreate(): FeeDescription
    {
        $this->addToFeeDescription($feeDescription = new FeeDescription());

        return $feeDescription;
    }

    /**
     * @param  FeeDescription $feeDescription
     * @return static
     */
    public function addOnceToFeeDescription(
        FeeDescription $feeDescription
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->feeDescription)) {
            $this->feeDescription = [];
        }

        $this->feeDescription[0] = $feeDescription;

        return $this;
    }

    /**
     * @return FeeDescription
     */
    public function addOnceToFeeDescriptionWithCreate(): FeeDescription
    {
        if (!InvoiceSuiteArrayUtils::is($this->feeDescription)) {
            $this->feeDescription = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->feeDescription)) {
            $this->addOnceToFeeDescription(new FeeDescription());
        }

        return $this->feeDescription[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(FeeDescription): mixed $callback
     * @return static
     */
    public function forEachFeeDescription(
        callable $callback
    ): static {
        foreach ($this->feeDescription ?? [] as $feeDescription) {
            $callback($feeDescription);
        }

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getRequestedDeliveryDate(): ?DateTimeInterface
    {
        return $this->requestedDeliveryDate;
    }

    /**
     * @param  null|DateTimeInterface $requestedDeliveryDate
     * @return static
     */
    public function setRequestedDeliveryDate(
        ?DateTimeInterface $requestedDeliveryDate = null
    ): static {
        $this->requestedDeliveryDate = $requestedDeliveryDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequestedDeliveryDate(): static
    {
        $this->requestedDeliveryDate = null;

        return $this;
    }

    /**
     * @return null|EstimatedOverallContractQuantity
     */
    public function getEstimatedOverallContractQuantity(): ?EstimatedOverallContractQuantity
    {
        return $this->estimatedOverallContractQuantity;
    }

    /**
     * @return EstimatedOverallContractQuantity
     */
    public function getEstimatedOverallContractQuantityWithCreate(): EstimatedOverallContractQuantity
    {
        $this->estimatedOverallContractQuantity ??= new EstimatedOverallContractQuantity();

        return $this->estimatedOverallContractQuantity;
    }

    /**
     * @param  null|EstimatedOverallContractQuantity $estimatedOverallContractQuantity
     * @return static
     */
    public function setEstimatedOverallContractQuantity(
        ?EstimatedOverallContractQuantity $estimatedOverallContractQuantity = null,
    ): static {
        $this->estimatedOverallContractQuantity = $estimatedOverallContractQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEstimatedOverallContractQuantity(): static
    {
        $this->estimatedOverallContractQuantity = null;

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
        $note = InvoiceSuiteArrayUtils::first($note);

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
        $note = InvoiceSuiteArrayUtils::last($note);

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

        if (InvoiceSuiteArrayUtils::empty($this->note)) {
            $this->addOnceToNote(new Note());
        }

        return $this->note[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(Note): mixed $callback
     * @return static
     */
    public function forEachNote(
        callable $callback
    ): static {
        foreach ($this->note ?? [] as $note) {
            $callback($note);
        }

        return $this;
    }

    /**
     * @return null|RequestedTenderTotal
     */
    public function getRequestedTenderTotal(): ?RequestedTenderTotal
    {
        return $this->requestedTenderTotal;
    }

    /**
     * @return RequestedTenderTotal
     */
    public function getRequestedTenderTotalWithCreate(): RequestedTenderTotal
    {
        $this->requestedTenderTotal ??= new RequestedTenderTotal();

        return $this->requestedTenderTotal;
    }

    /**
     * @param  null|RequestedTenderTotal $requestedTenderTotal
     * @return static
     */
    public function setRequestedTenderTotal(
        ?RequestedTenderTotal $requestedTenderTotal = null
    ): static {
        $this->requestedTenderTotal = $requestedTenderTotal;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequestedTenderTotal(): static
    {
        $this->requestedTenderTotal = null;

        return $this;
    }

    /**
     * @return null|MainCommodityClassification
     */
    public function getMainCommodityClassification(): ?MainCommodityClassification
    {
        return $this->mainCommodityClassification;
    }

    /**
     * @return MainCommodityClassification
     */
    public function getMainCommodityClassificationWithCreate(): MainCommodityClassification
    {
        $this->mainCommodityClassification ??= new MainCommodityClassification();

        return $this->mainCommodityClassification;
    }

    /**
     * @param  null|MainCommodityClassification $mainCommodityClassification
     * @return static
     */
    public function setMainCommodityClassification(
        ?MainCommodityClassification $mainCommodityClassification = null,
    ): static {
        $this->mainCommodityClassification = $mainCommodityClassification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMainCommodityClassification(): static
    {
        $this->mainCommodityClassification = null;

        return $this;
    }

    /**
     * @return null|array<AdditionalCommodityClassification>
     */
    public function getAdditionalCommodityClassification(): ?array
    {
        return $this->additionalCommodityClassification;
    }

    /**
     * @param  null|array<AdditionalCommodityClassification> $additionalCommodityClassification
     * @return static
     */
    public function setAdditionalCommodityClassification(
        ?array $additionalCommodityClassification = null
    ): static {
        $this->additionalCommodityClassification = $additionalCommodityClassification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdditionalCommodityClassification(): static
    {
        $this->additionalCommodityClassification = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAdditionalCommodityClassification(): static
    {
        $this->additionalCommodityClassification = [];

        return $this;
    }

    /**
     * @return null|AdditionalCommodityClassification
     */
    public function firstAdditionalCommodityClassification(): ?AdditionalCommodityClassification
    {
        $additionalCommodityClassification = $this->additionalCommodityClassification ?? [];
        $additionalCommodityClassification = InvoiceSuiteArrayUtils::first($additionalCommodityClassification);

        if (false === $additionalCommodityClassification) {
            return null;
        }

        return $additionalCommodityClassification;
    }

    /**
     * @return null|AdditionalCommodityClassification
     */
    public function lastAdditionalCommodityClassification(): ?AdditionalCommodityClassification
    {
        $additionalCommodityClassification = $this->additionalCommodityClassification ?? [];
        $additionalCommodityClassification = InvoiceSuiteArrayUtils::last($additionalCommodityClassification);

        if (false === $additionalCommodityClassification) {
            return null;
        }

        return $additionalCommodityClassification;
    }

    /**
     * @param  AdditionalCommodityClassification $additionalCommodityClassification
     * @return static
     */
    public function addToAdditionalCommodityClassification(
        AdditionalCommodityClassification $additionalCommodityClassification,
    ): static {
        $this->additionalCommodityClassification[] = $additionalCommodityClassification;

        return $this;
    }

    /**
     * @return AdditionalCommodityClassification
     */
    public function addToAdditionalCommodityClassificationWithCreate(): AdditionalCommodityClassification
    {
        $this->addToAdditionalCommodityClassification($additionalCommodityClassification = new AdditionalCommodityClassification());

        return $additionalCommodityClassification;
    }

    /**
     * @param  AdditionalCommodityClassification $additionalCommodityClassification
     * @return static
     */
    public function addOnceToAdditionalCommodityClassification(
        AdditionalCommodityClassification $additionalCommodityClassification,
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->additionalCommodityClassification)) {
            $this->additionalCommodityClassification = [];
        }

        $this->additionalCommodityClassification[0] = $additionalCommodityClassification;

        return $this;
    }

    /**
     * @return AdditionalCommodityClassification
     */
    public function addOnceToAdditionalCommodityClassificationWithCreate(): AdditionalCommodityClassification
    {
        if (!InvoiceSuiteArrayUtils::is($this->additionalCommodityClassification)) {
            $this->additionalCommodityClassification = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->additionalCommodityClassification)) {
            $this->addOnceToAdditionalCommodityClassification(new AdditionalCommodityClassification());
        }

        return $this->additionalCommodityClassification[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(AdditionalCommodityClassification): mixed $callback
     * @return static
     */
    public function forEachAdditionalCommodityClassification(
        callable $callback
    ): static {
        foreach ($this->additionalCommodityClassification ?? [] as $additionalCommodityClassification) {
            $callback($additionalCommodityClassification);
        }

        return $this;
    }

    /**
     * @return null|array<RealizedLocation>
     */
    public function getRealizedLocation(): ?array
    {
        return $this->realizedLocation;
    }

    /**
     * @param  null|array<RealizedLocation> $realizedLocation
     * @return static
     */
    public function setRealizedLocation(
        ?array $realizedLocation = null
    ): static {
        $this->realizedLocation = $realizedLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRealizedLocation(): static
    {
        $this->realizedLocation = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRealizedLocation(): static
    {
        $this->realizedLocation = [];

        return $this;
    }

    /**
     * @return null|RealizedLocation
     */
    public function firstRealizedLocation(): ?RealizedLocation
    {
        $realizedLocation = $this->realizedLocation ?? [];
        $realizedLocation = InvoiceSuiteArrayUtils::first($realizedLocation);

        if (false === $realizedLocation) {
            return null;
        }

        return $realizedLocation;
    }

    /**
     * @return null|RealizedLocation
     */
    public function lastRealizedLocation(): ?RealizedLocation
    {
        $realizedLocation = $this->realizedLocation ?? [];
        $realizedLocation = InvoiceSuiteArrayUtils::last($realizedLocation);

        if (false === $realizedLocation) {
            return null;
        }

        return $realizedLocation;
    }

    /**
     * @param  RealizedLocation $realizedLocation
     * @return static
     */
    public function addToRealizedLocation(
        RealizedLocation $realizedLocation
    ): static {
        $this->realizedLocation[] = $realizedLocation;

        return $this;
    }

    /**
     * @return RealizedLocation
     */
    public function addToRealizedLocationWithCreate(): RealizedLocation
    {
        $this->addToRealizedLocation($realizedLocation = new RealizedLocation());

        return $realizedLocation;
    }

    /**
     * @param  RealizedLocation $realizedLocation
     * @return static
     */
    public function addOnceToRealizedLocation(
        RealizedLocation $realizedLocation
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->realizedLocation)) {
            $this->realizedLocation = [];
        }

        $this->realizedLocation[0] = $realizedLocation;

        return $this;
    }

    /**
     * @return RealizedLocation
     */
    public function addOnceToRealizedLocationWithCreate(): RealizedLocation
    {
        if (!InvoiceSuiteArrayUtils::is($this->realizedLocation)) {
            $this->realizedLocation = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->realizedLocation)) {
            $this->addOnceToRealizedLocation(new RealizedLocation());
        }

        return $this->realizedLocation[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(RealizedLocation): mixed $callback
     * @return static
     */
    public function forEachRealizedLocation(
        callable $callback
    ): static {
        foreach ($this->realizedLocation ?? [] as $realizedLocation) {
            $callback($realizedLocation);
        }

        return $this;
    }

    /**
     * @return null|PlannedPeriod
     */
    public function getPlannedPeriod(): ?PlannedPeriod
    {
        return $this->plannedPeriod;
    }

    /**
     * @return PlannedPeriod
     */
    public function getPlannedPeriodWithCreate(): PlannedPeriod
    {
        $this->plannedPeriod ??= new PlannedPeriod();

        return $this->plannedPeriod;
    }

    /**
     * @param  null|PlannedPeriod $plannedPeriod
     * @return static
     */
    public function setPlannedPeriod(
        ?PlannedPeriod $plannedPeriod = null
    ): static {
        $this->plannedPeriod = $plannedPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPlannedPeriod(): static
    {
        $this->plannedPeriod = null;

        return $this;
    }

    /**
     * @return null|ContractExtension
     */
    public function getContractExtension(): ?ContractExtension
    {
        return $this->contractExtension;
    }

    /**
     * @return ContractExtension
     */
    public function getContractExtensionWithCreate(): ContractExtension
    {
        $this->contractExtension ??= new ContractExtension();

        return $this->contractExtension;
    }

    /**
     * @param  null|ContractExtension $contractExtension
     * @return static
     */
    public function setContractExtension(
        ?ContractExtension $contractExtension = null
    ): static {
        $this->contractExtension = $contractExtension;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContractExtension(): static
    {
        $this->contractExtension = null;

        return $this;
    }

    /**
     * @return null|array<RequestForTenderLine>
     */
    public function getRequestForTenderLine(): ?array
    {
        return $this->requestForTenderLine;
    }

    /**
     * @param  null|array<RequestForTenderLine> $requestForTenderLine
     * @return static
     */
    public function setRequestForTenderLine(
        ?array $requestForTenderLine = null
    ): static {
        $this->requestForTenderLine = $requestForTenderLine;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRequestForTenderLine(): static
    {
        $this->requestForTenderLine = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearRequestForTenderLine(): static
    {
        $this->requestForTenderLine = [];

        return $this;
    }

    /**
     * @return null|RequestForTenderLine
     */
    public function firstRequestForTenderLine(): ?RequestForTenderLine
    {
        $requestForTenderLine = $this->requestForTenderLine ?? [];
        $requestForTenderLine = InvoiceSuiteArrayUtils::first($requestForTenderLine);

        if (false === $requestForTenderLine) {
            return null;
        }

        return $requestForTenderLine;
    }

    /**
     * @return null|RequestForTenderLine
     */
    public function lastRequestForTenderLine(): ?RequestForTenderLine
    {
        $requestForTenderLine = $this->requestForTenderLine ?? [];
        $requestForTenderLine = InvoiceSuiteArrayUtils::last($requestForTenderLine);

        if (false === $requestForTenderLine) {
            return null;
        }

        return $requestForTenderLine;
    }

    /**
     * @param  RequestForTenderLine $requestForTenderLine
     * @return static
     */
    public function addToRequestForTenderLine(
        RequestForTenderLine $requestForTenderLine
    ): static {
        $this->requestForTenderLine[] = $requestForTenderLine;

        return $this;
    }

    /**
     * @return RequestForTenderLine
     */
    public function addToRequestForTenderLineWithCreate(): RequestForTenderLine
    {
        $this->addToRequestForTenderLine($requestForTenderLine = new RequestForTenderLine());

        return $requestForTenderLine;
    }

    /**
     * @param  RequestForTenderLine $requestForTenderLine
     * @return static
     */
    public function addOnceToRequestForTenderLine(
        RequestForTenderLine $requestForTenderLine
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->requestForTenderLine)) {
            $this->requestForTenderLine = [];
        }

        $this->requestForTenderLine[0] = $requestForTenderLine;

        return $this;
    }

    /**
     * @return RequestForTenderLine
     */
    public function addOnceToRequestForTenderLineWithCreate(): RequestForTenderLine
    {
        if (!InvoiceSuiteArrayUtils::is($this->requestForTenderLine)) {
            $this->requestForTenderLine = [];
        }

        if (InvoiceSuiteArrayUtils::empty($this->requestForTenderLine)) {
            $this->addOnceToRequestForTenderLine(new RequestForTenderLine());
        }

        return $this->requestForTenderLine[0];
    }

    /**
     * Execute a callback for each item
     *
     * @param  callable(RequestForTenderLine): mixed $callback
     * @return static
     */
    public function forEachRequestForTenderLine(
        callable $callback
    ): static {
        foreach ($this->requestForTenderLine ?? [] as $requestForTenderLine) {
            $callback($requestForTenderLine);
        }

        return $this;
    }
}
