<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FreightRateClassCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Priority;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SequenceNumeric;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TariffClassCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TransportationServiceDescription;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TransportationServiceDetailsURI;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TransportServiceCode;
use JMS\Serializer\Annotation as JMS;

class TransportationServiceType
{
    use HandlesObjectFlags;

    /**
     * @var null|TransportServiceCode
     */
    #[JMS\Accessor(getter: 'getTransportServiceCode', setter: 'setTransportServiceCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransportServiceCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TransportServiceCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $transportServiceCode;

    /**
     * @var null|TariffClassCode
     */
    #[JMS\Accessor(getter: 'getTariffClassCode', setter: 'setTariffClassCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TariffClassCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TariffClassCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $tariffClassCode;

    /**
     * @var null|Priority
     */
    #[JMS\Accessor(getter: 'getPriority', setter: 'setPriority')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Priority')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Priority')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $priority;

    /**
     * @var null|FreightRateClassCode
     */
    #[JMS\Accessor(getter: 'getFreightRateClassCode', setter: 'setFreightRateClassCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FreightRateClassCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FreightRateClassCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $freightRateClassCode;

    /**
     * @var null|array<TransportationServiceDescription>
     */
    #[JMS\Accessor(getter: 'getTransportationServiceDescription', setter: 'setTransportationServiceDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransportationServiceDescription')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TransportationServiceDescription>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'TransportationServiceDescription', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $transportationServiceDescription;

    /**
     * @var null|TransportationServiceDetailsURI
     */
    #[JMS\Accessor(getter: 'getTransportationServiceDetailsURI', setter: 'setTransportationServiceDetailsURI')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransportationServiceDetailsURI')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\TransportationServiceDetailsURI')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $transportationServiceDetailsURI;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getNominationDate', setter: 'setNominationDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('NominationDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $nominationDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getNominationTime', setter: 'setNominationTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('NominationTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $nominationTime;

    /**
     * @var null|Name
     */
    #[JMS\Accessor(getter: 'getName', setter: 'setName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Name')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $name;

    /**
     * @var null|SequenceNumeric
     */
    #[JMS\Accessor(getter: 'getSequenceNumeric', setter: 'setSequenceNumeric')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SequenceNumeric')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SequenceNumeric')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $sequenceNumeric;

    /**
     * @var null|array<TransportEquipment>
     */
    #[JMS\Accessor(getter: 'getTransportEquipment', setter: 'setTransportEquipment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransportEquipment')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\TransportEquipment>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'TransportEquipment', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $transportEquipment;

    /**
     * @var null|array<SupportedTransportEquipment>
     */
    #[JMS\Accessor(getter: 'getSupportedTransportEquipment', setter: 'setSupportedTransportEquipment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SupportedTransportEquipment')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\SupportedTransportEquipment>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SupportedTransportEquipment', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $supportedTransportEquipment;

    /**
     * @var null|array<UnsupportedTransportEquipment>
     */
    #[JMS\Accessor(getter: 'getUnsupportedTransportEquipment', setter: 'setUnsupportedTransportEquipment')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('UnsupportedTransportEquipment')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\UnsupportedTransportEquipment>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'UnsupportedTransportEquipment', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $unsupportedTransportEquipment;

    /**
     * @var null|array<CommodityClassification>
     */
    #[JMS\Accessor(getter: 'getCommodityClassification', setter: 'setCommodityClassification')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CommodityClassification')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\CommodityClassification>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'CommodityClassification', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $commodityClassification;

    /**
     * @var null|array<SupportedCommodityClassification>
     */
    #[JMS\Accessor(getter: 'getSupportedCommodityClassification', setter: 'setSupportedCommodityClassification')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SupportedCommodityClassification')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\SupportedCommodityClassification>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SupportedCommodityClassification', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $supportedCommodityClassification;

    /**
     * @var null|array<UnsupportedCommodityClassification>
     */
    #[JMS\Accessor(getter: 'getUnsupportedCommodityClassification', setter: 'setUnsupportedCommodityClassification')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('UnsupportedCommodityClassification')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\UnsupportedCommodityClassification>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'UnsupportedCommodityClassification', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $unsupportedCommodityClassification;

    /**
     * @var null|TotalCapacityDimension
     */
    #[JMS\Accessor(getter: 'getTotalCapacityDimension', setter: 'setTotalCapacityDimension')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TotalCapacityDimension')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\TotalCapacityDimension')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $totalCapacityDimension;

    /**
     * @var null|array<ShipmentStage>
     */
    #[JMS\Accessor(getter: 'getShipmentStage', setter: 'setShipmentStage')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ShipmentStage')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ShipmentStage>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ShipmentStage', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $shipmentStage;

    /**
     * @var null|array<TransportEvent>
     */
    #[JMS\Accessor(getter: 'getTransportEvent', setter: 'setTransportEvent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('TransportEvent')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\TransportEvent>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'TransportEvent', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $transportEvent;

    /**
     * @var null|ResponsibleTransportServiceProviderParty
     */
    #[JMS\Accessor(getter: 'getResponsibleTransportServiceProviderParty', setter: 'setResponsibleTransportServiceProviderParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ResponsibleTransportServiceProviderParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\ResponsibleTransportServiceProviderParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $responsibleTransportServiceProviderParty;

    /**
     * @var null|array<EnvironmentalEmission>
     */
    #[JMS\Accessor(getter: 'getEnvironmentalEmission', setter: 'setEnvironmentalEmission')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EnvironmentalEmission')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\EnvironmentalEmission>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'EnvironmentalEmission', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $environmentalEmission;

    /**
     * @var null|EstimatedDurationPeriod
     */
    #[JMS\Accessor(getter: 'getEstimatedDurationPeriod', setter: 'setEstimatedDurationPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('EstimatedDurationPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\EstimatedDurationPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $estimatedDurationPeriod;

    /**
     * @var null|array<ScheduledServiceFrequency>
     */
    #[JMS\Accessor(getter: 'getScheduledServiceFrequency', setter: 'setScheduledServiceFrequency')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ScheduledServiceFrequency')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ScheduledServiceFrequency>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ScheduledServiceFrequency', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $scheduledServiceFrequency;

    /**
     * @return null|TransportServiceCode
     */
    public function getTransportServiceCode(): ?TransportServiceCode
    {
        return $this->transportServiceCode;
    }

    /**
     * @return TransportServiceCode
     */
    public function getTransportServiceCodeWithCreate(): TransportServiceCode
    {
        $this->transportServiceCode ??= new TransportServiceCode();

        return $this->transportServiceCode;
    }

    /**
     * @param  null|TransportServiceCode $transportServiceCode
     * @return static
     */
    public function setTransportServiceCode(
        ?TransportServiceCode $transportServiceCode = null
    ): static {
        $this->transportServiceCode = $transportServiceCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportServiceCode(): static
    {
        $this->transportServiceCode = null;

        return $this;
    }

    /**
     * @return null|TariffClassCode
     */
    public function getTariffClassCode(): ?TariffClassCode
    {
        return $this->tariffClassCode;
    }

    /**
     * @return TariffClassCode
     */
    public function getTariffClassCodeWithCreate(): TariffClassCode
    {
        $this->tariffClassCode ??= new TariffClassCode();

        return $this->tariffClassCode;
    }

    /**
     * @param  null|TariffClassCode $tariffClassCode
     * @return static
     */
    public function setTariffClassCode(
        ?TariffClassCode $tariffClassCode = null
    ): static {
        $this->tariffClassCode = $tariffClassCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTariffClassCode(): static
    {
        $this->tariffClassCode = null;

        return $this;
    }

    /**
     * @return null|Priority
     */
    public function getPriority(): ?Priority
    {
        return $this->priority;
    }

    /**
     * @return Priority
     */
    public function getPriorityWithCreate(): Priority
    {
        $this->priority ??= new Priority();

        return $this->priority;
    }

    /**
     * @param  null|Priority $priority
     * @return static
     */
    public function setPriority(
        ?Priority $priority = null
    ): static {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPriority(): static
    {
        $this->priority = null;

        return $this;
    }

    /**
     * @return null|FreightRateClassCode
     */
    public function getFreightRateClassCode(): ?FreightRateClassCode
    {
        return $this->freightRateClassCode;
    }

    /**
     * @return FreightRateClassCode
     */
    public function getFreightRateClassCodeWithCreate(): FreightRateClassCode
    {
        $this->freightRateClassCode ??= new FreightRateClassCode();

        return $this->freightRateClassCode;
    }

    /**
     * @param  null|FreightRateClassCode $freightRateClassCode
     * @return static
     */
    public function setFreightRateClassCode(
        ?FreightRateClassCode $freightRateClassCode = null
    ): static {
        $this->freightRateClassCode = $freightRateClassCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFreightRateClassCode(): static
    {
        $this->freightRateClassCode = null;

        return $this;
    }

    /**
     * @return null|array<TransportationServiceDescription>
     */
    public function getTransportationServiceDescription(): ?array
    {
        return $this->transportationServiceDescription;
    }

    /**
     * @param  null|array<TransportationServiceDescription> $transportationServiceDescription
     * @return static
     */
    public function setTransportationServiceDescription(
        ?array $transportationServiceDescription = null
    ): static {
        $this->transportationServiceDescription = $transportationServiceDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportationServiceDescription(): static
    {
        $this->transportationServiceDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTransportationServiceDescription(): static
    {
        $this->transportationServiceDescription = [];

        return $this;
    }

    /**
     * @return null|TransportationServiceDescription
     */
    public function firstTransportationServiceDescription(): ?TransportationServiceDescription
    {
        $transportationServiceDescription = $this->transportationServiceDescription ?? [];
        $transportationServiceDescription = reset($transportationServiceDescription);

        if (false === $transportationServiceDescription) {
            return null;
        }

        return $transportationServiceDescription;
    }

    /**
     * @return null|TransportationServiceDescription
     */
    public function lastTransportationServiceDescription(): ?TransportationServiceDescription
    {
        $transportationServiceDescription = $this->transportationServiceDescription ?? [];
        $transportationServiceDescription = end($transportationServiceDescription);

        if (false === $transportationServiceDescription) {
            return null;
        }

        return $transportationServiceDescription;
    }

    /**
     * @param  TransportationServiceDescription $transportationServiceDescription
     * @return static
     */
    public function addToTransportationServiceDescription(
        TransportationServiceDescription $transportationServiceDescription,
    ): static {
        $this->transportationServiceDescription[] = $transportationServiceDescription;

        return $this;
    }

    /**
     * @return TransportationServiceDescription
     */
    public function addToTransportationServiceDescriptionWithCreate(): TransportationServiceDescription
    {
        $this->addToTransportationServiceDescription($transportationServiceDescription = new TransportationServiceDescription());

        return $transportationServiceDescription;
    }

    /**
     * @param  TransportationServiceDescription $transportationServiceDescription
     * @return static
     */
    public function addOnceToTransportationServiceDescription(
        TransportationServiceDescription $transportationServiceDescription,
    ): static {
        if (!is_array($this->transportationServiceDescription)) {
            $this->transportationServiceDescription = [];
        }

        $this->transportationServiceDescription[0] = $transportationServiceDescription;

        return $this;
    }

    /**
     * @return TransportationServiceDescription
     */
    public function addOnceToTransportationServiceDescriptionWithCreate(): TransportationServiceDescription
    {
        if (!is_array($this->transportationServiceDescription)) {
            $this->transportationServiceDescription = [];
        }

        if ([] === $this->transportationServiceDescription) {
            $this->addOnceToTransportationServiceDescription(new TransportationServiceDescription());
        }

        return $this->transportationServiceDescription[0];
    }

    /**
     * @return null|TransportationServiceDetailsURI
     */
    public function getTransportationServiceDetailsURI(): ?TransportationServiceDetailsURI
    {
        return $this->transportationServiceDetailsURI;
    }

    /**
     * @return TransportationServiceDetailsURI
     */
    public function getTransportationServiceDetailsURIWithCreate(): TransportationServiceDetailsURI
    {
        $this->transportationServiceDetailsURI ??= new TransportationServiceDetailsURI();

        return $this->transportationServiceDetailsURI;
    }

    /**
     * @param  null|TransportationServiceDetailsURI $transportationServiceDetailsURI
     * @return static
     */
    public function setTransportationServiceDetailsURI(
        ?TransportationServiceDetailsURI $transportationServiceDetailsURI = null,
    ): static {
        $this->transportationServiceDetailsURI = $transportationServiceDetailsURI;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportationServiceDetailsURI(): static
    {
        $this->transportationServiceDetailsURI = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getNominationDate(): ?DateTimeInterface
    {
        return $this->nominationDate;
    }

    /**
     * @param  null|DateTimeInterface $nominationDate
     * @return static
     */
    public function setNominationDate(
        ?DateTimeInterface $nominationDate = null
    ): static {
        $this->nominationDate = $nominationDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNominationDate(): static
    {
        $this->nominationDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getNominationTime(): ?DateTimeInterface
    {
        return $this->nominationTime;
    }

    /**
     * @param  null|DateTimeInterface $nominationTime
     * @return static
     */
    public function setNominationTime(
        ?DateTimeInterface $nominationTime = null
    ): static {
        $this->nominationTime = $nominationTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNominationTime(): static
    {
        $this->nominationTime = null;

        return $this;
    }

    /**
     * @return null|Name
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name ??= new Name();

        return $this->name;
    }

    /**
     * @param  null|Name $name
     * @return static
     */
    public function setName(
        ?Name $name = null
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
     * @return null|SequenceNumeric
     */
    public function getSequenceNumeric(): ?SequenceNumeric
    {
        return $this->sequenceNumeric;
    }

    /**
     * @return SequenceNumeric
     */
    public function getSequenceNumericWithCreate(): SequenceNumeric
    {
        $this->sequenceNumeric ??= new SequenceNumeric();

        return $this->sequenceNumeric;
    }

    /**
     * @param  null|SequenceNumeric $sequenceNumeric
     * @return static
     */
    public function setSequenceNumeric(
        ?SequenceNumeric $sequenceNumeric = null
    ): static {
        $this->sequenceNumeric = $sequenceNumeric;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSequenceNumeric(): static
    {
        $this->sequenceNumeric = null;

        return $this;
    }

    /**
     * @return null|array<TransportEquipment>
     */
    public function getTransportEquipment(): ?array
    {
        return $this->transportEquipment;
    }

    /**
     * @param  null|array<TransportEquipment> $transportEquipment
     * @return static
     */
    public function setTransportEquipment(
        ?array $transportEquipment = null
    ): static {
        $this->transportEquipment = $transportEquipment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportEquipment(): static
    {
        $this->transportEquipment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTransportEquipment(): static
    {
        $this->transportEquipment = [];

        return $this;
    }

    /**
     * @return null|TransportEquipment
     */
    public function firstTransportEquipment(): ?TransportEquipment
    {
        $transportEquipment = $this->transportEquipment ?? [];
        $transportEquipment = reset($transportEquipment);

        if (false === $transportEquipment) {
            return null;
        }

        return $transportEquipment;
    }

    /**
     * @return null|TransportEquipment
     */
    public function lastTransportEquipment(): ?TransportEquipment
    {
        $transportEquipment = $this->transportEquipment ?? [];
        $transportEquipment = end($transportEquipment);

        if (false === $transportEquipment) {
            return null;
        }

        return $transportEquipment;
    }

    /**
     * @param  TransportEquipment $transportEquipment
     * @return static
     */
    public function addToTransportEquipment(
        TransportEquipment $transportEquipment
    ): static {
        $this->transportEquipment[] = $transportEquipment;

        return $this;
    }

    /**
     * @return TransportEquipment
     */
    public function addToTransportEquipmentWithCreate(): TransportEquipment
    {
        $this->addToTransportEquipment($transportEquipment = new TransportEquipment());

        return $transportEquipment;
    }

    /**
     * @param  TransportEquipment $transportEquipment
     * @return static
     */
    public function addOnceToTransportEquipment(
        TransportEquipment $transportEquipment
    ): static {
        if (!is_array($this->transportEquipment)) {
            $this->transportEquipment = [];
        }

        $this->transportEquipment[0] = $transportEquipment;

        return $this;
    }

    /**
     * @return TransportEquipment
     */
    public function addOnceToTransportEquipmentWithCreate(): TransportEquipment
    {
        if (!is_array($this->transportEquipment)) {
            $this->transportEquipment = [];
        }

        if ([] === $this->transportEquipment) {
            $this->addOnceToTransportEquipment(new TransportEquipment());
        }

        return $this->transportEquipment[0];
    }

    /**
     * @return null|array<SupportedTransportEquipment>
     */
    public function getSupportedTransportEquipment(): ?array
    {
        return $this->supportedTransportEquipment;
    }

    /**
     * @param  null|array<SupportedTransportEquipment> $supportedTransportEquipment
     * @return static
     */
    public function setSupportedTransportEquipment(
        ?array $supportedTransportEquipment = null
    ): static {
        $this->supportedTransportEquipment = $supportedTransportEquipment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSupportedTransportEquipment(): static
    {
        $this->supportedTransportEquipment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSupportedTransportEquipment(): static
    {
        $this->supportedTransportEquipment = [];

        return $this;
    }

    /**
     * @return null|SupportedTransportEquipment
     */
    public function firstSupportedTransportEquipment(): ?SupportedTransportEquipment
    {
        $supportedTransportEquipment = $this->supportedTransportEquipment ?? [];
        $supportedTransportEquipment = reset($supportedTransportEquipment);

        if (false === $supportedTransportEquipment) {
            return null;
        }

        return $supportedTransportEquipment;
    }

    /**
     * @return null|SupportedTransportEquipment
     */
    public function lastSupportedTransportEquipment(): ?SupportedTransportEquipment
    {
        $supportedTransportEquipment = $this->supportedTransportEquipment ?? [];
        $supportedTransportEquipment = end($supportedTransportEquipment);

        if (false === $supportedTransportEquipment) {
            return null;
        }

        return $supportedTransportEquipment;
    }

    /**
     * @param  SupportedTransportEquipment $supportedTransportEquipment
     * @return static
     */
    public function addToSupportedTransportEquipment(
        SupportedTransportEquipment $supportedTransportEquipment
    ): static {
        $this->supportedTransportEquipment[] = $supportedTransportEquipment;

        return $this;
    }

    /**
     * @return SupportedTransportEquipment
     */
    public function addToSupportedTransportEquipmentWithCreate(): SupportedTransportEquipment
    {
        $this->addToSupportedTransportEquipment($supportedTransportEquipment = new SupportedTransportEquipment());

        return $supportedTransportEquipment;
    }

    /**
     * @param  SupportedTransportEquipment $supportedTransportEquipment
     * @return static
     */
    public function addOnceToSupportedTransportEquipment(
        SupportedTransportEquipment $supportedTransportEquipment,
    ): static {
        if (!is_array($this->supportedTransportEquipment)) {
            $this->supportedTransportEquipment = [];
        }

        $this->supportedTransportEquipment[0] = $supportedTransportEquipment;

        return $this;
    }

    /**
     * @return SupportedTransportEquipment
     */
    public function addOnceToSupportedTransportEquipmentWithCreate(): SupportedTransportEquipment
    {
        if (!is_array($this->supportedTransportEquipment)) {
            $this->supportedTransportEquipment = [];
        }

        if ([] === $this->supportedTransportEquipment) {
            $this->addOnceToSupportedTransportEquipment(new SupportedTransportEquipment());
        }

        return $this->supportedTransportEquipment[0];
    }

    /**
     * @return null|array<UnsupportedTransportEquipment>
     */
    public function getUnsupportedTransportEquipment(): ?array
    {
        return $this->unsupportedTransportEquipment;
    }

    /**
     * @param  null|array<UnsupportedTransportEquipment> $unsupportedTransportEquipment
     * @return static
     */
    public function setUnsupportedTransportEquipment(
        ?array $unsupportedTransportEquipment = null
    ): static {
        $this->unsupportedTransportEquipment = $unsupportedTransportEquipment;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUnsupportedTransportEquipment(): static
    {
        $this->unsupportedTransportEquipment = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearUnsupportedTransportEquipment(): static
    {
        $this->unsupportedTransportEquipment = [];

        return $this;
    }

    /**
     * @return null|UnsupportedTransportEquipment
     */
    public function firstUnsupportedTransportEquipment(): ?UnsupportedTransportEquipment
    {
        $unsupportedTransportEquipment = $this->unsupportedTransportEquipment ?? [];
        $unsupportedTransportEquipment = reset($unsupportedTransportEquipment);

        if (false === $unsupportedTransportEquipment) {
            return null;
        }

        return $unsupportedTransportEquipment;
    }

    /**
     * @return null|UnsupportedTransportEquipment
     */
    public function lastUnsupportedTransportEquipment(): ?UnsupportedTransportEquipment
    {
        $unsupportedTransportEquipment = $this->unsupportedTransportEquipment ?? [];
        $unsupportedTransportEquipment = end($unsupportedTransportEquipment);

        if (false === $unsupportedTransportEquipment) {
            return null;
        }

        return $unsupportedTransportEquipment;
    }

    /**
     * @param  UnsupportedTransportEquipment $unsupportedTransportEquipment
     * @return static
     */
    public function addToUnsupportedTransportEquipment(
        UnsupportedTransportEquipment $unsupportedTransportEquipment,
    ): static {
        $this->unsupportedTransportEquipment[] = $unsupportedTransportEquipment;

        return $this;
    }

    /**
     * @return UnsupportedTransportEquipment
     */
    public function addToUnsupportedTransportEquipmentWithCreate(): UnsupportedTransportEquipment
    {
        $this->addToUnsupportedTransportEquipment($unsupportedTransportEquipment = new UnsupportedTransportEquipment());

        return $unsupportedTransportEquipment;
    }

    /**
     * @param  UnsupportedTransportEquipment $unsupportedTransportEquipment
     * @return static
     */
    public function addOnceToUnsupportedTransportEquipment(
        UnsupportedTransportEquipment $unsupportedTransportEquipment,
    ): static {
        if (!is_array($this->unsupportedTransportEquipment)) {
            $this->unsupportedTransportEquipment = [];
        }

        $this->unsupportedTransportEquipment[0] = $unsupportedTransportEquipment;

        return $this;
    }

    /**
     * @return UnsupportedTransportEquipment
     */
    public function addOnceToUnsupportedTransportEquipmentWithCreate(): UnsupportedTransportEquipment
    {
        if (!is_array($this->unsupportedTransportEquipment)) {
            $this->unsupportedTransportEquipment = [];
        }

        if ([] === $this->unsupportedTransportEquipment) {
            $this->addOnceToUnsupportedTransportEquipment(new UnsupportedTransportEquipment());
        }

        return $this->unsupportedTransportEquipment[0];
    }

    /**
     * @return null|array<CommodityClassification>
     */
    public function getCommodityClassification(): ?array
    {
        return $this->commodityClassification;
    }

    /**
     * @param  null|array<CommodityClassification> $commodityClassification
     * @return static
     */
    public function setCommodityClassification(
        ?array $commodityClassification = null
    ): static {
        $this->commodityClassification = $commodityClassification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCommodityClassification(): static
    {
        $this->commodityClassification = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearCommodityClassification(): static
    {
        $this->commodityClassification = [];

        return $this;
    }

    /**
     * @return null|CommodityClassification
     */
    public function firstCommodityClassification(): ?CommodityClassification
    {
        $commodityClassification = $this->commodityClassification ?? [];
        $commodityClassification = reset($commodityClassification);

        if (false === $commodityClassification) {
            return null;
        }

        return $commodityClassification;
    }

    /**
     * @return null|CommodityClassification
     */
    public function lastCommodityClassification(): ?CommodityClassification
    {
        $commodityClassification = $this->commodityClassification ?? [];
        $commodityClassification = end($commodityClassification);

        if (false === $commodityClassification) {
            return null;
        }

        return $commodityClassification;
    }

    /**
     * @param  CommodityClassification $commodityClassification
     * @return static
     */
    public function addToCommodityClassification(
        CommodityClassification $commodityClassification
    ): static {
        $this->commodityClassification[] = $commodityClassification;

        return $this;
    }

    /**
     * @return CommodityClassification
     */
    public function addToCommodityClassificationWithCreate(): CommodityClassification
    {
        $this->addToCommodityClassification($commodityClassification = new CommodityClassification());

        return $commodityClassification;
    }

    /**
     * @param  CommodityClassification $commodityClassification
     * @return static
     */
    public function addOnceToCommodityClassification(
        CommodityClassification $commodityClassification
    ): static {
        if (!is_array($this->commodityClassification)) {
            $this->commodityClassification = [];
        }

        $this->commodityClassification[0] = $commodityClassification;

        return $this;
    }

    /**
     * @return CommodityClassification
     */
    public function addOnceToCommodityClassificationWithCreate(): CommodityClassification
    {
        if (!is_array($this->commodityClassification)) {
            $this->commodityClassification = [];
        }

        if ([] === $this->commodityClassification) {
            $this->addOnceToCommodityClassification(new CommodityClassification());
        }

        return $this->commodityClassification[0];
    }

    /**
     * @return null|array<SupportedCommodityClassification>
     */
    public function getSupportedCommodityClassification(): ?array
    {
        return $this->supportedCommodityClassification;
    }

    /**
     * @param  null|array<SupportedCommodityClassification> $supportedCommodityClassification
     * @return static
     */
    public function setSupportedCommodityClassification(
        ?array $supportedCommodityClassification = null
    ): static {
        $this->supportedCommodityClassification = $supportedCommodityClassification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSupportedCommodityClassification(): static
    {
        $this->supportedCommodityClassification = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSupportedCommodityClassification(): static
    {
        $this->supportedCommodityClassification = [];

        return $this;
    }

    /**
     * @return null|SupportedCommodityClassification
     */
    public function firstSupportedCommodityClassification(): ?SupportedCommodityClassification
    {
        $supportedCommodityClassification = $this->supportedCommodityClassification ?? [];
        $supportedCommodityClassification = reset($supportedCommodityClassification);

        if (false === $supportedCommodityClassification) {
            return null;
        }

        return $supportedCommodityClassification;
    }

    /**
     * @return null|SupportedCommodityClassification
     */
    public function lastSupportedCommodityClassification(): ?SupportedCommodityClassification
    {
        $supportedCommodityClassification = $this->supportedCommodityClassification ?? [];
        $supportedCommodityClassification = end($supportedCommodityClassification);

        if (false === $supportedCommodityClassification) {
            return null;
        }

        return $supportedCommodityClassification;
    }

    /**
     * @param  SupportedCommodityClassification $supportedCommodityClassification
     * @return static
     */
    public function addToSupportedCommodityClassification(
        SupportedCommodityClassification $supportedCommodityClassification,
    ): static {
        $this->supportedCommodityClassification[] = $supportedCommodityClassification;

        return $this;
    }

    /**
     * @return SupportedCommodityClassification
     */
    public function addToSupportedCommodityClassificationWithCreate(): SupportedCommodityClassification
    {
        $this->addToSupportedCommodityClassification($supportedCommodityClassification = new SupportedCommodityClassification());

        return $supportedCommodityClassification;
    }

    /**
     * @param  SupportedCommodityClassification $supportedCommodityClassification
     * @return static
     */
    public function addOnceToSupportedCommodityClassification(
        SupportedCommodityClassification $supportedCommodityClassification,
    ): static {
        if (!is_array($this->supportedCommodityClassification)) {
            $this->supportedCommodityClassification = [];
        }

        $this->supportedCommodityClassification[0] = $supportedCommodityClassification;

        return $this;
    }

    /**
     * @return SupportedCommodityClassification
     */
    public function addOnceToSupportedCommodityClassificationWithCreate(): SupportedCommodityClassification
    {
        if (!is_array($this->supportedCommodityClassification)) {
            $this->supportedCommodityClassification = [];
        }

        if ([] === $this->supportedCommodityClassification) {
            $this->addOnceToSupportedCommodityClassification(new SupportedCommodityClassification());
        }

        return $this->supportedCommodityClassification[0];
    }

    /**
     * @return null|array<UnsupportedCommodityClassification>
     */
    public function getUnsupportedCommodityClassification(): ?array
    {
        return $this->unsupportedCommodityClassification;
    }

    /**
     * @param  null|array<UnsupportedCommodityClassification> $unsupportedCommodityClassification
     * @return static
     */
    public function setUnsupportedCommodityClassification(
        ?array $unsupportedCommodityClassification = null
    ): static {
        $this->unsupportedCommodityClassification = $unsupportedCommodityClassification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUnsupportedCommodityClassification(): static
    {
        $this->unsupportedCommodityClassification = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearUnsupportedCommodityClassification(): static
    {
        $this->unsupportedCommodityClassification = [];

        return $this;
    }

    /**
     * @return null|UnsupportedCommodityClassification
     */
    public function firstUnsupportedCommodityClassification(): ?UnsupportedCommodityClassification
    {
        $unsupportedCommodityClassification = $this->unsupportedCommodityClassification ?? [];
        $unsupportedCommodityClassification = reset($unsupportedCommodityClassification);

        if (false === $unsupportedCommodityClassification) {
            return null;
        }

        return $unsupportedCommodityClassification;
    }

    /**
     * @return null|UnsupportedCommodityClassification
     */
    public function lastUnsupportedCommodityClassification(): ?UnsupportedCommodityClassification
    {
        $unsupportedCommodityClassification = $this->unsupportedCommodityClassification ?? [];
        $unsupportedCommodityClassification = end($unsupportedCommodityClassification);

        if (false === $unsupportedCommodityClassification) {
            return null;
        }

        return $unsupportedCommodityClassification;
    }

    /**
     * @param  UnsupportedCommodityClassification $unsupportedCommodityClassification
     * @return static
     */
    public function addToUnsupportedCommodityClassification(
        UnsupportedCommodityClassification $unsupportedCommodityClassification,
    ): static {
        $this->unsupportedCommodityClassification[] = $unsupportedCommodityClassification;

        return $this;
    }

    /**
     * @return UnsupportedCommodityClassification
     */
    public function addToUnsupportedCommodityClassificationWithCreate(): UnsupportedCommodityClassification
    {
        $this->addToUnsupportedCommodityClassification($unsupportedCommodityClassification = new UnsupportedCommodityClassification());

        return $unsupportedCommodityClassification;
    }

    /**
     * @param  UnsupportedCommodityClassification $unsupportedCommodityClassification
     * @return static
     */
    public function addOnceToUnsupportedCommodityClassification(
        UnsupportedCommodityClassification $unsupportedCommodityClassification,
    ): static {
        if (!is_array($this->unsupportedCommodityClassification)) {
            $this->unsupportedCommodityClassification = [];
        }

        $this->unsupportedCommodityClassification[0] = $unsupportedCommodityClassification;

        return $this;
    }

    /**
     * @return UnsupportedCommodityClassification
     */
    public function addOnceToUnsupportedCommodityClassificationWithCreate(): UnsupportedCommodityClassification
    {
        if (!is_array($this->unsupportedCommodityClassification)) {
            $this->unsupportedCommodityClassification = [];
        }

        if ([] === $this->unsupportedCommodityClassification) {
            $this->addOnceToUnsupportedCommodityClassification(new UnsupportedCommodityClassification());
        }

        return $this->unsupportedCommodityClassification[0];
    }

    /**
     * @return null|TotalCapacityDimension
     */
    public function getTotalCapacityDimension(): ?TotalCapacityDimension
    {
        return $this->totalCapacityDimension;
    }

    /**
     * @return TotalCapacityDimension
     */
    public function getTotalCapacityDimensionWithCreate(): TotalCapacityDimension
    {
        $this->totalCapacityDimension ??= new TotalCapacityDimension();

        return $this->totalCapacityDimension;
    }

    /**
     * @param  null|TotalCapacityDimension $totalCapacityDimension
     * @return static
     */
    public function setTotalCapacityDimension(
        ?TotalCapacityDimension $totalCapacityDimension = null
    ): static {
        $this->totalCapacityDimension = $totalCapacityDimension;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTotalCapacityDimension(): static
    {
        $this->totalCapacityDimension = null;

        return $this;
    }

    /**
     * @return null|array<ShipmentStage>
     */
    public function getShipmentStage(): ?array
    {
        return $this->shipmentStage;
    }

    /**
     * @param  null|array<ShipmentStage> $shipmentStage
     * @return static
     */
    public function setShipmentStage(
        ?array $shipmentStage = null
    ): static {
        $this->shipmentStage = $shipmentStage;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetShipmentStage(): static
    {
        $this->shipmentStage = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearShipmentStage(): static
    {
        $this->shipmentStage = [];

        return $this;
    }

    /**
     * @return null|ShipmentStage
     */
    public function firstShipmentStage(): ?ShipmentStage
    {
        $shipmentStage = $this->shipmentStage ?? [];
        $shipmentStage = reset($shipmentStage);

        if (false === $shipmentStage) {
            return null;
        }

        return $shipmentStage;
    }

    /**
     * @return null|ShipmentStage
     */
    public function lastShipmentStage(): ?ShipmentStage
    {
        $shipmentStage = $this->shipmentStage ?? [];
        $shipmentStage = end($shipmentStage);

        if (false === $shipmentStage) {
            return null;
        }

        return $shipmentStage;
    }

    /**
     * @param  ShipmentStage $shipmentStage
     * @return static
     */
    public function addToShipmentStage(
        ShipmentStage $shipmentStage
    ): static {
        $this->shipmentStage[] = $shipmentStage;

        return $this;
    }

    /**
     * @return ShipmentStage
     */
    public function addToShipmentStageWithCreate(): ShipmentStage
    {
        $this->addToShipmentStage($shipmentStage = new ShipmentStage());

        return $shipmentStage;
    }

    /**
     * @param  ShipmentStage $shipmentStage
     * @return static
     */
    public function addOnceToShipmentStage(
        ShipmentStage $shipmentStage
    ): static {
        if (!is_array($this->shipmentStage)) {
            $this->shipmentStage = [];
        }

        $this->shipmentStage[0] = $shipmentStage;

        return $this;
    }

    /**
     * @return ShipmentStage
     */
    public function addOnceToShipmentStageWithCreate(): ShipmentStage
    {
        if (!is_array($this->shipmentStage)) {
            $this->shipmentStage = [];
        }

        if ([] === $this->shipmentStage) {
            $this->addOnceToShipmentStage(new ShipmentStage());
        }

        return $this->shipmentStage[0];
    }

    /**
     * @return null|array<TransportEvent>
     */
    public function getTransportEvent(): ?array
    {
        return $this->transportEvent;
    }

    /**
     * @param  null|array<TransportEvent> $transportEvent
     * @return static
     */
    public function setTransportEvent(
        ?array $transportEvent = null
    ): static {
        $this->transportEvent = $transportEvent;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTransportEvent(): static
    {
        $this->transportEvent = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTransportEvent(): static
    {
        $this->transportEvent = [];

        return $this;
    }

    /**
     * @return null|TransportEvent
     */
    public function firstTransportEvent(): ?TransportEvent
    {
        $transportEvent = $this->transportEvent ?? [];
        $transportEvent = reset($transportEvent);

        if (false === $transportEvent) {
            return null;
        }

        return $transportEvent;
    }

    /**
     * @return null|TransportEvent
     */
    public function lastTransportEvent(): ?TransportEvent
    {
        $transportEvent = $this->transportEvent ?? [];
        $transportEvent = end($transportEvent);

        if (false === $transportEvent) {
            return null;
        }

        return $transportEvent;
    }

    /**
     * @param  TransportEvent $transportEvent
     * @return static
     */
    public function addToTransportEvent(
        TransportEvent $transportEvent
    ): static {
        $this->transportEvent[] = $transportEvent;

        return $this;
    }

    /**
     * @return TransportEvent
     */
    public function addToTransportEventWithCreate(): TransportEvent
    {
        $this->addToTransportEvent($transportEvent = new TransportEvent());

        return $transportEvent;
    }

    /**
     * @param  TransportEvent $transportEvent
     * @return static
     */
    public function addOnceToTransportEvent(
        TransportEvent $transportEvent
    ): static {
        if (!is_array($this->transportEvent)) {
            $this->transportEvent = [];
        }

        $this->transportEvent[0] = $transportEvent;

        return $this;
    }

    /**
     * @return TransportEvent
     */
    public function addOnceToTransportEventWithCreate(): TransportEvent
    {
        if (!is_array($this->transportEvent)) {
            $this->transportEvent = [];
        }

        if ([] === $this->transportEvent) {
            $this->addOnceToTransportEvent(new TransportEvent());
        }

        return $this->transportEvent[0];
    }

    /**
     * @return null|ResponsibleTransportServiceProviderParty
     */
    public function getResponsibleTransportServiceProviderParty(): ?ResponsibleTransportServiceProviderParty
    {
        return $this->responsibleTransportServiceProviderParty;
    }

    /**
     * @return ResponsibleTransportServiceProviderParty
     */
    public function getResponsibleTransportServiceProviderPartyWithCreate(): ResponsibleTransportServiceProviderParty
    {
        $this->responsibleTransportServiceProviderParty ??= new ResponsibleTransportServiceProviderParty();

        return $this->responsibleTransportServiceProviderParty;
    }

    /**
     * @param  null|ResponsibleTransportServiceProviderParty $responsibleTransportServiceProviderParty
     * @return static
     */
    public function setResponsibleTransportServiceProviderParty(
        ?ResponsibleTransportServiceProviderParty $responsibleTransportServiceProviderParty = null,
    ): static {
        $this->responsibleTransportServiceProviderParty = $responsibleTransportServiceProviderParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetResponsibleTransportServiceProviderParty(): static
    {
        $this->responsibleTransportServiceProviderParty = null;

        return $this;
    }

    /**
     * @return null|array<EnvironmentalEmission>
     */
    public function getEnvironmentalEmission(): ?array
    {
        return $this->environmentalEmission;
    }

    /**
     * @param  null|array<EnvironmentalEmission> $environmentalEmission
     * @return static
     */
    public function setEnvironmentalEmission(
        ?array $environmentalEmission = null
    ): static {
        $this->environmentalEmission = $environmentalEmission;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEnvironmentalEmission(): static
    {
        $this->environmentalEmission = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearEnvironmentalEmission(): static
    {
        $this->environmentalEmission = [];

        return $this;
    }

    /**
     * @return null|EnvironmentalEmission
     */
    public function firstEnvironmentalEmission(): ?EnvironmentalEmission
    {
        $environmentalEmission = $this->environmentalEmission ?? [];
        $environmentalEmission = reset($environmentalEmission);

        if (false === $environmentalEmission) {
            return null;
        }

        return $environmentalEmission;
    }

    /**
     * @return null|EnvironmentalEmission
     */
    public function lastEnvironmentalEmission(): ?EnvironmentalEmission
    {
        $environmentalEmission = $this->environmentalEmission ?? [];
        $environmentalEmission = end($environmentalEmission);

        if (false === $environmentalEmission) {
            return null;
        }

        return $environmentalEmission;
    }

    /**
     * @param  EnvironmentalEmission $environmentalEmission
     * @return static
     */
    public function addToEnvironmentalEmission(
        EnvironmentalEmission $environmentalEmission
    ): static {
        $this->environmentalEmission[] = $environmentalEmission;

        return $this;
    }

    /**
     * @return EnvironmentalEmission
     */
    public function addToEnvironmentalEmissionWithCreate(): EnvironmentalEmission
    {
        $this->addToEnvironmentalEmission($environmentalEmission = new EnvironmentalEmission());

        return $environmentalEmission;
    }

    /**
     * @param  EnvironmentalEmission $environmentalEmission
     * @return static
     */
    public function addOnceToEnvironmentalEmission(
        EnvironmentalEmission $environmentalEmission
    ): static {
        if (!is_array($this->environmentalEmission)) {
            $this->environmentalEmission = [];
        }

        $this->environmentalEmission[0] = $environmentalEmission;

        return $this;
    }

    /**
     * @return EnvironmentalEmission
     */
    public function addOnceToEnvironmentalEmissionWithCreate(): EnvironmentalEmission
    {
        if (!is_array($this->environmentalEmission)) {
            $this->environmentalEmission = [];
        }

        if ([] === $this->environmentalEmission) {
            $this->addOnceToEnvironmentalEmission(new EnvironmentalEmission());
        }

        return $this->environmentalEmission[0];
    }

    /**
     * @return null|EstimatedDurationPeriod
     */
    public function getEstimatedDurationPeriod(): ?EstimatedDurationPeriod
    {
        return $this->estimatedDurationPeriod;
    }

    /**
     * @return EstimatedDurationPeriod
     */
    public function getEstimatedDurationPeriodWithCreate(): EstimatedDurationPeriod
    {
        $this->estimatedDurationPeriod ??= new EstimatedDurationPeriod();

        return $this->estimatedDurationPeriod;
    }

    /**
     * @param  null|EstimatedDurationPeriod $estimatedDurationPeriod
     * @return static
     */
    public function setEstimatedDurationPeriod(
        ?EstimatedDurationPeriod $estimatedDurationPeriod = null
    ): static {
        $this->estimatedDurationPeriod = $estimatedDurationPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEstimatedDurationPeriod(): static
    {
        $this->estimatedDurationPeriod = null;

        return $this;
    }

    /**
     * @return null|array<ScheduledServiceFrequency>
     */
    public function getScheduledServiceFrequency(): ?array
    {
        return $this->scheduledServiceFrequency;
    }

    /**
     * @param  null|array<ScheduledServiceFrequency> $scheduledServiceFrequency
     * @return static
     */
    public function setScheduledServiceFrequency(
        ?array $scheduledServiceFrequency = null
    ): static {
        $this->scheduledServiceFrequency = $scheduledServiceFrequency;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetScheduledServiceFrequency(): static
    {
        $this->scheduledServiceFrequency = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearScheduledServiceFrequency(): static
    {
        $this->scheduledServiceFrequency = [];

        return $this;
    }

    /**
     * @return null|ScheduledServiceFrequency
     */
    public function firstScheduledServiceFrequency(): ?ScheduledServiceFrequency
    {
        $scheduledServiceFrequency = $this->scheduledServiceFrequency ?? [];
        $scheduledServiceFrequency = reset($scheduledServiceFrequency);

        if (false === $scheduledServiceFrequency) {
            return null;
        }

        return $scheduledServiceFrequency;
    }

    /**
     * @return null|ScheduledServiceFrequency
     */
    public function lastScheduledServiceFrequency(): ?ScheduledServiceFrequency
    {
        $scheduledServiceFrequency = $this->scheduledServiceFrequency ?? [];
        $scheduledServiceFrequency = end($scheduledServiceFrequency);

        if (false === $scheduledServiceFrequency) {
            return null;
        }

        return $scheduledServiceFrequency;
    }

    /**
     * @param  ScheduledServiceFrequency $scheduledServiceFrequency
     * @return static
     */
    public function addToScheduledServiceFrequency(
        ScheduledServiceFrequency $scheduledServiceFrequency
    ): static {
        $this->scheduledServiceFrequency[] = $scheduledServiceFrequency;

        return $this;
    }

    /**
     * @return ScheduledServiceFrequency
     */
    public function addToScheduledServiceFrequencyWithCreate(): ScheduledServiceFrequency
    {
        $this->addToScheduledServiceFrequency($scheduledServiceFrequency = new ScheduledServiceFrequency());

        return $scheduledServiceFrequency;
    }

    /**
     * @param  ScheduledServiceFrequency $scheduledServiceFrequency
     * @return static
     */
    public function addOnceToScheduledServiceFrequency(
        ScheduledServiceFrequency $scheduledServiceFrequency
    ): static {
        if (!is_array($this->scheduledServiceFrequency)) {
            $this->scheduledServiceFrequency = [];
        }

        $this->scheduledServiceFrequency[0] = $scheduledServiceFrequency;

        return $this;
    }

    /**
     * @return ScheduledServiceFrequency
     */
    public function addOnceToScheduledServiceFrequencyWithCreate(): ScheduledServiceFrequency
    {
        if (!is_array($this->scheduledServiceFrequency)) {
            $this->scheduledServiceFrequency = [];
        }

        if ([] === $this->scheduledServiceFrequency) {
            $this->addOnceToScheduledServiceFrequency(new ScheduledServiceFrequency());
        }

        return $this->scheduledServiceFrequency[0];
    }
}
